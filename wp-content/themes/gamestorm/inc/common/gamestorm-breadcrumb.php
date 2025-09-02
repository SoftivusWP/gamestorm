<?php

/**
 * Breadcrumbs for Gamestorm theme.
 *
 * @package     Gamestorm
 * @author      Theme_Pure
 * @copyright   Copyright (c) 2022, Theme_Pure
 * @link        https://weblearnbd.net
 * @since       Gamestorm 1.0.0
 */


function gamestorm_breadcrumb_func()
{
    global $post;
    $breadcrumb_class = '';
    $breadcrumb_show = 1;


    $title = ''; // Initialize $title to an empty string

    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'gamestorm'));
        $breadcrumb_class = 'home_front_page';
    } elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'gamestorm'));
        $breadcrumb_show = 0;
    } elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    } elseif (is_single() && 'post' == get_post_type()) {
        $title = get_the_title();
    } elseif (is_single() && 'product' == get_post_type()) {
        $title = get_theme_mod('breadcrumb_product_details', __('Shop', 'gamestorm'));
    } elseif (is_single() && 'services' == get_post_type()) {
        $title = esc_html__('Services', 'gamestorm');
    } elseif ('job' == get_post_type()) {
        $title = esc_html__('Job', 'gamestorm');
    } elseif (is_search()) {
        $title = esc_html__('Search Results for : ', 'gamestorm') . get_search_query();
    } elseif ('games' == get_post_type()) {
        $title = esc_html__('Games', 'gamestorm');
    } elseif (is_404()) {
        $title = esc_html__('Page not Found', 'gamestorm');
    } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop', __('Shop', 'gamestorm'));
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }
    


    $_id = get_the_ID();

    if (is_single() && 'product' == get_post_type()) {
        $_id = $post->ID;
    } elseif (function_exists("is_shop") and is_shop()) {
        $_id = wc_get_page_id('shop');
    } elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }

    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb', $_id) : '';
    if (!empty($_GET['s'])) {
        $is_breadcrumb = null;
    }

    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';

        // Breadcrumb Title & Description  
        $breadcrumb_titile = function_exists('get_field') ? get_field('breadcrumb_titile', $_id) : '';
        $breadcrumb_description = function_exists('get_field') ? get_field('breadcrumb_description', $_id) : '';

        // get_theme_mod
        $bg_img = get_theme_mod('breadcrumb_bg_img');
        $gamestorm_breadcrumb_shape_switch = get_theme_mod('gamestorm_breadcrumb_shape_switch', true);
        $breadcrumb_info_switch = get_theme_mod('breadcrumb_info_switch', true);
        $breadcrumb_switch = get_theme_mod('breadcrumb_switch', true);
        $breadcrumb_shape_switch = get_theme_mod('breadcrumb_shape_image', false);

        if ($hide_bg_img && empty($_GET['s'])) {
            $bg_img = '';
        } else {
            $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;
        } ?>

        <!-- page title area start -->

        <?php if (!empty($breadcrumb_switch)) : ?>
            <section class="banner-section inner-banner position-relative about" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
                <?php if (!empty($breadcrumb_shape_switch)) : ?>
                    <div class="shape-area">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/bubble.png" class="shape-1" alt="<?php echo esc_attr__('icon', 'gamestorm') ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/abs-items/ellipse-7.png" class="shape-2" alt="<?php echo esc_attr__('icon', 'gamestorm') ?>">
                    </div>
                <?php endif ?>
                <div class="container position-relative">
                    <div class="banner-content row justify-content-between">
                        <div class="col-lg-6 col-md-10">
                            <div class="main-content">
                                <?php if (!empty($breadcrumb_titile)) :   ?>
                                    <h2 class="visible-slowly-bottom display-four mb-6">
                                        <?php echo wp_kses($breadcrumb_titile, wp_kses_allowed_html('post'))  ?>
                                    </h2>
                                <?php else : ?>
                                    <h2 class="visible-slowly-bottom display-four mb-6 breadcrumb-default-title">

                                        <?php echo wp_kses_post($title); ?>


                                    </h2>
                                <?php endif ?>
                                <?php if (!empty($breadcrumb_description)) :   ?>
                                    <p class="fs-four"><?php echo wp_kses($breadcrumb_description, wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-10 d-grid align-items-end justify-content-end">
                            <div class="breadcrumb-area position-absolute end-0 bottom-0">
                                <?php if (function_exists('bcn_display')) : ?>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb m-0 py-3 px-8 fs-six d-flex align-items-end justify-content-end">
                                            <?php bcn_display() ?>
                                        </ol>
                                    </nav>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- page title area end -->
    <?php
        }
    }

    add_action('gamestorm_before_main_content', 'gamestorm_breadcrumb_func');

    // gamestorm_search_form
    function gamestorm_search_form()
    {
        ?>
    <div class="search-wrapper p-relative transition-3 d-none">
        <div class="search-form transition-3">
            <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                <input type="search" name="s" value="<?php print esc_attr(get_search_query()) ?>" placeholder="<?php print esc_attr__('Enter Your Keyword', 'gamestorm'); ?>">
                <button type="submit" class="search-btn"><i class="far fa-search"></i></button>
            </form>
            <a href="javascript:void(0);" class="search-close"><i class="far fa-times"></i></a>
        </div>
    </div>
<?php
}

add_action('gamestorm_before_main_content', 'gamestorm_search_form');
