<?php
function cptui_register_my_cpts_sbp_portfolio() {

	/**
	 * Post Type: Portfolios.
	 */

	$labels = [
		"name" => esc_html__( "Portfolios", "sbportfolio" ),
		"singular_name" => esc_html__( "Portfolio", "sbportfolio" ),
		"menu_name" => esc_html__( "My Portfolio", "sbportfolio" ),
	];

	$args = [
		"label" => esc_html__( "Portfolios", "sbportfolio" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => [ "slug" => "sbp-portfolio", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 15,
		"menu_icon" => "dashicons-welcome-learn-more",
		"supports" => [ "title", "editor", "thumbnail", "comments", "author" ],
		"show_in_graphql" => false,
	];

	register_post_type( "sbp-portfolio", $args );
}

add_action( 'init', 'cptui_register_my_cpts_sbp_portfolio' );
