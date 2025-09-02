<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<li <?php wc_product_class('', $product); ?>>

	
	<div class="single-box box-style box-first p-3 p-sm-6 d-flex flex-row gap-6">
		<div class="icon-area">
			<?php the_post_thumbnail()?>
		</div>
		<div class="text-area text-start">
			<h5  class="mb-2"><a href="<?php the_permalink()?>"><?php the_title()?></a></h5>
			<p><?php woocommerce_template_loop_price() ?></p>
			<div class="btn-area mt-4 alt-bg">
				<a href="<?php echo esc_url(home_url()) ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class=" product_type_simple add_to_cart_button ajax_add_to_cart box-style btn-box d-center gap-2" data-product_id="<?php echo get_the_ID(); ?>">
					<?php echo esc_html__('Add to Cart','gamestorm')?>
					<i class="material-symbols-outlined mat-icon fs-five"><?php echo esc_html('shopping_bag')?></i>
				</a>
			</div>
		</div>
	</div>


</li>