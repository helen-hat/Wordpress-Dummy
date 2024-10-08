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
class Our_Business extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_our_business';
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
        return esc_html__( 'Our Business', 'sinco' );
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
            'our_business',
            [
                'label' => esc_html__( 'Our Business', 'sinco' ),
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
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'sinco' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'sinco' ),
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
			'features_list',
			[
				'label'       => __( 'Features List', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your features list', 'sinco' ),
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
				'placeholder' => __( 'Enter your button title', 'sinco' ),
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
			'business_image',
			[
				'label' => __( 'Business Image', 'sinco' ),
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

	<?php if($settings['style_two'] == 'two'): ?>		
	
	<!-- 
	=============================================
		Feature Section Eighteen
	============================================== 
	-->
	<div class="fancy-feature-eighteen position-relative pt-200 pb-225 lg-pt-130 md-pt-100 xl-pb-150 lg-pb-100">
		<div class="container">
			<div class="row">
				<div class="col-xl-5 col-lg-6 col-md-7 ms-auto">
					<div class="block-style-two" data-aos="fade-left">
						<?php if($settings['subtitle'] || $settings['title']) { ?>
						<div class="title-style-three">
							<?php if($settings['subtitle']) { ?><div class="sc-title"><?php echo wp_kses($settings['subtitle'], true);?></div><?php } ?>
							<?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
						</div> <!-- /.title-style-three -->
						<?php } ?>
						
						<?php if($settings['text']) { ?>
						<p class="pt-20 pb-25 lg-pb-20"><?php echo wp_kses($settings['text'], true);?></p>
						<?php } ?>
					   
					    <?php $features_list = $settings['features_list'];
							if(!empty($features_list)){
							$features_list = explode("\n", ($features_list)); 
						?>
						<ul class="style-none list-item color-rev">
							<?php foreach($features_list as $features): ?>
							<li><?php echo wp_kses($features, true); ?></li>
							<?php endforeach; ?>
						</ul>
						<?php } ?>
						
						<?php if($settings['btn_link']['url']){ ?>
						<a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="btn-eight mt-50 lg-mt-30"><?php echo wp_kses($settings['btn_title'], true); ?></a>
						<?php } ?>
					</div> <!-- /.block-style-two -->
				</div>
			</div>
		</div> <!-- /.container -->
		<div class="illustration-holder" data-aos="fade-right">
			<?php if($settings['business_image']['id']){ ?>
			<img src="<?php echo esc_url(wp_get_attachment_url($settings['business_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="w-100 main-illustration">
			<?php } ?>
			
			<?php if($settings['pattern_image']) { ?>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_14_1.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one" data-aos="fade-down">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_14_2.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two" data-aos="fade-down" data-aos-delay="100">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_14_3.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-three" data-aos="fade-down" data-aos-delay="200">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_14_4.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-four">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_14_5.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-five">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_14_6.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-six">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/assets/ils_14_7.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-seven">
			<?php } ?>
		</div> <!-- /.illustration-holder -->
		
        <div class="shapes oval-one"></div>
		<div class="shapes oval-two"></div>
		<div class="shapes oval-three"></div>
	</div> <!-- /.fancy-feature-eighteen -->
        
	<?php else: ?>        
    <!-- 
    =============================================
        Feature Section Twelve
    ============================================== 
    -->
    <div class="fancy-feature-twelve mt-130 pb-50 lg-mt-80">
        <div class="container">
            <div class="row align-items-center align-items-xl-start">
                <div class="col-xl-5 col-md-6 order-md-last">
                    <div class="block-style-nine color-two">
                        <?php if($settings['subtitle'] || $settings['title']) { ?>
                        <div class="title-style-three pb-10" data-aos="fade-up">
                            <?php if($settings['subtitle']) { ?><div class="sc-title"><?php echo wp_kses($settings['subtitle'], true);?></div><?php } ?>
                            <?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                        </div> <!-- /.title-style-three -->
                        <?php } ?>
                        
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
                    </div> <!-- /.block-style-nine -->
                </div>
                
				<?php if($settings['business_image']['id']){ ?>
                <div class="col-xl-7 col-md-6 order-md-first" data-aos="fade-right">
                    <div class="illustration-holder position-relative d-inline-block pe-md-5 me-xxl-5 sm-mt-60">
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['business_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="transform-img-meta">
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_25.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes bg-shape">
    </div> <!-- /.fancy-feature-twelve -->
    
    <?php endif;
    }
}
