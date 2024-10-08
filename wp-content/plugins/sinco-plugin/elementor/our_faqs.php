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
class Our_Faqs extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_our_faqs';
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
        return esc_html__( 'Our Faqs', 'sinco' );
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
            'our_faqs',
            [
                'label' => esc_html__( 'Our Faqs', 'sinco' ),
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
        	'faq', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('What is web', 'sinco')],
					['block_title' => esc_html__('How do you ', 'sinco')],
					['block_title' => esc_html__('What can I', 'sinco')],
				],
			'fields' => 
				[
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Text', 'sinco'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
				],
				'title_field' => '{{block_title}}',
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
					'one' => esc_html__( 'Choose Style with Pattern Image', 'sinco' ),
					'two' => esc_html__( 'Choose Style without Pattern Image ', 'sinco' ),
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
	   
	<?php if($settings['style_two'] == 'two'): ?>       
        
    <!--
    =====================================================
        Feature Section Twenty
    =====================================================
    -->
    <div class="fancy-feature-twenty position-relative mt-160 pb-100 lg-mt-100 lg-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="block-style-five pe-xxl-5 me-xxl-5 md-pb-50">
                         <?php if($settings['subtitle'] || $settings['title']) { ?>
                        <div class="title-style-three">
                            <div class="sc-title"><?php echo wp_kses($settings['subtitle'], true); ?></div>
                            <h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2>
                        </div> <!-- /.title-style-three -->
                        <?php } ?>
                         <?php if($settings['text']) { ?>
                        <p class="pt-20 pb-15"><?php echo wp_kses($settings['text'], true); ?></p>
                        <?php } ?>
                        <?php if($settings['btn_link']['url']){ ?>
                        <a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="btn-eight ripple-btn"><?php echo wp_kses($settings['btn_title'], true); ?></a>
                        <?php } ?>
                    </div> <!-- /.block-style-five -->
                </div>

                <div class="col-lg-7">
                    <div class="accordion accordion-style-one" id="accordionOne">
                        <?php $count = 1; foreach($settings['faq'] as $key => $item): ?>
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingOne<?php echo esc_attr($count); ?>">
                                <button class="accordion-button <?php if($count == 2) echo ''; else echo 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo esc_attr($count); ?>" aria-expanded="false">
                                    <?php echo wp_kses($item['block_title'], true);?>
                                </button>
                            </div>
                            <div id="collapseOne<?php echo esc_attr($count); ?>" class="accordion-collapse collapse <?php if($count == 2) echo 'show'; ?>"  data-bs-parent="#accordionOne">
                                <div class="accordion-body">
                                    <p><?php echo wp_kses($item['block_text'], true);?> </p>
                                </div>
                            </div>
                        </div>
                        <?php $count++; endforeach; ?>
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->
        <?php if( $settings[ 'shape_img' ]['id'] ):?>
            <img src="<?php echo esc_url( wp_get_attachment_url($settings[ 'shape_img' ]['id']) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_36.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <?php endif;?>
        <div class="shapes oval-one"></div>
    </div> <!-- /.fancy-feature-twenty -->
    
	<?php else: ?>  
    
    <!--
    =====================================================
        Feature Section Seven
    =====================================================
    -->
    <div class="fancy-feature-seven mt-140 lg-mt-50 sm-mt-20">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-lg-5">
                    <div class="block-style-five md-pb-50" >
                        <?php if($settings['subtitle'] || $settings['title']) { ?>
                        <div class="title-style-one">
                            <?php if($settings['subtitle']) { ?><div class="sc-title-three"><?php echo wp_kses($settings['subtitle'], true); ?></div><?php } ?>
                            <?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                        </div> <!-- /.title-style-one -->
                        <?php } ?>
                        
						<?php if($settings['text']) { ?>
                        <p class="pt-10 pb-15"><?php echo wp_kses($settings['text'], true); ?></p>
                        <?php } ?>
                        
                        <?php if($settings['btn_link']['url']){ ?>
                        <a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="btn-five ripple-btn"><?php echo wp_kses($settings['btn_title'], true); ?></a>
                        <?php } ?>
                    </div> <!-- /.block-style-five -->
                </div>

                <div class="col-lg-7 col-lg-6 ms-auto" >
                    <div class="accordion accordion-style-one" id="accordionOne">
                        <?php $count = 1; foreach($settings['faq'] as $key => $item): ?>
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingOne<?php echo esc_attr($count); ?>">
                                <button class="accordion-button <?php if($count == 2) echo ''; else echo 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo esc_attr($count); ?>" aria-expanded="false">
                                    <?php echo wp_kses($item['block_title'], true);?>
                                </button>
                            </div>
                            <div id="collapseOne<?php echo esc_attr($count); ?>" class="accordion-collapse collapse <?php if($count == 2) echo 'show'; ?>" data-bs-parent="#accordionOne">
                                <div class="accordion-body">
                                    <p><?php echo wp_kses($item['block_text'], true);?> </p>
                                </div>
                            </div>
                        </div>
                        <?php $count++; endforeach; ?>
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->
        
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_13.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_14.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-two">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_15.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-three">
        
    </div> <!-- /.fancy-feature-seven -->

	<?php endif; 
    }
}
