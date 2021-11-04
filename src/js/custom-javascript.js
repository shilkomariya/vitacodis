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

    $('.page-header').each(function (index, element) {
	var heading = $(element);
	var word_array, last_word, first_part;

	word_array = heading.html().split(/\s+/); // split on spaces
	last_word = word_array.pop();             // pop the last word
	first_part = word_array.join(' ');        // rejoin the first words together

	heading.html([first_part, ' <strong>', last_word, '</strong>'].join(''));
    });

    function collapsedContent() {
	if ($('.read-more-content').length == 0)
	    return;

	$(".read-more-content").each(function (index) {
	    $(this).find('p:first-child').append(' <a class="collapse-link collapsed" data-bs-toggle="collapse" href="#collapse' + index + '" role="button" aria-expanded="false" aria-controls="collapse' + index + '">Read More</a>');
	    $(this).wrapInner('<div class="collapse" id="collapse' + index + '"></div>');
	    $(this).find('.collapse p:first-child').prependTo(this);
	});
    }

    jQuery(document).ready(function ($) {
	collapsedContent();
    });

}(jQuery);
