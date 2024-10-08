<?php
return array(
	'title'      => 'Sinco Service Setting',
	'id'         => 'sinco_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'service' ),
	'sections'   => array(
		array(
			'id'     => 'sinco_service_meta_setting',
			'fields' => array(
				array(
					'id'    => 'service_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Service Link', 'sinco' ),
				),
			),
		),
	),
);