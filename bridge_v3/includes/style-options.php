<?php
/**
 * This template is used to manage style options.
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

/**
 * Changes styles upon user defined options.
 */
function organic_origin_custom_styles() {

	$header_image = get_header_image();
	$display_title = get_theme_mod( 'organic_origin_site_title', '1' );
	$display_tagline = get_theme_mod( 'organic_origin_site_tagline', '1' );
	$nav_bg = get_theme_mod( 'organic_origin_colors_nav', '#ffffff' );
	$footer_bg = get_theme_mod( 'organic_origin_colors_footer', '#f4f4f4' );
	$link_color = get_theme_mod( 'organic_origin_colors_links', '#3399cc' );
	$link_hover_color = get_theme_mod( 'organic_origin_colors_links_hover', '#006699' );
	$heading_link_color = get_theme_mod( 'organic_origin_colors_heading_links', '#000000' );
	$heading_link_hover_color = get_theme_mod( 'organic_origin_colors_heading_links_hover', '#006699' );
	$button_color = get_theme_mod( 'organic_origin_colors_button', '#3399cc' );
	$button_hover_color = get_theme_mod( 'organic_origin_colors_button_hover', '#006699' );
	?>

	<style>

	.wp-custom-header {
		<?php if ( ! empty( $header_image ) ) { ?>
			background-image: url('<?php header_image(); ?>');
		<?php } ?>
	}

	#wrapper .site-title {
		<?php
		if ( '1' != $display_title ) {
			echo
			'position: absolute;
			text-indent: -9999px;
			margin: 0px;
			padding: 0px;';
		};
		?>
	}

	#wrapper .site-description {
		<?php
		if ( '1' != $display_tagline ) {
			echo
			'position: absolute;
			left: -9999px;
			margin: 0px;
			padding: 0px;';
		};
		?>
	}

	#wrapper #nav-bar, #wrapper .menu ul.sub-menu, #wrapper .menu ul.children {
		<?php
		if ( $nav_bg ) {
			echo 'background-color: ' .esc_html( $nav_bg ). ';';
		};
		?>
	}

	#wrapper .footer {
		<?php
		if ( $footer_bg ) {
			echo 'background-color: ' .esc_html( $footer_bg ). ';';
		};
		?>
	}

	.container a, .container a:link, .container a:visited, .footer-widgets a, .footer-widgets a:link, .footer-widgets a:visited,
	a.link-email, a.link-email:link, a.link-email:visited, a.link-phone, a.link-phone:link, a.link-phone:visited,
	#wrapper .widget ul.menu li a, #wrapper .widget ul.menu li a:link, #wrapper .widget ul.menu li a:visited,
	#wrapper .widget ul.menu li ul.sub-menu li a, #wrapper .widget ul.menu li ul.sub-menu li a:link, #wrapper .widget ul.menu li ul.sub-menu li a:visited {
		<?php
		if ( $link_color ) {
			echo 'color: ' .esc_html( $link_color ). ';';
		};
		?>
	}

	.container a:hover, .container a:focus, .container a:active, .footer-widgets a:hover, footer-widgets a:focus, footer-widgets a:active,
	a.link-email:hover, a.link-email:focus, a.link-email:active, a.link-phone:hover, a.link-phone:focus, a.link-phone:active,
	#wrapper .widget ul.menu li a:hover, #wrapper .widget ul.menu li a:focus, #wrapper .widget ul.menu li a:active,
	#wrapper .widget ul.menu li ul.sub-menu li a:hover, #wrapper .widget ul.menu li ul.sub-menu li a:focus, #wrapper .widget ul.menu li ul.sub-menu li a:active,
	#wrapper .widget ul.menu .current_page_item a, #wrapper .widget ul.menu .current-menu-item a {
		<?php
		if ( $link_hover_color ) {
			echo 'color: ' .esc_html( $link_hover_color ). ';';
		};
		?>
		outline: none;
	}

	.container h1 a, .container h2 a, .container h3 a, .container h4 a, .container h5 a, .container h6 a,
	.container h1 a:link, .container h2 a:link, .container h3 a:link, .container h4 a:link, .container h5 a:link, .container h6 a:link,
	.container h1 a:visited, .container h2 a:visited, .container h3 a:visited, .container h4 a:visited, .container h5 a:visited, .container h6 a:visited {
		<?php
		if ( $heading_link_color ) {
			echo 'color: ' .esc_html( $heading_link_color ). ';';
		};
		?>
	}

	.container h1 a:hover, .container h2 a:hover, .container h3 a:hover, .container h4 a:hover, .container h5 a:hover, .container h6 a:hover,
	.container h1 a:focus, .container h2 a:focus, .container h3 a:focus, .container h4 a:focus, .container h5 a:focus, .container h6 a:focus,
	.container h1 a:active, .container h2 a:active, .container h3 a:active, .container h4 a:active, .container h5 a:active, .container h6 a:active {
		<?php
		if ( $heading_link_hover_color ) {
			echo 'color: ' .esc_html( $heading_link_hover_color ). ';';
		};
		?>
	}

	.container button, .button, a.button, a:link.button, a:visited.button, a.more-link, a:link.more-link, a:visited.more-link,
	.container .reply a, #searchsubmit, #prevLink a, #nextLink a, input#submit, #wrapper input[type='submit'],
	.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button {
		<?php
		if ( $button_color ) {
			echo 'background-color: ' .esc_html( $button_color ). ';';
		};
		?>
	}

	.container button:hover, .container button:focus, .container button:active, .button:hover, a:hover.button, a:focus.button, a:active.button,
	a:hover.more-link, a:focus.more-link, a:active.more-link, .container .reply a:hover, #searchsubmit:hover, #prevLink a:hover,
	#nextLink a:hover, input#submit:hover, #wrapper input[type='submit']:hover, .gallery a:hover,
	.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover {
		<?php
		if ( $button_hover_color ) {
			echo 'background-color: ' .esc_html( $button_hover_color ). ';';
		};
		?>
	}
		
	.container .r-tabs-accordion-title:focus a,
	.container .r-tabs-accordion-title:hover a,
	.container .r-tabs-accordion-title:active a{
		text-decoration: none;
		color: #fff;
	}	
		
	.r-tabs-accordion-title.r-tabs-state-active a {
    	color: #fff;
	}

	</style>

	<?php
}
add_action( 'wp_head', 'organic_origin_custom_styles', 100 );
