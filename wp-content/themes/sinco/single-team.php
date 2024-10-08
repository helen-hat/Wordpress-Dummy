<?php get_header();
$data = \SINCO\Includes\Classes\Common::instance()->data('single-team')->get(); ?>

<!-- Page Title -->
<div class="theme-inner-banner">
    <div class="container">
        <h2 class="intro-title text-center"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
        <ul class="page-breadcrumb style-none d-flex justify-content-center">
            <?php echo sinco_the_breadcrumb(); ?>
        </ul>
    </div>
    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_38.svg" alt="" class="shapes shape-one">
    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_39.svg" alt="" class="shapes shape-two">
</div>
<!-- End Page Title -->

<?php while (have_posts()) : the_post(); ?>

<!--
=====================================================
    Team Details
=====================================================
-->
<div class="team-details mt-110 mb-160 lg-mt-60 lg-mb-100">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 col-lg-12 col-md-10 m-auto">
                <div class="main-bg d-lg-flex align-items-center">
                    <div class="img-meta">
                    	<?php if( has_post_thumbnail() ):?>
                        	<?php the_post_thumbnail('sinco_540x587', array( 'class' => 'w-100' )); ?>
                        	<img src="images/team/img_09.jpg" alt="" class="w-100">
                        <?php else:?>
							<img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/team/img_09.jpg" alt="<?php esc_atte_e( 'Team Image', 'sinco' );?>" class="w-100">
						<?php endif;?>
                    </div>
                    <div class="text-wrapper">
                        <div class="name"><?php the_title(); ?></div>
                        <div class="position"><?php echo get_post_meta( get_the_id(), 'designation', true ); ?></div>
                        <?php the_content();?>
                        
                        <?php 
							$icons = get_post_meta( get_the_id(), 'social_profile', true );
							if ( ! empty( $icons ) ) : 
						?>
                            
                            <h6><?php esc_html_e('FOLLOW & CONTACT', 'sinco'); ?></h6>
                            <!-- Social Box -->
                            <ul class="social-icon style-none d-flex">
                            	<?php foreach ( $icons as $h_icon ) :
									$header_social_icons = json_decode( urldecode( sinco_set( $h_icon, 'data' ) ) );
									if ( sinco_set( $header_social_icons, 'enable' ) == '' ) {
										continue;
									}
									$icon_class = explode( '-', sinco_set( $header_social_icons, 'icon' ) );
								?>
								<li><a href="<?php echo sinco_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo sinco_set( $header_social_icons, 'background' ); ?>; color: <?php echo sinco_set( $header_social_icons, 'color' ); ?>" target="_blank"><i class="fab <?php echo esc_attr( sinco_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
                        
                    </div> <!-- /.text-wrapper -->
                </div> <!-- /.main-bg -->
            </div>
        </div>
    </div>
</div> <!-- /.team-details -->

<div class="fancy-short-banner-five">
    <div class="container">
        <div class="bg-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start" data-aos="fade-right">
                    <h3 class="pe-xxl-5 md-pb-20"><?php esc_html_e( 'Having any Query? Book an appointment.', 'sinco' );?></h3>
                    
                </div>
                <div class="col-lg-6 text-center text-lg-end" data-aos="fade-left">
                    <a href="https://fastwpdemo.com/newwp/sinco/contact/" class="msg-btn tran3s"><?php esc_html_e( 'Send Us Message', 'sinco' );?></a>
                </div>
            </div>
        </div> <!-- /.bg-wrapper -->
    </div> <!-- /.container -->
</div> <!-- /.fancy-short-banner-five -->

<?php endwhile; ?>

<?php get_footer(); ?>