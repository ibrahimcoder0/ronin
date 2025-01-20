<?php

/**
 * Plugin Name:       Ronin Core
 * Plugin URI:        https://ibrahimcoder.me/portfolio-plugin
 * Description:       Create your portfolio and show with 
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Ibrahim Coder
 * Author URI:        https://ibrahimcoder.me
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://ibrahimcoder.me/portfolio-plugin
 * Text Domain:       ronincore
 * Domain Path:       /languages
 */


//  requiring portfolio custom post 
require_once plugin_dir_path(__FILE__) . '/inc/portfolio-custom-post.php';
//  requiring category for portfolio custom post 
require_once plugin_dir_path(__FILE__) . '/inc/portfolio-cat-tax.php';
//  requiring assets 
require_once plugin_dir_path(__FILE__) . '/inc/assets-load.php';



/**
 * Creating Shortcode
 */

function sb_portfolio_shortcode_function($atts)
{
    $defaults = array(
        'items'     => 1
    );
    $param = shortcode_atts($defaults, $atts, 'sb_portfolio');
    ob_start(); ?>


    <?php
    // getting all portfolio custom post 
    $all_portfolios = new WP_Query(array(
        'post_type'        => 'sbp-portfolio',
        'post_status'    => 'publish',
        'posts_per_page' => $param['items'],
    ));
    ?>

<?php if($all_portfolios -> have_posts(  )): ?>
    <div class="sb_container">
        <div class="portfolio-menu">
            <ul>
                <li class="active" data-filter="*">all</li>
                <?php
                // getting all category 
                $arg = array(
                    'taxonomy'        => 'sbp-category'
                );

                // Storing All Category values 
                $all_categories = get_categories($arg);
                // looping category 
                foreach ($all_categories as $single_cat) :
                ?>
                    <li data-filter=".<?php echo $single_cat->slug; ?>"><?php echo $single_cat->name ?></li>
                <?php endforeach; ?>

            </ul>
        </div>
        <div class="portfolio-items">
            <?php
            while ($all_portfolios->have_posts()) : $all_portfolios->the_post();
            ?>

                <?php
                $categories = get_the_terms(get_the_ID(), 'sbp-category', '', ' ', '');

                $cat_array = [];
                foreach ($categories as $cat) {
                    $cat_array[] = $cat->slug;
                }

                $cat_slugs = implode(' ', $cat_array);

                ?>
                <div class="single-portfolio <?php echo $cat_slugs; ?>">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        }
                        ?>
                        <div class="portfolio-overlay">
                            <h4><?php the_title(); ?></h4>
                            <p><?php echo wp_trim_words(get_the_content(), 15, ' '); ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>


        </div>
    </div>
<?php endif; ?>


<?php if(!$all_portfolios -> have_posts(  )): ?>
<h1 class="no-post">Sorry No Item Available!</h1>
<?php endif; ?>

<?php
    return ob_get_clean();
}
add_shortcode('sb_portfolio', 'sb_portfolio_shortcode_function');



