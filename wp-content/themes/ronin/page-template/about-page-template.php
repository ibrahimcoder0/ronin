<?php 

/**
 * Template Name: About Page
 */
 get_header();
 ?>
 
        <!--================Home Banner Area =================-->
        <?php get_template_part('template-parts/common/breadcrumb'); ?>
        <!--================End Home Banner Area =================-->

        <!--================Welcome Area =================-->
        <?php get_template_part('template-parts/sections/about');?>
        <!--================End Welcome Area =================-->

        <!--================Feature Area =================-->
        <?php get_template_part('template-parts/sections/service');?>
        <!--================End Feature Area =================-->

        <!--================Testimonials Area =================-->
        <?php get_template_part('template-parts/sections/testimonial'); ?>
        <!--================End Testimonials Area =================-->

<?php get_footer();?>