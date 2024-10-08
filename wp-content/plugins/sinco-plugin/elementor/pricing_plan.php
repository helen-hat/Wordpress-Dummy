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
class Pricing_Plan extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sinco_pricing_plan';
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
		return esc_html__( 'Pricing Plan', 'sinco' );
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
			'pricing_plan',
			[
				'label' => esc_html__( 'Pricing Plan', 'sinco' ),
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
			'monthly_btn_title',
			[
				'label'       => __( 'Monthly Button Tilte', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Monthly Title Here', 'sinco' ),
			]
		);
		$this->add_control(
            'monthly', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['monthly_title' => esc_html__('Business', 'sinco')],
					['monthly_title' => esc_html__('Agency', 'sinco')],				
				],
			'fields' => 
				[
					
					[
						'name' => 'monthly_title',
						'label' => esc_html__('Block Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Title Here', 'sinco')
					],
					[
						'name' => 'monthly_sub_title',
						'label' => esc_html__('Sub Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Sub Title Here', 'sinco')
					],
					[
						'name' => 'monthly_price',
						'label' => esc_html__('Block Price', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Price Here', 'sinco')
					],
					[
						'name' => 'monthly_text',
						'label' => esc_html__('Block Text', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Text Here', 'sinco')
					],
					[
						'name' => 'features_list1',
						'label' => esc_html__('Feature List', 'sinco'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'monthly_buttn_title',
						'label' => esc_html__('Button Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter button title Here', 'sinco')
					],
					[
						'name' => 'monthly_buttn_link',
						'label' => __( 'Button Url', 'sinco' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{monthly_title}}',
            ]
        );
		$this->add_control(
			'yearly_btn_title',
			[
				'label'       => __( 'Yearly Button Tilte', 'sinco' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'label_block' => true, 
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Yearly Title Here', 'sinco' ),
			]
		);
		$this->add_control(
            'yearly', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
						['yearly_title' => esc_html__('Business', 'sinco')],
						['yearly_title' => esc_html__('Agency', 'sinco')],
				],
			'fields' => 
				[
					[
						'name' => 'yearly_title',
						'label' => esc_html__('Block Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Title Here', 'sinco')
					],
					[
						'name' => 'yearly_sub_title',
						'label' => esc_html__('Sub Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Sub Title Here', 'sinco')
					],
					[
						'name' => 'yearly_price',
						'label' => esc_html__('Block Price', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Price Here', 'sinco')
					],
					[
						'name' => 'yearly_text',
						'label' => esc_html__('Block Text', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Text Here', 'sinco')
					],
					[
						'name' => 'features_list2',
						'label' => esc_html__('Feature List', 'sinco'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'yearly_buttn_title',
						'label' => esc_html__('Button Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter button title Here', 'sinco')
					],
					[
						'name' => 'yearly_buttn_link',
						'label' => __( 'Button Url', 'sinco' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{yearly_title}}',
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
        Pricing Section One
    =====================================================
    -->
    <div class="pricing-section-one mt-150 lg-mt-110">
        <div class="container" data-aos="fade-up">
            <?php if($settings['title']){ ?>
            <div class="row">
                <div class="col-xxl-7 col-xl-8 col-lg-7 col-md-9 m-auto">
                    <div class="title-style-one text-center">
                        <h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2>
                    </div> <!-- /.title-style-one -->
                </div>
            </div>
            <?php } ?>
            
            <ul class="nav nav-tabs justify-content-center pricing-nav-one" role="tablist">
                <?php if($settings['monthly_btn_title']){ ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#month" type="button" role="tab"><?php echo wp_kses($settings['monthly_btn_title'], true); ?></button>
                </li>
                <?php } ?>
                
                <?php if($settings['yearly_btn_title']){ ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#year" type="button" role="tab"><?php echo wp_kses($settings['yearly_btn_title'], true); ?></button>
                </li>
                <?php } ?>
            </ul>
        </div> <!-- /.container -->
    
        <div class="pricing-table-area-one" data-aos="fade-up" data-aos-delay="100">
            <div class="container">
                <div class="tab-content">
                    <div class="tab-pane active show" id="month">
                        <div class="row gx-xxl-5">
                            <?php  $count = 1; foreach($settings['monthly'] as $key => $item):?>
                            <div class="col-md-6">
                                <div class="pr-table-wrapper <?php if($count == 1) echo 'active'; ?> md-mb-30">
                                    <div class="pack-name"><?php echo wp_kses($item['monthly_title'], true); ?></div>
                                    <div class="pack-details"><?php echo wp_kses($item['monthly_sub_title'], true); ?></div>
                                    <div class="top-banner d-sm-flex justify-content-center align-items-center">
                                        <div class="price"><?php echo wp_kses($item['monthly_price'], true); ?></div>
                                        <div>
                                            <?php echo wp_kses($item['monthly_text'], true); ?>
                                        </div>
                                    </div> <!-- /.top-banner -->
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
                                    <?php if($item['monthly_buttn_link']['url']){ ?>
                                    <a href="<?php echo esc_url($item['monthly_buttn_link']['url']); ?>" class="trial-button"><?php echo wp_kses($item['monthly_buttn_title'], true); ?></a>
                                    <?php } ?>
                                </div> <!-- /.pr-table-wrapper -->
                            </div>
                            <?php  $count++; endforeach; ?>
                        </div>
                    </div>
    
                    <div class="tab-pane" id="year">
                        <div class="row gx-xxl-5">
                            <?php $count == 1; foreach($settings['yearly'] as $key => $item):?>
                            <div class="col-md-6">
                                <div class="pr-table-wrapper <?php if($count == 2) echo 'active'; ?> md-mb-30">
                                    <div class="pack-name"><?php echo wp_kses($item['yearly_title'], true); ?></div>
                                    <div class="pack-details"><?php echo wp_kses($item['yearly_sub_title'], true); ?></div>
                                    <div class="top-banner d-sm-flex justify-content-center align-items-center">
                                        <div class="price"><?php echo wp_kses($item['yearly_price'], true); ?></div>
                                        <div>
                                            <?php echo wp_kses($item['yearly_text'], true); ?>
                                        </div>
                                    </div> <!-- /.top-banner -->
                                    <?php $features_list = $item['features_list2'];
                                        if(!empty($features_list)){
                                        $features_list = explode("\n", ($features_list)); 
                                    ?>
                                    <ul class="pr-feature style-none">
                                        <?php foreach($features_list as $features): ?>
                                        <li><?php echo wp_kses($features, true); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php } ?>
                                    
                                    <?php if($item['yearly_buttn_link']['url']){ ?>
                                    <a href="<?php echo esc_url($item['yearly_buttn_link']['url']); ?>" class="trial-button"><?php echo wp_kses($item['yearly_buttn_title'], true); ?></a>
                                    <?php } ?>
                                </div> <!-- /.pr-table-wrapper -->
                            </div>
                            <?php  $count++; endforeach; ?>
                        </div>
                    </div>
                </div> <!-- /.tab-content -->
                
				<?php if($settings['pricing_description']){ ?>
                <div class="msg-note mt-80 lg-mt-50" data-aos="fade-up"><?php echo wp_kses($settings['pricing_description'], true); ?></div>
                <?php } ?>
            </div>
        </div> <!-- /.pricing-table-area-one -->
    </div> <!-- /.pricing-section-one -->
       
    <?php 
	}

}
