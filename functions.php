<?php
/**
 * SML Blocks functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SML_Blocks
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'sml_blocks_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sml_blocks_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on SML Blocks, use a find and replace
		 * to change 'sml-blocks' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sml-blocks', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'sml-blocks' ),
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
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'sml_blocks_custom_background_args',
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
add_action( 'after_setup_theme', 'sml_blocks_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sml_blocks_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sml_blocks_content_width', 640 );
}
add_action( 'after_setup_theme', 'sml_blocks_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sml_blocks_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sml-blocks' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sml-blocks' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sml_blocks_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sml_blocks_scripts() {
	wp_register_style( 'tailwind', 'https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' );
	wp_enqueue_style('tailwind');
	wp_register_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css' );
	wp_enqueue_style('fontawesome');
	wp_enqueue_style( 'sml-blocks-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sml-blocks-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sml-blocks-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sml_blocks_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Hide Admin bar
 */
add_filter('show_admin_bar', '__return_false');

/**
 *
 * Custom Options page ACF
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
	));
	
}


/**
 * Register Blocks
 */
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a Title
        acf_register_block_type(array(
            'name'              => 'title',
            'title'             => __('Title'),
            'description'       => __('Title with underline'),
            'render_template'   => 'template-parts/blocks/title/title.php',
			'enqueue_style' 	=> get_template_directory_uri() . '/template-parts/blocks/title/title.css',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'title', 'heading' ),
			'supports'          => array( 'anchor' => true, 'jsx' => true, )
        ));

		// register Columns
		acf_register_block_type(array(
            'name'              => 'columns',
            'title'             => __('Two columns of text'),
            'description'       => __('Two columns'),
            'render_template'   => 'template-parts/blocks/two-columns/two-columns.php',
			'enqueue_style' 	=> get_template_directory_uri() . 'template-parts/blocks/two-columns/two-columns.css',
            'category'          => 'layout',
            'icon'              => 'columns',
            'keywords'          => array( 'columns', 'two columns' ),
			'supports'          => array( 'anchor' => true, 'jsx' => true, )
        ));

		// register a Photo Cards
		acf_register_block_type(array(
            'name'              => 'Photo-cards',
            'title'             => __('two section photo cards'),
            'description'       => __('four photo cards'),
            'render_template'   => 'template-parts/blocks/Photo-Cards/Photo-Cards.php',
			'enqueue_style' 	=> get_template_directory_uri() . 'template-parts/blocks/Photo-Cards/Photo-Cards.css',
            'category'          => 'layout',
            'icon'              => 'image',
            'keywords'          => array( 'cards', 'photo-cards' ),
			'supports'          => array( 'anchor' => true, 'jsx' => true, )
        ));

		// register a gallery
		acf_register_block_type(array(
            'name'              => 'galerry',
            'title'             => __('collumn gallery'),
            'description'       => __('two collumn gallery'),
            'render_template'   => 'template-parts/blocks/gallery/gallery.php',
			'enqueue_style' 	=> get_template_directory_uri() . 'template-parts/blocks/gallery/gallery.css',
            'category'          => 'layout',
            'icon'              => 'image',
            'keywords'          => array( 'gallery' ),
			'supports'          => array( 'anchor' => true, 'jsx' => true, )
        ));

		// register a category
		acf_register_block_type(array(
            'name'              => 'three section',
            'title'             => __('category'),
            'description'       => __('three categories section'),
            'render_template'   => 'template-parts/blocks/Category/category.php',
			'enqueue_style' 	=> get_template_directory_uri() . 'template-parts/blocks/Category/category.css',
            'category'          => 'layout',
            'icon'              => 'page',
            'keywords'          => array( 'category' ),
			'supports'          => array( 'anchor' => true, 'jsx' => true, )
        ));
		
    }
}