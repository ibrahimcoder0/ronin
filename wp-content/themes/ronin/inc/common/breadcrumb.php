<?php
/**
 * Breadcrumbs for ronin theme.
 *
 * @package     ronin
 * @author      Moontel_ICT
 * @copyright   Copyright (c) 2022, Moontel_ICT
 * @link        https://www.weblearnbd.net
 * @since       ronin 1.0.0
 */



function ronin_breadcrumb_func() {
    global $post;  
    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','ronin'));
        $breadcrumb_class = 'home_front_page';
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','ronin'));
        $breadcrumb_show = 0;
    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts') );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) {
      $title = get_the_title();
    } 
    elseif ( is_single() && 'product' == get_post_type() ) {
        $title = get_theme_mod( 'breadcrumb_product_details', __( 'Shop', 'ronin' ) );
    } 
    elseif ( is_single() && 'courses' == get_post_type() ) {
      $title = esc_html__( 'Course Details', 'ronin' );
    } 
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'ronin' ) . get_search_query();
    } 
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'ronin' );
    } 
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    } 
    else {
        $title = get_the_title();
    }
 


    $_id = get_the_ID();

    if ( is_single() && 'product' == get_post_type() ) { 
        $_id = $post->ID;
    } 
    elseif ( function_exists("is_shop") AND is_shop()  ) { 
        $_id = wc_get_page_id('shop');
    } 
    elseif ( is_home() && get_option( 'page_for_posts' ) ) {
        $_id = get_option( 'page_for_posts' );
    }

    $is_breadcrumb = function_exists('tpmeta_field')? tpmeta_field('ronin_check_bredcrumb') : 'on';

    $con1 = $is_breadcrumb && ($is_breadcrumb== 'on') && $breadcrumb_show == 1;

    $con_main = is_404() ? is_404() : $con1;
    
      if (  $con_main ) {
        $bg_img_from_page = function_exists('tpmeta_image_field')? tpmeta_image_field('ronin_breadcrumb_bg') : '';

        $hide_bg_img = function_exists('tpmeta_field')? tpmeta_field('ronin_check_bredcrumb_img') : 'on';
        // get_theme_mod
        $bg_img = get_theme_mod( 'breadcrumb_image' );
        if ( $hide_bg_img == 'off' ) {
            $bg_main_img = '';
        }else{  
            $bg_main_img = !empty( $bg_img_from_page ) ? $bg_img_from_page['url'] : $bg_img;
        }
        
        ?>

<!-- Breadcrumb Section Start -->
<div class="breadcrumb-wrapper bg-cover" style="background-image: url(<?php print esc_attr($bg_main_img);?>);">
    <div class="shape-image float-bob-y">
        <img src="<?php print get_template_directory_uri(); ?>/assets/img/vector.png" 
        alt="<?php esc_attr__('image', 'ronin'); ?>">
    </div>
    <div class="container">
        <div class="breadcrumb-wrapper-items">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s"><?php echo ronin_kses( $title ); ?></h1>
                </div>
                <?php if(function_exists('bcn_display')) : ?>
                <div class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <?php bcn_display(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
      }
}

add_action( 'ronin_before_main_content', 'ronin_breadcrumb_func' );

// ronin_search_form
function ronin_search_form() {
    ?>
        <!-- search area start -->
        <div class="search-wrap">
            <div class="search-inner">
                <i class="fas fa-times search-close" id="search-close"></i>
                <div class="search-cell">
                    <form method="get" action="<?php print esc_url( home_url( '/' ) );?>">
                        <div class="search-field-holder">
                            <input type="search" name="s" class="main-search-input" value="<?php print esc_attr( get_search_query() )?>" placeholder="<?php print esc_attr__( 'Search...', 'ronin' );?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
      <!-- search area end -->



<?php
}
add_action( 'ronin_before_main_content', 'ronin_search_form' );