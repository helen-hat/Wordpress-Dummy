<?php

return array(
	'id'     => 'sinco_banner_settings',
	'title'  => esc_html__( "Sinco Banner Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'banner_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Banner Source Type', 'sinco' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'sinco' ),
				'e' => esc_html__( 'Elementor', 'sinco' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'banner_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'banner_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'banner_page_banner',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Banner', 'sinco' ),
			'default'  => false,
			'required' => [ 'banner_source_type', '=', 'd' ],
		),
		array(
			'id'       => 'page_banner_style',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Banner Style', 'sinco' ),
			'desc'     => esc_html__( 'Select Banner Style', 'sinco' ),
			'required' => array( 'banner_page_banner', '=', true ),
			'options'  => array(
				'banner_v1' => array(
					'alt' => 'Banner Style 1',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner1.png',
				),
				'banner_v2' => array(
					'alt' => 'Banner Style 2',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner2.png',
				),
				'banner_v3' => array(
					'alt' => 'Banner Style 3',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner3.png',
				),
			),
			'default'  => 'banner_v1',
		),
		array(
			'id'       => 'banner_banner_title',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Banner Section Title', 'sinco' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'sinco' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'sinco' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'sinco' ),
			'default'  => array(
				'url' => SINCO_URI . 'assets/images/assets/ils_17.svg',
			),
			'required' => array( 'banner_page_banner', '=', true ),
		),
	),
);