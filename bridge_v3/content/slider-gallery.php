<?php
/**
 * This template is used to display the theme slider gallery.
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

?>

<!-- BEGIN .slideshow -->
<div class="slideshow">

	<!-- BEGIN .flexslider -->
	<div class="flexslider loading" data-speed="<?php echo get_theme_mod( 'organic_origin_transition_interval', '12000' ); ?>" data-transition="<?php echo get_theme_mod( 'organic_origin_transition_style', 'fade' ); ?>">

		<div class="preloader"></div>

		<!-- BEGIN .slides -->
		<ul class="slides">

			<?php while ( have_posts() ) : the_post(); if ( get_post_gallery() ) : ?>

				<?php $gallery = get_post_gallery( $post, false );
				$ids = explode( ',', $gallery['ids'] ); ?>

				<?php foreach ( $ids as $id ) { ?>
					<?php $link = wp_get_attachment_url( $id ); ?>
					<li style="background-image: url(<?php echo esc_url( $link ); ?>);"><img src="<?php echo esc_url( $link ); ?>" class="hide-img" /></li>
				<?php } ?>

			<?php endif;
			endwhile; ?>
			<?php wp_reset_postdata(); ?>

		<!-- END .slides -->
		</ul>

	<!-- END .flexslider -->
	</div>

<!-- END .slideshow -->
</div>
