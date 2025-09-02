<?php

/**
 * Template part for displaying footer layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gamestorm
 */

$footer_bg_img = get_theme_mod('gamestorm_footer_bg');
$gamestorm_footer_logo = get_theme_mod('gamestorm_footer_logo');
$gamestorm_footer_top_space = function_exists('get_field') ? get_field('gamestorm_footer_top_space') : '0';
$gamestorm_copyright_center = $gamestorm_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
$gamestorm_footer_bg_url_from_page = function_exists('get_field') ? get_field('gamestorm_footer_bg') : '';
$gamestorm_footer_bg_color_from_page = function_exists('get_field') ? get_field('gamestorm_footer_bg_color') : '';
$footer_bg_color = get_theme_mod('gamestorm_footer_bg_color');
$footer_top_space = get_theme_mod('gamestorm_footer_top_space');
$footer_copyright_switch = get_theme_mod('footer_copyright_switch', false);

// bg image
$bg_img = !empty($gamestorm_footer_bg_url_from_page['url']) ? $gamestorm_footer_bg_url_from_page['url'] : $footer_bg_img;

// bg color
$bg_color = !empty($gamestorm_footer_bg_color_from_page) ? $gamestorm_footer_bg_color_from_page : $footer_bg_color;

// footer space
$footer_space = !empty($gamestorm_footer_top_space) ? $gamestorm_footer_top_space : $footer_top_space;
$footer_columns = 0;
$footer_widgets = get_theme_mod('footer_widget_number', 4);

for ($num = 1; $num <= $footer_widgets; $num++) {
    if (is_active_sidebar('footer-2-' . $num)) {
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
        $footer_class[1] = 'col-xl-4 col-md-5';
        $footer_class[2] = 'col-xl-2 col-md-2 col-sm-3';
        $footer_class[3] = 'col-xl-3 col-md-5 col-sm-8';
        $footer_class[4] = 'col-xl-3 col-md-7';
        break;
    default:
        $footer_class = 'col-xl-3 col-lg-3 col-md-6';
        break;
}

?>

    <!-- footer area start -->
    <footer class="footer-section index-two" 
        <?php if (isset($bg_color)) : ?> style="background-color: <?php echo esc_attr($bg_color); ?>" <?php endif; ?>
        <?php if (isset($bg_img)) : ?> style="background: url('<?php echo esc_url($bg_img); ?>')" <?php endif; ?>>
        <div class="footer__area">
            <?php if (is_active_sidebar('footer-2-1') or is_active_sidebar('footer-2-2') or is_active_sidebar('footer-2-3') or is_active_sidebar('footer-2-4')) : ?>
                <div class="footer__top ">
                    <div class="container pt-15">
                        <div class="row footer-wrapper px-4 px-sm-6 pt-120 pb-120">
                            <?php
                                if ($footer_columns < 4) {
                                    print '<div class="col-xl-4 col-md-5">';
                                    dynamic_sidebar('footer-2-1');
                                    print '</div>';

                                    print '<div class="col-xl-2 col-md-2 col-sm-3">';
                                    dynamic_sidebar('footer-2-2');
                                    print '</div>';

                                    print '<div class="col-xl-3 col-md-5 col-sm-8">';
                                    dynamic_sidebar('footer-2-3');
                                    print '</div>';

                                    print '<div class="col-xl-3 col-md-7">';
                                    dynamic_sidebar('footer-2-4');
                                    print '</div>';
                                } else {
                                    for ($num = 1; $num <= $footer_columns; $num++) {
                                        if (!is_active_sidebar('footer-2-' . $num)) {
                                            continue;
                                        }
                                        print '<div class="' . esc_attr($footer_class[$num]) . '">';
                                        dynamic_sidebar('footer-2-' . $num);
                                        print '</div>';
                                    }
                                }
                                ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>




            <div class="footer-bottom bg-transparent pt-6 pb-8">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <div class="copyright">
                                <p><?php print gamestorm_copyright_text(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </footer>