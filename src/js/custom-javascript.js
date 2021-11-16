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
	$('.post .text .h5').samesizr({
	    mobile: 768
	});
	$('.post .excerpt').samesizr({
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


    var owl = $('.location-images');
    owl.owlCarousel({
	lazyLoad: true,
	margin: 15,
	nav: false,
	dots: false,
	loop: false,
	autoplay: true,
	smartSpeed: 2000,
	autoplayTimeout: 2000,
	slideTransition: 'linear',
	responsive: {
	    0: {
		items: 3
	    },
	    576: {
		items: 4
	    },
	    768: {
		items: 5
	    },
	    992: {
		items: 6
	    }
	}
    });

    $('#ShowSignUp').click(function () {
	$('.login-wrp').hide('slow');
	$('.register-wrp').show('slow');
    });

    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('.site-header').outerHeight();

    $(window).scroll(function (event) {
	didScroll = true;
    });

    setInterval(function () {
	if (didScroll) {
	    hasScrolled();
	    didScroll = false;
	}
    }, 250);

    function hasScrolled() {
	var st = $(this).scrollTop();

	if (!st) {
	    $('.site-header').addClass('nav-top');
	} else {
	    $('.site-header').removeClass('nav-top');
	}

	if (Math.abs(lastScrollTop - st) <= delta) {
	    return;
	}

	if (st > lastScrollTop && st > navbarHeight) {
	    $('.site-header').removeClass('nav-down').addClass('nav-up');
	} else {
	    if (st + $(window).height() < $(document).height()) {
		$('.site-header').removeClass('nav-up').addClass('nav-down');
	    }
	}

	lastScrollTop = st;
    }

}(jQuery);
