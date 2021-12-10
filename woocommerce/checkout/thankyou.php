<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibipty. We try to do this as pttle as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will pst any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */
defined('ABSPATH') || exit;

$order_items = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
$is_course = false;

foreach ($order_items as $item_id => $item) {
    $product = $item->get_product();
    if ($product->post_type == "product") {
	$product_category_ids = $product->get_category_ids();
	if (in_array("77", $product_category_ids)) {
	    $is_course = true;
	}
    }
}
?>

<div class="woocommerce-order">
    <?php
    if ($order) :

	do_action('woocommerce_before_thankyou', $order->get_id());
	?>

	<?php if ($order->has_status('failed')) : ?>

	    <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has decpned your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>
	    <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
		<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>"
		   class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
		   <?php if (is_user_logged_in()) : ?>
	    	<a href="<?php echo esc_url(wc_get_page_permapnk('myaccount')); ?>"
	    	   class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
		   <?php endif; ?>
	    </p>

	<?php else : ?>

	    <div class="woocommerce-order-header text-center mb-3 mb-lg-5">
		<div class="header-icon">
		    <svg width="102" height="99" viewBox="0 0 102 99" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" cpp-rule="evenodd"
			      d="M49.6129 1.30968C40.1583 1.30968 30.9161 4.11329 23.0549 9.36597C15.1937 14.6187 9.06662 22.0845 5.4485 30.8194C1.83039 39.5543 0.883727 49.1659 2.72822 58.4389C4.57272 67.7118 9.12554 76.2295 15.8109 82.9149C22.4963 89.6003 31.0141 94.1531 40.287 95.9976C49.5599 97.8421 59.1715 96.8954 67.9064 93.2773C76.6413 89.6592 84.1072 83.5322 89.3599 75.671L90.4488 76.3986C85.0522 84.4751 77.3818 90.7701 68.4076 94.4873C59.4334 98.2046 49.5584 99.1772 40.0315 97.2821C30.5045 95.3871 21.7534 90.7095 14.8849 83.841C8.01629 76.9724 3.33874 68.2213 1.44371 58.6944C-0.45132 49.1674 0.52128 39.2924 4.23852 30.3182C7.95576 21.344 14.2507 13.6736 22.3273 8.27702C30.4038 2.88042 39.8993 -7.80629e-08 49.6129 0V1.30968Z"
			      fill="#4ECC8C"/>
			<path d="M91.5225 49.1128C91.5225 72.2589 72.7589 91.0225 49.6128 91.0225C26.4667 91.0225 7.70312 72.2589 7.70312 49.1128C7.70312 25.9667 26.4667 7.20312 49.6128 7.20312C72.7589 7.20312 91.5225 25.9667 91.5225 49.1128Z"
			      fill="#4ECC8C"/>
			<path fill-rule="evenodd" cpp-rule="evenodd"
			      d="M70.7275 40.1043L44.375 66.4568L28.5 50.5818L34.0565 45.0253L44.375 55.3438L65.171 34.5479L70.7275 40.1043Z"
			      fill="white"/>
			<path d="M102 59.5902C102 65.3767 97.3089 70.0676 91.5223 70.0676C85.7358 70.0676 81.0449 65.3767 81.0449 59.5902C81.0449 53.8037 85.7358 49.1128 91.5223 49.1128C97.3089 49.1128 102 53.8037 102 59.5902Z"
			      fill="#FF6600"/>
		    </svg>

		</div>
		<h1 class="h1">Thank you</h1>
		<h2 class="h4">You order was completed successfully</h2>
	    </div>

	    <div class="order-content mb-3">
		<p class="body-lg">Dear <?php echo $order->get_billing_first_name(); ?></p>
		<?php if ($is_course): ?>
	    	<p>Thank you for your interest in Vitacodis and purchasing Online Video Course.</p>
	    	<p>We hope that you will enjoy the course and will be able to increase your wellbeing by applying the techniques and principles what you will explore and learn.</p>
		<?php else: ?>
	    	<p>Thank you for booking your Vitacodis online personalized consultation. Each session is tailored to suit your individual needs, with advice to help improve your wellbeing and the discussion of subjects including mental health, positive psychology, stress management, personal development, work-life balance and more.</p>
	    	<p>Whatever life challenges you are facing, we hope that the wellbeing consultant chosen by you will be able to help with your unique situation. Your consultant will contact you shortly to propose a few time slots for your one-to-one session(s) and give you the video conferencing details.</p>
		<?php endif; ?>
		<p>Best regards. </p>
		<p>Vitacodis Team</p>
	    </div>
	    <div class="row justify-content-between align-items-center">
		<div class="col-md-auto">
		    <h4>Receipt # <?php echo $order->get_order_number(); ?></h4>
		</div>
		<div class="col-md-auto"><?php echo wc_format_datetime($order->get_date_created(), 'd/m/Y'); ?></div>
	    </div>
	    <?php //do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id());   ?>
	    <?php do_action('woocommerce_thankyou', $order->get_id()); ?>

	    <div class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
		<p class="woocommerce-order-overview__date date">
		    <?php esc_html_e('Date of purchase:', 'woocommerce'); ?>
		    <?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped                     ?>
		</p>
		<?php if ($order->get_payment_method_title()) : ?>
	    	<p class="woocommerce-order-overview__payment-method method">
			<?php esc_html_e('Payment method:', 'woocommerce'); ?>
			<?php echo wp_kses_post($order->get_payment_method_title()); ?>
	    	</p>
		<?php endif; ?>
		<p class="woocommerce-order-overview__payment-method method">
		    <?php esc_html_e('Billed from:', 'woocommerce'); ?>
		    <?php echo $order->get_billing_address_1(); ?>
		</p>
		<p>Billed to: Vitacodis AG, Seestrasse 91, Hergiswil 6052, Switzerland</p>
	    </div>

	<?php endif; ?>


    <?php else : ?>

        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped                                                                                 ?></p>

    <?php endif; ?>

</div>
