<?php get_header();?>
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Portfolio Details</h2>
						<?php get_template_part('template-parts/common/breadcrumb'); ?>
						
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Portfolio Details Area =================-->
        <section <?php post_class('portfolio_details_area p_120'); ?>>
        	<div class="container">
        		<div class="portfolio_details_inner">
					<div class="row">
						<div class="col-md-6">
							<div class="left_img">
                                <?php if(has_post_thumbnail( )){
                                    the_post_thumbnail( 'full', array('class' => 'img-fluid') );
                                } ?>
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="portfolio_right_text">
								<h4><?php the_title(); ?></h4>
								<p><?php the_field('portfolio_brife'); ?></p>
								<ul class="list">

									<li><span>Rating</span>: 
                                    <?php
                                        $rating = get_field('portfolio_rating');
                                        for($i = 0; $i < $rating; $i++){
                                            echo '<i class="fa fa-star"></i> ';
                                        }
                                    ?>
                                    <!-- <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> -->

                                    </li>

									<li><span>Client</span>:  <?php the_field('client_name'); ?></li>
									<li><span>Website</span>:  <a href="<?php the_field('portfolio_url') ?>"><?php the_field('portfolio_url') ?></a></li>
									<li><span>Completed</span>:  <?php the_field('portfolio_date'); ?></li>
								</ul>
							</div>
						</div>
					</div>
       				<p><?php the_content(); ?></p>
        		</div>
        	</div>
        </section>
        <!--================End Portfolio Details Area =================-->
        
<?php get_footer();?>