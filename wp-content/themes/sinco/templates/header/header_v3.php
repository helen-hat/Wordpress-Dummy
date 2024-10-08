<?php
$options = sinco_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Color Logo Settings
$light_logo = $options->get( 'light_color_logo' );
$light_logo_dimension = $options->get( 'light_color_logo_dimension' );

//Color Logo Settings
$color_logo = $options->get( 'color_logo' );
$color_logo_dimension = $options->get( 'color_logo_dimension' );

//Dark Color Logo Settings
$dark_logo = $options->get( 'dark_color_logo' );
$dark_logo_dimension = $options->get( 'dark_color_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>


    <!-- 
    =============================================
        Search
    ============================================== 
    -->
	<?php if( $options->get('show_seach_form_v3') ){?>
    <div class="offcanvas offcanvas-top theme-search-form justify-content-center" tabindex="-1" id="offcanvasTop">
        <button type="button" class="close-btn tran3s" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-lg"></i></button>
        <div class="form-wrapper">
            <?php get_template_part('searchform1')?>
        </div> <!-- /.form-wrapper -->
    </div>
    <?php } ?>

    <!-- 
    =============================================
        Theme Main Menu
    ============================================== 
    -->
    <header class="theme-main-menu sticky-menu theme-menu-one">
        <div class="inner-content">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo order-lg-0"><div class="d-block"><?php echo sinco_logo( $logo_type, $color_logo, $color_logo_dimension, $logo_text, $logo_typography ); ?></div></div>
    
                <div class="right-widget d-flex align-items-center ms-auto ms-lg-0 order-lg-3">
                    <?php if( $options->get('show_seach_form_v3') ){?>
                    <button class="menu-search-btn tran3s" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="bi bi-search"></i></button>
                    <?php } ?>
                    <?php if( $options->get('show_button_v3') and $options->get('btn_link_v3')){?>
                    <a href="<?php echo esc_url($options->get('btn_link_v3')); ?>" class="req-demo-btn tran3s d-none d-lg-block"><?php echo wp_kses($options->get('btn_title_v3'), true); ?></a>
                    <?php } ?>
                </div> <!-- /.right-widget -->
    
                <nav class="navbar navbar-expand-lg order-lg-2">
                    <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="d-block d-lg-none"><div class="logo"><?php echo sinco_logo( $logo_type, $color_logo, $color_logo_dimension, $logo_text, $logo_typography ); ?></div></li>
                            
							<?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                'container_class'=>'navbar-collapse collapse navbar-right',
                                'menu_class'=>'nav navbar-nav',
                                'fallback_cb'=>false,
                                'items_wrap' => '%3$s',
                                'container'=>false,
                                'depth'=>'3',
                                'walker'=> new Bootstrap_walker()
                            ) ); ?>
                        </ul>
                        <?php if( $options->get('show_button_v3') and  $options->get('btn_link_v3')){?>
                        <!-- Mobile Content -->
                        <div class="mobile-content d-block d-lg-none">
                            <div class="d-flex flex-column align-items-center justify-content-center mt-70">
                                <a href="<?php echo esc_url($options->get('btn_link_v3')); ?>" class="req-demo-btn tran3s"><?php echo wp_kses($options->get('btn_title_v3'), true); ?></a>
                            </div>
                        </div> <!-- /.mobile-content -->
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div> <!-- /.inner-content -->
    </header> <!-- /.theme-main-menu -->