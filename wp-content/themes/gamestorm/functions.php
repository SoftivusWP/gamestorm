<?php

/**
 * gamestorm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gamestorm
 */

if (!function_exists('gamestorm_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function gamestorm_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on gamestorm, use a find and replace
         * to change 'gamestorm' to the name of your theme in all the template files.
         */
        load_theme_textdomain('gamestorm', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus([
            'main-menu' => esc_html__('Main Menu', 'gamestorm'),
            'category-menu' => esc_html__('Category Menu', 'gamestorm'),
            'footer-menu' => esc_html__('Footer Menu', 'gamestorm'),
        ]);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('gamestorm_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        //Enable custom header
        add_theme_support('custom-header');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ]);

        /**
         * Enable suporrt for Post Formats
         *
         * see: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', [
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
        ]);

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        remove_theme_support('widgets-block-editor');

        add_image_size('blog-details', 856, 538, ['center', 'center']);
        add_image_size('blog-post', 756, 503, ['center', 'center']);
        add_image_size('gameone', 429, 492, ['center', 'center']);
        add_image_size('gametwo', 634, 353, ['center', 'center']);
        add_image_size('gamethreeimgone', 746, 524, ['center', 'center']);
        add_image_size('gamethreeimgtwo', 526, 250, ['center', 'center']);
        add_image_size('gamestorm-case-details', 1170, 600, ['center', 'center']);
        add_image_size('gamestorm-three-page', 634, 400, ['center', 'center']);
        add_image_size('service-one', 416, 473, ['center', 'center']);
    }
endif;
add_action('after_setup_theme', 'gamestorm_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gamestorm_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('gamestorm_content_width', 640);
}
add_action('after_setup_theme', 'gamestorm_content_width', 0);



/**
 * Enqueue scripts and styles.
 */

define('GAMESTORM_THEME_DIR', get_template_directory());
define('GAMESTORM_THEME_URI', get_template_directory_uri());
define('GAMESTORM_THEME_CSS_DIR', GAMESTORM_THEME_URI . '/assets/css/');
define('GAMESTORM_THEME_JS_DIR', GAMESTORM_THEME_URI . '/assets/js/');
define('GAMESTORM_THEME_INC', GAMESTORM_THEME_DIR . '/inc/');



// wp_body_open
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}

/**
 * Implement the Custom Header feature.
 */
require GAMESTORM_THEME_INC . 'custom-header.php';


// Woocommerce
require GAMESTORM_THEME_INC . 'modifyhook.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require GAMESTORM_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require GAMESTORM_THEME_INC . 'template-helper.php';

/**
 * initialize kirki customizer class.
 */
include_once GAMESTORM_THEME_INC . 'kirki-customizer.php';
include_once GAMESTORM_THEME_INC . 'class-gamestorm-kirki.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require GAMESTORM_THEME_INC . 'jetpack.php';
}



/**
 * include gamestorm functions file
 */
require_once GAMESTORM_THEME_INC . 'class-navwalker.php';
require_once GAMESTORM_THEME_INC . 'class-tgm-plugin-activation.php';
require_once GAMESTORM_THEME_INC . 'add_plugin.php';
require_once GAMESTORM_THEME_INC . '/common/gamestorm-breadcrumb.php';
require_once GAMESTORM_THEME_INC . '/common/gamestorm-scripts.php';
require_once GAMESTORM_THEME_INC . '/common/gamestorm-widgets.php';

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function gamestorm_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'gamestorm_pingback_header');

// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function gamestorm_move_comment_textarea_to_bottom($fields)
{
    $comment_field       = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'gamestorm_move_comment_textarea_to_bottom');


function customize_comment_reply_link($link)
{
    // Add your CSS class to the link.
    $link = str_replace('class=\'comment-reply-link\'', 'class=\'box-style reply-btn btn-box btn-cmd\'', $link);
    return $link;
}

add_filter('comment_reply_link', 'customize_comment_reply_link');



// gamestorm_comment 
if (!function_exists('gamestorm_comment')) {
    function gamestorm_comment($comment, $args, $depth)
    {
        $GLOBAL['comment'] = $comment;
        extract($args, EXTR_SKIP);
        $args['reply_text'] = 'Reply';
        $replayClass = 'comment-depth-' . esc_attr($depth);
        ?>
        <li id="comment-<?php comment_ID(); ?>">
            <div class="comments-box grey-bg-2">
                <div class="comments-avatar">
                    <?php print get_avatar($comment, 102, null, null, ['class' => []]); ?>
                </div>
                <div class="comments-text">
                    <div class="avatar-name">
                        <h5><?php print get_comment_author_link(); ?></h5>
                        <span><?php comment_time(get_option('date_format')); ?></span>
                    </div>
                    <?php comment_text(); ?>

                    <div class="comments-replay">
                        <?php comment_reply_link(
                                    array_merge(
                                        $args,
                                        [
                                            'depth'      => $depth,
                                            'max_depth'  => $args['max_depth'],
                                            'reply_text' => 'Reply', // Optional: Change the reply text
                                            'add_below'  => 'comment', // Optional: Specifies where the reply link appears
                                            'class'      => 'box-style reply-btn btn-box btn-cmd', // Add your CSS class here
                                        ]
                                    )
                                );
                                ?>

                    </div>

                </div>
            </div>
    <?php
        }
    }


    /**
     * shortcode supports for removing extra p, spance etc
     *
     */
    add_filter('the_content', 'gamestorm_shortcode_extra_content_remove');
    /**
     * Filters the content to remove any extra paragraph or break tags
     * caused by shortcodes.
     *
     * @since 1.0.0
     *
     * @param string $content  String of HTML content.
     * @return string $content Amended string of HTML content.
     */
    function gamestorm_shortcode_extra_content_remove($content)
    {

        $array = [
            '<p>['    => '[',
            ']</p>'   => ']',
            ']<br />' => ']',
        ];
        return strtr($content, $array);
    }

    // gamestorm_search_filter_form
    if (!function_exists('gamestorm_search_filter_form')) {
        function gamestorm_search_filter_form($form)
        {

            $form = sprintf(
                '<div class="sidebar__widget-px"><div class="search-px"><form class="sidebar__search p-relative" action="%s" method="get">
      	<input type="text" value="%s" required name="s" placeholder="%s">
      	<button class="box-style btn-box border-re p-2" type="submit"> <i class="material-symbols-outlined"> search </i>  </button>
		</form></div></div>',
                esc_url(home_url('/')),
                esc_attr(get_search_query()),
                esc_html__('Search', 'gamestorm')
            );

            return $form;
        }
        add_filter('get_search_form', 'gamestorm_search_filter_form');
    }

    add_action('admin_enqueue_scripts', 'gamestorm_admin_custom_scripts');

    function gamestorm_admin_custom_scripts()
    {
        wp_enqueue_media();
        wp_enqueue_style('customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css', array());
        wp_register_script('gamestorm-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', ['jquery'], '', true);
        wp_enqueue_script('gamestorm-admin-custom');
    }

    // Woocommerce Support


    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');


    // Number of Woocommerce Related Product  

    add_filter('woocommerce_output_related_products_args', 'bbloomer_change_number_related_products', 9999);

    function bbloomer_change_number_related_products($args)
    {
        $args['posts_per_page'] = 3; // # of related products
        $args['columns'] = 3; // # of columns per row
        return $args;
    }


  
