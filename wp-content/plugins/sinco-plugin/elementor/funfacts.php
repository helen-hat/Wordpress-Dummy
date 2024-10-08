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
class Funfacts extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_funfacts';
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
        return esc_html__( 'Funfacts', 'sinco' );
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
            'funfacts',
            [
                'label' => esc_html__( 'Funfacts', 'sinco' ),
            ]
        );
		$this->add_control(
        	'our_funfact', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('Human labor', 'sinco')],
					['block_title' => esc_html__('Generated revenue', 'sinco')],
					['block_title' => esc_html__('Saved operational', 'sinco')],
				],
			'fields' => 
				[
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'alphabet_letter',
						'label' => esc_html__('Alphabet Letters', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'counter_stop',
						'label' => esc_html__('Count Stop Value', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'alphabet_letter_1',
						'label' => esc_html__('Alphabet Letters 1', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'sinco')
					],
				],
				'title_field' => '{{block_title}}',
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
				'one' => esc_html__( 'Choose Style without Color', 'sinco' ),
				'two' => esc_html__( 'Choose Style with Color ', 'sinco' ),
				),
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
	
	<?php if($settings['style_two'] == 'two'): ?>        
	<!--
	=====================================================
		Counter Section One
	=====================================================
	-->
	<div class="counter-section-one mt-140 lg-mt-100">
		<div class="container">
			<div class="inner-container bg-color">
				<div class="row justify-content-center">
					<?php foreach($settings['our_funfact'] as $key => $item): ?>
					<div class="col-md-4 col-sm-6" data-aos="fade-up">
						<div class="counter-block-one text-center mb-20">
							<div class="main-count"><?php echo esc_attr($item['alphabet_letter']);?><span class="counter"><?php echo esc_attr($item['counter_stop']);?></span><?php echo esc_attr($item['alphabet_letter_1']);?></div>
							<p><?php echo wp_kses($item['block_title'], true);?></p>
						</div> <!-- /.counter-block-one -->
					</div>
					<?php endforeach; ?>
				</div>
			</div> <!-- /.inner-container -->
		</div>
	</div> <!-- /.counter-section-one -->
        
	<?php else: ?>

    <!--
    =====================================================
        Counter Section One
    =====================================================
    -->
    <div class="counter-section-one fancy-bg">
        <div class="container">
            <div class="inner-container">
                <div class="row justify-content-center">
                    <?php foreach($settings['our_funfact'] as $key => $item): ?>
                    <div class="col-md-4 col-sm-6" data-aos="fade-up">
                        <div class="counter-block-one text-center mb-20">
                            <div class="main-count"><?php echo esc_attr($item['alphabet_letter']);?><span class="counter"><?php echo esc_attr($item['counter_stop']);?></span><?php echo esc_attr($item['alphabet_letter_1']);?></div>
                            <p><?php echo wp_kses($item['block_title'], true);?></p>
                        </div> <!-- /.counter-block-one -->
                    </div>
                     <?php endforeach; ?>
                </div>
            </div> <!-- /.inner-container -->
        </div>
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_04.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_05.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
    </div> <!-- /.counter-section-one -->

	<?php endif; 
	}
}
