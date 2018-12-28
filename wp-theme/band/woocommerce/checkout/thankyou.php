<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// var_dump($order);
?>


<div class="woocommerce-order row">
	<div class="col-lg-6 offset-lg-3">	
		<?php if ( $order ) : ?>

			<?php if ( $order->has_status( 'failed' ) ) : ?>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
					<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
					<?php endif; ?>
				</p>

			<?php else : ?>

				<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received woocommerce-order-title">Спасибо за Ваш заказ!</p>
				<p class="text-center">В ближайшее время с Вами свяжется менеджер для уточнения деталей.</p>

				<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

					<li class="woocommerce-order-overview__order order">
						<?php _e( 'Order number:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_order_number(); ?></strong>
					</li>

					<li>
						ФИО: <strong>
						<?php 
							echo $order->get_shipping_last_name() ." " . $order->get_shipping_first_name(); 
						?></strong>
					</li>

					<li>
						Телефон: <strong>
						<?php 
							echo $order->get_billing_phone(); 
						?></strong>
					</li>

					<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
						<li class="woocommerce-order-overview__email email">
							<?php _e( 'Email:', 'woocommerce' ); ?>
							<strong><?php echo $order->get_billing_email(); ?></strong>
						</li>
					<?php endif; ?>
				</ul>

			<?php endif; ?>

			<?php //do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
			<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

		<?php endif; ?>
	</div>

</div>
