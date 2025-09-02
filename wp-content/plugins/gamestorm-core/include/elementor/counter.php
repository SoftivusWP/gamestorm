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
class TP_Counter extends Widget_Base
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
        return 'tp-counter';
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
        return __('Counter', 'gamestorm-core');
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
        return ['gamestorm-core'];
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
        return ['gamestorm-core'];
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
            'gamestorm_counter_one_section_genaral',
            [
                'label' => esc_html__('General', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'gamestorm_counter_content_style_selection',
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
            'counter_one_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core'),
            ]
        );



        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'counter_icon',
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
            'list_repeater_title',
            [
                'label' => esc_html__('Name', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_repeater_number',
            [
                'label' => esc_html__('Number', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_repeater_number_param',
            [
                'label' => esc_html__('Parameter', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('M', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your parameter here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Counter List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_repeater_title' => esc_html__(' Unique Daily Users.', 'gamestorm-core'),
                        'list_repeater_number' => esc_html__('652', 'gamestorm-core'),
                        'list_repeater_number_param' => esc_html__('+', 'gamestorm-core'),
                    ],
                    [
                        'list_repeater_title' => esc_html__('Downloads', 'gamestorm-core'),
                        'list_repeater_number' => esc_html__('50', 'gamestorm-core'),
                        'list_repeater_number_param' => esc_html__('M', 'gamestorm-core'),
                    ],
                    [
                        'list_repeater_title' => esc_html__('Games Lunched', 'gamestorm-core'),
                        'list_repeater_number' => esc_html__('200', 'gamestorm-core'),
                        'list_repeater_number_param' => esc_html__('', 'gamestorm-core'),
                    ],
                    [
                        'list_repeater_title' => esc_html__('Gaming Projects Delivered', 'gamestorm-core'),
                        'list_repeater_number' => esc_html__('360', 'gamestorm-core'),
                        'list_repeater_number_param' => esc_html__('K', 'gamestorm-core'),
                    ],
                ],
                'title_field' => '{{{ list_repeater_title }}}',
            ]
        );


        $this->end_controls_section();


        // =============================Content Three=================================//

        $this->start_controls_section(
            'counter_three_reborn',
            [
                'label' => esc_html__('Reborn', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_counter_content_style_selection' => 'style_three'
                ]
            ]
        );


        $this->add_control(
            'reborn_show',
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


        $this->start_controls_section(
            'counter_three_video',
            [
                'label' => esc_html__('Video', 'gamestorm-core'),
                'condition' => [
                    'gamestorm_counter_content_style_selection' => 'style_three'
                ]
            ]
        );


        $this->add_control(
            'counter_three_video_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'counter_three_video_website_link',
            [
                'label' => esc_html__('Video Link', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gamestorm-core'),
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=0mmxEOnbqmc',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );


        $this->end_controls_section();


        // ============================Style==============================//

        $this->start_controls_section(
             'counter_icon_style',
             [
                'label' => esc_html__('Icon', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'counter_icon_style_color',
            [
                'label' => esc_html__( 'Icon Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section.index-two .icon-box svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'counter_icon_style_bac_color',
            [
                'label' => esc_html__( 'Icon Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section.index-two .icon-box' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'counter_number_style',
             [
                'label' => esc_html__('Number', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'counter_number_style_typ',
                'selector' => '{{WRAPPER}} .counter-section .display-one,.counter-section span',
                
        
            ]
        );
        
        $this->add_control(
            'counter_number_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .display-one, .counter-section span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} span.odometer-value' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} span.fs-two' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .our-focus.services-area .symbol' => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'counter_title_style',
             [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'counter_title_style_typ',
                'selector' => '{{WRAPPER}} .counter-section .single-box p,p.name-area.fs-six,p.name-area.fs-seven',

        
            ]
        );
        
        $this->add_control(
            'counter_title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-box p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} p.name-area.fs-six' => 'color: {{VALUE}};',
                    '{{WRAPPER}} p.name-area.fs-seven' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'counterbac_style',
             [
                'label' => esc_html__('Card', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'counterbac_style_background',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-box.active-area:before' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .counter-section.index-two .single-box' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'counter_btn_style',
             [
                'label' => esc_html__('Button', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gamestorm_counter_content_style_selection' => 'style_three'
                ]
             ]
        );
        
        $this->add_control(
            'counter_btn_style_c',
            [
                'label' => esc_html__( ' Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-style.btn-box-second' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'counter_btn_style_hc',
            [
                'label' => esc_html__( 'Hover Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-style.btn-box-second:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'counter_btn_style_bac',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-style.btn-box-second' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'counter_btn_style_bach',
            [
                'label' => esc_html__( 'Hover Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-style.btn-box-second:hover:before' => 'background-color: {{VALUE}}',
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
            jQuery(".odometer").each(function() {
                jQuery(this).isInViewport(function(status) {
                    if (status === "entered") {
                        var section = jQuery(this).closest(".counters");
                        section.find(".odometer").each(function() {
                            jQuery(this).html(jQuery(this).attr("data-odometer-final"));
                        });
                    }
                });
            });
        </script>



        <?php if ($settings['gamestorm_counter_content_style_selection'] == 'style_one') : ?>

            <div class="counter-section overflow-hidden">
                <div class="container">
                    <div class="row cus-mar">
                        <?php foreach ($settings['list_repeater'] as $item) : ?>
                            <div class="col-sm-6 col-xl-3">
                                <div class="single-box py-6 box-style box-first d-center position-relative">
                                    <?php if (!empty($item['list_repeater_number'])) :   ?>
                                        <div class="counters d-flex align-items-center">
                                            <span class="odometer display-one" data-odometer-final="<?php echo esc_attr($item['list_repeater_number']) ?>"><?php echo esc_html('0') ?></span>
                                            <?php if (!empty($item['list_repeater_number_param'])) :   ?>
                                                <span class="display-one symbol"><?php echo esc_html($item['list_repeater_number_param']) ?></span>
                                            <?php endif ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($item['list_repeater_title'])) :   ?>
                                        <p class="name-area fs-five position-absolute">
                                            <?php echo esc_html($item['list_repeater_title']) ?>
                                        </p>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>





        <?php if ($settings['gamestorm_counter_content_style_selection'] == 'style_two') : ?>

            <div class="counter-section index-two">
                <div class="container">
                    <div class="row cus-mar">
                        <?php foreach ($settings['list_repeater'] as $item2) : ?>

                            <div class="col-lg-4 col-md-6">
                                <div class="single-box text-center py-6 box-style box-first">
                                    <?php if (!empty($item2['counter_icon'])) :   ?>
                                        <div class="icon-box d-center m-auto">
                                            <?php \Elementor\Icons_Manager::render_icon($item2['counter_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($item2['list_repeater_number'])) :   ?>
                                        <div class="counters pt-6 pb-3 d-center">
                                            <span class="odometer fs-two heading" data-odometer-final="<?php echo esc_attr($item2['list_repeater_number']) ?>"><?php esc_html('0') ?></span>
                                            <?php if (!empty($item2['list_repeater_number_param'])) :   ?>
                                                <span class="fs-two ms-3"><?php echo esc_html($item2['list_repeater_number_param']) ?></span>
                                            <?php endif ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($item2['list_repeater_title'])) :   ?>
                                        <p class="name-area fs-six">
                                            <?php echo esc_html($item2['list_repeater_title']) ?>
                                        </p>
                                </div>
                            <?php endif ?>

                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>


        <?php if ($settings['gamestorm_counter_content_style_selection'] == 'style_three') : ?>
            <section class="our-focus services-area position-relative pt-120">
                <?php if (!empty($settings['reborn_show'] == 'yes')) :   ?>
                    <div class="shape-area">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/line-1.png" class="shape-1" alt="icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/object-1.png" class="shape-2" alt="icon">
                    </div>
                <?php endif ?>

                <div class="container">
                    <div class="row cus-mar pb-120">
                        <?php foreach ($settings['list_repeater'] as $item) : ?>
                            <div class="col-sm-6 col-xl-3">
                                <div class="single-box d-grid justify-content-center">
                                    <div class="counters d-center">
                                        <?php if (!empty($item['list_repeater_number'])) :   ?>
                                            <span class="odometer display-one" data-odometer-final="<?php echo esc_attr($item['list_repeater_number']) ?>"><?php echo esc_html('0') ?></span>
                                            <?php if (!empty($item['list_repeater_number_param'])) :   ?>
                                                <span class="display-one symbol"><?php echo esc_html($item['list_repeater_number_param']) ?></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </div>
                                    <?php if (!empty($item['list_repeater_title'])) :   ?>
                                        <p class="name-area fs-seven">
                                            <?php echo esc_html($item['list_repeater_title']) ?>
                                        </p>
                                    <?php endif ?>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="position-relative d-center">
                                <?php if (!empty($settings['counter_three_video_image']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['counter_three_video_image']['url']) ?>" class="w-100" alt="<?php echo esc_attr('image') ?>">
                                <?php endif ?>
                                <?php if (!empty($settings['counter_three_video_website_link']['url'])) :   ?>
                                    <a href="<?php echo esc_url($settings['counter_three_video_website_link']['url']) ?>" class="box-style btn-box-second heading-five fs-five mfp-iframe popupvideo text-uppercase d-center position-absolute">
                                        <?php echo esc_html__('Play', 'gamestorm') ?>
                                    </a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TP_Counter());
