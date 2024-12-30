<?php get_header(); 

if (is_singular('post')) {
    $count = get_field('post_views');
    $count++;
    update_field('post_views', number_format($count, 0, '', ''));
}


?>
        
        <!--================Home Banner Area =================-->
        <?php get_template_part('inc/common/breadcrumb'); ?>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12">
                                <div class="feature-img">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('full', array('class' => 'img-fluid'));
                                } ?>
                                </div>									
                            </div>
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <?php the_category(', ', ''); ?>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta('display_name', 1); ?><i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#"><?php echo get_the_date() ?><i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#"><?php echo $count; ?> Views<i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><?php $comments_array = get_comment_count(get_the_ID());
                                            echo $comments_array['total_comments'] ?> Comments<i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                    <ul class="social-links">
                                        <?php $post_url = get_the_permalink(); ?>
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($post_url);?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/share?url=<?php echo esc_url($post_url);?>" target="_blank"><i
                                            class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url($post_url);?>" target="_blank"><i
                                            class="fa fa-pinterest-p"></i></a> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </div>

                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <?php
                                     $prev_post_obj = get_previous_post();
                                     $prev_post_title = get_the_title($prev_post_obj);
                                     $prev_post_link    = get_the_permalink($prev_post_obj);
                                    ?>
                                    <div class="thumb">
                                        <a href="<?php echo $prev_post_link; ?>">
                                            <?php
                                                if(has_post_thumbnail( $prev_post_obj )){
                                                   echo get_the_post_thumbnail($prev_post_obj, 'thumbnail', array('class' => 'img-fluid nt-thumb') );
                                                }
                                            ?>
                                            
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="<?php echo $prev_post_link; ?>"><span class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials">
                                        <p><?php echo esc_html__( 'Prev Post', 'ronin' ); ?></p>
                                        <a href="<?php echo $prev_post_link; ?>"><h4><?php echo $prev_post_title; ?></h4></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <?php 
                                        $next_post_obj  = get_next_post();
                                        $next_post_title  = get_the_title($next_post_obj);
                                        $next_post_link   = get_the_permalink( $next_post_obj);
                                    ?>
                                    <div class="detials">
                                        <p><?php echo esc_html__('Next Post', 'ronin'); ?></p>
                                        <a href="<?php echo $next_post_link; ?>"><h4><?php echo $next_post_title; ?></h4></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="<?php echo $next_post_link; ?>"><span class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="thumb">
                                        <a href="<?php echo $next_post_link; ?>">
                                            <?php 
                                                if(has_post_thumbnail($next_post_obj )){
                                                   echo get_the_post_thumbnail($next_post_obj, 'thumbnail', array('class' => 'img-fluid nt-thumb') );
                                                }
                                            ?>
                                            
                                        </a>
                                    </div>										
                                </div>									
                            </div>
                        </div>
                        <div class="comment-main-area">
                            <?php comments_template(); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php get_sidebar();?>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
        
<?php get_footer();?>