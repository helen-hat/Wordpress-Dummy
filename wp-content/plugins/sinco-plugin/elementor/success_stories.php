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
class Success_Stories extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_success_stories';
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
        return esc_html__( 'Success Stories', 'sinco' );
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
            'success_stories',
            [
                'label' => esc_html__( 'Success Stories', 'sinco' ),
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
				'placeholder' => __( 'Enable/Disable pattern Image', 'sinco' ),
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
              'our_success', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('Giant cloud', 'sinco')],
					['block_title' => esc_html__('UK Marketing', 'sinco')]
				],
			'fields' => 
				[
					[
						'name' => 'client_image',
						'label' => esc_html__('Client Image', 'sinco'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'video_link',
						'label' => __( 'Video Link', 'sinco' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'client_logo_image',
						'label' => esc_html__('Client Logo Image', 'sinco'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
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
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Read More', 'sinco')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'sinco' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
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
	=====================================================
		Feedback Slider Two
	=====================================================
	-->
	<div class="feedback-section-two mt-170 xl-mt-100 md-mt-60" data-aos="fade-up">
		<?php if($settings['pattern_image']) { ?>
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_08.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_09.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
		<?php } ?>
        
		<div class="container">
			<div class="row align-items-center">
				<?php if($settings['title']) { ?>
				<div class="col-xl-5 col-lg-4 col-md-5 col-sm-8">
					<div class="title-style-one text-center text-sm-start xs-pb-20">
						<h2 class="main-title"><?php echo wp_kses($settings['title'], true);?></h2>
					</div> <!-- /.title-style-one -->
				</div>
				<?php } ?>
                
				<div class="col-xl-6 col-lg-8 col-md-7 col-sm-4 ms-auto d-flex justify-content-center justify-content-sm-end">
					<ul class="slider-arrows slick-arrow-two d-flex style-none">
						<li class="prev_f1 slick-arrow ripple-btn" style=""><i class="bi bi-arrow-left"></i></li>
						<li class="next_f1 slick-arrow ripple-btn" style=""><i class="bi bi-arrow-right"></i></li>
					</ul>
				</div>
			</div>
		</div> <!-- /.container -->
		<div class="inner-content mt-60 md-mt-40">
			<div class="slider-wrapper">
				<div class="feedback_slider_two">
					<?php foreach($settings['our_success'] as $key => $item): ?>
					<div class="item">
						<div class="feedback-block-two d-sm-flex">
							<div class="img-meta">
								<img src="<?php echo esc_url(wp_get_attachment_url($item['client_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>">
								<?php if($item['video_link']['url']){ ?>
								<a class="fancybox video-icon" data-fancybox="" href="<?php echo esc_url($item['video_link']['url']); ?>">
									<i class="bi bi-play-fill"></i>
								</a>
								<?php } ?>
							</div>
							<div class="text-wrapper">
								
                                <?php if($item['client_logo_image']['id']){ ?><div class="icon d-flex align-items-end"><img src="<?php echo esc_url(wp_get_attachment_url($item['client_logo_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div><?php } ?>
								<?php if($item['block_title']){ ?><div class="camp-name"><?php echo wp_kses($item['block_title'], true);?></div><?php } ?>
								<?php if($item['block_text']){ ?><p><?php echo wp_kses($item['block_text'], true);?></p><?php } ?>
								
								<?php if($item['btn_link']['url']){ ?>
								<a href="<?php echo esc_url($item['btn_link']['url']); ?>" class="read-btn d-flex align-items-center justify-content-between">
									<span><?php echo wp_kses($item['btn_title'], true); ?></span>
									<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/icon_14.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="arrow">
								</a>
								<?php } ?>
							</div> <!-- /.text-wrapper -->
						</div> <!-- /.feedback-block-two -->
					</div>
				   <?php endforeach; ?>
				</div> <!-- /.feedback_slider_two -->
			</div> <!-- /.slider-wrapper -->
		</div> <!-- /.inner-content -->
	</div> <!-- /.feedback-section-two -->
	 
	<?php
    }
}
