<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Sinco
 * @author     Template Path <admin@template_path.com>
 * @version    1.0
 */

$allowed_html = wp_kses_allowed_html( 'post' );

$error_img   = $options->get( 'error_image' );
$error_img   = sinco_set( $error_img, 'url', SINCO_URI . 'assets/images/shape/404.png' );

?>
<?php get_header();
$data = \SINCO\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'sinco_banner', $data );
$options = sinco_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	
	
	?>
    
    <!-- 
      =============================================
          Error Page
      ============================================== 
      -->
      <div class="error-page-content d-flex align-items-center justify-content-center">
          <div class="container">
              <div class="row">
                  <div class="col-xxl-6 col-lg-7 m-auto">
                      <h2>
                      	<?php 
							if( $options->get( '404_page_title' ) ){
								echo wp_kses( $options->get( '404_page_title' ), true );
							}else{
								esc_html_e( ' Oops! Something is wrong.', 'sinco' );
							}
						?>
                     </h2>
                      <p class="me-xxl-5 ms-xxl-5">
							<?php 
                                if( $options->get( '404_page_text' ) ){
                                    echo wp_kses( $options->get( '404_page_text' ), true );
                                }else{
                                    esc_html_e( ' Can not find what you need? Take a moment and do a search below or start from our Homepage.', 'sinco' );
                                }
                            ?>
                      </p>
                       <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-eight">
							<?php 
                                if( $options->get( 'back_home_btn_label' ) ){
                                    echo wp_kses( $options->get( 'back_home_btn_label' ), true );
                                }else{
                                    esc_html_e( 'Back to home', 'sinco' );
                                }
                            ?>
                      </a>
                      <?php endif; ?>
                  </div>
              </div>
              <?php if($error_img): ?> 
              	<img src="<?php echo esc_url($error_img); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="m-auto">
          	  <?php endif; ?>
          </div>
          <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_49.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one w-100">
      </div> <!-- /.error-page-content -->
        
<?php
}
get_footer('coming-soon'); ?>
