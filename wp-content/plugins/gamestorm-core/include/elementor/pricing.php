<?php

namespace TPCore\Widgets;

use Elementor\Widget_Base;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Utils;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;


if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Pricing extends Widget_Base
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
        return 'tp-pricing';
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
        return __('Pricing', 'tpcore');
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
            'pricing_heading_section',
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



        $this->start_controls_section(
            'pricing_content_section',
            [
                'label' => esc_html__('Pricing', 'gamestorm-core')
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'price_title_section',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Concept Art', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'more_options',
            [
                'label' => esc_html__('First Price Info', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'price_one_name',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Character Modeling', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your character name here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price_one_amount',
            [
                'label' => esc_html__('Amount', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your amount here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price_one_chareacter',
            [
                'label' => esc_html__('Character', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Per Character', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your character here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );





        $repeater->add_control(
            'more_optionfs',
            [
                'label' => esc_html__('Second Price Info', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'price_two_name',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Character Modeling', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your character name here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price_two_amount',
            [
                'label' => esc_html__('Amount', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your amount here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price_two_chareacter',
            [
                'label' => esc_html__('Character', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Per Character', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your character here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );





        $repeater->add_control(
            'more_optidfons',
            [
                'label' => esc_html__('Third Price Info', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'price_three_name',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Character Modeling', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your character name here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price_three_amount',
            [
                'label' => esc_html__('Amount', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your amount here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price_three_chareacter',
            [
                'label' => esc_html__('Character', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Per Character', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your character here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'more_opfdftions',
            [
                'label' => esc_html__('Button', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'price_btn_text',
            [
                'label' => esc_html__('Button Text', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started Now', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your button text here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'price_website_link',
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
            'list_repeater',
            [
                'label' => esc_html__('Price List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'price_title_section' => esc_html__('Concept Art', 'gamestorm-core'),
                        'price_one_name' => esc_html__('Character Modeling', 'gamestorm-core'),
                        'price_one_amount' => esc_html__('$500-$2500', 'gamestorm-core'),
                        'price_one_chareacter' => esc_html__('Per Character', 'gamestorm-core'),
                        'price_two_name' => esc_html__('Character Modeling', 'gamestorm-core'),
                        'price_two_amount' => esc_html__('$1000-$5000', 'gamestorm-core'),
                        'price_two_chareacter' => esc_html__('Per Character', 'gamestorm-core'),
                        'price_thee_name' => esc_html__('Character Modeling', 'gamestorm-core'),
                        'price_three_amount' => esc_html__('$5000-$1000', 'gamestorm-core'),
                        'price_three_chareacter' => esc_html__('Per Character', 'gamestorm-core'),
                        'price_btn_text' => esc_html__('Get Started Now', 'gamestorm-core'),
                    ],
                ],
                'title_field' => '{{{ price_title_section }}}',
            ]
        );







        $this->end_controls_section();

        // ========================================Style=======================================//

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
             'price_style_name',
             [
                'label' => esc_html__('Name', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'price_style_name_typ',
                'selector' => '{{WRAPPER}} h3.visible-slowly-bottom.mb-sm-10',
        
            ]
        );
        
        $this->add_control(
            'price_style_name_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h3.visible-slowly-bottom.mb-sm-10' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'price_style_title',
             [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'spifdfhnner_typ',
                'selector' => '{{WRAPPER}} .fst',
        
            ]
        );
        
        $this->add_control(
            'spifsfnner_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fst' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'price_style_price',
             [
                'label' => esc_html__('Price', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'spinneffffr_typ',
                'selector' => '{{WRAPPER}} span.fs-three.heading.py-3',
        
            ]
        );
        
        $this->add_control(
            'spinnffffer_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} span.fs-three.heading.py-3' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'price_style_charec',
             [
                'label' => esc_html__('Character', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'spinaaner_typ',
                'selector' => '{{WRAPPER}} .tst',
        
            ]
        );
        
        $this->add_control(
            'spinffner_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tst' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'price_style_btn',
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
             'descardion_style',
             [
                'label' => esc_html__('Card', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'spincardner_color',
            [
                'label' => esc_html__( ' Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-plan .single-box' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'spincardner_cfdsfolor',
            [
                'label' => esc_html__( 'Price Card Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-plan .single-box .single-radio' => 'background: {{VALUE}}',
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

        <section class="pricing-plan pt-120 pb-120">
            <div class="container">
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
            </div>
            <div class="container">
                <div class="row cus-mar justify-content-end">
                    <?php foreach ($settings['list_repeater'] as $item) : ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="single-box py-5 py-sm-10 px-3 px-sm-6">
                                <?php if (!empty($item['price_title_section'])) :   ?>
                                    <h3 class="visible-slowly-bottom  mb-sm-10"><?php echo esc_html($item['price_title_section']) ?></h3>
                                <?php endif ?>
                                <div class="radio-radio-item d-grid gap-3">
                                    <label class="single-radio position-relative d-flex align-items-center p-5 ps-15">
                                        <span class="text-start d-grid">
                                            <?php if (!empty($item['price_one_name'])) :   ?>
                                                <span class="fst"><?php echo esc_html($item['price_one_name']) ?></span>
                                            <?php endif ?>
                                            <?php if (!empty($item['price_one_amount'])) :   ?>
                                                <span class="fs-three heading py-3"><?php echo esc_html($item['price_one_amount']) ?></span>
                                            <?php endif ?>
                                            <?php if (!empty($item['price_one_chareacter'])) :   ?>
                                                <span class="tst"><?php echo esc_html($item['price_one_chareacter']) ?></span>
                                            <?php endif ?>
                                        </span>
                                        <input type="radio" name="pricing-select">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="single-radio position-relative d-flex align-items-center p-5 ps-15">
                                        <span class="text-start d-grid">
                                            <?php if (!empty($item['price_two_name'])) :   ?>
                                                <span class="fst"><?php echo esc_html($item['price_two_name']) ?></span>
                                            <?php endif ?>
                                            <?php if (!empty($item['price_two_amount'])) :   ?>
                                                <span class="fs-three heading py-3"><?php echo esc_html($item['price_two_amount']) ?></span>
                                            <?php endif ?>
                                            <?php if (!empty($item['price_two_chareacter'])) :   ?>
                                                <span class="tst"><?php echo esc_html($item['price_two_chareacter']) ?></span>
                                            <?php endif ?>
                                        </span>
                                        <input type="radio" name="pricing-select">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="single-radio position-relative d-flex align-items-center p-5 ps-15">
                                        <span class="text-start d-grid">
                                            <?php if (!empty($item['price_three_name'])) :   ?>
                                                <span class="fst"><?php echo esc_html($item['price_three_name']) ?></span>
                                            <?php endif ?>
                                            <?php if (!empty($item['price_three_amount'])) :   ?>
                                                <span class="fs-three heading py-3"><?php echo esc_html($item['price_three_amount']) ?></span>
                                            <?php endif ?>
                                            <?php if (!empty($item['price_three_chareacter'])) :   ?>
                                                <span class="tst"><?php echo esc_html($item['price_three_chareacter']) ?></span>
                                            <?php endif ?>
                                        </span>
                                        <input type="radio" name="pricing-select">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="btn-area text-center  mt-sm-10 alt-bg">
                                    <?php if (!empty($item['price_btn_text'])) :   ?>
                                        <a href="<?php echo esc_html($item['price_website_link']['url']) ?>" class="box-style btn-box d-center">
                                            <?php echo esc_html($item['price_btn_text']) ?>
                                        </a>
                                    <?php endif ?>
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

$widgets_manager->register(new TP_Pricing());
