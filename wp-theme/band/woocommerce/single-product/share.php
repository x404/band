<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div class="share">
	<div class="share-title">Поделиться:</div>

	<script type="text/javascript">(function() {
	  if (window.pluso)if (typeof window.pluso.start == "function") return;
	  if (window.ifpluso==undefined) { window.ifpluso = 1;
	    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
	    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
	    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
	    var h=d[g]('body')[0];
	    h.appendChild(s);
	  }})();</script>
	<div class="pluso" data-background="transparent" data-options="medium,square,line,horizontal,nocounter,theme=01" data-services="facebook,twitter,pinterest"></div>

</div>
<?php
do_action( 'woocommerce_share' ); // Sharing plugins can hook into here.

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
