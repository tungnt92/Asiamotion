/* Modified for RSMediaGallery! */
/* By: RSJoomla! */
/*
* $ lightbox_me
* By: Buck Wilson
* Version : 2.3
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*     http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/

var rsmg_lightbox_index;
var rsmg_set_self_position;

(function($) {

    $.fn.rsmg_lightbox = function(options) {
		
        return this.each(function() {
			
			var href = $(this).parent('a').attr('href')
			if (href.indexOf('&tmpl=component') == -1 && href.indexOf('?tmpl=component') == -1)
			{
				var sign = href.indexOf('?') > -1 ? '&' : '?';
				href += sign + 'tmpl=component';
			}
			
			// build iframe
			var our_iframe = $('<iframe>', {
				'src': href,
				'id': 'rsmg_iframe',
				'allowTransparency' : true,
				'scrolling': 'no',
				'frameborder': 0
			}).css({
				'border': 'none',
				'margin': 0,
				'padding': 0,
				'position': 'absolute',
				'z-index': '9999',
				'left': -1000,
				'top': -1000,
				'width': '100%',
				'height': '100%'
			}).bind('load', function () {
				setSelfPosition();
			}).attr('onload', "if (typeof window.parent.rsmg_set_self_position == 'function') window.parent.rsmg_set_self_position();");
			
            var
                opts = $.extend({}, $.fn.rsmg_lightbox.defaults, options),
                $overlay = $(),
                //$self = $(this).clone(),
                $self = our_iframe,
                $iframe = $('<iframe id="foo" style="z-index: ' + (opts.zIndex + 1) + ';border: none; margin: 0; padding: 0; position: absolute; width: 100%; height: 100%; top: 0; left: 0; filter: mask();"/>'),
                ie6 = ($.browser.msie && $.browser.version < 7);
			
			// set index
			rsmg_lightbox_index = opts.currentIndex;
			
            //check if there's an existing overlay, if so, make subequent ones clear
            var $currentOverlays = $(".js_lb_overlay:visible");
			if ($currentOverlays.length > 0)
			{
				$overlay = $currentOverlays.remove();
				hasOverlays = true;
			}
			else
			{
				$overlay = $('<div id="rsmg_lightbox_overlay" class="' + opts.classPrefix + '_overlay js_lb_overlay"/>');
				hasOverlays = false;
			}
			
			if ($('#rsmg_iframe').length > 0)
			{
				closeLightbox();
				$('#rsmg_iframe').remove();
			}
				
            /*----------------------------------------------------
               DOM Building
            ---------------------------------------------------- */
            if (ie6) {
                var src = /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank';
                $iframe.attr('src', src);
                $('body').append($iframe);
            } // iframe shim for ie6, to hide select elements
            $('body').append($self.hide()).append($overlay);
			
            /*----------------------------------------------------
               Overlay CSS stuffs
            ---------------------------------------------------- */

            // set css of the overlay
			setOverlayHeight(); // pulled this into a function because it is called on window resize.
			$overlay.css({ position: 'absolute', width: '100%', top: 0, left: 0, right: 0, bottom: 0, zIndex: (opts.zIndex + 2), display: 'none' });
			if (!$overlay.hasClass('lb_overlay_clear')){
				$overlay.css(opts.overlayCSS);
			}

            /*----------------------------------------------------
               Animate it in.
            ---------------------------------------------------- */
            //
		
			if (hasOverlays)
				$overlay.show();
				
			$overlay.fadeIn(opts.overlaySpeed, function() {
				setSelfPosition();				
				$self[opts.appearEffect](opts.lightboxSpeed, function() { setOverlayHeight(); setSelfPosition(); opts.onLoad()});
			});

            /*----------------------------------------------------
               Bind Events
            ---------------------------------------------------- */

			window.rsmg_set_self_position = setSelfPosition;
			window.rsmg_close_lightbox = closeLightbox;
			
            $(window).resize(setOverlayHeight)
                     .resize(setSelfPosition)
                     .scroll(setSelfPosition)
                     .keyup(observeKeyPress);
            if (opts.closeClick) {
                $overlay.click(function(e) { closeLightbox(); e.preventDefault; });
            }
            $self.delegate(opts.closeSelector, "click", function(e) {
                closeLightbox(); e.preventDefault();
            });
            $self.bind('close', closeLightbox);
            $self.bind('reposition', setSelfPosition);

            /*----------------------------------------------------
               Private Functions
            ---------------------------------------------------- */

            /* Remove or hide all elements */
            function closeLightbox() {
                var s = $self[0].style;
                if (opts.destroyOnClose) {
                    $self.add($overlay).remove();
                } else {
                    $self.add($overlay).hide();
                }

                $iframe.remove();
                $self.remove();
				
				// clean up events.
                //$self.undelegate(opts.closeSelector, "click");

                $(window).unbind('reposition', setOverlayHeight);
                $(window).unbind('reposition', setSelfPosition);
                $(window).unbind('scroll', setSelfPosition);
                $(document).unbind('keyup', observeKeyPress);
                if (ie6)
                    s.removeExpression('top');
                opts.onClose();
            }


            /* Function to bind to the window to observe the escape/enter key press */
            function observeKeyPress(e) {
                if((e.keyCode == 27 || (e.DOM_VK_ESCAPE == 27 && e.which==0)) && opts.closeEsc) closeLightbox();
            }


            /* Set the height of the overlay
                    : if the document height is taller than the window, then set the overlay height to the document height.
                    : otherwise, just set overlay height: 100%
            */
            function setOverlayHeight() {
                if ($(window).height() < $(document).height()) {
                    $overlay.css({height: $(document).height() + 'px'});
                     $iframe.css({height: $(document).height() + 'px'}); 
                } else {
                    $overlay.css({height: '100%'});
                    if (ie6) {
                        $('html,body').css('height','100%');
                        $iframe.css('height', '100%');
                    } // ie6 hack for height: 100%; TODO: handle this in IE7
                }
            }


            /* Set the position of the modal'd window ($self)
                    : if $self is taller than the window, then make it absolutely positioned
                    : otherwise fixed
            */
            function setSelfPosition() {
				if ($self.outerWidth() == $(window).outerWidth())
					return;
				
                var s = $self[0].style;

                // reset CSS so width is re-calculated for margin-left CSS
                $self.css({left: '50%', marginLeft: ($self.outerWidth() / 2) * -1,  zIndex: (opts.zIndex + 3) });

                /* we have to get a little fancy when dealing with height, because rsmg_lightbox
                    is just so fancy.
                 */

                // if the height of $self is bigger than the window and self isn't already position absolute
				var windowheight   = $(window).height();
				var documentheight = $(document).height();
				var selfheight	   = $self.height();
				
                if ((selfheight + 80 >= windowheight) && ($self.css('position') != 'absolute' || ie6)) {					
                    // we are going to make it positioned where the user can see it, but they can still scroll
                    // so the top offset is based on the user's scroll position.
                    var topOffset = $(document).scrollTop() + 40;
                    $self.css({position: 'absolute', top: topOffset + 'px', marginTop: 0})
                    if (ie6) {
                        s.removeExpression('top');
                    }
                } else if (selfheight + 80 < windowheight) {
                    //if the height is less than the window height, then we're gonna make this thing position: fixed.
                    // in ie6 we're gonna fake it.
                    if (ie6) {
                        s.position = 'absolute';
                        if (opts.centered) {
                            s.setExpression('top', '(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"')
                            s.marginTop = 0;
                        } else {
                            var top = (opts.modalCSS && opts.modalCSS.top) ? parseInt(opts.modalCSS.top) : 0;
                            s.setExpression('top', '((blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + '+top+') + "px"')
                        }
                    } else {
                        if (opts.centered) {
                            $self.css({ position: 'fixed', top: '50%', marginTop: ($self.outerHeight() / 2) * -1})
                        } else {
                            $self.css({ position: 'fixed'}).css(opts.modalCSS);
                        }

                    }
                } else if (selfheight + 80 > windowheight) {
					// smaller window + position absolute
					if (documentheight > windowheight)
						var topOffset = $(document).scrollTop() + 40;
					else
						var topOffset = 0;
					
					if (topOffset + selfheight > windowheight)
						topOffset = 0;
					
					$self.css({position: 'absolute', top: topOffset + 'px', marginTop: 0})
					 if (ie6) {
                        s.removeExpression('top');
                    }
				}
				setOverlayHeight();
            }

        });



    };

    $.fn.rsmg_lightbox.defaults = {
		// index
		currentIndex: 0,
		
        // animation
        appearEffect: "fadeIn",
        appearEase: "",
        overlaySpeed: 250,
        lightboxSpeed: 300,

        // close
        closeSelector: ".close",
        closeClick: true,
        closeEsc: true,

        // behavior
        destroyOnClose: true,
        showOverlay: true,
        parentLightbox: false,

        // callbacks
        onLoad: function() {},
        onClose: function() {},

        // style
        classPrefix: 'lb',
        zIndex: 999,
        centered: true,
        modalCSS: {top: '40px'},
        overlayCSS: {background: 'black', opacity: .3}
    }
})(jQuery);