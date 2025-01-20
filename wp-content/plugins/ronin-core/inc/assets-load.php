<?php
/**
 * Plugin Assets loading function
 */
function sb_assets_loading_function(){
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', null, '1.0.0');
    wp_enqueue_style('isotope-style', plugin_dir_url(__DIR__). 'assets/css/style.css', null, '1.0.0');
    wp_enqueue_script('isotope', plugin_dir_url(__DIR__). 'assets/js/isotope.min.js', array('jquery'), '3.0.6', true);
    wp_enqueue_script('custom', plugin_dir_url(__DIR__). 'assets/js/custom.js', array('jquery', 'isotope'), '1.0.0', true);
}
 add_action('wp_enqueue_scripts', 'sb_assets_loading_function');