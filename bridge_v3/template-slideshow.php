<?php
/**
Template Name: Slideshow
 *
 * This template is used to display a page with a slideshow.
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class( 'slideshow-page' ); ?> id="page-<?php the_ID(); ?>">

	<?php if ( get_post_gallery() ) { ?>

		<!-- BEGIN .row -->
		<div class="row">
			<?php get_template_part( 'content/slider', 'gallery' ); ?>
		<!-- END .row -->
		</div>

	<?php } else { ?>

		<?php get_template_part( 'content/banner', 'image' ); ?>

	<?php } ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>

				<!-- BEGIN .eleven columns -->
				<div class="eleven columns">

					<!-- BEGIN .post-area -->
					<div class="post-area">

						<?php get_template_part( 'content/loop', 'page' ); ?>

					<!-- END .post-area -->
					</div>

				<!-- END .eleven columns -->
				</div>

				<!-- BEGIN .five columns -->
				<div class="five columns">

					<?php get_sidebar(); ?>

				<!-- END .five columns -->
				</div>

			<?php } else { ?>

				<!-- BEGIN .sixteen columns -->
				<div class="sixteen columns">

					<!-- BEGIN .post-area no-sidebar -->
					<div class="post-area no-sidebar">

						<?php get_template_part( 'content/loop', 'page' ); ?>

					<!-- END .post-area no-sidebar -->
					</div>

				<!-- END .sixteen columns -->
				</div>

			<?php } ?>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
