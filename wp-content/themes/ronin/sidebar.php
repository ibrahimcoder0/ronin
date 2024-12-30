<div class="blog_right_sidebar">
<!-- <?php dynamic_sidebar( 'blog-sidebar' );?> -->
    <aside class="single_sidebar_widget search_widget">
        <?php get_search_form(); ?>
        <!-- /input-group -->
        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget author_widget">
        <?php echo get_avatar(1); ?>
        <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
        <h4><?php echo get_the_author_meta('display_name', 1); ?></h4>
        <p><?php echo get_field('user_subtitle', 'user_' . 1); ?></p>
        <div class="social_icon">
            <?php 
                $fb_url     = get_field('facebook_url', 'user_' . 1);
                $tw_url     = get_field('twitter_url', 'user_' . 1);
                $gb_url     = get_field('github_url', 'user_' . 1);
                $im_url     = get_field('behance_url', 'user_' . 1);
                $yt_url     = get_field('youtube_url', 'user_' . 1);
            ?>
            <?php if(!empty($fb_url)): ?>
            <a href="<?php echo $fb_url; ?>"><i class="fa fa-facebook"></i></a>
            <?php endif;?>
            <?php if(!empty($tw_url)): ?>
            <a href="<?php echo $tw_url; ?>"><i class="fa fa-twitter"></i></a>
            <?php endif;?>
            <?php if(!empty($gb_url)): ?>
            <a href="<?php echo $gb_url; ?>"><i class="fa fa-github"></i></a>
            <?php endif;?>
            <?php if(!empty($im_url)): ?>
            <a href="<?php echo $im_url; ?>"><i class="fa fa-behance"></i></a>
            <?php endif;?>
        </div>
        <p><?php echo esc_html(get_the_author_meta('description', 1) ); ?></p>
        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget popular_post_widget">
        <h3 class="widget_title"><?php echo esc_html__('Popular Posts', 'ronin'); ?></h3>
        <?php 
            $popular_post   = new WP_Query(array(
                'post_type'     => 'post',
                'post_status'   => 'publish',
                'posts_per_page'=> 4,
                'order'         => 'commnet_count'
            ));
            while($popular_post->have_posts()): $popular_post->the_post();
        ?>
        <div class="media post_item">
            <?php if(has_post_thumbnail()){
                the_post_thumbnail( 'thumbnail', array('class'  => 'nt-thumb') );
            } ?>
            <div class="media-body">
                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                <p><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> <?php echo esc_html__( 'ago', 'ronin' )?></p>
            </div>
        </div>
        <?php endwhile;?>
        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget ads_widget">
        <a href="#"><img class="img-fluid" src="<?php echo get_template_directory_uri(  ); ?>/assets/img/blog/add.jpg" alt=""></a>
        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget post_category_widget">
        <h4 class="widget_title"><?php echo esc_html__( 'Post Catgories', 'ronin'); ?></h4>
        <ul class="list cat-list">
            <?php 
             $sidebar_category = get_categories( array(
                'taxonomy'          => 'category',
                'orderby'           => 'name',
                'order'             => 'ASC',
                'number'            => 5
             ) ) ;
             
             foreach ($sidebar_category as $category):
            ?>	
            <li>
                <a href="<?php echo esc_url( get_category_link($category)); ?>" class="d-flex justify-content-between">
                    <p><?php echo esc_html( $category->name ); ?></p>
                    <p><?php echo esc_html($category->count ); ?></p>
                </a>
            </li>
            <?php endforeach;?>
            															
        </ul>
        <div class="br"></div>
    </aside>
    <aside class="single-sidebar-widget newsletter_widget">
        <h4 class="widget_title">Newsletter</h4>
        <p>
        Here, I focus on a range of items and features that we use in life without
        giving them a second thought.
        </p>
        <div class="form-group d-flex flex-row">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
            </div>
            <a href="#" class="bbtns">Subcribe</a>
        </div>	
        <p class="text-bottom">You can unsubscribe at any time</p>	
        <div class="br"></div>							
    </aside>
    <aside class="single-sidebar-widget tag_cloud_widget">
        <h4 class="widget_title"><?php echo esc_html__( 'Tag Clouds', 'ronin' ); ?></h4>
        <ul class="list">
            <?php 
            $all_tags = get_tags();
            foreach($all_tags as $tags):
            ?>
            <li><a href="<?php echo get_tag_link($tags); ?>"><?php echo $tags->name; ?></a></li>
            <?php endforeach;?>
        </ul>
    </aside>
</div>