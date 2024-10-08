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
    <div class="footer-style-four theme-basic-footer">
        <div class="container">
            <div class="inner-wrapper">
               
                <?php if( $options->get('show_form_v1') ){?>
                <div class="subscribe-area">
                    <div class="row align-items-center">
                        <?php if($options->get( 'footer_v1_form_title')){ ?>
                        <div class="col-md-6">
                            <div class="title-style-four sm-pb-20">
                                <h4 class="main-title"><?php echo wp_kses( $options->get( 'footer_v1_form_title'), true ); ?></h4>
                            </div> <!-- /.title-style-four -->
                        </div>
                        <?php } ?>
                        
                        <div class="col-md-6">
                            <div class="subscribe-form">
                                <?php echo do_shortcode($options->get('mailchimp_form_url_v1')); ?>
                                <?php if($options->get('footer_v1_form_text')){ ?><p><?php echo wp_kses($options->get('footer_v1_form_text'), true); ?></p><?php } ?>
                            </div> <!-- /.subscribe-form -->
                        </div>
                    </div>
                </div> <!-- /.subscribe-area -->
                <?php } ?>
                
                <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
                <div class="row">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
                <?php } ?>
                
                <div class="bottom-footer">
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <?php if( $options->get('footer_v1_menu') ){?>
                        <ul class="order-lg-1 pb-15 d-flex justify-content-center footer-nav style-none">
                            <?php echo wp_kses($options->get('footer_v1_menu'), true); ?>
                        </ul>
                        <?php } ?>
                        <?php if($options->get( 'footer_v1_copyright_text' )){?>
                        <p class="copyright text-center order-lg-0 pb-15"><?php echo wp_kses( $options->get( 'footer_v1_copyright_text', 'Copyright @ 2022 sinco inc.' ), true ); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div> <!-- /.inner-wrapper -->
        </div>
    </div> <!-- /.footer-style-four -->