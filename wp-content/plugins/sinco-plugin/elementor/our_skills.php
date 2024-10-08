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
class Our_Skills extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_our_skills';
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
        return esc_html__( 'Our Skills', 'sinco' );
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
            'our_skills',
            [
                'label' => esc_html__( 'Our Skills', 'sinco' ),
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
        	'funfacts', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('SKILL', 'sinco')],
					['block_title' => esc_html__('PERFORMANCE', 'sinco')],
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
						'label' => esc_html__('Fill Bar Stop Value', 'sinco'),
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
			'skill_image',
			[
				'label' => __( 'Skill Image', 'sinco' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
					'one' => esc_html__( 'Choose Style with color SubTitle', 'sinco' ),
					'two' => esc_html__( 'Choose Style without color SubTitle', 'sinco' ),
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
	
	<!-- 
	=============================================
		Feature Section Five
	============================================== 
	-->
	<div class="fancy-feature-five position-relative mt-50 xs-mt-20">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xxl-4 col-lg-5 col-md-6">
					<div class="block-style-five pt-60 md-pt-20" data-aos="fade-right">
						<?php if($settings['subtitle'] || $settings['title']) { ?>
						<div class="title-style-one">
							<?php if($settings['subtitle']) { ?><div class="<?php if($settings['style_two'] == 'two') echo 'sc-title-four'; else echo 'sc-title-three'; ?>"><?php echo wp_kses($settings['subtitle'], true); ?></div><?php } ?>
							<?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
						</div> <!-- /.title-style-one -->
						<?php } ?>
                        
						<?php if($settings['text']) { ?>
						<p class="pt-10 pb-70"><?php echo wp_kses($settings['text'], true); ?></p>
						<?php } ?>
						
						<!-- Skills -->
						<div class="skills">
							<?php foreach($settings['funfacts'] as $key => $item): ?>
							<!-- Skill Item -->
							<div class="skill-item mb-80 md-mb-60">
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
						
						<?php if($settings['btn_link']['url']){ ?>
						<a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="btn-five ripple-btn mt-60 lg-mt-50"><?php echo wp_kses($settings['btn_title'], true); ?></a>
						<?php } ?>
					</div> <!-- /.block-style-five -->
				</div>
				
				<?php if($settings['skill_image']['id'] || $settings['pattern_image']){ ?>
				<div class="col-xxl-8 col-lg-7 col-md-6 text-end">
					<div class="illustration-holder d-inline-block position-relative xs-mt-20">
						<?php if($settings['skill_image']['id']){ ?>
						<img src="<?php echo esc_url(wp_get_attachment_url($settings['skill_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="main-illustration w-100">
						<?php } ?>
                        
						<?php if($settings['pattern_image']) { ?>
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_06_1.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_06_2.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_06_3.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-three" data-aos="fade-down" data-aos-duration="1800">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_06_4.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-four" data-aos="fade-left" data-aos-duration="1800">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_06_5.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-five">
						<?php } ?>
					</div><!--  /.illustration-holder -->
				</div>
                <?php } ?>
			</div>
		</div> <!-- /.container -->
	</div> <!-- /.fancy-feature-five -->

	<?php 
	}
}
