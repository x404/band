<?php
/**
 * Displays bottom block for rubric "Interesting"
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

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<!-- =seotext -->
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<!-- =/seotext -->
<?php endif; ?>


