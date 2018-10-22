$(document).ready(function(){

	// карусель
	$('#news-carousel').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		prevArrow: '',
		nextArrow: '',
		responsive: [
			{
				breakpoint: 1399,
				settings: {
					slidesToShow: 14,
					slidesToScroll: 3
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 11,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 9,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 650,
				settings: {
					slidesToShow: 5,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 450,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 2
				}
			}
		]
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
document.querySelector('.quickmsg .close').addEventListener("click", function(){
	$('.quickmsg').slideToggle();
}, false);


document.querySelector('.footer .mess').addEventListener("click", function(){
	$('.quickmsg').slideToggle();
}, false);

// =/mobile menu