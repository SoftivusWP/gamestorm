<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gamestorm
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <?php if (is_singular() && pings_open(get_queried_object())) : ?>
   <?php endif; ?>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="https://gmpg.org/xfn/11">
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

   <?php wp_body_open(); ?>


   <?php
   $gamestorm_preloader = get_theme_mod('gamestorm_preloader', false);
   $gamestorm_backtotop = get_theme_mod('gamestorm_backtotop', false);
   $gamestorm_cursor = get_theme_mod('gamestorm_cursor', true);
   $gamestorm_preloader_logo = get_template_directory_uri() . '/assets/img/favicon.png';
   $preloader_logo = get_theme_mod('preloader_logo', $gamestorm_preloader_logo);

   ?>


   <!-- start preloader -->
   <?php if (!empty($gamestorm_preloader)) : ?>
      <div class="preloader align-items-center justify-content-center">
         <span class="loader"></span>
      </div>
   <?php endif; ?>
   <!-- end preloader -->

   <!-- Scroll To Top Start-->
   <?php if (!empty($gamestorm_backtotop)) : ?>
      <button class="scrollToTop d-none d-md-flex d-center" aria-label="scroll Bar Button"><?php echo esc_html__('Back To Top','gamestorm')?></button>
   <?php endif; ?>
   <!-- Scroll To Top End -->

   <!-- Start Custom Cursor -->
   <?php if (!empty($gamestorm_cursor)) : ?>
   <div class="mouse-follower">
      <span class="cursor-outline"></span>
      <span class="cursor-dot"></span>
   </div>
   <?php endif;?>
   <!-- End Custom Cursor -->



   <!-- header start -->
   <?php do_action('gamestorm_header_style'); ?>
   <!-- header end -->

   <!-- wrapper-box start -->
   <?php do_action('gamestorm_before_main_content'); ?>