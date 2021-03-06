<?php
/**
 * components functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 42west44
 */

if ( ! function_exists( 'fortytwowestfortyfour_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the aftercomponentsetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fortytwowestfortyfour_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'fortytwowestfortyfour' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fortytwowestfortyfour', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	// add_theme_support( 'automatic-feed-links' );

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

	add_image_size( 'fortytwowestfortyfour-featured-image', 640, 9999 );
	add_image_size( 'fortytwowestfortyfour-hero', 1280, 1000, true );
	add_image_size( 'fortytwowestfortyfour-thumbnail-avatar', 100, 100, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Top', 'fortytwowestfortyfour' ),
	) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'gallery',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fortytwowestfortyfour_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'fortytwowestfortyfour_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fortytwowestfortyfour_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fortytwowestfortyfour_content_width', 640 );
}
add_action( 'after_setup_theme', 'fortytwowestfortyfour_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function fortytwowestfortyfour_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fortytwowestfortyfour_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fortytwowestfortyfour' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fortytwowestfortyfour_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fortytwowestfortyfour_scripts() {
	wp_enqueue_style( 'fortytwowestfortyfour-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'fortytwowestfortyfour-modernizer-touch', get_template_directory_uri() . '/assets/js/modernizer.touch.js', array(), '20151215', true );

	wp_enqueue_script( 'fortytwowestfortyfour-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	// wp_enqueue_script( 'fortytwowestfortyfour-navigation', get_template_directory_uri() . '/assets/js/navigation.debug.js', array(), '20151215', true );

	wp_enqueue_script( 'fortytwowestfortyfour-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fortytwowestfortyfour_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function create_custom_post_types() {
    register_post_type( 'event_spaces',
        array(
            'labels' => array(
                'name' => __( 'Event Spaces' ),
                'singular_name' => __( 'Event Space' )
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array( 'slug' => 'event-spaces' ),
						'supports' => array('title', 'editor', 'post-formats', 'revisions')
        )
    );
}
add_action( 'init', 'create_custom_post_types' );


/**
 * Hide email from Spam Bots using a shortcode.
 * from https://codex.wordpress.org/Function_Reference/antispambot
 *
 * @param array  $atts    Shortcode attributes. Not used.
 * @param string $content The shortcode content. Should be an email address.
 *
 * @return string The obfuscated email address. 
 */
function wpcodex_hide_email_shortcode( $atts , $content = null ) {
	if ( ! is_email( $content ) ) {
		return;
	}

	return '<a href="mailto:' . antispambot( $content ) . '">' . antispambot( $content ) . '</a>';
}
add_shortcode( 'email', 'wpcodex_hide_email_shortcode' );

function insert_favicon_links(){
echo '
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=9BaYG9ygB4">
<link rel="icon" type="image/png" href="/favicon-32x32.png?v=9BaYG9ygB4" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png?v=9BaYG9ygB4" sizes="16x16">
<link rel="manifest" href="/manifest.json?v=9BaYG9ygB4">
<link rel="mask-icon" href="/safari-pinned-tab.svg?v=9BaYG9ygB4" color="#000000">
<link rel="shortcut icon" href="/favicon.ico?v=9BaYG9ygB4">
<meta name="apple-mobile-web-app-title" content="42West44">
<meta name="application-name" content="42West44">
<meta name="theme-color" content="#ffffff">';
}

add_action ('wp_head', 'insert_favicon_links');



function insert_ga_tracking(){
echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-xxx-7', 'auto');
  ga('send', 'pageview');

</script>";
}

add_action ('wp_head', 'insert_ga_tracking');