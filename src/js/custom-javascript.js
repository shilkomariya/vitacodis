+function ($) {
    $('body').append('<div id="toTop" class="btn">&nbsp</div>');
    $(window).scroll(function () {
	if ($(this).scrollTop() != 0) {
	    $('#toTop').fadeIn();
	} else {
	    $('#toTop').fadeOut();
	}
    });
    $('#toTop').click(function () {
	$("html, body").animate({scrollTop: 0}, 600);
	return false;
    });

    $(window).on("load resize", function () {
	$('.post .text').samesizr({
	    mobile: 768
	});
    });

    $('.blog-header').each(function (index, element) {
	var heading = $(element);
	var word_array, last_word, first_part;

	word_array = heading.html().split(/\s+/); // split on spaces
	last_word = word_array.pop();             // pop the last word
	first_part = word_array.join(' ');        // rejoin the first words together

	heading.html([first_part, ' <strong>', last_word, '</strong>'].join(''));
    });

}(jQuery);
