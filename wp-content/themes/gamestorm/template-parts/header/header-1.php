<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gamestorm
 */

// info
$gamestorm_topbar_switch = get_theme_mod('gamestorm_topbar_switch', false);
$gamestorm_mail_id = get_theme_mod('gamestorm_mail_id', __('info@educal.com', 'gamestorm'));
$gamestorm_address = get_theme_mod('gamestorm_address', __('Moon ave, New York, 2020 NY US', 'gamestorm'));
$gamestorm_address_url = get_theme_mod('gamestorm_address_url', __('https://goo.gl/maps/qzqY2PAcQwUz1BYN9', 'gamestorm'));

// contact button
$gamestorm_button_text = get_theme_mod('gamestorm_button_text', __('Contact Us', 'gamestorm'));
$gamestorm_button_link = get_theme_mod('gamestorm_button_link', __('#', 'gamestorm'));
$gamestorm_phone_number = get_theme_mod('gamestorm_phone_num', __('(302) 555-0107', 'gamestorm'));

// acc button
$gamestorm_acc_button_text = get_theme_mod('gamestorm_acc_button_text', __('Login', 'gamestorm'));
$gamestorm_acc_button_link = get_theme_mod('gamestorm_acc_button_link', __('#', 'gamestorm'));

// Number
$gamestorm_show_number = get_theme_mod('gamestorm_show_number', false);

// Search
$gamestorm_search_switch = get_theme_mod('gamestorm_search', false);

// Wishlist
$gamestorm_wishlist_switch = get_theme_mod('gamestorm_wishlist', false);

// user
$gamestorm_user_switch = get_theme_mod('gamestorm_user', false);

// user
$gamestorm_language_switch = get_theme_mod('gamestorm_header_lang', false);
// user
$gamestorm_social_switch = get_theme_mod('gamestorm_header_social', false);

// header right
$gamestorm_header_right = get_theme_mod('gamestorm_header_right', false);
$gamestorm_menu_col = $gamestorm_header_right ? 'col-xxl-7 col-xl-7 col-lg-8 d-none d-lg-block' : 'col-xxl-10 col-xl-10 col-lg-9 d-none d-lg-block text-end';


// Check if at least one of the variables is true
if ($gamestorm_search_switch || $gamestorm_wishlist_switch || $gamestorm_user_switch || $gamestorm_header_right) {
   // Add the "justify-content-between" class
   $header_class = 'justify-content-between';
} else {
   // Add the "justify-content-end" class
   $header_class = 'justify-content-end';
}
?>

<!-- header area start -->


<header class="header-section header-menu">
   <nav class="navbar w-100 flex-nowrap px-2 py-6 ps-2 ps-xl-10 ps-xxl-10 navbar-expand-xl">
      <div class="sidebar-close mobile-menu">
         <button class="d-center d-grid d-xl-none">
            <i class="material-symbols-outlined mat-icon fs-four"> <?php echo esc_html('menu_open') ?> </i>
            <span class="fs-six"><?php echo esc_html__('MENU', 'gamestorm') ?></span>
         </button>
      </div>

      <span class="navbar-brand ms-4 ms-xxl-15 d-flex align-items-center gap-2 custom-logo-wrapper">
         <?php gamestorm_header_logo(); ?>
      </span>

      <div class="collapse navbar-collapse d-flex gap-10 w-100 <?php echo esc_html($header_class) ?> pe-2" id="navbar-content">

         <?php if (!empty($gamestorm_show_number)) :   ?>
            <?php if (!empty($gamestorm_phone_number)) :   ?>
               <div class="contact-info ms-xl-0 ms-xxl-5 d-none d-sm-flex align-items-center gap-2">
                  <i class="material-symbols-outlined mat-icon"> <?php echo esc_html('smartphone') ?> </i>
                  <span><?php echo esc_html($gamestorm_phone_number) ?></span>
               </div>
            <?php endif ?>
         <?php endif ?>

         <nav id="mobile-menu">
            <?php gamestorm_header_menu(); ?>
         </nav>

         <div class="right-area position-relative d-flex gap-3 gap-xxl-6 align-items-center">
            <?php if (!empty($gamestorm_search_switch)) :   ?>
               <div class="single-item">
                  <div class="cmn-head">
                     <div class="icon-area d-center position-relative">
                        <i class="material-symbols-outlined mat-icon fs-five"><?php echo esc_html('search') ?></i>
                     </div>
                  </div>
                  <div class="main-area p-5">
                     <h5 class="mb-2"><?php echo esc_html__('Search', 'gamestorm') ?></h5>
                     <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="input-area mt-6 p-4 d-flex align-items-center">
                           <input type="search" class="search-field" placeholder="<?php echo esc_attr__('Search Here', 'gamestorm'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr('Search for:', 'gamestorm'); ?>">
                           <div class="btn-area">
                              <button class="box-style btn-box border-re py-1 p-2" type="submit">
                                 <?php echo esc_html__('Search', 'gamestorm'); ?>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            <?php endif ?>


            <?php if (class_exists('YITH_WCWL') && !empty($gamestorm_wishlist_switch)) :   ?>
               <div class="single-item wishlist-area">
                  <div class="cmn-head">
                     <div class="icon-area d-center position-relative">
                        <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
                           <i id="wishlist-icon" class="material-symbols-outlined mat-icon fs-five"><?php echo esc_html('favorite') ?></i>
                        </a>
                     </div>
                  </div>
               </div>
            <?php endif; ?>
            <?php if (!empty($gamestorm_user_switch)) :   ?>
               <div class="single-item">
                  <div class="cmn-head">
                     <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <button type="button" class="icon-area d-center position-relative">
                           <i class="material-symbols-outlined mat-icon fs-five"><?php echo esc_html('person') ?></i>
                        </button>
                     </a>
                  </div>
               </div>
            <?php endif; ?>

            <?php if (!empty($gamestorm_header_right)) :   ?>
               <div class="single-item cart-area">
                  <div class="cmn-head">
                     <div class="single-item">
                        <div class="cmn-head">
                           <a href="<?php echo wc_get_cart_url(); ?>">
                              <button type="button" aria-label="Shopping Button" class="icon-area d-center position-relative">
                                 <i class="material-symbols-outlined mat-icon fs-five"><?php echo esc_html('shopping_bag') ?></i>
                              </button>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endif; ?>
         </div>
      </div>
   </nav>
</header>

<!-- Sidebar Menu start -->
<div class="sidebar-wrapper">
   <div class="position-relative">
      <div class="side-menubar py-6 d-flex flex-column justify-content-between align-items-center">
         <div class="sidebar-close d-none d-xl-block">
            <button class="d-center d-grid">
               <i class="material-symbols-outlined mat-icon fs-three"> <?php echo esc_html('menu_open',) ?> </i>
               <span><?php echo esc_html__('MENU', 'gamestorm') ?></span>
            </button>
         </div>
        
         <?php if (!empty( $gamestorm_social_switch)) : ?>
         <ul class="d-grid gap-4 social-area">
            <?php
            $gamestorm_topbar_fb_url = get_theme_mod('gamestorm_topbar_fb_url', __('#', 'gamestorm'));
            $gamestorm_topbar_twitter_url = get_theme_mod('gamestorm_topbar_twitter_url', __('#', 'gamestorm'));
            $gamestorm_topbar_instagram_url = get_theme_mod('gamestorm_topbar_instagram_url', __('#', 'gamestorm'));
            $gamestorm_topbar_linkedin_url = get_theme_mod('gamestorm_topbar_linkedin_url', __('#', 'gamestorm'));

            ?>
            <?php if (!empty($gamestorm_topbar_fb_url)) : ?>
               <li>
                  <a href="<?php print esc_url($gamestorm_topbar_fb_url); ?>" aria-label="Facebook" class="d-center">
                     <i class="fab fa-facebook-f"></i>
                  </a>
               </li>
            <?php endif ?>
            <?php if (!empty($gamestorm_topbar_instagram_url)) : ?>
               <li>
                  <a href="<?php print esc_url($gamestorm_topbar_instagram_url); ?>" aria-label="Instagram" class="d-center">
                     <i class="fab fa-instagram"></i>
                  </a>
               </li>
            <?php endif; ?>
            <?php if (!empty($gamestorm_topbar_linkedin_url)) : ?>
               <li>
                  <a href="<?php print esc_url($gamestorm_topbar_linkedin_url); ?>" aria-label="Linkedin" class="d-center">
                     <i class="fab fa-linkedin-in"></i>
                  </a>
               </li>
            <?php endif ?>
            <?php if (!empty($gamestorm_topbar_twitter_url)) : ?>
               <li>
                  <a href="<?php print esc_url($gamestorm_topbar_twitter_url); ?>" aria-label="Twitter" class="d-center">
                     <i class="fab fa-twitter"></i>
                  </a>
               </li>
            <?php endif; ?>
         </ul>
         <?php endif; ?>
         <?php if (!empty($gamestorm_language_switch)) : ?>

            <div class="bottom-area wpml-area header__lang">
               <?php gamestorm_header_lang_defualt() ?>
            </div>

         <?php endif; ?>
      </div>
      <div class="sidebar-content d-center flex-columnn">
         <div class="header-section d-block">
            <div class="navbar bg-transparen sidebar-nav">
               <?php
               wp_nav_menu([
                  'theme_location' => 'main-menu',
                  'menu_class'     => 'navbar-nav d-xl-flex gap-2 gap-md-5 py-4 py-lg-0 px-4 px-lg-0 align-self-center scrloff',
                  'container'      => '',
                  'fallback_cb'    => 'Gamestorm_Navwalker_Class::fallback',
                  'walker'         => new Gamestorm_Navwalker_Class,
               ]);
               ?>
            </div>
         </div>

         <?php

         $default_address = '<h5>London</h5><span>Al. Brucknera Aleksandra 63, Wrocław 51-410</span>';
         $gamestorm_extra_address = get_theme_mod('gamestorm_extra_address', wp_kses_post($default_address));

         $default_mail = '<span>Example@gmail.com</span><span>Example@gmail.com</span>';
         $gamestorm_extra_email = get_theme_mod('gamestorm_extra_email', wp_kses_post($default_mail));

         $default_phone = '<span>(302) 555-0107</span><span>(302) 555-0107</span>';
         $gamestorm_extra_phone = get_theme_mod('gamestorm_extra_phone', wp_kses_post($default_phone));

         $default_working_hours = '<span>Mon-Fri: 09:00-18:00 Sat-Sun: Weekend</span>';
         $gamestorm_extra_working = get_theme_mod('gamestorm_extra_working', wp_kses_post($default_working_hours));


         ?>

         <div class="footer-items w-100 bottom-0">
            <div class="row">
               <?php if (!empty($gamestorm_extra_address)) :   ?>
                  <div class="col-xl-3 col-lg-6">
                     <div class="single-item p-5 py-xxl-10 px-xxl-8">
                        <h4 class="mb-6"><?php echo esc_html__('Office', 'gamestorm') ?></h4>
                        <div class="d-flex gap-3 align-items-center">
                           <div class="icon-box d-center">
                              <i class="material-symbols-outlined mat-icon fs-fure"> <?php echo esc_html('location_on') ?> </i>
                           </div>
                           <div class="right-item w-75">
                              <?php echo wp_kses($gamestorm_extra_address, wp_kses_allowed_html('post'))  ?>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endif ?>

               <?php if (!empty($gamestorm_extra_email)) :   ?>
                  <div class="col-xl-3 col-lg-6">
                     <div class="single-item p-5 py-xxl-10 px-xxl-8">
                        <h4 class="mb-6"><?php echo esc_html__('Email address', 'gamestorm') ?></h4>
                        <div class="d-flex gap-3 align-items-center">
                           <div class="icon-box d-center">
                              <i class="material-symbols-outlined mat-icon fs-fure"> <?php echo esc_html('mail',) ?> </i>
                           </div>
                           <div class="right-item d-grid">
                              <?php echo wp_kses($gamestorm_extra_email, wp_kses_allowed_html('post'))  ?>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endif ?>

               <?php if (!empty($gamestorm_extra_phone)) :   ?>
                  <div class="col-xl-3 col-lg-6">
                     <div class="single-item p-5 py-xxl-10 px-xxl-8">
                        <h4 class="mb-6"><?php echo esc_html__('Phone Number', 'gamestorm') ?></h4>
                        <div class="d-flex gap-3 align-items-center">
                           <div class="icon-box d-center">
                              <i class="material-symbols-outlined mat-icon fs-fure"> <?php echo esc_html('call') ?> </i>
                           </div>
                           <div class="right-item d-grid">
                              <?php echo wp_kses($gamestorm_extra_phone, wp_kses_allowed_html('post'))  ?>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endif ?>

               <?php if (!empty($gamestorm_extra_working)) :   ?>
                  <div class="col-xl-3 col-lg-6">
                     <div class="single-item p-5 py-xxl-10 px-xxl-8">
                        <h4 class="mb-6"><?php echo esc_html__('Working Hours', 'gamestorm') ?></h4>
                        <div class="d-flex gap-3 align-items-center">
                           <div class="icon-box d-center">
                              <i class="material-symbols-outlined mat-icon fs-fure"> <?php echo esc_html('schedule') ?> </i>
                           </div>
                           <div class="right-item w-50">
                              <?php echo wp_kses($gamestorm_extra_working, wp_kses_allowed_html('post'))  ?>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endif ?>

            </div>
         </div>
      </div>
   </div>
</div>


<!-- header area end -->