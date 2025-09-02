<?php

/**
 * gamestorm_scripts description
 * @return [type] [description]
 */
function gamestorm_scripts() {
    // Enqueue styles

    wp_enqueue_style( 'google-font-chakrlla', 'https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;500;600;700&&display=swap' );

    wp_enqueue_style( 'google-font-chakra', 'https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&display=swap' );
   
    wp_enqueue_style( 'fontawesome', GAMESTORM_THEME_CSS_DIR . 'font-awesome-pro-eduker.css',[] );
    wp_enqueue_style( 'animate.css', GAMESTORM_THEME_CSS_DIR . 'animate.css',[] );
    wp_enqueue_style( 'bootstrap', GAMESTORM_THEME_CSS_DIR . 'bootstrap.css',[] );
    wp_enqueue_style( 'swiper-bundle', GAMESTORM_THEME_CSS_DIR . 'swiper-bundle.css',[] );
    wp_enqueue_style( 'magnific-popup', GAMESTORM_THEME_CSS_DIR . 'magnific-popup.css',[] );
    wp_enqueue_style( 'materialicons', GAMESTORM_THEME_CSS_DIR . 'materialicons.css',[] );
    wp_enqueue_style( 'nice-select', GAMESTORM_THEME_CSS_DIR . 'nice-select.css',[] );
    wp_enqueue_style( 'odometer-min', GAMESTORM_THEME_CSS_DIR . 'odometer-min.css',[] );
    wp_enqueue_style( 'remixicon-min', GAMESTORM_THEME_CSS_DIR . 'remixicon-min.css',[] );
    wp_enqueue_style( 'slick.min', GAMESTORM_THEME_CSS_DIR . 'slick.min.css',[] );
    wp_enqueue_style( 'spacing', GAMESTORM_THEME_CSS_DIR . 'spacing.css',[] );
    wp_enqueue_style( 'select2-css', GAMESTORM_THEME_CSS_DIR . 'select2.min.css',[] );
    wp_enqueue_style( 'woo-custom', GAMESTORM_THEME_CSS_DIR . 'custom-woo.css',[] );
    wp_enqueue_style( 'main-css', GAMESTORM_THEME_CSS_DIR . 'style.css',[],time() );
    wp_enqueue_style( 'gamestorm-unit', GAMESTORM_THEME_CSS_DIR . 'gamestorm-unit.css',[],time() );
    wp_enqueue_style( 'gamestorm-custom', GAMESTORM_THEME_CSS_DIR . 'gamestorm-custom.css',[],time() );
    wp_enqueue_style( 'responsive-custom', GAMESTORM_THEME_CSS_DIR . 'responsive.css',[] );
    wp_enqueue_style( 'gamestorm-style', get_stylesheet_uri() );

    // Enqueue scripts
    wp_enqueue_script( 'plugin-custom', GAMESTORM_THEME_JS_DIR . 'plugin-custom.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'plugins', GAMESTORM_THEME_JS_DIR . 'plugins.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'swiper-bundle-js', GAMESTORM_THEME_JS_DIR . 'swiper-bundle.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'select2js', GAMESTORM_THEME_JS_DIR . 'select2.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'gamestorm-main', GAMESTORM_THEME_JS_DIR . 'main.js', [ 'jquery' ], time(), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'gamestorm_scripts' );


