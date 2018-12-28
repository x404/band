<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package band
 */

get_header();
?>

	<div class="main inner">adfad
		<div class="container">
			<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
			<section class="listnews" role="main">
				<header>
					<h1 class="title">
						<?php
							if ( is_category() ) :
								single_cat_title();
							endif;
						?>
					</h1>
				</header>
				<?php 
				if ( have_posts() ) : ?>
					<div class="d-flex flex-wrap justify-content-center">
						<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content', get_post_type() );
							endwhile;
						?>
					</div>
					<?php else :
						get_template_part( 'template-parts/content', 'none' ); 
					?>
				<?php 
				endif;
					the_posts_pagination();
				?>
			</section>
			<?php get_template_part( 'template-parts/sliders/slider', 'newest' );?>
			<?php get_template_part( 'template-parts/general/interest', 'none' ); ?>
		</div>
	</div>

<?php
get_footer();
?>
