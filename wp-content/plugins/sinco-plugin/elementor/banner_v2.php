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
class Banner_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_banner_v2';
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
        return esc_html__( 'Banner V2', 'sinco' );
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
            'banner_v2',
            [
                'label' => esc_html__( 'Banner V2', 'sinco' ),
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
			'btn_title_1',
			[
				'label'       => __( 'Button Title 1', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'sinco' ),
			]
		);
		$this->add_control(
			'btn_link_1',
				[
				  'label' => __( 'Button Url 1', 'sinco' ),
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
			'banner_image',
			[
				'label' => __( 'Banner Image', 'sinco' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			'img_title',
			[
				'label'       => __( 'Image Title', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your image title', 'sinco' ),
			]
		);
		$this->add_control(
			'count_title',
			[
				'label'       => __( 'Count Title', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your count title', 'sinco' ),
			]
		);
		$this->add_control(
			'count_text',
			[
				'label'       => __( 'Count Text', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your count text', 'sinco' ),
			]
		);
		$this->add_control(
            'select_rating',
            [
                'label'   => esc_html__('Select Rating', 'sinco'),
				'label_block' => true,
                'type'    => Controls_Manager::SELECT,
                'default' => 'five',
                'options' => array(
                    '1'      => esc_html__('One Star Rating', 'sinco'),
                    '2'      => esc_html__('Two Star Rating', 'sinco'),
                    '3'    => esc_html__('Three Star Rating', 'sinco'),
                    '4'     => esc_html__('Four Star Rating', 'sinco'),
					'5'     => esc_html__('Five Star Rating', 'sinco'),
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
    =============================================
        Theme Hero Banner
    ============================================== 
    -->
    <div class="hero-banner-two">
        <div class="bg-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-7">
                        
                        <?php if($settings['title']) { ?><h1 class="hero-heading"><?php echo wp_kses($settings['title'], true); ?></h1><?php } ?>
                        <?php if($settings['text']) { ?><p class="text-lg pt-25 pb-40 lg-pb-20 sm-pt-10"><?php echo wp_kses($settings['text'], true); ?></p><?php } ?>
                        
                        <?php if($settings['btn_link']['url'] || $settings['btn_link_1']['url']){ ?>
                        <ul class="style-none button-group d-sm-flex align-items-center">
                            <?php if($settings['btn_link']['url']){ ?>
                            <li class="me-4 mt-10"><a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="btn-one ripple-btn"><?php echo wp_kses($settings['btn_title'], true); ?></a></li>
                            <?php } ?>
                            <?php if($settings['btn_link_1']['url']){ ?>
                            <li><a class="demo-btn tran3s mt-10" href="<?php echo esc_url($settings['btn_link_1']['url']); ?>"><?php echo wp_kses($settings['btn_title_1'], true); ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
            </div> <!-- /.container -->
            
            <div class="illustration-holder">
                <?php if($settings['banner_image']['id']){ ?>
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['banner_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="main-illustration w-100">
                <?php } ?>
                
                <?php if($settings['pattern_image']) { ?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_04_1.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_04_2.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_04_2.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-three">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_04_3.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-four">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_04_4.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-five">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_04_5.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-six">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_04_6.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-seven">
                <?php } ?>
              	
				<?php if($settings['img_title']) { ?>
                <div class="card-one shapes d-flex align-items-center justify-content-center">
					<div class="icon"><i class="bi bi-check-lg"></i></div>
                    <h6><?php echo wp_kses($settings['img_title'], true); ?></h6>
               	</div> 
                <?php } ?>
                
                <!-- /.card-one -->
                <div class="card-two shapes text-center">
                    <?php if($settings['count_title'] || $settings['count_text']) { ?>
                    <div class="icon"><i class="bi bi-check-lg"></i></div>
                    <div class="main-count"><?php echo wp_kses($settings['count_title'], true); ?></div>
                    <div class="info"><?php echo wp_kses($settings['count_text'], true); ?></div>
                    <?php } ?>
                    <ul class="style-none d-flex justify-content-center rating">
                        <?php
                        $ratting =  $settings['select_rating']; 
                        for ($x = 1; $x <= 5; $x++) {
                            if($x <= $ratting) echo '<li><i class="bi bi-star-fill"></i></li>'; else echo '<li><i class="bi bi-star"></i></li>'; 
                            }
                        ?>
                    </ul>
                </div> <!-- /.card-two -->
            </div> <!-- /.illustration-holder -->
        </div> <!-- /.bg-wrapper -->
    </div> <!-- /.hero-banner-two -->
	
	<?php
    }
}
