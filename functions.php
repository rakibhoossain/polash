<?php
/**
 * Polash functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Polash
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'polash_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function polash_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Polash, use a find and replace
		 * to change 'polash' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'polash', get_template_directory() . '/languages' );

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
		add_image_size( 'post-thumb', 370, 250, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'polash' ),
				'social' => esc_html__( 'Social Links Menu', 'polash' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'polash_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'polash_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function polash_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'polash_content_width', 640 );
}
add_action( 'after_setup_theme', 'polash_content_width', 0 );

/**
 * Footer widget size implement.
 * Return []
 */
function magazil_footer_widget_size() {
	$widget_size = get_theme_mod( 'magazil_footer_widget_size', '3,4,5');
	if (empty($widget_size)) return;
	$widget_size_array = explode(',', $widget_size);
	if (empty($widget_size_array)) return;
	return $widget_size_array;
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function polash_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'polash' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add sidebar widgets here.', 'polash' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s mb-60">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title-box mb-35"><h3 class="widget-title-2">',
			'after_title'   => '</h3></div>',
		)
	);

	$footer_widget = magazil_footer_widget_size();
	if (is_array($footer_widget) && !empty($footer_widget)) {

		foreach ($footer_widget as $key => $value) {
			register_sidebar( array(
				'name'          => esc_attr__( 'Footer ', 'polash' ).($key+1),
				'id'            => 'footer-'.($key+1),
				'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'polash' ),
				'before_widget' => '<div id="%1$s" class="footer-wrapper mb-30 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="footer-title">',
				'after_title'   => '</h3>',
			) );
		}
	}
}
add_action( 'widgets_init', 'polash_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function polash_scripts() {
	wp_enqueue_style( 'polash-style', get_stylesheet_uri(), array(), _S_VERSION );


	wp_enqueue_style( 'polash-font', 'https://fonts.googleapis.com/css?family=Barlow:300,400,500,600,700,800,900|Rubik:300,400,500,700,900&display=swap' );
	wp_enqueue_style( 'polash-linearicons', get_template_directory_uri() . '/assets/dist/css/linearicons.css' );
	wp_enqueue_style( 'polash-main', get_template_directory_uri() . '/assets/dist/css/frontend.css' );

	wp_enqueue_script( 'polash-bundle', get_template_directory_uri() . '/assets/dist/js/frontend.js', array( 'jquery'), '1.0', true );

	// wp_enqueue_script( 'polash-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// wp_enqueue_script( 'polash-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'polash_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

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

