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
class TP_Community extends Widget_Base
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
        return 'tp-community';
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
        return __('Community', 'tpcore');
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
            'community_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'community_general_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our work has brought together a community of', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'community_general_content_number',
            [
                'label' => esc_html__('Number', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('59,135,660', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your number here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'community_general_content_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Gamers from all over the world', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        // =============================Style================================//


        $this->start_controls_section(
             'c_number_style',
             [
                'label' => esc_html__('Number', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'c_number_style_typ',
                'selector' => '{{WRAPPER}} .main-content span',
        
            ]
        );
        
        $this->add_control(
            'c_number_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-content span' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'c_content_style',
             [
                'label' => esc_html__('Content', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'c_content_style_typ',
                'selector' => '{{WRAPPER}} .main-content p',
        
            ]
        );
        
        $this->add_control(
            'c_content_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'c_box_style',
             [
                'label' => esc_html__('Box', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_control(
            'spinnfdfer_color',
            [
                'label' => esc_html__( ' Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-gaming-community .main-content' => 'background: {{VALUE}}',
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




        <section class="our-gaming-community position-relative overflow-hidden pt-120 pb-120">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="main-content alt-bg d-flex flex-column justify-content-center align-items-center text-center">
                        <?php if (!empty($settings['community_general_content_subtitle'])) :   ?>
                            <p class="fs-four"><?php echo esc_html($settings['community_general_content_subtitle']) ?></p>
                        <?php endif ?>
                        <?php if (!empty($settings['community_general_content_number'])) :   ?>
                            <span class="display-two pt-4 pb-6"><?php echo esc_html($settings['community_general_content_number']) ?></span>
                        <?php endif ?>
                        <?php if (!empty($settings['community_general_content_title'])) :   ?>
                            <p class="fs-four"><?php echo esc_html($settings['community_general_content_title']) ?></p>
                        <?php endif ?>
                    </div>
                </div>

            </div>
        </section>














<?php
    }
}

$widgets_manager->register(new TP_Community());
