<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package band
 */
?> 
	
	<?php 
		if( !is_category(1) ){
			get_template_part( 'template-parts/general/lastnews', 'none' ); 
		}
	?>

	<!-- =footer -->
	<footer class="footer">
		<div class="quickmsg">
			<div class="container">
				<div class="quickmsg__body">
					<div class="title">ОТПРАВИТЬ БЫСТРОЕ СООБЩЕНИЕ:</div>
					<form action="<?php echo get_bloginfo('template_url'); ?>/quickmsg.ajax.php" id="quickmsg-form" method="post">
						<fieldset>
							<label for="name" class="visually-hidden">Ваше имя</label>
							<input type="text" id="name" name="name" class="form-control required" value="" placeholder="Ваше имя" required aria-required="true" tabindex="1" />
					
							<label for="email" class="visually-hidden">Email</label>
							<input type="email" id="email" name="email" class="form-control tel required" value="" placeholder="Email" required aria-required="true" tabindex="2" />
					
							<label for="msg" class="visually-hidden">Комментарий</label>
							<textarea name="msg" id="msg" cols="30" class="form-control required" rows="10" placeholder="Комментарий" required aria-required="true" tabindex="3"></textarea>
							<button type="submit" class="submit center-block" tabindex="4">ОТПРАВИТЬ</button>
						</fieldset>
					</form>
					<button type="button" class="close" aria-label="Закрыть" tabindex="4"></button>
				</div>
			</div>
		</div>
		<div class="footer__body container">
			<div class="row">
				<div class="copyright col-lg-3 col-sm-12">
					<div class="d-flex">
						<a href="/" title><img src="<?php echo get_bloginfo('template_url'); ?>/images/logo-small.svg" alt="<?php echo get_bloginfo() ?>"></a>
						<p>
							© 2013 - <?php echo date('Y');?> «<?php echo get_bloginfo(); ?>»<br>
							Все права защищены
						</p>
					</div>
				</div>
				<div class="col-lg-6 col-sm-12 social d-flex">
					<?php
						$pinterest =  get_option('pinterest');
						$facebook =  get_option('facebook');
						$twitter =  get_option('twitter');
						$instagram =  get_option('instagram');
					?>
					<a href="<?php echo $pinterest ?>" title="pinterest" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/icon_pinterest.png" alt="" /></a>
					<a href="<?php echo $facebook ?>" title="facebook" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/icon_facebook.png" alt="" /></a>
					<button type="button" class="mess"><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/icon_mess.png" alt="" /></button>
					<a href="<?php echo $twitter ?>" title="twitter" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/icon_twitter.png" alt="" /></a>
					<a href="<?php echo $instagram ?>" title="instagram" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/icon_inst.png" alt="" /></a>
				</div>
				<div class="col-lg-3 col-sm-12 creators">
					<p>Дизайн сайта - <a href="https://kuzma.in.ua" title="Дизайн сайтов" target="_blank">Kuzma</a></p>
					<p>Программирование - <a href="https://proverstka.com.ua" title="Создание сайтов Proverstka" target="_blank">Proverstka</a></p>
				</div>
			</div>
		</div>
	</footer>
	<!-- =/footer -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div id="outdated"></div>
<?php wp_footer(); ?>
</body>
</html>