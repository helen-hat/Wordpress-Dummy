<?php

namespace SINCOPLUGIN\Inc;


use SINCOPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wpsinco' ),
			'singular_name'     => _x( 'Project Category', 'wpsinco' ),
			'search_items'      => __( 'Search Category', 'wpsinco' ),
			'all_items'         => __( 'All Categories', 'wpsinco' ),
			'parent_item'       => __( 'Parent Category', 'wpsinco' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpsinco' ),
			'edit_item'         => __( 'Edit Category', 'wpsinco' ),
			'update_item'       => __( 'Update Category', 'wpsinco' ),
			'add_new_item'      => __( 'Add New Category', 'wpsinco' ),
			'new_item_name'     => __( 'New Category Name', 'wpsinco' ),
			'menu_name'         => __( 'Project Category', 'wpsinco' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'project', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wpsinco' ),
			'singular_name'     => _x( 'Service Category', 'wpsinco' ),
			'search_items'      => __( 'Search Category', 'wpsinco' ),
			'all_items'         => __( 'All Categories', 'wpsinco' ),
			'parent_item'       => __( 'Parent Category', 'wpsinco' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpsinco' ),
			'edit_item'         => __( 'Edit Category', 'wpsinco' ),
			'update_item'       => __( 'Update Category', 'wpsinco' ),
			'add_new_item'      => __( 'Add New Category', 'wpsinco' ),
			'new_item_name'     => __( 'New Category Name', 'wpsinco' ),
			'menu_name'         => __( 'Service Category', 'wpsinco' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpsinco' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpsinco' ),
			'search_items'      => __( 'Search Category', 'wpsinco' ),
			'all_items'         => __( 'All Categories', 'wpsinco' ),
			'parent_item'       => __( 'Parent Category', 'wpsinco' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpsinco' ),
			'edit_item'         => __( 'Edit Category', 'wpsinco' ),
			'update_item'       => __( 'Update Category', 'wpsinco' ),
			'add_new_item'      => __( 'Add New Category', 'wpsinco' ),
			'new_item_name'     => __( 'New Category Name', 'wpsinco' ),
			'menu_name'         => __( 'Testimonials Category', 'wpsinco' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpsinco' ),
			'singular_name'     => _x( 'Team Category', 'wpsinco' ),
			'search_items'      => __( 'Search Category', 'wpsinco' ),
			'all_items'         => __( 'All Categories', 'wpsinco' ),
			'parent_item'       => __( 'Parent Category', 'wpsinco' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpsinco' ),
			'edit_item'         => __( 'Edit Category', 'wpsinco' ),
			'update_item'       => __( 'Update Category', 'wpsinco' ),
			'add_new_item'      => __( 'Add New Category', 'wpsinco' ),
			'new_item_name'     => __( 'New Category Name', 'wpsinco' ),
			'menu_name'         => __( 'Team Category', 'wpsinco' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'team', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wpsinco' ),
			'singular_name'     => _x( 'Faqs Category', 'wpsinco' ),
			'search_items'      => __( 'Search Category', 'wpsinco' ),
			'all_items'         => __( 'All Categories', 'wpsinco' ),
			'parent_item'       => __( 'Parent Category', 'wpsinco' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpsinco' ),
			'edit_item'         => __( 'Edit Category', 'wpsinco' ),
			'update_item'       => __( 'Update Category', 'wpsinco' ),
			'add_new_item'      => __( 'Add New Category', 'wpsinco' ),
			'new_item_name'     => __( 'New Category Name', 'wpsinco' ),
			'menu_name'         => __( 'Faqs Category', 'wpsinco' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'faqs', $args );
		
		
	}
	
}
