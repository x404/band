<?php
/**
 * Template Name: Collection
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
			<?php the_title('<h1 class="title">', '</h1>'); ?>
		</div>
	</div>

	<div class="visual">
		<?php echo get_the_post_thumbnail($page->ID, 'large'); ?>
	</div>

	<div class="main inner">
		<div class="container">



		<?php 

		$cattile = get_the_title();
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array( 
			'post_type' => 'product', 
			'posts_per_page' => 10,
			'paged'         => $paged,
			'orderby' => 'id', 
			'order' => 'DESC',
			'nopaging' => false,
			'meta_query'	=> array(
					'relation'		=> 'OR',
					array(
						'key'		=> 'collections',
						'value'		=> $cattile,
						'compare'	=> 'LIKE'
					)
				)
			);


			$wp_query  = new WP_Query( $args); 
		?>
		<ul class="products">
			<?php while ( have_posts() ) {
				the_post(); ?>
					<li class="product">
						<a href="<?php the_permalink(); ?>" title="" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
							<div class="box-default">
								<?php the_post_thumbnail("thumbnail-280x180"); ?>
							</div>
							<?php if (class_exists('MultiPostThumbnails')) : 
								$srcimage = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image');
							endif; ?>
							<h2 class="woocommerce-loop-product__title"><?php the_title(); ?></h2>
							<?php if (!empty($srcimage)){ ?>
									<div class="box-overlay">
										<?php
											echo kama_thumb_img( array(
												'src' => $srcimage,
												'w' => 263,
												'h' => 263,
											) );
										 ?>
									</div>
							<?php }
							?>
						</a>
					</li>
			<?php };
			?>
		</ul>

		<?php 
			the_posts_pagination();
			wp_reset_query();
		?>

			<?php get_template_part( 'template-parts/general/bottom', 'none' ); ?>
		</div>
	</div>

<?php get_footer(); ?>
