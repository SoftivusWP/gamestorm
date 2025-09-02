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
class TP_Gamebox extends Widget_Base
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
        return 'tp-gamebox';
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
        return __('Game Box', 'tpcore');
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
            'gamebox_content',
            [
                'label' => esc_html__('Content', 'plugin-name')
            ]
        );

        $this->add_control(
            'gamebox_title',
            [
                'label' => esc_html__( 'Including Text', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Game includes optional in-app purchases', 'plugin-name' ),
                'placeholder' => esc_html__( 'Type your Including title here', 'plugin-name' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gamebox_title_social',
            [
                'label' => esc_html__( 'Social Text', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Follow Our Discoveries', 'plugin-name' ),
                'placeholder' => esc_html__( 'Type your Social title here', 'plugin-name' ),
                'label_block' => true,
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






        <?php
                $args = array(
                    'post_type' => 'games',
                    'posts_per_page' => 1,

                    // Display only one post

                );

                $query = new \WP_Query($args);

                // Check if there are any posts
                if ($query->have_posts()) {
                    $query->the_post();


                    $game_rating = function_exists('get_field') ? get_field('total_rating', get_the_ID()) : '4.5';
                    $game_review = function_exists('get_field') ? get_field('total_review', get_the_ID()) : '5.5M Riview';
                    $game_download = function_exists('get_field') ? get_field('total_download', get_the_ID()) : '500M+';
                    $game_download_text = function_exists('get_field') ? get_field('download_text', get_the_ID()) : 'Downloads';
                    $game_feature_title = function_exists('get_field') ? get_field('feature_tag_title', get_the_ID()) : 'Feature';
                    $apple_image = function_exists('get_field') ? get_field('apple_store_image', get_the_ID()) : '';
                    $apple_link = function_exists('get_field') ? get_field('apple_store_link', get_the_ID()) : '';
                    $play_image = function_exists('get_field') ? get_field('play_store_image', get_the_ID()) : '';
                    $play_link = function_exists('get_field') ? get_field('play_store_link', get_the_ID()) : '';
                    $amazon_image = function_exists('get_field') ? get_field('amazon_store_image', get_the_ID()) : '';
                    $amazon_link = function_exists('get_field') ? get_field('amazon_store_link', get_the_ID()) : '';
                    $steam_image = function_exists('get_field') ? get_field('steam_store_image', get_the_ID()) : '';
                    $steam_link = function_exists('get_field') ? get_field('steam_store_link', get_the_ID()) : '';
                    $video_link = function_exists('get_field') ? get_field('game_video_link', get_the_ID()) : '';
                    $game_thumbnail = function_exists('get_field') ? get_field('thumbnail_image_game', get_the_ID()) : '';

                    $fb_link = function_exists('get_field') ? get_field('facebook_url_game', get_the_ID()) : '';
                    $ins_link = function_exists('get_field') ? get_field('instagram_url_game', get_the_ID()) : '';
                    $link_link = function_exists('get_field') ? get_field('linkedin_url_game', get_the_ID()) : '';
                    $tw_link = function_exists('get_field') ? get_field('twitter_url_game', get_the_ID()) : '';


                    ?>









            <section class="our-games bg-transparent top-features box">

                <div class="single-box tab-content position-relative text-center p-3 p-md-15">
                    <div class="main-content py-4">
                        <?php if (!empty($game_feature_title)) :   ?>
                            <span class="feature-tag d-none d-sm-flex d-center position-absolute"><?php echo esc_html($game_feature_title) ?></span>
                        <?php endif ?>
                        <h3 class="visible-slowly-bottom mb-4"><?php echo esc_html__('Download Now', 'gamestorm-core') ?></h3>


                        <?php
                                    $categories = get_the_terms(get_the_ID(), 'games-cat');

                                    // Check if there are any categories
                                    if ($categories) {
                                        // Loop through categories and display as list items
                                        echo '<ul class="justify-content-center d-flex flex-wrap mb-6 fs-seven align-items-center gap-5 gap-md-10">';
                                        foreach ($categories as $category) {
                                            echo '<li>' . esc_html($category->name) . '</li>';
                                        }
                                        echo '</ul>';
                                    }
                                    ?>

                        <div class="review-box mt-5 mt-md-8 mb-6 mb-md-10 w-100 p-2 p-sm-4 d-center gap-3 justify-content-evenly">
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
                        <div class="app-download pb-4 pb-sm-8 mb-4 mb-sm-8 d-grid gap-3 gap-sm-5 align-items-center">
                            <div class="d-flex gap-3 gap-sm-5">
                                <a href="<?php echo esc_url($apple_link) ?>" class="w-100"><img src="<?php echo esc_url($apple_image['url']) ?>" class="w-100" alt="Image"></a>
                                <a href="<?php echo esc_url($play_link) ?>" class="w-100"><img src="<?php echo esc_url($play_image['url']) ?>" class="w-100" alt="Image"></a>
                            </div>

                            <div class="d-flex gap-3 gap-sm-5">
                                <a href="<?php echo esc_url($amazon_link) ?>" class="w-100"><img src="<?php echo esc_url($amazon_image['url']) ?>" class="w-100" alt="Image"></a>
                                <a href="<?php echo esc_url($steam_link) ?>" class="w-100"><img src="<?php echo esc_url($steam_image['url']) ?>" class="w-100" alt="Image"></a>
                            </div>
                        </div>
                        <?php if( !empty( $settings['gamebox_title'] ) ) :   ?>
                        <p><?php echo esc_html($settings['gamebox_title'])?></p>
                                        
                        <?php endif ?>
                    </div>
                </div>
                <div class="social-items text-center">
                    <?php if( !empty( $settings['gamebox_title_social'] ) ) :   ?>
                    <h5 class="mb-4"><?php echo esc_html($settings['gamebox_title_social'])?></h5>
                                    
                    <?php endif ?>
                    <ul class="d-flex justify-content-center gap-4 social-area">
                        <li>
                            <a href="<?php echo esc_url( $fb_link)?>" aria-label="Facebook" class="d-center">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url($ins_link)?>" aria-label="Instagram" class="d-center">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url($link_link)?>" aria-label="Linkedin" class="d-center">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url($tw_link)?>" aria-label="Twitter" class="d-center">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>


            </section>



        <?php
                    // Reset post data
                    wp_reset_postdata();
                }
                ?>





<?php
    }
}

$widgets_manager->register(new TP_Gamebox());
