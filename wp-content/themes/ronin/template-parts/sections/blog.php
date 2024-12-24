<?php 
$options = get_option( 'ronin_framework' ); // unique id of the framework

?>

<section class="latest_blog_area p_120">
    <div class="container">
        <div class="main_title">
            <?php if(!empty($options['blog_title'])): ?>
            <h2><?php echo $options['blog_title']; ?></h2>
            <?php endif;?>
            <?php if(!empty($options['blog_content'])): ?>
            <p><?php echo $options['blog_content']; ?></p>
            <?php endif;?>
        </div>
        <div class="row latest_blog_inner">

            <?php
                $blog_post = new WP_Query(array(
                'post_type'			=> 'post',
                'post_status'		=> 'publish',
                'posts_per_page'	=> 3,
                'order'			=> 'DESC',
                ));
                while($blog_post->have_posts(  )): $blog_post->the_post(  ); ?>
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