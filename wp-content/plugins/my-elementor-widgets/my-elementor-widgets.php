<?php
/**
* Plugin Name: My Elementor Widgets
* Description: A custom plugin to add widgets to Elementor.
* Version: 1.0
* Author: Your Name
*/

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Include the widget class
function register_custom_elementor_widget() {
    require_once(plugin_dir_path(__FILE__) . 'custom-widget.php');

    // Register the widget
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Custom_Elementor_Widget());
}
add_action('elementor/widgets/widgets_registered', 'register_custom_elementor_widget');