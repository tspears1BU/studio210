<?php
/**
 * This file includes the theme functions.
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

/*
-------------------------------------------------------------------------------------------------------
	Theme Setup
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_origin_setup' ) ) :

	/** Function organic_origin_setup */
	function organic_origin_setup() {

		/*
		* Enable support for translation.
		*/
		load_theme_textdomain( 'organic-origin', get_template_directory() . '/languages' );

		/*
		* Enable support for RSS feed links to head.
		*/
		add_theme_support( 'automatic-feed-links' );

		/*
		* Enable support for post thumbnails.
		*/
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'origin-featured-large', 2400, 1800, true ); // Large Featured Image.
		add_image_size( 'origin-featured-medium', 1200, 800, true ); // Medium Featured Image.
		add_image_size( 'origin-featured-small', 640, 640, true ); // Small Featured Image.
		add_image_size( 'origin-featured-square', 1200, 1200, true ); // Square Featured Image.

		/*
		* Enable support for site title tag.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for custom logo.
		*/
		add_theme_support( 'custom-logo', array(
			'height'      => 80,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		/*
		* Enable support for custom menus.
		*/
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'organic-origin' ),
			'social-menu' => esc_html__( 'Social Menu', 'organic-origin' ),
		));

		/*
		* Enable support for custom header.
		*/
		register_default_headers( array(
			'default' => array(
			'url'   => get_template_directory_uri() . '/images/default-header.jpg',
			'thumbnail_url' => get_template_directory_uri() . '/images/default-header.jpg',
			'description'   => esc_html__( 'Default Custom Header', 'organic-origin' ),
			),
		));
		$defaults = array(
			'video' 							=> true,
			'width'								=> 1800,
			'height'							=> 480,
			'flex-height'					=> true,
			'flex-width'					=> true,
			'default-image' 			=> get_template_directory_uri() . '/images/default-header.jpg',
			'header-text'					=> false,
			'uploads'							=> true,
		);
		add_theme_support( 'custom-header', $defaults );

		/*
		* Enable support for custom background.
		*/
		$defaults = array(
			'default-color'          => 'ffffff',
		);
		add_theme_support( 'custom-background', $defaults );

		/*
		* Enable theme starter content.
		*/
		add_theme_support( 'starter-content', array(

			// Starter theme options.
			'theme_mods' => array(
				'organic_origin_site_title' => '',
			),

			// Set default theme logo and title.
			'options' => array(
				'custom_logo' => '{{logo}}',
				'blogname' => __( 'Origin Theme', 'organic-origin' ),
				'blogdescription' => __( 'My <b>Awesome</b> Organic Theme', 'organic-origin' ),
			),

			// Starter pages to include.
			'posts' => array(
				'about' => array(
					'thumbnail' => '{{image-about}}',
				),
				'services' => array(
					'post_type' => 'page',
					'post_title' => __( 'Services', 'organic-origin' ),
					'post_content' => __( '<p>This is an example services page. You may want to write about the various services your company provides.</p>', 'organic-origin' ),
					'thumbnail' => '{{image-services}}',
				),
				'contact' => array(
					'thumbnail' => '{{image-contact}}',
				),
			),

			// Starter attachments for default images.
			'attachments' => array(
				'logo' => array(
					'post_title' => __( 'Logo', 'organic-origin' ),
					'file' => 'images/logo.png',
				),
				'image-about' => array(
					'post_title' => __( 'About Image', 'organic-origin' ),
					'file' => 'images/image-about.jpg',
				),
				'image-services' => array(
					'post_title' => __( 'Services Image', 'organic-origin' ),
					'file' => 'images/image-services.jpg',
				),
				'image-contact' => array(
					'post_title' => __( 'Contact Image', 'organic-origin' ),
					'file' => 'images/image-contact.jpg',
				),
			),

			// Add pages to primary navigation menu.
			'nav_menus' => array(
				'main-menu' => array(
					'name' => __( 'Primary Navigation', 'organic-origin' ),
					'items' => array(
						'link_home',
						'page_about',
						'page_services' => array(
							'type' => 'post_type',
							'object' => 'page',
							'object_id' => '{{services}}',
						),
						'page_contact',
					),
				)
			),

			// Add test widgets to footer.
			'widgets' => array(
				'footer' => array(
					'meta',
					'recent-posts',
					'text_about',
					'text_business_info',
				)
			)

		));

	}
endif; // End function organic_origin_setup.
add_action( 'after_setup_theme', 'organic_origin_setup' );


/*
-------------------------------------------------------------------------------------------------------
	Register Scripts
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_origin_enqueue_scripts' ) ) {

	/** Function organic_origin_enqueue_scripts */
	function organic_origin_enqueue_scripts() {

		// Enqueue Styles.
		wp_enqueue_style( 'organic-origin-style', get_stylesheet_uri() );
		wp_enqueue_style( 'organic-origin-style-conditionals', get_template_directory_uri() . '/css/style-conditionals.css', array( 'organic-origin-style' ), '1.0' );
		wp_enqueue_style( 'organic-origin-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'organic-origin-style' ), '1.0' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( 'organic-origin-style' ), '1.0' );
		wp_enqueue_style( 'dlmenu-style', get_template_directory_uri() . '/css/dlmenu-component.css', '1.0');
	    wp_enqueue_style( 'respo-tabs-style', get_template_directory_uri() . '/css/responsive-tabs.css', '1.0');

		// Resgister Scripts.
		wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery', 'hoverIntent' ), '1.0' );
		wp_register_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0' );
		wp_register_script( 'jquery-colourbrightness', get_template_directory_uri() . '/js/jquery.colourbrightness.js', array( 'jquery' ), '1.0' );
		wp_register_script('dlmenu', get_template_directory_uri() . '/js/jquery.dlmenu.js', 'jquery', '', true);
		wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.custom.js');
		wp_register_script('respo-tab', get_template_directory_uri() . '/js/jquery.responsiveTabs.js', 'jquery', '', true);

		// Enqueue Scripts.
		wp_enqueue_script( 'hoverIntent' );
		wp_enqueue_script('modernizr');
		wp_enqueue_script('dlmenu');
		wp_enqueue_script('respo-tab');
		wp_enqueue_script( 'organic-origin-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
		wp_enqueue_script( 'organic-origin-lightordark', get_template_directory_uri() . '/js/jquery.lightordark.js', array( 'jquery' ), '1.0' );
		wp_enqueue_script( 'organic-origin-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'superfish', 'jquery-fitvids', 'jquery-colourbrightness', 'masonry' ), '1.0', true );

		// Load Flexslider on front page and slideshow page template.
		if ( is_page_template( 'template-slideshow.php' || 'template-home' ) ) {
			wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '20130729' );
		}

		// Load single scripts only on single pages.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'organic_origin_enqueue_scripts' );


/*
-------------------------------------------------------------------------------------------------------
	ACF Options Page
-------------------------------------------------------------------------------------------------------
*/

function my_acf_options_page_settings( $settings ) {
    
    $settings['title'] = 'General Options';
    $settings['pages'] = array('Header', 'Footer');
	$settings['position'] = 40;

    return $settings;
    
}

add_filter('acf/options_page/settings', 'my_acf_options_page_settings');

/*
-------------------------------------------------------------------------------------------------------
	Add ACF Custom Fileds to Daily Calls RSS Feed
-------------------------------------------------------------------------------------------------------
*/
function acf_dailyCall_feed($title) {
	if(is_feed()) {
		$post_id = get_the_ID(); 
		$callType = get_field('call_type');
		if ($callType) :
		
			$output .= ' - ';
			$output .= $callType;
		endif;
		
		$title = $title.$output;
	}
	return $title;
}
add_filter( 'the_title_rss', 'acf_dailyCall_feed');

function myfeed_request($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type']))
		$qv['post_type'] = array('post', 'daily_call');
	return $qv;
}
add_filter('request', 'myfeed_request');

/*
-------------------------------------------------------------------------------------------------------
	Add Daily Call to Main RSS Feed
-------------------------------------------------------------------------------------------------------
*/
//function myfeed_request($qv) {
//	if (isset($qv['feed']) && !isset($qv['post_type']))
//		$qv['post_type'] = array('post', 'daily_call');
//	return $qv;
//}
//add_filter('request', 'myfeed_request');
/*
-------------------------------------------------------------------------------------------------------
	Theme Updater
-------------------------------------------------------------------------------------------------------
*/

/** Function organic_origin_theme_updater */
function organic_origin_theme_updater() {
	require( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'organic_origin_theme_updater' );

/*
-------------------------------------------------------------------------------------------------------
	Category ID to Name
-------------------------------------------------------------------------------------------------------
*/

/**
 * Changes category IDs to names.
 *
 * @param array $id IDs for categories.
 * @return array
 */

if ( ! function_exists( 'organic_origin_cat_id_to_name' ) ) :

function organic_origin_cat_id_to_name( $id ) {
	$cat = get_category( $id );
	if ( is_wp_error( $cat ) ) {
		return false; }
	return $cat->cat_name;
}
endif;

/*
-------------------------------------------------------------------------------------------------------
	Register Sidebars
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_origin_widgets_init' ) ) :

/** Function organic_origin_widgets_init */
function organic_origin_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__( 'Default Sidebar', 'organic-origin' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', 'organic-origin' ),
		'id' => 'sidebar-blog',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widgets', 'organic-origin' ),
		'id' => 'footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="footer-widget">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
endif;
add_action( 'widgets_init', 'organic_origin_widgets_init' );

/*
-------------------------------------------------------------------------------------------------------
	Posted On Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_origin_posted_on' ) ) :

/** Function organic_origin_posted_on */
function organic_origin_posted_on() {
	if ( get_the_modified_time() != get_the_time() ) {
		printf( __( '<span class="%1$s">Updated:</span> %2$s', 'organic-origin' ),
			'meta-prep meta-prep-author',
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				esc_url( get_permalink() ),
				esc_attr( get_the_modified_time() ),
				esc_attr( get_the_modified_date() )
			)
		);
	} else {
		printf( __( '<span class="%1$s">Posted:</span> %2$s', 'organic-origin' ),
			'meta-prep meta-prep-author',
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				get_the_date()
			)
		);
	}
}
endif;

/*
------------------------------------------------------------------------------------------------------
	Content Width
------------------------------------------------------------------------------------------------------
*/

if ( ! isset( $content_width ) ) { $content_width = 760; }

if ( ! function_exists( 'organic_origin_content_width' ) ) :

/** Function organic_origin_content_width */
function organic_origin_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'organic_origin_content_width', 760 );
}
endif;
add_action( 'after_setup_theme', 'organic_origin_content_width', 0 );

/*
-------------------------------------------------------------------------------------------------------
	Comments Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_origin_comment' ) ) :

	/**
	 * Setup our comments for the theme.
	 *
	 * @param array $comment IDs for categories.
	 * @param array $args Comment arguments.
	 * @param array $depth Level of replies.
	 */
	function organic_origin_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'organic-origin' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'organic-origin' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
			default :
		?>
		<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">

		<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 72;
					if ( '0' != $comment->comment_parent ) {
						$avatar_size = 48; }

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s <br/> %2$s <br/>', 'organic-origin' ),
							sprintf( '<span class="fn">%s</span>', wp_kses_post( get_comment_author_link() ) ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( esc_html__( '%1$s, %2$s', 'organic-origin' ), get_comment_date(), get_comment_time() )
							)
						);
						?>
					</div><!-- END .comment-author .vcard -->
				</footer>

				<div class="comment-content">
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'organic-origin' ); ?></em>
					<br />
				<?php endif; ?>
					<?php comment_text(); ?>
					<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'organic-origin' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
					<?php edit_comment_link( esc_html__( 'Edit', 'organic-origin' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

			</article><!-- #comment-## -->

		<?php
		break;
		endswitch;
	}
endif; // Ends check for organic_origin_comment().

/*
-------------------------------------------------------------------------------------------------------
	Custom Excerpt
-------------------------------------------------------------------------------------------------------
*/

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Organic Origin 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function organic_origin_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'organic-origin' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'organic_origin_excerpt_more' );

/*
-------------------------------------------------------------------------------------------------------
	Add Excerpt To Pages
-------------------------------------------------------------------------------------------------------
*/

/**
 * Add excerpt to pages.
 */

add_action( 'init', 'organic_origin_page_excerpts' );
function organic_origin_page_excerpts() {
	add_post_type_support( 'page', 'excerpt' );
}

/*
-------------------------------------------------------------------------------------------------------
	Custom Page Links
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds custom page links to pages.
 *
 * @param array $args for page links.
 * @return array
 */

if ( ! function_exists( 'organic_origin_wp_link_pages_args_prevnext_add' ) ) :

function organic_origin_wp_link_pages_args_prevnext_add( $args ) {
	global $page, $numpages, $more, $pagenow;

	if ( ! $args['next_or_number'] == 'next_and_number' ) {
		return $args; }

	$args['next_or_number'] = 'number'; // Keep numbering for the main part.
	if ( ! $more ) {
		return $args; }

	if ( $page -1 ) { // There is a previous page.
		$args['before'] .= _wp_link_page( $page -1 )
			. $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'; }

	if ( $page < $numpages ) { // There is a next page.
		$args['after'] = _wp_link_page( $page + 1 )
			. $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
			. $args['after']; }

	return $args;
}
endif;
add_filter( 'wp_link_pages_args', 'organic_origin_wp_link_pages_args_prevnext_add' );

/*
-------------------------------------------------------------------------------------------------------
	Remove First Gallery
-------------------------------------------------------------------------------------------------------
*/

/**
 * Removes first gallery shortcode from slideshow page template.
 *
 * @param array $content Content output on slideshow page template.
 * @return array
 */

if ( ! function_exists( 'organic_origin_remove_gallery' ) ) :

function organic_origin_remove_gallery( $content ) {
	if ( is_page_template( 'template-slideshow.php' ) ) {
		$regex = get_shortcode_regex( array( 'gallery' ) );
		$content = preg_replace( '/'. $regex .'/s', '', $content, 1 );
		$content = wp_kses_post( $content );
	}
	return $content;
}
endif;
add_filter( 'the_content', 'organic_origin_remove_gallery' );

/*
-------------------------------------------------------------------------------------------------------
	Body Class
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

if ( ! function_exists( 'organic_origin_body_class' ) ) :

function organic_origin_body_class( $classes ) {

	$header_image = get_header_image();
	$post_pages = is_home() || is_archive() || is_search() || is_attachment();

	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
		$classes[] = 'origin-has-logo'; }

	if ( is_page_template( 'template-landing.php' ) ) {
		$classes[] = 'origin-landing-page'; }

	if ( is_page_template( 'template-slideshow.php' ) ) {
		$classes[] = 'origin-slideshow'; }

	if ( 'left' == get_theme_mod( 'organic_origin_logo_align', 'left' ) ) {
		$classes[] = 'origin-logo-left'; }

	if ( 'center' == get_theme_mod( 'organic_origin_logo_align', 'left' ) ) {
		$classes[] = 'origin-logo-center'; }

	if ( 'right' == get_theme_mod( 'organic_origin_logo_align', 'left' ) ) {
		$classes[] = 'origin-logo-right'; }

	if ( 'left' == get_theme_mod( 'organic_origin_desc_align', 'center' ) ) {
		$classes[] = 'origin-desc-left'; }

	if ( 'center' == get_theme_mod( 'organic_origin_desc_align', 'center' ) ) {
		$classes[] = 'origin-desc-center'; }

	if ( 'right' == get_theme_mod( 'organic_origin_desc_align', 'center' ) ) {
		$classes[] = 'origin-desc-right'; }

	if ( 'blank' != get_theme_mod( 'organic_origin_site_tagline' ) ) {
		$classes[] = 'origin-desc-active';
	} else {
		$classes[] = 'origin-desc-inactive';
	}

	if ( is_singular() && ! has_post_thumbnail() ) {
		$classes[] = 'origin-no-img'; }

	if ( is_singular() && has_post_thumbnail() ) {
		$classes[] = 'origin-has-img'; }

	if ( $post_pages && ! empty( $header_image ) || is_page() && ! has_post_thumbnail() && ! empty( $header_image ) ) {
		$classes[] = 'origin-header-active';
	} else {
		$classes[] = 'origin-header-inactive';
	}

	if ( is_header_video_active() && has_header_video() ) {
		$classes[] = 'origin-header-video-active';
	} else {
		$classes[] = 'origin-header-video-inactive';
	}

	if ( is_singular() ) {
		$classes[] = 'origin-singular';
	}

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'origin-sidebar-1';
	}

	if ( '' != get_theme_mod( 'background_image' ) ) {
		// This class will render when a background image is set
		// regardless of whether the user has set a color as well.
		$classes[] = 'origin-background-image';
	} else if ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ), true ) ) {
		// This class will render when a background color is set
		// but no image is set. In the case the content text will
		// Adjust relative to the background color.
		$classes[] = 'origin-relative-text';
	}

	return $classes;
}
endif;
add_action( 'body_class', 'organic_origin_body_class' );

/*
-------------------------------------------------------------------------------------------------------
	Includes
-------------------------------------------------------------------------------------------------------
*/

require_once( get_template_directory() . '/customizer/customizer.php' );
require_once( get_template_directory() . '/includes/style-options.php' );
require_once( get_template_directory() . '/includes/typefaces.php' );
require_once( get_template_directory() . '/includes/plugin-activation.php' );
require_once( get_template_directory() . '/includes/plugin-activation-class.php' );

/*
-------------------------------------------------------------------------------------------------------
	Load Jetpack File
-------------------------------------------------------------------------------------------------------
*/

if ( class_exists( 'Jetpack' ) ) {
	require get_template_directory() . '/jetpack/jetpack-setup.php';
}

/*
-------------------------------------------------------------------------------------------------------
	Load WooCommerce File
-------------------------------------------------------------------------------------------------------
*/

if ( class_exists( 'Woocommerce' ) ) {
	require get_template_directory() . '/includes/woocommerce-setup.php';
}

//Register User Field - ACF ---------------------------------------------------------------------------

if(function_exists('register_field'))
{
register_field('Users_field', dirname(__File__) . '/fields/users_field.php');
}


/*---------Remove Wordpress Logo from Admin Bar -------------- */
 
function remove_wp_logo() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('wp-logo');  
}  
add_action( 'wp_before_admin_bar_render', 'remove_wp_logo' );  

/* 
 * Disable the Search Icon and Input within the Admin Bar 
 */  
function disable_bar_search() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('search');  
}  
add_action( 'wp_before_admin_bar_render', 'disable_bar_search' );  

/* ----------------------------------------------------------------------------------------------------
    The Bridge Custom Post Types and Taxonomies 
------------------------------------------------------------------------------------------------------*/

//Create Production Post Type ----------------------------------------------------
add_action( 'init', 'create_my_post_types2' );

function create_my_post_types2() {
	register_post_type( 'production', 
		array(
			'labels' => array(
                                'name' => __( 'Productions' ),
                                'singular_name' => __( 'Production' ),
                                'add_new' => __( 'Add New' ),
                                'add_new_item' => __( 'Add New Production' ),
                                'edit' => __( 'Edit' ),
                                'edit_item' => __( 'Edit Production' ),
                                'new_item' => __( 'New Production' ),
                                'view' => __( 'View Production' ),
                                'view_item' => __( 'View Production' ),
                                'search_items' => __( 'Search Productions' ),
                                'not_found' => __( 'No Productions found' ),
                                'not_found_in_trash' => __( 'No Productions found in Trash' ),
                                'parent' => __( 'Parent Production' )
                                ),
            'description' => __( 'A Production is a type of content that is the most wonderful content in the world.' ),
			'public' => true,
            'show_ui' => true,
	    'show_in_menu' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-star-filled',
            'hierarchical' => true,
            'query_var' => true,
            /* Global control over capabilities. */
            'capability_type' => 'production',
            
            /* Specific control over capabilities. */
            'capabilities' => array(
                                    'edit_post' => 'edit_production',
                                    'edit_posts' => 'edit_productions',
                                    'edit_others_posts' => 'edit_others_productions',
                                    'publish_posts' => 'publish_productions',
                                    'read_post' => 'read_production',
                                    'read_private_posts' => 'read_private_productions',
                                    'delete_post' => 'delete_production',
                                    ),
             'supports' => array( 'title','page-attributes','thumbnail' ),
	     'map_meta_cap' => true,
	     'has_archive' => true,	
             'rewrite' => array( 'slug' => 'production', 'with_front' => false ),
             'can_export' => true
             )
	);
}

//map cap for Production
add_filter( 'map_meta_cap', 'my_map_meta_cap2', 10, 4 );

function my_map_meta_cap2( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a production, get the post and post type object. */
	if ( 'edit_production' == $cap || 'delete_production' == $cap || 'read_production' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a production, assign the required capability. */
	if ( 'edit_production' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a production, assign the required capability. */
	elseif ( 'delete_production' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private production, assign the required capability. */
	elseif ( 'read_production' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

//Create Script Post Type-----------------------------------------------------------
add_action( 'init', 'create_my_post_types3' );

function create_my_post_types3() {
	register_post_type( 'script', 
		array(
			'labels' => array(
                                'name' => __( 'Scripts' ),
                                'singular_name' => __( 'Script' ),
                                'add_new' => __( 'Add New' ),
                                'add_new_item' => __( 'Add New Script' ),
                                'edit' => __( 'Edit' ),
                                'edit_item' => __( 'Edit Script' ),
                                'new_item' => __( 'New Script' ),
                                'view' => __( 'View Script' ),
                                'view_item' => __( 'View Script' ),
                                'search_items' => __( 'Search Scripts' ),
                                'not_found' => __( 'No Scripts found' ),
                                'not_found_in_trash' => __( 'No Scripts found in Trash' ),
                                'parent' => __( 'Parent Script' )
                                ),
            'description' => __( 'A Script is a type of content that is the most wonderful content in the world.' ),
			'public' => true,
            'show_ui' => true,
	    'show_in_menu' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_position' => 8,
            'menu_icon' => 'dashicons-book',
            'hierarchical' => false,
            'query_var' => true,
            /* Global control over capabilities. */
            'capability_type' => 'script',
            
            /* Specific control over capabilities. */
            'capabilities' => array(
                                    'edit_post' => 'edit_script',
                                    'edit_posts' => 'edit_scripts',
                                    'edit_others_posts' => 'edit_others_scripts',
                                    'publish_posts' => 'publish_scripts',
                                    'read_post' => 'read_script',
                                    'read_private_posts' => 'read_private_scripts',
                                    'delete_post' => 'delete_script',
                                    ),
             'supports' => array( 'title' ),
	     'map_meta_cap' => true,
	     'has_archive' => true,	
             'rewrite' => array( 'slug' => 'scripts', 'with_front' => false ),
             'can_export' => true
             )
	);
}
//map cap for Script
add_filter( 'map_meta_cap', 'my_map_meta_cap3', 10, 4 );

function my_map_meta_cap3( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a script, get the post and post type object. */
	if ( 'edit_script' == $cap || 'delete_script' == $cap || 'read_script' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a script, assign the required capability. */
	if ( 'edit_script' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a script, assign the required capability. */
	elseif ( 'delete_script' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private script, assign the required capability. */
	elseif ( 'read_script' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

//Create Cast Post Type -----------------------------------------------------------------------
add_action( 'init', 'create_my_post_types6' );

function create_my_post_types6() {
	register_post_type( 'cast', 
		array(
			'labels' => array(
                                'name' => __( 'Casts' ),
                                'singular_name' => __( 'Cast' ),
                                'add_new' => __( 'Add New' ),
                                'add_new_item' => __( 'Add New Cast' ),
                                'edit' => __( 'Edit' ),
                                'edit_item' => __( 'Edit Cast' ),
                                'new_item' => __( 'New Cast' ),
                                'view' => __( 'View Cast' ),
                                'view_item' => __( 'View Cast' ),
                                'search_items' => __( 'Search Casts' ),
                                'not_found' => __( 'No Casts found' ),
                                'not_found_in_trash' => __( 'No Casts found in Trash' ),
                                'parent' => __( 'Parent Cast' )
                                ),
            'description' => __( 'A Cast is a type of content that is the most wonderful content in the world.' ),
			'public' => true,
            'show_ui' => true,
	    'show_in_menu' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_position' => 7,
            'menu_icon' => 'dashicons-megaphone',
            'hierarchical' => true,
            'query_var' => true,
            /* Global control over capabilities. */
            'capability_type' => 'cast',
            
            /* Specific control over capabilities. */
            'capabilities' => array(
                                    'edit_post' => 'edit_cast',
                                    'edit_posts' => 'edit_casts',
                                    'edit_others_posts' => 'edit_others_casts',
                                    'publish_posts' => 'publish_casts',
                                    'read_post' => 'read_cast',
                                    'read_private_posts' => 'read_private_casts',
                                    'delete_post' => 'delete_cast',
                                    ),
             'supports' => array( 'title','page-attributes','thumbnail' ),
	     'map_meta_cap' => true,
	     'has_archive' => true,	
             'rewrite' => array( 'slug' => 'casts', 'with_front' => false ),
             'can_export' => true
             )
	);
}
//map cap for Cast
add_filter( 'map_meta_cap', 'my_map_meta_cap6', 10, 4 );

function my_map_meta_cap6( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a cast, get the post and post type object. */
	if ( 'edit_cast' == $cap || 'delete_cast' == $cap || 'read_cast' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a cast, assign the required capability. */
	if ( 'edit_cast' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a cast, assign the required capability. */
	elseif ( 'delete_cast' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private cast, assign the required capability. */
	elseif ( 'read_cast' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

// Daily Call Custom Post Type ----------------------------------- */

//Create Daily Call Post Type
add_action( 'init', 'create_my_post_types7' );

function create_my_post_types7() {
	register_post_type( 'daily_call', 
		array(
			'labels' => array(
                                'name' => __( 'Daily Calls' ),
                                'singular_name' => __( 'Daily Call' ),
                                'add_new' => __( 'Add New' ),
                                'add_new_item' => __( 'Add New Daily Call' ),
                                'edit' => __( 'Edit' ),
                                'edit_item' => __( 'Edit Daily Call' ),
                                'new_item' => __( 'New Daily Call' ),
                                'view' => __( 'View Daily Call' ),
                                'view_item' => __( 'View Daily Call' ),
                                'search_items' => __( 'Search Daily Calls' ),
                                'not_found' => __( 'No Daily Calls found' ),
                                'not_found_in_trash' => __( 'No Daily Calls found in Trash' ),
                                'parent' => __( 'Parent Daily Call' )
                                ),
            'description' => __( 'A Daily Call is a type of content that is the most wonderful content in the world.' ),
			'public' => true,
            'show_ui' => true,
	    'show_in_menu' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_position' => 7,
            'menu_icon' => 'dashicons-clock',
            'hierarchical' => false,
            'query_var' => true,
            /* Global control over capabilities. */
            'capability_type' => 'daily_call',
            
            /* Specific control over capabilities. */
            'capabilities' => array(
                                    'edit_post' => 'edit_daily_call',
                                    'edit_posts' => 'edit_daily_calls',
                                    'edit_others_posts' => 'edit_others_daily_calls',
                                    'publish_posts' => 'publish_daily_calls',
                                    'read_post' => 'read_daily_call',
                                    'read_private_posts' => 'read_private_daily_calls',
                                    'delete_post' => 'delete_daily_call',
                                    ),
             'supports' => array( 'title','editor','page-attributes' ),
	     'map_meta_cap' => true,
	     'has_archive' => true,
             'rewrite' => array( 'slug' => 'daily-calls'),
             'can_export' => true
             )
	);
}
//map cap for Daily Call
add_filter( 'map_meta_cap', 'my_map_meta_cap7', 10, 4 );

function my_map_meta_cap7( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a cast, get the post and post type object. */
	if ( 'edit_daily_call' == $cap || 'delete_daily_call' == $cap || 'read_daily_call' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a cast, assign the required capability. */
	if ( 'edit_daily_call' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a cast, assign the required capability. */
	elseif ( 'delete_daily_call' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private cast, assign the required capability. */
	elseif ( 'read_daily_call' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}