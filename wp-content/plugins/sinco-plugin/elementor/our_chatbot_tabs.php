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
class Our_Chatbot_Tabs extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_our_chatbot_tabs';
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
        return esc_html__( 'Our Chatbot Tabs', 'sinco' );
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
            'our_chatbot_tabs',
            [
                'label' => esc_html__( 'Our Chatbot Tabs', 'sinco' ),
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
              'chatbot_tabs', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['tab_title' => esc_html__('Speech', 'sinco')],
                			['tab_title' => esc_html__('Auto Text', 'sinco')],
							['tab_title' => esc_html__('Q&A', 'sinco')],
            			],
            		'fields' => 
						[
							[
                    			'name' => 'tab_title',
                    			'label' => esc_html__('Tab Title', 'sinco'),
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
                    			'name' => 'features_list',
                    			'label' => esc_html__('Features List', 'sinco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'sinco')
                			],
						],
            	    'title_field' => '{{tab_title}}',
                 ]
        );
		$this->add_control(
			'chatbot_img',
			[
				'label' => __( 'Chatbot Image', 'sinco' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
		Feature Section Nine
	============================================== 
	-->
	<div class="fancy-feature-nine mt-190 lg-mt-100">
		<div class="container">
			<div class="row">
				<div class="col-xxl-5 col-lg-6 ms-auto order-lg-last">
					<div class="block-style-two md-mb-50" data-aos="fade-left">
						<?php if($settings['subtitle'] || $settings['title']) { ?>
						<div class="title-style-one">
							<?php if($settings['subtitle']) { ?><div class="sc-title-four"><?php echo wp_kses($settings['subtitle'], true); ?></div><?php } ?>
							<?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
						</div> <!-- /.title-style-one -->
						<?php } ?>
                        
						<ul class="nav nav-tabs justify-content-between" role="tablist">
							<?php $count = 1; foreach($settings['chatbot_tabs'] as $key => $item): ?>
							<li class="nav-item" role="presentation">
								<button class="nav-link <?php if($count == 1) echo 'active'; ?>" data-bs-toggle="tab" data-bs-target="#sp<?php echo esc_attr($count); ?>" type="button" role="tab"><?php echo wp_kses($item['tab_title'], true);?></button>
							</li>
							<?php $count++; endforeach; ?>
						</ul>
						<div class="tab-content">
							<?php $counts = 1; foreach($settings['chatbot_tabs'] as $key => $item): ?>
							<div class="tab-pane fade <?php if($counts == 1) echo 'active show'; ?> " id="sp<?php echo esc_attr($counts); ?>">
								<p class="pt-10 pb-10"><?php echo wp_kses($item['block_text'], true);?></p>
								<?php $features_list = $item['features_list'];
									if(!empty($features_list)){
									$features_list = explode("\n", ($features_list)); 
								?>
								<ul class="style-none list-item">
									<?php foreach($features_list as $features): ?>
									<li><?php echo wp_kses($features, true); ?></li>
									<?php endforeach; ?>
								</ul>
								<?php } ?>
							</div> <!-- /.tab-pane -->
							<?php $counts++; endforeach; ?>
						</div> <!-- /.tab-content -->
						
					</div> <!-- /.block-style-two -->
				</div>
				<?php if($settings['chatbot_img']['id']){ ?>
				<div class="col-lg-6 order-lg-first text-center text-lg-start" data-aos="fade-right">
					<div class="illustration-holder d-inline-block ms-xxl-5 mt-40 lg-mt-10">
						<img src="<?php echo esc_url(wp_get_attachment_url($settings['chatbot_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="transform-img-meta">
						
                        <?php if( $settings[ 'shape_img' ]['id'] ):?>
                            <img src="<?php echo esc_url( wp_get_attachment_url($settings[ 'shape_img' ]['id']) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
                        <?php else:?>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_08_1.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
                        <?php endif;?>
                    </div>
				</div>
				<?php } ?>
			</div>
		</div> <!-- /.container -->
	</div> <!-- /.fancy-feature-nine -->

	<?php
    }
}
