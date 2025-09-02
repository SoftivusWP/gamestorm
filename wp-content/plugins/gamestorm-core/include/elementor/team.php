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
class TP_Team extends Widget_Base
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
        return 'tp-team';
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
        return __('Team', 'tpcore');
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


        // ---------------------------General one--------------------------//


        //General Section
        $this->start_controls_section(
            'gamestorm_team_section_genaral',
            [
                'label' => esc_html__('General', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'gamestorm_team_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gamestorm-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'gamestorm-core'),
                    'style_two' => esc_html__('Style Two', 'gamestorm-core'),
                    'style_three' => esc_html__('Style Three', 'gamestorm-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'gamestorm_team_one_heading',
            [
                'label' => esc_html__('Heading', 'gamestorm-core')
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


        // ======================================Content One=======================================//


        $this->start_controls_section(
            'gamestorm_team_one_content',
            [
                'label' => esc_html__('Team', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_team_content_style_selection' => 'style_one'
                ]
            ]
        );



        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

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
                'label' => esc_html__('Designation', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('List Content', 'gamestorm-core'),
                'show_label' => false,
            ]
        );

        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Repeater List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Jane Cooper', 'gamestorm-core'),
                        'list_content' => esc_html__('Animator', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Esther Howard', 'gamestorm-core'),
                        'list_content' => esc_html__('Artist', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Faruk Ahmed', 'gamestorm-core'),
                        'list_content' => esc_html__('Developer', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Marvin McKinney', 'gamestorm-core'),
                        'list_content' => esc_html__('Brand & Culture Manager', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Bessie Cooper', 'gamestorm-core'),
                        'list_content' => esc_html__('Designer', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Masud Rana', 'gamestorm-core'),
                        'list_content' => esc_html__('Content Creator', 'gamestorm-core'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );



        $this->end_controls_section();



        // ======================================Content Two=======================================//


        $this->start_controls_section(
            'gamestorm_team_two_content',
            [
                'label' => esc_html__('Team', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_team_content_style_selection' => 'style_two'
                ]
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'team_two_top_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Rounder', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list_repeaterr',
            [
                'label' => esc_html__('Button List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'team_two_top_title' => esc_html__('Title #1', 'gamestorm-core'),

                    ],

                ],
                'title_field' => '{{{ team_two_top_title }}}',
            ]
        );




        // Repeater
        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'more_options',
            [
                'label' => esc_html__('1st Person', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'list_image_two',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'list_title_two',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content_two',
            [
                'label' => esc_html__('Designation', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Content', 'gamestorm-core'),
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'more_opfftions',
            [
                'label' => esc_html__('2nd Person', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'list_image_two2',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'list_title_two2',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content_two2',
            [
                'label' => esc_html__('Designation', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Content', 'gamestorm-core'),
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'more_opfsadtions',
            [
                'label' => esc_html__('3rd Person', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'list_image_two3',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'list_title_two3',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content_two3',
            [
                'label' => esc_html__('Designation', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Content', 'gamestorm-core'),
                'show_label' => false,
            ]
        );

        $this->add_control(
            'list_repeater_two',
            [
                'label' => esc_html__('Team List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

            ]
        );



        $this->end_controls_section();

        // =================================Content Three====================================//



        $this->start_controls_section(
            'teamn_thee_content',
            [
                'label' => esc_html__('Team', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_team_content_style_selection' => 'style_three'
                ]

            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'teamn_thee_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'teamn_thee_titlee',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your Name here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'teamn_thee_title',
            [
                'label' => esc_html__('Designation', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'teamn_thee_fb_website_link',
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
        $repeater->add_control(
            'teamn_thee_ins_website_link',
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
        $repeater->add_control(
            'teamn_thee_link_website_link',
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
        $repeater->add_control(
            'teamn_thee_tw_website_link',
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







        $this->add_control(
            'list_repeaterrr_three',
            [
                'label' => esc_html__('Team List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

            ]
        );




        $this->end_controls_section();



        $this->start_controls_section(
            'teamn_thee_content_card',
            [
                'label' => esc_html__('Card', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_team_content_style_selection' => 'style_three'
                ]

            ]
        );


        $this->add_control(
            'teamn_thee_content_card_icon',
            [
                'label' => esc_html__('Icon', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'teamn_thee_content_card_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'teamn_thee_content_card_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );

        $this->add_control(
            'teamn_thee_content_card_btn_title',
            [
                'label' => esc_html__('Button Text', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'teamn_thee_content_card_website_link',
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


        $this->end_controls_section();

        // ===========================Style=======================================//



        $this->start_controls_section(
            'heading_style',
            [
               'label' => esc_html__('Heading', 'plugin-name'),
               'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
           'more_options',
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
           'more_odfdfptions',
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
               ],
           ]
        );
        $this->add_control(
           'more_optfdfions',
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
        
           ]
        );
        
        $this->add_control(
           'about_section_style_des_color',
           [
               'label'     => esc_html__('Color', 'plugin-name'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .section-header p' => 'color: {{VALUE}};',
               ],
           ]
        );
        
        
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'gameone_cat_style',
             [
                'label' => esc_html__('Category', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gamestorm_team_content_style_selection' => 'style_two'
                ]
             ]
        );
        
        $this->add_control(
            'gameone_cat_style_color',
            [
                'label' => esc_html__( 'Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-members .nav li button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gameone_cat_style_baccolor',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-members .nav li button' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gameone_cat_style_bor_color',
            [
                'label' => esc_html__( 'Border Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-members .nav li button' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'gameone_cat_style_acolor',
            [
                'label' => esc_html__( 'Active Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-members .nav li button.active' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gameone_cat_style_abaccolor',
            [
                'label' => esc_html__( 'Active Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-members .nav li button.active' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gameone_cat_style_abor_color',
            [
                'label' => esc_html__( 'Active Border Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-members .nav li button.active' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'team_name_style',
             [
                'label' => esc_html__('Name', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'team_name_style_typ',
                'selector' => '{{WRAPPER}} .title-area h4',
        
            ]
        );
        
        $this->add_control(
            'team_name_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-area h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'section_bac_color',
            [
                'label' => esc_html__( 'Section Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-members .single-box .title-area' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_name_style_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .title-area h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'team_name_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .title-area h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'team_ses_style',
             [
                'label' => esc_html__('Designation', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'eam_ses_style_typ',
                'selector' => '{{WRAPPER}} span.designation',
        
            ]
        );
        
        $this->add_control(
            'eam_ses_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} span.designation' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eam_ses_style_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} span.designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'eam_ses_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} span.designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'team_social_style',
             [
                'label' => esc_html__('Social', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gamestorm_team_content_style_selection' => 'style_three'
                ]
             ]
        );

        $this->add_control(
            'social_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-area a i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_icon_colorh',
            [
                'label' => esc_html__( 'Icon Hover Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-area a:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'social_icon_bjoreder_color',
            [
                'label' => esc_html__( 'Border Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-teams .social-area a' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_hovber_bac',
            [
                'label' => esc_html__( 'Hover Background', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-area a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'plus_icon_bac_color',
            [
                'label' => esc_html__( 'Plus Icon Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-teams .social-hide-btn' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'minus_icon_bac_color',
            [
                'label' => esc_html__( 'Minus Icon Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-teams .single-box.active .social-hide-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'team_card_style',
             [
                'label' => esc_html__('Card', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gamestorm_team_content_style_selection' => 'style_three'
                ]
             ]
        );
        
        $this->add_control(
            'card_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-area.d-center.m-auto svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'card_icon_bcolor',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-teams .icon-area' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'box_color',
            [
                'label' => esc_html__( 'Box Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-teams .single-box.single-area' => 'background: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'box_title_color',
            [
                'label' => esc_html__( 'Title Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-teams .single-box h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'box_title_colorh',
            [
                'label' => esc_html__( 'Title Hover Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-teams .single-box:hover h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'box_des_color',
            [
                'label' => esc_html__( 'Description Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-wrapper p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'mofdsfafre_options',
            [
                'label' => esc_html__( 'Button', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
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
            const slidesShowTeam = 4;
            jQuery(".team-carousel").not('.slick-initialized').slick({
                infinite: false,
                autoplay: false,
                centerMode: false,
                centerPadding: "60px",
                focusOnSelect: false,
                speed: 500,
                slidesToShow: slidesShowTeam,
                slidesToScroll: 1,
                arrows: false,
                prevArrow: "<button type='button' aria-label='Slide Prev' class='arafat-prev box-style pull-left'><i class=\"material-symbols-outlined mat-icon\"  aria-hidden='true'>arrow_right_alt</i> <span class='bg-obj'></span> </button>",
                nextArrow: "<button type='button' aria-label='Slide Next' class='arafat-next box-style pull-right'><i class=\"material-symbols-outlined mat-icon\"  aria-hidden='true'>arrow_right_alt</i> <span class='bg-obj'></span> </button>",
                dots: false,
                dotsClass: 'section-dots',
                customPaging: function(slider, i) {
                    var slideNumber = (i + 1),
                        totalSlides = slider.slideCount;
                    return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
                },
                responsive: [{
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            centerPadding: "30px",
                            infinite: true,
                            autoplay: true,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            arrows: false,
                        }
                    },
                ]
            });
            const teamSlider = jQuery(".team-carousel");
            var scrollCount = null;
            var scroll = null;
            teamSlider.on('wheel', function(e) {
                e.preventDefault();
                clearTimeout(scroll);
                scroll = setTimeout(function() {
                    scrollCount = 0;
                }, 200);
                if (scrollCount) return 0;
                scrollCount = 1;
                const delta = e.originalEvent.deltaY;
                const sliderElement = jQuery(this);
                const slideCount = sliderElement.slick('getSlick').slideCount;
                const currentSlide = sliderElement.slick('slickCurrentSlide');
                const isLastSlide = currentSlide === slideCount - slidesShowTeam;
                const isFirstSlide = currentSlide === 0;
                if (isLastSlide && delta > 0) {
                    window.scrollBy(0, 100);
                } else if (isFirstSlide && delta < 0) {
                    window.scrollBy(0, -100);
                } else {
                    if (delta < 0) {
                        sliderElement.slick('slickPrev');
                    } else {
                        sliderElement.slick('slickNext');
                    }
                }
            });

            // Custom Tabs
            jQuery(".tablinks button").each(function() {
                var targetTab = jQuery(this).closest(".singletab");
                targetTab.find(".tablinks button").each(function() {
                    var navBtn = targetTab.find(".tablinks button");
                    navBtn.on('click', function() {
                        navBtn.removeClass('active');
                        jQuery(this).addClass('active');
                        var indexNum = jQuery(this).closest("li").index();
                        var tabcontent = targetTab.find(".tabcontents .tabitem");
                        jQuery(tabcontent).removeClass('active');
                        jQuery(tabcontent).eq(indexNum).addClass('active');
                    });
                });
            });

            jQuery('.social-hide-btn').on('click', function() {
                jQuery(this).parents(".single-box").toggleClass('active');
                if (jQuery('.single-box').hasClass("active")) {
                    jQuery('.active .social-hide-btn i').html("remove");
                } else {
                    jQuery('.social-hide-btn i').html("add");
                }
            });
        });
        </script>



        <?php if ($settings['gamestorm_team_content_style_selection'] == 'style_one') : ?>

            <section class="team-members pt-120 pb-120">
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
                </div>
                <div class="container-fluid">
                    <div class="team-carousel">

                        <?php foreach ($settings['list_repeater'] as $item) : ?>
                            <div class="slide-area">
                                <div class="single-slider">
                                    <div class="thumb">
                                        <?php if (!empty($item['list_image']['url'])) : ?>
                                            <img src="<?php echo esc_url($item['list_image']['url']); ?>" alt="<?php echo esc_attr('image'); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="title-area">
                                        <?php if (!empty($item['list_title'])) :   ?>
                                            <h4 class="pt-8 pb-2"><?php echo esc_html($item['list_title']) ?></h4>
                                        <?php endif ?>
                                        <?php if (!empty($item['list_content'])) :   ?>
                                            <span class="designation"><?php echo esc_html($item['list_content']) ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div>
                </div>
            </section>

        <?php endif; ?>


        <?php if ($settings['gamestorm_team_content_style_selection'] == 'style_two') : ?>

            <section class="team-members index-two overflow-hidden pt-120 pb-120">
                <div class="container singletab">
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

                    <div class="row justify-content-center">
                        <div class="col-lg-10 text-center">
                            <ul class="nav tablinks d-inline-flex flex-wrap p-3 gap-3 mb-10 tab-area">
                                <?php foreach ($settings['list_repeaterr'] as $key => $item2) : ?>
                                    <li class="nav-item <?php echo ($key === 0) ? 'active' : ''; ?>">
                                        <button class="nav-link fs-seven d-center" aria-label="Tab Button">
                                            <?php echo esc_html($item2['team_two_top_title']) ?>
                                        </button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="tabcontents">
                        <?php foreach ($settings['list_repeater_two'] as $key => $item2) : ?>
                            <div class="tabitem <?php echo ($key === 0) ? 'active' : ''; ?>">
                                <div class="row cus-mar justify-content-center justify-content-sm-start">
                                    <?php if (!empty($item2['list_image_two']['url'])) :   ?>
                                        <div class="col-lg-4 col-6">
                                            <div class="single-box position-relative">
                                                <?php if (!empty($item2['list_image_two']['url'])) :   ?>
                                                    <div class="thumb">
                                                        <img src="<?php echo esc_url($item2['list_image_two']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                    </div>
                                                <?php endif ?>
                                                <div class="title-area p-3 py-sm-4 px-sm-5 position-absolute bottom-0 start-0">
                                                    <?php if (!empty($item2['list_title_two'])) :   ?>
                                                        <h4 class="pb-2"><?php echo esc_html($item2['list_title_two']) ?></h4>
                                                    <?php endif ?>
                                                    <?php if (!empty($item2['list_content_two'])) :   ?>
                                                        <span class="designation"><?php echo esc_html($item2['list_content_two']) ?></span>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>

                                    <?php if (!empty($item2['list_image_two2']['url'])) :   ?>
                                        <div class="col-lg-4 col-6">
                                            <div class="single-box position-relative">
                                                <?php if (!empty($item2['list_image_two2']['url'])) :   ?>
                                                    <div class="thumb">
                                                        <img src="<?php echo esc_url($item2['list_image_two2']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                    </div>
                                                <?php endif ?>
                                                <div class="title-area p-3 py-sm-4 px-sm-5 position-absolute bottom-0 start-0">
                                                    <?php if (!empty($item2['list_title_two2'])) :   ?>
                                                        <h4 class="pb-2"><?php echo esc_html($item2['list_title_two2']) ?></h4>
                                                    <?php endif ?>
                                                    <?php if (!empty($item2['list_content_two2'])) :   ?>
                                                        <span class="designation"><?php echo esc_html($item2['list_content_two2']) ?></span>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>

                                    <?php if (!empty($item2['list_image_two3']['url'])) :   ?>
                                        <div class="col-lg-4 col-6">
                                            <div class="single-box position-relative">
                                                <?php if (!empty($item2['list_image_two3']['url'])) :   ?>
                                                    <div class="thumb">
                                                        <img src="<?php echo esc_url($item2['list_image_two3']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                    </div>
                                                <?php endif ?>
                                                <div class="title-area p-3 py-sm-4 px-sm-5 position-absolute bottom-0 start-0">
                                                    <?php if (!empty($item2['list_title_two3'])) :   ?>
                                                        <h4 class="pb-2"><?php echo esc_html($item2['list_title_two3']) ?></h4>
                                                    <?php endif ?>
                                                    <?php if (!empty($item2['list_content_two3'])) :   ?>
                                                        <span class="designation"><?php echo esc_html($item2['list_content_two3']) ?></span>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </section>

        <?php endif; ?>


        <?php if ($settings['gamestorm_team_content_style_selection'] == 'style_three') : ?>

            <section class="our-teams">
                <div class="container pt-120 pb-120">
                    <div class="row section-header justify-content-center">
                        <div class="col-lg-6 text-center">
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


                    <div class="row">


                        <?php foreach ($settings['list_repeaterrr_three'] as $item) : ?>
                            <div class="col-xl-3 col-sm-6">
                                <div class="single-box text-center">
                                    <div class="img-area position-relative mb-10 d-center">
                                        <?php if (!empty($item['teamn_thee_image']['url'])) :   ?>
                                            <img src="<?php echo esc_url($item['teamn_thee_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                        <?php endif ?>
                                        <button class="social-hide-btn d-center position-absolute">
                                            <i class="material-symbols-outlined"> <?php echo esc_html('add') ?> </i>
                                        </button>
                                        <ul class="d-grid position-absolute gap-4 social-area">
                                            <li>
                                                <a href="<?php echo esc_url($item['teamn_thee_fb_website_link']['url']) ?>" aria-label="Facebook" class="d-center">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url($item['teamn_thee_ins_website_link']['url']) ?>" aria-label="Instagram" class="d-center">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url($item['teamn_thee_link_website_link']['url']) ?>" aria-label="Linkedin" class="d-center">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url($item['teamn_thee_tw_website_link']['url']) ?>" aria-label="Twitter" class="d-center">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php if (!empty($item['teamn_thee_titlee'])) :   ?>
                                        <h4 class="mb-2"><?php echo esc_html($item['teamn_thee_titlee']) ?></h4>
                                    <?php endif ?>
                                    <?php if (!empty($item['teamn_thee_title'])) :   ?>
                                        <p><?php echo esc_html($item['teamn_thee_title']) ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach; ?>




                        <div class="col-xl-3 col-sm-6">
                            <div class="single-box h-100 py-15 px-8 d-grid align-items-center single-area text-center">
                                <div class="box-wrapper">
                                    <?php if (!empty($settings['teamn_thee_content_card_icon'])) :   ?>
                                        <div class="icon-area d-center m-auto">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['teamn_thee_content_card_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($settings['teamn_thee_content_card_title'])) :   ?>
                                        <h4 class="mb-2 mt-8"><?php echo esc_html($settings['teamn_thee_content_card_title']) ?></h4>
                                    <?php endif ?>
                                    <?php if (!empty($settings['teamn_thee_content_card_description'])) :   ?>
                                        <p> <?php echo esc_html($settings['teamn_thee_content_card_description']) ?></p>
                                    <?php endif ?>
                                    <div class="btn-area alt-bg">
                                        <?php if (!empty($settings['teamn_thee_content_card_btn_title'])) :   ?>
                                            <a href="<?php echo esc_url($settings['teamn_thee_content_card_website_link']['url']) ?>" class="box-style btn-box mt-7 d-center">
                                                <?php echo esc_html($settings['teamn_thee_content_card_btn_title']) ?>
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


<?php
    }
}

$widgets_manager->register(new TP_Team());
