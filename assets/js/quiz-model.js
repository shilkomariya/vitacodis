(function ($) {

    $(window).on('load', function () {

	setTimeout(function () {
	    $('.ff-powered').remove();
	    if ($(window).width() < 481) {
		$('.ld-focus').removeClass('ld-focus-sidebar-collapsed');

//       Read More Button
		var maxLength = 120;
		$(".show-read-more").each(function () {
		    var myStr = $(this).text();
		    if ($.trim(myStr).length > maxLength) {
			var newStr = myStr.substring(0, maxLength);
			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
			$(this).empty().html(newStr);
			$(this).append(' <a href="javascript:void(0);" class="read-more">... <span class="read-color">Read more</span></a>');
			$(this).append('<span class="more-text">' + removedStr + '</span>');
		    }
		});
		$(".read-more").click(function () {
		    $(this).siblings(".more-text").contents().unwrap();
		    $(this).remove();
		});
		console.log("width<480");
	    }

	}, 1000);

	//End Time out function


	// Show or hide the switch panel
	//Start Switch  Panel
	$('#swither-panel-darkmode-fullscreen').on('click', function () {

	    $('#wrap-darkmode-fullscreen').toggleClass('actived');
	    if ($('#wrap-darkmode-fullscreen').hasClass('actived')) {
		$('#wrap-darkmode-fullscreen').show();
	    } else {
		$('#wrap-darkmode-fullscreen').hide();
	    }
	});

	$(document).click(function (e) {
	    var container = $("#swither-panel-darkmode-fullscreen");
	    if (container.has(e.target).length === 0) {
		$('#wrap-darkmode-fullscreen').hide();
		$('#wrap-darkmode-fullscreen').removeClass('actived');
	    }
	});

	function closest(el, selector) {
	    if (Element.prototype.closest) {
		return el.closest(selector);
	    }
	    let parent = el;
	    while (parent) {
		if (parent.matches(selector)) {
		    return parent;
		}

		parent = parent.parentElement;
	    }
	    return null;
	}


//  Dark  Mode Js

	$(".ld-comment-body p").addClass("show-read-more");
	$(".ld-table-list-item-preview.ld-is-current-item").css("color", "#0d9fec");
	/*
	 $('#sw_darkmode').click(function () {
	 // switcherMode(this)
	 if ($("#sw_darkmode").prop("checked")) {
	 $.cookie("darkmode", "Enabled", {expires: 1, path: '/', });
	 $('body').attr('id', 'darkmode');
	 $('#checkbox').addClass("btnactive");
	 $('#checkbox').prop('checked', true);
	 } else {
	 $.cookie("darkmode", "null", {expires: 1, path: '/', });
	 $('body').removeAttr('id');
	 $('#checkbox').removeClass("btnactive");
	 $('#checkbox').prop('checked', false);
	 }
	 });

	 $('#checkbox').click(function () {
	 // switcherMode(this)
	 if ($("#checkbox").prop("checked")) {
	 $.cookie("darkmode", "Enabled", {expires: 1, path: '/', });
	 $('body').attr('id', 'darkmode');
	 $('#sw_darkmode').addClass("btnactive");
	 $('#sw_darkmode').prop('checked', true);
	 } else {
	 $.cookie("darkmode", "null", {expires: 1, path: '/', });
	 $('body').removeAttr('id');
	 $('#sw_darkmode').removeClass("btnactive");
	 $('#sw_darkmode').prop('checked', false);
	 }
	 });
	 */

	$('span.ld-settings-mode').click(function () {
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


//  Full Screen Toggle
	/*
	 $('#sw_full_screen').click(function () {
	 $("body").addClass("actived");
	 $("#sw_full_screen").toggleClass("btnactive");

	 if ($(this).hasClass("btnactive")) {
	 $.cookie("fullscreen", "Enabled", {expires: 1, path: '/', });
	 // console.log("fullscreen");
	 } else {
	 $.cookie("fullscreen", "null", {expires: 1, path: '/'});
	 // console.log("full sccreen disbale");
	 }
	 });

	 $('#full-screen').click(function () {
	 $("body").addClass("actived");
	 $("#full-screen").toggleClass("btnactive");

	 if ($(this).hasClass("btnactive")) {
	 $.cookie("fullscreen", "Enabled", {expires: 1, path: '/', });
	 // console.log("fullscreen");
	 } else {
	 $.cookie("fullscreen", "null", {expires: 1, path: '/'});
	 // console.log("full sccreen disbale");
	 }
	 });
	 */
    });

})(jQuery);


jQuery(document).ready(function ($) {


//   setTimeout(function(){
//   if ($(window).width() > 760) {
//       $('.ld-focus').addClass('ld-focus-sidebar-collapsed');
//     console.log("sucess 768 add")
//     }

//   }, 1000);

    if (/Android|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
	window.addEventListener("orientationchange", function () {

	    if (window.orientation == 90) {
		$('.ld-focus-header, .ld-focus-sidebar, .elementor-heading-title.elementor-size-default').addClass('hidden-item');
		$('.ld-focus-main').addClass('ml');
		$('.ld-focus-main .ld-focus-content').addClass('lanscape-padding');

		console.log("90 desgree work");
	    } else {
		$('.ld-focus-header, .ld-focus-sidebar, .elementor-heading-title.elementor-size-default').removeClass('hidden-item');
		$('.ld-focus-main').removeClass('ml');
		$('.ld-focus-main .ld-focus-content').removeClass('lanscape-padding');
		console.log("Not 90 desgree work");

	    }
	});


    }
//   if(window.orientation == 0){
//       setTimeout(function(){
//     $('.ld-focus').removeClass('ld-focus-sidebar-collapsed');
//       }, 1000);
//     }


//    console.log(window.orientation);

//   $(window).resize(function() {
//   if ($(window).width() < 480) {
//     setTimeout(function(){
//     $('.ld-focus').removeClass('ld-focus-sidebar-collapsed');
//     }, 000);

//      console.log("480 width");
//   };

//    });

    function toggleFullscreen(elem) {
	elem = elem || document.documentElement;
	if (!document.fullscreenElement && !document.mozFullScreenElement &&
		!document.webkitFullscreenElement && !document.msFullscreenElement) {
	    if (elem.requestFullscreen) {
		elem.requestFullscreen();
	    } else if (elem.msRequestFullscreen) {
		elem.msRequestFullscreen();
	    } else if (elem.mozRequestFullScreen) {
		elem.mozRequestFullScreen();
	    } else if (elem.webkitRequestFullscreen) {
		elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
	    }
	} else {
	    if (document.exitFullscreen) {
		document.exitFullscreen();
	    } else if (document.msExitFullscreen) {
		document.msExitFullscreen();
	    } else if (document.mozCancelFullScreen) {
		document.mozCancelFullScreen();
	    } else if (document.webkitExitFullscreen) {
		document.webkitExitFullscreen();
	    }
	}
    }


    $("#sw_full_screen").click(function () {
	toggleFullscreen();
	if ($("#sw_full_screen").prop("checked"))
	{
	    $('#full-screen').addClass("btnactive");
	    $('#full-screen').prop('checked', true);
	} else {
	    $('#full-screen').removeClass("btnactive");
	    $('#full-screen').prop('checked', false);
	}
    });

    $("#full-screen").click(function () {
	toggleFullscreen();
	if ($("#full-screen").prop("checked"))
	{
	    $('#sw_full_screen').addClass("btnactive");
	    $('#sw_full_screen').prop('checked', true);
	} else {
	    $('#sw_full_screen').removeClass("btnactive");
	    $('#sw_full_screen').prop('checked', false);
	}
    });


    if ($.cookie("fullscreen") == "Enabled") {
	$("#full-screen").click();
//         console.log("Full screen Enabled");
    }

//   document.getElementById('full-screen').addEventListener('click', function() {
//     toggleFullscreen();
//   });

//    videoheight = $('.elementor-video-iframe').height();
//         $('.ld-focus-sidebar-wrapper').css('height',videoheight);
//           console.log( videoheight);


//   $(window).on('resize', function(){
//         videoheight = $('.elementor-video-iframe').height();
//           $('.ld-focus-sidebar-wrapper').css('height',videoheight);
//                console.log( videoheight);
//     });
    if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
	document.getElementsByTagName("BODY")[0].className += "safari";
	console.log("safariii park");
    }
});


