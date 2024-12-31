 <?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ronin
 */

$gallery_images = function_exists('tpmeta_gallery_field')? tpmeta_gallery_field('ronin_post_gallery') : '';
$ronin_singleblog_social = get_theme_mod( 'ronin_singleblog_social', false );
  
$social_shear_col= $ronin_singleblog_social ? "col-lg-7 col-md-7" : "col-xl-12 col-md-12 col-lg-12";
if ( is_single() ): ?>


<div id="post-<?php the_ID();?>" <?php post_class( 'blog-post-details format-image');?>>
    <div class="single-blog-post">
        <?php if ( !empty( $gallery_images ) ): ?>
        <div class="swiper post-featured-thumb news-post-slider">
            <div class="swiper-wrapper">
            <?php foreach ( $gallery_images as $key => $image ): ?>
                <div class="swiper-slide">
                    <div class="news-thumb">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <?php endif;?>
        <div class="post-content">
            <!-- blog meta -->
            <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>
            <h3><?php the_title();?></h3>
            <?php the_content();?>
        </div>
    </div>
    <?php if(has_tag()) : ?>
    <div class="row tag-share-wrap mt-4 mb-5">
        <div class="col-lg-8 col-12">
            <div class="tagcloud"> 
                <span><?php echo esc_html__('Tag:','ronin'); ?></span>                                 
                <?php
                    $tags = get_the_tags(); // Assuming you are within the loop
                    if ($tags) {
                        
                        foreach ($tags as $tag) {
                            echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                        }
                    }
                ?>
            </div>
        </div>
        
        <?php if(function_exists('ronin_blog_social_share') && !empty($ronin_singleblog_social)) : ?>
            <?php ronin_blog_social_share() ?>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>

<?php else: 
    $categories = get_the_terms( $post->ID, 'category' );    
    $ronin_blog_cat = get_theme_mod( 'ronin_blog_cat', false );
?>


<div id="post-<?php the_ID();?>" <?php post_class( 'news-standard-items format-gallery' );?>>
<?php if ( !empty( $gallery_images ) ): ?>
    <div class="array-button">
        <button class="array-prev"><i class="fa-regular fa-arrow-left-long"></i></button>
        <button class="array-next"><i class="fa-regular fa-arrow-right-long"></i></button>
    </div>
    <div class="swiper news-post-slider">
        <div class="swiper-wrapper">
        <?php foreach ( $gallery_images as $key => $image ): ?>
            <div class="swiper-slide">
                <div class="news-thumb">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <?php endif; ?>
    <div class="news-content">
        <!-- meta -->
        <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>
        <h3 class="mt-postbox-title">
        <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </h3>
        <div class="mt-postbox-text">
             <?php the_excerpt();?>
         </div>
         <!-- blog btn -->
         <?php get_template_part( 'template-parts/blog/blog-btn' ); ?>
    </div>
</div>


<?php
endif;?>