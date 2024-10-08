<?php
// Ensure the file is not accessed directly
if (!defined('ABSPATH')) exit;

// Define the Custom Elementor Widget class
class Custom_Elementor_Widget extends \Elementor\Widget_Base {

    // Return widget name
    public function get_name() {
        return 'custom_elementor_widget';
    }

    // Return widget title in Elementor
    public function get_title() {
        return __('Custom Elementor Widget', 'plugin-name');
    }

    // Return widget icon
    public function get_icon() {
        return 'eicon-code';
    }

    // Return widget category
    public function get_categories() {
        return ['basic'];
    }

    // Register widget controls (optional)
    protected function _register_controls() {
        // Add controls here if needed
    }

    // Render the widget's content
    protected function render() {
        // Get the current post ID (if on a single job page)
        $current_post_id = is_single() ? get_the_ID() : null;
        $current_work_nature = $current_post_id ? get_field('work_nature', $current_post_id) : [];

        // Prepare to fetch job postings of type 'job_posting'
        $args = array(
            'post_type'      => 'job_posting',
            'posts_per_page' => 100, // Set the number of job postings to show
            'post_status'    => 'publish',
            'post__not_in'   => $current_post_id ? array($current_post_id) : array(),
        );

        // Add meta query only if $current_work_nature is not empty
        if (!empty($current_work_nature)) {
            $args['meta_query'] = array(
                'relation' => 'OR', // Ensures that any match with `work_nature` displays the post
            );

            foreach ($current_work_nature as $nature) {
                $args['meta_query'][] = array(
                    'key'     => 'work_nature', // Assuming 'work_nature' is the ACF field
                    'value'   => $nature,
                    'compare' => 'LIKE', // This checks for any match in the work_nature field
                );
            }
        }

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo '<div class="job-cards-container">';
            while ($query->have_posts()) {
                $query->the_post();
                
                // Fetch custom fields (ACF fields)
                $job_role = get_field('job_role');
                $location = get_field('location'); // Assuming 'location' is a custom field
                $experience = get_field('experience');
                $description = get_field('description');
                $work_nature = get_field('work_nature');
                
                // Fetch job tags and check for errors
                $job_tags = get_the_terms(get_the_ID(), 'job_tags');
                
                // Check if $job_tags is not a WP_Error and is an array
                if (!is_wp_error($job_tags) && !empty($job_tags)) {
                    // Get the first tag slug to pass in the URL
                    $tag_slug = $job_tags[0]->slug;
                } else {
                    // Handle the case where there are no tags or an error occurred
                    $tag_slug = '';
                }

                ?>
                <div class="job-card">
                    <h3 class="job-title"><?php echo esc_html($job_role); ?></h3>
                    <div class="job-info">
                        <p class="location"><?php echo esc_html($location); ?></p>
                        <span class="experience-badge"><?php echo esc_html($experience); ?></span>
                    </div>
                    <p class="job-description"><?php echo esc_html(wp_trim_words($description, 25, '...')); ?></p>
                    <div class="job-tags">
                        <?php
                        if (!empty($work_nature)) {
                            foreach ($work_nature as $nature) {
                                echo '<span class="job-tag">' . esc_html($nature) . '</span>';
                            }
                        } else {
                            echo '<span class="job-tag">N/A</span>';
                        }
                        ?>
                    </div>
                    <!-- Pass the tag slug in the URL -->
                    <a href="<?php echo esc_url(get_permalink()) . '?job_tag=' . esc_attr($tag_slug); ?>" class="details-link">View Details ➔</a>
                </div>
                <?php
            }
            echo '</div>';
            wp_reset_postdata();
        } else {
            echo '<p>No job postings available at this time.</p>';
        }
    }

    // Render widget content for Elementor's live preview
    protected function _content_template() {
        ?>
        <# if (settings.job_role) { #>
        <div class="job-card">
            <h3 class="job-title">{{{ settings.job_role }}}</h3>
            <div class="job-info">
                <p class="location">{{{ settings.location }}}</p>
                <span class="experience-badge">{{{ settings.experience }}}</span>
            </div>
            <p class="job-description">{{{ settings.description }}}</p>
            <div class="job-tags">
                <# if (settings.work_nature && settings.work_nature.length) { #>
                    <# _.each(settings.work_nature, function(nature) { #>
                        <span class="job-tag">{{{ nature }}}</span>
                    <# }); #>
                <# } else { #>
                    <span class="job-tag">N/A</span>
                <# } #>
            </div>
            <a href="#" class="details-link">View Details ➔</a>
        </div>
        <# } else { #>
        <p>No job postings available at this time.</p>
        <# } #>
        <?php
    }
}
?>
