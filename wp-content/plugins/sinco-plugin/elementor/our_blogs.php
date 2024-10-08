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
class our_Blogs extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sinco_our_blogs';
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
		return esc_html__( 'Our Blogs', 'sinco' );
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
			'our_blogs',
			[
				'label' => esc_html__( 'Our Blogs', 'sinco' ),
			]
		);
		$this->add_control(
			'sidebar_slug',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'sinco' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => sinco_get_sidebars(),
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
			  'options' => get_blog_categories()
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label'       => __( 'Enable/Disable Pagination', 'sinco' ),
                'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'sinco' ),
				'label_off' => __( 'Hide', 'sinco' ),
				'return_value' => 'yes',
				'default' => 'no',
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
			'post_type'      => 'post',
			'posts_per_page' => sinco_set( $settings, 'query_number' ),
			'orderby'        => sinco_set( $settings, 'query_orderby' ),
			'order'          => sinco_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( sinco_set( $settings, 'query_category' ) ) $args['category_name'] = sinco_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
	{ ?>
	
    <!--
    =====================================================
        Blog Section Three
    =====================================================
    -->
    <div class="blog-section-three pt-90 mb-150 lg-pt-40 lg-mb-100">
        <div class="container">
            <div class="row gx-xxl-5">
                <div class="<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) echo 'col-lg-8'; else echo 'col-xl-12 col-lg-12'; ?>">
                    <div id="isotop-gallery-wrapper" class="grid-2column">
                        <div class="grid-sizer"></div>
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="isotop-item d-flex">
                            <article class="blog-meta-two mt-45">
                                <figure class="post-img m0">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="w-100 d-block">
                                        <div class="w-100 tran4s">
                                        <?php 
                                            $dimention = get_post_meta( get_the_id(), 'dimension', true );
                                            if($dimention == 'extra_height'){
                                                $image_size = 'sinco_410x380';
                                            }
                                            else{
                                                $image_size = 'sinco_410X300'; 
                                            }
                                            the_post_thumbnail($image_size);
                                        ?>
                                        </div>
                                    </a>
                                </figure>
                                <div class="post-data">
                                    <div class="post-tag"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php echo get_the_date( ); ?></a></div>
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="blog-title"><h5><?php the_title(); ?></h5></a>
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="read-btn tran3s"><?php esc_html_e('Continue Reading', 'sinco'); ?> <i class="fas fa-chevron-right"></i></a>
                                </div> <!-- /.post-data -->
                            </article>
                        </div>
                        <?php endwhile; ?>
                    </div> <!-- /.row -->
                    <?php if($settings['show_pagination']) {?>
                    <div class="page-pagination-one pt-70">
                        <div class="d-flex align-items-center style-none">
                            <?php sinco_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="bi bi-arrow-right"></i> ', 'prev_text' => '<i class="bi bi-arrow-left"></i>')); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-sidebar ps-xl-5 ps-lg-3 me-xxl-5 mt-45 md-mt-70">
                        <?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.blog-section-three -->
            
	<?php }
    wp_reset_postdata();
	}

}
