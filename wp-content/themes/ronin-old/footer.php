        <!--================Footer Area =================-->
        <footer class="footer_area p_120">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget ab_widget">
        					<?php
								if(is_active_sidebar('footer_1')){
									dynamic_sidebar('footer_1');
								}
							?>
        				</aside>
        			</div>
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget news_widget">
						<?php
								if(is_active_sidebar('footer_2')){
									dynamic_sidebar('footer_2');
								}
							?>
        				</aside>
        			</div>
        			<div class="col-lg-2">
        				<aside class="f_widget social_widget">
							<?php
								if(is_active_sidebar('footer_3')){
									dynamic_sidebar('footer_3');
								}
							?>
        				</aside>
        			</div>
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        <?php wp_footer();?>
    </body>
</html>