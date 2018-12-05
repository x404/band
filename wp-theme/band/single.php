<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div class="main inner">
		<div class="container">
		<?php

		if (get_post_type() == 'product'){ 
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			?>
		} else { ?>
			<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
			<main>
				<?php // Start the loop.
				while ( have_posts() ) : the_post();
					the_title('<h1 class="title">', '</h1>');
					the_content();
				endwhile;
				?>
			</main>
			<?php 
				// Previous/next post navigation.
				//https://wp-kama.ru/function/the_post_navigation
				// get_the_post_thumbnail($next_post->ID,'thumbnail')
				$next_post = get_next_post();
				$previous_post = get_previous_post();
				
				if (empty($previous_post)){?><div class="empty-prev"><?php }; ?>

				<?php the_post_navigation( array(
					'next_text' => kama_thumb_img('w=86 &h=86 &crop=right &no_stub &post='.$next_post->ID) . 
						'<p>%title</p>' ,
					'prev_text' => kama_thumb_img('w=86 &h=86 &crop=right &no_stub &post='.$previous_post->ID) . 
						'<p>%title</p>' 
				) );

				if (empty($previous_post)){ ?></div> <?php }
		} ?>

			<?php get_template_part( 'template-parts/general/bottom', 'none' ); ?>
		</div>
	</div>

<?php get_footer(); ?>
