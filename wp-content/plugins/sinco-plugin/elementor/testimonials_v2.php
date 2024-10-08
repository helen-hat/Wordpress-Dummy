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
class Testimonials_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sinco_testimonials_v2';
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
		return esc_html__( 'Testimonials V2', 'sinco' );
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
			'testimonials_v2',
			[
				'label' => esc_html__( 'Testimonials V2', 'sinco' ),
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
			  'options' => get_testimonials_categories()
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
					'one' => esc_html__( 'Choose Style one', 'sinco' ),
					'two' => esc_html__( 'Choose Style Two', 'sinco' ),
					'three' => esc_html__( 'Choose Style Three', 'sinco' ),
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
		
        $paged = sinco_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-sinco' );
		$args = array(
			'post_type'      => 'testimonials',
			'posts_per_page' => sinco_set( $settings, 'query_number' ),
			'orderby'        => sinco_set( $settings, 'query_orderby' ),
			'order'          => sinco_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( sinco_set( $settings, 'query_category' ) ) $args['testimonials_cat'] = sinco_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
	{ ?>
	
	<!--
	=====================================================
		Feedback Slider Three
	=====================================================
	-->
	<div class="feedback-section-three <?php if($settings['style_two'] == 'three') echo 'style-two mt-180 lg-mt-120'; elseif($settings['style_two'] == 'two') echo 'style-two position-relative mt-250 lg-mt-130'; else echo 'position-relative mt-250 lg-mt-130'; ?> "  data-aos="fade-up">
		<div class="container">
			<div class="slider-wrapper">
				<div class="feedback_slider_three">
				   <?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="item">
						<div class="feedback-block-three d-md-flex">
							<div class="img-meta">
								<?php the_post_thumbnail('sinco_420x520'); ?>
							</div>
							<div class="text-wrapper">
								<div class="icon d-flex justify-content-center align-items-center"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/icon_15.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></div>
								<p><?php echo wp_kses(sinco_trim(get_the_content(), $settings['text_limit']), true); ?></p>
								<div class="name">
									<h6><?php the_title(); ?></h6>
									<span><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
								</div> <!-- /.name -->
							</div> <!-- /.text-wrapper -->
						</div> <!-- /.feedback-block-three -->
					</div>
					<?php endwhile; ?>
				</div> <!-- /.feedback_slider_three -->
			</div> <!-- /.slider-wrapper -->
		</div> <!-- /.container -->
		
		<?php if($settings['pattern_image']) { ?>
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_12.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
		<?php } ?>
	</div> <!-- /.feedback-section-three -->

	<?php }
	wp_reset_postdata();
	}

}