<?php 

function register_instagram_widget() {
    register_widget('Instagram_Widget');
}
add_action('widgets_init', 'register_instagram_widget');



class Instagram_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'instagram_widget',
            'Gamestorm Instagram Widget',
            array(
                'description' => 'Display Instagram posts.',
            )
        );
    }

    public function widget($args, $instance) {
        // Widget output
        echo $args['before_widget'];
        echo '<div class="instagram-post mt-10">';
        echo '<h5 class="mb-5">Instagram post</h5>';
        echo '<ul class="d-flex gap-2">';
        for ($i = 1; $i <= 3; $i++) {
            $image_url = esc_url($instance['instagram_image_' . $i]);
            echo '<li>';
            echo '<a href="' . esc_url($instance['instagram_link_' . $i]) . '"><img src="' . $image_url . '" alt="img"></a>';
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
        echo $args['after_widget'];
    }

    public function form($instance) {
        // Widget form
        for ($i = 1; $i <= 3; $i++) {
            $image_key = 'instagram_image_' . $i;
            $link_key = 'instagram_link_' . $i;
            $image_value = isset($instance[$image_key]) ? esc_attr($instance[$image_key]) : '';
            $link_value = isset($instance[$link_key]) ? esc_url($instance[$link_key]) : '';
            echo '<p>';
            echo '<label for="' . $this->get_field_id($image_key) . '">Image ' . $i . ': </label>';
            echo '<input class="widefat" id="' . $this->get_field_id($image_key) . '" name="' . $this->get_field_name($image_key) . '" type="text" value="' . $image_value . '" />';
            echo '</p>';
            echo '<p>';
            echo '<label for="' . $this->get_field_id($link_key) . '">Link ' . $i . ': </label>';
            echo '<input class="widefat" id="' . $this->get_field_id($link_key) . '" name="' . $this->get_field_name($link_key) . '" type="text" value="' . $link_value . '" />';
            echo '</p>';
        }
    }
    

    public function update($new_instance, $old_instance) {
        // Save widget settings
        $instance = $old_instance;
        for ($i = 1; $i <= 3; $i++) {
            $image_key = 'instagram_image_' . $i;
            $link_key = 'instagram_link_' . $i;
            $instance[$image_key] = strip_tags($new_instance[$image_key]);
            $instance[$link_key] = esc_url($new_instance[$link_key]);
        }
        return $instance;
    }
}
