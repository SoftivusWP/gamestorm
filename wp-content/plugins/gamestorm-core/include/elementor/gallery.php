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
class TP_Gallery extends Widget_Base
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
        return 'tp-gallery-one';
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
        return __('Gallery One', 'tpcore');
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
            'gallery_one_heading',
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
            'gallery_one_content',
            [
                'label' => esc_html__('Gallery', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'gallery_one_content_image_one',
            [
                'label' => esc_html__('Choose Image One', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gallery_one_content_image_two',
            [
                'label' => esc_html__('Choose Image Two', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gallery_one_content_image_three',
            [
                'label' => esc_html__('Choose Image Three', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gallery_one_content_image_four',
            [
                'label' => esc_html__('Choose Image Four', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gallery_one_content_image_five',
            [
                'label' => esc_html__('Choose Image Five', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'gallery_one_join',
            [
                'label' => esc_html__('Join Us', 'gamestorm-core')
            ]
        );


        $this->add_control(
            'gallery_one_join_sub_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Join Us', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gallery_one_join_description',
            [
                'label' => esc_html__('Description', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
            ]
        );

        $this->add_control(
            'gallery_one_join_btn_title',
            [
                'label' => esc_html__('Button Text', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Check Open Positions', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your button text here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gallery_one_website_link',
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
               'selector' => '{{WRAPPER}} .section-text p,.com-title',
             
        
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
             'gallery_title_style',
             [
                'label' => esc_html__('title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'gallery_title_style_typ',
                'selector' => '{{WRAPPER}} span.display-four.visible-slowly-bottom.mb-4',
        
            ]
        );
        
        $this->add_control(
            'gallery_title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} span.display-four.visible-slowly-bottom.mb-4' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'gallery_des_style',
             [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'gallery_des_style_typ',
                'selector' => '{{WRAPPER}} .join-us.text-center p',
        
            ]
        );
        
        $this->add_control(
            'gallery_des_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .join-us.text-center p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'gallery_btn_style',
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





        <section class="life-gamestorm pt-120 pb-120">
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
                <div class="row">
                    <div class="col-lg-12">


                        <div class="post-img d-grid gap-3 gap-md-6 justify-content-between">
                            <div class="single d-flex gap-3 gap-md-6">
                                <?php if (!empty($settings['gallery_one_content_image_one']['url'])) :   ?>
                                    <div class="items">
                                        <img src="<?php echo esc_url($settings['gallery_one_content_image_one']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                    </div>
                                <?php endif ?>
                                <?php if (!empty($settings['gallery_one_content_image_two']['url'])) :   ?>
                                    <div class="items">
                                        <img src="<?php echo esc_url($settings['gallery_one_content_image_two']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="single d-flex gap-3 gap-md-6">
                                <?php if (!empty($settings['gallery_one_content_image_three']['url'])) :   ?>
                                    <div class="items">
                                        <img src="<?php echo esc_url($settings['gallery_one_content_image_three']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                    </div>
                                <?php endif ?>
                                <?php if (!empty($settings['gallery_one_content_image_four']['url'])) :   ?>
                                    <div class="items">
                                        <img src="<?php echo esc_url($settings['gallery_one_content_image_four']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                    </div>
                                <?php endif ?>
                                <?php if (!empty($settings['gallery_one_content_image_five']['url'])) :   ?>
                                    <div class="items">
                                        <img src="<?php echo esc_url($settings['gallery_one_content_image_five']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>



                        <div class="row justify-content-center mt-10 mt-md-20">
                            <div class="col-lg-5">
                                <div class="join-us text-center">
                                    <?php if (!empty($settings['gallery_one_join_sub_title'])) :   ?>
                                        <span class="display-four visible-slowly-bottom mb-4"><?php echo esc_html($settings['gallery_one_join_sub_title']) ?></span>
                                    <?php endif ?>
                                    <?php if (!empty($settings['gallery_one_join_description'])) :   ?>
                                        <p><?php echo esc_html($settings['gallery_one_join_description']) ?></p>
                                    <?php endif ?>
                                    <div class="btn-area alt-bg mt-md-10 spmargin">
                                        <?php if (!empty($settings['gallery_one_website_link']['url'])) :   ?>
                                            <a href="<?php echo esc_url($settings['gallery_one_website_link']['url']) ?>" class="box-style btn-box d-center">
                                                <?php echo esc_html($settings['gallery_one_join_btn_title']) ?>
                                            </a>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




<?php
    }
}

$widgets_manager->register(new TP_Gallery());
