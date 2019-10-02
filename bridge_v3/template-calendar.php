<?php
/**
Template Name: Calendar
 *
 * This template is used to display tabbed calendar pages.
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<?php get_template_part( 'content/banner', 'image' ); ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="production-content">

			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">
				
				<h1 class="titlebanner"><?php the_title(); ?></h1>

				<!-- BEGIN .post-area full-width -->
				<div class="production-postarea">

					<?php the_content(); ?>


					
						

				<!-- END .post-area full-width -->
				</div>

			<!-- END .sixteen columns -->
			</div>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
