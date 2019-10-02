<?php
/**
 * This content part displays testimonial content, and is pulled from single-jetpack-testimonial.php.
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- BEGIN .post-holder -->
<div class="post-holder">

	<!-- BEGIN .article -->
	<article class="article clearfix">

		<h1 class="headline"><?php the_title(); ?></h1>

		<?php the_content( esc_html__( 'Read More', 'organic-origin' ) ); ?>

		<?php wp_link_pages(array(
			'before' => '<p class="page-links"><span class="link-label">' . esc_html__( 'Pages:', 'organic-origin' ) . '</span>',
			'after' => '</p>',
			'link_before' => '<span>',
			'link_after' => '</span>',
			'next_or_number' => 'next_and_number',
			'nextpagelink' => esc_html__( 'Next', 'organic-origin' ),
			'previouspagelink' => esc_html__( 'Previous', 'organic-origin' ),
			'pagelink' => '%',
			'echo' => 1,
			)
		); ?>

	<!-- END .article -->
	</article>

<!-- END .post-holder -->
</div>

<?php endwhile; else : ?>

<!-- BEGIN .post-holder -->
<div class="post-holder">

	<!-- BEGIN .article -->
	<article class="article clearfix">

		<div class="error-404">
			<h1 class="headline"><?php esc_html_e( 'No Project Found', 'organic-origin' ); ?></h1>
			<p><?php esc_html_e( "We're sorry, but the project was not found.", 'organic-origin' ); ?></p>
		</div>

	<!-- END .article -->
	</article>

<!-- END .post-holder -->
</div>

<?php endif; ?>
