jQuery(document).ready(function(){

	// карусель
	jQuery('#news-carousel').slick({
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


	jQuery('#newest-carousel').slick({
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


	jQuery('#gallery-thumbs').slick({
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

	jQuery('#gallery-main').slick({
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

	jQuery('#quickmsg-form').validate({
		submitHandler: function(form){
			var strSubmit=jQuery(form).serialize();
			jQuery('.quickmsg').addClass('process');
			jQuery('.quickmsg__body').after(sending);
			jQuery('.quickmsg__body').hide();
	

			$.ajax({
				type: "POST",
				url: jQuery(form).attr('action'),
				data: strSubmit,
				success: function(){
					jQuery('.quickmsg .sending').remove();
					jQuery('.quickmsg__body').after(thank);
					// startClock('quickemail-form');
				},
				error: function(){
					alert(errorTxt);
					jQuery('.quickmsg__body').show();
					jQuery('.quickmsg').find('.sending, .thank').remove();
				}
			})
			.fail(function(error){
				alert(errorTxt);
			});
		}
	});

	jQuery('#feedback-form').validate({
		submitHandler: function(form){
			var strSubmit=jQuery(form).serialize();
			// переходим в режим отправки
			document.querySelector('.feedback').classList.add('process');

			// формируем сообщение 1
			let newEl = document.createElement('div');
			newEl.classList.add('sending');
			newEl.textContent = 'Идет отправка ...';
			document.querySelector('#feedback-form').append(newEl)


			$.ajax({
				type: "POST",
				url: jQuery(form).attr('action'),
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
					jQuery('.quickmsg__body').show();
					jQuery('.quickmsg').find('.sending, .thank').remove();
				}
			})
			.fail(function(error){
				alert(errorTxt);
			});
		}
	});



	// mobile-menu
	jQuery('#navbar').each(function(){
		var $this = jQuery(this),
			$link = jQuery('.navbar-toggle'),
			$close = jQuery('.close-menu'),

			init = function(){
				$link.on('click', openMenu);
				$close.on('click', closeMenu);
			},
			openMenu = function(e){
				e.preventDefault();
				jQuery('body').addClass('o-menu');

			},
			closeMenu = function(e){
				e.preventDefault();
				jQuery('body').removeClass('o-menu');
			};
		init();
	});	


	


	var $timeline_block = jQuery('.cd-timeline-block');

	//hide timeline blocks which are outside the viewport
	$timeline_block.each(function(){
		if(jQuery(this).offset().top > jQuery(window).scrollTop()+jQuery(window).height()*0.75) {
			jQuery(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		}
	});

	//on scolling, show/animate timeline blocks when enter the viewport
	jQuery(window).on('scroll', function(){
		$timeline_block.each(function(){
			if( jQuery(this).offset().top <= jQuery(window).scrollTop()+jQuery(window).height()*0.75 && jQuery(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
				jQuery(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
			}
		});
	});

});


// mobile menu
jQuery(document).on('click', '.quickmsg .close', function(e){
	e.preventDefault();
	jQuery('.quickmsg').slideToggle();
});

jQuery(document).on('click', '.nav .folder > a ', function(e){
	e.preventDefault();
	let $this = jQuery(this);
	$this.toggleClass('open');
	$this.next().slideToggle()
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


document.querySelector('.footer .mess').addEventListener('click', function(){
	jQuery('.quickmsg').slideToggle();
	let $bottom = jQuery(document).height();
	jQuery('body,html').animate({scrollTop: $bottom }, 800);

}, false);

// =/mobile menu

document.querySelector('.showcomments').addEventListener('click', function(){
	document.querySelector('.togglecomments').style.display='none';
	document.querySelector('.allcomments').style.display='block';
}, false);


var timer;
var sec = 5;

function showTime(form){
	sec = sec-1;
	if (sec <= 0) {
		stopClock();
		if (form == 'quickemail-form'){ // форма быстрого сообщения
			jQuery('.modal-email').fadeOut('normal', function(){
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

