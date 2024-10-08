<?php
/**
 * Blog Post Main File.
 *
 * @package SINCO
 * @author  Template Path
 * @version 1.0
 */

get_header();
$data    = \SINCO\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8';
$options = sinco_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

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

<!--Start Blog Details Area-->
<div class="blog-details pt-90 mb-150 lg-pt-40 lg-mb-100">
    <div class="container">
        <div class="row">
            <div class="col-xxl-11 m-auto">
                <div class="row">
					<?php
                        if ( $data->get( 'layout' ) == 'left' ) {
                            do_action( 'sinco_sidebar', $data );
                        }
                    ?>
                    <div class="<?php echo esc_attr( $class ); ?>">
                        
                        <?php while ( have_posts() ) : the_post(); ?>
                        <div class="blog-details-content">
                            
                            <div class="thm-unit-test">    
                                
                                <article class="blog-meta-three tran3s mt-45">
                                    <?php if(has_post_thumbnail()){ ?>
                                    <figure class="post-img m0"><div class="w-100 tran4s">
                                            <?php the_post_thumbnail('sinco_1170x440'); ?>
                                        </div>
                                     </figure>
                                    <?php } ?>    
                                       
                                    <div class="post-data">
                                        
                                        <div class="post-meta">
                                            <div class="date"><?php echo esc_attr(get_the_date()); ?></div>
                                            <ul>
                                                <li><?php esc_html_e('By:', 'sinco'); ?> <?php the_author(); ?>  /  <?php if(has_category()){?><?php the_category(' '); ?> /<?php } ?> <?php comments_number( wp_kses(__('0 Comments' , 'sinco'), true), wp_kses(__('1 Comment' , 'sinco'), true), wp_kses(__('% Comments' , 'sinco'), true)); ?></li>
                                            </ul>
                                        </div>
                                        
                                        <div class="text">
                                            <?php the_content(); ?>
                                            <div class="clearfix"></div>
                                            <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'sinco'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                                        </div>
                                        
                                        <?php if(function_exists('bunch_share_us_two') || has_tag()):?>
                                        <div class="bottom-widget d-sm-flex align-items-center justify-content-between">
                                            
                                            <?php if(has_tag()){ ?>
                                            <ul class="d-flex tags style-none pt-10">
                                                <li><?php esc_html_e('Tags:', 'sinco'); ?></li>
                                                <?php the_tags( '<li>', '</li>, <li>', '</li>' ); ?> 
                                            </ul>
                                            <?php } ?>
                                            
                                            <?php if(function_exists('bunch_share_us_two')):?>
                                            <?php echo wp_kses(bunch_share_us_two(get_the_id(),$post->post_name ), true);?>                                        
                                            <?php endif;?>
                                        </div>
                                        <?php endif;?>
                                    </div> <!-- /.post-data -->
                                
                                </article>
                                
                                <!--End post-details-->
                                <?php comments_template(); ?>
                            
                            </div>
                            <!--End thm-unit-test-->
                        </div>
                        <!--End blog-content-->
                        <?php endwhile; ?>
                        
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
