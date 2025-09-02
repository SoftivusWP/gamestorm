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
class TP_Hero_Banner extends Widget_Base
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
        return 'hero-banner';
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
        return __('Hero Banner', 'tpcore');
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

        // layout Panel
        $this->start_controls_section(
            'tp_layout',
            [
                'label' => esc_html__('Design Layout', 'tpcore'),
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => esc_html__('Select Layout', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'tpcore'),
                    'layout-2' => esc_html__('Layout 2', 'tpcore'),
                    'layout-3' => esc_html__('Layout 3', 'tpcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'banner_one_left_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core'),
            ]
        );


        $this->add_control(
            'banner_one_left_subtitle',
            [
                'label' => esc_html__('Subtitle', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Building Gaming Worlds', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'banner_one_left_titleone',
            [
                'label' => esc_html__('Title One', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('We Craft Games', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'typed_strings',
            [
                'label' => esc_html__('Title Two', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Entertainment', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_one_left_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Developing games that are imaginative, fun and bringing colors to the gaming world', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'online_title',
            [
                'label' => esc_html__('Text One', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Online', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
                'condition' => [
                    'design_style' => 'layout-3'
                ]
            ]
        );
        $this->add_control(
            'online_number',
            [
                'label' => esc_html__('Number One', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('19,302,927', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your number here', 'gamestorm-core'),
                'label_block' => true,
                'condition' => [
                    'design_style' => 'layout-3'
                ]
            ]
        );
        $this->add_control(
            'online_two_title',
            [
                'label' => esc_html__('Text Two', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Playing Now', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
                'condition' => [
                    'design_style' => 'layout-3'
                ]
            ]
        );
        $this->add_control(
            'online_number_two',
            [
                'label' => esc_html__('Number Two', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('4,831,224', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your number here', 'gamestorm-core'),
                'label_block' => true,
                'condition' => [
                    'design_style' => 'layout-3'
                ]
            ]
        );









        $this->add_control(
            'banner_one_text_btn_text',
            [
                'label' => esc_html__('Button Text', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore Our Games', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'banner_one_left_website_link',
            [
                'label' => esc_html__('Button Link', 'gamestorm-core'),
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
            'right_image',
            [
                'label' => esc_html__('Choose Image (Right)', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'design_style' => 'layout-3'
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'explore_general_content',
            [
                'label' => esc_html__('Explore', 'gamestorm-core'),
                'condition' => [
                    'design_style' => 'layout-2'
                ]
            ]
        );


        $this->add_control(
            'explore_general_content_one_title',
            [
                'label' => esc_html__('Text One', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('EXPLORE OUR GAMES', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'website_link_explore_one',
            [
                'label' => esc_html__('Link One', 'gamestorm-core'),
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
            'explore_general_content_two_title',
            [
                'label' => esc_html__('Text Two', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('INQUERY', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'website_link_two_explore',
            [
                'label' => esc_html__('Link Two', 'gamestorm-core'),
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


        $this->end_controls_section();


        $this->start_controls_section(
            'banner_one_card_content',
            [
                'label' => esc_html__('Card', 'gamestorm-core'),
                'condition' => [
                    'design_style' => 'layout-1'
                ]

            ]
        );

        $this->add_control(
            'card_one_show',
            [
                'label' => esc_html__('Show Card?', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'gamestorm-core'),
                'label_off' => esc_html__('Hide', 'gamestorm-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'card_tag_title',
            [
                'label' => esc_html__('Tag', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Featured Games', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your feature title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'card_game_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'card_game_title',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Crazy Wild', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your game name here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'apple_store_image',
            [
                'label' => esc_html__('Choose Image (Apple Store)', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'apple_website_link',
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

        $repeater->add_control(
            'google_store_image',
            [
                'label' => esc_html__('Choose Image (Play Store)', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'google_website_link',
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
                'label' => esc_html__('Feature Games List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'banner_one_reborn_content',
            [
                'label' => esc_html__('Reborn', 'gamestorm-core'),
            ]
        );

        $this->add_control(
            'one_reborn_show',
            [
                'label' => esc_html__('Show Reborn?', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'gamestorm-core'),
                'label_off' => esc_html__('Hide', 'gamestorm-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->end_controls_section();


        // =================================Style One====================================//

        $this->start_controls_section(
             'banner_one_subtitile_style',
             [
                'label' => esc_html__('Subtitile', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'banner_one_subtitile_style_typ',
                'selector' => '{{WRAPPER}} h3.visible-slowly-bottom.sub-title span',
        
            ]
        );
        
        $this->add_control(
            'banner_one_subtitile_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h3.visible-slowly-bottom.sub-title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'banner_one_subtitile_style_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} h3.visible-slowly-bottom.sub-title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'banner_one_subtitile_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} h3.visible-slowly-bottom.sub-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'banner_one_titile_style',
             [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'banner_one_titile_style_typ',
                'selector' => '{{WRAPPER}} span.display-one',
        
            ]
        );
        
        $this->add_control(
            'banner_one_titile_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} span.display-one' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'banner_one_titile_style_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} span.display-one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'banner_one_titile_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} span.display-one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'banner_one_fill_style',
             [
                'label' => esc_html__('Fill Text', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'banner_one_fill_style_typ',
                'selector' => '{{WRAPPER}} span.display-one span',
        
            ]
        );
        
        $this->add_control(
            'banner_one_fill_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} span.display-one span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'banner_one_fill_style_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} span.display-one span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'banner_one_fill_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} span.display-one span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'banner_one_des_style',
             [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'banner_one_des_style_typ',
                'selector' => '{{WRAPPER}} p.fs-four',
        
            ]
        );
        
        $this->add_control(
            'banner_one_des_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p.fs-four' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'banner_one_des_style_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} p.fs-four' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'banner_one_des_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} p.fs-four' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'banner_one_btn_style',
             [
                'label' => esc_html__('Button', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );

        $this->add_control(
            'banner_one_btn_style_color',
            [
                'label' => esc_html__( 'Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.box-style.btn-box.d-center' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'banner_one_btn_style_bcolor',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.box-style.btn-box.d-center' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'banner_one_btn_stylehh_color',
            [
                'label' => esc_html__( 'Hover Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-style.btn-box:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'banner_one_btn_stylehhb_color',
            [
                'label' => esc_html__( 'Hover Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-style.btn-box:hover:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'bannertwo_style',
             [
                'label' => esc_html__('Link', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => 'layout-2'
                ]
             ]
        );

        $this->add_control(
            'more_options',
            [
                'label' => esc_html__( 'Link One', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'spinnefsdffr_color',
            [
                'label' => esc_html__( 'Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section.index-two .btn-item a span' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'spifdsfnner_color',
            [
                'label' => esc_html__( 'Hover Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section.index-two .btn-item a:hover span' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'bannertwo_style_one_bac_color',
            [
                'label' => esc_html__( 'Background', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section.index-two .btn-item a.ccc::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bannertwo_style_hober_bac_color',
            [
                'label' => esc_html__( 'Hover Background', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section.index-two .btn-item a::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );





        $this->add_control(
            'more_optfions',
            [
                'label' => esc_html__( 'Link Two', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );




        $this->add_control(
            'spinnefdfsdffr_color',
            [
                'label' => esc_html__( 'Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section.index-two .btn-item a.second span' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'spifdfdsfnner_color',
            [
                'label' => esc_html__( 'Hover Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section.index-two .btn-item a.second:hover span' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'bannefrtwo_style_one_bac_color',
            [
                'label' => esc_html__( 'Background', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section.index-two .btn-item a.second::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'banndfertwo_style_hober_bac_color',
            [
                'label' => esc_html__( 'Hover Background', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section.index-two .btn-item a.second::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        
        
        
        
        
        $this->end_controls_section();



        $this->start_controls_section(
             'banner_three_play_style',
             [
                'label' => esc_html__('Play Content', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => 'layout-3'
                ]
             ]
        );
        

        
        $this->add_control(
            'play_subtitle_color',
            [
                'label'     => esc_html__('Title Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .active-now span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'play_content_color',
            [
                'label'     => esc_html__('Number Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .active-now h2' => 'color: {{VALUE}};',
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

        <script>
            jQuery(document).ready(function($) {
            jQuery(".game-carousel").not('.slick-initialized').slick({
                infinite: true,
                autoplay: true,
                centerMode: false,
                centerPadding: "0px 50px",
                focusOnSelect: false,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                prevArrow: "<button type='button' aria-label='Slide Prev' class='arafat-prev box-style pull-left'><i class=\"material-symbols-outlined mat-icon\"  aria-hidden='true'>arrow_right_alt</i> <span class='bg-obj'></span> </button>",
                nextArrow: "<button type='button' aria-label='Slide Next' class='arafat-next box-style pull-right'><i class=\"material-symbols-outlined mat-icon\"  aria-hidden='true'>arrow_right_alt</i> <span class='bg-obj'></span> </button>",
                dots: false,
                dotsClass: 'section-dots',
                customPaging: function(slider, i) {
                    var slideNumber = (i + 1),
                        totalSlides = slider.slideCount;
                    return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
                },
            });
        });
        </script>

        <?php if ($settings['design_style'] == 'layout-1') : ?>

            <section class="banner-section index-one overflow-hidden">
                <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                    <div class="shape-area">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/planet.png" class="shape-1" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/console-1.png" class="shape-2" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/console-2.png" class="shape-3" alt="icon">
                    </div>
                    <div class="ellipse-area ellipse-one position-absolute">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-6.png" class="ellipse-1" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-4.png" class="ellipse-2" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-5.png" class="ellipse-3" alt="icon">
                    </div>
                    <div class="ellipse-area ellipse-two position-absolute">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-6.png" class="ellipse-1" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-3.png" class="ellipse-3" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-4.png" class="ellipse-4" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-1.png" class="ellipse-2" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-5.png" class="ellipse-5" alt="icon">
                    </div>
                    <div class="ellipse-area ellipse-three position-absolute">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-6.png" class="ellipse-1" alt="icon">
                    </div>
                    <div class="ellipse-area ellipse-four position-absolute">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-6.png" class="ellipse-1" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-3.png" class="ellipse-2" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-2.png" class="ellipse-3" alt="icon">
                    </div>
                <?php endif ?>
                <div class="overlay overflow-hidden">
                    <div class="banner-content position-relative">
                        <div class="container">
                            <div class="row justify-content-between justify-content-center align-items-center">
                                <div class="col-xl-7 col-lg-7">
                                    <div class="main-content">
                                        <div class="mb-8">
                                            <?php if (!empty($settings['banner_one_left_subtitle'])) :   ?>
                                                <h3 class="visible-slowly-bottom sub-title"><span><?php echo esc_html($settings['banner_one_left_subtitle']) ?></span></h3>
                                            <?php endif ?>
                                            <?php if (!empty($settings['banner_one_left_titleone'])) :   ?>
                                                <span class="display-one"><?php echo esc_html($settings['banner_one_left_titleone']) ?>
                                                <?php endif ?>
                                                <br>
                                                <?php if (!empty($settings['typed_strings'])) :   ?>
                                                    <span class=" d-inline-block"><?php echo esc_html($settings['typed_strings']) ?></span>
                                                <?php endif ?>
                                                </span>
                                                <?php if (!empty($settings['banner_one_left_description'])) :   ?>
                                                    <p class="fs-four"><?php echo esc_html($settings['banner_one_left_description']) ?></p>
                                                <?php endif ?>
                                        </div>
                                        <div class="btn-area alt-bg">
                                            <?php if (!empty($settings['banner_one_text_btn_text'])) :   ?>
                                                <a href="<?php echo esc_url($settings['banner_one_left_website_link']['url']) ?>" class="box-style btn-box d-center">
                                                    <?php echo esc_html($settings['banner_one_text_btn_text']) ?>
                                                </a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5 col-md-7 col-sm-9 mt-10 mt-lg-0 col-10">
                                    <?php if (!empty($settings['card_one_show'] == 'yes')) :   ?>
                                        <div class="game-carousel pb-20">
                                            <?php foreach ($settings['list_repeater'] as $item) : ?>
                                                <div class="slide-area">
                                                    <?php if (!empty($item['card_tag_title'])) :   ?>
                                                        <div class="top-area d-flex justify-content-end gap-4 mb-5 align-items-end">
                                                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/icon/top-bottom.png" alt="<?php echo esc_attr('image') ?>">
                                                            <h4 class="mb-1"><?php echo esc_html($item['card_tag_title']) ?></h4>
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="single-slider p-3 p-sm-5">
                                                        <div class="thumb-wrapper">
                                                            <?php if (!empty($item['card_game_image']['url'])) :   ?>
                                                                <div class="thumb">
                                                                    <img src="<?php echo esc_url($item['card_game_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                                </div>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['card_game_title'])) :   ?>
                                                                <div class="app-download-title pt-5 pb-3 text-center">
                                                                    <h3><?php echo esc_html($item['card_game_title']) ?></h3>
                                                                </div>
                                                            <?php endif ?>
                                                            <div class="app-download d-flex gap-5 align-items-center">
                                                                <?php if (!empty($item['apple_store_image']['url'])) :   ?>
                                                                    <a href="<?php echo esc_url($item['apple_website_link']['url']) ?>">
                                                                        <img src="<?php echo esc_url($item['apple_store_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                                    </a>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['google_store_image']['url'])) :   ?>
                                                                    <a href="<?php echo esc_url($item['google_website_link']['url']) ?>">
                                                                        <img src="<?php echo esc_url($item['google_store_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                                    </a>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>


        <?php if ($settings['design_style'] == 'layout-2') : ?>

            <section class="banner-section index-two overflow-hidden">
                <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                    <div class="shape-area">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/bubble.png" class="shape-1" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-7.png" class="shape-2" alt="icon">
                    </div>
                <?php endif ?>
                <div class="overlay overflow-hidden">
                    <div class="banner-content position-relative">
                        <div class="box-items d-inline-flex flex-wrap position-absolute">
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-50"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item active-item opacity-25"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                            <div class="single-item"></div>
                        </div>
                        <div class="container position-relative cus-z1">
                            <div class="row justify-content-between justify-content-center align-items-center">
                                <div class="col-xl-6 col-lg-7">
                                    <div class="main-content">
                                        <div class="mb-8">
                                            <?php if (!empty($settings['banner_one_left_subtitle'])) :   ?>
                                                <h3 class="visible-slowly-bottom sub-title"><span><?php echo esc_html($settings['banner_one_left_subtitle']) ?></span></h3>
                                            <?php endif ?>

                                            <span class="display-one">
                                                <?php if (!empty($settings['banner_one_left_titleone'])) :   ?>
                                                    <?php echo esc_html($settings['banner_one_left_titleone']) ?>
                                                <?php endif ?>
                                                <span>
                                                    <?php if (!empty($settings['typed_strings'])) :   ?>
                                                        <?php echo esc_html($settings['typed_strings']) ?>
                                                    <?php endif ?>
                                                </span></span>
                                            <?php if (!empty($settings['banner_one_left_description'])) :   ?>
                                                <p class="fs-four"><?php echo esc_html($settings['banner_one_left_description']) ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="btn-area alt-bg">
                                            <?php if (!empty($settings['banner_one_text_btn_text'])) :   ?>
                                                <a href="<?php echo esc_url($settings['banner_one_left_website_link']['url']) ?>" class="box-style btn-box d-center">
                                                    <?php echo esc_html($settings['banner_one_text_btn_text']) ?>
                                                </a>
                                            <?php endif ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-20">
                                <div class="col-md-6 order-1 order-md-0">
                                    <?php if (!empty($settings['explore_general_content_one_title'])) :   ?>
                                        <div class="btn-item">
                                            <a href="<?php echo esc_url($settings['website_link_explore_one']['url']) ?>" class="d-center py-14 position-relative ccc">
                                                <span class="d-center w-100">
                                                    <?php echo esc_html($settings['explore_general_content_one_title']) ?>
                                                    <i class="material-symbols-outlined position-absolute"> <?php echo esc_html('straight')?> </i>
                                                </span>
                                            </a>
                                        </div>
                                    <?php endif ?>

                                </div>
                                <div class="col-md-6">
                                    <div class="btn-item">
                                        <?php if (!empty($settings['explore_general_content_two_title'])) :   ?>
                                            <a href="<?php echo esc_url($settings['website_link_two_explore']['url']) ?>" class="d-center second py-14 position-relative">
                                                <span class="d-center w-100">
                                                    <?php echo esc_html($settings['explore_general_content_two_title']) ?>
                                                    <i class="material-symbols-outlined position-absolute"> <?php echo esc_html('straight')?> </i>
                                                </span>
                                            </a>
                                        <?php endif ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>






        <?php if ($settings['design_style'] == 'layout-3') : ?>
            <section class="banner-section index-two index-three overflow-hidden">
                <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                    <div class="shape-areas d-none d-lg-block">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-9.png" class="shape-1" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-10.png" class="shape-2" alt="icon">
                    </div>
                <?php endif ?>

                <div class="overlay overflow-hidden">
                    <div class="banner-content position-relative cus-z1">
                        <div class="container">
                            <div class="row justify-content-between justify-content-center align-items-center">
                                <div class="col-xl-6 col-lg-7">
                                    <div class="main-content">
                                        <div class="section-text">
                                            <h3 class="visible-slowly-bottom sub-title"><span><?php echo esc_html($settings['banner_one_left_subtitle']) ?></span></h3>
                                            <span class="display-one"><?php echo esc_html($settings['banner_one_left_titleone']) ?><span><?php echo esc_html($settings['typed_strings']) ?></span></span>
                                            <p class="fs-four"><?php echo esc_html($settings['banner_one_left_description']) ?></p>
                                        </div>
                                        <div class="playing-now d-flex flex-wrap gap-6 gap-sm-10">
                                            <div class="active-now online">
                                                <?php if (!empty($settings['online_title'])) :   ?>
                                                    <span><?php echo esc_html($settings['online_title']) ?></span>
                                                <?php endif ?>
                                                <?php if (!empty($settings['online_number'])) :   ?>
                                                    <h2><?php echo esc_html($settings['online_number']) ?></h2>
                                                <?php endif ?>
                                            </div>
                                            <div class="active-now now">
                                                <?php if (!empty($settings['online_two_title'])) :   ?>
                                                    <span><?php echo esc_html($settings['online_two_title']) ?></span>
                                                <?php endif ?>
                                                <?php if (!empty($settings['online_number_two'])) :   ?>
                                                    <h2><?php echo esc_html($settings['online_number_two']) ?></h2>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="btn-area mt-10 alt-bg">
                                            <?php if (!empty($settings['banner_one_text_btn_text'])) :   ?>
                                                <a href="<?php echo esc_url($settings['banner_one_left_website_link']['url']) ?>" class="box-style btn-box d-center">
                                                    <?php echo esc_html($settings['banner_one_text_btn_text']) ?>
                                                </a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <?php if (!empty($settings['right_image']['url'])) :   ?>
                                        <div class="sec-image">
                                            <img src="<?php echo esc_url($settings['right_image']['url']) ?>" class="position-absolute bottom-0 end-0" alt="<?php echo esc_attr('image') ?>">
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>


<?php

    }
}

$widgets_manager->register(new TP_Hero_Banner());
