<?php
/**
 * Plugin Name: My Elementor Banner Widget
 * Description: A custom banner widget for Elementor.
 * Version: 1.0
 * Author: Your Name
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

// Register the widget
function register_my_banner_widget() {
    require_once( __DIR__ . '/widgets/class-banner-widgets.php' );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Banner_Widget() );
}
add_action( 'elementor/widgets/widgets_registered', 'register_my_banner_widget' );
