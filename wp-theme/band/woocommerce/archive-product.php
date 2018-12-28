<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
$cate = get_queried_object();
$cateID = $cate->term_id;
$parentID = $cate->parent;
$cateTITLE = $cate->name;
$productCAT = $_GET['product_cat'];


// var_dump($cate);
// echo $parentID;

// echo $productCAT;
?>



<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>

<?php 
// id = 49 - is category "Collections"
if ($cateID == 49) { ?> 
	<section class="collections"> 
		<header>
			<h1 class="title">Коллекции</h1>
		</header>
<?php } else {  

	?>
	<?php

	// if (!is_front_page()) {
	if ($parentID == 49){ 
?>
		<h1 class="title"><?php echo $cateTITLE;?></h1>
 	<?php };


 	// выводим заголовок категории, если была фильтрация в коллекциях
 	if ($productCAT != ''){
		if( $term = get_term_by( 'slug', $productCAT, 'product_cat' ) ){?>
			<div class="breadcrumbs">
				<ul>
					<li><a href="<?php echo home_url('/'); ?>">Главная</a></li>
					<li><a href="<?php echo home_url('/'); ?>collections/">Коллекции</a></li>
					<li class="current"><?php echo $term->name ?></li>
				</ul>
			</div>

			<?php echo '<h1 class="title">'.$term->name.'</h1>';
		}
 	} 
} ?>


<!-- inner category -->
<?php if ($parentID == 49) { ?> 
		</div>
	</div>
	
	<div class="visual">
		<?php

		$queried_object = get_queried_object(); 
		$taxonomy = $queried_object->taxonomy;
		$term_id = $queried_object->term_id;  
		$foto = get_field( 'banner', $queried_object );
		$foto = get_field( 'banner', $taxonomy . '_' . $term_id );
		if( get_field('banner', $taxonomy . '_' . $term_id) ) {
			echo '<img src="' . $foto . '"/>';
		}
?>


	</div>
	<div class="main inner">
		<div class="container">		
<?php }?>



<?php get_template_part( 'template-parts/filter', 'none' );  ?>

<?php

if (!is_front_page()) {
?>
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	// do_action( 'woocommerce_archive_description' );
	?>
<?php
};


if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();


	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	// do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
};

if ($cateID == 49) { ?> 
		</section>


<?php } ?>
			<!-- =subcats -->
			<?php 
				wp_nav_menu( array(
					'theme_location'  => 'catmenu',
					'menu'            => '', 
					'container'       => 'div', 
					'container_class' => 'subcats', 
					'container_id'    => '',
					'menu_class'      => '', 
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul>%3$s</ul>',
					'depth'           => 0,
					'walker'         => ''
				) );
			?>
			<!-- =/subcats -->
			<section class="about">
				<?php echo category_description(); ?>
			</section>
		</div>
	</div>
<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
// do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
