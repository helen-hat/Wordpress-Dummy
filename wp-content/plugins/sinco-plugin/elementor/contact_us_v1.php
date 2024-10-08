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
class Contact_Us_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_contact_us_v1';
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
        return esc_html__( 'Contact Us V1', 'sinco' );
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
            'contact_us_v1',
            [
                'label' => esc_html__( 'Contact US V1', 'sinco' ),
            ]
        );
		$this->add_control(
        	'info', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('Our Address', 'sinco')],
					['block_title' => esc_html__('Contact Info', 'sinco')],
				],
			'fields' => 
				[
					[
						'name' => 'contact_image',
						'label' => esc_html__('Contact Image', 'sinco'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Description', 'sinco'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'form_title',
			[
				'label'       => __( 'Form Title', 'sinco' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Form Title', 'sinco' ),
			]
		);
		$this->add_control(
			'contact_form_url',
			[
				'label'       => __( 'Contact Form 7 Url', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form 7 Url', 'sinco' ),
			]
		);
		$this->add_control(
			'google_map_code',
			[
				'label'       => __( 'Google Map Iframe Code', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Google Map Iframe Code', 'sinco' ),
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
		Contact Section One
	============================================== 
	-->
	<div class="contact-section-one mb-170 lg-mb-120">
		<div class="container">
			<div class="row">
				<?php foreach($settings['info'] as $key => $item): ?>
				<div class="col-md-4">
					<div class="address-block-two text-center mb-40 sm-mb-20">
						<div class="icon d-flex align-items-center justify-content-center m-auto"><img src="<?php echo esc_url(wp_get_attachment_url($item['contact_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div>
						<h5 class="title"><?php echo wp_kses($item['block_title'], true);?></h5>
						<p><?php echo wp_kses($item['block_text'], true);?></p>
					</div> <!-- /.address-block-two -->
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="mt-100 lg-mt-70">
			<div class="container">
				<div class="row gx-xxl-5">
					<?php if($settings['form_title'] || $settings['contact_form_url']) { ?>
                    <div class="col-lg-6 d-flex order-lg-last">
						<div class="form-style-one">
							<?php if($settings['form_title']) { ?>
							<h3 class="form-title pb-40 lg-pb-20"><?php echo wp_kses($settings['form_title'], true); ?></h3>
							<?php } ?>
                            
							<?php if($settings['contact_form_url']){ ?>
							<?php echo do_shortcode($settings['contact_form_url'], true);?>
							<?php } ?>
						</div> <!-- /.form-style-one -->
					</div>
					<?php } ?>
                    
					<?php if($settings['google_map_code']){ ?>
					<div class="col-lg-6 d-flex order-lg-first">
						<div class="map-area-one mt-10 me-lg-4 md-mt-50">
							<div class="mapouter">
								<div class="gmap_canvas">
									<?php echo do_shortcode($settings['google_map_code']);?>
								</div>
							</div>
						</div> <!-- /.map-area-one -->
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div> <!-- /.contact-section-one -->

	<?php
    }
}
