<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ronin
 */

 $ronin_video_url = function_exists('tpmeta_field')? tpmeta_field('ronin_post_video') : '';
 $categories = get_the_terms( $post->ID, 'category' );
$ronin_blog_cat = get_theme_mod( 'ronin_blog_cat', false );
$ronin_singleblog_social = get_theme_mod( 'ronin_singleblog_social', false );
$social_shear_col= $ronin_singleblog_social ? "col-lg-7 col-md-7" : "col-xl-12 col-md-12 col-lg-12";

if ( is_single() ): 
?> 
<div id="post-<?php the_ID();?>" <?php post_class( 'blog-post-details format-image');?>>
    <div class="single-blog-post">
        <?php if(!empty(has_post_thumbnail())):?>
        <div class="post-featured-thumb ">
        <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
        <?php if ( !empty($ronin_video_url) ): ?>
            <div class="video-box d-none">
                <a href="<?php echo esc_url($ronin_video_url); ?>" class="video-btn video-popup">
                    <i class="fas fa-play"></i>
                </a>
            </div>
            <?php endif; ?>
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

<?php else: ?>
<div id="post-<?php the_ID();?>" <?php post_class( 'news-standard-items format-video' );?>>
    <div class="news-standard-items">
        <div class="news-thumb">
        <?php if ( has_post_thumbnail() ): ?>
            <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
            </a>
            <?php endif; ?>
            <?php if ( !empty($ronin_video_url) ): ?>
            <div class="video-box">
                <a href="<?php echo esc_url($ronin_video_url); ?>" class="video-btn video-popup">
                    <i class="fas fa-play"></i>
                </a>
            </div>
            <?php endif; ?>
        </div>
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
</div>
    
<?php
endif;?>