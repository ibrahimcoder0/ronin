<?php get_header( ); ?>
        
        <!--================Home Banner Area =================-->
		<?php get_template_part('template-parts/sections/banner'); ?>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <?php get_template_part('template-parts/sections/about');?>
        <!--================End Welcome Area =================-->
        
        <!--================Feature Area =================-->
        <?php get_template_part('template-parts/sections/service');?>
        <!--================End Feature Area =================-->
        
        <!--================Projects Area =================-->
		<?php get_template_part('template-parts/sections/portfolio');?>
        <!--================End Projects Area =================-->
        
        <!--================Testimonials Area =================-->
        <?php get_template_part('template-parts/sections/testimonial'); ?>
        <!--================End Testimonials Area =================-->
        
        <!--================Latest Blog Area =================-->
        <?php get_template_part('template-parts/sections/blog'); ?>
        <!--================End Latest Blog Area =================-->
        
<?php get_footer(); ?>