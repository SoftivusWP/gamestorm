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
class TP_Gamethree extends Widget_Base
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
        return 'tp-gamethree';
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
        return __('Game Three', 'tpcore');
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
            'gamethree_heading_content',
            [
                'label' => esc_html__('Heading', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'gamethree_heading_content_subtitle',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Features Games', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gamethree_heading_content_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Gaming Studio Specializes in Developing Games with Unique Features. Explore our Feature game.', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gamethree_top_btn_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Project', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your button text here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gamethree_btn_website_link',
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
            'game_three_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );


        $this->add_control(
            'game_three_category',
            [
                'label' => __('Select Games', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('games'),
                'default'     => $this->get_all_post_key('games'),
            ]
        );


        $this->add_control(
            'game_template_order_by',
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
            'game_template_order',
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


        $this->start_controls_section(
            'game_three_general_content_explore',
            [
                'label' => esc_html__('Button(Explore)', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'gamethree_bottom_button_text',
            [
                'label' => esc_html__('Button Text', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore Our Games', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your Button text here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gamethree_bottom_website_link',
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

        // ======================Style==========================//

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
            'servicetwo_btn_style',
            [
               'label' => esc_html__('Button', 'plugin-name'),
               'tab'   => Controls_Manager::TAB_STYLE,
            ]
       );
       
       
       $this->add_control(
           'servicetwo_btn_style_color',
           [
               'label' => esc_html__( ' Color', 'plugin-name' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} a.box-style.d-center.px-3.gap-3.m-auto' => 'color: {{VALUE}} !important',
               ],
           ]
       );
       $this->add_control(
           'servicetwo_btnbac_style_color',
           [
               'label' => esc_html__( 'Background Color', 'plugin-name' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .box-style::before' => 'background-color: {{VALUE}} !important',
               ],
           ]
       );
       
       
       $this->end_controls_section();


        $this->start_controls_section(
             'desfdsfsdfigmation_style',
             [
                'label' => esc_html__('Button Two', 'plugin-name'),
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

        $query = new \WP_Query(
            array(
                'post_type'      => 'games',
                'posts_per_page' => 3,
                'orderby'        => $settings['game_template_order_by'],
                'order'          => $settings['game_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish',
                'post__in'          => $settings['game_three_category'],
            )
        );

        ?>



        <section class="features-games position-relative pt-120 pb-120">
            <div class="container position-relative cus-z1">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-7">
                        <div class="section-text">
                            <?php if (!empty($settings['gamethree_heading_content_subtitle'])) :   ?>
                                <h4 class="sub-title"><?php echo esc_html($settings['gamethree_heading_content_subtitle']) ?></h4>
                            <?php endif ?>
                            <?php if (!empty($settings['gamethree_heading_content_title'])) :   ?>
                                <p><?php echo esc_html($settings['gamethree_heading_content_title']) ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <?php if (!empty($settings['gamethree_top_btn_title'])) :   ?>
                            <a href="<?php echo esc_url($settings['gamethree_btn_website_link']['url']) ?>" class="box-style d-center px-3 gap-3 m-auto">
                                <?php echo esc_html($settings['gamethree_top_btn_title']) ?>
                                <i class="material-symbols-outlined"> <?php echo esc_html('call_made') ?> </i>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row cus-mar">
                    <?php $post_counter = 0; ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php if ($post_counter == 0) : ?>
                            <div class="col-lg-7">
                                <div class="single-box position-relative">
                                <?php the_post_thumbnail('gamethreeimgone'); ?>
                                    <div class="btn-area position-absolute alt-bg">
                                        <a href="<?php the_permalink()?>" class="box-style btn-box d-center">
                                            <?php echo esc_html__('Details','gamestorm')?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <?php if ($post_counter == 1) : ?>
                                <div class="col-lg-5">
                                <?php endif; ?>
                                <div class="single-box position-relative">
                                <?php the_post_thumbnail('gamethreeimgtwo'); ?>
                                    <div class="btn-area position-absolute alt-bg">
                                        <a href="<?php the_permalink()?>" class="box-style btn-box d-center">
                                        <?php echo esc_html__('Details','gamestorm')?>
                                        </a>
                                    </div>
                                </div>
                                <?php if ($post_counter == 2) : ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php $post_counter++; ?>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
                <div class="btn-area text-center mt-10 alt-bg">
                    <?php if (!empty($settings['gamethree_bottom_button_text'])) :   ?>
                        <a href="<?php echo esc_url('gamethree_bottom_website_link') ?>" class="box-style btn-box d-center">
                            <?php echo esc_html($settings['gamethree_bottom_button_text']) ?>
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </section>

<?php
    }
}

$widgets_manager->register(new TP_Gamethree());
