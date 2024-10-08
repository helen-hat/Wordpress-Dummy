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
class Our_Features_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_our_features_v2';
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
        return esc_html__( 'Our Features V2', 'sinco' );
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
            'our_features_v2',
            [
                'label' => esc_html__( 'Our Features V2', 'sinco' ),
            ]
        );
		$this->add_control(
        	'features', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('Data Science', 'sinco')],
					['block_title' => esc_html__('Machine Learning', 'sinco')],
					['block_title' => esc_html__('Customer Support', 'sinco')],
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
					[
						'name' => 'feature_image',
						'label' => esc_html__('Feature Image', 'sinco'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'feature_link',
						'label' => __( 'Feature Link', 'sinco' ),
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
    =============================================
        Feature Section Eight
    ============================================== 
    -->
    <div class="fancy-feature-eight position-relative">
        <div class="container">
            <div class="row justify-content-center gx-xxl-5">
               <?php foreach($settings['features'] as $key => $item): ?>
                <div class="col-lg-4 col-sm-6 d-flex mb-30" data-aos="fade-up">
                    <div class="block-style-seven">
                        <div class="icon d-flex align-items-end"><img src="<?php echo esc_url(wp_get_attachment_url($item['feature_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div>
                        <h5><a href="<?php echo esc_url($item['feature_link']['url']); ?>"><?php echo wp_kses($item['block_title'], true);?></a></h5>
                        <p><?php echo wp_kses($item['block_text'], true);?></p>
                        <?php if($item['feature_link']['url']){ ?>
                        <a href="<?php echo esc_url($item['feature_link']['url']); ?>" class="tran3s more-btn"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/icon_20.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></a>
                    	<?php } ?>
                    </div> <!-- /.block-style-seven -->
                </div>
                <?php endforeach; ?>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.fancy-feature-eight -->    
 
	<?php
    }
}
