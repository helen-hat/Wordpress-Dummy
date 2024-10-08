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
class Why_Choose_Us extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_why_choose_us';
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
        return esc_html__( 'Why Choose Us', 'sinco' );
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
            'why_choose_us',
            [
                'label' => esc_html__( 'Why Choose Us', 'sinco' ),
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
			'choose_us_image',
			[
				'label' => __( 'Choose Image', 'sinco' ),
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
        Feature Section Twelve
    ============================================== 
    -->
    <div class="fancy-feature-twelve mt-170 lg-mt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-6 order-md-last">
                    <div class="block-style-nine pt-30 sm-pt-10">
                        <?php if($settings['subtitle'] || $settings['title']) { ?>
                        <div class="title-style-one pb-10" data-aos="fade-up">
                            <?php if($settings['subtitle']) { ?><div class="sc-title-four"><?php echo wp_kses($settings['subtitle'], true); ?></div><?php } ?>
                            <?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                        </div> <!-- /.title-style-one -->
                        <?php } ?>
                        
                        <?php $features_list = $settings['features_list'];
                            if(!empty($features_list)){
                            $features_list = explode("\n", ($features_list)); 
                        ?>
                        <ul class="style-none list-item">
                        	<?php foreach($features_list as $features): ?>
                            <li data-aos="fade-up"><?php echo wp_kses($features, true); ?></li>
                        	<?php endforeach; ?>
                        </ul>
                        <?php } ?>
                    </div> <!-- /.block-style-nine -->
                </div>
                <div class="col-xl-7 col-md-6 order-md-first" data-aos="fade-right">
                    <div class="illustration-holder position-relative d-inline-block ms-5 sm-mt-30">
                        <?php if($settings['choose_us_image']['id']){ ?>
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['choose_us_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="transform-img-meta">
                        <?php } ?>
                        
                        <?php if($settings['img_title']) { ?>
                        <div class="card-one shapes d-flex align-items-center justify-content-center">
                            <div class="icon"><i class="bi bi-check-lg"></i></div>
                            <h6><?php echo wp_kses($settings['img_title'], true); ?></h6>
                        </div> <!-- /.card-one -->
                        <?php } ?>
                        
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
                                    if($x <= $ratting) echo '<li><i class="bi bi-star-fill"></i></li>'; else echo '<li><i class="bi bi-star-half"></i></li>'; 
                                    }
                                ?>
                            </ul>
                        </div> <!-- /.card-two -->
                    </div>
                </div>
            </div>
        </div>
        <?php if( $settings[ 'shape_img' ]['id'] ):?>
            <img src="<?php echo esc_url( wp_get_attachment_url($settings[ 'shape_img' ]['id']) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes bg-shape">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_25.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes bg-shape">
        <?php endif;?>
    </div> <!-- /.fancy-feature-twelve -->

    <?php
    }
}
