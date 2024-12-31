<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ronin
 */
?>


<div id="post-<?php the_ID();?>" <?php post_class( 'news-standard-items format-quote' );?>>
    <div class="news-content">
        <div class="mt-postbox-text">
         <?php the_content();?>
        </div>
    </div>
</div>