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
class TP_Brand extends Widget_Base
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
		return 'brand';
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
		return __('Brand', 'tpcore');
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
			'brand_content_heading',
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
			'gamestorm_gallery_slide_content',
			[
				'label' => esc_html__('Gallery', 'gamestorm-core')
			]
		);



		$this->add_control(
			'gamestorm_gallery_slide_image',
			[
				'label' => esc_html__('Choose Image', 'gamestorm-core'),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);




		$this->end_controls_section();

		// ===============================Style==============================//

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

		<section class="our-partners pt-120 pb-120">
			<div class="container">
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
					<div class="col-lg-10">
						<div class="all-items mb-7 d-flex gap-3 justify-content-between flex-wrap">
							<?php foreach ($settings['gamestorm_gallery_slide_image'] as $item) : ?>
								<?php if (!empty($item['url'])) :   ?>
									<div class="thumb">
										<img src="<?php echo esc_url($item['url']) ?>" alt="<?php echo esc_attr('gallery-img') ?>">
									</div>
								<?php endif ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php
	}
}

$widgets_manager->register(new TP_Brand());
