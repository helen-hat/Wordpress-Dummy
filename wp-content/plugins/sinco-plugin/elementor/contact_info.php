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
class Contact_Info extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_contact_info';
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
        return esc_html__( 'Contact Info', 'sinco' );
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
            'contact_info',
            [
                'label' => esc_html__( 'Contact Info', 'sinco' ),
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
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'sinco' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
						'one' => esc_html__( 'Choose Style without line', 'sinco' ),
						'two' => esc_html__( 'Choose Style with line ', 'sinco' ),
						),
					],
				],
				'title_field' => '{{block_title}}',
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
    =====================================================
        Address Section One
    =====================================================
    -->
    <div class="address-section-one <?php if($settings['style_two'] == 'two') echo ''; else echo 'pt-130 lg-pt-100'; ?>">
        <div class="container">
            <?php if($settings['subtitle'] || $settings['title'] || $settings['btn_link']['url']){ ?>
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-9 m-auto">
                    <?php if($settings['subtitle'] || $settings['title']){ ?>
                    <div class="title-style-one text-center mb-50" data-aos="fade-up">
                        <?php if($settings['subtitle']){ ?><div class="sc-title-two"><?php echo wp_kses($settings['subtitle'], true);?></div><?php } ?>
                        <?php if($settings['title']){ ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                    </div> <!-- /.title-style-one -->
                    <?php } ?>
                    
                    <?php if($settings['btn_link']['url']){ ?>
                    <div class="text-center" data-aos="fade-up" data-aos-delay="150"><a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="btn-four ripple-btn"><?php echo wp_kses($settings['btn_title'], true); ?><i class="fas fa-chevron-right"></i></a></div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            <div class="inner-content" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-0">
                    <?php foreach($settings['info'] as $key => $item): ?>
                    <div class="col-md-6 d-flex">
                        <div class="address-block-one d-flex <?php if($item['style_two'] == 'two') echo ' border-right'; else echo ''; ?>">
                            <div class="icon"><img src="<?php echo esc_url(wp_get_attachment_url($item['contact_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div>
                            <div class="text-meta">
                                <h4 class="title"><?php echo wp_kses($item['block_title'], true);?></h4>
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                            </div> <!-- /.text-meta -->
                        </div> <!-- /.address-block-one -->
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
		<?php if($settings['pattern_image']) { ?>
        <?php if( $settings[ 'shape_img' ]['id'] ):?>
            <img src="<?php echo esc_url( wp_get_attachment_url($settings[ 'shape_img' ]['id']) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/bg_05.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <?php endif;?>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_01.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_02.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-three">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_02.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-four">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_03.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-five">
        <?php } ?>
        
    </div> <!-- /.address-section-one -->

    <?php
    }
}
