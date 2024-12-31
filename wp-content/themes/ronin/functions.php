<?php

/**
 * ronin functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ronin
 */

if ( !function_exists( 'ronin_setup' ) ):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    
    function ronin_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on ronin, use a find and replace
         * to change 'ronin' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'ronin', get_template_directory() . '/languages' );

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
        register_nav_menus( [
            'main-menu' => esc_html__( 'Main Menu', 'ronin' ),
            'onepage-menu-menu-01' => esc_html__( 'One Page Menu 01', 'ronin' ),
        ] );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ] );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'ronin_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ] ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        //Enable custom header
        add_theme_support( 'custom-header' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ] );

        /**
         * Enable suporrt for Post Formats
         *
         * see: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', [
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
        ] );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        remove_theme_support( 'widgets-block-editor' );
        
        // Add support for woocommerce.
        add_theme_support('woocommerce');

        // Remove woocommerce defauly styles
        add_filter( 'woocommerce_enqueue_styles', '__return_false' );

        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );



        if ( function_exists( 'register_block_style' ) ) {
            register_block_style(
                'core/quote',
                array(
                    'name'         => 'blue-quote',
                    'label'        => __( 'Blue Quote', 'ronin' ),
                    'is_default'   => true,
                    'inline_style' => '.wp-block-quote.is-style-blue-quote { color: blue; }',
                )
            );
        }
        register_block_pattern(
            'ronin/my-awesome-pattern',
            array(
                'title'       => __( 'Two buttons', 'ronin' ),
                'description' => _x( 'Two horizontal buttons, the left button is filled in, and the right button is outlined.', 'Block pattern description', 'ronin' ),
                'content'     => "<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"backgroundColor\":\"very-dark-gray\",\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background has-very-dark-gray-background-color no-border-radius\">" . esc_html__( 'Button One', 'ronin' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"textColor\":\"very-dark-gray\",\"borderRadius\":0,\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-very-dark-gray-color no-border-radius\">" . esc_html__( 'Button Two', 'ronin' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
            )
        );
        add_editor_style( 'custom-editor-style.css' );


    }
endif;
add_action( 'after_setup_theme', 'ronin_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ronin_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'ronin_content_width', 640 );
}
add_action( 'after_setup_theme', 'ronin_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */

define( 'RONIN_THEME_DIR', get_template_directory() );
define( 'RONIN_THEME_URI', get_template_directory_uri() );
define( 'RONIN_THEME_CSS_DIR', RONIN_THEME_URI . '/assets/css/' );
define( 'RONIN_THEME_JS_DIR', RONIN_THEME_URI . '/assets/js/' );
define( 'RONIN_THEME_INC', RONIN_THEME_DIR . '/inc/' );



// wp_body_open
if ( !function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Implement the Custom Header feature.
 */
// require RONIN_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require RONIN_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require RONIN_THEME_INC . 'template-helper.php';

/**
 * initialize kirki customizer class.
 */
if ( class_exists( 'Kirki' ) ) {
    include_once RONIN_THEME_INC . 'kirki-customizer.php';
}
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require RONIN_THEME_INC . 'jetpack.php';
}

/**
 * include ronin functions file
 */
// require_once RONIN_THEME_INC . 'class-navwalker.php';
require_once RONIN_THEME_INC . 'class-tgm-plugin-activation.php';
require_once RONIN_THEME_INC . 'add_plugin.php';
require_once RONIN_THEME_INC . '/common/breadcrumb.php';
require_once RONIN_THEME_INC . '/common/scripts.php';
require_once RONIN_THEME_INC . '/common/widgets.php';
if ( function_exists('tpmeta_kick')) {
    require_once RONIN_THEME_INC . 'mt-metabox.php';
}

if ( class_exists( 'WooCommerce' ) ) {
    require_once RONIN_THEME_INC . '/woocommerce/mt-woocommerce.php';
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ronin_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'ronin_pingback_header' );

/**
 * shortcode supports for removing extra p, spance etc
 *
 */
add_filter( 'the_content', 'ronin_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function ronin_shortcode_extra_content_remove( $content ) {

    $array = [
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
    ];
    return strtr( $content, $array );

}

// ronin_search_filter_form


if ( !function_exists( 'ronin_search_filter_form' ) ) {
    function ronin_search_filter_form( $form ) {
        $form = '
        <div class="search-widget">
            <form action="' . home_url( '/' ) . '">
                <input type="text" name="s" value="' . get_search_query() . '" placeholder="' . __( 'Search for:','ronin' ) . '">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        
        ';
    
            return $form;
        }
    }
    add_filter( 'get_search_form', 'ronin_search_filter_form' );


// ronin_admin_custom_scripts
function ronin_admin_custom_scripts() {
    wp_enqueue_media();
    wp_enqueue_style( 'customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css',array());
    wp_enqueue_script( 'ronin-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'ronin-admin-custom' );
}