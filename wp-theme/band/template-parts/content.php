<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package band
 */

?>

<?php if ( has_post_thumbnail() ) : ?>
	<article <?php post_class('new__item new__item-pic'); ?> id="post-<?php the_ID(); ?>">
		<a href="<?php the_permalink(); ?>" title="" class="new__link">
			<div class="new__top"> 
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="new__pic">
						<?php echo kama_thumb_img('w=260 &h=300 &crop=right'); ?>
					</div>
				<?php } ?>			
				<div class="new__title">
					<?php the_title( '<p>', '</p>' ); ?>
				</div>	
			</div>
			<div class="new__hover">
				<div class="new__title">
					<?php the_title( '<p>', '</p>' ); ?>
				</div>
			</div>
		</a>
	</article>
<?php 
else : ?>
	<article <?php post_class('new__item new__item-nopic'); ?> id="post-<?php the_ID(); ?>">
		<a href="<?php the_permalink(); ?>" title="" class="new__link">
			<div class="new__title">
				<?php the_title( '<p>', '</p>' ); ?>
			</div>
		</a>
	</article>
<?php endif; ?>
