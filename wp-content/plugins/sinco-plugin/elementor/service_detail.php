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
class Service_Detail extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_service_detail';
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
        return esc_html__( 'Service Detail', 'sinco' );
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
            'service_detail',
            [
                'label' => esc_html__( 'Service Detail', 'sinco' ),
            ]
        );
		$this->add_control(
			'sidebar_slug',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'sinco' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => sinco_get_sidebars(),
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
			'feature_img',
			[
				'label' => __( 'Feature Image', 'sinco' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'service_title',
			[
				'label'       => __( 'Service Title', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Service Title', 'sinco' ),
			]
		);
		$this->add_control(
			'service_text',
			[
				'label'       => __( 'Service Text', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Service Text', 'sinco' ),
			]
		);
		$this->add_control(
              'our_services', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('C++ Coding', 'sinco')],
					['block_title' => esc_html__('AI Technology', 'sinco')],
					['block_title' => esc_html__('Auto Algorithm', 'sinco')],
				],
			'fields' => 
				[
					[
						'name' => 'service_icon_img',
						'label' => esc_html__('Service Icon Image', 'sinco'),
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
						'name' => 'service_link',
						'label' => __( 'Service Link', 'sinco' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Heading', 'sinco' ),
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
				'placeholder' => __( 'Enter your Features List', 'sinco' ),
			]
		);
		$this->add_control(
			'sub_heading_1',
			[
				'label'       => __( 'Sub Heading 1', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Heading', 'sinco' ),
			]
		);
		$this->add_control(
			'sub_heading_text',
			[
				'label'       => __( 'Sub Heading Text', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Heading text', 'sinco' ),
			]
		);
		$this->add_control(
              'our_feature', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['feature_title' => esc_html__('Success Ratio', 'sinco')],
					['feature_title' => esc_html__('Failure Ratio', 'sinco')],
				],
			'fields' => 
				[
					[
						'name' => 'feature_title',
						'label' => esc_html__('Feature Title', 'sinco'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'feature_text',
						'label' => esc_html__('Feature Text', 'sinco'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'sinco' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'counter_stop',
						'label' => esc_html__('Counter Stop', 'sinco'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__('', 'sinco')
					],
				],
				'title_field' => '{{feature_title}}',
			 ]
        );
		$this->add_control(
			'service_description',
			[
				'label'       => __( 'Services Description', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Services Description', 'sinco' ),
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
        Service Details
    ============================================== 
    -->
    <div class="service-details position-relative mt-160 mb-150 lg-mt-100 lg-mb-100">
        <div class="container">
            <div class="row">
                <div class="<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) echo 'col-xl-9 col-lg-8 order-lg-1'; else echo 'col-xl-12 col-lg-12'; ?>">
                    <div class="service-details-meta ps-lg-5 ms-xxl-4">
                        <?php if($settings['title']){ ?>
                        <h2 class="main-title"><?php echo wp_kses($settings['title'], true);?></h2>
                        <?php } ?>
                         
                        <?php if($settings['text']){ ?>
                        <p><?php echo wp_kses($settings['text'], true);?></p>
                        <?php } ?>
                       
                        <?php if($settings['feature_img']['id']){ ?>
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="main-img-meta">
                        <?php } ?>
                        
                        <?php if($settings['service_title']){ ?>
                        <h3 class="sub-title"><?php echo wp_kses($settings['service_title'], true);?></h3>
                        <?php } ?>
                        
                        <?php if($settings['service_text']){ ?>
                        <p><?php echo wp_kses($settings['service_text'], true);?></p>
                        <?php } ?>
                        <div>
                            <div class="row">
                                <?php foreach($settings['our_services'] as $key => $item): ?>
                                <div class="col-md-4 d-flex" data-aos="fade-up">
                                    <div class="block-style-ten color-two ps-2 pe-2 text-center tran3s mt-10">
                                        <div class="icon d-flex align-items-end"><img src="<?php echo esc_url(wp_get_attachment_url($item['service_icon_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="m-auto"></div>
                                        <h6><a href="<?php echo esc_url($item['service_link']['url']);?>"><?php echo wp_kses($item['block_title'], true);?></a></h6>
                                    </div> <!-- /.block-style-ten -->
                                </div>
                               <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="mt-75 lg-mt-50">
                            <div class="row gx-xxl-5">
                                <div class="col-lg-6">
                                    <?php if($settings['sub_heading']){ ?>
                                    <h3 class="sub-title"><?php echo wp_kses($settings['sub_heading'], true);?></h3>
                                    <?php } ?>
                                    
                                    <?php $features_list = $settings['features_list'];
                                        if(!empty($features_list)){
                                        $features_list = explode("\n", ($features_list)); 
                                    ?>
                                    <ul class="style-none list-item md-mb-40">
                                        <?php foreach($features_list as $features): ?>
                                        <li><?php echo wp_kses($features, true); ?></li>
                                    	<?php endforeach; ?>
                                    </ul>
                                    <?php } ?>
                                    
                                </div>
                                <?php if($settings['sub_heading_1'] || $settings['sub_heading_text']){ ?>
                                <div class="col-lg-6">
                                    <?php if($settings['sub_heading_1']){ ?><h3 class="sub-title"><?php echo wp_kses($settings['sub_heading_1'], true);?></h3><?php } ?>
                                    <?php if($settings['sub_heading_text']){ ?><p><?php echo wp_kses($settings['sub_heading_text'], true);?></p><?php } ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="mt-60 mb-20 lg-mt-40 lg-mb-10">
                            <div class="row gx-xxl-5">
                                <?php foreach($settings['our_feature'] as $key => $item): ?>
                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="block-style-fifteen mb-30">
                                        <div class="d-flex">
                                            <div class="text">
                                                <h6><?php echo wp_kses($item['feature_title'], true);?></h6>
                                                <p><?php echo wp_kses($item['feature_text'], true);?></p>
                                                <a href="<?php echo esc_url($item['btn_link']['url']);?>" class="details-btn"><?php echo wp_kses($item['btn_title'], true);?></a>
                                            </div> <!-- /.text -->
                                            <div class="circle_percent" data-percent="<?php echo wp_kses($item['counter_stop'], true);?>">
                                                <div class="circle_inner">
                                                    <div class="round_per"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- /.block-style-fifteen -->
                                </div>
                                <?php endforeach; ?> 
                            </div>
                        </div>
                        <?php if($settings['service_description']){ ?>
                        <p><?php echo wp_kses($settings['service_description'], true);?></p>
                        <?php } ?>
                    </div> <!-- /.service-details-meta -->
                </div>
                <?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                <div class="col-xl-3 col-lg-4 col-md-8 order-lg-0">
                    <div class="service-sidebar md-mt-60">
                        <?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>   
                    </div> <!-- /.service-sidebar -->
                </div>
                <?php endif; ?>
            </div>
        </div>
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/shape_48.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes bg-shape">
    </div> <!-- /.service-details -->

	<?php
    }
}
