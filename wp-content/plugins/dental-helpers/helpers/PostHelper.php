<?php

class PostHelper {

	public static $per_page_options = [ "10", "20", "30" ];

	/*
	* Creating Custom Post Type
	*/
	public static function create( $nome_singular, $nome_plural, $supports, $slug = '', $taxonomies = array() ) {

		$labels = array(
			'name'               => $nome_singular,
			'singular_name'      => $nome_singular,
			'menu_name'          => $nome_singular,
			'name_admin_bar'     => $nome_singular,
			'add_new'            => 'Adicionar Novo',
			'add_new_item'       => 'Adicionar Novo ' . $nome_singular,
			'new_item'           => 'Novo ' . $nome_singular,
			'edit_item'          => 'Editar ' . $nome_singular,
			'view_item'          => 'Visualizar ' . $nome_singular,
			'all_items'          => 'Todos os ' . $nome_plural,
			'search_items'       => 'Buscar ' . $nome_plural,
			'parent_item_colon'  => $nome_plural . '-Pais',
			'not_found'          => 'Nenhum ' . $nome_singular . ' Encontrado',
			'not_found_in_trash' => 'Nenhum ' . $nome_singular . '  Encontrado na Lixeira',
		);

		$args = array(
			'labels'             => $labels,
			'description'        => $nome_singular,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $slug ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'taxonomies'         => $taxonomies,
			'supports'           => $supports
		);

		register_post_type( $slug, $args );

	}

	public static function getAllPosts( $post_type, $orderby = '', $order = '', $posts = -1 ) {
		$args = array(
			'post_type'      => $post_type,
			'post_status'    => 'publish',
			'posts_per_page' => $posts,
			'orderby'        => $orderby,
			'order'          => $order
		);

		return get_posts( $args );
	}

	public static function getPostBySlug( $slug, $post_type = 'post' ) {

		$args = array(
			'name'           => $slug,
			'post_type'      => $post_type,
			'post_status'    => 'publish',
			'posts_per_page' => 1
		);

		$posts = get_posts( $args );

		return count( $posts ) ? reset( $posts ) : false;
	}

	public static function getFilteredContent( $post ) {
		return $post ? apply_filters( 'the_content', $post->post_content ) : '';
	}

	public static function getThumbnailBySlug( $slug, $post_type = 'post', $size = 'full', $attr = '' ) {
		$post = PostHelper::getPostBySlug( $slug, $post_type );

		return get_the_post_thumbnail( $post, $size, $attr );
	}

	public static function getContentBySlug( $slug, $post_type = 'post' ) {
		$post = PostHelper::getPostBySlug( $slug, $post_type );

		return $post ? $post->post_content : '';
	}

	public static function getFilteredContentBySlug( $slug, $post_type = 'post' ) {
		$post = PostHelper::getPostBySlug( $slug, $post_type );

		return PostHelper::getFilteredContent( $post );
	}

	public static function getTitleBySlug( $slug, $post_type = 'post' ) {
		$post = PostHelper::getPostBySlug( $slug, $post_type );

		return $post ? $post->post_title : '';
	}

	public static function getPostsByTermName( $post_type, $taxonomy, $term ) {
		$args = array(
			'post_type'      => $post_type,
			'post_status'    => 'publish',
			'posts_per_page' => - 1,
			'tax_query'      => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'slug',
					'terms'    => $term
				),
			),
		);

		return get_posts( $args );
	}

	public static function getParentPost( $post_id ) {
		return get_post( $post_id );
	}
}
