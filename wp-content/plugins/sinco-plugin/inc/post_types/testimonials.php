<?php
/**
 * Abstract class for register post type
 *
 * @package    WordPress
 * @subpackage Student2 Plugin
 * @author     Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version    1.0
 */

namespace SINCOPLUGIN\Inc\Post_Types;

use SINCOPLUGIN\Inc\Abstracts\Post_Type;

if ( ! function_exists( 'add_action' ) ) {
	exit;
}

/**
 * Abstract Post Type
 * Implemented by classes using the same CRUD(s) pattern.
 *
 * @version  2.6.0
 * @package  SINCOPLUGIN/Abstracts
 * @category Abstract Class
 * @author   Wptech
 */
class Testimonials extends Post_Type {

	protected $post_type = 'testimonials';

	protected $menu_icon = 'dashicons-portfolio';

	protected $taxonomies = array();

	public static $instance;


	/**
	 * [instance description]
	 *
	 * @return [type] [description]
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * [init description]
	 *
	 * @return [type] [description]
	 */
	public static function init() {

		self::instance()->menu_name = esc_html__( 'Testimonials', 'wpfixker' );
		self::instance()->singular  = esc_html__( 'Testimonial', 'wpsinco' );
		self::instance()->plural    = esc_html__( 'Testimonials', 'wpsinco' );
		self::instance()->supports  = array( 'title', 'editor', 'excerpt','thumbnail' );

		add_action( 'init', array( self::instance(), 'register' ) );
	}


}
