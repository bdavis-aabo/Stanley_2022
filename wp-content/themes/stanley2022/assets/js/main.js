$(document).ready(function(){
	// nav button functions
	$('.nav-btn').click(function(){
		$(this).toggleClass('open');
		$('.navigation-container').toggleClass('open');
	});

	// homepage slick hero
	$('#homepageHeroSlider').slick({
		'arrows': false,
		'autoplay': true,
		'autoplaySpee': 2500,
		'cssEase': 'ease',
		'draggable': true,
		'infinite': true,
		'mobileFirst': true,
		'slidesToShow': 1,
		'speed': 500,
		'vertical': true,

	});
});

AOS.init();
