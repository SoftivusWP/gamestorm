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
class TP_Gameone extends Widget_Base
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
        return 'tp-gameone';
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
        return __('Game One', 'tpcore');
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
            'gameone_heading_general_content',
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
            'game_one_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );


        $this->add_control(
            'game_category',
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
            'game_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => -1,
                'label_block' => false,
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
            'game_one_show_hide_content',
            [
                'label' => esc_html__('Show/Hide', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'gameone_feature_show',
            [
                'label' => esc_html__('Show Feature Title?', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'gamestorm-core'),
                'label_off' => esc_html__('Hide', 'gamestorm-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'game_one_review_area',
            [
                'label' => esc_html__('Show Review/Rating?', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'gamestorm-core'),
                'label_off' => esc_html__('Hide', 'gamestorm-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'gameone_link_show',
            [
                'label' => esc_html__('Show Source/Link?', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'gamestorm-core'),
                'label_off' => esc_html__('Hide', 'gamestorm-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->end_controls_section();


        // ===================================Style==========================================//

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
        
            ]
        );
        
        $this->add_control(
            'about_section_style_des_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header.text-center p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'game_one_cat_style',
             [
                'label' => esc_html__('Category', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_control(
            'nav_background_color',
            [
                'label' => esc_html__( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-games .nav button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'nav_background_active',
            [
                'label' => esc_html__( 'Active Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-games .nav button.active' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'game_one_content_style',
             [
                'label' => esc_html__('Content', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );

        $this->add_control(
            'color_one',
            [
                'label' => esc_html__( 'Color One', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h3.visible-slowly-bottom.mb-4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} h4.fs-four.mb-1' => 'color: {{VALUE}}',
                    '{{WRAPPER}} h4.fs-four' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'color_two',
            [
                'label' => esc_html__( 'Color Two', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-games .tabcontents li' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-box.position-relative.p-3.p-md-4 p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gajmeicon_color',
            [
                'label' => esc_html__( 'Icon Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-games .review-box i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gameone_button_color',
            [
                'label' => esc_html__( 'Button Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gameonebtn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'box_color',
            [
                'label' => esc_html__( 'Box Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-games .review-box' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'card_color',
            [
                'label' => esc_html__( 'Card Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-games .single-box' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'feature_color',
            [
                'label' => esc_html__( 'Tag Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-games .feature-tag' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tag_bac_color',
            [
                'label' => esc_html__( 'Tag Backgorunde Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-games .feature-tag' => 'background: {{VALUE}}',
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
            jQuery(".gamtabss button").on('click', function() {
                var targetTab = $(this).closest(".singletab");
                var navBtns = targetTab.find(".gamtabss button");
                var indexNum = $(this).closest("li").index();

                navBtns.removeClass('active');
                $(this).addClass('active');

                var tabcontents = targetTab.find(".tabcontents .tabitem");
                tabcontents.removeClass('active');
                tabcontents.filter('[data-category="' + navBtns.eq(indexNum).data('category') + '"]').addClass('active');
            });
        </script>



        <section class="our-games gaming-one overflow-hidden pt-120 pb-120">
            <div class="container singletab">
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

                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <!-- Dynamic category buttons -->
                        <?php
                                $categories = get_categories(array(
                                    'taxonomy' => 'games-cat',
                                    'hide_empty' => false,
                                ));

                                if ($categories) :
                                    ?>
                            <ul class="nav tablinks gamtabss flex-wrap d-center mb-6 mb-sm-10 d-inline-flex gap-4 p-3 tab-area">
                                <?php foreach ($categories as $index => $category) : ?>
                                    <?php
                                                    // Retrieve the custom field value for the category icon or image
                                                    $category_icon = function_exists('get_field') ? get_field('category_icon', 'games-cat_' . $category->term_id) : '';
                                                    ?>
                                    <li class="nav-item">
                                        <button class="nav-link d-center box-style btn-box p-0 <?php echo $index === 0 ? 'active' : ''; ?>" data-category="<?php echo esc_attr($category->slug); ?>">
                                            <span class="icon-area">
                                                <?php if ($category_icon) : ?>
                                                    <img src="<?php echo esc_url($category_icon['url']); ?>" alt="<?php echo esc_attr($category->name); ?>" class="category-icon">
                                                <?php else : ?>
                                                    <i class="ri-macbook-line fs-two"></i>
                                                <?php endif; ?>
                                            </span>
                                        </button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="tabcontents">
                            <?php foreach ($categories as $index => $category) : ?>
                                <?php
                                            $args = array(
                                                'post_type' => 'games',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'games-cat',
                                                        'field' => 'slug',
                                                        'terms' => $category->slug,
                                                    ),
                                                ),
                                                'posts_per_page' => $settings['game_posts_per_page'],
                                                'orderby'        => $settings['game_template_order_by'],
                                                'order'          => $settings['game_template_order'],
                                                'offset'         => 0,
                                                'post_status'    => 'publish',
                                                'post__in'          => $settings['game_category'],
                                            );

                                            $posts = get_posts($args);

                                            if ($posts) :
                                                foreach ($posts as $post) :
                                                    setup_postdata($post);
                                                    $game_rating = function_exists('get_field') ? get_field('total_rating', $post->ID) : '4.5';
                                                    $game_review = function_exists('get_field') ? get_field('total_review', $post->ID) : '5.5M Riview';
                                                    $game_download = function_exists('get_field') ? get_field('total_download', $post->ID) : '500M+';
                                                    $game_download_text = function_exists('get_field') ? get_field('download_text', $post->ID) : 'Downloads';
                                                    $game_feature_title = function_exists('get_field') ? get_field('feature_tag_title', $post->ID) : 'Feature';
                                                    $apple_image = function_exists('get_field') ? get_field('apple_store_image', $post->ID) : '';
                                                    $apple_link = function_exists('get_field') ? get_field('apple_store_link', $post->ID) : '';
                                                    $play_image = function_exists('get_field') ? get_field('play_store_image', $post->ID) : '';
                                                    $play_link = function_exists('get_field') ? get_field('play_store_link', $post->ID) : '';
                                                    $amazon_image = function_exists('get_field') ? get_field('amazon_store_image', $post->ID) : '';
                                                    $amazon_link = function_exists('get_field') ? get_field('amazon_store_link', $post->ID) : '';
                                                    $video_link = function_exists('get_field') ? get_field('game_video_link', $post->ID) : '';
                                                    $game_thumbnail = function_exists('get_field') ? get_field('thumbnail_image_game', $post->ID) : '';

                                                    ?>
                                        <div class="tabitem <?php echo $index === 0 ? 'active' : ''; ?>" data-category="<?php echo esc_attr($category->slug); ?>">
                                            <!-- Your game post content here -->
                                            <div class="cus-mar">
                                                <div class="single-box position-relative p-3 p-md-4">
                                                    <?php if (!empty($settings['gameone_feature_show'] == 'yes')) :   ?>
                                                        <?php if (!empty($game_feature_title)) :   ?>
                                                            <span class="feature-tag d-flex d-md-none d-xl-flex d-center position-absolute"><?php echo esc_html($game_feature_title) ?></span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                    <div class="row align-items-center">
                                                        <div class="col-md-5">
                                                            <?php if(has_post_thumbnail($post->ID)) : ?>
                                                            <div class="position-relative d-center">

                                                                <?php echo get_the_post_thumbnail($post->ID, 'gameone', array('class' => 'game-image')); ?>

                                                                <a href="<?php echo esc_url($video_link) ?>" class="box-style btn-box-second heading-five fs-five mfp-iframe popupvideo text-uppercase d-center position-absolute">
                                                                    <?php echo esc_html__('Play', 'gamestorm') ?>
                                                                </a>
                                                            </div>
                                                            <?php endif;?>
                                                        </div>
                                                        <div class="col-md-7 mt-6 mt-md-0">
                                                            <a href="<?php the_permalink($post->ID) ?>">
                                                                <h3 class="visible-slowly-bottom mb-4"><?php echo esc_html(get_post_field('post_title', $post->ID)); ?></h3>
                                                            </a>
                                                            <?php
                                                                                // Get the terms for the 'game_genre' taxonomy
                                                                                $game_genres = get_the_terms($post->ID, 'games-cat');

                                                                                // Output the terms if available
                                                                                if ($game_genres && !is_wp_error($game_genres)) {
                                                                                    echo '<ul class="d-flex flex-wrap mb-6 fs-seven align-items-center gap-5 gap-md-10">';
                                                                                    foreach ($game_genres as $genre) {
                                                                                        echo '<li>' . esc_html($genre->name) . '</li>';
                                                                                    }
                                                                                    echo '</ul>';
                                                                                }
                                                                                ?>

                                                            <p>
                                                                <?php
                                                                                    // Get the post content by post ID
                                                                                    $post_content = get_post_field('post_content', $post->ID);

                                                                                    // Trim the content to 16 words
                                                                                    $trimmed_content = wp_trim_words($post_content, 16);

                                                                                    // Output the trimmed content
                                                                                    echo esc_html($trimmed_content);

                                                                                    // Output the "Read More" link with custom permalink
                                                                                    ?>
                                                                <a class="gameonebtn" href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html__('Read More', 'gamestorm') ?></a>
                                                            </p>

                                                            <?php if (!empty($settings['game_one_review_area'] == 'yes')) :   ?>
                                                                <div class="review-box  mt-md-8 mb-6 mb-md-10 w-100 p-2 p-sm-4 d-center gap-3 justify-content-between spmargin">
                                                                    <?php if (!empty($game_thumbnail['url'])) :   ?>
                                                                        <div class="single-area">
                                                                            <img src="<?php echo esc_url($game_thumbnail['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                                        </div>
                                                                    <?php endif ?>

                                                                    <div class="single-area">
                                                                        <?php if (!empty($game_rating)) :   ?>
                                                                            <div class="d-flex gap-1 align-items-center mb-1">
                                                                                <i class="material-symbols-outlined mat-icon"><?php echo esc_html('star') ?></i>
                                                                                <h4 class="fs-four"><?php echo esc_html($game_rating) ?></h4>
                                                                            </div>
                                                                        <?php endif ?>
                                                                        <?php if (!empty($game_review)) :   ?>
                                                                            <p class="fs-seven"><?php echo esc_html($game_review) ?></p>
                                                                        <?php endif ?>
                                                                    </div>
                                                                    <div class="single-area">
                                                                        <?php if (!empty($game_download)) :   ?>
                                                                            <h4 class="fs-four mb-1"><?php echo esc_html($game_download) ?></h4>
                                                                        <?php endif ?>
                                                                        <?php if (!empty($game_download_text)) :   ?>
                                                                            <p class="fs-seven"><?php echo esc_html($game_download_text) ?></p>
                                                                        <?php endif ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif ?>
                                                            <?php if (!empty($settings['gameone_link_show'] == 'yes')) :   ?>
                                                                <div class="app-download d-flex gap-4 align-items-center">
                                                                    <?php if (!empty($apple_image['url'])) :   ?>
                                                                        <a href="<?php echo esc_url($apple_link) ?>" class="w-100"><img src="<?php echo esc_url($apple_image['url']) ?>" class="w-100" alt="<?php echo esc_attr('image') ?>"></a>
                                                                    <?php endif ?>

                                                                    <?php if (!empty($play_image['url'])) :   ?>
                                                                        <a href="<?php echo esc_url($play_link) ?>" class="w-100"><img src="<?php echo esc_url($play_image['url']) ?>" class="w-100" alt="<?php echo esc_attr('image') ?>"></a>
                                                                    <?php endif ?>

                                                                    <?php if (!empty($amazon_image['url'])) :   ?>
                                                                        <a href="<?php echo esc_url($amazon_link) ?>" class="w-100"><img src="<?php echo esc_url($amazon_image['url']) ?>" class="w-100" alt="<?php echo esc_attr('image') ?>"></a>
                                                                    <?php endif ?>
                                                                </div>
                                                            <?php endif ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                                endforeach;
                                                wp_reset_postdata(); // Reset post data for the current category
                                            endif;
                                            ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>



<?php
    }
}

$widgets_manager->register(new TP_Gameone());
