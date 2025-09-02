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
class TP_Offer extends Widget_Base
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
        return 'tp-offer';
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
        return __('Offer', 'tpcore');
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
            'offer_heading_general_content',
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
            'offer_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
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
                'default' => esc_html__('Creativity', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Striving to bring imagination, original ideas, and excitement to everything we do', 'gamestorm-core'),
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
                        'list_title' => esc_html__('Creativity', 'gamestorm-core'),
                        'list_content' => esc_html__('Striving to bring imagination, original ideas, and excitement to everything we do', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Pioneering', 'gamestorm-core'),
                        'list_content' => esc_html__('Striving to bring imagination, original ideas, and excitement to everything we do', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Passion', 'gamestorm-core'),
                        'list_content' => esc_html__('Striving to bring imagination, original ideas, and excitement to everything we do', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Determination', 'gamestorm-core'),
                        'list_content' => esc_html__('Striving to bring imagination, original ideas, and excitement to everything we do', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Learning', 'gamestorm-core'),
                        'list_content' => esc_html__('Striving to bring imagination, original ideas, and excitement to everything we do', 'gamestorm-core'),
                    ],
                    [
                        'list_title' => esc_html__('Teamwork', 'gamestorm-core'),
                        'list_content' => esc_html__('Striving to bring imagination, original ideas, and excitement to everything we do', 'gamestorm-core'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
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
            jQuery(".we-offer-carousel").not('.slick-initialized').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                centerMode: true,
                autoplay: true,
                variableWidth: true,
                autoplaySpeed: 1000,
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
                        breakpoint: 1500,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            centerMode: true,
                        }
                    },
                ]
            });
            });
        </script>


        <section class="gaming-character overflow-hidden ongoing-values what-we-offer bg-transparent pt-120">
            <div class="container">
                <div class="row section-header justify-content-center">
                    <div class="col-lg-7 text-center">
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
            <div class="container-fluid">
                <div class="we-offer-carousel cus-mar">
                    <?php foreach ($settings['list_repeater'] as $item) : ?>
                        <div class="slide-area">
                            <div class="single-slider">
                                <div class="single-box p-5 py-sm-10 px-sm-8 box-style box-first">
                                    <?php if (!empty($item['list_icon'])) :   ?>
                                        <div class="icon-box d-center">
                                            <?php \Elementor\Icons_Manager::render_icon($item['list_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($item['list_title'])) :   ?>
                                        <h3 class="mt-6 pb-2"><?php echo esc_html($item['list_title']) ?></h3>
                                    <?php endif ?>
                                    <?php if (!empty($item['list_content'])) :   ?>
                                        <p><?php echo esc_html($item['list_content']) ?></p>
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

$widgets_manager->register(new TP_Offer());
