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
class Work_Process_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_work_process_v2';
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
        return esc_html__( 'Work Process V2', 'sinco' );
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
            'work_process_v2',
            [
                'label' => esc_html__( 'Work Process V2', 'sinco' ),
            ]
        );
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'sinco' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'sinco' ),
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
			'work_description',
			[
				'label'       => __( 'Work Description', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your work Description', 'sinco' ),
			]
		);
		$this->add_control(
			'work_image',
			[
				'label' => __( 'Work Image', 'sinco' ),
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
              'our_work', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('Data Automation Solution', 'sinco')],
					['block_title' => esc_html__('Analytics Business.', 'sinco')]
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
		Feature Section Three
	============================================== 
	-->
	<div class="fancy-feature-three position-relative">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5 col-md-6">
					<div class="block-style-two pe-xxl-5" data-aos="fade-right">
					    <?php if($settings['subtitle'] || $settings['title']) { ?>
						<div class="title-style-one">
							<?php if($settings['subtitle']) { ?><div class="sc-title"><?php echo wp_kses($settings['subtitle'], true);?></div><?php } ?>
							<?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
						</div> <!-- /.title-style-one -->
						<?php } ?>
					    
						<?php if($settings['text']) { ?>
						<p class="pt-20 pb-30 lg-pb-10"><?php echo wp_kses($settings['text'], true);?></p>
					    <?php } ?>
                        
						<?php if($settings['work_description']) { ?>
						<div class="btn-three"><?php echo wp_kses($settings['work_description'], true);?></div>
						<?php } ?>
					</div> <!-- /.block-style-two -->
				</div>
				<div class="col-xl-6 col-lg-7 col-md-6 ms-auto text-end">
					<div class="illustration-holder position-relative d-inline-block sm-mt-50">
						<?php if($settings['work_image']['id']){ ?>
						<img src="<?php echo esc_url(wp_get_attachment_url($settings['work_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="main-illustration w-100">
						<?php } ?>
						
						<?php if($settings['pattern_image']) { ?>
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_03_1.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_03_2.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_03_2.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-three">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_03_4.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-four">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_03_3.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-five" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_03_3.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-six" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500">
						<?php } ?>
                        
					</div> <!-- /.illustration-holder -->
				</div>
			</div>
		</div> <!-- /.container -->
		<div class="mt-100 lg-mt-70">
			<div class="container">
				<div class="row justify-content-center gx-xxl-5">
					<?php $i = 1; foreach($settings['our_work'] as $key => $item): ?>
					<div class="col-lg-4 col-sm-6 d-flex" data-aos="fade-up">
						<div class="block-style-three mb-25">
							<div class="numb"><?php $i = sprintf('%2d', $i); echo $i; ?></div>
							<h6><?php echo wp_kses($item['block_title'], true);?></h6>
							<p><?php echo wp_kses($item['block_text'], true);?></p>
						</div> <!-- /.block-style-three -->
					</div>
					<?php $i++; endforeach; ?>
				</div>
			</div>
		</div>
	</div> <!-- /.fancy-feature-three -->

	<?php
    }
}
