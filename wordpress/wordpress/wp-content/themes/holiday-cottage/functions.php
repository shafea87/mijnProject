<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Holiday_Cottage
 */

define( 'HOLIDAY_COTTAGE_VERSION', '1.0.1' );

if ( ! function_exists( 'holiday_cottage_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function holiday_cottage_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'holiday-cottage', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Register menu locations.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'holiday-cottage' ),
				'social' => esc_html__( 'Social', 'holiday-cottage' ),
			)
		);

		// Add support for HTML5 markup.
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
				'holiday_cottage_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Set up the WordPress core custom header feature.
		add_theme_support(
			'custom-header',
			apply_filters(
				'holiday_cottage_custom_header_args',
				array(
					'default-image'    => '',
					'width'            => 1200,
					'height'           => 400,
					'flex-height'      => true,
					'header-text'      => false,
					'wp-head-callback' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
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

add_action( 'after_setup_theme', 'holiday_cottage_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function holiday_cottage_custom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'holiday_cottage_content_width', 790 );
}

add_action( 'after_setup_theme', 'holiday_cottage_custom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function holiday_cottage_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'holiday-cottage' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'holiday-cottage' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => sprintf( esc_html__( 'Footer %d', 'holiday-cottage' ), 1 ),
			'id'            => 'footer-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => sprintf( esc_html__( 'Footer %d', 'holiday-cottage' ), 2 ),
			'id'            => 'footer-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => sprintf( esc_html__( 'Footer %d', 'holiday-cottage' ), 3 ),
			'id'            => 'footer-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => sprintf( esc_html__( 'Footer %d', 'holiday-cottage' ), 4 ),
			'id'            => 'footer-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'holiday_cottage_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function holiday_cottage_scripts() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'holiday-cottage-google-fonts', holiday_cottage_fonts_url(), array(), HOLIDAY_COTTAGE_VERSION );

	wp_enqueue_style( 'holiday-cottage-font-awesome', get_template_directory_uri() . '/third-party/font-awesome/css/all' . $min . '.css', '', '5.12.0' );

	wp_enqueue_style( 'holiday-cottage-style', get_stylesheet_uri(), array(), HOLIDAY_COTTAGE_VERSION );

	wp_enqueue_script( 'holiday-cottage-navigation', get_template_directory_uri() . '/js/navigation' . $min . '.js', array(), '20151215', true );

	wp_enqueue_script( 'holiday-cottage-custom', get_template_directory_uri() . '/js/script' . $min . '.js', array( 'jquery' ), HOLIDAY_COTTAGE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'holiday-cottage-navigation', 'holidayCottageScreenReaderText', array(
		'expandMain'    => esc_html__( 'Open the main menu', 'holiday-cottage' ),
		'collapseMain'  => esc_html__( 'Close the main menu', 'holiday-cottage' ),
		'expandChild'   => esc_html__( 'expand submenu', 'holiday-cottage' ),
		'collapseChild' => esc_html__( 'collapse submenu', 'holiday-cottage' ),
	) );
}

add_action( 'wp_enqueue_scripts', 'holiday_cottage_scripts' );

/**
 * Load init.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/init.php';
