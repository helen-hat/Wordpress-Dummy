<?php
return array(
	'title'      => 'Sinco Testimonials Setting',
	'id'         => 'sinco_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'sinco_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Author Designation', 'sinco' ),
				),
				array(
					'id'    => 'testimonial_rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'sinco' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
				),
				array(
					'id'    => 'test_link',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'sinco' ),
				),
			),
		),
	),
);