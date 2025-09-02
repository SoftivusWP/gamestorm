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
class TP_About extends Widget_Base
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
        return 'about';
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
        return __('About', 'tpcore');
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
            'gamestorm_about_one_section_genaral',
            [
                'label' => esc_html__('General', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'gamestorm_about_content_style_selection',
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

        // ============================================Content One================================================//

        $this->start_controls_section(
            'gamestorm_about_left_content',
            [
                'label' => esc_html__('Left Content', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_about_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'gamestorm_about_left_content_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'gamestorm_about_left_content_year',
            [
                'label' => esc_html__('Year', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('20', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your number of year here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gamestorm_about_left_content_year_title',
            [
                'label' => esc_html__('Title (Year)', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Years Of Experience', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your years experience title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();




        $this->start_controls_section(
            'gamestorm_about_right_content',
            [
                'label' => esc_html__('Right Content', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_about_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'gamestorm_about_right_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gamestorm_about_right_content_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'gamestorm_about_right_content_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'repeate_one_number',
            [
                'label' => esc_html__('Number', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'repeat_one_param',
            [
                'label' => esc_html__('Paramenter', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your parameter here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'repeat_one_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );




        $this->add_control(
            'list_repeater_one',
            [
                'label' => esc_html__('Feature List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'repeate_one_number' => esc_html__('500', 'gamestorm-core'),
                        'repeat_one_param' => esc_html__('M', 'gamestorm-core'),
                        'repeat_one_title' => esc_html__('Downloads, or 6% of the worlds population.', 'gamestorm-core'),
                    ],
                    [
                        'repeate_one_number' => esc_html__('2', 'gamestorm-core'),
                        'repeat_one_param' => esc_html__('M', 'gamestorm-core'),
                        'repeat_one_title' => esc_html__('Our games have over 20 million unique daily users.', 'gamestorm-core'),
                    ],
                    [
                        'repeate_one_number' => esc_html__('52', 'gamestorm-core'),
                        'repeat_one_param' => esc_html__('', 'gamestorm-core'),
                        'repeat_one_title' => esc_html__('Experts collaborating to blow your mind in one place.', 'gamestorm-core'),
                    ],
                    [
                        'repeate_one_number' => esc_html__('4', 'gamestorm-core'),
                        'repeat_one_param' => esc_html__('K', 'gamestorm-core'),
                        'repeat_one_title' => esc_html__('The Gamestorm Studio is launching with 4K+ Games.', 'gamestorm-core'),
                    ],

                ],

            ]
        );


        $this->add_control(
            'about_one_btn_text',
            [
                'label' => esc_html__('Button Text', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore Our Games', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your button text here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'about_one_website_link',
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


        // ==================================Content Two=============================================//


        $this->start_controls_section(
            'gamestorm_about_left_content_two',
            [
                'label' => esc_html__('Left Content', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_about_content_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'gamestorm_about_left_two_content_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'about_box_one',
            [
                'label' => esc_html__('Box One', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'gamestorm_about_left_two_content_number',
            [
                'label' => esc_html__('Number', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('4', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your number here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gamestorm_about_left_two_content_year_title',
            [
                'label' => esc_html__('Parameter', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('K', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your parameter here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gamestorm_about_left_two_content_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Game Lunched', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'about_box_two',
            [
                'label' => esc_html__('Box Two', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'gamestorm_about_left_ttwo_content_number',
            [
                'label' => esc_html__('Number', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('9', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your number here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gamestorm_about_left_ttwo_content_year_title',
            [
                'label' => esc_html__('Parameter', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('B', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your parameter here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gamestorm_about_left_ttwo_content_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Game Downloads', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();






        $this->start_controls_section(
            'gamestorm_about_two_right_content',
            [
                'label' => esc_html__('Right Content', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_about_content_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'gamestorm_about_right_two_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gamestorm_about_right_two_content_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'gamestorm_about_righ_twot_content_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();




        $repeater->add_control(
            'repeat_one_two_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'repeat_one_two_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );




        $this->add_control(
            'list_repeater_two_one',
            [
                'label' => esc_html__('Feature List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [

                        'repeat_one_two_title' => esc_html__('Passion', 'gamestorm-core'),
                        'repeat_one_two_description' => esc_html__('We believe that working passionately to create great games improves our perspective!', 'gamestorm-core'),
                    ],
                    [

                        'repeat_one_two_title' => esc_html__('Innovation', 'gamestorm-core'),
                        'repeat_one_two_description' => esc_html__('We believe creativity and innovation have a great impact on discovering new worlds!', 'gamestorm-core'),
                    ],
                    [

                        'repeat_one_two_title' => esc_html__('Team Spirit', 'gamestorm-core'),
                        'repeat_one_two_description' => esc_html__('We are in awe of the incredible strength that comes from having a strong team spirit that encourages each other.', 'gamestorm-core'),
                    ],
                    [

                        'repeat_one_two_title' => esc_html__('Transparency', 'gamestorm-core'),
                        'repeat_one_two_description' => esc_html__('We share our knowledge, opinions, success and mistakes. We believe in open and honest communication, to enforce trust and teamwork.', 'gamestorm-core'),
                    ],

                ],

            ]
        );


        $this->add_control(
            'about_one_two_btn_text',
            [
                'label' => esc_html__('Button Text', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Join Us Our Team', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your button text here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'about_one_two_website_link',
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


        $this->start_controls_section(
            'about_two_reborn',
            [
                'label' => esc_html__('Reborn', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_about_content_style_selection' => 'style_two'
                ]

            ]
        );

        $this->add_control(
            'reborn_show_two',
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

        // ===================================Content Three===========================================//



        $this->start_controls_section(
            'gamestorm_about_left_three_content',
            [
                'label' => esc_html__('Left Content', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_about_content_style_selection' => 'style_three'
                ]
            ]
        );


        $this->add_control(
            'gamestorm_about_left_three_content_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'gamestorm_about_left_three_content_year',
            [
                'label' => esc_html__('Year', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('20', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your number of year here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gamestorm_about_left_three_content_year_title',
            [
                'label' => esc_html__('Title (Year)', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Years Of Experience', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your years experience title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();




        $this->start_controls_section(
            'gamestorm_about_three_right_content',
            [
                'label' => esc_html__('Right Content', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_about_content_style_selection' => 'style_three'
                ]
            ]
        );


        $this->add_control(
            'gamestorm_about_right_three_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gamestorm_about_right_three_content_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'gamestorm_about_righ_threet_content_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );


        $this->add_control(
            'gamestorm_about_righ_threet_content_description_two',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'repeat_one_three_icon',
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
            'repeat_one_three_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'repeat_one_three_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );







        $this->add_control(
            'list_repeater_three_one',
            [
                'label' => esc_html__('Feature List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [

                        'repeat_one_three_title' => esc_html__('Passion', 'gamestorm-core'),
                        'repeat_one_three_description' => esc_html__('We believe that working passionately to create great games improves our perspective!', 'gamestorm-core'),
                    ],
                    [

                        'repeat_one_three_title' => esc_html__('Innovation', 'gamestorm-core'),
                        'repeat_one_three_description' => esc_html__('We believe creativity and innovation have a great impact on discovering new worlds!', 'gamestorm-core'),
                    ],
                    [

                        'repeat_one_three_title' => esc_html__('Team Spirit', 'gamestorm-core'),
                        'repeat_one_three_description' => esc_html__('We are in awe of the incredible strength that comes from having a strong team spirit that encourages each other.', 'gamestorm-core'),
                    ],
                    [

                        'repeat_one_three_title' => esc_html__('Transparency', 'gamestorm-core'),
                        'repeat_one_three_description' => esc_html__('We share our knowledge, opinions, success and mistakes. We believe in open and honest communication, to enforce trust and teamwork.', 'gamestorm-core'),
                    ],

                ],

            ]
        );





        $this->end_controls_section();


        // =====================================Style========================================//


        $this->start_controls_section(
             'about_section_style_card',
             [
                'label' => esc_html__('Card', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );

        $this->add_control(
            'about_section_style_card_color',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-block .experience .experience-wrap' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .about-block .experience' => 'border:1px solid {{VALUE}}',

                ],
            ]
        );

        $this->add_control(
            'about_section_style_card_number_color',
            [
                'label' => esc_html__( 'Number Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .display-four' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'about_section_style_card_text_color',
            [
                'label' => esc_html__( 'Text Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} span.w-35.d-inline-bloc' => 'color: {{VALUE}}',
                    '{{WRAPPER}} span.w-75.text-center.m-auto.d-inline-bloc' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        
        
        
        
        
        $this->end_controls_section();






        $this->start_controls_section(
             'about_section_style_cardtwo',
             [
                'label' => esc_html__('Card Two', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gamestorm_about_content_style_selection' => 'style_two'
                ]
             ]
        );

        $this->add_control(
            'about_section_style_cardtwo_color',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-block .experience.second .experience-wrap' => 'background-color: {{VALUE}};border:1px solid {{VALUE}}',
                    '{{WRAPPER}} .about-block .experience.second' => 'border-color: {{VALUE}}',
                  

                ],
            ]
        );

        $this->add_control(
            'about_section_style_cardtwo_number_color',
            [
                'label' => esc_html__( 'Number Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-block .experience.second .experience-wrap span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'about_section_style_cardtwo_text_color',
            [
                'label' => esc_html__( 'Text Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-block .experience.second .experience-wrap span' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'about_section_style_subtitle',
             [
                'label' => esc_html__('Subtitle', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
        
        
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'about_section_style_title',
             [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
        
        
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'about_section_style_des',
             [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .section-text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'about_section_style_destwo',
             [
                'label' => esc_html__('Description Two', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gamestorm_about_content_style_selection' => 'style_three'
                ]
             ]
        );
        
        $this->add_control(
            'about_section_style_destwo_color',
            [
                'label' => esc_html__( 'Title Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .des-two' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'about_section_style_content',
             [
                'label' => esc_html__('Content', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );

        $this->add_control(
            'about_section_style_content_title_color',
            [
                'label' => esc_html__( 'Title Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .odometer-ribbon-inner span.odometer-value' => 'color: {{VALUE}}',
                    '{{WRAPPER}} span.fs-three.heading' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .counter-item.mb-8.pb-4 h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .info-box h5' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'about_section_style_content_des_color',
            [
                'label' => esc_html__( 'Description Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} span.name-area.fs-seven' => 'color: {{VALUE}}',
                    '{{WRAPPER}} span.name-area.fs-seven' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .info-box p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'about_section_style_content_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} span.fs-three.heading.symbol' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon-box svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'about_section_style_content_icon_bcolor',
            [
                'label' => esc_html__( 'Icon Backgound Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-block.index-three .icon-box' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'about_section_style_content_border_color',
            [
                'label' => esc_html__( 'Border Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-block .counter-item::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'about_section_style_button',
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
            // Odometer
            
            (function($) {
    $.fn.isInViewport = function(callback) {
        var element = this;
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        var elementTop = $(element).offset().top;
        var elementBottom = elementTop + $(element).outerHeight();

        if (elementBottom > viewportTop && elementTop < viewportBottom) {
            callback("entered");
        } else {
            callback("exited");
        }

        return this;
    };
})(jQuery);

        </script>


        <?php if ($settings['gamestorm_about_content_style_selection'] == 'style_one') : ?>

            <section class="about-block pt-120 pb-120">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xxl-6 col-lg-6 order-1 order-lg-0">
                            <div class="sec-img mw-100 position-relative d-flex align-items-center justify-content-center">
                                <?php if (!empty($settings['gamestorm_about_left_content_image']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['gamestorm_about_left_content_image']['url']) ?>" alt="<?php echo esc_attr('about_image') ?>">
                                <?php endif ?>
                                <div class="experience p-2 p-lg-4 position-absolute ">
                                    <div class="experience-wrap p-3 px-lg-5 py-lg-8 d-inline-flex d-flex gap-3 align-items-center justify-content-center">
                                        <div class="counters d-center">
                                            <?php if (!empty($settings['gamestorm_about_left_content_year'])) :   ?>
                                                <span class="odometer display-four" data-odometer-final="<?php echo esc_attr($settings['gamestorm_about_left_content_year']) ?>"><?php echo esc_html('0') ?></span>
                                                <span class="display-four visible-slowly-bottom symbol"><?php echo esc_html('+') ?></span>
                                            <?php endif ?>
                                        </div>
                                        <?php if (!empty($settings['gamestorm_about_left_content_year_title'])) :   ?>
                                            <span class="w-35 d-inline-bloc"><?php echo esc_html($settings['gamestorm_about_left_content_year_title']) ?></span>
                                        <?php endif ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-lg-6">
                            <div class="section-text">
                                <?php if (!empty($settings['gamestorm_about_right_content_subtitle'])) :   ?>
                                    <h4 class="sub-title"><?php echo wp_kses($settings['gamestorm_about_right_content_subtitle'], wp_kses_allowed_html('post'))  ?></h4>
                                <?php endif ?>
                                <?php if (!empty($settings['gamestorm_about_right_content_title'])) :   ?>
                                    <span class="fs-two heading mb-6"><?php echo wp_kses($settings['gamestorm_about_right_content_title'], wp_kses_allowed_html('post'))  ?></span>
                                <?php endif ?>
                                <?php if (!empty($settings['gamestorm_about_right_content_description'])) :   ?>
                                    <p><?php echo wp_kses($settings['gamestorm_about_right_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                            <div class="row">

                                <?php foreach ($settings['list_repeater_one'] as $item) : ?>
                                    <div class="col-sm-6">
                                        <div class="counter-item mb-8 pb-4">
                                            <?php if (!empty($item['repeate_one_number'])) :   ?>
                                                <div class="counters mb-3 d-flex align-items-center">
                                                    <span class="odometer fs-three heading" data-odometer-final="<?php echo esc_attr($item['repeate_one_number']) ?>"><?php echo esc_html('0') ?></span>
                                                    <?php if (!empty($item['repeat_one_param'])) :   ?>
                                                        <span class="fs-three heading"><?php echo esc_html($item['repeat_one_param']) ?></span>
                                                    <?php endif ?>
                                                    <span class="fs-three heading symbol"><?php echo esc_html('+') ?></span>
                                                </div>
                                            <?php endif ?>
                                            <?php if (!empty($item['repeat_one_title'])) :   ?>
                                                <span class="name-area fs-seven">
                                                    <?php echo esc_html($item['repeat_one_title']) ?>
                                                </span>
                                            <?php endif ?>

                                        </div>
                                    </div>
                                <?php endforeach; ?>


                            </div>
                            <div class="btn-area alt-bg mt-2">
                                <?php if (!empty($settings['about_one_btn_text'])) :   ?>
                                    <a href="<?php echo esc_url($settings['about_one_website_link']['url']) ?>" class="box-style btn-box d-center">
                                        <?php echo esc_html($settings['about_one_btn_text']) ?>
                                    </a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>


        <?php if ($settings['gamestorm_about_content_style_selection'] == 'style_two') : ?>

            <section class="about-block position-relative index-two pt-120 pb-120">
                <?php if (!empty($settings['reborn_show_two']) == 'yes') :   ?>
                    <div class="shape-area">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-7.png" class="shape-1" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-8.png" class="shape-2" alt="icon">
                    </div>
                <?php endif ?>

                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xxl-6 col-lg-6 order-1 order-lg-0">
                            <div class="sec-img mw-100 position-relative d-center">
                                <?php if (!empty($settings['gamestorm_about_left_two_content_image']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['gamestorm_about_left_two_content_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                <?php endif ?>
                                <div class="experience second p-2 p-lg-4 position-absolute top-0 start-0">
                                    <div class="experience-wrap p-3 px-lg-5 py-lg-8 d-grid d-center gap-1">
                                        <?php if (!empty($settings['gamestorm_about_left_two_content_number'])) :   ?>
                                            <div class="counters d-center">
                                                <span class="odometer display-four" data-odometer-final="<?php echo esc_attr($settings['gamestorm_about_left_two_content_number']) ?>">0</span>
                                                <?php if (!empty($settings['gamestorm_about_left_two_content_year_title'])) :   ?>
                                                    <span class="display-four visible-slowly-bottom symbol"><?php echo esc_html($settings['gamestorm_about_left_two_content_year_title']) ?></span>
                                                <?php endif ?>
                                            </div>
                                        <?php endif ?>
                                        <?php if (!empty($settings['gamestorm_about_left_two_content_title'])) :   ?>
                                            <span class="w-75 text-center m-auto d-inline-bloc"><?php echo esc_html($settings['gamestorm_about_left_two_content_title']) ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="experience p-2 p-lg-4 position-absolute bottom-0 end-0">
                                    <div class="experience-wrap p-3 px-lg-5 py-lg-8 d-grid d-center gap-1">
                                        <?php if (!empty($settings['gamestorm_about_left_two_content_number'])) :   ?>
                                            <div class="counters d-center">
                                                <span class="odometer display-four" data-odometer-final="<?php echo esc_attr($settings['gamestorm_about_left_ttwo_content_number']) ?>">0</span>
                                                <?php if (!empty($settings['gamestorm_about_left_two_content_year_title'])) :   ?>
                                                    <span class="display-four visible-slowly-bottom symbol"><?php echo esc_html($settings['gamestorm_about_left_ttwo_content_year_title']) ?></span>
                                                <?php endif ?>
                                            </div>
                                        <?php endif ?>
                                        <?php if (!empty($settings['gamestorm_about_left_two_content_title'])) :   ?>
                                            <span class="w-75 text-center m-auto d-inline-bloc"><?php echo esc_html($settings['gamestorm_about_left_ttwo_content_title']) ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xxl-5 col-lg-6">
                            <div class="section-text">
                                <?php if (!empty($settings['gamestorm_about_right_two_content_subtitle'])) :   ?>
                                    <h4 class="sub-title"><?php echo wp_kses($settings['gamestorm_about_right_two_content_subtitle'], wp_kses_allowed_html('post'))  ?></h4>
                                <?php endif ?>
                                <?php if (!empty($settings['gamestorm_about_right_two_content_title'])) :   ?>
                                    <span class="fs-two heading mb-6"><?php echo wp_kses($settings['gamestorm_about_right_two_content_title'], wp_kses_allowed_html('post'))  ?></span>
                                <?php endif ?>
                                <?php if (!empty($settings['gamestorm_about_righ_twot_content_description'])) :   ?>
                                    <p><?php echo wp_kses($settings['gamestorm_about_righ_twot_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                            <div class="row">

                                <?php foreach ($settings['list_repeater_two_one'] as $item) : ?>
                                    <div class="col-sm-6">
                                        <div class="counter-item mb-8 pb-4">
                                            <?php if (!empty($item['repeat_one_two_title'])) :   ?>
                                                <h4 class="mb-3"><?php echo esc_html($item['repeat_one_two_title']) ?></h4>
                                            <?php endif ?>
                                            <?php if (!empty($item['repeat_one_two_description'])) :   ?>
                                                <span class="name-area fs-seven">
                                                    <?php echo esc_html($item['repeat_one_two_description']) ?>
                                                </span>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                            <?php if (!empty($settings['about_one_two_btn_text'])) :   ?>
                                <div class="btn-area alt-bg mt-2">
                                    <a href="<?php echo esc_url($settings['about_one_two_website_link']['url']) ?>" class="box-style btn-box d-center">
                                        <?php echo esc_html($settings['about_one_two_btn_text']) ?>
                                    </a>
                                </div>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>


        <?php if ($settings['gamestorm_about_content_style_selection'] == 'style_three') : ?>


            <section class="about-block position-relative index-three pt-120 pb-120">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xxl-6 col-lg-6 order-1 order-lg-0">
                            <div class="sec-img mw-100 position-relative d-center">
                                <?php if (!empty($settings['gamestorm_about_left_three_content_image']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['gamestorm_about_left_three_content_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                <?php endif ?>
                                <div class="experience p-2 p-lg-4 position-absolute bottom-0 end-0">
                                    <div class="experience-wrap p-3 px-lg-5 py-lg-8 d-grid d-center gap-1">
                                        <?php if (!empty($settings['gamestorm_about_left_three_content_year'])) :   ?>
                                            <div class="counters d-center">
                                                <span class="odometer display-four" data-odometer-final="<?php echo esc_attr($settings['gamestorm_about_left_three_content_year']) ?>"><?php echo esc_html('0') ?></span>
                                                <span class="display-four visible-slowly-bottom symbol"><?php echo esc_html('+') ?></span>
                                            </div>
                                        <?php endif ?>
                                        <?php if (!empty($settings['gamestorm_about_left_three_content_year_title'])) :   ?>
                                            <span class="w-75 text-center m-auto d-inline-bloc"><?php echo esc_html($settings['gamestorm_about_left_three_content_year_title']) ?></span>
                                        <?php endif ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-lg-6">
                            <div class="section-text">
                                <?php if (!empty($settings['gamestorm_about_right_three_content_subtitle'])) :   ?>
                                    <h4 class="sub-title"><?php echo wp_kses($settings['gamestorm_about_right_three_content_subtitle'], wp_kses_allowed_html('post'))  ?></h4>
                                <?php endif ?>
                                <?php if (!empty($settings['gamestorm_about_right_three_content_title'])) :   ?>
                                    <span class="fs-two heading mb-6"><?php echo wp_kses($settings['gamestorm_about_right_three_content_title'], wp_kses_allowed_html('post'))  ?></span>
                                <?php endif ?>
                                <?php if (!empty($settings['gamestorm_about_righ_threet_content_description'])) :   ?>
                                    <p class="mb-4 fs-five"><?php echo wp_kses($settings['gamestorm_about_righ_threet_content_description'], wp_kses_allowed_html('post'))  ?>
                                    </p>
                                <?php endif ?>
                                <?php if (!empty($settings['gamestorm_about_righ_threet_content_description_two'])) :   ?>
                                    <p class="des-two"><?php echo wp_kses($settings['gamestorm_about_righ_threet_content_description_two'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>


                            <div class="content-item d-grid gap-6">
                                <?php foreach ($settings['list_repeater_three_one'] as $item) : ?>
                                    <div class="content-box d-flex gap-4 gap-md-5">
                                        <?php if (!empty($item['repeat_one_three_icon'])) :   ?>
                                            <div class="icon-box d-center">
                                                <?php \Elementor\Icons_Manager::render_icon($item['repeat_one_three_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                        <?php endif ?>
                                        <div class="info-box">
                                            <?php if (!empty($item['repeat_one_three_title'])) :   ?>
                                                <h5 class="mb-3"><?php echo esc_html($item['repeat_one_three_title']) ?></h5>
                                            <?php endif ?>
                                            <?php if (!empty($item['repeat_one_three_description'])) :   ?>
                                                <p><?php echo esc_html($item['repeat_one_three_description']) ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        <?php endif; ?>





<?php
    }
}

$widgets_manager->register(new TP_About());
