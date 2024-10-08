<?php
/**
 * Theme config file.
 *
 * @package SINCO
 * @author  TemplatePath
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['sinco_main_header'][] 	= array( 'sinco_preloader', 98 );
$config['default']['sinco_main_header'][] 	= array( 'sinco_main_header_area', 99 );

$config['default']['sinco_main_footer'][] 	= array( 'sinco_preloader', 98 );
$config['default']['sinco_main_footer'][] 	= array( 'sinco_main_footer_area', 99 );

$config['default']['sinco_sidebar'][] 	    = array( 'sinco_sidebar', 99 );

$config['default']['sinco_banner'][] 	    = array( 'sinco_banner', 99 );


return $config;
