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
class Banner_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_banner_v1';
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
        return esc_html__( 'Banner V1', 'sinco' );
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
            'banner_v1',
            [
                'label' => esc_html__( 'Banner V1', 'sinco' ),
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
			'btn_title',
			[
				'label'       => __( 'Button Title', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'sinco' ),
			]
		);
		$this->add_control(
			'btn_link',
				[
				  'label' => __( 'Button Url', 'sinco' ),
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
			'video_link',
				[
				  'label' => __( 'Video Url', 'sinco' ),
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
			'banner_image',
			[
				'label' => __( 'Banner Image', 'sinco' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'banner_image_1',
			[
				'label' => __( 'Banner Image 1', 'sinco' ),
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
		Theme Hero Banner
	============================================== 
	-->
	<div class="hero-banner-five">
		<div class="container">
			<div class="row">
				<div class="col-xxl-6 col-md-7">
					
					<?php if($settings['title']) { ?><h1 class="hero-heading"><?php echo wp_kses($settings['title'], true); ?></h1><?php } ?>
					<?php if($settings['text']) { ?><p class="text-lg mb-50 pt-40 pe-xl-5 md-pt-30 md-mb-40"><?php echo wp_kses($settings['text'], true); ?></p><?php } ?>
					
					<?php if($settings['btn_link']['url'] || $settings['video_link']['url']){ ?>
					<ul class="style-none button-group d-flex align-items-center">
						<?php if($settings['btn_link']['url']){ ?>
						<li class="me-4"><a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="demo-btn ripple-btn tran3s"><?php echo wp_kses($settings['btn_title'], true); ?></a></li>
						<?php } ?>
						<?php if($settings['video_link']['url']){ ?>
						<li><a class="fancybox video-icon tran3s" data-fancybox="" href="<?php echo esc_url($settings['video_link']['url']); ?>"><i class="fas fa-play"></i></a></li>
						<?php } ?>
					</ul>
                    <?php } ?>
				</div>
			</div>
		</div> <!-- /.container -->
		<div class="illustration-holder">
			<?php if($settings['banner_image']['id']){ ?><img src="<?php echo esc_url(wp_get_attachment_url($settings['banner_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="main-illustration ms-auto"><?php } ?>
			<?php if($settings['banner_image_1']['id']){ ?><img src="<?php echo esc_url(wp_get_attachment_url($settings['banner_image_1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one"><?php } ?>
			
			<?php if($settings['pattern_image']) { ?>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_13_2.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two" data-aos="fade-down">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_13_2.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-three" data-aos="fade-down">
			<?php } ?>
		</div> <!-- /.illustration-holder -->
		<div class="shapes oval-one"></div>
	</div> <!-- /.hero-banner-five -->
	
	<?php
    }
}
