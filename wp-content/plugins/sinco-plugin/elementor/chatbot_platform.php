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
class Chatbot_Platform extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_chatbot_platform';
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
        return esc_html__( 'Chatbot Platform', 'sinco' );
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
            'chatbot_platform',
            [
                'label' => esc_html__( 'Chatbot Platform', 'sinco' ),
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
			'chatbox_decription',
			[
				'label'       => __( 'Chatbox Decription', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your chatbox decription', 'sinco' ),
			]
		);
		$this->add_control(
			'chatbot_image',
			[
				'label' => __( 'Chatbot Image', 'sinco' ),
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
        Feature Section Ten
    ============================================== 
    -->
    <div class="fancy-feature-ten mt-190 lg-mt-110">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="block-style-two md-mb-50" data-aos="fade-right">
                        <?php if($settings['subtitle'] || $settings['title']) { ?>
                        <div class="title-style-one">
                            <?php if($settings['subtitle']) { ?><div class="sc-title-four"><?php echo wp_kses($settings['subtitle'], true); ?></div><?php } ?>
                            <?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?>.</h2><?php } ?>
                        </div> <!-- /.title-style-one -->
                        <?php } ?>
                        
                        <?php if($settings['text']) { ?>
                        <p class="pt-25 pb-30 lg-pt-20 lg-pb-10"><?php echo wp_kses($settings['text'], true); ?></p>
                        <?php } ?>
                        
                        <?php if($settings['chatbox_decription']) { ?>
                        <div class="btn-three color-three"><?php echo wp_kses($settings['chatbox_decription'], true); ?></div>
                        <?php } ?>
                    </div> <!-- /.block-style-two -->
                </div>

                <div class="col-xl-6 col-lg-7 col-md-6 ms-auto" data-aos="fade-left">
                    <div class="screen-holder-one d-flex align-items-center justify-content-center">
                        <?php if($settings['chatbot_image']['id']){ ?>
                        <div class="round-bg d-flex align-items-center justify-content-center" style="width:200px; height: 200px;"><img src="<?php echo esc_url(wp_get_attachment_url($settings['chatbot_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div>
                        <?php } ?>
                        
                        <?php if($settings['pattern_image']) { ?>
                        <div class="round-bg d-flex align-items-center justify-content-center shapes logo-one" style="width:70px; height: 70px;"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo/Plogo-17.png" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div>
                        <div class="round-bg d-flex align-items-center justify-content-center shapes logo-two" style="width:115px; height: 115px;"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo/Plogo-18.png" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div>
                        <div class="round-bg d-flex align-items-center justify-content-center shapes logo-three" style="width:89px; height: 89px;"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo/Plogo-19.png" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div>
                        <div class="round-bg d-flex align-items-center justify-content-center shapes logo-four" style="width:162px; height: 162px;"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo/Plogo-20.png" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div>
                        <div class="round-bg d-flex align-items-center justify-content-center shapes logo-five" style="width:115px; height: 115px;"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo/Plogo-21.png" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.fancy-feature-ten -->

    <?php
    }
}
