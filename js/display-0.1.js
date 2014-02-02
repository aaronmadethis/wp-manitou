jQuery(document).ready(function($) {
	var win_w = $(window).width(),
		win_h = $(window).height(),
		has_video = $('html.video').length > 0 ? true : false,
		win_ratio,
		is_horizontal;

	/* ---------------------------------------------------------------------------------------
	WINDOW RATIO
	--------------------------------------------------------------------------------------- */
	function set_window_ratio(){
		win_ratio = win_w / win_h;
		is_horizontal = false;
		
		if(win_ratio < 1) is_horizontal = true;
	}
	set_window_ratio();


	/* ---------------------------------------------------------------------------------------
	NAVIGATION FIXES
	--------------------------------------------------------------------------------------- */
	$('li.page-item-6 a').first().click(function(e){ e.preventDefault(); });
	$('li.page-item-31 a').first().click(function(e){ e.preventDefault(); });
	$('li.page-item-44 a').first().click(function(e){ e.preventDefault(); });
	$('li.page-item-56 a').first().click(function(e){ e.preventDefault(); });
	$('li.page-item-64 a').first().click(function(e){ e.preventDefault(); });

	$('#mega-footer .page-item-6 a').first().click(function(e){ e.preventDefault(); });
	$('#mega-footer .page-item-31 a').first().click(function(e){ e.preventDefault(); });
	$('#mega-footer .page-item-44 a').first().click(function(e){ e.preventDefault(); });
	$('#mega-footer .page-item-56 a').first().click(function(e){ e.preventDefault(); });
	$('#mega-footer .page-item-64 a').first().click(function(e){ e.preventDefault(); });

	/* ---------------------------------------------------------------------------------------
	WINDOW RESIZE
	--------------------------------------------------------------------------------------- */		
	var rtime = new Date(1, 1, 2000, 12,00,00),
		timeout = false;
		delta = 50;
		
	$(window).resize(function() {
		$('#inset').attr({style: ''});
	    rtime = new Date();
	    if (timeout === false) {
	        timeout = true;
	        setTimeout(resize_end, delta);
	    }
	});

	function resize_end() {
	    if (new Date() - rtime < delta) {
	        setTimeout(resize_end, delta);
	    } else {
	        timeout = false;
	        win_w = $(window).width();
			win_h = $(window).height();
			set_window_ratio();
	    }               
	}

});

