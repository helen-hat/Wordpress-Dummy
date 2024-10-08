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
class Services_Provider extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sinco_services_provider';
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
		return esc_html__( 'Services Provider', 'sinco' );
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
			'services_provider',
			[
				'label' => esc_html__( 'Services Provider', 'sinco' ),
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
		Feature Section Seventeen
	============================================== 
	-->
	<div class="fancy-feature-seventeen position-relative mt-160 xl-mt-50">
		<div class="container">
			<?php if($settings['title'] || $settings['text']) { ?>
			<div class="row align-items-center">
				<?php if($settings['title']) { ?>
				<div class="col-xl-6 col-lg-5" data-aos="fade-right">
					<div class="title-style-three text-center text-lg-start">
						<h2 class="main-title"><?php echo wp_kses($settings['title'], true);?></h2>
					</div> <!-- /.title-style-three -->
				</div>
				<?php } ?>
				
				<?php if($settings['text']) { ?>
				<div class="col-xl-6 col-lg-7">
					<p class="m0 text-center text-lg-start md-pt-30"><?php echo wp_kses($settings['text'], true);?></p>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			<div class="row justify-content-center pt-30">
			
				<?php 
					$count = 1;
					while ( $query->have_posts() ) : $query->the_post(); 
				?>
                <div class="col-lg-4 col-md-6" data-aos="fade-right">
                    <div class="block-style-twelve mt-30 <?php if($count == 2) echo 'active'; ?> <?php if($count == 1) echo 'ps-lg-0 pe-xl-5 me-xl-2'; ?>">
                        <div class="icon d-flex align-items-end"><?php the_post_thumbnail('sinco_49x49'); ?></div>
                        <h5><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'service_url', true ));?>"><?php the_title(); ?></a></h5>
                        <p><?php echo wp_kses(sinco_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                        <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'service_url', true ));?>" class="tran3s more-btn"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/icon_20.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>"></a>
                    </div> <!-- /.block-style-twelve -->
                </div> <!-- /.item -->
				<?php $count++; endwhile; ?>
			</div>
		</div> <!-- /.container -->
		<div class="shapes shape-one"></div>
	</div> <!-- /.fancy-feature-seventeen -->
	 
	<?php }
	wp_reset_postdata();
	}
}