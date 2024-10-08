<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package SINCO
 * @since   1.0
 * @version 1.0
 */
$options = sinco_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
$icon_href = $options->get( 'image_favicon' ); 
$header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
$header_option = $options->get( 'header_style_settings' );
$header = ( $header_meta ) ? $header_meta['0'] : $header_option;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
    <?php if($icon_href):?>
		<link rel="shortcut icon" href="<?php echo esc_url($icon_href['url']); ?>" type="image/x-icon">
		<link rel="icon" href="<?php echo esc_url($icon_href['url']); ?>" type="image/x-icon">
	<?php endif; ?>
    <?php endif; ?>
	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>> 

<?php
if ( ! function_exists( 'wp_body_open' ) ) {
		function wp_body_open() {
			do_action( 'wp_body_open' );
		}
}?>

<div class="main-page-wrapper <?php if( $header == 'header_v8' ) echo 'body-bg-two';?>">
    <!-- ===================================================
        Loading Transition
    ==================================================== -->
    <?php if( $options->get( 'theme_preloader' ) ):?>
    <section>
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="animation-preloader">
                    <div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/logo/hashagile-logo.png" alt="" class="m-auto d-block" width="64"></div>
                    <div class="txt-loading mt-2">
                        <span data-text-preloader="H" class="letters-loading">
                            H
                        </span>
                        <span data-text-preloader="A" class="letters-loading">
                            A
                        </span>
                        <span data-text-preloader="S" class="letters-loading">
                            S
                        </span>
                        <span data-text-preloader="H" class="letters-loading">
                            H
                        </span>
                        <span data-text-preloader=" " class="letters-loading">
                            
                        </span>
                        <span data-text-preloader="A" class="letters-loading">
                            A
                        </span>
                        <span data-text-preloader="G" class="letters-loading">
                            G
                        </span>
                        <span data-text-preloader="I" class="letters-loading">
                            I
                        </span>
                        <span data-text-preloader="L" class="letters-loading">
                            L
                        </span>
                        <span data-text-preloader="E" class="letters-loading">
                            E
                        </span>
                    </div>
                </div>	
            </div>
        </div>
    </section>
	<?php endif; ?>
    
<?php do_action( 'sinco_main_header' ); ?>	