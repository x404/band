<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>


	<?php if ( $show_shipping ) : ?>
		<p>
			<strong><?php esc_html_e( 'Shipping address', 'woocommerce' ); ?></strong>: 
			<?php 
				$address1 = wp_kses_post($order->get_billing_address_1());
				if ($address1 != '') $address1 = $address1.'<br>' ; else $address1 = '';
				
				$address2 = wp_kses_post($order->get_billing_address_2());
				if ($address2 != '') $address2 = $address2.'<br>' ; else $address2 = '';
				
				$city = wp_kses_post($order->get_billing_city());
				$state = wp_kses_post($order->get_billing_state());
				if ($state != '') $state = 'обл. ' . $state .'<br>' ; else $state = '';


			echo  $address1. $address2. wp_kses_post($order->get_billing_city()) .'<br>'.$state;

			// var_dump($order)
			?>
		</p>
	<?php endif; ?>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>