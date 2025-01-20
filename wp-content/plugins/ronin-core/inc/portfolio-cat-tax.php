<?php
function cptui_register_my_taxes_sbp_category() {

	/**
	 * Taxonomy: Categories.
	 */

	$labels = [
		"name" => esc_html__( "Categories", "sbportfolio" ),
		"singular_name" => esc_html__( "Category", "sbportfolio" ),
		"menu_name" => esc_html__( "Website Category", "sbportfolio" ),
	];

	
	$args = [
		"label" => esc_html__( "Categories", "sbportfolio" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'sbp-category', 'with_front' => false, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => true,
		"rest_base" => "sbp-category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "sbp-category", [ "sbp-portfolio" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_sbp_category' );