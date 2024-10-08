<?php

namespace SINCOPLUGIN\Element;

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
class Services_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sinco_services_v3';
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
		return esc_html__( 'Services v3', 'sinco' );
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
			'services_v3',
			[
				'label' => esc_html__( 'Services V3', 'sinco' ),
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
			'subtitle',
			[
				'label'       => __( ' Sub Title', 'sinco' ),
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
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'sinco' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'sinco' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'sinco' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'sinco' ),
					'title'      => esc_html__( 'Title', 'sinco' ),
					'menu_order' => esc_html__( 'Menu Order', 'sinco' ),
					'rand'       => esc_html__( 'Random', 'sinco' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'sinco' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'sinco' ),
					'ASC'  => esc_html__( 'ASC', 'sinco' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
			[
			  'type' => Controls_Manager::SELECT,
			  'label' => esc_html__('Category', 'sinco'),
			  'label_block' => true,
			  'options' => get_service_categories()
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
		
        $paged = get_query_var('paged');
		$paged = sinco_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-sinco' );
		$args = array(
			'post_type'      => 'service',
			'posts_per_page' => sinco_set( $settings, 'query_number' ),
			'orderby'        => sinco_set( $settings, 'query_orderby' ),
			'order'          => sinco_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( sinco_set( $settings, 'query_category' ) ) $args['service_cat'] = sinco_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
	{ ?>
	  
    <!-- 
    =============================================
        Feature Section Thirteen
    ============================================== 
    -->
    <div class="<?php if($settings['style_two'] == 'two') echo ' fancy-feature-twentyFive position-relative mt-120 lg-mt-80'; else echo 'fancy-feature-thirteen position-relative mt-100 pb-150 lg-pb-100'; ?>">
        <div class="container">
            <?php if($settings['subtitle'] || $settings['title']) { ?>
            <div class="row">
                <div class="col-xl-6 col-lg-5 col-md-7 m-auto" data-aos="fade-up">
                    <div class="title-style-one text-center mb-55 lg-mb-30">
                        <?php if($settings['subtitle']) { ?><div class="sc-title-five"><?php echo wp_kses($settings['subtitle'], true);?></div><?php } ?>
                        <?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                    </div> <!-- /.title-style-one -->
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <?php 
                    while ( $query->have_posts() ) : $query->the_post(); 
                ?>
                <div class="col-xl-3 col-sm-6 d-flex" data-aos="fade-up">
                    <div class="block-style-ten tran3s mt-30">
                        <div class="icon d-flex align-items-end"><?php the_post_thumbnail('sinco_49x49'); ?></div>
                        <h6><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'service_url', true ));?>"><?php the_title(); ?></a></h6>
                        <p><?php echo wp_kses(sinco_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                        <!-- <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'service_url', true ));?>" class="read-btn tran3s"><i class="bi bi-arrow-right"></i></a> -->
                    </div> <!-- /.block-style-ten -->
                </div>
                <?php endwhile; ?>
            </div>
        </div> <!-- /.container -->
        <?php if($settings['pattern_image']) { ?>
        	<?php if( $settings[ 'shape_img' ]['id'] ):?>
                <img src="<?php echo esc_url( wp_get_attachment_url($settings[ 'shape_img' ]['id']) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
            <?php else:?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_31.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
            <?php endif;?>
        <?php } ?>
    </div> <!-- /.fancy-feature-thirteen -->

	<?php }
    wp_reset_postdata();
	}

}