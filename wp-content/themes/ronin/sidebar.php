<div class="blog_right_sidebar">
    <aside class="single_sidebar_widget search_widget">
        <?php get_search_form(); ?>
        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget author_widget">
        <?php 
        // user img
        $user_img = get_field('user_img', 'user_' . 1);
        // user social
        $facebook = get_field('facebook', 'user_' . 1);
        $twitter = get_field('twitter', 'user_' . 1);
        $github = get_field('github', 'user_' . 1);
        $behance = get_field('behance', 'user_' . 1);
        ?>
        <!-- <?php echo get_avatar(1); ?> -->
        <img class="author_img rounded-circle" src="<?php echo esc_url($user_img); ?>" alt="">
        <h4><?php echo get_the_author_meta( 'display_name', 1 ); ?></h4>
        <p><?php echo get_field('user_position', 'user_' . 1); ?></p>
        <div class="social_icon">
            <?php if(!empty($facebook)):?>
            <a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a>
            <?php endif;?>
            <?php if(!empty($twitter)):?>
            <a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
            <?php endif;?>
            <?php if(!empty($github)):?>
            <a href="<?php echo $github; ?>"><i class="fa fa-github"></i></a>
            <?php endif;?>
            <?php if(!empty($behance)):?>
            <a href="<?php echo $behance; ?>"><i class="fa fa-behance"></i></a>
            <?php endif;?>
        </div>
        <p><?php echo esc_html(get_the_author_meta('description', 1) ); ?></p>
        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget popular_post_widget">
        <h3 class="widget_title">Popular Posts</h3>
        <?php 
        $popur_post = new WP_Query(array(
            'post_type'     => 'post',
            'post_status'   => 'publish',
            'posts_per_page'=> 4,
            'orderby'       => 'comment_count'
        ));
        while($popur_post -> have_posts(  )): $popur_post -> the_post(  ); ?>
        <div class="media post_item">
            <?php if(has_post_thumbnail( )){
                the_post_thumbnail('thumbnail', array('class'   => 'popur_post') );
            } ?>
            <div class="media-body">
                <a href="blog-details.html"><h3><?php the_title(); ?></h3></a>
                <p><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> ago</p>
            </div>
        </div>
        <?php endwhile;?>

        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget ads_widget">
        <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
        <div class="br"></div>
    </aside>
    <aside class="single_sidebar_widget post_category_widget">
        <h4 class="widget_title">Post Catgories</h4>
        <ul class="list cat-list">
            <?php
                $sidebar_cats = get_categories(array(
                    'taxonomy'      => 'category',
                        'orderby'       => 'name',
                        'order'         => 'ASC',
                        'number'        => 5
                ));
             foreach($sidebar_cats as $category): ?>
            <li>
                <a href="<?php echo esc_url(get_category_link($category)); ?>" class="d-flex justify-content-between">
                    <p><?php echo esc_html($category -> name ); ?></p>
                    <p><?php echo esc_html( $category->count ); ?></p>
                </a>
            </li>
			<?php endforeach; ?>											
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
        <h4 class="widget_title">Tag Clouds</h4>
        <ul class="list">
            <?php
            $tags_list=get_tags();
            foreach($tags_list as $tag):?>

            <li><a href="<?php echo get_tag_link( $tag ); ?>"><?php echo $tag->name; ?></a></li>
            <?php endforeach;?>
        </ul>
    </aside>
</div>