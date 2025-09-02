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
class TP_Testimonial extends Widget_Base
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
        return 'testimonial';
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
        return __('Testimonial', 'tpcore');
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



        // ---------------------------General--------------------------//


        $this->start_controls_section(
            'gamestorm_testimoial_one_section_genaral',
            [
                'label' => esc_html__('General', 'gamestorm-core')
            ]
        );


        $this->add_control(
            'gamestorm_testimonial_content_style_selection',
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


        // ======================================Content One============================================//


        $this->start_controls_section(
            'testimonial_content_one',
            [
                'label' => esc_html__('Content', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_testimonial_content_style_selection' => 'style_one'
                ]
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'testimonial_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testi_rating',
            [
                'label' => esc_html__('Rating', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 5,
            ]
        );

        $repeater->add_control(
            'testi_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );

        $repeater->add_control(
            'testi_name',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your name here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'testi_designation',
            [
                'label' => esc_html__('Designation', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your designation here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Testimonial List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),


            ]
        );


        $this->end_controls_section();


        // ==================================Content Two=========================================//


        $this->start_controls_section(
            'testimonial_two_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_testimonial_content_style_selection' => 'style_two'
                ]
            ]
        );



        // Repeater
        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'testi_two_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'testi_two_rating',
            [
                'label' => esc_html__('Rating', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 5,
            ]
        );

        $repeater->add_control(
            'testi_two_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );


        $repeater->add_control(
            'testi_two_name',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Faruk Ahmed Titu', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your name here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'testi_two_country',
            [
                'label' => esc_html__('Location', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Bangladesh', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your country name or place here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'testi_two_date',
            [
                'label' => esc_html__('Date', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Dec 17, 2023', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your date here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'list_repeater_two',
            [
                'label' => esc_html__('Testimonial List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testi_two_name' => esc_html__('Faruk Ahmed Titu', 'gamestorm-core'),
                    ],
                ],
                'title_field' => '{{{ testi_two_name }}}',
            ]
        );

        $this->end_controls_section();

        // ==================================Content Three==========================================/

        $this->start_controls_section(
            'testimonial_three_heading',
            [
                'label' => esc_html__('Heading', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_testimonial_content_style_selection' => 'style_three'
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
            'testimonial_three_content',
            [
                'label' => esc_html__('Testimonial', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_testimonial_content_style_selection' => 'style_three'
                ]
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_three_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('The graphics in their games are always top-notch and truly bring
                the world to life', 'gamestorm-core'),
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'list_three_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'list_three_title',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Faruk Ahmed', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_three_location_title',
            [
                'label' => esc_html__('Country', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Bangladesh', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'list_three_repeater',
            [
                'label' => esc_html__('Testimonial List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_three_title' => esc_html__('Title #1', 'gamestorm-core'),
                    ],

                ],
                'title_field' => '{{{ list_three_title }}}',
            ]
        );



        $this->end_controls_section();


        // =============================Style==================================//


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

        
        
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'testi_rating_style',
             [
                'label' => esc_html__('Rating', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_control(
            'testi_rating_style_color',
            [
                'label' => esc_html__( 'Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area .star-area i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonials .single-slider i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-customers .icon-area i' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'testi_des_style',
             [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'testi_des_style_typ',
                'selector' => '{{WRAPPER}} p.fs-four',
        
            ]
        );
        
        $this->add_control(
            'testi_des_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p.fs-four' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'testi_name_style',
             [
                'label' => esc_html__('Name', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'testi_name_style_typ',
                'selector' => '{{WRAPPER}} h5.mb-2,h5.pt-8.pb-3,.profile-info h2',
        
            ]
        );
        
        $this->add_control(
            'testi_name_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h5.mb-2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} h5.pt-8.pb-3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .profile-info h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'testi_dedds_style',
             [
                'label' => esc_html__('Designation/Address', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'esti_dedds_style_typ',
                'selector' => '{{WRAPPER}} .profile-info.pt-8 p,span.location.pe-5,.profile-info p',
        
            ]
        );
        
        $this->add_control(
            'esti_dedds_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .profile-info.pt-8 p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} span.location.pe-5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .profile-info p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'testi_date_style',
             [
                'label' => esc_html__('Date', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'datee_color',
            [
                'label' => esc_html__( 'Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testidate' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'testi_card_style',
             [
                'label' => esc_html__('Card', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_control(
            'spinfsdfner_color',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials .single-slider' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-customers .single-slider' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'spinnfdfer_color',
            [
                'label' => esc_html__( 'Border Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials .single-slider' => 'border:8px solid {{VALUE}}',
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
            jQuery(".testimonial-sec-carousel").not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                fade: false,
                infinite: true,
                pauseOnFocus: false,
                pauseOnHover: false,
                arrows: false,
                prevArrow: "<button type='button' aria-label='Slide Prev' class='arafat-prev box-style bottom-right pull-left'><i class=\"material-symbols-outlined mat-icon\"  aria-hidden='true'>arrow_right_alt</i> <span class='bg-obj'></span> </button>",
                nextArrow: "<button type='button' aria-label='Slide Next' class='arafat-next box-style bottom-right pull-right'><i class=\"material-symbols-outlined mat-icon\"  aria-hidden='true'>arrow_right_alt</i> <span class='bg-obj'></span> </button>",
                dots: false,
                dotsClass: 'section-dots',
                customPaging: function(slider, i) {
                    var slideNumber = (i + 1),
                        totalSlides = slider.slideCount;
                    return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
                },
                responsive: [{
                    breakpoint: 575,
                    settings: {
                        arrows: false,
                    }
                }, ]
            });


            jQuery(".testimonials-carousel").not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                fade: true,
                infinite: true,
                pauseOnFocus: false,
                pauseOnHover: false,
                arrows: true,
                prevArrow: "<button type='button' aria-label='Slide Prev' class='arafat-prev box-style bottom-right pull-left'><i class=\"material-symbols-outlined mat-icon\"  aria-hidden='true'>arrow_right_alt</i> <span class='bg-obj'></span> </button>",
                nextArrow: "<button type='button' aria-label='Slide Next' class='arafat-next box-style bottom-right pull-right'><i class=\"material-symbols-outlined mat-icon\"  aria-hidden='true'>arrow_right_alt</i> <span class='bg-obj'></span> </button>",
                dots: true,
                dotsClass: 'slick-double-dots',
                customPaging: function(slider, i) {
                    var slideNumber = (i + 1),
                        totalSlides = slider.slideCount;
                    return '<div class="dots" title="' + slideNumber + ' of ' + totalSlides + '"></div><a class="progressBar fs-five" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '</span><span class="totalString">' + totalSlides + '</span></a>';
                },
                responsive: [{
                    breakpoint: 575,
                    settings: {
                        arrows: false,
                    }
                }, ]
            });

            jQuery(".customers-carousel").not('.slick-initialized').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 700,
                fade: false,
                infinite: true,
                pauseOnFocus: false,
                pauseOnHover: false,
                arrows: false,
                prevArrow: "<button type='button' aria-label='Slide Prev' class='arafat-prev box-style bottom-right pull-left'><i class=\"material-symbols-outlined mat-icon\"  aria-hidden='true'>arrow_right_alt</i> <span class='bg-obj'></span> </button>",
                nextArrow: "<button type='button' aria-label='Slide Next' class='arafat-next box-style bottom-right pull-right'><i class=\"material-symbols-outlined mat-icon\"  aria-hidden='true'>arrow_right_alt</i> <span class='bg-obj'></span> </button>",
                dots: false,
                dotsClass: 'slick-double-dots',
                customPaging: function(slider, i) {
                    var slideNumber = (i + 1),
                        totalSlides = slider.slideCount;
                    return '<div class="dots" title="' + slideNumber + ' of ' + totalSlides + '"></div><a class="progressBar fs-five" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '</span><span class="totalString">' + totalSlides + '</span></a>';
                },
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }, ]
            });
        });
        </script>



        <?php if ($settings['gamestorm_testimonial_content_style_selection'] == 'style_one') : ?>
            <section class="testimonial-area">
                <div class="container pt-120 pb-120">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="testimonial-sec-carousel">
                                <?php foreach ($settings['list_repeater'] as $item) : ?>
                                    <div class="slide-area">
                                        <div class="single-slider text-center">
                                            <?php if (!empty($item['testimonial_image']['url'])) :   ?>
                                                <div class="img-box">
                                                    <img src="<?php echo esc_url($item['testimonial_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                </div>
                                            <?php endif ?>
                                            <?php if (!empty($item['testi_rating'])) :   ?>
                                                <div class="star-area pt-3 pt-md-6 pb-4 pb-md-8">
                                                    <?php for ($i = 0; $i < $item['testi_rating']; $i++) : ?>
                                                        <i class="fas fa-star"></i>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endif ?>
                                            <?php if (!empty($item['testi_description'])) :   ?>
                                                <p class="fs-four"><?php echo esc_html($item['testi_description']) ?></p>
                                            <?php endif ?>
                                            <div class="profile-info pt-8">
                                                <?php if (!empty($item['testi_name'])) :   ?>
                                                    <h5 class="mb-2"><?php echo esc_html($item['testi_name']) ?></h5>
                                                <?php endif ?>
                                                <?php if (!empty($item['testi_designation'])) :   ?>
                                                    <p><?php echo esc_html($item['testi_designation']) ?></p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>



        <?php if ($settings['gamestorm_testimonial_content_style_selection'] == 'style_two') : ?>

            <section class="testimonials">
                <div class="container pt-120">
                    <div class="row justify-content-end">
                        <div class="col-lg-7">
                            <div class="testimonials-carousel">


                                <?php foreach ($settings['list_repeater_two'] as $item) : ?>

                                    <div class="slide-area">
                                        <div class="single-slider px-4 px-sm-8 pt-8 pb-15 pb-sm-20 ">
                                            <?php if (!empty($item['testi_two_image']['url'])) :   ?>
                                                <div class="img-box">
                                                    <img src="<?php echo esc_url($item['testi_two_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                </div>
                                            <?php endif ?>
                                            <ul class="list pt-4 pb-6 d-flex gap-1 align-items-center">
                                                <?php for ($i = 0; $i < $item['testi_two_rating']; $i++) : ?>
                                                    <li>
                                                        <i class="material-symbols-outlined mat-icon"> <?php echo esc_html('star') ?> </i>
                                                    </li>
                                                <?php endfor; ?>
                                            </ul>
                                            <?php if (!empty($item['testi_two_description'])) :   ?>
                                                <p class="fs-four"><?php echo esc_html($item['testi_two_description']) ?></p>
                                            <?php endif ?>
                                            <?php if (!empty($item['testi_two_name'])) :   ?>
                                                <h5 class="pt-8 pb-3"><?php echo esc_html($item['testi_two_name']) ?></h5>
                                            <?php endif ?>
                                            <div class="location-date d-flex gap-5 spmarginbottom">
                                                <?php if (!empty($item['testi_two_country'])) :   ?>
                                                    <span class="location pe-5"><?php echo esc_html($item['testi_two_country']) ?></span>
                                                <?php endif ?>
                                                <?php if (!empty($item['testi_two_date'])) :   ?>
                                                    <span class="testidate"><?php echo esc_html($item['testi_two_date']) ?></span>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>



        <?php if ($settings['gamestorm_testimonial_content_style_selection'] == 'style_three') : ?>

            <section class="testimonial-customers">
                <div class="container pt-120 pb-120">
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
                        <div class="customers-carousel">

                            <?php foreach ($settings['list_three_repeater'] as $item) : ?>
                                <div class="slide-area">
                                    <div class="single-slider p-8">
                                        <div class="icon-area mb-2">
                                            <i class="material-symbols-outlined mat-icon fs-one"> <?php echo esc_html('format_quote') ?> </i>
                                        </div>
                                        <?php if (!empty($item['list_three_content'])) :   ?>
                                            <p class="fs-four"><?php echo esc_html($item['list_three_content']) ?></p>
                                        <?php endif ?>
                                        <div class="d-flex mt-8 gap-6 align-items-center">
                                            <?php if (!empty($item['list_three_image']['url'])) :   ?>
                                                <div class="img-box">
                                                    <img src="<?php echo esc_url($item['list_three_image']['url']) ?>" alt="<?php esc_attr('image') ?>">
                                                </div>
                                            <?php endif ?>

                                            <div class="profile-info">
                                                <?php if (!empty($item['list_three_title'])) :   ?>
                                                    <h5 class="mb-2"><?php echo esc_html($item['list_three_title']) ?></h5>
                                                <?php endif ?>
                                                <?php if (!empty($item['list_three_location_title'])) :   ?>
                                                    <p><?php echo esc_html($item['list_three_location_title']) ?></p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>



<?php
    }
}

$widgets_manager->register(new TP_Testimonial());
