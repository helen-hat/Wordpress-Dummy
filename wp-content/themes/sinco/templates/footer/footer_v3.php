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
    <div class="footer-style-one theme-basic-footer">
        <div class="container">
            <div class="inner-wrapper">
                <?php if ( is_active_sidebar( 'footer-sidebar2' ) ) { ?>
                <div class="row">
                    <?php dynamic_sidebar( 'footer-sidebar2' ); ?>
                </div>
                <?php } ?>
                
                <div class="bottom-footer">
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <?php if( $options->get('footer_v3_menu') ){?>
                        <ul class="order-lg-1 pb-15 d-flex justify-content-center footer-nav style-none">
                            <?php echo wp_kses($options->get('footer_v3_menu'), true); ?>
                        </ul>
                        <?php } ?>
                        <?php if($options->get( 'footer_v3_copyright_text' )){?>
                        <p class="copyright text-center order-lg-0 pb-15"><?php echo wp_kses( $options->get( 'footer_v3_copyright_text', 'Copyright @ 2022 sinco inc.' ), true ); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div> <!-- /.inner-wrapper -->
        </div>
    </div> <!-- /.footer-style-one -->
