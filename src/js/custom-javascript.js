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
    function showHomePopup() {
	if ($('.home-popup').length == 0)
	    return;
	$(".home-popup").delay(20000).fadeIn('slow');
    }
    $('.home-popup .btn-close').click(function () {
	$(".home-popup").fadeOut(0);
    });
    function showStripeBadge() {
	if ($('#youzer .woocommerce-MyAccount-content').length == 0)
	    return;

	$('#woocommerce_add_payment_method').parent().addClass('row btn-w-secure').wrapInner('<div class="col-auto">').append('<div class="col-auto"><img src="https://vitacodis.com/wp-content/themes/vitacodis/img/stripe-secure.png" alt="secure"></div>');
    }
    function wellbeingInterestsLinksRemove() {
	if ($('.yz-infos-content .field_wellbeing-interests').length == 0)
	    return;
	$('.field_wellbeing-interests .yz-info-data a').each(function (index, element) {
	    $(element).contents().unwrap().wrap('<span>');
	});

    }

    window.addEventListener('DOMContentLoaded', () => {
	if ($('#retreatTabContent').length == 0)
	    return;

	const observer = new IntersectionObserver(entries => {
	    entries.forEach(entry => {
		const id = entry.target.getAttribute('id');
		if (entry.intersectionRatio > 0) {
		    //document.querySelector('ul li a[href="#${id}"]').parentElement.classList.add('active');
		    $('#retreatTab a[href="#' + id + '"]').addClass('active');
		} else {
		    $('#retreatTab a[href="#' + id + '"]').removeClass('active');
		    //document.querySelector('ul li a[href="#${id}"]').parentElement.classList.remove('active');
		}
	    });
	});

	// Track all sections that have an `id` applied
	document.querySelectorAll('#retreatTabContent div[id]').forEach((section) => {
	    observer.observe(section);
	});

    });

    function cf7MessagesMove() {
	if ($('#cfBtnWrp').length == 0)
	    return;
	$(".wpcf7-response-output").addClass('col-md-auto').appendTo('#cfBtnWrp');
    }

    jQuery(document).ready(function ($) {
	collapsedContent();
	showHomePopup();
	showStripeBadge();
	wellbeingInterestsLinksRemove();
	cf7MessagesMove();
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
    var owlBig = $('.location-images-big');
    owlBig.owlCarousel({
	lazyLoad: true,
	margin: 0,
	nav: true,
	dots: false,
	loop: false,
	items: 1
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

    $('#swither-panel-darkmode-fullscreen .ld-settings-mode').click(function () {
	if ($.cookie("darkmode") && $.cookie("darkmode") == "Enabled") {
	    $.cookie("darkmode", "null", {expires: 1, path: '/', });
	    $('body').removeAttr('id');
	} else {
	    $.cookie("darkmode", "Enabled", {expires: 1, path: '/', });
	    $('body').attr('id', 'darkmode');
	}
    });

    function checkCookie() {
	if ($.cookie("darkmode"))
	{
	    if ($.cookie("darkmode") == "Enabled") {
		$('#checkbox').addClass("btnactive");
		$('#checkbox').prop('checked', true);
		$('#sw_darkmode').addClass("btnactive");
		$('#sw_darkmode').prop('checked', true);
	    } else {
		$('#checkbox').removeClass("btnactive");
		$('#checkbox').prop('checked', false);
		$('#sw_darkmode').removeClass("btnactive");
		$('#sw_darkmode').prop('checked', false);
	    }
	}
    }


    checkCookie();

    jQuery(document).ready(function ($) {
	let submit_button = $('#ff-submit-root');
	if (submit_button !== undefined) {
	    let post_id = $('input[name="post_id"]').val();
	    let course_id = $('input[name="course_id"]').val();
	    let next_url = $('input[name="next_url"]').val();
	    $(document).on('click', '#ff-submit-root', function () {
		$('#ff-compose').hide();
		$.ajax({
		    url: '/wp-admin/admin-ajax.php',
		    type: 'POST',
		    data: {
			"action": "course-feedback",
			"post-id": post_id,
			"course-id": course_id,
		    },
		    success: () => {

		    },
		    error: () => {

		    }
		});
		if (next_url !== '') {
		    window.location.href = next_url;
		}
	    });
	}
	if (window.innerWidth < 576) {
	    $('.ld-focus').removeClass('ld-focus-sidebar-collapsed');
	}
    });

    jQuery(document).ready(function ($) {

	// function to check if next is Course Discussion
	function isDiscussion() {
	    const checkNextLink = $('#take_next_module').attr('href');
	    if (checkNextLink.indexOf("/modules/course-discussion") === -1) {
		return false;
	    } else {
		return true;
	    }
	}

	var nextmodule = $('.ld-is-current-lesson').next().find('.ld-table-list-items');

	// if next lessons are present
	if (nextmodule.length) {
	    nextmodule = nextmodule.find('.ld-table-list-item:first-child').find('a').attr('href');
	} else {
	    // else no more lessons, lets navigate to Course Discussion
	    nextmodule = $('.ld-is-current-lesson').next().find('.ld-lesson-item-preview-heading').attr('href');
	}
	setTimeout(function () {
	    var checkText = $('.check-next').find('.ld-text').html();
	    $('.check-next a > .ld-text').html('Next');
	}, 500);
	//setTimeout(function(){
	$('.wpProQuiz_content h2').after('<h4 class="customquiztext h6">(each multiple choice question can have more than one correct answer)</h4>');
	//},2000);

	$('#nextModulePopupLink').on('click', function () {

	    var checkQuizLink = $('.ld-is-current-item').parent();
	    var checkText = $('.check-next').find('.ld-text').html();

	    // if next is quiz and next is not course discussion
	    if (checkQuizLink.next().hasClass('quiz_row')) {

		var QuizLink = checkQuizLink.next().find('a').attr('href');

		$('#take_the_quiz').attr('href', QuizLink);

		if (nextmodule.indexOf("/modules/course-discussion") !== -1) {
		    $('#nextModulePopup .paragraph-two').text('The quiz is not mandatory, you can skip it and proceed to Course Discussion');
		    $('#take_next_module').text('Discussion');
		}
		$('#take_next_module').attr('href', nextmodule);

		return false;

	    }

	});
	$('.wpProQuiz_QuestionButton').attr('value', 'Check Answers');
	$('.wpProQuiz_QuestionButton').css('float', 'left');
	$('.wpProQuiz_QuestionButton').on('click', function () {
	    setTimeout(function () {
		var embed = '<div class="ld-content-actions"><div class="answers-info ld-content-action"><span class="correct-answers">Correct Answer</span><span class="incorrect">Incorrect Answer</span></div><div class="ld-content-action"><a class="ld-button ld-button-transparent" href="' + window.location.href + '"><span class="ld-icon ld-icon-arrow-left"></span><span class="ld-text">Retake</span></a></div><div class="ld-content-action"><a class="ld-button ld-button-transparent" href="' + nextmodule + '"><span class="ld-text">Next</span><span class="ld-icon ld-icon-arrow-right"></span></a></div></div>';
		$('.wpProQuiz_listItem').find('.wpProQuiz_QuestionButton').hide();
		$('.wpProQuiz_quiz').find('.wpProQuiz_QuestionButton').hide();
		$('.wpProQuiz_quiz').append('' + embed);
		$('.wpProQuiz_quiz').show();
		$('.wpProQuiz_results').show();
	    }, 5000);
	});

	let searchParams = new URLSearchParams(window.location.search);
	if (searchParams.has('video')) {
	    const fancybox = new Fancybox([
		{
		    src: courseVideoUrl,
		    type: "video",
		},
	    ]);
	}
    });

    $('a.scrollTo').click(function ()
    {
	if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
		|| location.hostname == this.hostname)
	{

	    var target = $(this.hash),
		    headerHeight = $(".site-header").height() + $(".retreat-tabs").height() + 50; // Get fixed header height

	    target = target.length ? target : $('[id=' + this.hash.slice(1) + ']');

	    if (target.length)
	    {
		$('html,body').animate({
		    scrollTop: target.offset().top - headerHeight
		}, 500);
		return false;
	    }
	}
    });

    $(document).on('click', '#cookieIagree', function () {
	$.ajax({
	    url: '/wp-admin/admin-ajax.php',
	    type: 'POST',
	    data: {
		"action": "cookies_agree"
	    },
	    success: () => {
		$('.cookies').hide();
	    },
	    error: () => {

	    }
	});
    });

    document.addEventListener('wpcf7mailsent', function (event) {
	if ('7775' == event.detail.contactFormId) {
	    $('.contact-wrp').addClass('complite');
	}
    }, false);

}(jQuery);