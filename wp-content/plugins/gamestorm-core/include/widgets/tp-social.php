<?php

class Custom_Social_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'custom_social_widget',
            'Gamestorm Social Widget',
            array('description' => 'Display social media links.')
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'] . esc_html('Follow Us') . $args['after_title'];
        echo '<ul class="d-flex gap-4 social-area">';
        $social_links = array(
            'facebook-f' => 'https://www.facebook.com',
            'instagram' => 'https://www.instagram.com',
            'linkedin-in' => 'https://www.linkedin.com',
            'twitter' => 'https://twitter.com',
        );
        foreach ($social_links as $icon => $link) {
            if (!empty($instance[$icon])) {
                echo '<li>';
                echo '<a href="' . esc_url($link) . '" aria-label="' . ucfirst($icon) . '" class="d-center">';
                echo '<i class="fab fa-' . $icon . '"></i>';
                echo '</a>';
                echo '</li>';
            }
        }
        echo '</ul>';
        echo $args['after_widget'];
    }

    public function form($instance) {
        $networks = array('facebook-f', 'instagram', 'linkedin-in', 'twitter');
        foreach ($networks as $network) {
            $field_id = $this->get_field_id($network);
            $field_name = $this->get_field_name($network);
            $field_value = !empty($instance[$network]) ? $instance[$network] : '';
            echo '<p>';
            echo '<label for="' . $field_id . '">' . ucfirst($network) . ' URL:</label>';
            echo '<input class="widefat" type="text" id="' . $field_id . '" name="' . $field_name . '" value="' . esc_url($field_value) . '">';
            echo '</p>';
        }
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $networks = array('facebook-f', 'instagram', 'linkedin-in', 'twitter');
        foreach ($networks as $network) {
            $instance[$network] = !empty($new_instance[$network]) ? esc_url($new_instance[$network]) : '';
        }
        return $instance;
    }
}

function register_custom_social_widget() {
    register_widget('Custom_Social_Widget');
}
add_action('widgets_init', 'register_custom_social_widget');
