jQuery(function ($) {
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
	$(window).on('resize orientationchange', function () {
	    setTimeout(function () {
		if (window.innerWidth < 481) {
		    $('.ld-focus').removeClass('ld-focus-sidebar-collapsed');
		}
	    }, 100);
	});

	setTimeout(function () {
	    $('.ff-button-bar .ff-powered-img').empty();
	    $('.ff-button-bar').append('<a class="ff-button-bar-email" href="mailto:service@vitacodis.com">service@vitacodis.com</a>');
	}, 500);
    });
});