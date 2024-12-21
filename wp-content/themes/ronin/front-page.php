<?php get_header( );?>
        
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="home_left_img">
								<img src="<?php echo get_template_directory_uri(  ); ?>/assets/img/banner/home-left-1.png" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="banner_content">
								<h5>This is me</h5>
								<h2>Travor James</h2>
								<p>You will begin to realise why this exercise is called the Dickens Pattern (with reference to the ghost showing Scrooge some different futures)</p>
								<a class="banner_btn" href="#">Discover Now</a>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <section class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-6">
        				<div class="welcome_text">
        					<h4>About Myself</h4>
        					<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.</p>
        					<div class="row">
        						<div class="col-md-4">
        							<div class="wel_item">
        								<i class="lnr lnr-database"></i>
        								<h4>$2.5M</h4>
        								<p>Total Donation</p>
        							</div>
        						</div>
        						<div class="col-md-4">
        							<div class="wel_item">
        								<i class="lnr lnr-book"></i>
        								<h4>1465</h4>
        								<p>Total Projects</p>
        							</div>
        						</div>
        						<div class="col-md-4">
        							<div class="wel_item">
        								<i class="lnr lnr-users"></i>
        								<h4>3965</h4>
        								<p>Total Volunteers</p>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="tools_expert">
        					<h3>Tools Expertness</h3>
        					<div class="skill_main">
								<div class="skill_item">
									<h4>After Effects <span class="counter">85</span>%</h4>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="skill_item">
									<h4>Photoshop <span class="counter">90</span>%</h4>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="skill_item">
									<h4>Illustrator <span class="counter">70</span>%</h4>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="skill_item">
									<h4>Sublime <span class="counter">95</span>%</h4>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="skill_item">
									<h4>Sketch <span class="counter">75</span>%</h4>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Welcome Area =================-->
        
        <!--================Feature Area =================-->
        <section class="feature_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>offerings to my clients</h2>
        			<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
        		</div>
        		<div class="feature_inner row">

					<?php
						$all_services = new WP_Query(array(
							'post_type'			=> 'service',
							'post_status'		=> 'publush',
							'posts_per_page'	=> 6
						));
					 while($all_services -> have_posts(  )): $all_services -> the_post(  ); ?>
        			<div class="col-lg-4 col-md-6">
        				<div class="feature_item">
        					<i class="flaticon-skyline"></i>
        					<h4><?php the_title(); ?></h4>
        					<p><?php echo wp_trim_words(get_the_content() ); ?></p>
        				</div>
        			</div>
					<?php endwhile;?>

        		</div>
        	</div>
        </section>
        <!--================End Feature Area =================-->
        
        <!--================Projects Area =================-->
        <section class="projects_area p_120">
        	<div class="container">
        		<div class="main_title">
					<h2>Our Recent Completed Projects</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
				</div>
        		<div class="projects_fillter">
					<ul class="filter list">
						<li class="active" data-filter="*"><a href="#">All Categories</a></li>
						<?php 
						$arg = array(
							'taxonomy' => 'portfolio_cat',
						);
						$all_categories = get_categories($arg);

						// echo '<pre>';
						// print_r($all_categories);
						// echo '</pre>';


						foreach ($all_categories as $single_cat):
						?>
						<li data-filter=".<?php echo $single_cat -> slug ?>"><a href="#"><?php echo $single_cat -> name ?></a></li>
						<?php endforeach;?>

					</ul>
				</div>

				<div class="projects_inner row">

					<?php
						$all_portfolio = new WP_Query(array(
							'post_type'		=> 'portfolio',
							'post_status'	=> 'publish',
							'posts_per_page'=> 6
						));
					 while($all_portfolio -> have_posts(  )): $all_portfolio -> the_post( ); 

					 ?>
					 <?php 

					 $categories = get_the_terms(get_the_ID(  ), 'portfolio_cat', '', ' ', '' );
					 $cat_array = [];
					 foreach ($categories as $cat){
						$cat_array[] = $cat -> slug;
					 }
					 $cat_slugs = implode(' ', $cat_array);
					 
					 ?>
					 
					<div class="col-lg-4 col-sm-6 <?php echo $cat_slugs ?>">
						<div class="projects_item">
							<?php 
								if(has_post_thumbnail()){
									the_post_thumbnail('medium-large', array('class' => 'img-fluid'));
								}
							?>
							<div class="projects_text">
								<a href="<?php the_permalink( ); ?>"><h4><?php the_title(); ?></h4></a>
								<p>Client Project</p>
							</div>
						</div>
					</div>
					<?php endwhile;?>

				</div>
        	</div>
        </section>
        <!--================End Projects Area =================-->
        
        <!--================Testimonials Area =================-->
        <section class="testimonials_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Testimonials</h2>
        			<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
        		</div>
        		<div class="testi_inner">
					<div class="testi_slider owl-carousel">

						<?php
							$all_testimonials = new WP_Query(array(
								'post_type'			=> 'testimonial',
								'post_status'		=> 'publish',
								'posts_per_page'	=> 3
							));
						 while($all_testimonials -> have_posts(  )): $all_testimonials -> the_post(  ); ?>
						<div class="item">
							<div class="testi_item">
								<p><?php echo wp_trim_words( get_the_content()); ?></p>
								<h4><?php the_title();?></h4>
								
									<img class="rating-img" src="<?php 

										if (!get_field('clitent_ratting')) {
											echo get_template_directory_uri() . '/assets/img/rating/star-0.png';
										} else {
											echo get_template_directory_uri() . '/assets/img/rating/star-' . get_field('clitent_ratting') . '.png';
										}

									// echo get_template_directory_uri() . '/assets/img/rating/star-' . get_field('clitent_ratting') . '.png';

									?>">
								
							</div>
						</div>
						<?php endwhile;?>

					</div>
        		</div>
        	</div>
        </section>
        <!--================End Testimonials Area =================-->
        
        <!--================Latest Blog Area =================-->
        <section class="latest_blog_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Latest Posts from Blog</h2>
        			<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
        		</div>
        		<div class="row latest_blog_inner">

					<?php while(have_posts(  )): the_post(  ); ?>
        			<div class="col-lg-4">
        				<div class="l_blog_item">
        					<div class="l_blog_img">
								<?php 
									if(has_post_thumbnail( )){
										the_post_thumbnail('medium', array('class' => 'img-fluid'));
									}
								?>
        					</div>
        					<div class="l_blog_text">
        						<div class="date">
        							<a href="#"><?php the_date(); ?>  |  By <?php the_author(); ?></a>
        						</div>
        						<a href="<?php the_permalink( );?>"><h4><?php the_title();?></h4></a>
        						<p><?php echo wp_trim_words(get_the_excerpt( ), 10, '' ); ?></p>
        					</div>
        				</div>
        			</div>
					<?php endwhile;?>

        		</div>
        	</div>
        </section>
        <!--================End Latest Blog Area =================-->
        
<?php get_footer()?>