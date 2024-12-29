<?php 

/**
 * Template Name: service page-tempalte
 */

 get_header();

 ?>
 
        <!--================Home Banner Area =================-->
        <?php get_template_part('template-parts/common/breadcrumb'); ?>
        <!--================End Home Banner Area =================-->

        <!--================Feature Area =================-->
        <?php get_template_part('template-parts/sections/service');?>
        <!--================End Feature Area =================-->

        <!--================Testimonials Area =================-->
        <?php get_template_part('template-parts/sections/testimonial'); ?>
        <!--================End Testimonials Area =================-->

        <!--================Latest Blog Area =================-->
        <?php get_template_part('template-parts/sections/blog'); ?>
        <!--================End Latest Blog Area =================-->

<?php get_footer();?>