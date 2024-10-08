<?php
/**
 * Banner Template
 *
 * @package    WordPress
 * @subpackage Template Path
 * @author     Template Path
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );

	return false;
}

?>
<?php if ( $data->get( 'enable_banner' ) ) : ?>

	
    <?php if( $data->get( 'banner_type' ) == 'banner_v3' ):?>
    
    <!-- 
    =============================================
        Theme Inner Banner
    ============================================== 
    -->
    <!-- <div class="theme-inner-banner"> -->
        <div class="container">
            <h2 class="intro-title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
            <ul class="page-breadcrumb style-none d-flex">
                <?php echo sinco_the_breadcrumb(); ?>
            </ul>
        </div>
        <img src="<?php echo esc_url( $data->get( 'banner' ) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes illustration-two">
    </div> <!-- /.theme-inner-banner -->
    
	<?php elseif( $data->get( 'banner_type' ) == 'banner_v2' ):?>
    
    <!-- 
    =============================================
        Theme Inner Banner
    ============================================== 
    -->
    <div class="theme-inner-banner space-fix-one">
        <div class="container">
            <h2 class="intro-title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
            <ul class="page-breadcrumb style-none d-flex">
                <?php echo sinco_the_breadcrumb(); ?>
            </ul>
        </div>
        <img src="<?php echo esc_url( $data->get( 'banner' ) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes illustration-one">
    </div> <!-- /.theme-inner-banner -->
    
    <?php else:?>
    
    <!-- 
    =============================================
        Theme Inner Banner
    ============================================== 
    -->
    <div class="theme-inner-banner">
        <div class="container">
            <h2 class="intro-title text-center"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
            <ul class="ba-breadcrumb style-none d-flex justify-content-center">
                <?php echo sinco_the_breadcrumb(); ?>
            </ul>
        </div>
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_38.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_39.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
    </div> <!-- /.theme-inner-banner -->

<?php endif; endif; ?>