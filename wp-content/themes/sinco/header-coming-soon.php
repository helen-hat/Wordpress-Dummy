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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
		<?php if( $icon_href ):?>
        <link rel="shortcut icon" href="<?php echo esc_url($icon_href['url']); ?>" type="image/x-icon">
		<link rel="icon" href="<?php echo esc_url($icon_href['url']); ?>" type="image/x-icon">
	<?php endif; endif; ?>
	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
    
    <style id="clock-animations"></style>
</head>


<body <?php body_class(); ?>>

<?php
if (! function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}?>

<div class="main-page-wrapper">
	<?php if( $options->get( 'theme_preloader' ) ):	
        $preloader_img    = $options->get( 'preloader_img' );
        $preloader_img    = sinso_set( $preloader_img, 'url', SINCO_URI . 'images/logo/immmigo.svg' );
    ?>
    <!-- ===================================================
            Loading Transition
        ==================================================== -->
        <section>
            <div id="preloader">
                <div id="ctn-preloader" class="ctn-preloader">
                    <div class="animation-preloader">
                        <div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/logo/logo_01.svg" alt="" class="m-auto d-block" width="38"></div>
                        <div class="txt-loading mt-2">
                            <span data-text-preloader="S" class="letters-loading">
                                S
                            </span>
                            <span data-text-preloader="I" class="letters-loading">
                                I
                            </span>
                            <span data-text-preloader="N" class="letters-loading">
                                N
                            </span>
                            <span data-text-preloader="C" class="letters-loading">
                                C
                            </span>
                            <span data-text-preloader="O" class="letters-loading">
                                O
                            </span>
                        </div>
                    </div>	
                </div>
            </div>
        </section>
	<!-- preloader end -->
    <?php endif; ?>

