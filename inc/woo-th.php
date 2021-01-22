<?php
/**
 * WooCommerce Thai Adjustment by SeedThemes
 *
 * @package Plant
 */

/**
 * Change Billing Title to Shipping Title
 */
function plant_shipping_title( $page_title, $load_address ) {
    return "ที่อยู่ในการจัดส่ง";
}
add_filter( 'woocommerce_my_account_edit_address_title', 'plant_shipping_title', 10, 3 );