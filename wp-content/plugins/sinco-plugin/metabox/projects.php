<?php
return array(
	'title'      => 'Sinco Project Setting',
	'id'         => 'sinco_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'project' ),
	'sections'   => array(
		array(
			'id'     => 'sinco_projects_meta_setting',
			'fields' => array(
				array(
					'id'    => 'project_link',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Project Link', 'sinco' ),
				),
				array(
					'id'    => 'project_dimension',
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