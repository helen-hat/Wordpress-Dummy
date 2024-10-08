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
class How_It_Works_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_how_it_works_v2';
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
        return esc_html__( 'How It Works V2', 'sinco' );
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
            'how_it_works_v2',
            [
                'label' => esc_html__( 'How It Works V2', 'sinco' ),
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
        	'our_work', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('Identify the', 'sinco')],
					['block_title' => esc_html__('Collect data', 'sinco')],
					['block_title' => esc_html__('Deliver Accurate', 'sinco')],
				],
			'fields' => 
				[
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'sinco'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'sinco')
					],
					[
						'name' => 'work_image',
						'label' => esc_html__('Work Image', 'sinco'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'sinco' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style without arrows', 'sinco' ),
							'two' => esc_html__( 'Choose Style with arrows ', 'sinco' ),
						),
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
	=============================================
		Feature Section Fifteen
	============================================== 
	-->
	<div class="fancy-feature-fifteen position-relative mt-65">
		<div class="container">
			<?php if($settings['subtitle'] || $settings['title']) { ?>
			<div class="title-style-one text-center mb-90 lg-mb-30" data-aos="fade-up">
				<?php if($settings['subtitle']) { ?><div class="sc-title-five"><?php echo wp_kses($settings['subtitle'], true); ?></div><?php } ?>
				<?php if($settings['title']) { ?><h2 class="main-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
			</div> <!-- /.title-style-one -->
			<?php } ?>
			<div class="bg-wrapper">
				<div class="row justify-content-center gx-xxl-5">
					<?php $count = 1;  foreach($settings['our_work'] as $key => $item): ?>
					<div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100" >
						<div class="block-style-eleven position-relative mt-50 <?php if($item['style_two'] == 'two') echo 'shape-arrow'; else echo ''; ?>">
							<div class="icon d-flex align-items-center justify-content-center">
								<img src="<?php echo esc_url(wp_get_attachment_url($item['work_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>">
								<div class="num"><?php $count = sprintf('%2d', $count); echo $count; ?></div>
							</div>
							<h5><?php echo wp_kses($item['block_title'], true);?></h5>
						</div> <!-- /.block-style-eleven -->
					</div>
				    <?php $count++; endforeach; ?> 
				</div>
			</div> <!-- /.bg-wrapper -->
		</div> <!-- /.container -->
		<?php if( $settings[ 'shape_img' ]['id'] ):?>
            <img src="<?php echo esc_url( wp_get_attachment_url($settings[ 'shape_img' ]['id']) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape_33.svg" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="shapes shape-one">
        <?php endif;?>
    </div> <!-- /.fancy-feature-fifteen -->
   
	<?php
    }
}
