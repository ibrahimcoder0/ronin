<?php

/**
 * ronin_scripts description
 * @return [type] [description]
 */
function ronin_scripts() {

    /**
     * all css files
    */ 

    wp_enqueue_style( 'ronin-fonts', ronin_fonts_url(), array(), '1.0.0' );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', RONIN_THEME_CSS_DIR.'bootstrap.rtl.min.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', RONIN_THEME_CSS_DIR.'bootstrap.css', array() );
    }
    wp_enqueue_style( 'linericon-style', RONIN_THEME_CSS_DIR . 'linericon-style.css', [] );
    wp_enqueue_style( 'font-awesome-min', RONIN_THEME_CSS_DIR . 'font-awesome.min.css', [] );
    wp_enqueue_style( 'owl-carousel-min', RONIN_THEME_CSS_DIR . 'owl.carousel.min.css', [] );
    wp_enqueue_style( 'simpleLightbox', RONIN_THEME_CSS_DIR . 'simpleLightbox.css', [] );
    wp_enqueue_style( 'animate', RONIN_THEME_CSS_DIR . 'animate.css', [] );
    wp_enqueue_style( 'flaticon', RONIN_THEME_CSS_DIR . 'flaticon.css', [] );
    wp_enqueue_style( 'nice-select', RONIN_THEME_CSS_DIR . 'nice-select.css', [] );
    wp_enqueue_style( 'main-core', RONIN_THEME_CSS_DIR . 'main-core.css', [], time() );
    wp_enqueue_style( 'responsive', RONIN_THEME_CSS_DIR . 'responsive.css', [] );
    wp_enqueue_style( 'ronin-style', get_stylesheet_uri() );


    // all js
    wp_enqueue_script( 'jquery-waypoints-min', RONIN_THEME_JS_DIR . 'jquery.waypoints.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'bootstrap-min', RONIN_THEME_JS_DIR . 'bootstrap.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jquery-counterup-min', RONIN_THEME_JS_DIR . 'jquery.counterup.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'popper', RONIN_THEME_JS_DIR . 'popper.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'stellar', RONIN_THEME_JS_DIR . 'stellar.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'simpleLightbox-min', RONIN_THEME_JS_DIR . 'simpleLightbox.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jquery-nice-select-min', RONIN_THEME_JS_DIR . 'jquery.nice-select.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'isotope-min', RONIN_THEME_JS_DIR . 'isotope-min.js', [ 'imagesloaded' ], false, true );
    wp_enqueue_script( 'owl-carousel-min', RONIN_THEME_JS_DIR . 'owl.carousel.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'wow-min', RONIN_THEME_JS_DIR . 'wow.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'ronin-theme', RONIN_THEME_JS_DIR . 'theme.js', [ 'jquery' ], false, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ronin_scripts' );



/*
Register Fonts
 */
function ronin_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'ronin' ) ) {
        $font_url = 'https://fonts.googleapis.com/css?family=Heebo:300,400,500,700|Roboto:300,400,500,700';
    }
    return $font_url;
}

