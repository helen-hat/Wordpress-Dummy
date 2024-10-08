<?php

define( 'SINCO_ROOT', get_template_directory() . '/' );

require_once get_template_directory() . '/includes/functions/functions.php';
include_once get_template_directory() . '/includes/classes/base.php';
include_once get_template_directory() . '/includes/classes/dotnotation.php';
include_once get_template_directory() . '/includes/classes/header-enqueue.php';
include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/ajax.php';
include_once get_template_directory() . '/includes/classes/common.php';
include_once get_template_directory() . '/includes/classes/bootstrap_walker.php';
include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/library/hook.php';

// Merlin demo import.
require_once get_template_directory() . '/demo-import/class-merlin.php';
require_once get_template_directory() . '/demo-import/merlin-config.php';
require_once get_template_directory() . '/demo-import/merlin-filters.php';

add_action( 'after_setup_theme', 'sinco_wp_load', 5 );

function sinco_wp_load() {

	defined( 'SINCO_URL' ) or define( 'SINCO_URL', get_template_directory_uri() . '/' );
	define(  'SINCO_KEY','!@#sinco');
	define(  'SINCO_URI', get_template_directory_uri() . '/');

	if ( ! defined( 'SINCO_NONCE' ) ) {
		define( 'SINCO_NONCE', 'sinco_wp_theme' );
	}

	( new \SINCO\Includes\Classes\Base )->loadDefaults();
	( new \SINCO\Includes\Classes\Ajax )->actions();

}
add_action( 'init', 'sinco_bunch_theme_init');
function sinco_bunch_theme_init()
{
	$bunch_exlude_hooks = include_once get_template_directory(). '/includes/resource/remove_action.php';
	foreach( $bunch_exlude_hooks as $k => $v )
	{
		foreach( $v as $value )
		remove_action( $k, $value[0], $value[1] );
	}

}
