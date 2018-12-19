$('body > aside > ul > li > a').on('click', function(event) {
	event.preventDefault();

	$('body > aside > ul > li > ul').slideUp(300);
	$('body > aside > ul > li > a').removeClass('active');

	if ($(this).siblings('ul').is(':visible')) {
		$(this).removeClass('active');
		$(this).siblings('ul').slideUp(300);
	} else {
		$(this).addClass('active');
		$(this).siblings('ul').slideDown(300);
	}
});