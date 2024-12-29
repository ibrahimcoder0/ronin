<?php

/**
 * All CSS And JS File Calling
 */

 function ronin_scripts_file(){
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( ). '/assets/css/bootstrap.css', null, '4.3.1' );
    wp_enqueue_style( 'font-awesome-min', get_theme_file_uri(  ). '/assets/css/font-awesome.min.css', null, '4.5.0' );
    wp_enqueue_style('owl-carousel', get_theme_file_uri(). '/assets/vendors/owl-carousel/owl.carousel.min.css', null, '1.0.0');
    wp_enqueue_style('simplelightbox', get_theme_file_uri(). '/assets/vendors/lightbox/simpleLightbox.css', null, '1.0.0');
    wp_enqueue_style('niceselect', get_theme_file_uri(). '/assets/vendors/nice-select/css/nice-select.css', null, '1.0.0');
    wp_enqueue_style('animate', get_theme_file_uri(). '/assets/vendors/animate-css/animate.css', null, '1.0.0');
    wp_enqueue_style('flaticon', get_theme_file_uri(). '/assets/vendors/flaticon/flaticon.css', null, '1.0.0');
    wp_enqueue_style('linericons', get_theme_file_uri(). '/assets/vendors/linericon/style.css', null, '1.0.0');
    wp_enqueue_style( 'style', get_theme_file_uri(). '/assets/css/style.css', null, '1.0.0' );
    wp_enqueue_style( 'responsive', get_theme_file_uri(). '/assets/css/responsive.css', null, '1.0.0' );
    wp_enqueue_style('ronin-style', get_stylesheet_uri(), null, time());

    // js
    wp_enqueue_script('popper', get_theme_file_uri(). '/assets/js/popper.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('bootstrap', get_theme_file_uri(). '/assets/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('stellar', get_theme_file_uri(). '/assets/js/stellar.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('lightbox', get_theme_file_uri(). '/assets/vendors/lightbox/simpleLightbox.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('niceselect', get_theme_file_uri(). '/assets/vendors/nice-select/js/jquery.nice-select.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('imageloadedpkg', get_theme_file_uri(). '/assets/vendors/isotope/imagesloaded.pkgd.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('isotope', get_theme_file_uri(). '/assets/vendors/isotope/isotope-min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('owl-carousel', get_theme_file_uri(). '/assets/vendors/owl-carousel/owl.carousel.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('ajaxchimp', get_theme_file_uri(). '/assets/js/jquery.ajaxchimp.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('waypoints', get_theme_file_uri(). '/assets/vendors/counter-up/jquery.waypoints.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('counterup', get_theme_file_uri(). '/assets/vendors/counter-up/jquery.counterup.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('theme', get_theme_file_uri(). '/assets/js/theme.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('popper', get_theme_file_uri(). '/assets/js/popper.js', array('jquery'), '1.0.0', true);

 }

add_action('wp_enqueue_scripts', 'ronin_scripts_file' );

/**
 * Theme Support
 */
function ronin_setup_theme(){
    load_theme_textdomain('ronin');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-background');
    add_theme_support('custom-logo');
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support('post-formats', array('audio', 'video', 'quote', 'link', 'gallery'));


    // menu Registar
    register_nav_menu( 'primary_menu', 'Primary Menu');



}
add_action( 'after_setup_theme', 'ronin_setup_theme' );


// nav Menu attrubutes
function ronin_nav_menu_link($attributes){
    $attributes['class']    = 'nav-link';

    return $attributes;
}
add_action('nav_menu_link_attributes', 'ronin_nav_menu_link');


function sbcustom_css(){
    echo '
    <style>
    #acf-group_677146d25923a {
        display: none !important;
    }
    </style>';
}
add_action('admin_head', 'sbcustom_css');


// Footer widget Register
function ronin_footer_widget(){
    // Footer 1
    register_sidebar( array(
		'name' => 'Footer 1',
		'id' => 'footer_1',
		'description' => 'Put widgets for left footer area',
        'before_widget' => '<div id="%1$s" class="f_widget ab_widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="f_title"><h3>',
		'after_title'   => '</h3></div>',
	));
    // Footer 2
    register_sidebar( array(
		'name' => 'Footer 2',
		'id' => 'footer_2',
		'description' => 'Put widgets for left footer area',
        'before_widget' => '<div id="%1$s" class="f_widget ab_widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="f_title"><h3>',
		'after_title'   => '</h3></div>',
	));
    // Footer 3
    register_sidebar( array(
		'name' => 'Footer 3',
		'id' => 'footer_3',
		'description' => 'Put widgets for left footer area',
        'before_widget' => '<div id="%1$s" class="f_widget ab_widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="f_title"><h3>',
		'after_title'   => '</h3></div>',
	));
}
add_action( 'widgets_init', 'ronin_footer_widget');

