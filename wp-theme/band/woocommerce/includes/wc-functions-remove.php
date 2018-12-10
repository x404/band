<?php


// отключаем стили woocommerce
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// woocommerce remove field
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_review_before', 'woocommerce_review_display_gravatar',10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close',5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);



// remove_action( 'woocommerce_after_single_product_summary' , '', 20 );
// remove_all_filters('woocommerce_after_single_product_summary');

function wp_enqueue_woocommerce_style(){
    wp_register_style( 'band-woocommerce', get_template_directory_uri() . '/css/cloudzoom.css' );
    if ( class_exists( 'woocommerce' ) ) {
        wp_enqueue_style( 'band-woocommerce' );
    }
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );


add_filter( 'woocommerce_product_tabs', 'band_remove_product_tabs', 98 );
 function band_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}





// delivery
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
// Все $fields в этой функции будут пропущены через фильтр
function custom_override_checkout_fields( $fields ) {

    $order = array(
        "billing_first_name", 
        "billing_last_name", 
        "billing_email", 
        "billing_country", 
        "billing_phone",
        "billing_nova_poshta_region",
        "billing_nova_poshta_city",
        "billing_nova_poshta_warehouse"
    );
    foreach($order as $field)
    {
        $ordered_fields[$field] = $fields["billing"][$field];
    }

    $fields["billing"] = $ordered_fields;



unset($fields['billing']['billing_company']);
// unset($fields['billing']['billing_country']);


$address_fields['address_1']['required'] = false;
$address_fields['postcode']['required'] = false;
$address_fields['state']['required'] = false;
$address_fields['country']['required'] = false;

	//unset($fields['billing']['billing_phone']); //Телефон
    $fields['billing']['billing_phone']['placeholder'] = '';
	$fields['billing']['billing_phone']['label'] = 'Телефон';  

	$fields['order']['order_comments']['placeholder'] = '';  
	$fields['order']['order_comments']['label'] = 'Комментарий';  
  // array_push($fields['billing']['billing_country']['class'], "vag-hide"); // Добавляем класс для скрытия поля.

	// unset($fields['billing']['billing_company']);
	// unset($fields['billing']['billing_address_2']);
	// unset($fields['billing']['billing_country']);
	// unset($fields['billing']['billing_state']);
	// unset($fields['billing']['billing_postcode']);
return $fields;
}

?>