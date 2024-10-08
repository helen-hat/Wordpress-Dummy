<?php
/**
 * Default Template Main File.
 *
 * @package SINCO
 * @author  TemplatePath
 * @version 1.0
 */

get_header();
$data  = \SINCO\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-8 col-sm-12';
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
                            
                        <?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        
                        <div class="clearfix"></div>
                        <?php
                        $defaults = array(
                            'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'sinco' ),
                            'after'  => '</div>',
        
                        );
                        wp_link_pages( $defaults );
                        ?>
                        <?php comments_template() ?>
                     
                     </div>
                </div>
                <?php
                    if ( $layout == 'right' ) {
                        $data->set('sidebar', 'default-sidebar');
                        do_action( 'sinco_sidebar', $data );
                    }
                ?>
        
                </div>
            </div>
        </div>
    </div>
</div>
<!--End blog area--> 
<?php get_footer(); ?>
