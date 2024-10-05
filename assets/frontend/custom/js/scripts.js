/* Description: Custom JS file */


(function($) {
	"use strict"; 

	/* Navbar Scripts */
	// jQuery to collapse the navbar on scroll
	$(window).on('scroll load', function() {
	if ($(".navbar").offset().top > 60) {
		$(".fixed-top").addClass("top-nav-collapse");
	} else {
		$(".fixed-top").removeClass("top-nav-collapse");
	}
	});

	// offcanvas script from Bootstrap + added element to close menu on click in small viewport
	$('[data-toggle="offcanvas"], .navbar-nav li a:not(.dropdown-toggle').on('click', function () {
			$('.offcanvas-collapse').toggleClass('open')
	})

	// hover in desktop mode
	function toggleDropdown (e) {
			const _d = $(e.target).closest('.dropdown'),
					_m = $('.dropdown-menu', _d);
			setTimeout(function(){
					const shouldOpen = e.type !== 'click' && _d.is(':hover');
					_m.toggleClass('show', shouldOpen);
					_d.toggleClass('show', shouldOpen);
					$('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
			}, e.type === 'mouseleave' ? 300 : 0);
	}
	$('body')
	.on('mouseenter mouseleave','.dropdown',toggleDropdown)
	.on('click', '.dropdown-menu a', toggleDropdown);

})(jQuery);
