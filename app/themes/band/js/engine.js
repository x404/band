[].forEach.call(document.querySelectorAll('.products .woocommerce-loop-product__link'), function (el, i) {
	let mc = new Hammer(el);
	// Subscribe to a desired event
	mc.on('swipe', function (e) {
		var direction = e.offsetDirection;
		if (direction === 4) {
			el.classList.add('hover');
		}
		if (direction === 2) {
			el.classList.remove('hover');
		}
	});
});


jQuery(document).ready(function($){
	// карусель
	$('#news-carousel').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		prevArrow: '',
		nextArrow: '',
		responsive: [
			{
				breakpoint: 1250,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true,
					centerPadding: '100px'
				}
			},
			{
				breakpoint: 500,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true,
					centerPadding: '70px'
				}
			},
			{
				breakpoint: 420,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true,
					centerPadding: '50px'
				}
			},
			{
				breakpoint: 380,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true,
					centerPadding: '22px'
				}
			}
		]
	});


	$('#newest-carousel').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		prevArrow: '',
		nextArrow: '',
		responsive: [
			{
				breakpoint: 1250,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true,
					centerPadding: '100px'
				}
			},
			{
				breakpoint: 500,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true,
					centerPadding: '70px'
				}
			},
			{
				breakpoint: 420,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true,
					centerPadding: '50px'
				}
			},
			{
				breakpoint: 380,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true,
					centerPadding: '22px'
				}
			}
		]
	});


	$('#gallery-thumbs').slick({
		vertical: true,
		verticalSwiping: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		prevArrow: '',
		nextArrow: '',
		asNavFor: '#gallery-main',
		infinite: false,
		focusOnSelect: true
	})

	$('#gallery-main').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		dots: true,
		prevArrow: '',
		nextArrow: '',
		asNavFor: '#gallery-thumbs',
		infinite: false
	})


	// validate
	var sending = '<div class="sending">Идет отправка ...</div>',
		thank = '<div class="thank text-center"><p>Ваше сообщение успешно отправлено</p><button type="button" class="close" aria-label="Закрыть" tabindex="5"></div>';

	var thank2 = '<div class="thank text-center"><p>Ваша заявка успешно отправлена</p><button type="button" class="close" aria-label="Закрыть" tabindex="5"></button></div>';
	var errorTxt = 'Возникла ошибка при отправке заявки!';

	$('#quickmsg-form').validate({
		submitHandler: function(form){
			var strSubmit=$(form).serialize();
			$('.quickmsg').addClass('process');
			$('.quickmsg__body').after(sending);
			$('.quickmsg__body').hide();
	

			$.ajax({
				type: "POST",
				url: $(form).attr('action'),
				data: strSubmit,
				success: function(){
					$('.quickmsg .sending').remove();
					$('.quickmsg__body').after(thank);
					// startClock('quickemail-form');
				},
				error: function(){
					alert(errorTxt);
					$('.quickmsg__body').show();
					$('.quickmsg').find('.sending, .thank').remove();
				}
			})
			.fail(function(error){
				alert(errorTxt);
			});
		}
	});

	$('#feedback-form').validate({
		submitHandler: function(form){
			var strSubmit=$(form).serialize();
			// переходим в режим отправки
			document.querySelector('.feedback').classList.add('process');

			// формируем сообщение 1
			let newEl = document.createElement('div');
			newEl.classList.add('sending');
			newEl.textContent = 'Идет отправка ...';
			document.querySelector('#feedback-form').append(newEl)


			$.ajax({
				type: "POST",
				url: $(form).attr('action'),
				data: strSubmit,
				success: function(){
					// формируем сообщение 2
					document.querySelector('.sending').innerHTML = thank;

					// регистрируем событие закрытия модального окна по крестику
					document.querySelector('#feedback-form .close').addEventListener('click', function(){
						sending_remove()
					}, false);

					// запускаем таймер
					startClock('feedback-form');
				},
				error: function(){
					alert(errorTxt);
					$('.quickmsg__body').show();
					$('.quickmsg').find('.sending, .thank').remove();
				}
			})
			.fail(function(error){
				alert(errorTxt);
			});
		}
	});



	// mobile-menu
	$('#navbar').each(function(){
		var $this = $(this),
			$link = $('.navbar-toggle'),
			$close = $('.close-menu'),

			init = function(){
				$link.on('click', openMenu);
				$close.on('click', closeMenu);
			},
			openMenu = function(e){
				e.preventDefault();
				$('body').addClass('o-menu');

			},
			closeMenu = function(e){
				e.preventDefault();
				$('body').removeClass('o-menu');
			};
		init();
	});	


	


	var $timeline_block = $('.cd-timeline-block');

	//hide timeline blocks which are outside the viewport
	$timeline_block.each(function(){
		if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
			$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		}
	});

	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){
		$timeline_block.each(function(){
			if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
				$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
			}
		});
	});


	// $('#billing_nova_poshta_region').selectize();
	// $('#billing_nova_poshta_city').selectize();
	
//	var destination = $('body.product-template-default .breadcrumbs').offset().top;
//	$('body.product-template-default,html').animate({scrollTop: destination }, 800);

});


// mobile menu
jQuery(document).on('click', '.quickmsg .close', function(e){
	e.preventDefault();
	//jQuery('.quickmsg').slideToggle();
	jQuery('.quickmsg').removeClass('open');
});

jQuery(document).on('click', '.nav .menu-item-has-children > a ', function(e){
	let $this = jQuery(this);
	if (jQuery(window).width() <= 767){
		e.preventDefault();
		$this.toggleClass('open');
		$this.next().slideToggle()
	}
});






// filter toggle
jQuery(document).on('click', '.show-filter', function(e){
	e.preventDefault();
	jQuery('.filter__body').show();
	jQuery(this).hide();
});

jQuery(document).on('click', '.widget-title', function(e){
	e.preventDefault();
	if (jQuery(window).width()<=550){
		jQuery(this).next().slideToggle()
	}
});
// #filter toggle


jQuery(document).on('click', '.footer .mess', function(){
	let $bottom = jQuery(document).height();
	if (window.innerWidth > 650){
		jQuery('body,html').animate({scrollTop: $bottom }, 800);		
	} else{
		// posmsg = document.querySelector('.quickmsg').offsetTop;
		// newtop = 2*window.scrollY - posmsg;
		// console.log(newtop);
		// jQuery('body,html').animate({scrollTop: newtop }, 800);
	}
	jQuery('.quickmsg').toggleClass('open');
});

// =/mobile menu


jQuery(document).on('click', '.showcomments', function(e){
	e.preventDefault();
	document.querySelector('.togglecomments').style.display='none';
	document.querySelector('.allcomments').style.display='block';
});


var timer;
var sec = 5;

function showTime(form){
	sec = sec-1;
	if (sec <= 0) {
		stopClock();
		if (form == 'quickemail-form'){ // форма быстрого сообщения
			$('.modal-email').fadeOut('normal', function(){
				document.querySelector('.modal-email .modal-dialog').classList.remove('send');
				document.querySelector('.thank').remove();
				jQuery('#' + form + ' .form-control').val('');
				jQuery('#quickemail').modal('hide');
				jQuery('#' + form + ' fieldset').show();
			})
		};

		if (form == 'feedback-form'){ // форма обратной связи
			jQuery('.feedback .sending').fadeOut('normal', function(){
				sending_remove();
			})
		};
	}
};

function sending_remove(){
	document.querySelector('.sending').remove();
	document.querySelector('.feedback').classList.remove('process');
	// опустошаем поля
	let formcontrol = document.querySelectorAll('#feedback-form .form-control');
	for (let i = 0; i < formcontrol.length; i++) {
		let self = formcontrol[i];
		self.value = '';
	};
}

function recovery(){
	jQuery('.thank').remove();
	jQuery('.modal-vacancy .form-control').val('');
};

function stopClock(){
	window.clearInterval(timer);
	timer = null;
	sec = 5;
}

function startClock(form){
	if (!timer)
	timer = window.setInterval("showTime('"+form+"')",1000);
}


(function(jQuery){
	jQuery('body').on( 'added_to_cart', function(){
		var div = '<div class="modal-added thank"><div class="text">Ваш товар успешно добавлен в корзину!</div><div class="buttons d-flex justify-content-between"><button type="button" class="btn-continue" aria-label="Закрыть">Продолжить покупки</button><a href="/cart/" title="" class="btn-default to-cart">Оформить заказ</a></div><button type="button" class="close" aria-label="Закрыть"></button></div>';
		jQuery('body').append(div)
	});
})(jQuery);


jQuery(document).on('click', '.modal-added .close, .modal-added .btn-continue', function(){
	jQuery('.modal-added').fadeOut('normal', function(){
		jQuery(this).remove();
	})
})