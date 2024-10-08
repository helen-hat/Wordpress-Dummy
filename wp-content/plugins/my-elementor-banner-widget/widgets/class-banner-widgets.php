<?php
namespace Elementor;

class Banner_Widget extends Widget_Base {

    public function get_name() {
        return 'banner-widget';
    }

    public function get_title() {
        return __( 'Banner Widget', 'sinco' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'sinco' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'sinco' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Default Title', 'sinco' ),
            ]
        );

        $this->add_control(
            'banner_image',
            [
                'label' => __( 'Banner Image', 'sinco' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

    // Get the current post ID (if on a single job page)
    $current_post_id = is_single() ? get_the_ID() : null;
        
        // Fetch job posting data
        $args = [
            'post_type' => 'job_posting',
            'posts_per_page' => 1, // Change as necessary
            'post_status' => 'publish',
            // Include the current post if it matches
        'post__in' => $current_post_id ? array($current_post_id) : [],
        'orderby' => 'post__in', // Ensure the current post appears first if included
        ];

        
        $job_query = new \WP_Query($args);
        
        if ($job_query->have_posts()) {
            while ($job_query->have_posts()) {
                $job_query->the_post();
                
                // Fetch ACF fields
                $job_role = get_field('job_role'); // Adjust according to your field name
                $experience = get_field('experience'); // Adjust according to your field name
                $location = get_field('location');// Add logic if you store location in ACF                
                ?>
                <div class="theme-inner-banner">
                    <div class="container">
                        <ul class="page-breadcrumb style-none d-flex">
                            
                            <?php echo sinco_the_breadcrumb(); ?>
                        </ul>
                        <div class="job-info1">
                            <div class="d-flex align-items-center">
                            <h2 class="intro-title"><?php echo esc_html($job_role); ?></h2>
                            <span class="experience-badge1"><?php echo esc_html($experience); ?></span>
            </div>
                        </div>
                        <p class="location"><?php echo esc_html($location); ?></p>
                    </div>
                    
                </div>
                <?php
            
            }
            wp_reset_postdata(); // Reset post data after query
        } else {
            echo '<p>No job postings available.</p>'; // Fallback message
        }
    }
}


