<?php
/**
 * Business Champ functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Business_Champ
 */

if ( ! function_exists( 'business_champ_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function business_champ_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Business Champ, use a find and replace
		 * to change 'business-champ' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'business-champ', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'business-champ-img-525-350' , 525 , 350 , array( 'center', 'top' ) );		

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary', 'business-champ' )			
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'business_champ_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'width'      => 170,
			'height'       => 40,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		
		}
endif;
add_action( 'after_setup_theme', 'business_champ_setup' );

add_action( 'widgets_init', 'business_champ_components_widget_init' );
function business_champ_components_widget_init() { 

register_sidebar( array(
        'name'          => esc_html__( 'Default Sidebar', 'business-champ' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'business-champ' ),
        'before_widget' => '<div id="%1$s" class="thumb-posts business-champ-flex-wrap %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
    'name' => __( 'Blog Sidebar', 'business-champ' ),
    'id' => 'business-champ-blog-sidebar',
    'description' => __( 'Widgets for blog', 'business-champ' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) ) ;

  
    

    register_sidebar( array(
    'name' => __( 'Sidebar 2', 'business-champ' ),
    'id' => 'business-champ-sidebar-2',
    'description' => __( 'Add widgets here', 'business-champ' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));

     register_sidebar( array(
    'name' => __( 'Sidebar 3', 'business-champ' ),
    'id' => 'business-champ-sidebar-3',
    'description' => __( 'Add widgets here', 'business-champ' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));

     
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_champ_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_champ_content_width', 640 );
}
add_action( 'after_setup_theme', 'business_champ_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function business_champ_scripts() {
	
	wp_enqueue_style( 'business-champ-font' , business_champ_get_font() , array(), '20151215' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '20151215' );	
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '20151215' );

    wp_enqueue_style('business-champ-style' , get_stylesheet_uri() , array() , '1.8' );

    wp_enqueue_style( 'business-champ-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0' );    
	

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'business-champ-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'business-champ-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.4', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_champ_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Recommended plugins
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Theme functions
 */
require get_template_directory() . '/inc/theme-functions.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


