<?php
/**
 * gamestorm customizer
 *
 * @package gamestorm
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function gamestorm_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'gamestorm_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Gamestorm Customizer', 'gamestorm' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'header_top_setting', [
        'title'       => esc_html__( 'Header Info Setting', 'gamestorm' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'gamestorm_customizer',
    ] );

    $wp_customize->add_section( 'header_social', [
        'title'       => esc_html__( 'Header Social', 'gamestorm' ),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'gamestorm_customizer',
    ] );

    $wp_customize->add_section( 'section_header_logo', [
        'title'       => esc_html__( 'Header Setting', 'gamestorm' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'gamestorm_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'gamestorm' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'gamestorm_customizer',
    ] );

    $wp_customize->add_section( 'header_side_setting', [
        'title'       => esc_html__( 'Side Info', 'gamestorm' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'gamestorm_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'gamestorm' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'gamestorm_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'gamestorm' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'gamestorm_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'gamestorm' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'gamestorm_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'gamestorm' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'gamestorm_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'gamestorm' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'gamestorm_customizer',
    ] );



    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'gamestorm' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'gamestorm_customizer',
    ] );


}

add_action( 'customize_register', 'gamestorm_customizer_panels_sections' );

function _header_top_fields( $fields ) {


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_preloader',
        'label'    => esc_html__( 'Preloader On/Off', 'gamestorm' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_backtotop',
        'label'    => esc_html__( 'Back To Top On/Off', 'gamestorm' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_cursor',
        'label'    => esc_html__( 'Cursor On/Off', 'gamestorm' ),
        'section'  => 'header_top_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

   

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_show_number',
        'label'    => esc_html__( 'Number On/Off', 'gamestorm' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_search',
        'label'    => esc_html__( 'Header Search On/Off', 'gamestorm' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_wishlist',
        'label'    => esc_html__( 'Wishlist On/Off', 'gamestorm' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_user',
        'label'    => esc_html__( 'User On/Off', 'gamestorm' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_header_right',
        'label'    => esc_html__( 'Header Right Bar On/Off', 'gamestorm' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ]; 

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_header_social',
        'label'    => esc_html__( 'Social On/Off', 'gamestorm' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_header_lang',
        'label'    => esc_html__( 'language On/Off', 'gamestorm' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];




    // phone
    $fields[] = [
        'type'     => 'text',
        'settings' => 'gamestorm_phone_num',
        'label'    => esc_html__( 'Phone Number', 'gamestorm' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '(302) 555-0107', 'gamestorm' ),
        'priority' => 10,
    ];    

  



    return $fields;

}
add_filter( 'kirki/fields', '_header_top_fields' );

/*
Header Social
 */
function _header_social_fields( $fields ) {
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'gamestorm_topbar_fb_url',
        'label'    => esc_html__( 'Facebook Url', 'gamestorm' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'gamestorm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'gamestorm_topbar_twitter_url',
        'label'    => esc_html__( 'Twitter Url', 'gamestorm' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'gamestorm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'gamestorm_topbar_linkedin_url',
        'label'    => esc_html__( 'Linkedin Url', 'gamestorm' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'gamestorm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'gamestorm_topbar_instagram_url',
        'label'    => esc_html__( 'Instagram Url', 'gamestorm' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'gamestorm' ),
        'priority' => 10,
    ];




    return $fields;
}
add_filter( 'kirki/fields', '_header_social_fields' );

/*
Header Settings
 */
function _header_header_fields( $fields ) {
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Select Header Style', 'gamestorm' ),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__( 'Select an option...', 'gamestorm' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'gamestorm' ),
        'description' => esc_html__( 'Upload Your Logo.', 'gamestorm' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
    ];



    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );

/*
Header Side Info
 */
function _header_side_fields( $fields ) {
 
    // contact



    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'gamestorm_extra_address',
        'label'    => esc_html__( 'Office Address', 'gamestorm' ),
        'section'  => 'header_side_setting',
        'default'  => wp_kses_post( '<h5>London</h5><span>Al. Brucknera Aleksandra 63, Wrocław 51-410</span>' ),
        'priority' => 10,
    ];
    

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'gamestorm_extra_email',
        'label'    => esc_html__( 'Email ID', 'gamestorm' ),
        'section'  => 'header_side_setting',
        'default'  => wp_kses_post( '<span>Example@gmail.com</span><span>Example@gmail.com</span>' ),
        'priority' => 10,
    ];
    

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'gamestorm_extra_phone',
        'label'    => esc_html__( 'Phone Number', 'gamestorm' ),
        'section'  => 'header_side_setting',
        'default'  => wp_kses_post( '<span>(302) 555-0107</span><span>(302) 555-0107</span>' ),
        'priority' => 10,
    ];
    

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'gamestorm_extra_working',
        'label'    => esc_html__( 'Working Hour', 'gamestorm' ),
        'section'  => 'header_side_setting',
        'default'  => wp_kses_post( '<span>Mon-Fri: 09:00-18:00 Sat-Sun: Weekend</span>' ),
        'priority' => 10,
    ];
    


    return $fields;
}
add_filter( 'kirki/fields', '_header_side_fields' );

/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {
    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__( 'Breadcrumb Background Image', 'gamestorm' ),
        'description' => esc_html__( 'Breadcrumb Background Image', 'gamestorm' ),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/page-title/page-title.jpg',
    ];




    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_switch',
        'label'    => esc_html__( 'Breadcrumb Hide', 'gamestorm' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_shape_image',
        'label'    => esc_html__( 'Show Breadcrumb Shape?', 'gamestorm' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_blog_btn_switch',
        'label'    => esc_html__( 'Blog BTN On/Off', 'gamestorm' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_blog_cat',
        'label'    => esc_html__( 'Blog Category Meta On/Off', 'gamestorm' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_blog_author',
        'label'    => esc_html__( 'Blog Author Meta On/Off', 'gamestorm' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_blog_date',
        'label'    => esc_html__( 'Blog Date Meta On/Off', 'gamestorm' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta On/Off', 'gamestorm' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'gamestorm_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'gamestorm' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'gamestorm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'gamestorm' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'gamestorm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'gamestorm' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'gamestorm' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'gamestorm' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'gamestorm' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2' => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
            'footer-style-3' => get_template_directory_uri() . '/inc/img/footer/footer-3.png',
        ],
        'default'     => 'footer-style-1',
    ];



    $fields[] = [
        'type'        => 'image',
        'settings'    => 'gamestorm_footer_bg',
        'label'       => esc_html__( 'Footer Background Image.', 'gamestorm' ),
        'description' => esc_html__( 'Footer Background Image.', 'gamestorm' ),
        'section'     => 'footer_setting',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'gamestorm_footer_bg_color',
        'label'       => __( 'Footer BG Color', 'gamestorm' ),
        'description' => esc_html__( 'This is a Footer bg color control.', 'gamestorm' ),
        'section'     => 'footer_setting',
        'default'     => '#161829',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_2_switch',
        'label'    => esc_html__( 'Footer Style 2 On/Off', 'gamestorm' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];    






    $fields[] = array(
        'type'     => 'text',
        'settings' => 'gamestorm_copyright',
        'label'    => esc_html__( 'Copy Right', 'gamestorm' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Copyright © 2023 Gamestorm - All Rights Reserved', 'gamestorm' ),
        'priority' => 10,
    );
    
    
    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function gamestorm_color_fields( $fields ) {
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'gamestorm_color_option',
        'label'       => __( 'Primary Color', 'gamestorm' ),
        'description' => esc_html__( 'This is a Primary color control.', 'gamestorm' ),
        'section'     => 'color_setting',
        'default'     => '#0ef0ad;',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'gamestorm_color_option_2',
        'label'       => __( 'Secondary Color', 'gamestorm' ),
        'description' => esc_html__( 'This is a Secondary color control.', 'gamestorm' ),
        'section'     => 'color_setting',
        'default'     => '#09926a;',
        'priority'    => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', 'gamestorm_color_fields' );

// 404
function gamestorm_404_fields( $fields ) {
    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'gamestorm_404_bg',
        'label'       => esc_html__( '404 Image.', 'gamestorm' ),
        'description' => esc_html__( '404 Image.', 'gamestorm' ),
        'section'     => '404_page',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'gamestorm_error_title',
        'label'    => esc_html__( 'Not Found Title', 'gamestorm' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Page not found', 'gamestorm' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'gamestorm_error_desc',
        'label'    => esc_html__( '404 Description Text', 'gamestorm' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted', 'gamestorm' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'gamestorm_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'gamestorm' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'gamestorm' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'gamestorm_404_fields' );

// course_settings
function gamestorm_learndash_fields( $fields ) {

    $fields[] = [
        'type'     => 'number',
        'settings' => 'gamestorm_learndash_post_number',
        'label'    => esc_html__( 'Learndash Post Per page', 'gamestorm' ),
        'section'  => 'learndash_course_settings',
        'default'  => 6,
        'priority' => 10,
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'gamestorm_learndash_order',
        'label'       => esc_html__( 'Post Order', 'gamestorm' ),
        'section'     => 'learndash_course_settings',
        'default'     => 'DESC',
        'placeholder' => esc_html__( 'Select an option...', 'gamestorm' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'ASC' => esc_html__( 'ASC', 'gamestorm' ),
            'DESC' => esc_html__( 'DESC', 'gamestorm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_learndash_related',
        'label'    => esc_html__( 'Show Related?', 'gamestorm' ),
        'section'  => 'learndash_course_settings',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

    return $fields;

}

if ( class_exists( 'SFWD_LMS' ) ) {
add_filter( 'kirki/fields', 'gamestorm_learndash_fields' );
}


// tutor_course_settings
function gamestorm_tutor_course_fields( $fields ) {
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_tutor_course_details_author_meta_switch',
        'label'    => esc_html__( 'Tutor Course Details Author Meta', 'gamestorm' ),
        'section'  => 'tutor_course_settings',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];    

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_tutor_course_details_payment_switch',
        'label'    => esc_html__( 'Tutor Course Details Payment', 'gamestorm' ),
        'section'  => 'tutor_course_settings',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_tutor_course_desc_tab_switch',
        'label'    => esc_html__( 'Tutor Course Description Tab Swicher', 'gamestorm' ),
        'section'  => 'tutor_course_settings',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];    

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_tutor_course_curriculum_tab_switch',
        'label'    => esc_html__( 'Tutor Course Curriculum Tab Swicher', 'gamestorm' ),
        'section'  => 'tutor_course_settings',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];    

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_tutor_course_reviews_tab_switch',
        'label'    => esc_html__( 'Tutor Course Reviews Tab Swicher', 'gamestorm' ),
        'section'  => 'tutor_course_settings',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];    

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'gamestorm_tutor_course_instructor_tab_switch',
        'label'    => esc_html__( 'Tutor Course Instructor Tab Swicher', 'gamestorm' ),
        'section'  => 'tutor_course_settings',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'gamestorm' ),
            'off' => esc_html__( 'Disable', 'gamestorm' ),
        ],
    ];
    return $fields;
}

if (  function_exists('tutor') ) {
    add_filter( 'kirki/fields', 'gamestorm_tutor_course_fields' );
}


/**
 * Added Fields
 */
function gamestorm_typo_fields( $fields ) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'gamestorm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'p',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_link_setting',
        'label'       => esc_html__( 'Link', 'gamestorm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'a',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_span_setting',
        'label'       => esc_html__( 'Span', 'gamestorm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'a',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__( 'Heading h1 Fonts', 'gamestorm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__( 'Heading h2 Fonts', 'gamestorm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__( 'Heading h3 Fonts', 'gamestorm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__( 'Heading h4 Fonts', 'gamestorm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__( 'Heading h5 Fonts', 'gamestorm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__( 'Heading h6 Fonts', 'gamestorm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter( 'kirki/fields', 'gamestorm_typo_fields' );







/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function gamestorm_THEME_option( $name ) {
    $value = '';
    if ( class_exists( 'gamestorm' ) ) {
        $value = Kirki::get_option( gamestorm_get_theme(), $name );
    }

    return apply_filters( 'gamestorm_THEME_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function gamestorm_get_theme() {
    return 'gamestorm';
}