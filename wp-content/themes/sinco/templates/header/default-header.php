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
    <?php if( $options->get('show_seach_form_v1') ){?>
    <div class="offcanvas offcanvas-top theme-search-form bg-three justify-content-center" tabindex="-1" id="offcanvasTop">
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
    <header class="theme-main-menu sticky-menu theme-menu-four">
        <div class="inner-content">
            <div class="d-flex align-items-center">
                <div class="logo order-lg-0"><div class="d-block"><?php echo sinco_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?></div></div>
				
                <div class="right-widget d-flex align-items-center ms-auto order-lg-3">
                    <?php if($options->get('show_phone_no_v1')){ ?>
                    <?php if($options->get('phone_no_v1')){ ?>
                    <div class="call-button d-none d-xl-block me-5"><?php echo wp_kses($options->get('phone_no_v1'), true); ?></div>
                    <?php } } ?>
                    
					<?php if( $options->get('show_seach_form_v1') ){?>
                    <button class="menu-search-btn tran3s" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="bi bi-search"></i></button>
                    <?php } ?>
                   
				    <?php if( $options->get('show_button_v1') ){ ?>
                    <?php if($options->get('btn_title_v1')){ ?>
                    <a href="<?php echo esc_url($options->get('btn_link_v1')); ?>" class="send-msg-btn tran3s d-none d-lg-block"><?php echo wp_kses($options->get('btn_title_v1'), true); ?></a>
               		<?php } } ?>
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
                        <!-- Mobile Content -->
                        <div class="mobile-content d-block d-lg-none">
                            <div class="d-flex flex-column align-items-center justify-content-center mt-70">
                                <?php if( $options->get('show_button_v1') ){?>
                                <?php if( $options->get('btn_title_v1') ){?>
                                <a href="<?php echo esc_url($options->get('btn_link_v1')); ?>" class="send-msg-btn tran3s mb-10"><?php echo wp_kses($options->get('btn_title_v1'), true); ?></a>
                                <?php } } ?>
                                
								<?php if($options->get('show_phone_no_v1')){ ?>
                                <?php if($options->get('phone_no_v1')){ ?>
                                <div class="call-button"><?php echo wp_kses($options->get('phone_no_v1'), true); ?></div>
                            	<?php } } ?>
                            </div>
                        </div> <!-- /.mobile-content -->
                    </div>
                </nav>
            </div>
        </div> <!-- /.inner-content -->
    </header> <!-- /.theme-main-menu -->