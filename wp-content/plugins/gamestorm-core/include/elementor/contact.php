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
class TP_Contact extends Widget_Base
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
        return 'tp-contact';
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
        return __('Contact', 'tpcore');
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


        //General Section
        $this->start_controls_section(
            'gamestorm_contact_section_genaral',
            [
                'label' => esc_html__('General', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'gamestorm_contact_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gamestorm-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'gamestorm-core'),
                    'style_two' => esc_html__('Style Two', 'gamestorm-core'),
                ],
                'default' => 'style_one',
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'gamestorm_contact_one_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_contact_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'gamestorm_contact_one_subtitle',
            [
                'label' => esc_html__('Subtitle', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Have Questions?', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gamestorm_contact_one_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Wed Love To Hear From You', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gamestorm_contact_one_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Please fill out the form and let us know about your concerns.We will try our best to provide optimized solutions.', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );
        $this->add_control(
            'gamestorm_contact_one_number',
            [
                'label' => esc_html__('Number', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+(2) 578 - 365 - 379', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your number here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gamestorm_contact_one_mail',
            [
                'label' => esc_html__('Email', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Hello@example.com', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your email here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gamestorm_contact_content_form_shortcode',
            [
                'label' => esc_html__('Contact Form Shortcode', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'placeholder' => esc_html__('Type your Shortcode here', 'gamestorm-core'),
            ]
        );


        $this->end_controls_section();


        // =============================Content Two======================================//

        $this->start_controls_section(
            'contact_two_section_heading',
            [
                'label' => esc_html__('Heading', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_contact_style_selection' => 'style_two'
                ]
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
            'contact_two_form',
            [
                'label' => esc_html__('Contact Form', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_contact_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'gamestorm_contact_content_form_two_shortcode',
            [
                'label' => esc_html__('Contact Form Shortcode', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'placeholder' => esc_html__('Type your Shortcode here', 'gamestorm-core'),
            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'contact_two_info',
            [
                'label' => esc_html__('Contact Info', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_contact_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'contact_two_info_heading',
            [
                'label' => esc_html__('Heading', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get In Touch', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your heading here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'more_options',
            [
                'label' => esc_html__('Number', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'contact_two_info_number_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Have Any Questions', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'contact_two_info_number_one',
            [
                'label' => esc_html__('Number One', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('(302) 555-0107', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'contact_two_info_number_two',
            [
                'label' => esc_html__('Number Two', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('(704) 555-0127', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );






        $this->add_control(
            'more_optionsf',
            [
                'label' => esc_html__('Address', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'address_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Contact Address', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your address title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'address_area',
            [
                'label' => esc_html__('Address Area', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Contact Address', 'gamestorm-core'),
                'placeholder' => esc_html__('Al. Brucknera Aleksandra 63, Wrocław 51-410', 'gamestorm-core'),
                'label_block' => true,
            ]
        );




        $this->add_control(
            'more_optffddions',
            [
                'label' => esc_html__('Opening Hour', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'open_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Opening Hours', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your address title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'open_content',
            [
                'label' => esc_html__('Opening Time', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Mon-Fri: 09: 00-18: 00 Sat-Sun: Weekend', 'gamestorm-core'),
                'placeholder' => esc_html__('Al. Brucknera Aleksandra 63, Wrocław 51-410', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'contact_two_social',
            [
                'label' => esc_html__('Social Info', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_contact_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'contact_fb_website_link',
            [
                'label' => esc_html__('Facebook Link', 'gamestorm-core'),
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
            'ins_website_link',
            [
                'label' => esc_html__('Instagram Link', 'gamestorm-core'),
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
            'link_website_link',
            [
                'label' => esc_html__('Linkedin Link', 'gamestorm-core'),
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
            'tw_website_link',
            [
                'label' => esc_html__('Twitter Link', 'gamestorm-core'),
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

        // ==========================Style==============================//

        $this->start_controls_section(
            'heading_style',
            [
               'label' => esc_html__('Heading', 'plugin-name'),
               'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
           'more_optfdions',
           [
               'label' => esc_html__( 'Subtitle', 'plugin-name' ),
               'type' => \Elementor\Controls_Manager::HEADING,
               'separator' => 'before',
           ]
        );
        
        $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'plugin-name'),
               'name'     => 'about_section_style_subtitle_typ',
               'selector' => '{{WRAPPER}} h4.sub-title',
        
           ]
        );
        
        $this->add_control(
           'about_section_style_subtitle_color',
           [
               'label'     => esc_html__('Color', 'plugin-name'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} h4.sub-title' => 'color: {{VALUE}};',
               ],
           ]
        );
        $this->add_control(
           'about_section_style_subtitle_color_fill',
           [
               'label'     => esc_html__('Fill Color', 'plugin-name'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} h4.sub-title span' => 'color: {{VALUE}};',
               ],
           ]
        );
        
        
        
        
        
        
        $this->add_control(
           'more_odfdffptions',
           [
               'label' => esc_html__( 'Title', 'plugin-name' ),
               'type' => \Elementor\Controls_Manager::HEADING,
               'separator' => 'before',
           ]
        );
        
        $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'plugin-name'),
               'name'     => 'about_section_style_title_typ',
               'selector' => '{{WRAPPER}} span.fs-two.heading.mb-6',
        
           ]
        );
        
        $this->add_control(
           'about_section_style_title_color',
           [
               'label'     => esc_html__('Color', 'plugin-name'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} span.fs-two.heading.mb-6' => 'color: {{VALUE}};',
                   '{{WRAPPER}} .heading' => 'color: {{VALUE}};',
               ],
           ]
        );
        
        $this->add_control(
           'about_section_style_title_color_fill',
           [
               'label'     => esc_html__('Fill Color', 'plugin-name'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} span.fs-two.heading.mb-6 span' => 'color: {{VALUE}} !important;',
                   '{{WRAPPER}} .heading span' => 'color: {{VALUE}} !important;',
               ],
           ]
        );
        $this->add_control(
           'more_opfftfdfions',
           [
               'label' => esc_html__( 'Description', 'plugin-name' ),
               'type' => \Elementor\Controls_Manager::HEADING,
               'separator' => 'before',
           ]
        );
        
        
        $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'plugin-name'),
               'name'     => 'about_section_style_des_typ',
               'selector' => '{{WRAPPER}} .section-text p',
               'selector' => '{{WRAPPER}} .com-title',
        
           ]
        );
        
        $this->add_control(
           'about_section_style_des_color',
           [
               'label'     => esc_html__('Color', 'plugin-name'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .section-text p' => 'color: {{VALUE}};',
                   '{{WRAPPER}} .section-header p' => 'color: {{VALUE}};',
                   '{{WRAPPER}} .com-title' => 'color: {{VALUE}};',
               ],
           ]
        );
        
        
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'subheading_style',
             [
                'label' => esc_html__('Subtitle', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gamestorm_contact_style_selection' => 'style_two'
                ]
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'subheading_style_typ',
                'selector' => '{{WRAPPER}} .contact-info.py-7.py-sm-10.px-4.px-sm-7 h3',
        
            ]
        );
        
        $this->add_control(
            'subheading_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-info.py-7.py-sm-10.px-4.px-sm-7 h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'contact_icon_style',
             [
                'label' => esc_html__('Icon', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'contact_icon_style_color',
            [
                'label' => esc_html__( 'Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-us .icon-box i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .contact-us .contact-info .single-info .icon-area' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'contact_icon_stylebac_color',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-us .icon-box' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'contact_title_style',
             [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'contact_title_style_typ',
                'selector' => '{{WRAPPER}} .contact-area span,.single-info.mb-sm-10.pb-sm-10 h4',
        
            ]
        );
        
        $this->add_control(
            'contact_title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-area span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .single-info.mb-sm-10.pb-sm-10 h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .contact-area span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .single-info.mb-sm-10.pb-sm-10 h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'contact_title_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-area span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .single-info.mb-sm-10.pb-sm-10 h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'contact_desc_style',
             [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'contact_desc_style_typ',
                'selector' => '{{WRAPPER}} .single-info.mb-sm-10.pb-sm-10 span',
        
            ]
        );
        
        $this->add_control(
            'contact_desc_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-info.mb-sm-10.pb-sm-10 span' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'contact_social_style',
             [
                'label' => esc_html__('Social', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gamestorm_contact_style_selection' => 'style_two'
                ]
             ]
        );
        
        
        $this->add_control(
            'contact_social_style_color',
            [
                'label' => esc_html__( 'Icon Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-area a i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'contact_social_styleh_color',
            [
                'label' => esc_html__( 'Icon Hover Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-area a:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'contact_social_stylebac_color',
            [
                'label' => esc_html__( 'Hover Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-area a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'spidffnner_color',
            [
                'label' => esc_html__( 'Box Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.p-6.p-sm-8.d-flex.justify-content-center.gap-4.social-area' => 'background: {{VALUE}}',
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

        <?php if ($settings['gamestorm_contact_style_selection'] == 'style_one') : ?>
            <section class="contact-us pb-120">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-5">
                            <div class="section-text">
                                <?php if (!empty($settings['gamestorm_contact_one_subtitle'])) :   ?>
                                    <h4 class="sub-title"><?php echo wp_kses($settings['gamestorm_contact_one_subtitle'], wp_kses_allowed_html('post'))  ?></h4>
                                <?php endif ?>
                                <?php if (!empty($settings['gamestorm_contact_one_title'])) :   ?>
                                    <span class="fs-two heading mb-6"><?php echo wp_kses($settings['gamestorm_contact_one_title'], wp_kses_allowed_html('post'))  ?></span>
                                <?php endif ?>
                                <?php if (!empty($settings['gamestorm_contact_one_description'])) :   ?>
                                    <p><?php echo wp_kses($settings['gamestorm_contact_one_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                            <div class="contact-area">
                                <div class="btn-area mt-10 d-grid gap-6 align-items-center">
                                    <?php if (!empty($settings['gamestorm_contact_one_number'])) :   ?>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="icon-box d-center">
                                                <i class="material-symbols-outlined mat-icon fs-five"> <?php echo esc_html('call') ?> </i>
                                            </div>
                                            <span><?php echo esc_html($settings['gamestorm_contact_one_number']) ?></span>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($settings['gamestorm_contact_one_mail'])) :   ?>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="icon-box d-center">
                                                <i class="material-symbols-outlined mat-icon fs-five"> <?php echo esc_html('mail') ?> </i>
                                            </div>
                                            <span><?php echo esc_html($settings['gamestorm_contact_one_mail']) ?></span>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 me-20 mt-7 mt-lg-0">
                            <?php if (!empty($settings['gamestorm_contact_content_form_shortcode'])) :   ?>
                                <?php echo do_shortcode($settings['gamestorm_contact_content_form_shortcode']) ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>



        <?php if ($settings['gamestorm_contact_style_selection'] == 'style_two') : ?>

            <section class="contact-us our-services-2 pt-120 pb-120">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-header text-center">
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

                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-7 col-lg-6">

                      

                            <?php if (!empty($settings['gamestorm_contact_content_form_two_shortcode'])) :   ?>
                                <?php echo do_shortcode($settings['gamestorm_contact_content_form_two_shortcode']) ?>
                            <?php endif ?>





                        </div>

                        <div class="col-xl-5 col-lg-6 mt-7 mt-lg-0">
                            <div class="contact-info py-7 py-sm-10 px-4 px-sm-7">
                                <?php if (!empty($settings['contact_two_info_heading'])) :   ?>
                                    <h3 class="visible-slowly-bottom mb-8 mb-sm-10"><?php echo esc_html($settings['contact_two_info_heading']) ?></h3>
                                <?php endif ?>
                                <div class="single-info  mb-sm-10  pb-sm-10">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <?php if (!empty($settings['contact_two_info_number_title'])) :   ?>
                                            <div class="icon-area">
                                                <i class="material-symbols-outlined mat-icon fs-five"> <?php echo esc_html('call') ?> </i>
                                            </div>
                                            <h4><?php echo esc_html($settings['contact_two_info_number_title']) ?></h4>
                                        <?php endif ?>

                                    </div>
                                    <div class="d-flex">
                                        <?php if (!empty($settings['contact_two_info_number_one'])) :   ?>
                                            <span class="me-5 pe-5"><?php echo esc_html($settings['contact_two_info_number_one']) ?></span>
                                        <?php endif ?>
                                        <?php if (!empty($settings['contact_two_info_number_two'])) :   ?>
                                            <span><?php echo esc_html($settings['contact_two_info_number_two']) ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="single-info  mb-sm-10  pb-sm-10">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <?php if (!empty($settings['address_title'])) :   ?>
                                            <div class="icon-area">
                                                <i class="material-symbols-outlined mat-icon fs-five"> <?php echo esc_html('location_on') ?> </i>
                                            </div>
                                            <h4><?php echo esc_html($settings['address_title']) ?></h4>
                                        <?php endif ?>
                                    </div>
                                    <div class="d-flex gap-10">
                                        <?php if (!empty($settings['address_area'])) :   ?>
                                            <span><?php echo esc_html($settings['address_area']) ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="single-info  mb-sm-10 pb-sm-10">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <?php if (!empty($settings['open_title'])) :   ?>
                                            <div class="icon-area">
                                                <i class="material-symbols-outlined mat-icon fs-five"> <?php echo esc_html('schedule') ?> </i>
                                            </div>
                                            <h4><?php echo esc_html($settings['open_title']) ?></h4>
                                        <?php endif ?>
                                    </div>
                                    <div class="d-flex gap-10">
                                        <?php if (!empty($settings['open_content'])) :   ?>
                                            <span><?php echo esc_html($settings['open_content']) ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <ul class="p-6 p-sm-8 d-flex justify-content-center gap-4 social-area">
                                    <?php if (!empty($settings['contact_fb_website_link']['url'])) :   ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['contact_fb_website_link']['url']) ?>" aria-label="Facebook" class="d-center">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                    <?php endif ?>
                                    <?php if (!empty($settings['ins_website_link']['url'])) :   ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['ins_website_link']['url']) ?>" aria-label="Instagram" class="d-center">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    <?php endif ?>
                                    <?php if (!empty($settings['link_website_link']['url'])) :   ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['link_website_link']['url']) ?>" aria-label="Linkedin" class="d-center">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    <?php endif ?>
                                    <?php if (!empty($settings['tw_website_link']['url'])) :   ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['tw_website_link']['url']) ?>" aria-label="Twitter" class="d-center">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>

















<?php
    }
}

$widgets_manager->register(new TP_Contact());
