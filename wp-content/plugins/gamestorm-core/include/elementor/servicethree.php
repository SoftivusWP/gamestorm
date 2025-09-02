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
class TP_Servicethree extends Widget_Base
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
        return 'tp-servicethree';
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
        return __('Service Three', 'tpcore');
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


    public function get_post_list_by_post_type($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => -1,
            'post_status'      => 'publish',
        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[get_the_ID()] = get_the_title();
        }
        wp_reset_query();
        return $return_val;
    }

    public function get_all_post_key($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => 6,
            'post_status'      => 'publish',

        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[] = get_the_ID();
        }
        wp_reset_query();
        return $return_val;
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
            'service_three_heading_content',
            [
                'label' => esc_html__('Heading', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'service_three_heading_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Recently Completed', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'service_three_heading_content_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Game Development And Art, Elevated To A New Level', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'service_three_heading_btn_text',
            [
                'label' => esc_html__('Button Text', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Projects', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your button text here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'ser_thre_website_link',
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



        $this->start_controls_section(
            'service_three_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'services_three_category',
            [
                'label' => __('Select Services', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('services'),
                'default'     => $this->get_all_post_key('services'),
            ]
        );


        $this->add_control(
            'service_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 4,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'service_template_order_by',
            [
                'label'   => esc_html__('Order By', 'corelaw-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'corelaw-core'),
                    'author'     => esc_html__('Post Author', 'corelaw-core'),
                    'title'      => esc_html__('Title', 'corelaw-core'),
                    'post_date'  => esc_html__('Date', 'corelaw-core'),
                    'rand'       => esc_html__('Random', 'corelaw-core'),
                    'menu_order' => esc_html__('Menu Order', 'corelaw-core'),
                ],
            ]
        );
        $this->add_control(
            'service_template_order',
            [
                'label'   => esc_html__('Order', 'corelaw-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'corelaw-core'),
                    'desc' => esc_html__('Descending', 'corelaw-core')
                ],
                'default' => 'desc',
            ]
        );


        $this->end_controls_section();

        // ====================Style=================//


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


        $this->start_controls_section(
             'service_threes_title_tyle',
             [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'service_threes_title_tyle_typ',
                'selector' => '{{WRAPPER}} .content-box.p-3.p-sm-8 h3',
        
            ]
        );
        
        $this->add_control(
            'service_threes_title_tyle_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-box.p-3.p-sm-8 h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'service_threes_desc_tyle',
             [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'service_threes_desc_tyle_typ',
                'selector' => '{{WRAPPER}} .content-box.p-3.p-sm-8 p',
        
            ]
        );
        
        $this->add_control(
            'service_threes_desc_tyle_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-box.p-3.p-sm-8 p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'service_threes_icon_tyle',
             [
                'label' => esc_html__('icon', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'service_threes_icon_tyle_color',
            [
                'label' => esc_html__( 'Title Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recently-completed .end-area i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'service_threes_icon_tyleba_color',
            [
                'label' => esc_html__( 'Title Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recently-completed .end-area' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'service_three_card_style',
             [
                'label' => esc_html__('Box', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'spifdsfdsfnner_color',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recently-completed .content-box' => 'background: {{VALUE}}',
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

        $query = new \WP_Query(
            array(
                'post_type'      => 'services',
                'posts_per_page' => $settings['service_posts_per_page'],
                'orderby'        => $settings['service_template_order_by'],
                'order'          => $settings['service_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish',
                'post__in'          => $settings['services_three_category'],
            )
        );

        ?>

        <script>
            jQuery(document).ready(function($) {
            jQuery(".recently-completed-carousel").not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                fade: true,
                infinite: true,
                pauseOnFocus: false,
                pauseOnHover: false,
                arrows: false,
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
        });
        </script>





        <section class="recently-completed">
            <div class="container pt-120 pb-120">
                <div class="row section-header justify-content-between align-items-center">
                    <div class="col-lg-8">
                        <?php if (!empty($settings['service_three_heading_content_subtitle'])) :   ?>
                            <h4 class="sub-title"><?php echo wp_kses($settings['service_three_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></h4>
                        <?php endif ?>
                        <?php if (!empty($settings['service_three_heading_content_title'])) :   ?>
                            <span class="fs-two heading mb-6"><?php echo wp_kses($settings['service_three_heading_content_title'], wp_kses_allowed_html('post'))  ?></span>
                        <?php endif ?>

                    </div>
                    <div class="col-lg-3 btn-movement">
                        <?php if (!empty($settings['service_three_heading_btn_text'])) :   ?>
                            <a href="<?php echo esc_url($settings['ser_thre_website_link']['url']) ?>" class="box-style d-center px-3 gap-3 m-auto">
                                <?php echo esc_html($settings['service_three_heading_btn_text']) ?>
                                <i class="material-symbols-outlined"> <?php echo esc_html('call_made') ?> </i>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-lg-12">
                        <div class="recently-completed-carousel">
                            <?php
                                    if ($query->have_posts()) {
                                        while ($query->have_posts()) {
                                            $query->the_post();
                                            ?>

                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="slide-area">
                                            <div class="single-slider position-relative d-grid align-items-center">

                                                <div class="img-box">
                                                    <?php the_post_thumbnail() ?>
                                                </div>

                                                <div class="position-absolute cus-position start-0">
                                                    <div class="content-box p-3 p-sm-8">
                                                        <a href="<?php the_permalink() ?>">
                                                            <h3 class="visible-slowly-bottom mb-3"><?php the_title() ?></h3>
                                                        </a>
                                                        <p><?php the_excerpt() ?>
                                                        </p>
                                                        <a href="<?php the_permalink() ?>" class="end-area mt-8 d-center">
                                                            <i class="material-symbols-outlined"> <?php echo esc_html('call_made') ?> </i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                            <?php
                                        }
                                    }
                                    wp_reset_postdata();
                                    ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>













<?php
    }
}

$widgets_manager->register(new TP_Servicethree());
