var rsmg_lightbox_index;var rsmg_set_self_position;(function(a){a.fn.rsmg_lightbox=function(b){return this.each(function(){function p(){if(h.outerWidth()==a(window).outerWidth())return;var b=h[0].style;h.css({left:"50%",marginLeft:h.outerWidth()/2*-1,zIndex:f.zIndex+3});var c=a(window).height();var d=a(document).height();var e=h.height();if(e+80>=c&&(h.css("position")!="absolute"||j)){var g=a(document).scrollTop()+40;h.css({position:"absolute",top:g+"px",marginTop:0});if(j){b.removeExpression("top")}}else if(e+80<c){if(j){b.position="absolute";if(f.centered){b.setExpression("top",'(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"');b.marginTop=0}else{var i=f.modalCSS&&f.modalCSS.top?parseInt(f.modalCSS.top):0;b.setExpression("top","((blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "+i+') + "px"')}}else{if(f.centered){h.css({position:"fixed",top:"50%",marginTop:h.outerHeight()/2*-1})}else{h.css({position:"fixed"}).css(f.modalCSS)}}}else if(e+80>c){if(d>c)var g=a(document).scrollTop()+40;else var g=0;if(g+e>c)g=0;h.css({position:"absolute",top:g+"px",marginTop:0});if(j){b.removeExpression("top")}}o()}function o(){if(a(window).height()<a(document).height()){g.css({height:a(document).height()+"px"});i.css({height:a(document).height()+"px"})}else{g.css({height:"100%"});if(j){a("html,body").css("height","100%");i.css("height","100%")}}}function n(a){if((a.keyCode==27||a.DOM_VK_ESCAPE==27&&a.which==0)&&f.closeEsc)m()}function m(){var b=h[0].style;if(f.destroyOnClose){h.add(g).remove()}else{h.add(g).hide()}i.remove();h.remove();a(window).unbind("reposition",o);a(window).unbind("reposition",p);a(window).unbind("scroll",p);a(document).unbind("keyup",n);if(j)b.removeExpression("top");f.onClose()}var c=a(this).parent("a").attr("href");if(c.indexOf("&tmpl=component")==-1&&c.indexOf("?tmpl=component")==-1){var d=c.indexOf("?")>-1?"&":"?";c+=d+"tmpl=component"}var e=a("<iframe>",{src:c,id:"rsmg_iframe",allowTransparency:true,scrolling:"no",frameborder:0}).css({border:"none",margin:0,padding:0,position:"absolute","z-index":"9999",left:-1e3,top:-1e3,width:"100%",height:"100%"}).bind("load",function(){p()}).attr("onload","if (typeof window.parent.rsmg_set_self_position == 'function') window.parent.rsmg_set_self_position();");var f=a.extend({},a.fn.rsmg_lightbox.defaults,b),g=a(),h=e,i=a('<iframe id="foo" style="z-index: '+(f.zIndex+1)+';border: none; margin: 0; padding: 0; position: absolute; width: 100%; height: 100%; top: 0; left: 0; filter: mask();"/>'),j=a.browser.msie&&a.browser.version<7;rsmg_lightbox_index=f.currentIndex;var k=a(".js_lb_overlay:visible");if(k.length>0){g=k.remove();hasOverlays=true}else{g=a('<div id="rsmg_lightbox_overlay" class="'+f.classPrefix+'_overlay js_lb_overlay"/>');hasOverlays=false}if(a("#rsmg_iframe").length>0){m();a("#rsmg_iframe").remove()}if(j){var l=/^https/i.test(window.location.href||"")?"javascript:false":"about:blank";i.attr("src",l);a("body").append(i)}a("body").append(h.hide()).append(g);o();g.css({position:"absolute",width:"100%",top:0,left:0,right:0,bottom:0,zIndex:f.zIndex+2,display:"none"});if(!g.hasClass("lb_overlay_clear")){g.css(f.overlayCSS)}if(hasOverlays)g.show();g.fadeIn(f.overlaySpeed,function(){p();h[f.appearEffect](f.lightboxSpeed,function(){o();p();f.onLoad()})});window.rsmg_set_self_position=p;window.rsmg_close_lightbox=m;a(window).resize(o).resize(p).scroll(p).keyup(n);if(f.closeClick){g.click(function(a){m();a.preventDefault})}h.delegate(f.closeSelector,"click",function(a){m();a.preventDefault()});h.bind("close",m);h.bind("reposition",p)})};a.fn.rsmg_lightbox.defaults={currentIndex:0,appearEffect:"fadeIn",appearEase:"",overlaySpeed:250,lightboxSpeed:300,closeSelector:".close",closeClick:true,closeEsc:true,destroyOnClose:true,showOverlay:true,parentLightbox:false,onLoad:function(){},onClose:function(){},classPrefix:"lb",zIndex:999,centered:true,modalCSS:{top:"40px"},overlayCSS:{background:"black",opacity:.3}}})(jQuery)