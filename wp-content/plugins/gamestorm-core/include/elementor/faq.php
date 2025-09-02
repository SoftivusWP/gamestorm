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
class TP_FAQ extends Widget_Base
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
		return 'tp-faq';
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
		return __('FAQ', 'tpcore');
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
			'faq_heading_content',
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
			'faq_main_content',
			[
				'label' => esc_html__('Faq', 'gamestorm-core')
			]
		);


		// Repeater
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__('Title', 'gamestorm-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('List Title', 'gamestorm-core'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__('Content', 'gamestorm-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('List Content', 'gamestorm-core'),
				'show_label' => false,
			]
		);

		$this->add_control(
			'list_repeater',
			[
				'label' => esc_html__('Faq List', 'gamestorm-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__('What services does GameStorm offer for game development?', 'gamestorm-core'),
						'list_content' => esc_html__('GameStorm offers a full range of services for game development,
						including game art, design, programming, and project management.', 'gamestorm-core'),
					],
					[
						'list_title' => esc_html__('How does GameStorm handle project management during game development?', 'gamestorm-core'),
						'list_content' => esc_html__('GameStorm offers a full range of services for game development,
						including game art, design, programming, and project management.', 'gamestorm-core'),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);



		$this->end_controls_section();


		$this->start_controls_section(
			'faq_card_content',
			[
				'label' => esc_html__('Card', 'gamestorm-core')
			]
		);


		$this->add_control(
			'faq_card_image',
			[
				'label' => esc_html__('Choose Image', 'gamestorm-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'faq_card_title',
			[
				'label' => esc_html__('Title', 'gamestorm-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Default title', 'gamestorm-core'),
				'placeholder' => esc_html__('Type your title here', 'gamestorm-core'),
				'label_block' => true,
			]
		);


		$this->add_control(
			'faq_card_description',
			[
				'label' => esc_html__('Description', 'gamestorm-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__('Default description', 'gamestorm-core'),
				'placeholder' => esc_html__('Type your description here', 'gamestorm-core'),
			]
		);


		$this->add_control(
			'faq_card_button_title',
			[
				'label' => esc_html__('Button Text', 'gamestorm-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Learn More', 'gamestorm-core'),
				'placeholder' => esc_html__('Type your button text here', 'gamestorm-core'),
				'label_block' => true,
			]
		);


		$this->add_control(
			'faq_cardwebsite_link',
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
			'faq_raborn_content',
			[
				'label' => esc_html__('Reborn', 'gamestorm-core')
			]
		);


		$this->add_control(
			'reborn_show',
			[
				'label' => esc_html__( 'Show Reborn', 'gamestorm-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'gamestorm-core' ),
				'label_off' => esc_html__( 'Hide', 'gamestorm-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		
		$this->end_controls_section();  


		// ========================Style============================//

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
			 'accordion_style',
			 [
				'label' => esc_html__('Accordion', 'plugin-name'),
				'tab'   => Controls_Manager::TAB_STYLE,
			 ]
		);


		$this->add_control(
			'accordion_style_title_color',
			[
				'label' => esc_html__( 'Title Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faqs-section .accordion-button.collapsed' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'accordion_style_hover_color',
			[
				'label' => esc_html__( 'Title Active Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faqs-section .accordion-button' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'des_color',
			[
				'label' => esc_html__( 'Content Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faqs-section .accordion-body p' => 'color: {{VALUE}}',
				],
			]
		);
		
		
		
		
		
		$this->end_controls_section();



		$this->start_controls_section(
			 'box_style',
			 [
				'label' => esc_html__('Box', 'plugin-name'),
				'tab'   => Controls_Manager::TAB_STYLE,
			 ]
		);
		
		$this->add_control(
			'box_style_color',
			[
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faqs-section .faq-bg' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'box_style_title_color',
			[
				'label' => esc_html__( 'Title Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h3.visible-slowly-bottom.py-5' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'box_style_description_color',
			[
				'label' => esc_html__( 'Description Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq-bg.py-15.px-8.text-center p' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'more_optfdsfsdfions',
			[
				'label' => esc_html__( 'Button', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
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

		?>


		<section class="faqs-section position-relative">
			<?php if($settings['reborn_show'] == 'yes'):?>
			<div class="shape-area">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/faq-frame.png" class="shape-1" alt="icon">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/faq-frame.png" class="shape-2" alt="icon">
			</div>
			<?php endif;?>
			<div class="overlay pt-120 pb-120">
				<div class="container position-relative cus-z1">
					<div class="row justify-content-center">
						<div class="col-lg-7">
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
					<div class="row d-flex justify-content-between">
						<div class="col-xl-7 col-lg-7">
							<div class="accordion" id="accordionFaqs">
								<?php foreach ($settings['list_repeater'] as $key => $item) : ?>
									<div class="accordion-item">
										<h5 class="accordion-header" id="heading<?php echo esc_html($key) ?>">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_html($key) ?>" aria-expanded="false" aria-controls="collapse<?php echo esc_html($key) ?>">
												<?php if (!empty($item['list_title'])) :   ?>
													<?php echo esc_html($item['list_title']) ?>
												<?php endif ?>
											</button>
										</h5>
										<div id="collapse<?php echo esc_html($key) ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_html($key) ?>" data-bs-parent="#accordionFaqs">
											<div class="accordion-body">
												<?php if (!empty($item['list_content'])) :   ?>
													<p><?php echo esc_html($item['list_content']) ?></p>
												<?php endif ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="col-xl-4 col-lg-5 mt-8 mt-lg-0">
							<div class="faq-bg py-15 px-8 text-center">
								<?php if (!empty($settings['faq_card_image']['url'])) :   ?>
									<div class="icon-area">
										<img src="<?php echo esc_url($settings['faq_card_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
									</div>
								<?php endif ?>
								<?php if (!empty($settings['faq_card_title'])) :   ?>
									<h3 class="visible-slowly-bottom py-5"><?php echo esc_html($settings['faq_card_title']) ?></h3>
								<?php endif ?>
								<?php if (!empty($settings['faq_card_description'])) :   ?>
									<p><?php echo esc_html($settings['faq_card_description']) ?></p>

								<?php endif ?>
								<?php if (!empty($settings['faq_card_button_title'])) :   ?>
									<div class="btn-area">
										<div class="btn-area mt-8 alt-bg">
											<a href="<?php echo esc_url($settings['faq_cardwebsite_link']['url']) ?>" class="box-style btn-box d-center">
												<?php echo esc_html($settings['faq_card_button_title']) ?>
											</a>
										</div>
									</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php
	}
}

$widgets_manager->register(new TP_FAQ());
