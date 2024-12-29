<?php 
$options = get_option( 'ronin_framework' ); // unique id of the framework

?>

<section class="testimonials_area p_120">
    <div class="container">
        <div class="main_title">
            <?php if(!empty($options['testimonail_title'])): ?>
            <h2><?php echo $options['testimonail_title']; ?></h2>
            <?php endif;?>
            <?php if(!empty($options['testimonail_content'])): ?>
            <p><?php echo $options['testimonail_content']; ?></p>
            <?php endif;?>
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