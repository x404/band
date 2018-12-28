<?php
/**
 * Template Name: Collections Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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


			<section class="collections">
				<header>
					<?php the_title('<h1 class="title">', '</h1>'); ?>
				</header>
				<div class="row">
					<?php 
						$args = array(
							'sort_order'   => 'DESC',
							'sort_column'  => 'post_date',
							'hierarchical' => 1,
							'child_of'     => $post->ID,
							'post_type'    => 'page',
							'post_status'  => 'publish',
						); 
						$pages = get_pages( $args );
						foreach( $pages as $post ){
							// формат вывода
					?>
					<article class="collection__item col-md-6" id="post-<?php the_ID(); ?>">
						<a href="<?php echo get_page_link( $page->ID ); ?>" title="" class="collection__link">
							<?php echo kama_thumb_img('w=555 &h=285 &crop=right'); ?>
							<div class="collection__title">
								<h3><?php echo $post->post_title; ?></h3>
							</div>
							<p class="more">Посмотреть</p>
						</a>
					</article>

						<?php 
}  
wp_reset_postdata();

						 ?>
				</div>
			</section>

			<?php get_template_part( 'template-parts/general/bottom', 'none' ); ?>
		</div>
	</div>

<?php get_footer(); ?>
