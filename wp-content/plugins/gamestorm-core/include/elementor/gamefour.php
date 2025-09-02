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
class TP_Gamefour extends Widget_Base
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
        return 'tp-gamefour';
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
        return __('Game Four', 'tpcore');
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
            'gamefour_heading_general_content',
            [
                'label' => esc_html__('Heading', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'gamefour_heading_general_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Other Games You Might Like', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gamefour_heading_general_content_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Join the revolution in gaming and experience the thrill of the game like never before, with our advanced technology and dynamic gameplay.', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sgamefour_heading_general_content_btn_title',
            [
                'label' => esc_html__('Button Text', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Projects', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gamefour_heading_general_contentwebsite_link',
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





        $this->start_controls_section(
            'game_four_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );




        $this->add_control(
            'game_four_category',
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
                'label'       => esc_html__('Posts Per Page', 'gamestorm-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 2,
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
                'posts_per_page' => $settings['game_posts_per_page'],
                'orderby'        => $settings['game_template_order_by'],
                'order'          => $settings['game_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish',
                'post__in'          => $settings['game_four_category'],
            )
        );

        ?>



        <section class="recently-completed">
            <div class="container pt-120 pb-120">
                <div class="row section-header justify-content-between align-items-center">
                    <div class="col-lg-8">
                        <?php if (!empty($settings['gamefour_heading_general_content_subtitle'])) :   ?>
                            <h2 class="visible-slowly-bottom sub-title"><?php echo esc_html($settings['gamefour_heading_general_content_subtitle']) ?></h2>
                        <?php endif ?>
                        <?php if (!empty($settings['gamefour_heading_general_content_title'])) :   ?>
                            <p><?php echo esc_html($settings['gamefour_heading_general_content_title']) ?></p>
                        <?php endif ?>
                    </div>
                    <div class="col-lg-3 mt-8 mt-lg-0 btn-movement">
                        <?php if (!empty($settings['sgamefour_heading_general_content_btn_title'])) :   ?>
                            <a href="<?php echo esc_url($settings['gamefour_heading_general_contentwebsite_link']['url']) ?>" class="box-style d-center px-3 gap-3 m-auto">
                                <?php echo esc_html($settings['sgamefour_heading_general_content_btn_title']) ?>
                                <i class="material-symbols-outlined"> <?php echo esc_html('call_made')?> </i>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row cus-mar our-games bg-transparent justify-content-center">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php

                                    $game_rating = function_exists('get_field') ? get_field('total_rating') : '4.5';
                                    $game_review = function_exists('get_field') ? get_field('total_review') : '5.5M Riview';
                                    $game_download = function_exists('get_field') ? get_field('total_download') : '500M+';
                                    $game_download_text = function_exists('get_field') ? get_field('download_text') : 'Downloads';
                                    $game_feature_title = function_exists('get_field') ? get_field('feature_tag_title') : 'Feature';
                                    $apple_image = function_exists('get_field') ? get_field('apple_store_image') : '';
                                    $apple_link = function_exists('get_field') ? get_field('apple_store_link') : '';
                                    $play_image = function_exists('get_field') ? get_field('play_store_image') : '';
                                    $play_link = function_exists('get_field') ? get_field('play_store_link') : '';
                                    $amazon_image = function_exists('get_field') ? get_field('amazon_store_image') : '';
                                    $amazon_link = function_exists('get_field') ? get_field('amazon_store_link') : '';
                                    $video_link = function_exists('get_field') ? get_field('game_video_link') : '';
                                    $game_thumbnail = function_exists('get_field') ? get_field('thumbnail_image_game') : '';

                                    ?>
                        <div class="col-md-6">
                            <div class="single-box">
                                <div class="position-relative d-center">
                                    <?php if (!empty($game_feature_title)) :   ?>
                                        <span class="feature-tag start d-center position-absolute"><?php echo esc_html($game_feature_title) ?></span>
                                    <?php endif; ?>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('gametwo', array('class' => 'w-100 thumb-img')); ?>
                                    <?php endif; ?>
                                    <a href="<?php echo esc_url($video_link) ?>" class="box-style btn-box-second heading-five fs-five mfp-iframe popupvideo text-uppercase d-center position-absolute">
                                        <?php echo esc_html__('Play', 'gamestorm') ?>
                                    </a>
                                </div>
                                <div class="info-area position-relative p-3 p-lg-5">
                                    <div class="d-flex align-items-end gap-4 gap-sm-8">
                                        <?php if (!empty($game_thumbnail['url'])) :   ?>
                                            <div class="img-area">
                                                <img src="<?php echo esc_url($game_thumbnail['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                            </div>
                                        <?php endif ?>
                                        <div class="info-area">
                                            <a href="<?php the_permalink() ?>">
                                                <h3 class="visible-slowly-bottom mb-4"><?php the_title() ?></h3>
                                            </a>
                                            <?php
                                                        // Get the terms for the 'games-tag' taxonomy for the current post
                                                        $game_tags = get_the_terms(get_the_ID(), 'games-cat');

                                                        // Output the terms if available
                                                        if ($game_tags && !is_wp_error($game_tags)) {
                                                            echo '<ul class="d-flex flex-wrap fs-seven align-items-center gap-5 gap-md-10">';
                                                            foreach ($game_tags as $tag) {
                                                                echo '<li>' . esc_html($tag->name) . '</li>';
                                                            }
                                                            echo '</ul>';
                                                        }
                                                        ?>
                                        </div>
                                    </div>
                                    <div class="review-box  mt-md-8 mb-6 mb-md-10 w-100 p-2 p-sm-4 d-center gap-3 justify-content-between spmargin">
                                        <div class="single-area d-flex align-items-center gap-2">
                                            <?php if (!empty($game_rating)) :   ?>
                                                <div class="d-flex gap-2 align-items-center mb-1">
                                                    <i class="material-symbols-outlined mat-icon"><?php echo esc_html('star') ?></i>
                                                    <h4 class="fs-four"><?php echo esc_html($game_rating) ?></h4>
                                                </div>
                                            <?php endif ?>
                                            <?php if (!empty($game_review)) :   ?>
                                                <p class="fs-seven"><?php echo esc_html($game_review) ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="single-area d-grid d-sm-flex gap-2 align-items-center">
                                            <?php if (!empty($game_download)) :   ?>
                                                <h4 class="fs-four mb-1"><?php echo esc_html($game_download) ?></h4>
                                            <?php endif ?>
                                            <?php if (!empty($game_download_text)) :   ?>
                                                <p class="fs-seven"><?php echo esc_html($game_download_text) ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
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
                                </div>
                            </div>
                        </div>
                    <?php endwhile;; ?>
                    <?php wp_reset_postdata() ?>
                </div>
            </div>
        </section>


<?php
    }
}

$widgets_manager->register(new TP_Gamefour());
