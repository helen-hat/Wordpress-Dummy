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
class Our_Faq_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sinco_our_faq_v1';
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
		return esc_html__( 'Our Faq V1', 'sinco' );
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
			'our_faq_v1',
			[
				'label' => esc_html__( 'Our Faq V1', 'sinco' ),
			]
		);
		$this->add_control(
        	'faq_tab', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('1. Makreting', 'sinco')],
					['block_title' => esc_html__('2. Buying', 'sinco')],
					['block_title' => esc_html__('3. User Manual', 'sinco')],
					['block_title' => esc_html__('4. Payments', 'sinco')],
					['block_title' => esc_html__('5. Terms & Conditions', 'sinco')],
					['block_title' => esc_html__('6. Account', 'sinco')],
				],
			'fields' => 
				[
					[
						'name' => 'block_title',
						'label' => esc_html__('Tab Button Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Button Title', 'sinco')
					],
					[
						'name' => 'text_limit',
						'label'   => esc_html__('Text Limit', 'sinco'),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 100,
						'step'    => 1,
					],
					[
						'name' => 'query_number',
						'label'   => esc_html__( 'Number of post', 'sinco' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 100,
						'step'    => 1,
					],
					[
						'name' => 'query_orderby',
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
					],
					[
						'name' => 'query_order',
						'label'   => esc_html__( 'Order', 'sinco' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'DESC',
						'options' => array(
							'DESC' => esc_html__( 'DESC', 'sinco' ),
							'ASC'  => esc_html__( 'ASC', 'sinco' ),
						),
					],
					[
					  'name' => 'query_category',
					  'type' => Controls_Manager::SELECT,
					  'label' => esc_html__('Category', 'sinco'),
					  'label_block' => true,
					  'options' => get_faqs_categories()
					],
				],
				'title_field' => '{{block_title}}',
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
        FAQ Section One
    =====================================================
    -->
    <!--Faq Section-->
    <section class="faq-section faq-section-one mt-130 mb-150 lg-mt-80 lg-mb-80">
        <div class="container">
            
            <!--Product Tabs-->
            <div class="prod-tabs tabs-box">
                <div class="row clearfix">
                    <div class="col-xxl-10 col-xl-11 m-auto tabs-box">
                    	<div class="row clearfix">
                            <!--Column-->
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <!--Tab Btns-->
                                <ul class="tab-btns tab-buttons clearfix">
                                    <?php foreach($settings['faq_tab'] as $key => $item):?>
                                    <li data-tab="#prod-market<?php echo esc_attr($key);?>" class="tab-btn <?php if($key == 1) echo 'active-btn';?>"><span><?php echo wp_kses($item['block_title'], true);?></span></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <!--Column-->
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                
                                <!--Tabs Container-->
                                <div class="tabs-content">
                                    <?php foreach($settings['faq_tab'] as $keys => $item):
                                                    
                                        $paged = sinco_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
                                        $this->add_render_attribute( 'wrapper', 'class', 'templatepath-sinco' );
                                        $args = array(
                                            'post_type'      => 'faqs',
                                            'posts_per_page' => sinco_set( $item, 'query_number' ),
                                            'orderby'        => sinco_set( $item, 'query_orderby' ),
                                            'order'          => sinco_set( $item, 'query_order' ),
                                            'paged'         => $paged
                                        );
                                        
                                        if( sinco_set( $item, 'query_category' ) ) $args['faqs_cat'] = sinco_set( $item, 'query_category' );
                                        $query = new \WP_Query( $args );
                                        if ( $query->have_posts()):	
                                    ?>
                                    
									<!--Tab -->
                                    <div class="tab <?php if($keys == 1) echo 'active-tab';?>" id="prod-market<?php echo esc_attr($keys);?>">
                                        <div class="content">
                                            <!--Accordian Box-->
                                            <ul class="accordion-box">
                                                <?php 
                                                    $count = 0;
                                                    while ( $query->have_posts() ) : $query->the_post();
                                                ?>
                                                <!--Block-->
                                                <li class="accordion block <?php if($count == 0) echo 'active-block';?>">
                                                    <div class="acc-btn <?php if($count == 0) echo 'active';?>"><div class="icon-outer"><span class="icon icon-plus fa fa-angle-up"></span> <span class="icon icon-minus fa fa-angle-down"></span></div><?php the_title();?></div>
                                                    <div class="acc-content <?php if($count == 0) echo 'current';?>">
                                                        <div class="content">
                                                            <div class="text"><?php echo sinco_trim(get_the_content(), $item['text_limit']); ?></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php $count++; endwhile;?>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </div>
                    	</div>
                	</div>
                </div>
            </div>
        </div>
    </section>
    <!--End Faq Section-->
          
	<?php 
	}
}