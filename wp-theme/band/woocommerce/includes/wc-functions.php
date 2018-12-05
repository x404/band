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

// Use WC 2.0 variable price format, now include sale price strikeout
// add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
// add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );

// function wc_wc20_variation_price_format( $price, $product ) {
// // Main Price
// $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
// $price = wc_price( $prices[1] );


// return $price;
// }
?>