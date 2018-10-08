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
<section class="woocommerce-customer-details">
<h2><?php esc_html_e( 'Customer Details', 'woocommerce' ); ?></h2>

		<?php if ( $show_shipping ) : ?>
		
		<div class="row addresses">
			<div class="small-6 columns address">
		
		<?php endif; ?>
		
				<label><?php esc_html_e( 'Billing Address','notio' ); ?></label>
				<address>
					<?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
					<?php if ( $order->get_billing_phone() ) : ?>
						<p class="woocommerce-customer-details--phone"><?php echo esc_html( $order->get_billing_phone() ); ?></p>
					<?php endif; ?>
			
					<?php if ( $order->get_billing_email() ) : ?>
						<p class="woocommerce-customer-details--email"><?php echo esc_html( $order->get_billing_email() ); ?></p>
					<?php endif; ?>
				</address>
		
		<?php if ( $show_shipping ) : ?>
		
			</div><!-- /.col-1 -->
			<div class="small-6 columns address">
				<label><?php esc_html_e( 'Shipping Address','notio' ); ?></label>
				<address>
					<?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
				</address>
			</div><!-- /.col-2 -->
		</div><!-- /.col2-set -->
		
		<?php endif; ?>
		<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>
</section>