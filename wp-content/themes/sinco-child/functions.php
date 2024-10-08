<?php
/**
 * Theme functions and definitions.
 */
function sinco_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'sinco-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'sinco-minified-style' , get_template_directory_uri() . '/style.css' );
    }

    wp_enqueue_style( 'sinco-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'sinco-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'sinco_child_enqueue_styles' );