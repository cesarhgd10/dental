<?php

class TaxonomyHelper {

	/*
	* Creating Custom Post Type
	*/
	public static function create( $nome_singular, $nome_plural, $destino, $slug = '' ) {
		$labels = array(
			'name'          => __( $nome_singular ),
			'singular_name' => __( $nome_singular ),
			'search_items'  => __( 'Procurar ' . $nome_plural ),
			'all_items'     => __( 'Todos os ' . $nome_plural ),
			'edit_item'     => __( 'Editar ' . $nome_singular ),
			'update_item'   => __( 'Editar ' . $nome_singular ),
			'add_new_item'  => __( 'Novo ' . $nome_singular ),
			'menu_name'     => __( $nome_singular )
		);

		register_taxonomy(
			$slug,
			$destino,
			array(
				'labels'       => $labels,
				'rewrite'      => array( 'slug' => $slug ),
				'query_var'    => true,
				'hierarchical' => true
			)
		);

	}

	public static function getFirstTerm( $post_id, $taxonomy, $separator = '' ) {
		$terms = wp_get_post_terms( $post_id, $taxonomy );

		return count( $terms ) ? reset( $terms ) : '';
	}

	public static function getTermNames( $post_id, $taxonomy, $separator = ', ' ) {
		$terms = wp_get_post_terms( $post_id, $taxonomy, array( "fields" => "names" ) );

		if ( $separator ) {
			return implode( $separator, $terms );
		}

		return count( $terms ) ? reset( $terms ) : '';
	}

	public static function getPostTerms( $post_id, $taxonomy ) {
		$terms = wp_get_post_terms( $post_id, $taxonomy );

		return $terms;
	}

	public static function getTermSlugs( $post_id, $taxonomy, $separator = '' ) {
		$terms = wp_get_post_terms( $post_id, $taxonomy, array( "fields" => "slugs" ) );

		if ( $separator ) {
			return implode( $separator, $terms );
		}

		return count( $terms ) ? reset( $terms ) : '';
	}

	public static function getTerms( $taxonomy_name, $args = array() ) {
		$args['taxonomy']   = $taxonomy_name;
		$args['hide_empty'] = false;

		return get_terms( $args );
	}

	public static function getTermsArray( $taxonomy_name, $key_field = 'slug', $value_field = 'name' ) {
		$args['taxonomy']   = $taxonomy_name;
		$args['hide_empty'] = true;

		$terms = get_terms( $args );

		$result = array();
		foreach ( $terms as $term ) {
			$result[ $term->{$key_field} ] = $term->{$value_field};
		}

		return $result;
	}

	public static function getTaxonomyCustomField( $taxonomy_name, $term_id, $custom_field ) {
		$post_id = join( '_', array( $taxonomy, $term_id ) );

		return get_field( $custom_field, $post_id );
	}

	public static function getTaxonomyCustomFields( $taxonomy_name, $term_id ) {
		$post_id = join( '_', array( $taxonomy, $term_id ) );

		return get_fields( $post_id );
	}

	public static function getPostTermChildName( $post_id, $taxonomy ) {
		$result = '';
		$terms  = TaxonomyHelper::getPostTerms( $post_id, $taxonomy );

		foreach ( $terms as $term ) {
			if ( $term->parent ) {
				$result = $term;
			}
		}

		return $result ? $result->name : '';
	}

	/**
	* Get all terms of a taxonomy and return only the child terms
	*
	* @param $taxonomy
	*
	* @return array
	*/
	public static function getTermsChildren( $taxonomy, $args = '' ) {
		$terms  = TaxonomyHelper::getTerms( $taxonomy, $args );
		$result = [];

		// Filtra os lugares pra selecionar as cidades
		foreach ( $terms as $key => $term ) {
			if ( $term->parent ) {
				$result[ $key ] = $term;
			}
		}

		return $result;
	}

	/**
	* Get all terms of a taxonomy and return only the parent terms
	*
	* @param $taxonomy
	*
	* @return array
	*/
	public static function getTermsParent( $taxonomy, $args = '' ) {
		$terms  = TaxonomyHelper::getTerms( $taxonomy, $args );
		$result = [];

		// Filtra os lugares pra selecionar as cidades
		foreach ( $terms as $key => $term ) {
			if ( ! $term->parent ) {
				$result[ $key ] = $term;
			}
		}

		return $result;
	}

	/**
	* Get all of the taxonomy terms slug
	*
	* @param $taxonomy
	*
	* @return array
	*/
	public static function getTaxonomyTermsSlug( $taxonomy ) {
		$terms_slug;
		$terms = TaxonomyHelper::getTerms( $taxonomy );
		foreach ( $terms as $term ) {
			$terms_slug[] = $term->slug;
		}

		return $terms_slug;
	}

	public static function getTermsAssoc ( $taxonomy ) {
		$terms_assoc = [];

		$terms_parent   = TaxonomyHelper::getTermsParent( $taxonomy );

		$terms_children = TaxonomyHelper::getTermsChildren( $taxonomy );



		foreach ( $terms_parent as $parent ) {

			$terms_assoc[$parent->slug] = [];

			foreach ( $terms_children as $child ) {

				if ( $parent->term_id == $child->parent ) {

					$terms_assoc[$parent->slug][] = $child;

				}
			}
		}

		return $terms_assoc;
	}

	/**
	 * See if a Term has a parent or no
	 * @param  object  $term  A Taxonomy Term
	 * @return boolean
	 */
	public static function isChild( $term ) {
		return ( $term->parent > 0 );
	}

	/**
	 * Receives an array containing Term objects and a value, if a Term in the array
	 * contains a slug that matches the value returns true, otherwise returns false
	 *
	 * @param  array  $terms An array of Terms Object
	 * @param  string  $value The value to check against the Term slug
	 * @return boolean
	 */
	public static function hasChild( $terms, $value ) {
		if( is_array( $terms ) ) {
			foreach ( $terms as $key => $term ) {
				if( $term->slug == $value ) return true;
			}
		}

		return false;
	}

	/**
	 * Receiveis an Term Id or Object and checks if the current query_var
	 * has an value that matches one of the given elements
	 *
	 * @param  [int|object] $term A Term Object or Term ID
	 * @param  [string] $taxonomy The Taxonomy that term belongs to
	 * @return boolean See if the current query_var has a value that matches the
	 * one of the given Terms
	 */
	public static function getCurrentTerm( $term, $taxonomy ) {
		$children 		= TaxonomyHelper::getTermsChildren( $taxonomy, array( 'parent' => $term->term_id ) );
		$current_term =  PostHelper::facade_item_get_current( $taxonomy );

		// Check if the parent term slug matches de value
		if ( $term->slug == $current_term ) {
			return true;
		}
		// Check if the term has a children array
		else if ( array_key_exists( 'children', $term ) ) {
			return static::hasChild( $term['children'] );
		}
		else if ( count( $children ) > 0  ) {
				return static::hasChild( $children, $current_term );
		}
	}
}
