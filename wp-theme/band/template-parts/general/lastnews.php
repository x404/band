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


<?php
	// параметры по умолчанию
	$posts = get_posts( array(
		'numberposts' => 4,
		'category'    => 1,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'include'     => array(),
		'exclude'     => array(),
		'meta_key'    => '',
		'meta_value'  =>'',
		'post_type'   => 'post',
		'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	) );
?>

	<section class="lastnews">
		<header class="text-center">
			<h1 class="title">ИНТЕРЕСНО</h1>
		</header>
		<div class="lastnews__wrapper">
			<div class="container">
				<div id="news-carousel">
<?php

	foreach( $posts as $post ){
		setup_postdata($post);	    
	    $title = get_the_title();
	    $link =  get_the_permalink();
	    $img = kama_thumb_img('w=260 &h=300 &crop=right');
?>

	<div>
		<?php if ( has_post_thumbnail() ) : ?>
			<article class="new__item new__item-pic">
				<a href="<?php echo $link; ?>" title="" class="new__link">
					<div class="new__top"> 
						<div class="new__pic">
							<?php echo $img; ?>
						</div>
						<div class="new__title">
							<p><?php echo $title; ?></p>
						</div>	
					</div>
					<div class="new__hover">
						<div class="new__title">
							<p><?php echo $title; ?></p>
						</div>
					</div>
				</a>
			</article>
		<?php 
		else : ?>
			<article class="new__item new__item-nopic" id="post-<?php the_ID(); ?>">
				<a href="<?php the_permalink(); ?>" title="" class="new__link">
					<div class="new__title">
						<?php echo $title; ?>
					</div>
				</a>
			</article>
		<?php endif; ?>
	</div>

<?php
	}
?>
				</div>
			</div>
		</div>
	</section>

<?php
	wp_reset_postdata(); // сброс
?>


