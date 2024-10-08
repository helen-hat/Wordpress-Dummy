<?php
	return array(
		'title'      => 'Sinco post Setting',
		'id'         => 'Sinco_post',
		'icon'       => 'el el-cogs',
		'position'   => 'normal',
		'priority'   => 'core',
		'post_types' => array( 'post' ),
		'sections'   => array(
			array(
				'fields' => array(
					array(
						'id'    => 'dimension',
						'type'  => 'select',
						'title' => esc_html__( 'Choose the Extra height', 'sinco' ),
						'options'  => array(
							'normal_height' => esc_html__( 'Normal Height', 'sinco' ),
							'extra_height' => esc_html__( 'Extra Height', 'sinco' ),
						),
						'default'  => 'normal_height',
					),
				),
			),
		),
	);


?>