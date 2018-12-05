<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$price = '';
if( get_field('price_in_catalog') ){
 $price_html = get_field('price_in_catalog'). ' <span class="woocommerce-Price-currencySymbol">₴</span>';
} else {
	// $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
	// $price = wc_price( $prices[1] );
	$price_html = $product->get_price_html();

};



?>

<?php //if ( $price_html = $product->get_price_html() ) : ?>
	<p class="price"><?php echo $price_html; ?>  <?php ; ?> </p>
<?php //endif; ?>
