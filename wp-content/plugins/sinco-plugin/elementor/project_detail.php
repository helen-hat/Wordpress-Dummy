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
class Project_Detail extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_project_detail';
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
        return esc_html__( 'Project Detail', 'sinco' );
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
            'project_detail',
            [
                'label' => esc_html__( 'Project Detail', 'sinco' ),
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
				'label'       => __( 'Description', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'sinco' ),
			]
		);
		$this->add_control(
              'our_project', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('DATE', 'sinco')],
					['block_title' => esc_html__('Client', 'sinco')],
					['block_title' => esc_html__('Project Type', 'sinco')],
					['block_title' => esc_html__('Duration', 'sinco')]
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
		$this->add_control(
                'social_share', 
				[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['social_link' => esc_html__('#', 'sinco')],
					['social_link' => esc_html__('#', 'sinco')],
				],
			'fields' => 
				[
					[
						'name' => 'social_icons',
						'label' => esc_html__('Enter The icons', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'social_link',
						'label' => __( 'Social Link', 'sinco' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{social_link}}',
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
			'project_info_title',
			[
				'label'       => __( 'Project Info Title', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Project Info Title', 'sinco' ),
			]
		);
		$this->add_control(
              'project_info', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['info_title' => esc_html__('Research', 'sinco')],
					['info_title' => esc_html__('Identify Problem', 'sinco')],
					['info_title' => esc_html__('Resolve Problem', 'sinco')],
				],
			'fields' => 
				[
					[
						'name' => 'info_title',
						'label' => esc_html__('Title', 'sinco'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'info_text',
						'label' => esc_html__('Text', 'sinco'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
				],
				'title_field' => '{{info_title}}',
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
			'project_title',
			[
				'label'       => __( 'Project Title', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your project title', 'sinco' ),
			]
		);
		$this->add_control(
			'project_description',
			[
				'label'       => __( 'Project Description', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your project description', 'sinco' ),
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
        Portfolio Details One
    =====================================================
    -->
    <div class="pr-details-one sn-style-two mt-120 lg-mt-90 mb-170 lg-mb-100">
        <div class="container">
            <div class="wrapper ps-xxl-4 pe-xxl-4 ms-xxl-5 me-xxl-5">
                <div class="row gx-xxl-5">
                    <?php if($settings['subtitle'] || $settings['title'] || $settings['text']){ ?>
                    <div class="col-lg-12">
                        <?php if($settings['subtitle'] || $settings['title']){ ?>
                        <div class="title-style-five">
                            <?php if($settings['subtitle']){ ?><div class="upper-title"><?php echo wp_kses($settings['subtitle'], true);?></div><?php } ?>
                            <?php if($settings['title']){ ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                        </div>
                        <?php } ?>
                        
                        <?php if($settings['text']){ ?>
                        <div class="text-wrapper pt-20 md-pt-20">
                            <p class="m-0"><?php echo wp_kses($settings['text'], true);?></p>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                <?php if($settings['feature_img']['id']){ ?>
                <div class="portfolio-block-two mt-40 mb-80 lg-mt-20 lg-mb-40">
                    <div class="img-meta">
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="w-100">
                        <div class="hover-state tran3s"><a class="fancybox tran3s" data-fancybox="" title="Click for large view" href="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id']));?>" tabindex="0"><i class="bi bi-plus"></i></a></div>
                    </div>
                </div> <!-- /.portfolio-block-two -->
                <?php } ?>
                
                <div class="sn-pro-detail mb-80">
                    <div class="project-info">
                        <div class="row gx-xxl-5">
                            <?php foreach($settings['our_project'] as $key => $item): ?>
                            <div class="col-sm-3">
                                <div class="inner">
                                    <div class="pt-title"><?php echo wp_kses($item['block_title'], true);?></div>
                                    <div class="pt-text"><?php echo wp_kses($item['block_text'], true);?></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div> <!-- /.project-info -->
                </div>
                
                <?php if($settings['project_info_title']){ ?>
                <h3 class="sub-title"><?php echo wp_kses($settings['project_info_title'], true);?></h3>
				<?php } ?>
                
                <div class="row gx-xxl-5">
                    <?php $i = 1; foreach($settings['project_info'] as $key => $item): ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="block-style-sixteen d-flex mt-30 md-mt-20">
                            <div class="numb tran3s"><?php $i = sprintf('%2d', $i); echo $i; ?> </div>
                            <div class="text">
                                <h6><?php echo wp_kses($item['info_title'], true);?></h6>
                                <p><?php echo wp_kses($item['info_text'], true);?>.</p>
                            </div>
                        </div> <!-- /.block-style-sixteen -->
                    </div>
                    <?php $i++; endforeach; ?>
                </div>
                
                <div class="mt-80 pt-80 pb-40 mb-60 lg-mt-50 lg-pt-50 lg-pb-20 lg-mb-40 border-top border-bottom">
                    <div class="row gx-xxl-5">
                        <?php if($settings['sub_heading'] || $settings['sub_heading_text']){ ?>
                        <div class="col-lg-6">
                            <?php if($settings['sub_heading']){ ?>
                            <h3 class="sub-title"><?php echo wp_kses($settings['sub_heading'], true);?></h3>
                            <?php } ?>
                            
                            <?php if($settings['sub_heading_text']){ ?>
                            <p><?php echo wp_kses($settings['sub_heading_text'], true);?></p>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="col-xl-5 col-lg-6 ms-auto">
                            <?php if($settings['sub_heading_1']){ ?><h3 class="sub-title"><?php echo wp_kses($settings['sub_heading_1'], true);?></h3><?php } ?>
                            
							<?php $features_list = $settings['features_list'];
                                if(!empty($features_list)){
                                $features_list = explode("\n", ($features_list)); 
                            ?>
                            <ul class="style-none list-item">
                            	<?php foreach($features_list as $features): ?>
                                <li><?php echo wp_kses($features, true); ?></li>
                            	<?php endforeach; ?>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php if($settings['project_title']){ ?>
                <h3 class="sub-title"><?php echo wp_kses($settings['project_title'], true);?></h3>
                <?php } ?>
                
                <?php if($settings['project_description']){ ?>
                <p><?php echo wp_kses($settings['project_description'], true);?></p>
                <?php } ?>
            </div> <!-- /.wrapper -->
        </div>
    </div> <!-- /.pr-details-one -->

	<?php
    }
}
