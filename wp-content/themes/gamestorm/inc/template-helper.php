<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package gamestorm
 */

/** 
 *
 * gamestorm header
 */

function gamestorm_check_header() {
    $gamestorm_header_style = function_exists( 'get_field' ) ? get_field( 'header_style' ) : NULL;
    $gamestorm_default_header_style = get_theme_mod( 'choose_default_header', 'header-style-1' );

    if ( $gamestorm_header_style == 'header-style-1' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-1' );
    } 
    elseif ( $gamestorm_header_style == 'header-style-2' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-2' );
    } 
    elseif ( $gamestorm_header_style == 'header-style-3' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-3' );
    } 
    else {

        /** default header style **/
        if ( $gamestorm_default_header_style == 'header-style-2' ) {
            get_template_part( 'template-parts/header/header-2' );
        } 
        elseif ( $gamestorm_default_header_style == 'header-style-3' ) {
            get_template_part( 'template-parts/header/header-3' );
        }
        else {
            get_template_part( 'template-parts/header/header-1' );
        }
    }

}
add_action( 'gamestorm_header_style', 'gamestorm_check_header', 10 );


/**
 * [gamestorm_header_lang description]
 * @return [type] [description]
 */
function gamestorm_header_lang_defualt() {
    $gamestorm_header_lang = get_theme_mod( 'gamestorm_header_lang', false );
    if ( $gamestorm_header_lang ): ?>

    <ul>
        <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__( 'ENG', 'gamestorm' );?> </a>
        <?php do_action( 'gamestorm_language' );?>
        </li>
    </ul>

    <?php endif;?>
<?php
}

/**
 * [gamestorm_language_list description]
 * @return [type] [description]
 */
function _gamestorm_language( $mar ) {
    return $mar;
}
function gamestorm_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul>';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul>';
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'gamestorm' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Bangla', 'gamestorm' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'gamestorm' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _gamestorm_language( $mar );
}
add_action( 'gamestorm_language', 'gamestorm_language_list' );


// header logo
function gamestorm_header_logo() { ?>
    <?php
      $gamestorm_logo_on = function_exists( 'get_field' ) ? get_field( 'is_enable_sec_logo' ) : NULL;
      $gamestorm_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
      $gamestorm_logo_black = get_template_directory_uri() . '/assets/img/logo/logo.png';

      $gamestorm_site_logo = get_theme_mod( 'logo', $gamestorm_logo );
      $gamestorm_secondary_logo = get_theme_mod( 'seconday_logo', $gamestorm_logo_black );
    ?>

    <?php if ( !empty( $gamestorm_logo_on ) ) : ?>
       <a class="secondary-logo" href="<?php print esc_url( home_url( '/' ) );?>">
           <img src="<?php print esc_url( $gamestorm_site_logo  );?>" alt="<?php print esc_attr__( 'logo', 'gamestorm' );?>" />
       </a>
    <?php else : ?>
       <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) );?>">
           <img src="<?php print esc_url( $gamestorm_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'gamestorm' );?>" />
       </a>
    <?php endif; ?>
 <?php
}


// header logo
function gamestorm_header_sticky_logo() {?>
    <?php
        $gamestorm_logo_black = get_template_directory_uri() . '/assets/img/logo/logo-black.png';
        $gamestorm_secondary_logo = get_theme_mod( 'seconday_logo', $gamestorm_logo_black );
    ?>
      <a class="sticky-logo" href="<?php print esc_url( home_url( '/' ) );?>">
          <img src="<?php print esc_url( $gamestorm_secondary_logo );?>" alt="<?php print esc_attr__( 'logo', 'gamestorm' );?>" />
      </a>
    <?php
}

function gamestorm_mobile_logo() {
    // side info
    $gamestorm_mobile_logo_hide = get_theme_mod( 'gamestorm_mobile_logo_hide', false );

    $gamestorm_site_logo = get_theme_mod( 'logo', get_template_directory_uri() . '/assets/img/logo/logo.png' );

    ?>

    <?php if ( !empty( $gamestorm_mobile_logo_hide ) ): ?>
    <div class="side__logo mb-25">
        <a class="sideinfo-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img src="<?php print esc_url( $gamestorm_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'gamestorm' );?>" />
        </a>
    </div>
    <?php endif;?>



<?php }

/**
 * [gamestorm_header_social_profiles description]
 * @return [type] [description]
 */
function gamestorm_header_social_profiles() {
    $gamestorm_topbar_fb_url = get_theme_mod( 'gamestorm_topbar_fb_url', __( '#', 'gamestorm' ) );
    $gamestorm_topbar_twitter_url = get_theme_mod( 'gamestorm_topbar_twitter_url', __( '#', 'gamestorm' ) );
    $gamestorm_topbar_instagram_url = get_theme_mod( 'gamestorm_topbar_instagram_url', __( '#', 'gamestorm' ) );
    $gamestorm_topbar_linkedin_url = get_theme_mod( 'gamestorm_topbar_linkedin_url', __( '#', 'gamestorm' ) );
    $gamestorm_topbar_youtube_url = get_theme_mod( 'gamestorm_topbar_youtube_url', __( '#', 'gamestorm' ) );
    ?>
        <ul>
        <?php if ( !empty( $gamestorm_topbar_fb_url ) ): ?>
          <li><a href="<?php print esc_url( $gamestorm_topbar_fb_url );?>"><span><i class="fab fa-facebook-f"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $gamestorm_topbar_twitter_url ) ): ?>
            <li><a href="<?php print esc_url( $gamestorm_topbar_twitter_url );?>"><span><i class="fab fa-twitter"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $gamestorm_topbar_instagram_url ) ): ?>
            <li><a href="<?php print esc_url( $gamestorm_topbar_instagram_url );?>"><span><i class="fab fa-instagram"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $gamestorm_topbar_linkedin_url ) ): ?>
            <li><a href="<?php print esc_url( $gamestorm_topbar_linkedin_url );?>"><span><i class="fab fa-linkedin"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $gamestorm_topbar_youtube_url ) ): ?>
            <li><a href="<?php print esc_url( $gamestorm_topbar_youtube_url );?>"><span><i class="fab fa-youtube"></i></span></a></li>
        <?php endif;?>
        </ul>

<?php
}

function gamestorm_footer_social_profiles() {
    $gamestorm_footer_fb_url = get_theme_mod( 'gamestorm_footer_fb_url', __( '#', 'gamestorm' ) );
    $gamestorm_footer_twitter_url = get_theme_mod( 'gamestorm_footer_twitter_url', __( '#', 'gamestorm' ) );
    $gamestorm_footer_instagram_url = get_theme_mod( 'gamestorm_footer_instagram_url', __( '#', 'gamestorm' ) );
    $gamestorm_footer_linkedin_url = get_theme_mod( 'gamestorm_footer_linkedin_url', __( '#', 'gamestorm' ) );
    $gamestorm_footer_youtube_url = get_theme_mod( 'gamestorm_footer_youtube_url', __( '#', 'gamestorm' ) );
    ?>

        <ul>
        <?php if ( !empty( $gamestorm_footer_fb_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $gamestorm_footer_fb_url );?>">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $gamestorm_footer_twitter_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $gamestorm_footer_twitter_url );?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $gamestorm_footer_instagram_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $gamestorm_footer_instagram_url );?>">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $gamestorm_footer_linkedin_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $gamestorm_footer_linkedin_url );?>">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $gamestorm_footer_youtube_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $gamestorm_footer_youtube_url );?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif;?>
        </ul>
<?php
}

/**
 * [gamestorm_header_menu description]
 * @return [type] [description]
 */
function gamestorm_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'navbar-nav d-xl-flex d-none gap-3 py-4 py-lg-0 m-auto pe-20 align-self-center',
            'container'      => '',
            'fallback_cb'    => 'Gamestorm_Navwalker_Class::fallback',
            'walker'         => new Gamestorm_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [gamestorm_header_menu description]
 * @return [type] [description]
 */
function gamestorm_mobile_menu() {
    ?>
    <?php
        $gamestorm_menu = wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => '',
            'container'      => '',
            'menu_id'        => 'mobile-menu-active',
            'echo'           => false,
        ] );

    $gamestorm_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $gamestorm_menu );
        echo wp_kses_post( $gamestorm_menu );
    ?>
    <?php
}

/**
 * [gamestorm_search_menu description]
 * @return [type] [description]
 */
function gamestorm_header_search_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'header-search-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Gamestorm_Navwalker_Class::fallback',
            'walker'         => new Gamestorm_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [gamestorm_footer_menu description]
 * @return [type] [description]
 */
function gamestorm_footer_menu() {
    wp_nav_menu( [
        'theme_location' => 'footer-menu',
        'menu_class'     => 'copyright d-flex gap-3 align-items-center justify-content-center justify-content-md-end',
        'container'      => '',
        'fallback_cb'    => 'Gamestorm_Navwalker_Class::fallback',
        'walker'         => new Gamestorm_Navwalker_Class,
    ] );
}


/**
 * [gamestorm_category_menu description]
 * @return [type] [description]
 */
function gamestorm_category_menu() {
    wp_nav_menu( [
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'Gamestorm_Navwalker_Class::fallback',
        'walker'         => new Gamestorm_Navwalker_Class,
    ] );
}

/**
 *
 * gamestorm footer
 */
add_action( 'gamestorm_footer_style', 'gamestorm_check_footer', 10 );

function gamestorm_check_footer() {
    $gamestorm_footer_style = function_exists( 'get_field' ) ? get_field( 'footer_style' ) : NULL;
    $gamestorm_default_footer_style = get_theme_mod( 'choose_default_footer', 'footer-style-1' );

    if ( $gamestorm_footer_style == 'footer-style-1' ) {
        get_template_part( 'template-parts/footer/footer-1' );
    } 
    elseif ( $gamestorm_footer_style == 'footer-style-2' ) {
        get_template_part( 'template-parts/footer/footer-2' );
    } 
    elseif ( $gamestorm_footer_style == 'footer-style-3' ) {
        get_template_part( 'template-parts/footer/footer-3' );
    }
    elseif ( $gamestorm_footer_style == 'footer-style-4' ) {
        get_template_part( 'template-parts/footer/footer-4' );
    } else {

        /** default footer style **/
        if ( $gamestorm_default_footer_style == 'footer-style-2' ) {
            get_template_part( 'template-parts/footer/footer-2' );
        } 
        elseif ( $gamestorm_default_footer_style == 'footer-style-3' ) {
            get_template_part( 'template-parts/footer/footer-3' );
        } 
        elseif ( $gamestorm_default_footer_style == 'footer-style-4' ) {
            get_template_part( 'template-parts/footer/footer-4' );
        } 
        else {
            get_template_part( 'template-parts/footer/footer-1' );
        }

    }
}

// gamestorm_copyright_text
function gamestorm_copyright_text() {
    $home_url = esc_url(home_url('/')); // Get the home URL
    $copyright_text = get_theme_mod('gamestorm_copyright', 'Copyright © 2023 <a href="' . $home_url . '">Gamestorm</a> - All Rights Reserved');
    echo wp_kses($copyright_text, array(
       'a' => array(
          'href' => array(),
       ),
    ));
}

 
 



/**
 *
 * pagination
 */
if ( !function_exists( 'gamestorm_pagination' ) ) {

    function _gamestorm_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function gamestorm_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];
        }

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _gamestorm_pagi_callback( $pagi );
    }
}


// header top bg color
function gamestorm_breadcrumb_bg_color() {
    $color_code = get_theme_mod( 'gamestorm_breadcrumb_bg_color', '#222' );
    wp_enqueue_style( 'gamestorm-custom', GAMESTORM_THEME_CSS_DIR . 'gamestorm-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style( 'gamestorm-breadcrumb-bg', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'gamestorm_breadcrumb_bg_color' );

// breadcrumb-spacing top
function gamestorm_breadcrumb_spacing() {
    $padding_px = get_theme_mod( 'gamestorm_breadcrumb_spacing', '160px' );
    wp_enqueue_style( 'gamestorm-custom', GAMESTORM_THEME_CSS_DIR . 'gamestorm-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style( 'gamestorm-breadcrumb-top-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'gamestorm_breadcrumb_spacing' );

// breadcrumb-spacing bottom
function gamestorm_breadcrumb_bottom_spacing() {
    $padding_px = get_theme_mod( 'gamestorm_breadcrumb_bottom_spacing', '160px' );
    wp_enqueue_style( 'gamestorm-custom', GAMESTORM_THEME_CSS_DIR . 'gamestorm-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style( 'gamestorm-breadcrumb-bottom-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'gamestorm_breadcrumb_bottom_spacing' );

// scrollup
function gamestorm_scrollup_switch() {
    $scrollup_switch = get_theme_mod( 'gamestorm_scrollup_switch', false );
    wp_enqueue_style( 'gamestorm-custom', GAMESTORM_THEME_CSS_DIR . 'gamestorm-custom.css', [] );
    if ( $scrollup_switch ) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style( 'gamestorm-scrollup-switch', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'gamestorm_scrollup_switch' );

// theme color
function gamestorm_custom_color() {
    // Primary Color
    $color_code = get_theme_mod( 'gamestorm_color_option', '#0ef0ad' );
    $custom_css = '';

    if ( $color_code != '' ) {
        $custom_css .= ":root{
            --p300: $color_code !important; 
        }";
    }

    // Secondary Color
    $color_code2 = get_theme_mod( 'gamestorm_color_option_2', '#09926a' );
    $custom_css2 = '';

    if ( $color_code2 != '' ) {
        $custom_css2 .= ":root{
            --p500: $color_code2 !important; 
        }";
    }

    // Enqueue and add inline styles for Primary Color
    wp_register_style('gamestorm-custom', false);
    wp_enqueue_style('gamestorm-custom', false);
    wp_add_inline_style('gamestorm-custom', $custom_css, true);

    // Enqueue and add inline styles for Secondary Color
    wp_register_style('gamestorm-custom-2', false);
    wp_enqueue_style('gamestorm-custom-2', false);
    wp_add_inline_style('gamestorm-custom-2', $custom_css2, true);
}
add_action( 'wp_enqueue_scripts', 'gamestorm_custom_color' );









// gamestorm_kses_intermediate
function gamestorm_kses_intermediate( $string = '' ) {
    return wp_kses( $string, gamestorm_get_allowed_html_tags( 'intermediate' ) );
}

function gamestorm_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function gamestorm_kses($raw){

   $allowed_tags = array(
      'a'                         => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'                      => array(
         'title' => array(),
      ),
      'b'                         => array(),
      'blockquote'                => array(
         'cite' => array(),
      ),
      'cite'                      => array(
         'title' => array(),
      ),
      'code'                      => array(),
      'del'                    => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'                     => array(),
      'div'                    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'                     => array(),
      'dt'                     => array(),
      'em'                     => array(),
      'h1'                     => array(),
      'h2'                     => array(),
      'h3'                     => array(),
      'h4'                     => array(),
      'h5'                     => array(),
      'h6'                     => array(),
      'i'                         => array(
         'class' => array(),
      ),
      'img'                    => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'                     => array(
         'class' => array(),
      ),
      'ol'                     => array(
         'class' => array(),
      ),
      'p'                         => array(
         'class' => array(),
      ),
      'q'                         => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'                      => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'                 => array(
         'width'         => array(),
         'height'     => array(),
         'scrolling'     => array(),
         'frameborder'   => array(),
         'allow'         => array(),
         'src'        => array(),
      ),
      'strike'                 => array(),
      'br'                     => array(),
      'strong'                 => array(),
      'data-wow-duration'            => array(),
      'data-wow-delay'            => array(),
      'data-wallpaper-options'       => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'                     => array(
         'class' => array(),
      ),
      'svg' => array(
           'class' => true,
           'aria-hidden' => true,
           'aria-labelledby' => true,
           'role' => true,
           'xmlns' => true,
           'width' => true,
           'height' => true,
           'viewbox' => true, // <= Must be lower case!
       ),
       'g'     => array( 'fill' => true ),
       'title' => array( 'title' => true ),
       'path'  => array( 'd' => true, 'fill' => true,  ),
      );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}