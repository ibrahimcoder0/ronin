<?php get_header();?>
        
        <!--================Home Banner Area =================-->
        <?php get_template_part('template-parts/common/breadcrumb'); ?>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Categorie Area =================-->
        <section class="blog_categorie_area">
            <div class="container">
                <div class="row">
                    <?php
                    $all_category = get_categories(array(
                        'taxonomoy'     => 'category',
                        'orderby'       => 'id',
                        'order'         => 'DESC',
                        'number'        => 3
                    ));
                    foreach($all_category as $category):
                    ?>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="<?php $attachment_id = get_term_meta( $category -> term_id, 'category_thumb', true ); echo wp_get_attachment_image_url($attachment_id, 'large'); ?>">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="<?php echo get_category_link( $category ); ?>"><h5><?php echo $category -> name; ?></h5></a>
                                    <div class="border_line"></div>
                                    <p><?php echo $category -> description; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <!--================Blog Categorie Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                            <?php while(have_posts(  )): the_post(  ); ?>
                            <article class="row blog_item">
                               <div class="col-md-3">
                                   <div class="blog_info text-right">
                                        <div class="post_tag">
                                            <?php the_category(', ', ''); ?>
                                        </div>
                                        <ul class="blog_meta list">
                                            <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author( ); ?><i class="lnr lnr-user"></i></a></li>
                                            <li><a href="#"><?php the_date();?><i class="lnr lnr-calendar-full"></i></a></li>
                                            <li><a href="#"><?php the_field('post_view'); ?> Views<i class="lnr lnr-eye"></i></a></li>
                                            <li><a href="#"><?php $comment_count = get_comment_count(get_the_ID(  )); echo $comment_count['total_comments']; ?> Comments<i class="lnr lnr-bubble"></i></a></li>
                                        </ul>
                                    </div>
                               </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <?php if(has_post_thumbnail( )){
                                            the_post_thumbnail('full', array('class' => 'blog-thumb'));
                                        } ?>
                                        <div class="blog_details">
                                            <a href="<?php the_permalink( ); ?>"><h2><?php the_title( ); ?></h2></a>
                                            <p><?php the_excerpt(  ); ?></p>
                                            <a href="<?php the_permalink( ); ?>" class="blog_btn">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php endwhile;?>

                            <nav class="blog-pagination justify-content-center d-flex">
                                <?php 
                                    the_posts_pagination(array(
                                        'mid_size'  => 3,
                                        'prev_text' => 'New Post',
                                        'next_text' => 'Older Post'
                                    ));
                                ?>
		                        
		                    </nav>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
        
<?php get_footer();?>