<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gamestorm_widgets_init() {

    $footer_style_2_switch = get_theme_mod( 'footer_style_2_switch', false );


    /**
     * blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'gamestorm' ),
        'id'            => 'blog-sidebar',
        'description'          => esc_html__( 'Set Your Blog Widget', 'gamestorm' ),
        'before_widget' => '<div id="%1$s" class="sidebar__widget mb-25 %2$s sidebar-area-content p-5">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="sidebar__widget-head mb-25"><h3 class="visible-slowly-bottom mb-6 sidebar__widget-title">',
        'after_title'   => '</h3></div>',
    ] );


    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // footer default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer %1$s', 'gamestorm' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer column %1$s', 'gamestorm' ), $num ),
            'before_widget' => '<div id="%1$s" class="single-box footer__widget footer-col-'.$num.' mb-50 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="footer__widget-title mb-4">',
            'after_title'   => '</h4>',
        ] );
    }

    // footer 2
    if ( $footer_style_2_switch ) {
        for ( $num = 1; $num <= $footer_widgets; $num++ ) {

            register_sidebar( [
                'name'          => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'gamestorm' ), $num ),
                'id'            => 'footer-2-' . $num,
                'description'   => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'gamestorm' ), $num ),
                'before_widget' => '<div id="%1$s" class="links footer__widget footer__widget-2 footer-col-2-'.$num.' mb-50 %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="footer__widget-title mb-4">',
                'after_title'   => '</h4>',
            ] );
        }
    }    


}
add_action( 'widgets_init', 'gamestorm_widgets_init' );