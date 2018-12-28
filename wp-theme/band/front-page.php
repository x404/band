<?php
/**
 * Template Name: Homepage
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package band
 * @since 1.0
 * @version 1.0
 */


get_header(); ?>

	<div class="main">
		<div class="homeslider">
			<?php echo do_shortcode('[shindiri-woo-slider id="112"]') ?>
		</div>
		<div class="container">
			<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>			


			<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<div class="filter">
					<div class="filter__body">
						<?php dynamic_sidebar( 'sidebar-3' ); ?>
					</div>					
				</div>
			<?php endif; ?>



			<?php while ( have_posts() ) : the_post();
				the_content();
			endwhile;
			?>

			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<!-- =seotext -->
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
				<!-- =/seotext -->
			<?php endif; ?>
		</div>
	</div>

<?php get_footer();
