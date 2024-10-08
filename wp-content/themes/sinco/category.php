<?php
/**
 * Archive Main File.
 *
 * @package SINCO
 * @author  Template Path
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \SINCO\Includes\Classes\Common::instance()->data( 'category' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-8 col-sm-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	
    <?php if ( class_exists( '\Elementor\Plugin' )):?>
		<?php do_action( 'sinco_banner', $data );?>
    <?php else:?>
    <!--Start breadcrumb area paroller-->     
    <div class="theme-inner-banner">
        <div class="container">
            <h2 class="intro-title text-center"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
            <ul class="page-breadcrumb style-none d-flex justify-content-center">
                <?php echo sinco_the_breadcrumb(); ?>
            </ul>
        </div>
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_38.svg" alt="" class="shapes shape-one">
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_39.svg" alt="" class="shapes shape-two">
    </div> <!-- /.theme-inner-banner -->
    <!--End breadcrumb area-->    
	<?php endif;?>
    
    <!--Start Blog Page Three-->
    <div class="blog-section-four pt-90 mb-150 lg-pt-40 lg-mb-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-11 m-auto">
                    <div class="row">
                        <?php
                            if ( $data->get( 'layout' ) == 'left' ) {
                                do_action( 'sinco_sidebar', $data );
                            }
                        ?>
                        <div class="content-side <?php echo esc_attr( $class ); ?>">
                            <div class="thm-unit-test">
                                <?php
                                    while ( have_posts() ) :
                                        the_post();
                                        sinco_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                                    endwhile;
                                    wp_reset_postdata();
                                ?>
                            </div>
                           
                            <!--Pagination--> 
                            <div class="page-pagination-one pt-90">
                                <div class="d-flex align-items-center style-none">
                                    <?php sinco_the_pagination( $wp_query->max_num_pages );?>
                                </div>
                            </div>
                
                        </div>
                        <?php
                            if ( $data->get( 'layout' ) == 'right' ) {
                                do_action( 'sinco_sidebar', $data );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End blog area--> 
	<?php
}
get_footer();
