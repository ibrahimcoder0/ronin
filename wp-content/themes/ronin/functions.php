<?php 

// Require TGM Activation Plugin File
require_once 'lib/class-tgm-plugin-activation.php';

// TGM config file
require_once 'inc/tgm-config.php';

// MJ breadcrumb file
require_once 'lib/mj-wp-breadcrumb.php';

// Codestar Fromework File
require_once get_theme_file_path( ) .'/lib/codestar-framework-master/codestar-framework.php';

// require codestar config file

require_once get_theme_file_path( ) .'/inc/cf-config.php';

// require_once get_theme_file_path() .'/lib/codestar-framework/codestar-framework.php';
// // require codestar config file 
// require_once get_theme_file_path() .'/inc/cf-config.php';
// // require custom widgets file 
// require_once get_theme_file_path() .'/inc/sb-widgets.php';
// // require advance custom field config file 
// require_once get_theme_file_path() .'/inc/acf-config.php';




// Ronin Assets Load 
function sbportfolio_assets_load_function(){
    wp_enqueue_style('bootstrap', get_theme_file_uri(). '/assets/css/bootstrap.css', null, '4.1.3');
    wp_enqueue_style('linericons', get_theme_file_uri(). '/assets/vendors/linericon/style.css', null, '1.0.0');
    wp_enqueue_style('fontawesome', get_theme_file_uri(). '/assets/css/font-awesome.min.css', null, '1.0.0');
    wp_enqueue_style('owl-carousel', get_theme_file_uri(). '/assets/vendors/owl-carousel/owl.carousel.min.css', null, '1.0.0');
    wp_enqueue_style('simplelightbox', get_theme_file_uri(). '/assets/vendors/lightbox/simpleLightbox.css', null, '1.0.0');
    wp_enqueue_style('niceselect', get_theme_file_uri(). '/assets/vendors/nice-select/css/nice-select.css', null, '1.0.0');
    wp_enqueue_style('animate', get_theme_file_uri(). '/assets/vendors/animate-css/animate.css', null, '1.0.0');
    wp_enqueue_style('flaticon', get_theme_file_uri(). '/assets/vendors/flaticon/flaticon.css', null, '1.0.0');
    wp_enqueue_style('style', get_theme_file_uri(). '/assets/css/style.css', null, '1.0.0');
    wp_enqueue_style('responsive', get_theme_file_uri(). '/assets/css/responsive.css', null, '1.0.0');
    wp_enqueue_style('sbportfoilo-style', get_stylesheet_uri(), null, time());

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
add_action('wp_enqueue_scripts', 'sbportfolio_assets_load_function');


if( ! function_exists( 'your_prefix_enqueue_fa5' ) ) {
    function your_prefix_enqueue_fa5() {
      wp_enqueue_style( 'fa5', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all' );
      wp_enqueue_style( 'fa5-v4-shims', 'https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css', array(), '5.13.0', 'all' );
    }
    add_action( 'wp_enqueue_scripts', 'your_prefix_enqueue_fa5' );
  }
  

// theme support 
function sbportfolio_theme_support(){
    load_theme_textdomain('sbportfolio');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_theme_support('menus');
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-background');
    add_theme_support('custom-logo');
    add_theme_support('post-formats', array('audio', 'video', 'quote', 'link', 'gallery'));
    add_theme_support('title-tag');
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );


    // Register menu 
    register_nav_menu('primary_menu', 'Primary Menu');

    function ronin_nav_menu_anchor($attributes){
        $attributes['class']   = 'nav-link';
        return $attributes;
    }
    add_action( 'nav_menu_link_attributes', 'ronin_nav_menu_anchor');

}
add_action('after_setup_theme', 'sbportfolio_theme_support');



//Comment Field Order
add_filter( 'comment_form_fields', 'mo_comment_fields_custom_order' );
function mo_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['url'] = $url_field;
    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}

// Modify Comment Field 
function comment_field($data){
    return '<div class="form-group"> <p class="comment-form-comment"><textarea class="form-control mb-3" placeholder="Message *" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required=""></textarea></p> </div>';
}
add_filter('comment_form_field_comment', 'comment_field');

// Modify Comment Field 
function author_field($data){
    return '<div class="comment-form-author"> <input class="form-control mb-3" id="author" name="author" type="text" value="" size="30" maxlength="245" autocomplete="name" required="" placeholder="Enter Name"></div>';
}
add_filter('comment_form_field_author', 'author_field');

// Modify Comment Field 
function email_field($data){
    return '<div class="comment-form-author"> <input class="form-control mb-3" id="email" name="emial" type="email" value="" size="30" maxlength="245" autocomplete="name" required="" placeholder="Enter Email Address"></div>';
}
add_filter('comment_form_field_email', 'email_field');

// Modify Comment Field 
function url_field($data){
    return '<div class="comment-form-author"> <input class="form-control mb-3" id="subject" name="subject" type="subject" value="" size="30" maxlength="245" autocomplete="name" required="" placeholder="Enter Subject"></div>';
}
add_filter('comment_form_field_url', 'url_field');



// widget area register 
function ronin_footer_widget_register(){
    register_sidebar(array(
        'id'        => 'footer_1',
        'name'      => 'Footer 1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<div id="%1$s" class="f_widget ab_widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="f_title"><h3>',
		'after_title'   => '</h3></div>',
    ));
    register_sidebar(array(
        'id'        => 'footer_2',
        'name'      => 'Footer 2',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<div id="%1$s" class="f_widget ab_widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="f_title"><h3>',
		'after_title'   => '</h3></div>',
    ));
    register_sidebar(array(
        'id'        => 'footer_3',
        'name'      => 'Footer 3',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<div id="%1$s" class="f_widget ab_widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="f_title"><h3>',
		'after_title'   => '</h3></div>',
    ));

}
add_action( 'widgets_init', 'ronin_footer_widget_register' );






function sbcustom_css(){
    echo '
    <style>
    #acf-group_67667814a363c {
        display: none !important;
    }
    </style>';
}
add_action('admin_head', 'sbcustom_css');


