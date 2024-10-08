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
class Our_Business_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_our_business_v3';
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
        return esc_html__( 'Our Business V3', 'sinco' );
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
            'our_business_v3',
            [
                'label' => esc_html__( 'Our Business V3', 'sinco' ),
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
			'features_list',
			[
				'label'       => __( 'Features List', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your features list', 'sinco' ),
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
			'business_image',
			[
				'label' => __( 'Business Image', 'sinco' ),
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
		Feature Section Two
	============================================== 
	-->
	<div class="fancy-feature-two position-relative mt-140 lg-mt-100">
		<div class="container">
			<div class="row">
				<div class="col-xxl-5 col-lg-6 col-md-7 ms-auto">
					<div class="block-style-two" data-aos="fade-left">
						<?php if($settings['subtitle'] || $settings['title']) { ?>
						<div class="title-style-one">
							<?php if($settings['subtitle']) { ?><div class="sc-title-four"><?php echo wp_kses($settings['subtitle'], true);?></div><?php } ?>
							<?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['subtitle'], true);?></h2><?php } ?>
						</div> <!-- /.title-style-one -->
						<?php } ?>
                        
						<?php if($settings['text']) { ?>
						<p class="pt-10 pb-20 lg-pb-10"><?php echo wp_kses($settings['text'], true);?></p>
						<?php } ?>
                        
						<?php $features_list = $settings['features_list'];
							if(!empty($features_list)){
							$features_list = explode("\n", ($features_list)); 
						?>
						<ul class="style-none list-item color-rev">
						 	<?php foreach($features_list as $features): ?>
							<li><?php echo wp_kses($features, true); ?></li>
							<?php endforeach; ?>
						</ul>
						<?php } ?>
                        
						<?php if($settings['btn_link']['url']){ ?>
						<a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="btn-one mt-30"><?php echo wp_kses($settings['btn_title'], true); ?></a>
						<?php } ?>
					</div> <!-- /.block-style-two -->
				</div>
			</div>
		</div> <!-- /.container -->
		<div class="illustration-holder-two sm-mt-40">
			<?php if($settings['business_image']['id']){ ?>
			<img src="<?php echo esc_url(wp_get_attachment_url($settings['business_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="main-illustration w-100">
			<?php } ?>
            
			<?php if($settings['pattern_image']) { ?>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_05_1.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_05_2.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two" data-aos="fade-up" data-aos-anchor=".fancy-feature-two" data-aos-delay="100" data-aos-duration="2000">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_05_3.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-three" data-aos="fade-up" data-aos-anchor=".fancy-feature-two" data-aos-delay="150" data-aos-duration="2000">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_05_4.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-four">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_05_5.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-five">
			<?php } ?>
		</div> <!-- /.illustration-holder-two -->
	</div> <!-- /.fancy-feature-two -->

	<?php
    }
}
