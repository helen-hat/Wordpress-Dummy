<?php

return array(
	'id'     => 'sinco_header_settings',
	'title'  => esc_html__( "Sinco Header Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'sinco' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'sinco' ),
				'e' => esc_html__( 'Elementor', 'sinco' ),
			),
			'default'=> '',
		),
		array(
			'id'       => 'header_new_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'sinco-plugin' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page' => -1,
				'orderby'  => 'title',
				'order'     => 'DESC'
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Choose Header Styles', 'sinco' ),
			'options'  => array(
				'header_v1' => array(
					'alt' => 'Header Style 1',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
				),
				'header_v2' => array(
					'alt' => 'Header Style 2',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
				),
				'header_v3' => array(
					'alt' => 'Header Style 3',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v3.png',
				),
				'header_v4' => array(
					'alt' => 'One Page Header Style 4',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v4.png',
				),
				'header_v5'  => array(
				    'alt' => esc_html__( 'Header Style 5', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/dark-header.png',
			    ),
				'header_v6'  => array(
				    'alt' => esc_html__( 'Header Style 6', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/dark-header2.png',
			    ),
				'header_v7'  => array(
				    'alt' => esc_html__( 'Header Style 7', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/dark-header3.png',
			    ),
				'header_v8'  => array(
				    'alt' => esc_html__( 'Header Style 8', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/dark-header4.png',
			    ),
			),
			'required' => array( array( 'header_source_type', 'equals', 'd' ) ),
		),
	),
);