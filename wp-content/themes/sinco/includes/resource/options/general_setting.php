<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'sinco'), $val);
}

return  array(
    'title'      => esc_html__( 'General Setting', 'sinco' ),
    'id'         => 'general_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
        array(
            'id' => 'theme_preloader',
            'type' => 'switch',
            'title' => esc_html__('Enable Preloader', 'sinco'),
            'default' => false,
        ),
		array(
			'id'      => 'preloader_text',
			'type'    => 'textarea',
			'title'   => __( 'Preloader Text', 'sinco' ),
			'desc'    => esc_html__( 'Enter the Preloader Text', 'sinco' ),
			'default' => 'Sinco',
		),
    ),
);
