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
class Call_To_Action extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_call_to_action';
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
        return esc_html__( 'Call To Action', 'sinco' );
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
            'call_to_action',
            [
                'label' => esc_html__( 'Call To Action', 'sinco' ),
            ]
        );
		$this->add_control(
           'style_two',
			[
				'label'   => esc_html__( 'Choose Different Style', 'sinco' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
				'one' => esc_html__( 'Choose Style One', 'sinco' ),
				'two' => esc_html__( 'Choose Style Two', 'sinco' ),
				),
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
            Fancy Short Banner One
        ============================================== 
        -->
        <div class="fancy-short-banner-one position-relative <?php if($settings['style_two'] == 'two') echo 'bottom-transform'; else echo 'mt-160 lg-mt-100 md-mt-80'; ?>">
            <div class="container">
                <div class="bg-wrapper">
                    <div class="row align-items-center gx-xxl-5">
                       <?php if($settings['subtitle'] || $settings['title']) { ?>
                        <div class="col-lg-6 text-center text-lg-start" >
                            <div class="sub-title"><?php echo wp_kses($settings['subtitle'], true); ?></div>
                            <h3 class="pe-xl-5 md-pb-20"><?php echo wp_kses($settings['title'], true); ?></h3>
                        </div>
                       <?php } ?>
                        <?php if($settings['btn_link']['url']){ ?>
                        <div class="col-lg-6 text-center text-lg-end" >
                            <a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="msg-btn tran3s"><?php echo wp_kses($settings['btn_title'], true); ?></a>
                        </div>
                    	<?php } ?>
                    </div>
                </div> <!-- /.bg-wrapper -->
            </div> <!-- /.container -->
            <?php if($settings['pattern_image']) { ?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_10.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_11.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
            <?php } ?>
        </div> <!-- /.fancy-short-banner-one -->
 
        <?php
    }
}
