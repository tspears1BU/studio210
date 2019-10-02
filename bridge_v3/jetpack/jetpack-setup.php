<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

/**
 * Add support for Jetpack's Featured Content and Infinite Scroll
 */

if ( ! function_exists( 'organic_origin_jetpack_setup' ) ) :

function organic_origin_jetpack_setup() {

	// See: http://jetpack.me/support/infinite-scroll/ for more.
	add_theme_support( 'infinite-scroll', array(
		'container' 			=> 'infinite-container',
		'wrapper'					=> false,
		'render' 					=> 'organic_origin_render_infinite',
		'footer_widgets' 	=> array( 'footer' ),
		'footer'         	=> 'wrap',
	) );

	// Add theme support for CPT.
	add_theme_support( 'jetpack-portfolio' );
	add_theme_support( 'jetpack-testimonial' );

}
endif;
add_action( 'after_setup_theme', 'organic_origin_jetpack_setup' );

/**
 * Infinite Scroll: function for rendering posts
 */

if ( ! function_exists( 'organic_origin_render_infinite' ) ) :

function organic_origin_render_infinite() {
	if ( is_home() ) {
		get_template_part( 'content/loop', 'blog' );
	} else {
		get_template_part( 'content/loop', 'archive' );
	}
}
endif;

/**
 * Enables Jetpack's Infinite Scroll in archives, but not on home blog.
 *
 * @return bool
 */

if ( ! function_exists( 'organic_origin_jetpack_infinite_scroll_supported' ) ) :

function organic_origin_jetpack_infinite_scroll_supported() {
	return current_theme_supports( 'infinite-scroll' ) && ( is_archive() || is_search() ) && ! is_home();
}
endif;
add_filter( 'infinite_scroll_archive_supported', 'organic_origin_jetpack_infinite_scroll_supported' );
