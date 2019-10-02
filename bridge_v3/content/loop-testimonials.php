<?php
/**
 * This template displays the testimonials loop.
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

?>

<!-- BEGIN .testimonial-posts -->
<div class="testimonial-posts">

	<?php if ( class_exists( 'Jetpack' ) ) { $jetpack_testimonials_query = new WP_Query( array( 'post_type' => 'jetpack-testimonial' ) ); } ?>

	<?php if ( class_exists( 'Jetpack' ) && $jetpack_testimonials_query->have_posts() ) { ?>

		<?php
			$testimonials_query = new WP_Query( array(
				'post_type'					=> 'jetpack-testimonial',
				'posts_per_page' 		=> 48,
				'paged' 						=> $paged,
				'suppress_filters'	=> 0,
			) );
		?>

	<?php } else { ?>

		<?php
			$testimonials_query = new WP_Query( array(
				'cat' 							=> get_theme_mod( 'organic_origin_testimonial_category', '1' ),
				'posts_per_page' 		=> 48,
				'paged' 						=> $paged,
				'suppress_filters'	=> 0,
			) );
		?>

	<?php } ?>

	<?php if ( $testimonials_query->have_posts() ) : while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>

	<?php
	$testimonials_column = get_theme_mod( 'testimonial_columns', 'four' );
	if ( $testimonials_column ) {
		switch ( $testimonials_column ) {
			case 'two':
				$content = 'half';
				break;

			case 'three':
				$content = 'third';
				break;

			case 'four':
				$content = 'fourth';
				break;

			case 'five':
				$content = 'fifth';
				break;
		}
	} else {
		$content = 'fourth';
	}
	?>

	<!-- BEGIN .columns -->
	<div class="<?php echo esc_html( $content ); ?>">

		<!-- BEGIN .testimonial -->
		<div class="testimonial shadow">

			<?php if ( has_post_thumbnail() ) { ?>
				<div class="feature-img"><?php the_post_thumbnail( 'origin-featured-square' ); ?></div>
			<?php } ?>

			<!-- BEGIN .information -->
			<div class="information">

				<?php $has_content = get_the_content(); if ( '' != $has_content ) { ?>

						<?php the_content( esc_html__( 'Read More', 'organic-origin' ) ); ?>

				<?php } ?>

				<h2 class="author"><?php the_title(); ?></h2>

			<!-- END .information -->
			</div>

		<!-- END .testimonial -->
		</div>

	<!-- END .columns -->
	</div>

	<?php endwhile; ?>

<!-- END .testimonial-posts -->
</div>

	<?php if ( $testimonials_query->max_num_pages > 1 ) { ?>

		<!-- BEGIN .pagination -->
		<div class="pagination">

			<?php
			$big = 999999999; // Needs an unlikely integer.
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, $paged ),
				'prev_text' => esc_html__( '&laquo;', 'organic-origin' ),
				'next_text' => esc_html__( '&raquo;', 'organic-origin' ),
				'total' => $testimonials_query->max_num_pages,
			) );
			?>

		<!-- END .pagination -->
		</div>

	<?php } ?>

	<?php else : ?>

<!-- END .testimonial-posts -->
</div>

<!-- BEGIN .content -->
<div class="content">

	<!-- BEGIN .post-area -->
	<div class="post-area full-width">

		<?php get_template_part( 'content/content', 'none' ); ?>

	<!-- END .post-area -->
	</div>

<!-- END .content -->
</div>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
