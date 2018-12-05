<?php
/**
 * Template Name: 404 Page
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
			
			<main class="error-text text-center">
				<h1 class="title">ОЧЕНЬ ЖАЛЬ, НО СТРАНИЦА НЕ НАЙДЕНА</h1>
				<p>Страница устарела, была удалена или не существовала вовсе</p>
				<a href="/" title="" class="back">Вернуться на главную</a>
			</main>	

			<?php get_template_part( 'template-parts/sliders/slider', 'popular' );?>
			<?php get_template_part( 'template-parts/general/bottom', 'none' ); ?>
		</div>
	</div>

<?php get_footer(); ?>
