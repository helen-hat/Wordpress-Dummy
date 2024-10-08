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
class Contact_Us extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_contact_us';
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
        return esc_html__( 'Contact Us', 'sinco' );
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
            'contact_us',
            [
                'label' => esc_html__( 'Contact Us', 'sinco' ),
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
			'contact_image',
			[
				'label' => __( 'Contact Image', 'sinco' ),
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
		$this->add_control(
			'style_two',
			[
				'label'   => esc_html__( 'Choose Different Style', 'sinco' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'BG Pattern Style one', 'sinco' ),
					'two' => esc_html__( 'BG Pattern Style Two ', 'sinco' ),
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
		Feature Section Twenty One
	=====================================================
	-->
	<div class="fancy-feature-twentyOne mt-200 pb-100 lg-mt-120 lg-pb-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-7 ms-auto">
					<div class="block-style-five ps-xxl-5" data-aos="fade-left">
						<?php if($settings['subtitle'] || $settings['title']) { ?>
						<div class="title-style-three">
							<?php if($settings['subtitle']) { ?><div class="sc-title"><?php echo wp_kses($settings['subtitle'], true); ?></div><?php } ?>
							<?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
						</div> <!-- /.title-style-three -->
						<?php } ?>
						<?php if($settings['text']) { ?>
						<p class="pt-20 pb-15"><?php echo wp_kses($settings['text'], true); ?></p>
						<?php } ?>
						<?php if($settings['btn_link']['url']){ ?>
						<a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="btn-eight ripple-btn"><?php echo wp_kses($settings['btn_title'], true); ?></a>
						<?php } ?>
					</div> <!-- /.block-style-five -->
				</div>
			</div>
		</div>
		<?php if($settings['contact_image']['id']){ ?>
		<div class="illustration-holder" data-aos="fade-right">
			<img src="<?php echo esc_url(wp_get_attachment_url($settings['contact_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="w-100 main-illustration">
		</div> <!-- /.illustration-holder -->
		<?php } ?>
        
        <?php if($settings['style_two'] == 'two') : ?>
        	<?php if( $settings[ 'shape_img' ]['id'] ):?>
            	<img src="<?php echo esc_url( wp_get_attachment_url($settings[ 'shape_img' ]['id']) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes bg-shape">
            <?php else:?>
            	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_46.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes bg-shape">
            <?php endif;?>
        <img src="<?php if($settings[ 'shape_img' ]['id']) echo esc_url( wp_get_attachment_url($settings[ 'shape_img' ]['id']) ); else esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_46.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes bg-shape">
        <?php else: ?>
        	<?php if( $settings[ 'shape_img' ]['id'] ):?>
            	<img src="<?php echo esc_url( wp_get_attachment_url($settings[ 'shape_img' ]['id']) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
            <?php else:?>
            	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_37.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
            <?php endif;?>
        
        <div class="shapes oval-one"></div>
		<div class="shapes oval-two"></div>
        <?php endif; ?>
	</div> <!-- /.fancy-feature-twentyOne -->
	
	<?php
    }
}
