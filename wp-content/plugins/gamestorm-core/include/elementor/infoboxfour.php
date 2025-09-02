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
class TP_Infoboxfour extends Widget_Base
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
        return 'tp-infoboxfour';
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
        return __('Info Box Four', 'tpcore');
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
            'infobox_heading',
            [
                'label' => esc_html__('Heading', 'gamestorm-core'),
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



        $this->end_controls_section();


        $this->start_controls_section(
            'infobox_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core'),
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
                'default' => esc_html__('List Title', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('List Content', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Info List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Customized Game Art And Development', 'gamestorm-core'),
                        'list_content' => esc_html__('All our services, from art creation to a full-fledged game, are implemented using flexible methodologies and taking into account all client requirements for an effective result.', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Transparent & Reliable Communication', 'gamestorm-core'),
                        'list_content' => esc_html__('The client has constant access & the ability to control entire workflow & receive instant feedback on any aspect of their interest, which ensures repeat business in 90% of cases.', 'gamestorm-core'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );



        $this->end_controls_section();

        // ========================Style=========================//

        $this->start_controls_section(
            'heading_style',
            [
               'label' => esc_html__('Heading', 'plugin-name'),
               'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
    
        
        
        
        
        
   
        
        $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'plugin-name'),
               'name'     => 'about_section_style_title_typ',
               'selector' => '{{WRAPPER}} h2.visible-slowly-bottom.sub-title',
        
           ]
        );
        
        $this->add_control(
           'about_section_style_title_color',
           [
               'label'     => esc_html__('Color', 'plugin-name'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} h2.visible-slowly-bottom.sub-title' => 'color: {{VALUE}};',
                  
               ],
           ]
        );
        
        $this->add_control(
           'about_section_style_title_color_fill',
           [
               'label'     => esc_html__('Fill Color', 'plugin-name'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} h2.visible-slowly-bottom.sub-title span' => 'color: {{VALUE}} !important;',
               ],
           ]
        );

        
        $this->end_controls_section();


        $this->start_controls_section(
             'info_style_icon',
             [
                'label' => esc_html__('Icon', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'info_style_icon_icon_color',
            [
                'label' => esc_html__( ' Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-game-features .icon-box svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'info_style_icon_icon_bac_color',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-game-features .icon-box' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'info_style_title',
             [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'info_style_title_typ',
                'selector' => '{{WRAPPER}} .info-box h5',
        
            ]
        );
        
        $this->add_control(
            'info_style_titlfe_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-box h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'info_style_titlfdfe_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-game-features .single-box:hover h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'info_style_des',
             [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'info_style_des_typ',
                'selector' => '{{WRAPPER}} .info-box p',
        
            ]
        );
        
        $this->add_control(
            'info_style_des_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-box p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'info_style_card',
             [
                'label' => esc_html__('Box', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_control(
            'info_style_cardcolor',
            [
                'label' => esc_html__( 'Background', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-game-features .single-box' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'info_style_card_hj_color',
            [
                'label' => esc_html__( 'Hover Background', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-game-features .single-box:hover' => 'background: {{VALUE}}',
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

 



        <section class="our-game-features pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-text text-center">
                        <?php if (!empty($settings['gamestorm_heading_one_content_one_title'])) :   ?>
                            <h2 class="visible-slowly-bottom sub-title"><?php echo wp_kses($settings['gamestorm_heading_one_content_one_title'], wp_kses_allowed_html('post'))  ?></h2>
                        <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="row cus-mar">
                <?php foreach ($settings['list_repeater'] as $item) : ?>

                    <div class="col-md-6">
                        <div class="single-box flex-wrap box-style box-second px-5 py-5 py-10 px-9 d-center justify-content-between">
                            <div class="content-box d-flex gap-4 gap-md-6">
                            <?php if (!empty($item['list_icon'])) :   ?>
                                <div class="icon-box d-inline-flex d-center">
                                    <?php \Elementor\Icons_Manager::render_icon($item['list_icon'], ['aria-hidden' => 'true']); ?>
                                </div>
                            <?php endif;?>
                                <div class="info-box">
                                     <?php if (!empty($item['list_title'])) :   ?>
                                        <h5 class="mb-2"><?php echo esc_html($item['list_title']) ?></h5>
                                    <?php endif;?>
                                    <?php if (!empty($item['list_content'])) :   ?>
                                        <p><?php echo esc_html($item['list_content']) ?></p>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach;?>
                </div>
            </div>
        </section>


<?php
    }
}

$widgets_manager->register(new TP_Infoboxfour());
