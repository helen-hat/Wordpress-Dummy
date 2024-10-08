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
class Banner_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_banner_v3';
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
        return esc_html__( 'Banner V3', 'sinco' );
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
            'banner_v3',
            [
                'label' => esc_html__( 'Banner V3', 'sinco' ),
            ]
        );
		$this->add_control(
			'pricing_title',
			[
				'label'       => __( 'Pricing Title', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your pricing title', 'sinco' ),
			]
		);
		$this->add_control(
			'pricing_link',
				[
				  'label' => __( 'Pricing Url', 'sinco' ),
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
			'banner_description',
			[
				'label'       => __( 'Banner Description', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your banner Description', 'sinco' ),
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
			'bg_image',
			[
				'label' => __( 'Background Image', 'sinco' ),
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
		$this->add_control(
			'img_title',
			[
				'label'       => __( 'Image Title', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your image title', 'sinco' ),
			]
		);
		$this->add_control(
			'img_subtitle',
			[
				'label'       => __( 'Image Sub Title', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your image sub title', 'sinco' ),
			]
		);
		$this->add_control(
			'img_title_1',
			[
				'label'       => __( 'Image Title 1', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your image title', 'sinco' ),
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
	<div class="hero-banner-one">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-7">
					<?php if($settings['pricing_link']['url']){ ?>
					<a href="<?php echo esc_url($settings['pricing_link']['url']); ?>" class="slogan"><?php echo wp_kses($settings['pricing_title'], true); ?> <i class="fas fa-chevron-right"></i></a>
					<?php } ?>
					
					<?php if($settings['title']) { ?><h1 class="hero-heading"><?php echo wp_kses($settings['title'], true); ?></h1><?php } ?>
					<?php if($settings['text']) { ?><p class="text-lg mb-60 lg-mb-40"><?php echo wp_kses($settings['text'], true); ?></p><?php } ?>
					
                    <?php if($settings['btn_link']['url'] || $settings['banner_description']){ ?>
					<ul class="style-none button-group d-lg-flex align-items-center">
						<?php if($settings['btn_link']['url']){ ?>
						<li class="me-4"><a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="btn-one ripple-btn"><?php echo wp_kses($settings['btn_title'], true); ?></a></li>
						<?php } ?>
						<?php if($settings['banner_description']) { ?>
						<li class="help-btn"><?php echo wp_kses($settings['banner_description'], true);?></li>
						<?php } ?>
					</ul>
                    <?php } ?>
				</div>
			</div>
		</div> <!-- /.container -->
		<div class="illustration-holder">
			
			<?php if($settings['banner_image']['id']){ ?><img src="<?php echo esc_url(wp_get_attachment_url($settings['banner_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="main-illustration ms-auto"><?php } ?>
			<?php if($settings['bg_image']['id']){ ?><img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes bg-shape"><?php } ?>
			
			<?php if($settings['pattern_image']) { ?>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_01_1.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_01_2.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_01_3.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-three">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_01_4.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-four">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_01_5.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-five">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_01_6.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-six">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_01_7.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-seven">
			<?php } ?>
            
			<?php if($settings['img_title'] || $settings['img_subtitle']) { ?>
			<div class="card-one shapes">
				<div class="icon"><i class="bi bi-check-lg"></i></div>
				<?php if($settings['img_title']) { ?><h6><?php echo wp_kses($settings['img_title'], true); ?></h6><?php } ?>
				<?php if( $settings['img_subtitle']) { ?><span class="info"><?php echo wp_kses($settings['img_subtitle'], true); ?></span><?php } ?>
			</div> <!-- /.card-one -->
			<?php } ?>
            
			<?php if($settings['img_title_1']) { ?>
			<div class="card-two shapes">
				<div class="icon"><i class="bi bi-check-lg"></i></div>
				<h6><?php echo wp_kses($settings['img_title_1'], true); ?></h6>
			</div> <!-- /.card-two -->
			<?php } ?>
		</div> <!-- /.illustration-holder -->
	</div> <!-- /.hero-banner-one -->

	<?php
    }
}
