<?php namespace SINCOPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Download_App extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_download_app';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Download App', 'sinco' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-library-open';
    }

    /**
     * Get widget categories.
     * Retrieve the list of categories the button widget belongs to.
     * Used to determine where to display the widget in the editor.
     *
     * @since  2.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'sinco' ];
    }

    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'download_app',
            [
                'label' => esc_html__( 'Download App', 'sinco' ),
            ]
        );
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'sinco' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'sinco' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'sinco' ),
			]
		);
		$this->add_control(
			'app_title',
			[
				'label'       => __( 'App Title', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your App Title', 'sinco' ),
			]
		);
		$this->add_control(
			'app_link',
				[
				  'label' => __( 'App Link', 'sinco' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
			 ]
		);
		$this->add_control(
			'app_title_1',
			[
				'label'       => __( 'App Title 1', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your App Title 1', 'sinco' ),
			]
		);
		$this->add_control(
			'app_link_1',
				[
				  'label' => __( 'App Link 1', 'sinco' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
			 ]
		);
		$this->add_control(
			'download_image',
			[
				'label' => __( 'Download Image', 'sinco' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
            'pattern_image',
			[
				'label' => __( 'Enable/Disable Pattern Image', 'sinco' ),
				'type'     => Controls_Manager::SWITCHER,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enable/Disable Pattern Image', 'sinco' ),
			]
		);
		$this->end_controls_section();
    }

    /**
     * Render button widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
	?>
	
	<!-- 
	=============================================
		Fancy Short Banner Two
	============================================== 
	-->
	<div class="fancy-short-banner-two">
		<div class="bg-wrapper">
			<div class="container">
				<div class="row align-items-top">
					<div class="col-xl-5 col-lg-6 order-lg-last" data-aos="fade-left">
						<?php if($settings['subtitle'] || $settings['title'] || $settings['text']) { ?>
						<div class="title-style-two">
							<?php if($settings['subtitle']) { ?><div class="sc-title"><?php echo wp_kses($settings['subtitle'], true); ?></div><?php } ?>
							<?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
							<?php if($settings['text']) { ?><p class="sub-title"><?php echo wp_kses($settings['text'], true); ?></p><?php } ?>
						</div> <!-- /.title-style-two -->
						<?php } ?>
						
						<?php if($settings['app_link']['url'] || $settings['app_link_1']['url']){ ?>
						<div class="d-sm-flex align-items-center button-group mt-40 lg-mt-30">
							<?php if($settings['app_link']['url']){ ?>
							<a href="<?php echo esc_url($settings['app_link']['url']); ?>" class="d-flex align-items-center windows-button">
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/playstore.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="icon">
								<div>
									<?php echo wp_kses($settings['app_title'], true); ?>
								</div>
							</a>
							<?php } ?>
							
							<?php if($settings['app_link_1']['url']){ ?>
							<a href="<?php echo esc_url($settings['app_link_1']['url']); ?>" class="d-flex align-items-center ios-button">
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/apple.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="icon">
								<div>
									<?php echo wp_kses($settings['app_title_1'], true); ?>
								</div>
							</a>
							<?php } ?>
						</div> <!-- /.button-group -->
						<?php } ?>
					</div>
					<?php if($settings['download_image']['id']){ ?>
					<div class="col-xxl-6 col-xl-7 col-md-6 col-sm-9 order-lg-first m-auto me-lg-0 ms-lg-0">
						<div class="mobile-screen md-mt-40" data-aos="fade-up"><img src="<?php echo esc_url(wp_get_attachment_url($settings['download_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div>
					</div>
					<?php } ?>
				</div>
			</div> <!-- /.container -->
			<?php if($settings['pattern_image']) { ?>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_27.png" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_28.png" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_29.png" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-three">
			<?php } ?>
		</div> <!-- /.bg-wrapper -->
	</div> <!-- /.fancy-short-banner-two -->
	
	<?php
    }
}
