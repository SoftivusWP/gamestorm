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
class TP_Blog extends Widget_Base
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
        return 'tp-blog';
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
        return __('Blog', 'tpcore');
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
            'gamestorm_blog_section_genaral',
            [
                'label' => esc_html__('General', 'gamestorm-core')
            ]
        );


        $this->add_control(
            'gamestorm_blog_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'gamestorm-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 2,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'gamestorm_blog_template_orderby',
            [
                'label'   => esc_html__('Order By', 'gamestorm-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'gamestorm-core'),
                    'author'     => esc_html__('Post Author', 'gamestorm-core'),
                    'title'      => esc_html__('Title', 'gamestorm-core'),
                    'post_date'  => esc_html__('Date', 'gamestorm-core'),
                    'rand'       => esc_html__('Random', 'gamestorm-core'),
                    'menu_order' => esc_html__('Menu Order', 'gamestorm-core'),
                ],
            ]
        );
        $this->add_control(
            'gamestorm_blog_template_order',
            [
                'label'   => esc_html__('Order', 'gamestorm-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'gamestorm-core'),
                    'desc' => esc_html__('Descending', 'gamestorm-core')
                ],
                'default' => 'desc',
            ]
        );




        $this->end_controls_section();

        // ============================Style=============================//

        $this->start_controls_section(
             'blog_style_cat',
             [
                'label' => esc_html__('Category', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'blog_style_cat_typ',
                'selector' => '{{WRAPPER}} .top-bar.d-flex.align-items-center.gap-3 h5',
        
            ]
        );
        
        $this->add_control(
            'blog_style_cat_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .top-bar.d-flex.align-items-center.gap-3 h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'blog_style_date',
             [
                'label' => esc_html__('Date', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'blog_style_date_typ',
                'selector' => '{{WRAPPER}} .top-bar.d-flex.align-items-center.gap-3 span',
        
            ]
        );
        
        $this->add_control(
            'blog_style_date_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .top-bar.d-flex.align-items-center.gap-3 span' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'blog_style_title',
             [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'blog_style_title_typ',
                'selector' => '{{WRAPPER}} .recently-completed.blogs .content-box h4',
        
            ]
        );
        
        $this->add_control(
            'blog_style_title_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recently-completed.blogs .content-box h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blog_style_title_colorh',
            [
                'label'     => esc_html__('Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recently-completed.blogs .content-box:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'blog_style_icon',
             [
                'label' => esc_html__('Icon', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'blog_style_icon_color',
            [
                'label' => esc_html__( ' Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recently-completed .end-area i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'blog_style_icon_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recently-completed.blogs .content-box:hover a i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'blog_style_ifdh_background_color',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recently-completed .end-area' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'blog_style_ih_background_color',
            [
                'label' => esc_html__( 'Hover Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recently-completed.blogs .content-box:hover a' => 'background-color: {{VALUE}} !important',
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
                'post_type'      => 'post',
                'posts_per_page' => $settings['gamestorm_blog_posts_per_page'],
                'orderby'        => $settings['gamestorm_blog_template_orderby'],
                'order'          => $settings['gamestorm_blog_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish'
            )
        );

        ?>


        <section class="recently-completed blogs overflow-hidden">
            <div class="container">
                <div class="row cus-mar">

                    <?php
                            if ($query->have_posts()) {
                                while ($query->have_posts()) {
                                    $query->the_post();
                                    ?>

                            <div class="col-lg-6">
                                <div class="single-box">
                                    <div class="position-relative d-grid align-items-center">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="img-box">
                                                <?php the_post_thumbnail('gamestorm-three-page') ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="position-absolute cus-position bottom-0 start-0">
                                            <div class="content-box p-3 p-sm-6">
                                                <div class="top-bar d-flex align-items-center gap-3">
                                                    <?php
                                                                    // Get the post categories
                                                                    $categories = get_the_category();

                                                                    // Check if there are categories
                                                                    if ($categories) {
                                                                        // Get the first category
                                                                        $first_category = $categories[0];

                                                                        // Display the first category name
                                                                        echo '<h5>' . esc_html($first_category->name) . '</h5>';
                                                                    }

                                                                    // Display the post date
                                                                    echo '<span>' . get_the_date() . '</span>';
                                                                    ?>

                                                </div>
                                                <a href="<?php the_permalink() ?>">
                                                    <h4 class="mt-3"><?php the_title() ?></h4>
                                                </a>
                                                <a href="<?php the_permalink() ?>" class="end-area mt-8 d-center">
                                                    <i class="material-symbols-outlined"> <?php echo esc_html('call_made') ?> </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                    <?php
                                }
                            }
                            wp_reset_postdata();
                            ?>



                </div>
            </div>
        </section>


<?php
    }
}

$widgets_manager->register(new TP_Blog());
