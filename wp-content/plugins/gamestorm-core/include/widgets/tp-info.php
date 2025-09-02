<?php 

class Custom_Studio_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'custom_studio_widget',
            'Gamestorm Info Custom Studio Widget',
            array('description' => 'Displays studio services and contact information.')
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo '<div class="sidebar-area py-8 py-sm-15 text-center p-5">';
        echo '<h5 class="mb-4">' . esc_html('Let’s Work Together') . '</h5>';
        echo '<h3 class="visible-slowly-bottom mb-8">' . esc_html('Game Studio Services Agency') . '</h3>';
        echo '<div class="btn-area alt-bg">';
        echo '<a href="' . esc_url($instance['contact_link']) . '" class="box-style btn-box" style="--x: 31px; --y: 10px;">';
        echo esc_html('Contact us');
        echo '<i class="material-symbols-outlined mat-icon fs-five">' . esc_html('chevron_right') . '</i>';
        echo '</a>';
        echo '</div>';
        echo '<a href="tel:' . esc_attr($instance['phone_number']) . '" class="d-center mt-8 call-number gap-2">';
        echo '<i class="material-symbols-outlined mat-icon fs-six">' . esc_html('call') . '</i>';
        echo esc_html($instance['phone_number']);
        echo '</a>';
        echo '</div>';
        echo $args['after_widget'];
    }
    

    public function form($instance) {
        $contact_link = !empty($instance['contact_link']) ? esc_url($instance['contact_link']) : '';
        $phone_number = !empty($instance['phone_number']) ? esc_html($instance['phone_number']) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('contact_link'); ?>"><?php echo esc_html__('Contact Link:','gamestorm')?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('contact_link'); ?>" name="<?php echo $this->get_field_name('contact_link'); ?>" value="<?php echo $contact_link; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('phone_number'); ?>"><?php echo esc_html__('Phone Number:','gamestorm')?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('phone_number'); ?>" name="<?php echo $this->get_field_name('phone_number'); ?>" value="<?php echo $phone_number; ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['contact_link'] = !empty($new_instance['contact_link']) ? esc_url($new_instance['contact_link']) : '';
        $instance['phone_number'] = !empty($new_instance['phone_number']) ? esc_html($new_instance['phone_number']) : '';
        return $instance;
    }
}

function register_custom_studio_widget() {
    register_widget('Custom_Studio_Widget');
}
add_action('widgets_init', 'register_custom_studio_widget');
