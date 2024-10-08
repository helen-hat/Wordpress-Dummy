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
class Our_Features extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_our_features';
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
        return esc_html__( 'Our Features', 'sinco' );
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
            'our_features',
            [
                'label' => esc_html__( 'Our Features', 'sinco' ),
            ]
        );
		$this->add_control(
            'pattern_image',
			[
				'label' => __( 'Enable/Disable Divider Image', 'sinco' ),
				'type'     => Controls_Manager::SWITCHER,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enable/Disable Divider Image', 'sinco' ),
			]
		);
		$this->add_control(
              'features', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('Qulaity Support', 'sinco')],
					['block_title' => esc_html__('Fastest AI Machine', 'sinco')],
					['block_title' => esc_html__('Great Pricing', 'sinco')],
				],
			'fields' => 
				[
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'sinco'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Text', 'sinco'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'sinco' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
						'one' => esc_html__( 'Choose Style one', 'sinco' ),
						'two' => esc_html__( 'Choose Style Two ', 'sinco' ),
						'three' => esc_html__( 'Choose Style Three ', 'sinco' ),
						),
					],
				],
				'title_field' => '{{block_title}}',
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
        Feature Section Six
    ============================================== 
    -->
    <div class="fancy-feature-six position-relative mt-80">
        <div class="container">
            <div class="bg-wrapper">
                <div class="row gx-xxl-5 justify-content-center">
                    <?php foreach($settings['features'] as $key => $item): ?>
                    <div class="col-lg-4 col-sm-6" data-aos="fade-up">
                        <div class="block-style-six text-center mt-40">
                            <div class="icon" style="background:<?php if($item['style_two'] == 'three') echo 'rgba(68, 109, 255, 0.07); color: #446DFE;'; elseif($item['style_two'] == 'two') echo 'rgba(253, 232, 255, 1); color: #F36EFF;'; else echo 'rgba(255, 122, 65, 0.12); color: #FF7A41;'; ?> "><i class="bi bi-check-lg"></i></div>
                            <h6><?php echo wp_kses($item['block_title'], true);?></h6>
                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                        </div> <!-- /.block-style-six -->
                    </div>
                    <?php endforeach; ?>
                </div>
            </div> <!-- /.bg-wrapper -->
        </div> <!-- /.container -->
        
		<?php if($settings['pattern_image']) { ?>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_10.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_11.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
        <?php } ?>
        
    </div> <!-- /.fancy-feature-six -->

	<?php
    }
}
