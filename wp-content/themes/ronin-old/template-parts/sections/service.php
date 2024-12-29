<?php 
$options = get_option( 'ronin_framework' ); // unique id of the framework

?>
<section class="feature_area p_120">
    <div class="container">
        <div class="main_title">
            <?php if(!empty($options['service_title'])): ?>
            <h2><?php echo $options['service_title']; ?></h2>
            <?php endif;?>
            <?php if(!empty($options['service_content'])): ?>
            <p><?php echo $options['service_content']; ?></p>
            <?php endif;?>
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
