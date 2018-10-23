$(document).ready(function(){

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
				h = $(document).height();
				$('body').addClass('o-menu');
				$('#navbar').height(h);

			},
			closeMenu = function(e){
				e.preventDefault();
				$('body').removeClass('o-menu');
				$('#navbar').height('auto');
			};
		init();
	});	
});


// mobile menu
$(document).on('click', '.quickmsg .close', function(e){
	e.preventDefault();
	$('.quickmsg').slideToggle();
});


document.querySelector('.footer .mess').addEventListener('click', function(){
	$('.quickmsg').slideToggle();
	let $bottom = $(document).height();
	$('body,html').animate({scrollTop: $bottom }, 800);

}, false);

// =/mobile menu



var timer;
var sec = 5;

function showTime(form){
	sec = sec-1;
	if (sec <=0) {
		stopClock();
		if (form == 'quickemail-form'){ // форма быстрого сообщения
			$('.modal-email').fadeOut('normal', function(){
				document.querySelector('.modal-email .modal-dialog').classList.remove('send');
				document.querySelector('.thank').remove();
				$('#' + form + ' .form-control').val('');
				$('#quickemail').modal('hide');
				$('#' + form + ' fieldset').show();
			})
		};


		// if (form == 'callback-form'){ // форма быстрого сообщения
		// 	$('.modal-callback').fadeOut('normal', function(){
		// 		document.querySelector('.modal-callback .modal-dialog').classList.remove('send');
		// 		document.querySelector('.thank').remove();
		// 		$('#' + form + ' .form-control').val('');
		// 		$('#callback').modal('hide');
		// 		$('#' + form + ' fieldset').show();
		// 	})
		// };
		// if (form == 'faq-form'){ // форма быстрого сообщения
		// 	$('.modal-callback').fadeOut('normal', function(){
		// 		document.querySelector('.thank').remove();
		// 		$('#' + form + ' .form-control').val('');
		// 		$('#callback').modal('hide');
		// 		$('#' + form + ' fieldset').show();
		// 	})
		// };


		// if (form == 'ordervacancy-form'){// форма подачи заявки на работу онлайн
		// 	$('.modal-vacancy').fadeOut('normal', function(){
		// 		$('#ordervacancy').modal('hide');
		// 		setTimeout( function(){
		// 			document.querySelector('#ordervacancy .modal-dialog').classList.remove('send');
		// 		}, 2000);
		// 		recovery();
		// 	})
		// };


		// if (form == 'sendfriend-form'){ // заявка другу
		// 	$('.modal-vacancy').fadeOut('normal', function(){
		// 		$('#sendfriend').modal('hide');
		// 		setTimeout( function(){
		// 			document.querySelector('#sendfriend .modal-dialog').classList.remove('send');
		// 		}, 2000);
		// 		recovery();
		// 	})
		// };	
	}
};

function recovery(){
	$('.thank').remove();
	$('.modal-vacancy .form-control').val('');
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
