<?php
/**
 * Template Name: Custom Template
 */
?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php
  	if ( is_page() ) {
  		get_template_part( 'templates/content-page', $post->post_name );
  	} elseif ( is_single() ) {
  		get_template_part( 'templates/content-single', get_post_type() );
  	}
	?>
<?php endwhile; ?>
