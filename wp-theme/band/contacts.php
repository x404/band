<?php
/**
 * Template Name: Contacts Page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package band
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<?php 
	$phone1 = get_option('site_telephone1');
	$phone1split = get_option('site_telephone1_split');
	$phone2 = get_option('site_telephone2');
	$phone2split = get_option('site_telephone2_split');
	$phone3 = get_option('site_telephone3');
	$phone3split = get_option('site_telephone3_split');
	$viber = get_option('site_viber');
	$vibersplit = get_option('site_viber_split');
	$instagram = get_option('site_instagram');
	$telegram = get_option('site_telegram');

	$skype = get_option('site_skype');
	$email = get_option('site_email');
?>

	<div class="main inner">
		<div class="container">
			<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
			
			<main>
				<?php the_title('<h1 class="title">', '</h1>'); ?>

				<div class="contact-page">
					<div class="row">
						<div class="text text-contact col-lg-7 col-sm-12">
							<p><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/tel.png" alt=""/>
								<?php if (!empty($phone1)){ ?><a href="tel:<?php echo $phone1split ?>" title=""><?php echo $phone1 ?></a><?php } ?>&nbsp;&nbsp;&nbsp;<?php if (!empty($phone2)){ ?><a href="tel:<?php echo $phone2split ?>" title=""><?php echo $phone2 ?></a><?php } ?></p>
							
							<p><?php if (!empty($viber)){ ?><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/viber.png" alt=""/><a href="viber://chat?number=<?php echo $vibersplit ?>"><?php echo $viber ?></a><?php } ?></p>

							<p><?php if (!empty($instagram)){ ?><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/instagram.png" alt=""/><?php echo $instagram ?></p><?php } ?>

							<p><?php if (!empty($skype)){ ?><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/skype.png" alt=""/><a href="skype:<?php echo $skype ?>" class="skype" title=""><?php echo $skype ?></a><?php } ?></p>

							<p><?php if (!empty($telegram)){ ?><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/telegram.png" alt=""/><?php echo $telegram ?></p><?php } ?>

							<p><?php if (!empty($email)){ ?><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/mail.png" alt=""/><a href="mailto:<?php echo $email ?>" class="email"><?php echo $email ?></a><?php } ?></p>
						</div>
						<div class="feedback col-lg-5 col-sm-12">
							<p>Если у Вас возникли вопросы Вы можете написать нам, воспользовавшись формой ниже. Мы постараемся ответить Вам как можно быстрее.</p>
							<?php echo do_shortcode('[ninja_form id=2]');?>
						</div>
					</div>
				</div>
			</main>

			<?php get_template_part( 'template-parts/sliders/slider', 'popular' );?>
			<?php get_template_part( 'template-parts/general/bottom', 'none' ); ?>
		</div>
	</div>

<?php get_footer();
