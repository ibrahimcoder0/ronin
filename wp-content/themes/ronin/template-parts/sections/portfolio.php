<?php 
$options = get_option( 'ronin_framework' ); // unique id of the framework

?>
<section class="projects_area p_120">
    <div class="container">
        <div class="main_title">
            <?php if(!empty($options['portfolio_title'])): ?>
            <h2><?php echo $options['portfolio_title']; ?></h2>
            <?php endif;?>
            <?php if(!empty($options['portfolio_content'])): ?>
            <p><?php echo $options['portfolio_content']; ?></p>
            <?php endif;?>
        </div>
        <div class="projects_fillter">
            <ul class="filter list">
                <li class="active" data-filter="*"><a href="#">All Categories</a></li>
                <?php 
                $arg = array(
                    'taxonomy' => 'portfolio-cat',
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

                $categories = get_the_terms(get_the_ID(  ), 'portfolio-cat', '', ' ', '' );
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