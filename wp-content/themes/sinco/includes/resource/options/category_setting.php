<?php

return  array(
    'title'      => esc_html__( 'Category Page Settings', 'sinco' ),
    'id'         => 'category_setting',
    'desc'       => '', 
    'subsection' => true,
    'fields'     => array(
	    array(
		    'id'      => 'category_source_type',
		    'type'    => 'button_set',
		    'title'   => esc_html__( 'Category Source Type', 'sinco' ),
		    'options' => array(
			    'd' => esc_html__( 'Default', 'sinco' ),
			    'e' => esc_html__( 'Elementor', 'sinco' ),
		    ),
		    'default' => 'd',
	    ),
	    array(
		    'id'       => 'category_elementor_template',
		    'type'     => 'select',
		    'title'    => __( 'Template', 'sinco' ),
		    'data'     => 'posts',
		    'args'     => [
			    'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
		    ],
		    'required' => [ 'category_source_type', '=', 'e' ],
	    ),
		array(
		    'id'       => 'category_default_st',
		    'type'     => 'section',
		    'title'    => esc_html__( 'Category Default', 'sinco' ),
		    'indent'   => true,
		    'required' => [ 'category_source_type', '=', 'd' ],
	    ),
	    array(
		    'id'      => 'category_page_banner',
		    'type'    => 'switch',
		    'title'   => esc_html__( 'Show Banner', 'sinco' ),
		    'desc'    => esc_html__( 'Enable to show banner on blog', 'sinco' ),
		    'default' => true,
	    ),
	    array(
		    'id'       => 'category_banner_title',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Banner Section Title', 'sinco' ),
		    'desc'     => esc_html__( 'Enter the title to show in banner section', 'sinco' ),
		    'required' => array( 'category_page_banner', '=', true ),
	    ),
	    array(
		    'id'       => 'category_page_background',
		    'type'     => 'media',
		    'url'      => true,
		    'title'    => esc_html__( 'Background Image', 'sinco' ),
		    'desc'     => esc_html__( 'Insert background image for banner', 'sinco' ),
		    'default'  => array(
			    'url' => SINCO_URI . 'assets/images/assets/ils_20.svg',
		    ),
		    'required' => array( 'category_page_banner', '=', true ),
	    ),
		array(
		    'id'       => 'category_sidebar_layout',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Layout', 'sinco' ),
		    'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'sinco' ),
		    'options'  => array(

			    'left'  => array(
				    'alt' => esc_html__( '2 Column Left', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/2cl.png',
			    ),
			    'full'  => array(
				    'alt' => esc_html__( '1 Column', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/1col.png',
			    ),
			    'right' => array(
				    'alt' => esc_html__( '2 Column Right', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
			    ),
		    ),

		    'default' => 'right',
	    ),
		array(
		    'id'       => 'category_page_sidebar',
		    'type'     => 'select',
		    'title'    => esc_html__( 'Sidebar', 'sinco' ),
		    'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'sinco' ),
		    'required' => array(
			    array( 'category_sidebar_layout', '=', array( 'left', 'right' ) ),
		    ),
		    'options'  => sinco_get_sidebars(),
	    ),
	    array(
		    'id'       => 'category_default_ed',
		    'type'     => 'section',
		    'indent'   => false,
		    'required' => [ 'category_source_type', '=', 'd' ],
	    ),
    ),
);