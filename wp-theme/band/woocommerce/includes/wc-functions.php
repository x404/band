<?php 


// CARD PAGE
// card breadcrumbs
add_filter( 'woocommerce_breadcrumb_defaults', 'custom_woocommerce_breadcrumbs' );
function custom_woocommerce_breadcrumbs() {
  return array(
    'delimiter'   => '',
    'wrap_before' => '<div class="breadcrumbs"><ul>',
    'wrap_after'  => '</ul></div>',
    'before'      => '',
    'after'       => '',
    'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
    'crumb[0]' => 'asdf'
  );
}



remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'band_wrapper_start', 10);
add_action('woocommerce_after_main_content',  'band_wrapper_end', 10);

function band_wrapper_start() {
   ?><div class="main inner">
		<div class="container">
<?php
}

function band_wrapper_end() {
   	?>   	
<?php get_template_part( 'template-parts/general/bottom', 'none' ); ?>
	   	</div> <!-- #container -->
	</div> <!-- #main.inner -->
<?php
}


// categories
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10);
add_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10);

function woocommerce_subcategory_thumbnail( $category ) {
	$thumbnail_id         = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );

	if ( $thumbnail_id ) {
		$image        = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size );
		$image        = $image[0];
	} else {
		$image        = wc_placeholder_img_src();
	}

	if ( $image ) {
		// Prevent esc_url from breaking spaces in urls for image embeds.
		// Ref: https://core.trac.wordpress.org/ticket/23605.
		$image = str_replace( ' ', '%20', $image );

		// Add responsive image markup if available.

		echo kama_thumb_img('w=570 &h=290 &crop=right', esc_url( $image ));
	}
}

add_action('woocommerce_before_single_product', 'band_wrapper_product_start', 5);
function band_wrapper_product_start(){
  ?>
  <main class="card-page">
  <?php
}


add_action('woocommerce_after_single_product', 'band_wrapper_product_mainfinish', 5);
function band_wrapper_product_mainfinish(){
  ?>
	</main>
  <?php
}



add_action('woocommerce_after_single_product_summary', 'band_wrapper_product_finish', 13);
function band_wrapper_product_finish(){
  ?>
  </div><!-- #row2 -->
  <?php
}




// =GALLERY
add_action('woocommerce_before_single_product_summary', 'band_wrapper_image_start', 5);
function band_wrapper_image_start(){
  ?>
  <div class="row row-start">
	  <div class="col-lg-8 col-12 card__media">
	  	<div class="gallery">
	  		<div class="d-flex">
  <?php
}
add_action('woocommerce_before_single_product_summary', 'band_wrapper_image_finish', 25);
function band_wrapper_image_finish(){
 	?>
	  		</div>
		</div><!-- #gallery -->
	  </div><!-- #card__media -->
  <?php
}
// =#GALLERY


// CARD RIGHT
add_action('woocommerce_before_single_product_summary', 'band_wrapper_desc_start', 30);
function band_wrapper_desc_start(){
  ?>
	<div class="col-lg-4 col-12 card_right">
		<div class="description">
  <?php
}
remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_meta', 40 );
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 6);

remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 29);

add_action('woocommerce_after_single_product_summary', 'band_wrapper_desc_finish', 1);
function band_wrapper_desc_finish(){
  ?>
		</div> <!-- #description-->
	</div> <!-- =#card_right -->
</div> <!-- #row row-start -->
<div class="row row2">
  <?php
}

/**
* Hook: woocommerce_after_single_product_summary.
*
* @hooked woocommerce_output_product_data_tabs - 10
* @hooked woocommerce_upsell_display - 15
* @hooked woocommerce_output_related_products - 20
*/


//add_filter( 'woocommerce_short_description', 'estore_short_description', 10 );
function estore_short_description($content){
	?>
	<div class="description">
		<?php echo $content;?>
	</div>
	<?php
}



// add_filter( 'woocommerce_product_tabs', 'estore_product_tabs_filter', 100 );
function estore_product_tabs_filter( $tabs ) {
	if ( ! empty( $tabs ) ) : ?>
		
		<div class="woocommerce-tabs wc-tabs-wrapper additional_info">
			<div class="container">
				<div class="sap_tabs">
					<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
						<ul class="tabs wc-tabs" role="tablist">
							<?php foreach ( $tabs as $key => $tab ) : ?>
								<li class="<?php echo esc_attr( $key ); ?>_tab resp-tab-item"
									id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab"
								>
									<span><?php echo apply_filters( 'woocommerce_product_' . $key .
									                                '_tab_title', esc_html( $tab['title'] ), $key ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php foreach ( $tabs as $key => $tab ) : ?>
							<div class=" resp-tab-content resp-tab-content-active additional_info_grid"
								id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel"
							>
								<?php if ( isset( $tab['callback'] ) ) {
									call_user_func( $tab['callback'], $key, $tab );
								} ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<script type="text/javascript">
                jQuery(document).ready(function () {
                    jQuery('#horizontalTab1').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
                });
			</script>
		</div>
	
	<?php endif;
}


// function wpse_get_modified_rating_html(){
//     /** @var float Rating being shown */
//     $rating = 5;
//     /** @var int Total number of ratings */
//     $count = 1;

//     $html  = '<div class="star-rating">';
//     $html .= wc_get_star_rating_html( $rating, $count );
//     $html .= '</div>';

//     return $html;
// }
// add_filter( 'woocommerce_product_get_rating_html', 'wc_get_rating_html' );


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_after_single_product_summary', 'related_upsell_products', 15 );

function related_upsell_products() {
	?>
	<?php
	global $product;

	if ( isset( $product ) && is_product() ) {
		$upsells = $product->get_upsells();

		if ( sizeof( $upsells ) > 0 ) {
			woocommerce_upsell_display();	
		} else {
			// woocommerce_upsell_display();
			// woocommerce_output_related_products();
		}
	}
}


add_image_size( 'my_cart_image_size', 100, 80, true );
add_filter( 'woocommerce_cart_item_thumbnail', function( $image, $cart_item, $cart_item_key ){
    $product = $cart_item['data'];
    return $product->get_image( 'my_cart_image_size' );
}, 3, 100 );



// change currency symbols
add_filter( 'woocommerce_currency_symbol', 'change_currency_symbol', 10, 2 );
function change_currency_symbol( $symbols, $currency ) {
	return 'грн';
}


add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
add_filter( 'woocommerce_is_attribute_in_product_name', '__return_false' );

//remove_action('woocommerce_cart_collaterals', 'woocommerce_cart_totals',10)


function wc_cart_totals_shipping_method_label_dub( $method ) {
	$label = $method->get_label();

	if ( $method->cost >= 0 && $method->get_method_id() !== 'free_shipping' ) {
		if ( WC()->cart->display_prices_including_tax() ) {
			$label .=  wc_price( $method->cost + $method->get_shipping_tax() );
			if ( $method->get_shipping_tax() > 0 && ! wc_prices_include_tax() ) {
				$label .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
			}
		} else {
			$label .= wc_price( $method->cost );
			if ( $method->get_shipping_tax() > 0 && wc_prices_include_tax() ) {
				$label .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
			}
		}
	}

	return apply_filters( 'woocommerce_cart_shipping_method_full_label', $label, $method );
}


?>