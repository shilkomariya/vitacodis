<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.4
 */
defined('ABSPATH') || exit;

if (!wc_coupons_enabled()) { // @codingStandardsIgnoreLine.
    return;
}
?>
<div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="couponModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	<div class="modal-content">
	    <div class="modal-header">
		<h5 class="modal-title" id="couponModalLabel">Have a coupon?</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	    </div>
	    <div class="modal-body">
		<form class="checkout_coupon woocommerce-form-coupon d-block" method="post">
		    <p><?php esc_html_e('If you have a coupon code, please apply it below.', 'woocommerce'); ?></p>
		    <p class="form-row form-row-first">
			<input type="text" name="coupon_code" class="form-control" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" id="coupon_code" value="" />
		    </p>
		    <p class="form-row form-row-last">
			<button type="submit" class="btn btn-primary" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_html_e('Apply coupon', 'woocommerce'); ?></button>
		    </p>
		</form>
	    </div>
	</div>
    </div>
</div>
