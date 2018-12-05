<?php
/**
 * Template Name: About Page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package band
 * @since 1.0
 * @version 1.0
 */


get_header(); ?>

	<div class="main inner">
		<div class="container">
			<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
			
			<main>
				<?php the_title('<h1 class="title">', '</h1>'); ?>
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<div class="post" id="post-<?php the_ID(); ?>">
						    <?php the_content(); ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</main>


			<!-- =timeline -->
			<?php
			 if( have_rows('history') ): ?>
				<section id="cd-timeline" class="timeline">
					<?php while( have_rows('history') ): the_row(); 
						$year = get_sub_field('year');
						$text = get_sub_field('text');
					?>

					<div class="cd-timeline-block">
						<div class="cd-timeline-img cd-picture">
							<img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/label-history.png" alt="" />
						</div>
						<div class="cd-timeline-content">
							<p><?php echo $text; ?></p>
							<span class="cd-date"><?php echo $year; ?></span>
						</div>
					</div>

					<?php endwhile; ?>
				</section>
			<?php endif; ?>
			<!-- =/timeline -->
			<?php get_template_part( 'template-parts/sliders/slider', 'newest' );?>
			<?php get_template_part( 'template-parts/general/bottom', 'none' ); ?>
		</div>
	</div>

<?php get_footer();
