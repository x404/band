<?php
/**
 * Displays slider "Popular"
 *
 * @package WordPress
 * @subpackage band
 * @since 1.0
 * @version 1.0
 */

?>


<?php 
// https://wordpress.org/support/topic/how-to-sort-a-custom-query-by-views-all-time-monthly-weekly-or-daily/
?> 



<section class="newest products">
	<header>
		<h2 class="title">ПОПУЛЯРНЫЕ ТОВАРЫ</h2>
	</header>
	<?php 
		$loop = new WP_Query( array( 
			'post_type' => 'product', 
			'posts_per_page' => 4,

			// 'orderby' => 'views_total', 
			// 'order' => 'DESC',

			'meta_query' => array(
		        array(
		            'key' => 'total_sales',
		            'value' => 0,
		            'compare' => '>'
		        )
		    ),


	// 'meta_key' => 'views_total',
	// 'orderby' => 'meta_value_num',
	'order' => 'DESC',

		)); 
	?>
	<div id="newest-carousel">
		<?php while ( $loop->have_posts() ): $loop->the_post(); ?>
		<div>
			<div  class="product">
				<a href="<?php the_permalink(); ?>" title="" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
					<div class="box-default">
						<?php the_post_thumbnail("thumbnail-230x125"); ?>
					</div>
					<?php if (class_exists('MultiPostThumbnails')) : 
						$srcimage = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image');
						if (!empty($srcimage)){ ?>
							<div class="box-hover">
								<?php
									echo kama_thumb_img( array(
										'src' => $srcimage,
										'w' => 262,
										'h' => 337,
									) );
								 ?>
							</div>
						<?php }
					?>
					<?php endif; ?>
					<h3 class="woocommerce-loop-product__title"><?php the_title(); ?></h3>
				</a>
				<div class="product__bottom">
					<?php woocommerce_template_loop_price(); ?>
					<?php woocommerce_template_loop_add_to_cart(); ?>
				</div>
			</div>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>
