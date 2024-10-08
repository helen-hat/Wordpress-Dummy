<?php
/**
 * Plugin Name: Custom Elementor Button Widget
 * Description: A custom button widget for Elementor.
 * Version: 1.0
 * Author: Your Name
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Include the widget class
function register_custom_elementor_button_widget() {
    require_once(plugin_dir_path(__FILE__) . 'button-widget.php');

    // Register the widget
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Button_Widget());
}
add_action('elementor/widgets/widgets_registered', 'register_custom_elementor_button_widget');
