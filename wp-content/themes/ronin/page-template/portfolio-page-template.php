<?php
/**
 * Template Name: portfolio page-tempalte
 */
get_header();

?>

       <!--================Home Banner Area =================-->
       <?php get_template_part('template-parts/common/breadcrumb'); ?>
       <!--================End Home Banner Area =================-->

        <!--================Projects Area =================-->
		<?php get_template_part('template-parts/sections/portfolio');?>
        <!--================End Projects Area =================-->

       <!--================Testimonials Area =================-->
       <?php get_template_part('template-parts/sections/testimonial'); ?>
       <!--================End Testimonials Area =================-->

<?php get_footer();?>