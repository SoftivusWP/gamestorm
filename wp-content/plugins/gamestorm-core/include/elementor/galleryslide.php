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
class TP_Gallery_Slide extends Widget_Base
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
        return 'tp-gallery-slide';
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
        return __('Gallery Slide', 'tpcore');
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
            'galleryt_slider_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gallery_slide_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'gallery_slide_icon',
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
            'gallery_slide_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gallery_slidewebsite_link',
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



        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Gallery List', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );



        $this->end_controls_section();


        // ===========================Style==========================//

        $this->start_controls_section(
             'desfdigmation_style',
             [
                'label' => esc_html__('Content', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_control(
            'spifdnner_color',
            [
                'label' => esc_html__( 'Title Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .instagram-post i, .instagram-post span' => 'color: {{VALUE}}',
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
            jQuery(".instagram-post-carousel").not('.slick-initialized').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1000,
                centerMode: true,
                customPaging: "80px",
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
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ]
            });
            });
        </script>


        <section class="instagram-post">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="instagram-post-carousel">
                        <?php foreach ($settings['list_repeater'] as $item) : ?>
                            <div class="slide-area">
                                <div class="img-box d-inline-flex d-center text-center position-relative">
                                    <?php if (!empty($item['gallery_slide_image']['url'])) :   ?>
                                        <img src="<?php echo esc_url($item['gallery_slide_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                    <?php endif ?>
                                    <a href="<?php echo esc_url($item['gallery_slidewebsite_link']['url']) ?>" class="abs-area position-absolute d-center gap-2 p-4">
                                        <?php if (!empty($item['gallery_slide_icon'])) :   ?>
                                            <?php \Elementor\Icons_Manager::render_icon($item['gallery_slide_icon'], ['aria-hidden' => 'true']); ?>
                                        <?php endif ?>
                                        <?php if (!empty($item['gallery_slide_title'])) :   ?>
                                            <span><?php echo esc_html($item['gallery_slide_title']) ?></span>
                                        <?php endif ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>


<?php
    }
}

$widgets_manager->register(new TP_Gallery_Slide());
