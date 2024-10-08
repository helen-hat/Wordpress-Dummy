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
class Recent_Projects extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sinco_recent_projects';
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
		return esc_html__( 'Recent Projects', 'sinco' );
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
			'recent_projects',
			[
				'label' => esc_html__( 'Recent Projects', 'sinco' ),
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
				'options' => get_project_categories()
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
			'post_type'      => 'project',
			'posts_per_page' => sinco_set( $settings, 'query_number' ),
			'orderby'        => sinco_set( $settings, 'query_orderby' ),
			'order'          => sinco_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( sinco_set( $settings, 'query_category' ) ) $args['project_cat'] = sinco_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
	{ ?>
	   
    <!--
    =====================================================
        Portfolio Gallery Two
    =====================================================
    -->
    <div class="portfolio-gallery-two mt-170 lg-mt-110">
        <div class="container">
            <?php if($settings['subtitle'] || $settings['title']) { ?>
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7 m-auto">
                    <div class="title-style-one text-center mb-50 lg-mb-20" data-aos="fade-up">
                        <?php if($settings['subtitle']) { ?><div class="sc-title-five"><?php echo wp_kses($settings['subtitle'], true); ?></div><?php } ?>
                        <?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                    </div> <!-- /.title-style-one -->
                </div>
            </div>
            <?php } ?>
            <div class="row gx-xxl-5">
                <?php 
                    global $post;
                    while ( $query->have_posts() ) : $query->the_post(); 
                    $term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
                    $post_thumbnail_id = get_post_thumbnail_id($post->ID);
                    $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                ?>
                <div class="col-lg-4 col-sm-6" data-aos="fade-up">
                    <div class="portfolio-block-one mt-40">
                        <div class="img-meta"><div class="w-100"><?php the_post_thumbnail('sinco_450x540'); ?></div></div>
                        <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'project_link', true ));?>" class="title tran3s d-flex flex-column justify-content-center align-items-center">
                            <span class="tag"><?php echo implode( ', ', (array)$term_list );?></span>
                            <span class="pj-name"><?php the_title(); ?></span>
                        </a>
                        <div class="hover-state tran3s"><a class="fancybox tran3s" data-fancybox="" title="Click for large view" href="<?php echo esc_url($post_thumbnail_url); ?>" tabindex="0"><i class="bi bi-plus"></i></a></div>
                    </div> <!-- /.portfolio-block-one -->
                </div> <!-- /.item -->
               <?php endwhile; ?>
            </div>
        </div>
    </div> <!-- /.portfolio-gallery-two -->

    <?php }
    wp_reset_postdata();
	}

}
