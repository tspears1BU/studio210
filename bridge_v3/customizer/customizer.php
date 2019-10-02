<?php
/**
 * Theme customizer with real-time update
 *
 * Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

/**
 * Begin the customizer functions.
 *
 * @param array $wp_customize Returns classes and sanitized inputs.
 */
function organic_origin_theme_customizer( $wp_customize ) {

	include( get_template_directory() . '/customizer/customizer-controls.php');

	include( get_template_directory() . '/customizer/customizer-sanitize.php');

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @since Organic Origin 1.0
	 * @see organic_origin_customize_register()
	 *
	 * @return void
	 */
	function organic_origin_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @since Organic Origin 1.0
	 * @see organic_origin_customize_register()
	 *
	 * @return void
	 */
	function organic_origin_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	// Set site name and description text to be previewed in real-time.
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'organic_origin_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'organic_origin_customize_partial_blogdescription',
		) );
	}

	/*
	-------------------------------------------------------------------------------------------------------
		Site Title Section
	-------------------------------------------------------------------------------------------------------
	*/

		// Custom Display Site Title Option.
		$wp_customize->add_setting( 'organic_origin_site_title', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'organic_origin_sanitize_checkbox',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'organic_origin_site_title', array(
			'label'			=> esc_html__( 'Display Site Title', 'organic-origin' ),
			'type'			=> 'checkbox',
			'section'		=> 'title_tagline',
			'settings'	=> 'organic_origin_site_title',
			'priority'	=> 10,
		) ) );

		// Custom Display Tagline Option.
		$wp_customize->add_setting( 'organic_origin_site_tagline', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'organic_origin_sanitize_checkbox',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'organic_origin_site_tagline', array(
			'label'			=> esc_html__( 'Display Site Tagline', 'organic-origin' ),
			'type'			=> 'checkbox',
			'section'		=> 'title_tagline',
			'settings'	=> 'organic_origin_site_tagline',
			'priority'	=> 15,
		) ) );

		// Logo Align.
		$wp_customize->add_setting( 'organic_origin_logo_align', array(
				'default' 					=> 'left',
				'sanitize_callback'	=> 'organic_origin_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'organic_origin_logo_align', array(
				'type'			=> 'radio',
				'label' 		=> esc_html__( 'Logo & Title Alignment', 'organic-origin' ),
				'section' 	=> 'title_tagline',
				'choices' 	=> array(
						'left' 		=> esc_html__( 'Left Align', 'organic-origin' ),
						'center' 	=> esc_html__( 'Center Align', 'organic-origin' ),
						'right' 	=> esc_html__( 'Right Align', 'organic-origin' ),
				),
				'priority' => 20,
		) ) );

		// Site Description Align.
		$wp_customize->add_setting( 'organic_origin_desc_align', array(
			'default'						=> 'center',
			'sanitize_callback'	=> 'organic_origin_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'organic_origin_desc_align', array(
			'type' 		=> 'radio',
			'label' 	=> esc_html__( 'Site Description Alignment', 'organic-origin' ),
			'section' => 'title_tagline',
			'choices' => array(
				'left' 		=> esc_html__( 'Left Align', 'organic-origin' ),
				'center' 	=> esc_html__( 'Center Align', 'organic-origin' ),
				'right' 	=> esc_html__( 'Right Align', 'organic-origin' ),
			),
			'priority' => 25,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Colors Section
		-------------------------------------------------------------------------------------------------------
		*/

		// Nav Background.
		$wp_customize->add_setting( 'organic_origin_colors_nav', array(
			'default'						=> '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'organic_origin_colors_nav', array(
			'label'			=> esc_html__( 'Menu Background Color', 'organic-origin' ),
			'section'		=> 'colors',
			'settings'	=> 'organic_origin_colors_nav',
			'priority'	=> 10,
		) ) );

		// Footer Background Color.
		$wp_customize->add_setting( 'organic_origin_colors_footer', array(
			'default'						=> '#f4f4f4',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'organic_origin_colors_footer', array(
			'label'			=> esc_html__( 'Footer Background Color', 'organic-origin' ),
			'section'		=> 'colors',
			'settings'	=> 'organic_origin_colors_footer',
			'priority'	=> 30,
		) ) );

		// Link Color.
		$wp_customize->add_setting( 'organic_origin_colors_links', array(
			'default'						=> '#3399cc',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'organic_origin_colors_links', array(
			'label'			=> esc_html__( 'Link Color', 'organic-origin' ),
			'section'		=> 'colors',
			'settings'	=> 'organic_origin_colors_links',
			'priority'	=> 40,
		) ) );

		// Link Hover Color.
		$wp_customize->add_setting( 'organic_origin_colors_links_hover', array(
			'default'						=> '#006699',
			'sanitize_callback'	=> 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'organic_origin_colors_links_hover', array(
			'label'			=> esc_html__( 'Link Hover Color', 'organic-origin' ),
			'section'		=> 'colors',
			'settings'	=> 'organic_origin_colors_links_hover',
			'priority'	=> 50,
		) ) );

		// Heading Link Color.
		$wp_customize->add_setting( 'organic_origin_colors_heading_links', array(
			'default'						=> '#000000',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'organic_origin_colors_heading_links', array(
			'label'			=> esc_html__( 'Heading Link Color', 'organic-origin' ),
			'section'		=> 'colors',
			'settings'	=> 'organic_origin_colors_heading_links',
			'priority'	=> 60,
		) ) );

		// Heading Link Hover Color.
		$wp_customize->add_setting( 'organic_origin_colors_heading_links_hover', array(
			'default' 					=> '#006699',
			'sanitize_callback'	=> 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'organic_origin_colors_heading_links_hover', array(
			'label'			=> esc_html__( 'Heading Link Hover Color', 'organic-origin' ),
			'section'		=> 'colors',
			'settings'	=> 'organic_origin_colors_heading_links_hover',
			'priority'	=> 70,
		) ) );

		// Button Color.
		$wp_customize->add_setting( 'organic_origin_colors_button', array(
			'default'						=> '#3399cc',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'organic_origin_colors_button', array(
			'label'			=> esc_html__( 'Button Color', 'organic-origin' ),
			'section'		=> 'colors',
			'settings'	=> 'organic_origin_colors_button',
			'priority'	=> 80,
		) ) );

		// Button Hover Color.
		$wp_customize->add_setting( 'organic_origin_colors_button_hover', array(
			'default'						=> '#006699',
			'sanitize_callback'	=> 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'organic_origin_colors_button_hover', array(
			'label'			=> esc_html__( 'Button Hover Color', 'organic-origin' ),
			'section'		=> 'colors',
			'settings'	=> 'organic_origin_colors_button_hover',
			'priority'	=> 90,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Theme Options Panel
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_panel( 'organic_origin_theme_options', array(
			'priority'				=> 1,
			'capability'			=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title'						=> esc_html__( 'Theme Options', 'organic-origin' ),
			'description'			=> esc_html__( 'This panel allows you to customize specific areas of the theme.', 'organic-origin' ),
		) );

		/*
		-------------------------------------------------------------------------------------------------------
			Page Templates Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'organic_origin_templates_section' , array(
			'title'			=> esc_html__( 'Page Template Options', 'organic-origin' ),
			'priority'	=> 100,
			'panel'			=> 'organic_origin_theme_options',
		) );

		// Project Category.
		$wp_customize->add_setting( 'organic_origin_project_category', array(
			'default' => '1',
			'sanitize_callback' => 'organic_origin_sanitize_categories',
		) );
		$wp_customize->add_control( new Organic_Origin_Category_Dropdown_Control( $wp_customize, 'organic_origin_project_category', array(
			'type'	=> 'dropdown-categories',
			'label' => esc_html__( 'Portfolio Template Category', 'organic-origin' ),
			'section' => 'organic_origin_templates_section',
			'settings'	=> 'organic_origin_project_category',
			'priority' => 40,
		) ) );

		// Testimonials Category.
		$wp_customize->add_setting( 'organic_origin_testimonial_category', array(
			'default' => '1',
			'sanitize_callback' => 'organic_origin_sanitize_categories',
		) );
		$wp_customize->add_control( new Organic_Origin_Category_Dropdown_Control( $wp_customize, 'organic_origin_testimonial_category', array(
			'type'	=> 'dropdown-categories',
			'label' => esc_html__( 'Testimonials Template Category', 'organic-origin' ),
			'section' => 'organic_origin_templates_section',
			'settings'	=> 'organic_origin_testimonial_category',
			'priority' => 60,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Slideshow Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'organic_origin_slider_section' , array(
			'title'			=> esc_html__( 'Slideshow Settings', 'organic-origin' ),
			'description' => esc_html__( 'Options for changing the slideshow transition time and style.', 'organic-origin' ),
			'priority'	=> 102,
			'panel'			=> 'organic_origin_theme_options',
		) );

		// Slider Transition Interval.
		$wp_customize->add_setting( 'organic_origin_transition_interval', array(
			'default'						=> '12000',
			'sanitize_callback' => 'organic_origin_sanitize_transition_interval',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'organic_origin_transition_interval', array(
			'type' 		=> 'select',
			'label' 	=> esc_html__( 'Transition Interval', 'organic-origin' ),
			'section' => 'organic_origin_slider_section',
			'choices' => array(
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
			),
			'priority' => 10,
		) ) );

		// Slideshow Transition Style.
		$wp_customize->add_setting( 'organic_origin_transition_style', array(
			'default'						=> 'fade',
			'sanitize_callback' => 'organic_origin_sanitize_transition_style',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'organic_origin_transition_style', array(
			'type' 		=> 'select',
			'label' 	=> esc_html__( 'Transition Style', 'organic-origin' ),
			'section' => 'organic_origin_slider_section',
			'choices' => array(
				'fade' 		=> __( 'Fade', 'organic-origin' ),
				'slide' 	=> __( 'Slide', 'organic-origin' ),
			),
			'priority' => 20,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Layout Options
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'organic_origin_layout_section' , array(
			'title'			=> esc_html__( 'Layout', 'organic-origin' ),
			'description' => esc_html__( 'Toggle the display and layout of various elements throughout the theme.', 'organic-origin' ),
			'priority'	=> 104,
			'panel'			=> 'organic_origin_theme_options',
		) );

		// Project Columns Option.
		$wp_customize->add_setting( 'project_columns', array(
			'default' => 'two',
			'sanitize_callback' => 'organic_origin_sanitize_columns',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'project_columns', array(
			'label' => esc_html__( 'Portfolio Project Columns', 'organic-origin' ),
			'section' => 'organic_origin_layout_section',
			'settings' => 'project_columns',
			'type' => 'radio',
			'choices' => array(
				'one' 		=> esc_html__( 'One Column', 'organic-origin' ),
				'two' 		=> esc_html__( 'Two Columns', 'organic-origin' ),
				'three' 	=> esc_html__( 'Three Columns', 'organic-origin' ),
				'four' 		=> esc_html__( 'Four Columns', 'organic-origin' ),
			),
			'priority' => 40,
		) ) );

		// Project Columns Option.
		$wp_customize->add_setting( 'testimonial_columns', array(
			'default' => 'four',
			'sanitize_callback' => 'organic_origin_sanitize_columns',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'testimonial_columns', array(
			'label' => esc_html__( 'Testimonial Columns', 'organic-origin' ),
			'section' => 'organic_origin_layout_section',
			'settings' => 'testimonial_columns',
			'type' => 'radio',
			'choices' => array(
				'two' 		=> esc_html__( 'Two Columns', 'organic-origin' ),
				'three' 	=> esc_html__( 'Three Columns', 'organic-origin' ),
				'four' 		=> esc_html__( 'Four Columns', 'organic-origin' ),
				'five' 		=> esc_html__( 'Five Columns', 'organic-origin' ),
			),
			'priority' => 60,
		) ) );

		// Display Post Image Title Overlay.
		$wp_customize->add_setting( 'display_img_title_post', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'organic_origin_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_img_title_post', array(
			'label'			=> esc_html__( 'Overlay Post Title On Featured Image?', 'organic-origin' ),
			'section'		=> 'organic_origin_layout_section',
			'settings'	=> 'display_img_title_post',
			'type'			=> 'checkbox',
			'priority'	=> 80,
		) ) );

		// Display Page Image Title Overlay.
		$wp_customize->add_setting( 'display_img_title_page', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'organic_origin_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_img_title_page', array(
			'label'			=> esc_html__( 'Overlay Page Title On Featured Image?', 'organic-origin' ),
			'section'		=> 'organic_origin_layout_section',
			'settings'	=> 'display_img_title_page',
			'type'			=> 'checkbox',
			'priority'	=> 100,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Footer Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'organic_origin_footer_section' , array(
			'title'				=> esc_html__( 'Footer', 'organic-origin' ),
			'description' => esc_html__( 'Replace the footer text. The footer social media links can be added by creating a Social Menu in the Menus section.', 'organic-origin' ),
			'priority'		=> 120,
		) );

		// Footer Text.
		$wp_customize->add_setting( 'organic_origin_footer_text', array(
			'sanitize_callback'	=> 'organic_origin_sanitize_text',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'organic_origin_footer_text', array(
			'label'			=> esc_html__( 'Footer Text', 'organic-origin' ),
			'section'		=> 'organic_origin_footer_section',
			'settings'	=> 'organic_origin_footer_text',
			'type'			=> 'text',
			'priority'	=> 10,
		) ) );

}
add_action( 'customize_register', 'organic_origin_theme_customizer' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 */
function organic_origin_customize_preview_js() {
	wp_enqueue_script( 'origin-customizer', get_template_directory_uri() . '/customizer/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'organic_origin_customize_preview_js' );
