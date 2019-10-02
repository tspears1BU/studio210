<?php
/**
 * This template is used to display the banner image on posts and pages.
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

?>

<?php $front_page = is_front_page(); ?>
<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'origin-featured-large' ) : false; ?>

<?php if ( has_post_thumbnail() ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<div class="feature-img banner-img" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">
			<?php if ( is_page() && '1' == get_theme_mod( 'display_img_title_page', '1' ) || is_single() && '1' == get_theme_mod( 'display_img_title_post', '1' ) ) { ?>
				<div class="img-title vertical-center">
					<h1 class="headline"><?php the_title(); ?></h1>
				</div>
			<?php } ?>
			<?php the_post_thumbnail( 'origin-featured-large' ); ?>
		</div>

	<!-- END .row -->
	</div>

<?php } elseif ( $front_page && is_page() && has_custom_header() ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<div class="feature-img banner-img" <?php if ( ! empty( $header_image ) ) { ?> style="background-image: url(<?php header_image(); ?>);"<?php } ?>>
			<?php if ( '1' == get_theme_mod( 'display_img_title_page', '1' ) ) { ?>
			<div class="img-title vertical-center">
				<h1 class="headline"><?php the_title(); ?></h1>
			</div>
			<?php } ?>
			<?php the_custom_header_markup(); ?>
		</div>

	<!-- END .row -->
	</div>

<?php } ?>
