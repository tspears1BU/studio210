<?php
/**
 * The footer for our theme.
 * This template is used to generate the footer for the theme.
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

?>

<!-- END .container -->
</div>

<!-- END #wrapper -->
</div>


<!-- BEGIN .footer -->
<div class="footer">

	<?php if ( is_active_sidebar( 'footer' ) ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .footer-widgets -->
			<div class="footer-widgets">

				<?php dynamic_sidebar( 'footer' ); ?>

			<!-- END .footer-widgets -->
			</div>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

	<?php } ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .footer-information -->
		<div class="footer-information">

			<!-- BEGIN .content -->
			<div class="content">
				
				<div class="align-left footer_logo">
					<?php if( get_field('footer_logo', 'option') ): ?>

						<img src="<?php the_field('footer_logo', 'option'); ?>" />

					<?php endif; ?>
				</div>

				<div class="align-right">

					<p><?php esc_html_e( 'Copyright', 'organic-origin' ); ?> &copy; <?php echo date( esc_html__( 'Y', 'organic-origin' ) ); ?> &middot; <?php esc_html_e( 'All Rights Reserved', 'organic-origin' ); ?> &middot; <?php esc_html( bloginfo( 'name' ) ); ?></p>

					<?php if ( '' != get_theme_mod( 'organic_origin_footer_text' ) ) { ?>

						<p><span class="footer-site-info"><?php echo get_theme_mod( 'organic_origin_footer_text' ); ?></span></p>

					<?php } else { ?>

						<p><?php printf( esc_html__( '%1$s by %2$s', 'organic-origin' ), 'Origin', '<a href="http://organicthemes.com/">Organic Themes</a>' ); ?></p>

					<?php } ?>

				</div>

				

			<!-- END .content -->
			</div>

		<!-- END .footer-information -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .footer -->
</div>

<?php wp_footer(); ?>

</body>
</html>
