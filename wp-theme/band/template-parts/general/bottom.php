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



<!-- [products limit="4" columns="4" orderby="popularity" class="quick-sale" on_sale="true" ] -->



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

<?php if( get_field('seotext') ): ?>
<?php ?>
	<!-- =seotext -->
	<section class="about">
		<?php the_field('seotext'); ?>
	</section>
	<!-- =/seotext -->
<?php endif; ?>
