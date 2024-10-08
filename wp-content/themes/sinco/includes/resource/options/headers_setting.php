<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'sinco' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'sinco' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'sinco' ),
				'e' => esc_html__( 'Elementor', 'sinco' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'sinco' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'sinco' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'sinco' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'sinco' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
			    ),
				'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style 3', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v3.png',
			    ),
				'header_v4'  => array(
				    'alt' => esc_html__( 'Header Style 4', 'sinco' ),
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
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'sinco' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
            'id' => 'show_phone_no_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Phone Number', 'sinco'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'phone_no_v1',
			'type'    => 'textarea',
			'title'   => __( 'Phone Number', 'sinco' ),
			'required' => array( 'show_phone_no_v1', '=', true ),
		),
		array(
            'id' => 'show_seach_form_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'sinco'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
            'id' => 'show_button_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Now Button', 'sinco'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'btn_title_v1',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'sinco' ),
			'required' => array( 'show_button_v1', '=', true ),
		),
		array(
			'id'      => 'btn_link_v1',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'sinco' ),
			'required' => array( 'show_button_v1', '=', true ),
		),
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'sinco' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
            'id' => 'show_topbar_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'sinco'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'phone_no_v2',
			'type'    => 'textarea',
			'title'   => __( 'Phone Number', 'sinco' ),
			'required' => array( 'show_topbar_v2', '=', true ),
		),
		array(
            'id' => 'show_seach_form_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'sinco'),
            'default' => true,
            'required' => array( 'show_topbar_v2', '=', true ),
        ),
		array(
            'id' => 'show_button_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Now Button', 'sinco'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'sinco' ),
			'required' => array( 'show_button_v2', '=', true ),
		),
		array(
			'id'      => 'btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'sinco' ),
			'required' => array( 'show_button_v2', '=', true ),
		),
        /***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'One Page Header Style Settings', 'sinco' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
        array(
            'id' => 'show_seach_form_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'sinco'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
            'id' => 'show_button_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Now Button', 'sinco'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'btn_title_v3',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'sinco' ),
			'required' => array( 'show_button_v3', '=', true ),
		),
		array(
			'id'      => 'btn_link_v3',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'sinco' ),
			'required' => array( 'show_button_v3', '=', true ),
		),
 		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'One Page Header Style Settings', 'sinco' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
        array(
            'id' => 'show_seach_form_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'sinco'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
            'id' => 'show_button_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Now Button', 'sinco'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'      => 'btn_title_v4',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'sinco' ),
			'required' => array( 'show_button_v4', '=', true ),
		),
		array(
			'id'      => 'btn_link_v4',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'sinco' ),
			'required' => array( 'show_button_v4', '=', true ),
		),
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
