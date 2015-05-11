jQuery(document).ready(function($){
	
	if ($('#rsmg_prev_page').length > 0)
		$('#rsmg_prev_page').hide();
	
	// items gallery
	rsmg_init_load_more($);
	rsmg_init_items($);
	
	var is_iframe = window.location != window.parent.location;
	
	// details
	var src = $("#rsmg_image_container img").attr('src');
	if ($.browser.msie && $.browser.version < 9)
	{
		src += src.indexOf('?') == -1 ? '?' : '&';
		src += 'random=' + Math.floor(Math.random()*11000);
	}
	var preloader = $('<img>', {
		'src': src
	}).load(function() {
		if (is_iframe)
		{
			var width  = $("#rsmg_main").outerWidth() + 110;
			var height = $("#rsmg_main").outerHeight();
		
			if (width > $(window).width())
			{
				var rounded = Math.round($(window).width() / 2);
				width = rounded + 125;
				$('#rsmg_thumb_container img').css('width', rounded + 'px');
				$("#rsmg_main").css('width', (rounded + 22) + 'px');
			}
		
			$(window.parent.document.getElementById('rsmg_iframe')).css({
				width: width,
				height: height
			});
			
			var selfheight 		= $(window.parent.document).find('#rsmg_iframe').height();
			var windowheight    = $(window.parent).height();
			var documentheight  = $(window.parent.document).height();
			if (selfheight + 80 > windowheight)
			{
				var topOffset = $(window.parent.document).scrollTop() + 40;
				if (topOffset + selfheight > windowheight)
					window.parent.scrollTo(0, 0);
			}
		}
		else
		{
			if ($('#rsmg_thumb_container > img').outerWidth() > $('#rsmg_main').parent().outerWidth())
				$("#rsmg_image_container img").css('width', '100%');
			
		}
		$("#rsmg_image_container img").show('blind', 500);
	});
	
	// iframe
	if (is_iframe)
	{
		// parent window
		var parent = window.parent.document;
		
		if (typeof window.parent.rsmg_set_self_position == 'function')
			window.parent.rsmg_set_self_position();
		
		var myPosition   = window.parent.rsmg_lightbox_index;
		var numPositions = $(parent).find("#rsmg_gallery li img").length;
		var visibleNumPositions = numPositions;
		if (typeof $(parent).find('#rsmg_load_more').attr('rel') != 'undefined')
			numPositions += parseInt($(parent).find('#rsmg_load_more').attr('rel'));
		var left_arrow	 = $('#rsmg_arrow_left a');
		var right_arrow	 = $('#rsmg_arrow_right a');
		
		if (myPosition == 0)
			left_arrow.hide();
		
		if (numPositions < 2 || myPosition + 1 >= numPositions)
			right_arrow.hide();
		
		left_arrow.unbind('click');
		left_arrow.click(function(e) {
			e.preventDefault();
			
			var prevPosition = myPosition-1;
			window.parent.jQuery($(parent).find("#rsmg_gallery li img")[prevPosition]).rsmg_lightbox({currentIndex: prevPosition});
		});
		
		right_arrow.unbind('click');
		right_arrow.click(function(e) {
			e.preventDefault();
			
			var nextPosition = myPosition+1;
			
			if (nextPosition >= visibleNumPositions)
			{
				if (typeof window.parent.rsmg_get_items == 'function')
				{
					window.parent.rsmg_get_items(window.parent.jQuery, false, false, function(data) {
						window.parent.jQuery($(parent).find("#rsmg_gallery li img")[nextPosition]).rsmg_lightbox({currentIndex: nextPosition});
					});
				}
				return;
			}
			
			window.parent.jQuery($(parent).find("#rsmg_gallery li img")[nextPosition]).rsmg_lightbox({currentIndex: nextPosition});
		});
		
		$(window).keyup(function(e) {
			if((e.keyCode == 27 || (e.DOM_VK_ESCAPE == 27 && e.which==0)) && typeof window.parent.rsmg_close_lightbox == 'function')
					window.parent.rsmg_close_lightbox()
			
			// left
			if (e.keyCode == 37)
				left_arrow.click();
			
			// right
			if (e.keyCode == 39)
				right_arrow.click();
		});
		
		$('#rsmg_component_main').click(function(e) {
			if ($(e.target).length > 0 && $(e.target).attr('id') == $(this).attr('id'))
				if (typeof window.parent.rsmg_close_lightbox == 'function')
					window.parent.rsmg_close_lightbox()
		});
	}
}); 

function rsmg_get_items_filter($, more)
{
	var data = {
		'limitstart': $('ul#rsmg_gallery').children().length,
		'Itemid': $('#rsmg_itemid').val()
	};
	
	if (more)
		for (var key in more)
			data[key] = more[key];
	
	return data;
}

function rsmg_get_items($, clear, more, successFunction)
{
	// parent container
	var parent = $('#rsmg_gallery');
	
	// clear contents
	if (clear == true)
		parent.empty();
	
	$.ajax({
		type: 'POST',
		url: "index.php?option=com_rsmediagallery&task=getitems&format=raw",
		data: rsmg_get_items_filter($, more),
		beforeSend: function() {
			// li container
			var li = $('<li>', {'id': 'rsmg_loader_container'});
			
			// ajax loader
			var loader = $('<div>', {'class': 'rsmg_item_container'});
			
			// add loader image
			li.append(loader);
			
			// append the loader as the last item in the list
			parent.append(li);
			
			// hide load more
			$('#rsmg_load_more').hide('fade', 500);
		},
		success: function(data){
			$('#rsmg_loader_container').remove();
			
			if (typeof data == 'object' && data.items && data.total)
			{
				$(data.items).each(function (index, item) {
					// li container
					var li = $('<li>');
					
					// div container
					var div = $('<div>', {'class': 'rsmg_item_container'});
					
					// thumbnail
					var a_thumb  = $('<a>', {'href': item.href});
					var img_thumb  = $('<img>', {'src': item.thumb, 'alt': item.title});
					a_thumb.append(img_thumb);
					
					var title = '';
					if (typeof item.title != 'undefined')
						title = $('<a>', {'href': item.href, 'class': 'rsmsg_title'}).html(item.title);
					
					var description = '';
					if (typeof item.description != 'undefined')
						description = $('<span>', {'class': 'rsmg_item_description'}).html(item.description);
					
					li.append(div.append(a_thumb, title, description));
					
					parent.append(li);
				});
				
				rsmg_init_items($);
				
				// show load more
				if (data.total > $('ul#rsmg_gallery').children().length)
				{
					var left = data.total - $('ul#rsmg_gallery').children().length;
					$('#rsmg_load_more').html(rsmg_get_lang('RSMG_LOAD_MORE').replace('%d', left));
					$('#rsmg_load_more').attr('rel', left);
					$('#rsmg_load_more').show('fade', 500);
				}
				else
					$('#rsmg_load_more').attr('rel', 0);
				
				if (typeof successFunction == 'function')
				{
					successFunction(data);
				}
			}
		}
	});
}

function rsmg_init_items($)
{
	// hover effect
	$("#rsmg_gallery li img").hover(function () {
		$(this).stop().animate({
			opacity: 0.7
			}, "slow");
		},
		
		function () {
			$(this).stop().animate({
				opacity: 1.0
			}, "slow");
		}
	);
	
	// click to create lightbox
	if (typeof window.rsmg_slideshow != 'undefined' && window.rsmg_slideshow == 1)
	{
		$("#rsmg_gallery li img").unbind('click');
		$("#rsmg_gallery li img").each(function (index, el) {
			$(el).click(function (e) {
				e.preventDefault();
				$(this).rsmg_lightbox({currentIndex: index});
			})
		});
	}
}

function rsmg_init_load_more($)
{
	// do we have a load more button ?
	if ($('#rsmg_load_more').length > 0)
	{
		var total = $('#rsmg_load_more').attr('rel');
		var left = 0;
		if (total > 0)
			left = total - $('ul#rsmg_gallery').children().length;
		if (left < 0)
			left = 0;
		$('#rsmg_load_more').attr('rel', left);
		
		$('#rsmg_load_more').html(rsmg_get_lang('RSMG_LOAD_MORE').replace('%d', $('#rsmg_load_more').attr('rel')));
		
		$('#rsmg_load_more').click(function (e){
			e.preventDefault();
			e.shiftKey ? rsmg_get_items($, false, {'limitall': 1, 'limit': $('#rsmg_load_more').attr('rel')}) : rsmg_get_items($);
		});
		
		$(document).keydown(function (e) {
			if (e.shiftKey)
				$('#rsmg_load_more').html(rsmg_get_lang('RSMG_LOAD_ALL').replace('%d', $('#rsmg_load_more').attr('rel')));
		});
		
		$(document).keyup(function (e) {
			$('#rsmg_load_more').html(rsmg_get_lang('RSMG_LOAD_MORE').replace('%d', $('#rsmg_load_more').attr('rel')));
		});
	}
}