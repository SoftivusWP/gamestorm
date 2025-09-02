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
class TP_Calltoaction extends Widget_Base
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
        return 'tp-calltoaction';
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
        return __('Call To Action', 'tpcore');
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
            'call_to_action_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );



        $this->add_control(
            'call_to_action_subtitle',
            [
                'label' => esc_html__('Subtitle', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started On Your Next Big Game Idea With Us', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'call_to_action_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Bring Ideas To Life With Our Game Dev Solutions', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'call_to_action_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Take your gaming experience to the next level with our exceptional game development services.Unlock the full potential of your game with our premium game art and expert game development services.', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );
        $this->add_control(
            'call_to_action_btn_title',
            [
                'label' => esc_html__('Button Text', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started Now', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'call_website_link',
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


        // =============================Style===============================//



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
            'service_three_button',
            [
               'label' => esc_html__('Button', 'plugin-name'),
               'tab'   => Controls_Manager::TAB_STYLE,
            ]
       );
       
       $this->add_control(
           'service_threestyle_text_color',
           [
               'label' => esc_html__( ' Color', 'plugin-name' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} a.box-style.d-center.px-3.gap-3.m-auto' => 'color: {{VALUE}}',
               ],
           ]
       );
       
       $this->add_control(
           'service_threestyle_bac_color',
           [
               'label' => esc_html__( 'Backgrond Color', 'plugin-name' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .box-style::before' => 'background-color: {{VALUE}}',
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

        <section class="call-to-action index-two pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="section-text text-center">
                            <?php if (!empty($settings['call_to_action_subtitle'])) :   ?>
                                <h4 class="sub-title"><?php echo wp_kses($settings['call_to_action_subtitle'], wp_kses_allowed_html('post'))  ?></h4>
                            <?php endif ?>
                            <?php if (!empty($settings['call_to_action_title'])) :   ?>
                                <span class="display-four mb-6 w-75 m-auto"><?php echo wp_kses($settings['call_to_action_title'], wp_kses_allowed_html('post'))  ?></span>
                            <?php endif ?>
                            <?php if (!empty($settings['call_to_action_description'])) :   ?>
                                <p class="w-75 m-auto"><?php echo wp_kses($settings['call_to_action_description'], wp_kses_allowed_html('post'))  ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center btn-movement">
                            <?php if (!empty($settings['call_to_action_btn_title'])) :   ?>
                                <a href="<?php echo esc_url($settings['call_website_link']['url']) ?>" class="box-style d-center text-start px-3 gap-3 m-auto">
                                    <?php echo esc_html($settings['call_to_action_btn_title']) ?>
                                    <i class="material-symbols-outlined"> <?php echo esc_html('call_made') ?> </i>
                                </a>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php
    }
}

$widgets_manager->register(new TP_Calltoaction());
