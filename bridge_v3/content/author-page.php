<?php
/**
 * This template is used to display the author page content.
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

?>

<!-- BEGIN .page-holder -->
<div class="page-holder">

	<!-- BEGIN .article -->
	<article class="article clearfix">

		<h1 class="headline"><?php echo esc_html( get_the_author() ); ?></h1>

		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 120 ); ?>
		</div>

		<!-- BEGIN .author-column -->
		<div class="author-column">

			<?php $website = get_the_author_meta( 'user_url' ); ?>
			<?php if ( ! empty( $website ) ) : ?>
				<h6><?php esc_html_e( 'Website:', 'organic-origin' ); ?></h6>
				<p><a href="<?php echo esc_url( $website ); ?>" rel="bookmark" title="<?php esc_attr_e( 'Link to author page', 'organic-origin' ); ?>" target="_blank"><?php echo esc_url( $website ); ?></a></p>
			<?php endif; ?>

			<?php $description = get_the_author_meta( 'description' ); ?>
			<?php if ( ! empty( $description ) ) : ?>
				<h6><?php esc_html_e( 'Profile:', 'organic-origin' ); ?></h6>
				<p><?php echo wp_kses_post( $description ); ?></p>
			<?php endif; ?>

			<?php if ( have_posts() ) : ?>

			<h6><?php printf( esc_html__( 'Posts by %1$s:', 'organic-origin' ), get_the_author() );  ?></h6>

			<ul class="author-posts">
				<?php while ( have_posts() ) : the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>

			<?php the_posts_pagination( array(
				'prev_text' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Previous Page', 'organic-origin' ) . ' </span>&laquo;',
				'next_text' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Next Page', 'organic-origin' ) . ' </span>&raquo;',
			) ); ?>

			<?php else : ?>
				<p><?php esc_html_e( 'No posts by this author.', 'organic-origin' ); ?></p>
			<?php endif; ?>

		<!-- END .author-column -->
		</div>

	<!-- END .article -->
	</article>

<!-- END .page-holder -->
</div>
