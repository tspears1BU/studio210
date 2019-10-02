<?php
/**
 * Theme customizer sanitization
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

/**
 * Sanitize Categories.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function organic_origin_sanitize_categories( $input ) {
	$categories = get_terms( 'category', array( 'fields' => 'ids', 'get' => 'all' ) );

	if ( in_array( $input, $categories, true ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Pages.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function organic_origin_sanitize_pages( $input ) {
	$pages = get_all_page_ids();

	if ( in_array( $input, $pages, true ) ) {
			return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Slideshow Transition Interval.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function organic_origin_sanitize_transition_interval( $input ) {
	 $valid = array(
			 '2000' 		=> esc_html__( '2 Seconds', 'organic-origin' ),
			 '4000' 		=> esc_html__( '4 Seconds', 'organic-origin' ),
			 '6000' 		=> esc_html__( '6 Seconds', 'organic-origin' ),
			 '8000' 		=> esc_html__( '8 Seconds', 'organic-origin' ),
			 '10000' 	=> esc_html__( '10 Seconds', 'organic-origin' ),
			 '12000' 	=> esc_html__( '12 Seconds', 'organic-origin' ),
			 '20000' 	=> esc_html__( '20 Seconds', 'organic-origin' ),
			 '30000' 	=> esc_html__( '30 Seconds', 'organic-origin' ),
			 '60000' 	=> esc_html__( '1 Minute', 'organic-origin' ),
			 '999999999'	=> esc_html__( 'Hold Frame', 'organic-origin' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Slideshow Transition Style.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function organic_origin_sanitize_transition_style( $input ) {
	 $valid = array(
			 'fade' 		=> esc_html__( 'Fade', 'organic-origin' ),
			 'slide' 	=> esc_html__( 'Slide', 'organic-origin' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Columns.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function organic_origin_sanitize_columns( $input ) {
	 $valid = array(
			 'one' 		=> esc_html__( 'One Column', 'organic-origin' ),
			 'two' 		=> esc_html__( 'Two Columns', 'organic-origin' ),
			 'three' 	=> esc_html__( 'Three Columns', 'organic-origin' ),
			 'four' 	=> esc_html__( 'Four Columns', 'organic-origin' ),
			 'five' 	=> esc_html__( 'Five Columns', 'organic-origin' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Alignment.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function organic_origin_sanitize_align( $input ) {
	 $valid = array(
			 'left' 		=> esc_html__( 'Left Align', 'organic-origin' ),
			 'center' 		=> esc_html__( 'Center Align', 'organic-origin' ),
			 'right' 	=> esc_html__( 'Right Align', 'organic-origin' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Colors.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function organic_origin_sanitize_title_color( $input ) {
	 $valid = array(
			 'black' 	=> esc_html__( 'Black', 'organic-origin' ),
			 'white' 	=> esc_html__( 'White', 'organic-origin' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Checkboxes.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function organic_origin_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Sanitize Text Input.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function organic_origin_sanitize_text( $input ) {
	 return wp_kses_post( force_balance_tags( $input ) );
}
