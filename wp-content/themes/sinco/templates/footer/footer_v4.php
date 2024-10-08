<?php
/**
 * Footer Template  File
 *
 * @package SINCO
 * @author  Template Path
 * @version 1.0
 */

$options = sinco_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
?>
	
   <!--
    =====================================================
        Footer
    =====================================================
    -->
    <div class="footer-style-three theme-basic-footer">
        <?php if( $options->get('show_img_v4') ){?>
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_30.png" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_28.png" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_29.png" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-three">
        <?php } ?>
        <div class="container">
            <div class="inner-wrapper">
                <?php if ( is_active_sidebar( 'footer-sidebar3' ) ) { ?>
                <div class="row">
                    <?php dynamic_sidebar( 'footer-sidebar3' ); ?>
                </div>
                <?php } ?>
                <div class="bottom-footer">
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <?php if( $options->get('footer_v4_menu') ){?>
                        <ul class="order-lg-1 pb-15 d-flex justify-content-center footer-nav style-none">
                             <?php echo wp_kses($options->get('footer_v4_menu'), true); ?>
                        </ul>
                        <?php } ?>
                         <?php if($options->get( 'footer_v4_copyright_text' )){?>
                        <p class="copyright text-center order-lg-0 pb-15"><?php echo wp_kses( $options->get( 'footer_v4_copyright_text', 'Copyright @ 2022 sinco inc.' ), true ); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div> <!-- /.inner-wrapper -->
        </div>
    </div> <!-- /.footer-style-three -->