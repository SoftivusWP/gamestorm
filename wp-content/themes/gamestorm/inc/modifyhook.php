<?php 



// Product Per Row Shop Page
function custom_shop_columns() {
   return 3; // Change the number to the desired products per row
}
add_filter('loop_shop_columns', 'custom_shop_columns', 20);

// Show plus minus buttons
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus"><i class="fas fa-plus"></i></button>';
}

add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus"><i class="fas fa-minus"></i></button>';
}

// Trigger update quantity script
add_action( 'woocommerce_init', 'bbloomer_add_cart_quantity_plus_minus' );
function bbloomer_add_cart_quantity_plus_minus() {
   if ( ! function_exists( 'is_product' ) || ! function_exists( 'wc_enqueue_js' ) ) {
       return;
   }

   // Debugging output
   error_log( 'Function bbloomer_add_cart_quantity_plus_minus is running.' );

   wc_enqueue_js( "
     $(document).on( 'click', 'button.plus, button.minus', function() {
        var qty = $( this ).parent( '.quantity' ).find( '.qty' );
        var val = parseFloat(qty.val());
        var max = parseFloat(qty.attr( 'max' ));
        var min = parseFloat(qty.attr( 'min' ));
        var step = parseFloat(qty.attr( 'step' ));

        if ( $( this ).is( '.plus' ) ) {
           if ( max && ( max <= val ) ) {
              qty.val( max ).change();
           } else {
              qty.val( val + step ).change();
           }
        } else {
           if ( min && ( min >= val ) ) {
              qty.val( min ).change();
           } else if ( val > 1 ) {
              qty.val( val - step ).change();
           }
        }
     });
  " );
}





















