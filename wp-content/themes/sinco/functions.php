<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'sinco_setup_theme' );
add_action( 'after_setup_theme', 'sinco_load_default_hooks' );


function sinco_setup_theme() {

	load_theme_textdomain( 'sinco', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
    
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'sinco_49x49', 49, 49, true ); //sinco_49x49 Services Provider
	add_image_size( 'sinco_410x320', 410, 320, true ); //sinco_410x320 Latest News
	add_image_size( 'sinco_420x520', 420, 520, true ); //sinco_420x520 Testimonials V2
	add_image_size( 'sinco_410x300', 410, 300, true ); //sinco_410x300 Latest News V2
	add_image_size( 'sinco_450x540', 450, 540, true ); //sinco_450x540 Recent Work
	add_image_size( 'sinco_130x35', 130, 35, true ); //sinco_130x35 Testimonials V3
	add_image_size( 'sinco_410x380', 410, 380, true ); //sinco_410x380 Latest News V3
	add_image_size( 'sinco_300x320', 300, 320, true ); //sinco_300x320 Our Team
	add_image_size( 'sinco_560x462', 560, 462, true ); //sinco_560x462 Our project 1
	add_image_size( 'sinco_560X370', 560, 370, true ); //sinco_560X370  Our project 1
	add_image_size( 'sinco_1170x440', 1170, 440, true ); //sinco_1170x440 Blog Standard
	add_image_size( 'sinco_540x587', 540, 587, true ); //sinco_1170x440 Blog Standard

	
	
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'sinco' ),
		'onepage_menu' => esc_html__( 'OnePage Menu', 'sinco' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'sinco_admin_init', 2000000 );
}

/**
 * [sinco_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function sinco_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [sinco_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function sinco_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'sinco' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'sinco' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'sinco' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="sidebar-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'sinco'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'sinco'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow animated fadeInUp"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h5 class="footer-title">',
		'after_title' => '</h5>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Two', 'sinco'),
		'id' => 'footer-sidebar2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'sinco'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow animated fadeInUp"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h5 class="footer-title">',
		'after_title' => '</h5>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Three', 'sinco'),
		'id' => 'footer-sidebar3',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'sinco'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow animated fadeInUp"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h5 class="footer-title">',
		'after_title' => '</h5>'
	));
	register_sidebar(array(
		'name' => esc_html__('Services Widget', 'sinco'),
		'id' => 'service-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'sinco'),
		'before_widget'=>'<div id="%1$s" class="service-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	}
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'sinco' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'sinco' ),
	  'before_widget'=>'<div id="%1$s" class="widget single-sidebar-box %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h5 class="sidebar-title">',
	  'after_title' => '</h5>'
	));
	if ( ! is_object( sinco_WSH() ) ) {
		return;
	}

	$sidebars = sinco_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( sinco_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="sidebar-title">',
			'after_title'   => '</h5>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'sinco_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function sinco_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'sinco' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'sinco' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'sinco' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'sinco' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'sinco' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'sinco' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'sinco' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'sinco' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'sinco' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'sinco_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function sinco_enqueue_scripts() {
	$options = sinco_WSH()->option();
	$header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
	$header_option = $options->get( 'header_style_settings' );
	$header = ( $header_meta ) ? $header_meta['0'] : $header_option;
	//styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/assets/fonts/gordita/stylesheet.css' );
	if( $header == 'header_v5' || $header == 'header_v6' || $header == 'header_v7' || $header == 'header_v8' ){
		wp_enqueue_style( 'navbar', get_template_directory_uri() . '/assets/css/dark/navbar.css' );
	}else{
		wp_enqueue_style( 'navbar', get_template_directory_uri() . '/assets/css/navbar.css' );
	}
	wp_enqueue_style( 'framework', get_template_directory_uri() . '/assets/css/framework.css' );
	wp_enqueue_style( 'font-css', get_template_directory_uri() . '/assets/fonts/bootstrap-icons/font-css.css' );
	wp_enqueue_style( 'all-min', get_template_directory_uri() . '/assets/fonts/font-awesome/css/all.min.css' );
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/assets/vendor/fancybox/dist/jquery.fancybox.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/vendor/slick/slick.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css' );
	wp_enqueue_style( 'custom-animation', get_template_directory_uri() . '/assets/css/custom-animation.css' );
	wp_enqueue_style( 'sinco-main', get_stylesheet_uri() );
	if( $header == 'header_v5' || $header == 'header_v6' || $header == 'header_v7' || $header == 'header_v8' ){
		wp_enqueue_style( 'sinco-main-style', get_template_directory_uri() . '/assets/css/dark/style.css' );
	}else{
		wp_enqueue_style( 'sinco-main-style', get_template_directory_uri() . '/assets/css/style.css' );
	}
	wp_enqueue_style( 'sinco-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'sinco-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri().'/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'sinco-slick', get_template_directory_uri().'/assets/vendor/slick/slick.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri().'/assets/vendor/jquery.counterup.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri().'/assets/vendor/jquery.waypoints.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri().'/assets/vendor/fancybox/dist/jquery.fancybox.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope-pkgd-min', get_template_directory_uri().'/assets/vendor/isotope.pkgd.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'sinco-main-script', get_template_directory_uri().'/assets/js/theme.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'sinco_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function sinco_fonts_url() {
	
	$fonts_url = '';
	
		
		$font_families['Laila']      = 'Laila:wght@300;400;500;600;700&display=swap';
		$font_families['Be+Vietnam']      = 'Be Vietnam:wght@0,100,300,400,500,600,700,800&display=swap';

		$font_families = apply_filters( 'REXAR/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function sinco_theme_styles() {
    wp_enqueue_style( 'sinco-theme-fonts', sinco_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'sinco_theme_styles' );
add_action( 'admin_enqueue_scripts', 'sinco_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) sinco_set function

/**
 * [sinco_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'sinco_set' ) ) {
	function sinco_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}


// 2) sinco_add_editor_styles function

function sinco_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'sinco_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = sinco_WSH()->option(); 
if( sinco_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}

add_filter('doing_it_wrong_trigger_error', function () {return false;}, 10, 0);


function enqueue_custom_styles() {
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


