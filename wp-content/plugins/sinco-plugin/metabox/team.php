<?php
return array(
	'title'      => 'Sinco Team Setting',
	'id'         => 'sinco_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'team' ),
	'sections'   => array(
		array(
			'id'     => 'sinco_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'sinco' ),
				),
				array(
					'id'    => 'team_link',
					'type'  => 'text',
					'title' => esc_html__( 'Team Link', 'sinco' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'sinco' ),
				),
			),
		),
	),
);