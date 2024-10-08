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
class Our_Skills_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_our_skills_v2';
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
        return esc_html__( 'Our Skills V2', 'sinco' );
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
            'our_skills_v2',
            [
                'label' => esc_html__( 'Our Skills V2', 'sinco' ),
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
        	'our_counter', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('Data Consulting', 'sinco')],
					['block_title' => esc_html__('Big Data & AI', 'sinco')],
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
						'name' => 'counter_stop',
						'label' => esc_html__('Count Stop Value', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'alphabet_letter',
						'label' => esc_html__('Alphabet Letters', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'sinco')
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
		Feature Section Sixteen
	============================================== 
	-->
	<div class="fancy-feature-sixteen mt-170 lg-mt-110">
		<div class="container">
			<div class="row align-items-center">
				<?php if($settings['title'] || $settings['text']) { ?>
				<div class="col-lg-5 col-md-6">
					<?php if($settings['title']) { ?>
                    <div class="title-style-one mb-40 lg-mb-20">
						<h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2>
					</div> <!-- /.title-style-one -->
                    <?php } ?>
                    
                    <?php if($settings['text']) { ?>
					<p><?php echo wp_kses($settings['text'], true); ?></p>
                    <?php } ?>
				</div>
				<?php } ?>
				<div class="col-md-6 ms-auto">
					<!-- Skills -->
					<div class="skills ps-xxl-5 mt-45 sm-mt-80">
						<?php foreach($settings['our_counter'] as $key => $item): ?>
						<!-- Skill Item -->
						<div class="skill-item mb-80 md-mb-70">
							<div class="skill-header clearfix">
								<div class="skill-title"><?php echo wp_kses($item['block_title'], true);?></div>
								<div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_stop']);?></span><?php echo esc_attr($item['alphabet_letter']);?></div></div>
							</div>
							<div class="skill-bar">
								<div class="bar-inner"><div class="bar progress-line" data-width="<?php echo esc_attr($item['counter_stop']);?>"></div></div>
							</div>
						</div>
						<?php endforeach; ?> 
					</div>
					
				</div>
			</div>
		</div>
	</div> <!-- /.fancy-feature-sixteen -->

	<?php 
	}
}
