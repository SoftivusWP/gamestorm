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
class TP_Social extends Widget_Base
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
        return 'tp-social';
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
        return __('Social', 'tpcore');
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
            'social_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
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
                'default' => esc_html__('Facebook', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_link',
            [
                'label' => esc_html__('Link', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gamestorm-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Social List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Facebook', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Instagram', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Linkedin', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Twitter', 'gamestorm-core'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );



        $this->end_controls_section();

        // ==================================Style=================================//

        $this->start_controls_section(
             'social_style',
             [
                'label' => esc_html__('Content', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'social_style_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.d-center.gap-2 svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_stylete_color',
            [
                'label' => esc_html__( 'Title Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.d-center.gap-2 span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_styleba_color',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-style.box-second' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_stylebafdf_color',
            [
                'label' => esc_html__( 'Hover Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-style.box-second:hover:before' => 'background-color: {{VALUE}}',
                ],
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

        <footer class="footer-section">
            <div class="container-fluid">
                <div class="social-items">
                    <ul class="d-flex justify-content-around">
                        <?php foreach ($settings['list_repeater'] as $item) : ?>
                            <li class="box-style box-second justify-content-center">
                                <?php if (!empty($item['list_title'])) :   ?>
                                    <a href="<?php echo esc_url($item['list_link']['url']) ?>" class="d-center gap-2">
                                        <?php if (!empty($item['list_icon'])) :   ?>
                                            <?php \Elementor\Icons_Manager::render_icon($item['list_icon'], ['aria-hidden' => 'true']); ?>
                                        <?php endif ?>
                                        <span><?php echo esc_html($item['list_title']) ?></span>
                                    </a>
                                <?php endif ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </footer>

<?php
    }
}

$widgets_manager->register(new TP_Social());
