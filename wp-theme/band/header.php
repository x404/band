<?php //wp_deregister_script('jquery'); ?>
<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package band
 */ 
?>

<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<meta name="robots" content="noindex,nofollow" />

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
	$phone1 = get_option('site_telephone1');
	$phone1split = get_option('site_telephone1_split');
	$phone2 = get_option('site_telephone2');
	$phone2split = get_option('site_telephone2_split');
	$phone3 = get_option('site_telephone3');
	$phone3split = get_option('site_telephone3_split');

	$skype = get_option('site_skype');
	$email = get_option('site_email');
?>

<div class="main-grid">
	<!-- =top -->
	<div class="top d-flex justify-content-between">
		<div class="top__contacts top__contacts-left d-flex">
			<?php if (!empty($phone1)){ ?><a href="tel:<?php echo $phone1split ?>" class="tel" title=""><?php echo $phone1 ?></a><?php } ?>
			<?php if (!empty($phone2)){ ?><a href="tel:<?php echo $phone2split ?>" class="tel" title=""><?php echo $phone2 ?></a><?php } ?>
			<?php if (!empty($phone3)){ ?><a href="tel:<?php echo $phone3split ?>" class="tel" title=""><?php echo $phone3 ?></a><?php } ?>
		</div>
		<div class="d-flex top__contacts-right">
			<div class="top__contacts d-flex">
				<?php if (!empty($skype)){ ?><a href="skype:<?php echo $skype ?>" class="skype" title=""><?php echo $skype ?></a><?php } ?>
				<?php if (!empty($email)){ ?><a href="mailto:<?php echo $email ?>" class="email"><?php echo $email ?></a><?php } ?>
			</div>
			<div class="top__cart">
		 	<?php
		    	global $woocommerce; 
		    	$basket_count = $woocommerce->cart->cart_contents_count;
		    ?>
			<a href="<?php echo $woocommerce->cart->get_cart_url() ?>" class="basket-btn">
			    <span class="basket-btn__label">Корзина</span>
			    <span class="basket-btn__counter">(<?php echo sprintf($basket_count); ?>)</span>
			</a>

			</div>
		</div>
	</div>
	<!-- =/top -->
	
	<!-- =header -->
	<header class="header text-center">
		<div class="logo">
			<?php the_custom_logo() ?>
		</div>

		<!-- =nav -->
		<div class="navmenu">
			<div class="navmenu__inner">
				<nav id="navbar" class="mainnav">
					<div class="mainnav__list">
						<ul class="nav nav-tabs menu cl-effect-11">
							<?php 
								wp_nav_menu( array(
									'theme_location'  => 'top',
									'menu'            => '', 
									'container'       => '', 
									'container_class' => 'folder', 
									'container_id'    => '',
									'menu_class'      => 'menu', 
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '%3$s',
									'depth'           => 0,
									'walker'         => new Band_Sublevel_Walker
								) );

							?>
						</ul>
						<div class="show-sm">
							<?php if (!empty($phone1)){ ?>
								<a href="tel:<?php echo $phone1split ?>" class="tel" title=""><?php echo $phone1 ?></a>
							<?php } ?>
							<?php if (!empty($phone2)){ ?>
							<a href="tel:<?php echo $phone2split ?>" class="tel" title=""><?php echo $phone2 ?></a>
							<?php } ?>
							<?php if (!empty($phone3)){ ?>
							<a href="tel:<?php echo $phone3split ?>" class="tel" title=""><?php echo $phone3 ?></a>
							<?php } ?>
							<?php if (!empty($skype)){ ?>
								<a href="skype:<?php echo $skype ?>" class="skype" title=""><?php echo $skype ?></a>
							<?php } ?>
							<?php if (!empty($email)){ ?>
							<a href="mailto:<?php echo $email ?>" class="email"><?php echo $email ?></a>
							<?php } ?>
						</div>
					</div>
				</nav>
				
				<button type="button" class="close-menu"><img src="<?php echo get_bloginfo('template_url'); ?>/images/close.png" alt="Закрыть меню" /></button>
			</div>
		</div>
	
		<button type="button" class="navbar-toggle" aria-label="Показать/Скрыть меню">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<!-- =/nav -->
	</header>
	<!-- =/header -->