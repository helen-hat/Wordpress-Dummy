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
class Our_Clients extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_our_clients';
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
        return esc_html__( 'Our Clients', 'sinco' );
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
            'our_clients',
            [
                'label' => esc_html__( 'Our Clients', 'sinco' ),
            ]
        );
		$this->add_control(
        	'clients', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['client_link' => esc_html__('#', 'sinco')],
					['client_link' => esc_html__('#', 'sinco')],
					['client_link' => esc_html__('#', 'sinco')],
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
						'name' => 'client_link',
						'label' => __( 'Client Link', 'sinco' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{client_link}}',
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
					'one' => esc_html__( 'Choose Style One', 'sinco' ),
					'two' => esc_html__( 'Choose Style Two', 'sinco' ),
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
    =====================================================
        Partner Section Two
    =====================================================
    -->
    <div class="partner-section-two <?php if($settings['style_two'] == 'two') echo ''; else echo 'mt-30 mb-130 lg-mb-80'; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 m-auto">
                    <ul class="style-none text-center mt-40 lg-mt-10">
                        <?php foreach($settings['clients'] as $key => $item): ?>
                        <li class="partner-logo-block-one d-inline-block" data-aos="fade-up"><a href="<?php echo esc_url($item['client_link']['url']); ?>" class="d-flex align-items-center justify-content-center"><img src="<?php echo esc_url(wp_get_attachment_url($item['client_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.partner-section-two -->

    <?php
    }
}
