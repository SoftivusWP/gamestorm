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
class TP_Videotwo extends Widget_Base
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
        return 'tp-videotwo';
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
        return __('Video Two', 'gamestorm-core');
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

        $this->start_controls_section(
            'video_two_general_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'video_two_subtitle',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Game Trailers', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'video_two_title',
            [
                'label' => esc_html__('Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Our Games Build Worlds, Connect Communities, And Entertain Billions.', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
            ]
        );

        $this->add_control(
            'video_two_image',
            [
                'label' => esc_html__('Choose Image', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'video_two_enter_title',
            [
                'label' => esc_html__('Video Title', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Watch the video * Watch the video *', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your video title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'video_two_website_link',
            [
                'label' => esc_html__('Video Link', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gamestorm-core'),
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=GyO1MtLhyt0',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'video_two_reborn_show',
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
            const text = document.querySelector(".text p");
            if (text) {
                text.innerHTML = text.innerText.split('').map(
                    (char, i) =>
                    `<span style="transform:rotate(${i * 10}deg)">${char}</span>`
                ).join('');
            }
            jQuery(".popup-video").magnificPopup({
                type: "iframe",
            });
            });
        </script>


        <section class="our-focus bg-transparent game-trailers position-relative overflow-hidden pt-120">
            <?php if (!empty($settings['video_two_reborn_show'] == 'yes')) :   ?>
                <div class="shape-area">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/line-1.png" class="shape-1" alt="icon">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/object-1.png" class="shape-2" alt="icon">
                </div>
            <?php endif ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-text text-center">
                            <?php if (!empty($settings['video_two_subtitle'])) :   ?>
                                <h4 class="sub-title"><?php echo wp_kses($settings['video_two_subtitle'], wp_kses_allowed_html('post'))  ?></h4>
                            <?php endif ?>
                            <?php if (!empty($settings['video_two_title'])) :   ?>
                                <span class="fs-two heading mb-6"><?php echo wp_kses($settings['video_two_title'], wp_kses_allowed_html('post'))  ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="position-relative d-center">
                            <?php if (!empty($settings['video_two_image']['url'])) :   ?>
                                <img src="<?php echo esc_url($settings['video_two_image']['url']) ?>" class="w-100" alt="<?php echo esc_attr('image') ?>">
                            <?php endif ?>
                            <div class="circle-text position-absolute">
                                <div class="text">
                                    <?php if (!empty($settings['video_two_enter_title'])) :   ?>
                                        <p><?php echo wp_kses($settings['video_two_enter_title'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                </div>
                                <a href="<?php echo esc_url($settings['video_two_website_link']['url']) ?>" class="box-style btn-box-second heading-five fs-five mfp-iframe popupvideo text-uppercase d-center position-absolute">
                                    <i class="fa-solid fa-play fs-three"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}

$widgets_manager->register(new TP_Videotwo());
