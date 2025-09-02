<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gamestorm
 */

get_header();
?>

<section class="error__area pt-120 pb-120">
   <div class="container">
      <div class="row">
         <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
            <?php
            $gamestorm_404_bg = get_theme_mod('gamestorm_404_bg', get_template_directory_uri() . '/assets/img/error/error.png');
            $gamestorm_error_title = get_theme_mod('gamestorm_error_title', __('Page not found', 'gamestorm'));
            $gamestorm_error_link_text = get_theme_mod('gamestorm_error_link_text', __('Back To Home', 'gamestorm'));
            $gamestorm_error_desc = get_theme_mod('gamestorm_error_desc', __('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'gamestorm'));
            ?>
            <div class="error__item text-center">
               <?php if (!empty($gamestorm_404_bg)) :   ?>
                  <div class="error__thumb mb-45">
                     <img src="<?php echo esc_url($gamestorm_404_bg); ?>" alt="<?php print esc_attr__('Error 404', 'gamestorm'); ?>">
                  </div>
               <?php endif ?>

               <div class="error__content">
                  <h3 class="error__title"><?php print esc_html($gamestorm_error_title); ?></h3>
                  <p><?php print esc_html($gamestorm_error_desc); ?></p>
                  <a href="<?php print esc_url(home_url('/')); ?>" class="tp-btn"><?php print esc_html($gamestorm_error_link_text); ?></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?php
get_footer();
