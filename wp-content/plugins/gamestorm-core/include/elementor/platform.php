<?php

namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Platform extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'tp-platform';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Key Platform', 'tpcore');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'tp-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['tpcore'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['tpcore'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'platform_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );


        $this->add_control(
            'key_plateform_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'plateform_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('We Develop Games For These Key Platforms', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'plateform_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Embracing game development on most popular platforms and reaching the attention of players with a wide variety of preferences is one of our main features.', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('List Content', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Faq List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('PC', 'gamestorm-core'),
                        'list_content' => esc_html__('Game development on all major console platforms: Xbox, Nintendo, PS4.', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Console', 'gamestorm-core'),
                        'list_content' => esc_html__('Game development on all major console platforms: Xbox, Nintendo, PS4.', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Mobile', 'gamestorm-core'),
                        'list_content' => esc_html__('Game development on all major console platforms: Xbox, Nintendo, PS4.', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('AR/VR', 'gamestorm-core'),
                        'list_content' => esc_html__('Game development on all major console platforms: Xbox, Nintendo, PS4.', 'gamestorm-core'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );



        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>


        <section class="faqs-section key-platforms">
            <div class="overlay pt-120 pb-120">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-5 order-1 order-lg-0">
                            <?php if (!empty($settings['key_plateform_image']['url'])) :   ?>
                                <div class="sec-img">
                                    <img src="<?php echo esc_url($settings['key_plateform_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="section-header">
                                <?php if (!empty($settings['plateform_title'])) :   ?>
                                    <span class="fs-two heading mb-6"><?php echo esc_html($settings['plateform_title']) ?></span>
                                <?php endif ?>
                                <?php if (!empty($settings['plateform_description'])) :   ?>
                                    <p><?php echo esc_html($settings['plateform_description']) ?></p>
                                <?php endif ?>
                            </div>
                            <div class="accordion" id="accordionKeys">
                                <?php foreach ($settings['list_repeater'] as $key => $item) : ?>
                                    <div class="accordion-item">
                                        <?php if (!empty($item['list_title'])) :   ?>
                                            <h5 class="accordion-header" id="headingKey<?php echo esc_html($key) ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKey<?php echo esc_html($key) ?>" aria-expanded="false" aria-controls="collapseKey<?php echo esc_html($key) ?>">
                                                    <?php echo esc_html($item['list_title']) ?>
                                                </button>
                                            </h5>
                                        <?php endif ?>
                                        <?php if (!empty($item['list_content'])) :   ?>
                                            <div id="collapseKey<?php echo esc_html($key) ?>" class="accordion-collapse collapse" aria-labelledby="headingKey<?php echo esc_html($key) ?>" data-bs-parent="#accordionKeys">
                                                <div class="accordion-body">
                                                    <p><?php echo esc_html($item['list_content']) ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php
    }
}

$widgets_manager->register(new TP_Platform());
