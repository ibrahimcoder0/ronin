<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ronin
 */

$ronin_blog_btn = get_theme_mod( 'ronin_blog_btn', 'Read More' );
$ronin_blog_btn_switch = get_theme_mod( 'ronin_blog_btn_switch', true );

?>
<?php if ( !empty( $ronin_blog_btn_switch ) ): ?>
<div class="news-button">
    <a href="<?php the_permalink();?>" class="theme-btn mt-4">
    <?php print esc_html( $ronin_blog_btn );?><i class="fa-regular fa-arrow-right"></i>
    </a>
</div>
<?php endif;?>
