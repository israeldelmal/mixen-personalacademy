$('.item-menu').on('click', function(event) {
	event.preventDefault();
	let Item = $(this).attr('href');

	if ($(window).width() > 1370) {
		$('body, html').stop(true, true).animate({
			scrollTop: $(Item).offset().top - 100
		}, 1000);
	} else {
		$('#nav > div > button').removeClass('active-btn');
		$('#nav > div > a').fadeIn(300);
		$('body > nav').removeClass('active-nav');

		$('body, html').stop(true, true).animate({
			scrollTop: $(Item).offset().top
		}, 1000);
	}
});

$('#FormContact').on('submit', function(event) {
	event.preventDefault();
});

$('#nav > div > button').on('click', function(event) {
	event.preventDefault();
	$(this).toggleClass('active-btn');
	$('body > nav').toggleClass('active-nav');

	if ($('#nav > div > a').is(':visible')) {
		$('#nav > div > a').fadeOut(300);
	} else {
		$('#nav > div > a').fadeIn(300);
	}
});