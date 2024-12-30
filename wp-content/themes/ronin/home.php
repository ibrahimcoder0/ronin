<?php get_header();


$count = get_field('post_views');
$count++;
update_field('post_views', number_format($count, 0, '', ''));

?>
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Services</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="services.html">Services</a>
						</div>
						
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Categorie Area =================-->
        <section class="blog_categorie_area">
            <div class="container">
                <div class="row">
                    <?php 
                        $all_category   = get_categories(array(
                            'taxonomoy'     => 'category',
                            'orderby'       => 'id', 
                            'order'         => 'DESC', 
                            'number'        => 3
                        ));
                        foreach ($all_category as $category):
                    ?>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="<?php $attachment_id = get_term_meta( $category -> term_id, 'category_image', true);
                                echo wp_get_attachment_image_url($attachment_id, 'large');
                             ?>" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="<?php echo get_category_link($category); ?>"><h5><?php echo $category -> name; ?></h5></a>
                                    <div class="border_line"></div>
                                    <p><?php echo $category -> description ?></p>
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

                            <?php 
                                while(have_posts(  )): 
                                    the_post(  );
                                 
                            ?>
                            <article class="row blog_item">
                               <div class="col-md-3">
                                   <div class="blog_info text-right">
                                        <div class="post_tag">
                                            <?php the_category(', ', ''); ?>
                                        </div>
                                        <ul class="blog_meta list">
                                            <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?><i class="lnr lnr-user"></i></a></li>
                                            <li><a href="#"><?php echo get_the_date();?><i class="lnr lnr-calendar-full"></i></a></li>
                                            <li><a href="#"><?php echo $count; ?> Views<i class="lnr lnr-eye"></i></a></li>
                                            <li><a href="#"><?php $comments_array = get_comment_count(get_the_ID());
                                            echo $comments_array['total_comments'] ?> Comments<i class="lnr lnr-bubble"></i></a></li>
                                        </ul>
                                    </div>
                               </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <?php
                                            if(has_post_thumbnail( )){
                                                the_post_thumbnail('medium-large', array('class'    => 'blog_arc_thumb'));
                                            }
                                        ?>
                                        <div class="blog_details">
                                            <a href="<?php the_permalink();?>"><h2><?php the_title(); ?></h2></a>
                                            <?php the_excerpt(); ?>
                                            <a href="<?php the_permalink( );?>" class="blog_btn"><?php echo esc_html__( 'View More', 'ronin' ); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php endwhile;?>

                            <div class="blog-pagination justify-content-center d-flex">
                                <?php ronin_post_pagination(); ?>
		                        
		                    </div>
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