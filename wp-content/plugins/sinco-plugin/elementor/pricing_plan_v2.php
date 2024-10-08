<?php

namespace SINCOPLUGIN\Element;

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
class Pricing_Plan_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sinco_pricing_plan_v2';
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
		return esc_html__( 'Pricing Plan V2', 'sinco' );
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
			'pricing_plan_v2',
			[
				'label' => esc_html__( 'Pricing Plan V2', 'sinco' ),
			]
		);
		$this->add_control(
			'shape_img',
			[
				'label' => __( 'Shape Image', 'sinco' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
				'placeholder' => __( 'Enter your sub title', 'sinco' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'sinco' ),
			]
		);
		$this->add_control(
            'our_pricing', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['price_title' => esc_html__('Standard', 'sinco')],
					['price_title' => esc_html__('Gold', 'sinco')],				
				],
			'fields' => 
				[
					[
						'name' => 'price_title',
						'label' => esc_html__('Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Title Here', 'sinco')
					],
					[
						'name' => 'pricing',
						'label' => esc_html__('Pricing', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Price Here', 'sinco')
					],
					[
						'name' => 'features_list1',
						'label' => esc_html__('Feature List', 'sinco'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter button title Here', 'sinco')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Url', 'sinco' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{price_title}}',
            ]
        );
		$this->add_control(
			'pricing_description',
			[
				'label'       => __( 'Pricing Description', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your pricing description', 'sinco' ),
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
        Pricing Section Two
    =====================================================
    -->
    <div class="pricing-section-two position-relative mt-150 lg-mt-50">
        <div class="container">
            <?php if($settings['subtitle'] || $settings['title']){ ?>
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6 col-md-8 m-auto">
                    <div class="title-style-one text-center mb-20" data-aos="fade-up">
                        <?php if($settings['subtitle']){ ?><div class="sc-title-five"><?php echo wp_kses($settings['subtitle'], true); ?></div><?php } ?>
                        <?php if($settings['title']){ ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                    </div> <!-- /.title-style-one -->
                </div>
            </div>
            <?php } ?>
            <div class="pricing-table-area-two">
                <div class="row">
                    <div class="col-xxl-10 m-auto">
                        <div class="row justify-content-center">
                            <?php  $count = 1; foreach($settings['our_pricing'] as $key => $item):?>
                            <div class="col-lg-4 col-sm-6" data-aos="fade-up" >
                                <div class="pr-table-wrapper tran3s mt-40 <?php if($count == 2) echo 'active'; ?>">
                                    <div class="pack-name"><?php echo wp_kses($item['price_title'], true); ?></div>
                                    <div class="price"><?php echo wp_kses($item['pricing'], true); ?></div>
                                    <?php $features_list = $item['features_list1'];
                                        if(!empty($features_list)){
                                        $features_list = explode("\n", ($features_list)); 
                                    ?>
                                    <ul class="pr-feature style-none">
										<?php foreach($features_list as $features): ?>
                                        <li><?php echo wp_kses($features, true); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php } ?>
                                    
									<?php if($item['btn_link']['url']){ ?>
                                    <a href="<?php echo esc_url($item['btn_link']['url']); ?>" class="btn-seven w-100 mt-50 lg-mt-30"><?php echo wp_kses($item['btn_title'], true); ?></a>
                                    <?php } ?>
                                </div> <!-- /.pr-table-wrapper -->
                            </div>
                            <?php  $count++; endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php if($settings['pricing_description']){ ?>
                <div class="row">
                    <div class="col-xxl-5 col-xl-6 col-lg-7 m-auto">
                        <p class="info mt-75 lg-mt-50" data-aos="fade-up"><?php echo wp_kses($settings['pricing_description'], true); ?></p>
                    </div>
                </div>
                <?php } ?>
            </div> <!-- /.pricing-table-area-two -->
        </div>
        <?php if( $settings[ 'shape_img' ]['id'] ):?>
            <img src="<?php echo esc_url( wp_get_attachment_url($settings[ 'shape_img' ]['id']) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_34.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <?php endif;?>
    </div> <!-- /.pricing-section-two -->
            
    <?php 
	}

}
