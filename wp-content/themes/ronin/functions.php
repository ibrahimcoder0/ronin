<?php
/**
 * File Calling
 */

 require_once 'inc/lib/mj-wp-breadcrumb.php'; 


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

    /**
     * blog sidebar
     */
    // register_sidebar( [
    //     'name'          => esc_html__( 'Blog Sidebar', 'ronin' ),
    //     'id'            => 'blog-sidebar',
    //     'description' => 'Put widgets for left footer area',
    //     'before_widget' => '<div id="%1$s" class="single_sidebar_widget popular_post_widget %2$s"><div class="media post_item">',
	// 	'after_widget'  => '</div></div>',
	// 	'before_title'  => '<h3 class="widget_title">',
	// 	'after_title'   => '</h3>',
    // ] );

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

// Comments field reorganized 
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
    return '<div class="form-group"> <p class="comment-form-comment"><textarea class="form-control mb-10" placeholder="Message *" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required=""></textarea></p> </div>';
}
add_filter('comment_form_field_comment', 'comment_field');


// Modify Comment Field 
function author_field($data){
    return '<div class="comment-form-author"><input class="form-control mb-3" id="author" name="author" type="text" value="" size="30" maxlength="245" autocomplete="name" required placeholder="Enter Name" ></div>';
}
add_filter('comment_form_field_author', 'author_field');
// Modify Comment Field 
function email_field($data){
    return '<div class="comment-form-email"><input class="form-control mb-3" id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email" required placeholder="Enter your email"></div>';
}
add_filter('comment_form_field_email', 'email_field');
// Modify Comment Field 
function url_field($data){
    return '<div class="comment-form-url"><input class="form-control mb-3" id="url" name="url" type="url" value="" size="30" maxlength="200" autocomplete="url" placeholder="Subject"></div>';
}
add_filter('comment_form_field_url', 'url_field');




/**
 *
 * pagination
 */
if ( !function_exists( 'ronin_post_pagination' ) ) {
    function ronin_post_pagination(){
        $pages = paginate_links( array( 
            'type' => 'array',
            'prev_text'=> '<span class="lnr lnr-chevron-left"></span>',
            'next_text'=> '<span class="lnr lnr-chevron-right"></span>',
        ) );

        if( $pages ) {
             echo '<ul class="pagination"><li class="page-item">';
             foreach ( $pages as $page ) {
                  echo "<li>$page</li>";
             }
             echo '</li></ul>';
        }
    }
}

