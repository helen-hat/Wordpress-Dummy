<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'sinco' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'sinco' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'sinco' ),
				'e' => esc_html__( 'Elementor', 'sinco' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'sinco' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'sinco' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'sinco' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'sinco' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v2.png',
			    ),
				 'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style 3', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v3.png',
			    ),
				'footer_v4'  => array(
				    'alt' => esc_html__( 'Footer Style 4', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v4.png',
			    ),
				'footer_v5'  => array(
				    'alt' => esc_html__( 'Footer Style 5', 'sinco' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v5.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'sinco' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
            'id' => 'show_form_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Form', 'sinco'),
            'default' => true,
            'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),
		array(
			'id'      => 'footer_v1_form_title',
			'type'    => 'textarea',
			'title'   => __( 'Form Title', 'sinco' ),
			'required' => array( 'show_form_v1', '=', true ),
		),
		array(
			'id'      => 'mailchimp_form_url_v1',
			'type'    => 'text',
			'title'   => __( 'Mailchimp Form Url', 'sinco' ),
			'required' => array( 'show_form_v1', '=', true ),
		),
		array(
			'id'      => 'footer_v1_form_text',
			'type'    => 'text',
			'title'   => __( 'Form Text', 'sinco' ),
			'required' => array( 'show_form_v1', '=', true ),
		),
		array(
			'id'      => 'footer_v1_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu', 'sinco' ),
			'desc'    => esc_html__( 'Enter the raw html', 'sinco' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_v1_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'sinco' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'sinco' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
            'id' => 'show_img_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Images', 'sinco'),
            'default' => true,
            'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
        ),
		array(
			'id'      => 'footer_v2_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu', 'sinco' ),
			'desc'    => esc_html__( 'Enter the raw html', 'sinco' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_v2_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'sinco' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Three Settings', 'sinco' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'footer_v3_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu', 'sinco' ),
			'desc'    => esc_html__( 'Enter the raw html', 'sinco' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'footer_v3_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'sinco' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		/***********************************************************************
								Footer Version 4 Start
		************************************************************************/
		array(
			'id'       => 'footer_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Four Settings', 'sinco' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
            'id' => 'show_img_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Images', 'sinco'),
            'default' => true,
            'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
        ),
		array(
			'id'      => 'footer_v4_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu', 'sinco' ),
			'desc'    => esc_html__( 'Enter the raw html', 'sinco' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'footer_v4_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'sinco' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		/***********************************************************************
								Footer Version 5 Start
		************************************************************************/
		array(
			'id'       => 'footer_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Five Settings', 'sinco' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
            'id' => 'show_pattern_img_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Pattern Images', 'sinco'),
            'default' => true,
            'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
        ),
		array(
			'id'      => 'footer_v5_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu', 'sinco' ),
			'desc'    => esc_html__( 'Enter the raw html', 'sinco' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'      => 'footer_v5_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'sinco' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
