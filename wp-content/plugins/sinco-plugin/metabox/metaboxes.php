<?php
if ( ! function_exists( "sinco_add_metaboxes" ) ) {
	function sinco_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'team.php',
			'testimonials.php',
			'dimension.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( SINCOPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/sinco_options/boxes", "sinco_add_metaboxes" );
}

