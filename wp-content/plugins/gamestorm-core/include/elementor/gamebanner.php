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
class TP_Gamebanner extends Widget_Base
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
        return 'tp-gamebanner';
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
        return __('Game Banner', 'tpcore');
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
            'game_details_content',
            [
                'label' => esc_html__('Content', 'gamestorm-core')
            ]
        );


        $this->add_control(
            'game_details_title_one',
            [
                'label' => esc_html__('Text One', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Online', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'game_details_number_one',
            [
                'label' => esc_html__('Number One', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('19,302,927', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'game_details_title_two',
            [
                'label' => esc_html__('Text Two', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Playing Now', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'game_details_num_two',
            [
                'label' => esc_html__('Number Two', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('4,831,224', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'game_btn_text',
            [
                'label' => esc_html__('Button Text', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Now', 'gamestorm-core'),
                'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'game_details_website_link',
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

        <section class="banner-section inner-banner position-relative game-details">
            <div class="container position-relative">
                <div class="banner-content row justify-content-between">
                    <div class="col-xxl-5 col-xl-6 col-lg-8 col-md-10 mb-6 mb-md-0">
                        <div class="main-content mt-15">



                            <?php
                                    if (
                                        !empty($settings['game_details_title_one']) ||
                                        !empty($settings['game_details_number_one']) ||
                                        !empty($settings['game_details_title_two']) ||
                                        !empty($settings['game_details_num_two'])
                                    ) :
                                        ?>
                                <div class="playing-now p-3 px-4 d-flex flex-wrap gap-6 gap-sm-10">
                                    <?php if (!empty($settings['game_details_title_one'])) :   ?>
                                        <div class="active-now pe-15 online">
                                            <span><?php echo esc_html($settings['game_details_title_one']) ?></span>
                                            <?php if (!empty($settings['game_details_number_one'])) :   ?>
                                                <h2><?php echo esc_html($settings['game_details_number_one']) ?></h2>
                                            <?php endif ?>
                                        </div>
                                    <?php endif ?>

                                    <?php if (!empty($settings['game_details_title_two'])) :   ?>
                                        <div class="active-now now">
                                            <span><?php echo esc_html($settings['game_details_title_two']) ?></span>
                                            <?php if (!empty($settings['game_details_num_two'])) :   ?>
                                                <h2><?php echo esc_html($settings['game_details_num_two']) ?></h2>
                                            <?php endif ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>




                        </div>
                    </div>
                    <div class="col-lg-6 col-md-10 d-grid align-items-end justify-content-end">
                        <div class="btn-area position-absolute pe-5 pe-md-0 bottom-0 mb-10 end-0 alt-bg mt-5 mt-sm-10 d-flex flex-wrap gap-6 align-items-center">
                            <?php if (!empty($settings['game_details_website_link']['url'])) :   ?>
                                <a href="<?php echo esc_html($settings['game_details_website_link']['url']) ?>" class="box-style btn-box d-center">
                                    <?php echo esc_html($settings['game_btn_text']) ?>
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}

$widgets_manager->register(new TP_Gamebanner());
