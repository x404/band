<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package band
 */

?>

	<div class="filter-box">
		<div class="filter__body">
			<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<div class="d-flex justify-content-center">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			<?php endif; ?>
		</div>					
	</div>