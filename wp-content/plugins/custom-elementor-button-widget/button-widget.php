<?php
class Button_Widget extends \Elementor\Widget_Base {

    // Widget Name
    public function get_name() {
        return 'custom_button';
    }

    // Widget Title
    public function get_title() {
        return __('Custom Button', 'custom-elementor-button-widget');
    }

    // Widget Icon
    public function get_icon() {
        return 'eicon-button';
    }

    // Categories
    public function get_categories() {
        return ['basic']; // Adjust category as needed
    }

    // Register Controls
    protected function _register_controls() {
        $this->start_controls_section(
            'button_section',
            [
                'label' => __('Button Settings', 'custom-elementor-button-widget'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'custom-elementor-button-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Apply Now', 'custom-elementor-button-widget'),
            ]
        );

        $this->add_control(
            'button_size',
            [
                'label' => __('Button Size', 'custom-elementor-button-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'small' => __('Small', 'custom-elementor-button-widget'),
                    'medium' => __('Medium', 'custom-elementor-button-widget'),
                    'large' => __('Large', 'custom-elementor-button-widget'),
                ],
                'default' => 'medium',
            ]
        );
        

        $this->end_controls_section();
    }

    // Render Widget Output
    protected function render() {
        $settings = $this->get_settings_for_display();

        $button_text = $settings['button_text'];
        $button_size = $settings['button_size'];

        $size_class = 'btn-' . $button_size; // Add size class for styling

        // Modal ID for the Bootstrap modal
        $modal_id = 'applyJobModal';

        // Button Markup
        echo '<button type="button" class="btn ' . esc_attr($size_class) . '" data-toggle="modal" data-target="#' . esc_attr($modal_id) . '">'
            . esc_html($button_text) . '</button>';

        // Modal Markup
        echo '<div class="modal fade" id="' . esc_attr($modal_id) . '" tabindex="-1" role="dialog" aria-labelledby="' . esc_attr($modal_id) . 'Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="' . esc_attr($modal_id) . 'Label">Join with us</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                            <!-- Contact Form 7 Shortcode -->
                            ' . do_shortcode('[contact-form-7 id="9ac7a2c" title="Popup"]') . '
                        </div>
                    </div>
                </div>
            </div>';
    }
}
