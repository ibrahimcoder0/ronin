        <!--================Footer Area =================-->
        <footer class="footer_area p_120">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				<?php 
                         if(is_active_sidebar('footer_1' )){
                            dynamic_sidebar( 'footer_1');
                         }
                        ?>
        			</div>
        			<div class="col-lg-5 col-sm-6">
                    <?php 
                         if(is_active_sidebar('footer_2' )){
                            dynamic_sidebar( 'footer_2');
                         }
                        ?>
        			</div>
        			<div class="col-lg-2">
                        <?php 
                         if(is_active_sidebar('footer_3' )){
                            dynamic_sidebar( 'footer_3');
                         }
                        ?>
        			</div>
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        <?php wp_footer();?>
    </body>
</html>