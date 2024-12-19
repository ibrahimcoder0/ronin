<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<?php wp_head(  );?>
    </head>
    <body <?php body_class(); ?>>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu" id="mainNav">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="<?php echo get_template_directory_uri(  ); ?>/assets/img/logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						
						<?php 
						$primary_menu = wp_nav_menu( array(
							'theme_location'    => 'primary_menu',
							'container'			=> '',
							'menu_class'		=> 'nav navbar-nav menu_nav ml-auto',
							'echo'				=> false
						) );

						$primary_menu = str_replace('menu-item','menu-item nav-item', $primary_menu);
						$primary_menu = str_replace('nav-item-has-children','nav-item-has-children submenu dropdown', $primary_menu);

						echo $primary_menu;

						?>

						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->