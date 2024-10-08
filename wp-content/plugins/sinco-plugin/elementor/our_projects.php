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
class Our_Projects extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sinco_our_projects';
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
		return esc_html__( 'Our Projects', 'sinco' );
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
			'our_projects',
			[
				'label' => esc_html__( 'Our Projects', 'sinco' ),
			]
		);
		$this->add_control(
			'number',
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
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'sinco' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'sinco' ),
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
			'style_two',
			[
				'label'   => esc_html__( 'Choose Different Style', 'sinco' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose 3 Column Style', 'sinco' ),
					'two' => esc_html__( 'Choose 2 Column Style ', 'sinco' ),
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
			'post_type'      => 'project',
			'posts_per_page' => sinco_set( $settings, 'number' ),
			'orderby'        => sinco_set( $settings, 'query_orderby' ),
			'order'          => sinco_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",sinco_set( $settings, 'cat_exclude' ));
		if(sinco_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() ) 
		{
		ob_start();
		?>
  
		<?php 
            $count = 0; 
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'project_cat');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'project_cat', '', ', ');
            
            $post_terms = wp_get_post_terms( get_the_id(), 'project_cat'); 
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
        	
			$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			
            ?>
            <?php if($settings['style_two'] == 'two') :?>
            
            <div class="isotop-item <?php echo esc_attr($term_slug); ?>">
                <div class="portfolio-block-two mt-25">
                    <div class="img-meta">
                        <?php the_post_thumbnail('sinco_560x462', array('class'=>'w-100')); ?>
                        <div class="hover-state tran3s"><a class="fancybox tran3s" data-fancybox="" title="Click for large view" href="<?php echo esc_url($post_thumbnail_url); ?>" tabindex="0"><i class="bi bi-plus"></i></a></div>
                    </div>
                    <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'project_link', true ));?>" class="title tran3s d-flex flex-column justify-content-center align-items-center">
                        <span class="tag"><?php echo implode( ', ', (array)$term_list );?></span>
                        <span class="pj-name"><?php the_title(); ?></span>
                    </a>
                </div> <!-- /.portfolio-block-two -->
            </div> <!-- /.item -->
                        
            <?php else: ?>
             
            <div class="isotop-item <?php echo esc_attr($term_slug); ?>">
                <div class="portfolio-block-one mt-40 xs-mt-30">
                    <div class="img-meta"><div class="w-100"><?php the_post_thumbnail('sinco_450x540'); ?></div></div>
                    <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'project_link', true ));?>" class="title tran3s d-flex flex-column justify-content-center align-items-center">
                        <span class="tag"><?php echo implode( ', ', (array)$term_list );?></span>
                        <span class="pj-name"><?php the_title(); ?></span>
                    </a>
                    <div class="hover-state tran3s"><a class="fancybox tran3s" data-fancybox="" title="Click for large view" href="<?php echo esc_url($post_thumbnail_url); ?>" tabindex="0"><i class="bi bi-plus"></i></a></div>
                </div> <!-- /.portfolio-block-one -->
            </div> <!-- /.item -->
           
			<?php endif; endwhile;?>

            <?php wp_reset_postdata();
            $data_posts = ob_get_contents();
            ob_end_clean();
            
            ob_start();?>
            
            <?php $terms = get_terms(array('project_cat')); ?>

            <!-- 
            =============================================
                Portfolio Gallery Three
            ============================================== 
            -->
            <div class="<?php if($settings['style_two'] == 'two') echo 'portfolio-gallery-four mt-140 mb-130 lg-mt-90 lg-mb-50'; else echo 'portfolio-gallery-three mt-140 mb-150 lg-mt-90 lg-mb-100'; ?>">
                <div class="container">
                    <ul class="style-none text-center isotop-menu-wrapper g-control-nav-one pb-30 lg-pb-10">
                        <li class="is-checked" data-filter="*"><?php esc_attr_e('All', 'sinco');?></li>
                        <?php foreach( $fliteration as $t ): ?>
                        <li data-filter=".<?php echo esc_attr(sinco_set( $t, 'slug' )); ?>"><?php echo sinco_set( $t, 'name'); ?></li>
                        <?php endforeach;?>
                    </ul>
            
                    <div id="isotop-gallery-wrapper" class="<?php if($settings['style_two'] == 'two') echo 'grid-2column custom-container'; else echo 'grid-3column'; ?>">
                        <div class="grid-sizer"></div>
                        <?php echo wp_kses($data_posts, true); ?> 
                    </div>
                </div>
            </div> <!-- /.portfolio-gallery-three -->
            
       <?php }
	}

}
