<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gamestorm
 */

use Kirki\Field\Background;

$footer_bg_img = get_theme_mod('gamestorm_footer_bg');
$gamestorm_footer_logo = get_theme_mod('gamestorm_footer_logo');
$gamestorm_footer_top_space = function_exists('get_field') ? get_field('gamestorm_footer_top_space') : '0';
$gamestorm_copyright_center = $gamestorm_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
$gamestorm_footer_bg_url_from_page = function_exists('get_field') ? get_field('gamestorm_footer_bg') : '';
$gamestorm_footer_bg_color_from_page = function_exists('get_field') ? get_field('gamestorm_footer_bg_color') : '';
$footer_bg_color = get_theme_mod('gamestorm_footer_bg_color');

// bg image
$bg_img = !empty($gamestorm_footer_bg_url_from_page['url']) ? $gamestorm_footer_bg_url_from_page['url'] : $footer_bg_img;

// bg color
$bg_color = !empty($gamestorm_footer_bg_color_from_page) ? $gamestorm_footer_bg_color_from_page : $footer_bg_color;


// footer_columns
$footer_columns = 0;
$footer_widgets = get_theme_mod('footer_widget_number', 4);

for ($num = 1; $num <= $footer_widgets; $num++) {
    if (is_active_sidebar('footer-' . $num)) {
        $footer_columns++;
    }
}

switch ($footer_columns) {
    case '1':
        $footer_class[1] = 'col-lg-12';
        break;
    case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
    case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;
    case '4':
        $footer_class[1] = 'col-xl-3 col-md-5 col-sm-8 visible-from-bottom';
        $footer_class[2] = 'col-xl-3 col-md-5 col-sm-8 visible-from-bottom';
        $footer_class[3] = 'col-xl-3 col-md-5 col-sm-8 visible-from-bottom';
        $footer_class[4] = 'col-xl-3 col-md-5 col-sm-8 visible-from-bottom';
        break;
    default:
        $footer_class = 'col-xl-3 col-lg-3 col-md-6';
        break;
}

?>

    <!-- footer area start -->

    <?php
    $style_attribute = '';

    if (isset($bg_color)) {
        $style_attribute .= 'background-color: ' . esc_attr($bg_color) . '; ';
    }

    if (isset($bg_img)) {
        $style_attribute .= 'background: url(\'' . esc_url($bg_img) . '\'); ';
    }
    ?>

    <?php
    $style_attributes = '';

    if (isset($bg_color)) {
        $style_attributes .= 'background-color: ' . esc_attr($bg_color) . '; ';
    }

    if (isset($bg_img)) {
        $style_attributes .= 'background: url(\'' . esc_url($bg_img) . '\'); ';
    }
    ?>

    <footer class="footer-section-custom" style="<?php echo esc_attr($style_attributes); ?>">
        <div class="container">
            <div class="footer__area ">
                <?php if (is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4')) : ?>
                    <div class="footer__top ">
                        <div class="container">
                            <div class="row cus-mar pb-120">
                                <?php
                                    if ($footer_columns < 4) {
                                        print '<div class="col-xl-3 col-md-5 col-sm-8 visible-from-bottom">';
                                        dynamic_sidebar('footer-1');
                                        print '</div>';

                                        print '<div class=col-lg-3 col-md-3 col-sm-5">';
                                        dynamic_sidebar('footer-2');
                                        print '</div>';

                                        print '<div class="col-lg-3 col-md-3 col-sm-5">';
                                        dynamic_sidebar('footer-3');
                                        print '</div>';

                                        print '<div class="col-lg-3 col-md-6 col-sm-7">';
                                        dynamic_sidebar('footer-4');
                                        print '</div>';
                                    } else {
                                        for ($num = 1; $num <= $footer_columns; $num++) {
                                            if (!is_active_sidebar('footer-' . $num)) {
                                                continue;
                                            }
                                            print '<div class="' . esc_attr($footer_class[$num]) . '">';
                                            dynamic_sidebar('footer-' . $num);
                                            print '</div>';
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


                <div class="footer-bottom p-5">
                    <div class="row gap-3 gap-md-0 justify-content-between">
                        <div class="col-md-8 order-1 order-md-0">
                            <div class="copyright">
                                <p class="text-center text-md-start">
                                    <?php print gamestorm_copyright_text(); ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <?php gamestorm_footer_menu() ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>