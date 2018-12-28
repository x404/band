<?php
/**
 * Displays seo, text, categories
 *
 * @package WordPress
 * @subpackage band
 * @since 1.0
 * @version 1.0
 */

?>


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


<?php
if(is_shop()){
    $page_id = woocommerce_get_page_id('shop');
  }else{
    $page_id = $post->ID;
  }

// id shop is 23
if ($page_id == 23){?>
	<section class="about">
		<?php echo get_field('seotext', 23); ?>
	</section>
<?php }


if( get_field('seotext') ): ?>
<?php ?>
	<!-- =seotext -->
	<section class="about">
		<?php echo get_field('seotext'); ?>
	</section>
	<!-- =/seotext -->
<?php endif; ?>
