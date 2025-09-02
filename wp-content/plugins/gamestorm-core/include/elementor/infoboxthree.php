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
class TP_infothree extends Widget_Base
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
        return 'tp-infothree';
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
        return __('Info Box Three', 'tpcore');
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
            'infobox_heading',
            [
                'label' => esc_html__('Heading', 'gamestorm-core'),
            ]
        );


        $this->add_control(
            'gamestorm_heading_one_content_one_subtitle',
            [
                'label' => esc_html__('Subtitle', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default subtitle', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gamestorm_heading_one_content_one_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gamestorm_heading_one_content_one_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'infobox_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core'),
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_icon',
            [
                'label' => esc_html__('Icon', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
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
                'show_label' => false,
            ]
        );

        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Info List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Customized Game Development', 'gamestorm-core'),
                        'list_content' => esc_html__('We make customized games to fit your budget,requirements, with a skilled team that tailors the development process to your goals and scope.', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Experienced Game Developers', 'gamestorm-core'),
                        'list_content' => esc_html__('TWe have a dedicated team of developers specialized in Game creation to help you design and implement your idea to stand out.', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Best Security Practices', 'gamestorm-core'),
                        'list_content' => esc_html__('We ensure the security of servers and player data in game development, providing full updating systems with the latest innovations.', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Flexible Scaling Capabilities', 'gamestorm-core'),
                        'list_content' => esc_html__('We expand our team to meet deadlines & have 10,000+ specialized developers for successful project implementation.', 'gamestorm-core'),
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






        <section class="our-game-features fundamental-benefits pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-text text-center">
                            <?php if (!empty($settings['gamestorm_heading_one_content_one_subtitle'])) :   ?>
                                <h4 class="sub-title"><?php echo wp_kses($settings['gamestorm_heading_one_content_one_subtitle'], wp_kses_allowed_html('post'))  ?></h4>
                            <?php endif ?>
                            <?php if (!empty($settings['gamestorm_heading_one_content_one_title'])) :   ?>
                                <span class="fs-two heading mb-6"><?php echo wp_kses($settings['gamestorm_heading_one_content_one_title'], wp_kses_allowed_html('post'))  ?></span>
                            <?php endif ?>
                            <?php if (!empty($settings['gamestorm_heading_one_content_one_description'])) :   ?>
                                <p><?php echo wp_kses($settings['gamestorm_heading_one_content_one_description'], wp_kses_allowed_html('post'))  ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="row cus-mar">
                    <?php foreach ($settings['list_repeater'] as $item) : ?>
                        <div class="col-xxl-3 col-sm-6">
                            <div class="single-box flex-wrap box-style box-first py-5 py-sm-10 px-4 px-sm-8 d-center justify-content-between">
                                <div class="content-box d-grid gap-4 gap-md-6">
                                    <?php if (!empty($item['list_icon'])) :   ?>
                                        <div class="icon-box d-inline-flex d-center">
                                            <?php \Elementor\Icons_Manager::render_icon($item['list_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif ?>
                                    <div class="info-box">
                                        <?php if (!empty($item['list_title'])) :   ?>
                                            <h4 class="mb-4"><?php echo esc_html($item['list_title']) ?></h4>
                                        <?php endif ?>
                                        <?php if (!empty($item['list_content'])) :   ?>
                                            <p><?php echo esc_html($item['list_content']) ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>












<?php
    }
}

$widgets_manager->register(new TP_infothree());
