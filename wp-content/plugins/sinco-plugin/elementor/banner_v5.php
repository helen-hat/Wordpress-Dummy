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
class Banner_V5 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_banner_v5';
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
        return esc_html__( 'Banner V5', 'sinco' );
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
            'banner_v5',
            [
                'label' => esc_html__( 'Banner V5', 'sinco' ),
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
			'mailchimp_form_url',
			[
				'label'       => __( 'Mailchimp Form Url', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your mailchimp form url', 'sinco' ),
			]
		);
		$this->add_control(
			'form_title',
			[
				'label'       => __( 'Form Title', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Form Title', 'sinco' ),
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
    <div class="hero-banner-four">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-xl-7 col-lg-8 col-md-11 m-auto">
                    <?php if($settings['pricing_link']['url']){ ?>
                    <a href="<?php echo esc_url($settings['pricing_link']['url']); ?>" class="slogan"><?php echo wp_kses($settings['pricing_title'], true); ?><i class="fas fa-chevron-right"></i></a>
                    <?php } ?>
                    
                    <?php if($settings['title']) { ?><h1 class="hero-heading"><?php echo wp_kses($settings['title'], true); ?></h1><?php } ?>
                    <?php if($settings['text']) { ?><p class="mb-50 lg-mb-30"><?php echo wp_kses($settings['text'], true); ?></p><?php } ?>
                    
                    <?php if($settings['mailchimp_form_url']) { ?>
                        <?php echo do_shortcode($settings['mailchimp_form_url']);?>
                    <?php } ?>
                     <?php if($settings['form_title']) { ?>
                    <div class="info"><?php echo wp_kses($settings['form_title'], true); ?></div>
                    <?php } ?>
                </div>
            </div>
        </div> <!-- /.container -->
        <?php if($settings['banner_image']['id']){ ?>
        <div class="illustration-holder-one">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['banner_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_10_1.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_10_2.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
        </div> <!-- /.illustration-holder-one -->
        <?php } ?>
        <?php if($settings['banner_image_1']['id']){ ?>
        <div class="illustration-holder-two">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['banner_image_1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_10_1.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        </div> <!-- /.illustration-holder-two -->
        <?php } ?>
    </div> <!-- /.hero-banner-four -->
        
	<?php
    }
}
