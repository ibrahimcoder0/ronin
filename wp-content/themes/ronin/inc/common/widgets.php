<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ronin_widgets_init() {

    $footer_style_2_switch = get_theme_mod( 'footer_layout_2_switch', false );
    $footer_style_3_switch = get_theme_mod( 'footer_layout_3_switch', false );

    /**
     * blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'ronin' ),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div id="%1$s" class="single-sidebar-widget %2$s"><div class="single-sidebar-widget-content">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h3 class="wid-title">',
        'after_title'   => '</h3>',
    ] );
     
    /**
     * Product sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Product Sidebar', 'ronin' ),
        'id'            => 'product-sidebar',
        'before_widget' => '<div id="%1$s" class="mt-shop-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="mt-shop-widget-title">',
        'after_title'   => '</h3>',
    ] );

    /**
     * Service sidebar
     */
    if(class_exists("MT_Core")) :
    register_sidebar( [
        'name'          => esc_html__( 'Services Sidebar', 'ronin' ),
        'id'            => 'services-sidebar',
        'before_widget' => '<div id="%1$s" class="single-sidebar-widget %2$s"><div class="single-sidebar-widget-content">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h3 class="wid-title">',
        'after_title'   => '</h3>',
    ] );
    endif;

    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // footer default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer %1$s', 'ronin' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer Column %1$s', 'ronin' ), $num ),
            'before_widget' => '<div id="%1$s" class="footer-widgets-wrapper mt-footer-col-'.$num.' %2$s"><div class="single-footer-widget">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-head"><h5>',
            'after_title'   => '</div></h5>',
        ] );
    }

    // footer 2
    if ( $footer_style_2_switch ) {
        for ( $num = 1; $num <= $footer_widgets; $num++ ) {

            register_sidebar( [
                'name'          => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'ronin' ), $num ),
                'id'            => 'footer-2-' . $num,
                'description'   => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'ronin' ), $num ),
                'before_widget' => '<div id="%1$s" class="mt-footer-widget mt-footer-col-'.$num.' mb-50 %2$s"> <div class="mt-footer-widget-content">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h3 class="mt-footer-widget-title">',
                'after_title'   => '</h3>',
            ] );
        }
    }    
  
    // footer 3
    if ( $footer_style_3_switch ) {
        for ( $num = 1; $num <= $footer_widgets; $num++ ) {

            register_sidebar( [
                'name'          => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'ronin' ), $num ),
                'id'            => 'footer-3-' . $num,
                'description'   => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'ronin' ), $num ),
                'before_widget' => '<div id="%1$s" class="mt-footer-widget mt-footer-3-col-'.$num.' mb-50 %2$s"> <div class="mt-footer-widget-content">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h3 class="mt-footer-widget-title">',
                'after_title'   => '</h3>',
            ] );
        }
    }    
}
add_action( 'widgets_init', 'ronin_widgets_init' );