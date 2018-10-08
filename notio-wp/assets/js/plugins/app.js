(function ($, window, _) {
	'use strict';
    
	var $doc = $(document),
			win = $(window),
			body = $('body'),
			AnimationsArray = [],
			thb_md = new MobileDetect(window.navigator.userAgent),
			thb_scrollr = false;
	
	var SITE = SITE || {};
	
	TweenMax.defaultEase = Quart.easeOut;
	TimelineMax.defaultEase = Quart.easeOut;
	
	SITE = {
		toggleHover: false,
		MainCart: false,
		init: function() {
			var self = this,
					obj,
					content = $('#wrapper');
			
			function start_init() {
				for (var obj in self) {
					if ( self.hasOwnProperty(obj)) {
						var _method =  self[obj];
						if ( _method.selector !== undefined && _method.init !== undefined ) {
							if ( $(_method.selector).length > 0 ) {
								_method.init();
							}
						}
					}
				}	
			}
			
			if (body.hasClass('preloader_on')) {
				Pace.on("done", function(){
					TweenMax.to($('.pace'), 1, { autoAlpha:0, onComplete: function() { $('.pace').css('display', 'none'); } });
					
					start_init();
				});
			} else {
				start_init();
			}
			
		},
		reverseAnimations: {
			start: function(container) {
				var out = _.difference(AnimationsArray, container);
				for (var i = 0; i < out.length; ++i) {
					if (out[i].progress() > 0) {
						out[i].timeScale(1.6).reverse();
						$('.quick_cart').data('toggled', false);
						$('.mobile-toggle').data('toggled', false);
						$('.quick_search').data('toggled', false);
					}
				}
			}
		},
		menu: {
			selector: '#mobile-menu',
			init: function() {
				
				var menu = $('#mobile-menu'),
					items = menu.find('.mobile-menu>li,.menu-footer p, .select-wrapper, .social-links a'),
					all_links = $('.mobile-menu a', menu),
					toggle = $('.mobile-toggle'), 
					span = toggle.find('span'),
					cc = menu.find('.spacer'),
					inner = menu.find('.menu-container'),
					tlMainNav = new TimelineLite({ paused: true, onStart: function() { menu.css('display', 'block'); }, onComplete: function() { SITE.customScroll.init(); }, onReverseComplete: function() { menu.css('display', 'none'); } }),
					toggleHover = new TimelineLite({ paused: true }),
					leftAligned = body.hasClass('mobile_menu_position_left') ? -1 : 1,
					style2 = menu.hasClass('style2'),
					close = $('.panel-close');
				
				AnimationsArray.push(tlMainNav);
				AnimationsArray.push(toggleHover);
				tlMainNav
					.to(menu, 0.5, {autoAlpha:1})
					.to(inner, 0.5, {x: 0})
					.staggerFrom(items, 0.4, { x: leftAligned * 50, opacity:0}, 0.1);
				
				if (!style2) {
					toggleHover
						.to(span, 0.5, {x:'0%'})
						.to(toggle.find('div'), 0.5, {rotation:90})
						.to(span.eq(0), 0.2, {y: '-2'})
						.to(span.eq(2), 0.2, {y: '2'}, "-=0.2");
					
					toggle.hover(function() {
						if (!toggle.data('toggled')) {
							toggleHover.restart();
						}
					}, function() {
						if (!toggle.data('toggled')) {
							toggleHover.reverse();
						}
					}).on('click',function() {
						if(!toggle.data('toggled')) {
							SITE.reverseAnimations.start([tlMainNav,toggleHover]);
							tlMainNav.timeScale(1).restart();
							toggle.data('toggled', true);
						} else {
							tlMainNav.timeScale(1.6).reverse();
							toggle.data('toggled', false);
						}
						return false;
					});
				} else {
					toggleHover
						.to(span, 0.5, {x:'0%'})
						.to(span.eq(1), 0.1, {autoAlpha: 0}, "start")
						.to(span.eq(0), 0.2, {y: 0, rotationZ: '46%'}, "start")
						.to(span.eq(2), 0.2, {y: 1, rotationZ: '-46%'}, "start");
					
					toggle.on('click',function() {
						if (!toggle.data('toggled')) {
							toggleHover.timeScale(1).restart();
							tlMainNav.timeScale(1).restart();
							toggle.data('toggled', true);
						} else {
							toggleHover.timeScale(2).reverse();
							tlMainNav.timeScale(2).reverse();
							toggle.data('toggled', false);
						}
						return false;
					});
				}
				all_links.on('click', function(e){
					var _this = $(this),
						url = _this.attr('href'),
						ah = $('#wpadminbar').outerHeight(),
						fh = $('.header').outerHeight(),
						hash = url.indexOf("#") !== -1 ? url.substring(url.indexOf("#")+1) : '',
						pos = hash ? $('#'+hash).offset().top - ah - fh : 0,
						time = thb_md.mobile() ? 0 : 1;

					if (hash) {
						pos = (hash === 'footer') ? "max" : pos;
						toggleHover.timeScale(2).reverse();
						tlMainNav.timeScale(2).reverse();
						toggle.data('toggled', false);
						TweenMax.to(win, time, { scrollTo:{y:pos, autoKill:false} });
						return false;
					} else {
						return true;	
					}
				});
				cc.add(close).on('click', function() {
					tlMainNav.timeScale(2).reverse();
					toggleHover.reverse();
					toggle.data('toggled', false);
				});
			}
		},
		fixedMe: {
			selector: '.thb-fixed',
			init: function(el) {
				var base = this,
						container = el ? el : $(base.selector),
						a = $('#wpadminbar'),
						header = $('.header').outerHeight(),
						ah = (a ? a.outerHeight() : 0) + header,
						filter = container.hasClass('thb-portfolio-filter') ? container : false,
						portfolio = filter ? filter.parents('.thb-portfolio') : false;
				
				if (!thb_md.mobile()) {
					container.each(function() {
						var el = $(this);
						if (!filter.length) {
							ah += 30;	
						}
						el.stick_in_parent({
							offset_top: ah,
							spacer: '.sticky-content-spacer',
							recalc_every: 5
						}).on("sticky_kit:stick", function(e) {
							var offset = filter ? portfolio.offset() : false;
							if (filter.length) {
								el.css('left', offset.left);
							}
						});
					});
					
					$('.post-content, .products, .vc_grid-container').imagesLoaded(function() {
						$(document.body).trigger("sticky_kit:recalc");
					});
					win.on('resize', function(){
						$(document.body).trigger("sticky_kit:recalc");
					});
				}
			}
		},
		search: {
			selector: '.quick_search',
			init: function() {
				var base = this,
					container = $(base.selector),
					target = $('#searchpopup'),
					cc = target.find('.spacer'),
					el = target.find('p, input'),
					searchMain = new TimelineLite({ paused: true, onStart: function() { target.css('display', 'flex'); }, onComplete:function() { target.find('input').get(0).focus(); }, onReverseComplete: function() { target.css('display', 'none'); } });
				
				AnimationsArray.push(searchMain);
				searchMain
					.add(TweenLite.to(target, 0.5, {autoAlpha:1}))
					.staggerFrom(el, 0.2, { y: "50", opacity:0}, 0.10);
				
				container.on('click',function() {
					if(!container.data('toggled')) {
						SITE.reverseAnimations.start([searchMain]);
						searchMain.timeScale(1).restart();
						container.data('toggled', true);
					} else {
						searchMain.timeScale(1.6).reverse();
						container.data('toggled', false);
					}
					return false;
				});
				
				cc.on('click', function() {
					searchMain.timeScale(1.6).reverse();
					container.data('toggled', false);
				});
			}
		},
		keyNavigation: {
			selector: '.portfolio_nav',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				var thb_nav_click = function(e) {
					if (e.keyCode === 78) { // Next
						if (container.find('.post_nav_link.next').length) {
							container.find('.post_nav_link.next')[0].click();
						}
					}
					if (e.keyCode === 80) { // Prev
						if (container.find('.post_nav_link.prev').length) {
							container.find('.post_nav_link.prev')[0].click();
						}
					}
				};
				if ( themeajax.settings.keyboard_nav === 'on' ) {
					$doc.bind('keyup', thb_nav_click);
					
					$('input, textarea').on('focus', function() {
							$doc.unbind('keyup', thb_nav_click);
					});
					$('input, textarea').on('blur', function() {
							$doc.bind('keyup', thb_nav_click);
					});
				}
			}
		},
		quickCart: {
			selector: '#wrapper',
			init: function() {
				
				var close = $('.panel-close');
				
				SITE.toggleHover = new TimelineMax({ paused: true });
				SITE.MainCart = new TimelineMax({ paused: true, onStart: function() { $('#side-cart').css('display', 'block'); }, onComplete: function() { SITE.customScroll.init(); }, onReverseComplete: function() { $('#side-cart').css('display', 'none'); } });
					
				AnimationsArray.push(SITE.MainCart);
				AnimationsArray.push(SITE.toggleHover);
				
				SITE.MainCart
					.to($('#side-cart'), 0.5, {autoAlpha:1})
					.to($('#side-cart').find('.cart-container'), 0.5, {x: 0})
					.staggerFromTo($('.item, .product_list_widget>li,.total,.button','#side-cart'), 0.4, { y: 50, opacity:0}, { y: 0, opacity:1 },0.1);
				
				SITE.toggleHover
					.to($('.quick_cart').find('.handle'), 0.3, {y:'-3px'});		

				$('.quick_cart').hoverIntent(function() {
					SITE.toggleHover.play();
				}, function() {
					SITE.toggleHover.reverse();
				});
				$('.header').on('click', '.quick_cart', function() {
					if (themeajax.settings.is_cart || themeajax.settings.is_checkout) {
						return true;
					} else if (!$('.quick_cart').data('toggled')) {
						SITE.reverseAnimations.start([SITE.toggleHover]);
						SITE.MainCart.timeScale(1).play();
						
						$('.quick_cart').data('toggled', true);
					} else {
						SITE.MainCart.timeScale(1.6).reverse();
						$('.quick_cart').data('toggled', false);
					}
					return false;
				});
				$('#side-cart').find('.spacer').add(close).on('click', function() {
					SITE.MainCart.timeScale(1.6).reverse();
					SITE.toggleHover.reverse();
					$('.quick_cart').data('toggled', false);
					return false;
				});
			}
		},
		portfolioHeight: {
			selector: '.portfolio-horizontal',
			init: function(el) {
				var base = this,
					container = $(base.selector);
				
				base.control(container);
				
				win.on('scroll debounce',_.debounce(function(){
					base.control(container);
				}, 20));
			},
			control: function(el) {
				var h = $('.header'),
					a = $('#wpadminbar'),
					ah = (a ? a.outerHeight() : 0),
					f = ($('.footer-fixed').length ? $('#footer').outerHeight() : 0);
					
				el.filter('.portfolio-horizontal').each(function() {
					var _this = $(this),
						article = _this.find('.type-portfolio'),
						height = (win.height() - h.outerHeight() - ah - f) / 2;

					article.height(height);
					
				});
			}
		},
		textStyle: {
			selector: '.portfolio-text-style-2',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				base.control(container);
				
				win.on('scroll resize', _.debounce(function(){
					base.control(container);
				}, 10));
			},
			control: function(el) {
				var off = 0.1,
					k = 0,
					l = el.length;
				
				el.filter(':in-viewport').each(function () {
					var _this = $(this);
					if(_this.css('opacity') === '0'){
						TweenLite.to(_this, off * l, { delay: k * off, x: 0, autoAlpha:1});
						k++;
					}
				});
			}
		},
		skrollr: {
			selector: 'body',
			init: function() {
				var main = $('div[role="main"]');
				
				if (main.find('[data-top-bottom], [data-bottom-top]').length > 0) {
					main.imagesLoaded({ background: true }, function() {
						thb_scrollr = skrollr.init({
							forceHeight: false,
							easing: 'outCubic',
							mobileCheck: function() {
								return false;
							}
						});
					});
				}
				
			}
		},
		mobileMenu: {
			selector: '.mobile-menu',
			init: function() {
				var base = this,
					container = $(base.selector),
					parents = container.find('li:has(".sub-menu")>a');
				
					
				parents.on('click', function(e){
					var that = $(this),
							menu = that.next('.sub-menu');
					
					if (that.hasClass('active')) {
						that.removeClass('active');
						menu.slideUp('200', function() {
							setTimeout(function () {
								SITE.customScroll.init();
							}, 10);
						});
					} else {
						that.addClass('active');
						menu.slideDown('200', function() {
							setTimeout(function () {
								SITE.customScroll.init();
							}, 10);
						});
					}
					e.stopPropagation();
					e.preventDefault();
				});
			}
		},
		navDropdown: {
			selector: '.sf-menu',
			init: function() {
				var base = this,
						container = $(base.selector),
						item = container.find('li.menu-item-has-children');
						
					item.each(function() {
						var that = $(this),
								offset = that.offset(),
								dropdown = that.find('>.sub-menu'),
								li = dropdown.find('>li>a'),
								tl = new TimelineMax({paused: true});
						
						tl
							.to(dropdown, 0.5, {autoAlpha: 1 }, "start")
							.staggerFromTo(li, 0.15, {opacity: 0, x: 10 }, {opacity: 1, x: 0 }, 0.07, "start");
							
						that.hoverIntent(
							function () {
								var window_width = parseInt(win.outerWidth(), 10),
										dropdown_width = parseInt(dropdown.outerWidth(), 10),
										dropdown_offset_left = parseInt(that.offset().left, 10),
										dropdown_move = window_width - dropdown_width - dropdown_offset_left;
								
								that.addClass('sfHover');
								
								if (dropdown_move < 0) {
									dropdown.css("left", dropdown_move-60 + "px");
								}
								
								$(this).find('>a').addClass('active');
								tl.timeScale(1).restart();
								
							},
							function () {
								that.removeClass('sfHover');
								tl.timeScale(1.5).reverse();
								$(this).find('>a').removeClass('active');
							}
						);
						
					});
					
			}
		},
		fullHeightContent: {
			selector: '.full-height-content',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				base.control(container);
				
				win.on('resize.thb-full-height', _.debounce(function(){
					base.control(container);
				}, 50));
				
			},
			control: function(container) {
				var h = $('.header'),
					a = $('#wpadminbar'),
					f = $('.footer-fixed'),
					ah = (a ? a.outerHeight() : 0),
					fh = (f.length ? $('#footer').outerHeight() : 0),
					is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1,
					is_ie = detectIE();
				
				container.each(function() {
					var _this = $(this),
						height = win.height() - h.outerHeight() - ah - fh;
					
					if (!(is_firefox || is_ie)) {
						_this.css('min-height',height);
					} else {
						_this.css('height',height);
					}
				});
			}
		},
		videoPlayButton: {
			selector: '.thb_video_play_button_enabled',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.each(function() {
					var _this = $(this),
							button = _this.find('.thb_video_play'),
							icon = $('svg', button),
							instance = _this.data("vide");
							
						if (instance) {
							var video = instance.getVideoObject();
					  
							
							if (button) {
						 		button.on('click', function() {
						 			if (video) {
						 				if (video.paused) {
						 					video.play();
						 					icon.addClass('playing');
						 				} else { 
						 				  video.pause();
						 					icon.removeClass('playing');
						 				}
						 			}
						 			return false;
						 		});
							}
						}
				});
			}
		},
		slick: {
			selector: '.slick',
			init: function(el) {
				var base = this,
					container = el ? el : $(base.selector);
				
				container.each(function() {
					var that = $(this),
							data_columns = that.data('columns'),
							thb_columns = data_columns.length > 2 ? parseInt( data_columns.substr(data_columns.length - 1) ) : data_columns,
							children = that.find('.columns'),
							placeholders = children.find('.thb-placeholder'),
							columns = data_columns.length > 2 ? (thb_columns === 5 ? 5 : ( 12 / thb_columns )) : data_columns,
							fade = (that.data('fade') ? true : false),
							navigation = (that.data('navigation') === true ? true : false),
							autoplay = (that.data('autoplay') === 1 ? true : false),
							pagination = (that.data('pagination') === true ? true : false),
							center = (that.data('center') ? ( children.length > columns ? that.data('center') : false) : false),
							infinite = (that.data('infinite') === false ? false : true),
							autoplay_speed = that.data('autoplay-speed') ? that.data('autoplay-speed') : 4000,
							asNavFor = that.data('asnavfor'),
							rtl = body.hasClass('rtl');
							
							var tl = new TimelineMax({ 
								paused: true, 
								onStart: function() {
									that.addClass('remove-transition');
								},
								onComplete: function() { 
									that.removeClass('remove-transition');
									TweenMax.set(placeholders,{clearProps:"transform"});
								} 
							});
							
							tl.staggerTo(placeholders, 0.7, { scale: 1, x: 0 }, 0.2);

					var args = {
						dots: pagination,
						arrows: navigation,
						infinite: infinite,
						speed: 1000,
						fade: fade,
						centerPadding: '10%',
						centerMode: center,
						slidesToShow: columns,
						slidesToScroll: 1,
						rtl: rtl,
						cssEase: 'cubic-bezier(0.165, 0.840, 0.440, 1.000)',
						autoplay: autoplay,
						autoplaySpeed: autoplay_speed,
						pauseOnHover: true,
						accessibility: false,
						focusOnSelect: true,
						prevArrow: '<button type="button" class="slick-nav slick-prev">'+themeajax.arrows.left+'</button>',
						nextArrow: '<button type="button" class="slick-nav slick-next">'+themeajax.arrows.right+'</button>',
						responsive: [
							{
								breakpoint: 1025,
								settings: {
									slidesToShow: (columns < 3 ? columns : 3)
								}
							},
							{
								breakpoint: 780,
								settings: {
									slidesToShow: (columns < 2 ? columns : 2)
								}
							},
							{
								breakpoint: 640,
								settings: {
									slidesToShow: 1,
								}
							}
						]
					};
					if (asNavFor && $(asNavFor).is(':visible')) {
						args.asNavFor = asNavFor;	
					}
					if (that.data('fade')) {
						args.fade = true;
					}
					if (that.hasClass('product-thumbnails')) {
						args.responsive = false;
					}
					if (that.hasClass('testimonial-style1')) {
						args.customPaging = function(slider, i) {
							var portrait = $(slider.$slides[i]).find('.author_image').attr('src'),
									title = $(slider.$slides[i]).find('.title').text();
									
							return '<a class="portrait_bullet" title="'+title+'" style="background-image:url('+portrait+');"></a>';
						};
					}
					if (that.hasClass('portfolio-vertical')) {
						that.on('init', function(event, slick) {
							tl.play();
						});
					}
					if (that.hasClass('thb-portfolio-slider-style2')) {
						args.vertical = true;
						args.verticalSwiping = true;
						args.prevArrow = '<button type="button" class="slick-nav slick-prev">'+themeajax.arrows.top +'</button>';
						args.nextArrow = '<button type="button" class="slick-nav slick-next">'+themeajax.arrows.bottom +'</button>';
						that.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
							var decl = currentSlide - nextSlide,
							    prev = (decl == 1 || decl == (slick.slideCount-1)*(-1)),
							    prev_attr = prev ? '100%' : '-100%',
							    next_attr = prev ? '-100%' : '100%',
							    tl = new TimelineMax();
							    
							tl 
							  .set(slick.$slides.eq(nextSlide).find('.thb-placeholder'), { y: next_attr })
							  .to(slick.$slides.eq(currentSlide).find('.thb-placeholder-inner'), 0.5, { scale: 0.4 })
							  .to(slick.$slides.eq(currentSlide).find('.thb-placeholder'), 0.5, { y: prev_attr });
							  
						});
						that.on('afterChange', function(event, slick, currentSlide, nextSlide) {
							var current = slick.$slides.eq(currentSlide),
							    next = slick.$slides.eq(nextSlide),
							    not_current = slick.$slides.not(current),
							    not_next = slick.$slides.not(current),
							    tl = new TimelineMax();
							    
							tl
							  .to(current.find('.thb-placeholder'), 0.5, { y: '0%' })
							  .to(current.find('.thb-placeholder-inner'), 0.5, { scale: 1 }, 'thb-scale')
							  .set(not_current.find('.thb-placeholder, .thb-placeholder-inner'), { clearProps:'transform' }, 'thb-scale' );
						});
						that.on('init', function(event, slick) {
							var tl = new TimelineMax();
							tl
							  .to(slick.$slides.eq(slick.currentSlide).find('.thb-placeholder-inner'), 0.5, { scale: 1 });
							
						});
					}
					that.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
						SITE.fullHeightContent.init();
					});
					if (center) {
						that.on('init', function(event, slick) {
							that.addClass('centered');
						});
					}
					that.slick(args);
					
				});
			}
		},
		toggle: {
			selector: '.toggle .title',
			init: function() {
				var base = this,
				container = $(base.selector);
				container.each(function() {
					var that = $(this);
					that.on('click', function() {
					
						if (that.hasClass('toggled')) {
							that.removeClass("toggled").closest('.toggle').find('.inner').slideUp(200);
						} else {
							that.addClass("toggled").closest('.toggle').find('.inner').slideDown(200);
						}
						
					});
				});
			}
		},
		variations: {
			selector: 'form.variations_form',
			init: function() {
				var base = this,
					container = $(base.selector),
					price_container = $('p.price', '.product-information').eq(0),
					org_price = price_container.html();
				
				container.on("show_variation", function(e, variation) {
					price_container.html(variation.price_html);
				}).on('reset_image', function () {
					price_container.html(org_price);
				});
			}
		},
		pswpGallery: {
			selector: '.thb_gallery',
			init: function(el) {
				var base = this,
						container = $(base.selector),
						options = {
						    index: 0,
						    hideAnimationDuration:500, 
						    showAnimationDuration:500
						};
				
				if (!$('.pswp').length) {
					body.append('<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"> <div class="pswp__bg"></div><div class="pswp__scroll-wrap"> <div class="pswp__container"> <div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"> <div class="pswp__top-bar"> <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> <div class="pswp__preloader"> <div class="pswp__preloader__icn"> <div class="pswp__preloader__cut"> <div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"> <div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"> </button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"> </button> <div class="pswp__caption"> <div class="pswp__caption__center"></div></div></div></div></div>');
				}
				
				container.each(function(index) {
					var _this = $(this),
							the_gallery = _this,
							pswpElement = document.querySelectorAll('.pswp')[0],
							links = _this.find('a[data-size]'),
							items = [],
							gallery,
							options = {
									galleryUID: index,
							    index: 0,
							    hideAnimationDuration:500, 
							    showAnimationDuration:500,
							    fullscreenEl: true,
							    shareEl: false
							};
					
					links.each(function() {
						var _this = $(this),
								href = _this.attr('href'),
								src = _this.find('img').attr('src'),
								size = _this.data('size').split('x'),
								item = {
									msrc: src,
									src: href,
									w: parseInt(size[0], 10),
									h: parseInt(size[1], 10)
								};
						items.push(item);		
					});

					links.on('click', function(e) {
		        e.preventDefault();
		        
						var i = $(this).parents('.thb_gallery').find('a[data-size]').index($(this));
						options.index = i;
						options.getThumbBoundsFn = function(i) {
		            var thumbnail = links[i],
		                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
		                rect = thumbnail.getBoundingClientRect(); 
								
		            return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
		        };
		        
						gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
						
						gallery.init();
					});
					
				});
			}
		},
		pswp: {
			selector: '[rel="magnific"]',
			init: function(el) {
				var base = this,
						container = $(base.selector),
						options = {
						    index: 0,
						    hideAnimationDuration:500, 
						    showAnimationDuration:500,
						    fullscreenEl: true,
						    shareEl: false
						};
				
				if (!$('.pswp').length) {
					body.append('<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"> <div class="pswp__bg"></div><div class="pswp__scroll-wrap"> <div class="pswp__container"> <div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"> <div class="pswp__top-bar"> <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> <div class="pswp__preloader"> <div class="pswp__preloader__icn"> <div class="pswp__preloader__cut"> <div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"> <div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"> </button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"> </button> <div class="pswp__caption"> <div class="pswp__caption__center"></div></div></div></div></div>');
				}
				
				container.on('click', function(e) {
					var _this = $(this),
							pswpElement = document.querySelectorAll('.pswp')[0],
							href = _this.attr('href'),
							src =_this.find('img').attr('src'),
							size = _this.data('size').split('x'),
							item = [{
								msrc: src,
								src: href,
								w: parseInt(size[0], 10),
								h: parseInt(size[1], 10)
							}],
							gallery;
					
					options.getThumbBoundsFn = function(i) {
	            var thumbnail = _this[0],
	                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
	                rect = thumbnail.getBoundingClientRect(); 

	            return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
	        };
					gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, item, options);
					
					gallery.init();
					
					return false;
				});
			}
		},
		paginationStyle2: {
			selector: '.pagination-style2',
			init: function() {
				var base = this,
						container = $(base.selector),
						load_more = $('.thb_load_more'),
						thb_loading = false,
						page = 2;
								
				load_more.on('click', function(){
					var _this = $(this),
							text = _this.text(),
							count = _this.data('count'),
							i = container.find('.post').last().data('i');
					
					if(thb_loading === false) {
						_this.html('<span>'+themeajax.l10n.loading+'</span>').addClass('loading');
						
						$.ajax( themeajax.url, {
							method : 'POST',
							data : {
								action: 'thb_blog_ajax',
								page : page++,
								thb_i: i
							},
							beforeSend: function() {
								thb_loading = true;
							},
							success : function(data) {
								thb_loading = false;
								var d = $.parseHTML($.trim(data)),
										l = d ? d.length : 0;
									
								if( data === '' || data === 'undefined' || data === 'No More Posts' || data === 'No $args array created') {
									_this.html('<span>'+themeajax.l10n.nomore+'</span>').removeClass('loading').off('click');
								} else {
									
									$(d).appendTo(container).hide().imagesLoaded({ background: true }, function() {
										if (container.data('isotope')) {
											container.isotope('appended', $(d));
										}
										$(d).show();
										TweenMax.set($(d), {opacity: 0, y:30});
										TweenMax.staggerTo($(d), 0.5, { y: 0, opacity:1}, 0.25);
										
										if (thb_scrollr) {
											thb_scrollr.refresh();	
										}
									});
									
									if (l < count){
										_this.html('<span>'+themeajax.l10n.nomore+'</span>').removeClass('loading');
									} else {
										_this.html('<span>'+text+'</span>').removeClass('loading');
									}
								}
							}
						});
					}
					return false;
				});
			}
		},
		paginationStyle3: {
			selector: '.pagination-style3',
			init: function() {
				var base = this,
						container = $(base.selector),
						page = 2,
						thb_loading = false,
						count = container.data('count'),
						i = container.find('.post').last().data('i');
				
				var scrollFunction = _.debounce(function(){
					
					if (thb_loading === false) {
						$.ajax( themeajax.url, {
							method : 'POST',
							data : {
								action: 'thb_blog_ajax',
								page : page++,
								thb_i: i
							},
							beforeSend: function() {
								thb_loading = true;
							},
							success : function(data) {
								thb_loading = false;
								var d = $.parseHTML($.trim(data)),
										l = d ? d.length : 0;

								if( data === '' || data === 'undefined' || data === 'No More Posts' || data === 'No $args array created') {
									win.off('scroll', scrollFunction);
								} else {
									$(d).appendTo(container).hide().imagesLoaded(function() {
										if (container.data('isotope')) {
											container.isotope('appended', $(d));
										}
										$(d).show();
										TweenMax.set($(d), {opacity: 0, y:30});
										TweenMax.staggerTo($(d), 0.5, { y: 0, opacity:1}, 0.25);
										
										if (thb_scrollr) {
											thb_scrollr.refresh();	
										}
									});
									
									if (l >= count) {
										win.on('scroll', scrollFunction);
									}
								}
							}
						});
					}
				}, 30);
				
				win.scroll(scrollFunction);
			}
		},
		masonry: {
			selector: '.masonry',
			init: function() {
				var base = this,
						container = $(base.selector),
						header = $('.header'),
						holder = $('.icon-holder', header );
				
				Outlayer.prototype._setContainerMeasure = function( measure, isWidth ) {
				  if ( measure === undefined ) {
				    return;
				  }
				  var elemSize = this.size;
				  // add padding and border width if border box
				  if ( elemSize.isBorderBox ) {
				    measure += isWidth ? elemSize.paddingLeft + elemSize.paddingRight +
				      elemSize.borderLeftWidth + elemSize.borderRightWidth :
				      elemSize.paddingBottom + elemSize.paddingTop +
				      elemSize.borderTopWidth + elemSize.borderBottomWidth;
				  }
				
				  measure = Math.max( measure, 0 );
				  measure = Math.floor( measure );
				  this.element.style[ isWidth ? 'width' : 'height' ] = measure + 'px';
				};
				
				container.each(function() {
					var _this = $(this),
							layoutMode = _this.data('layoutmode') ? _this.data('layoutmode') : 'masonry',
							columnWidth = _this.data('column-width') ? _this.data('column-width') : false,
							el = _this.children('.columns'),
							loadmore = $(_this.data('loadmore')),
							filters = _this.find('.thb-portfolio-filter'),
							ul = filters.find('.filters'),
							filter_tl = new TimelineMax({ 
								paused:true, 
								onStart: function() {
									if (filters.hasClass('style1')) {
										ul.width(container.outerWidth());
									}
								},
								onReverseComplete: function() { TweenMax.set(ul,{clearProps:"all"}); } }),
							page = 2,
							args = {
								layoutMode: layoutMode,
								itemSelector: '.columns',
								transitionDuration : 0,
								hiddenStyle: { },
							  visibleStyle: { },
							},
							args_in = {
								y: 0, opacity:1
							},
							args_out = {
								y: 100, opacity:0	
							};
					
					if (filters.hasClass('style2')) {
						args.stamp = '.thb-portfolio-filter-stamp';
					}
					if (columnWidth) {
						args.masonry = {
							columnWidth: columnWidth
						};	
					}
					_this.imagesLoaded({ background: true }, function() {
						_this.on('layoutComplete', function(e, items ) {
							var elms = _.map(items, 'element');
							win.scroll(_.debounce(function(){
								items = $(elms).filter(':in-viewport').filter(function() {
								    return $(this).data('thb-in-viewport') === undefined;
								});
								if (items) {
									items.data('thb-in-viewport', true);
									TweenMax.staggerTo(items.find('.portfolio-holder'), 0.5, args_in, 0.1, function() {
										items.data('thb-in-viewport', true);
									});
								}
							}, 20)).trigger('scroll');
							
							if (filters.length && filters.hasClass('style1')) {
								filter_tl.timeScale(1).reverse();
							}
							_this.trigger('resize');
						}).isotope(args);
						
						loadmore.on('click', function(){
							var text = loadmore.text(),
									i = portfolioajax.thb_i,
									aspect = portfolioajax.aspect,
									columns = portfolioajax.columns,
									style = portfolioajax.style,
									layout = portfolioajax.layout,
									count = portfolioajax.count,
									loop = portfolioajax.loop,
									hover_style = portfolioajax.thb_hover_style,
									title_position = portfolioajax.thb_title_position;
							
							loadmore.text(themeajax.l10n.loading).addClass('loading');
							
							$.post( themeajax.url, { 
							
									action : 'thb_ajax',
									loop : loop,
									i : i,
									aspect : aspect,
									columns : columns,
									layout : layout,
									style : style,
									page : page,
									hover_style: hover_style,
									title_position: title_position
									
							}, function(data){
								page++;
								var d = $.parseHTML($.trim(data)),
										l = d ? d.length : 0;
								
								if( data === '' || data === 'undefined' || data === 'No More Posts' || data === 'No $args array created') {
									loadmore.text(themeajax.l10n.nomore).removeClass('loading').off('click');
								} else {
									$(d).find('.thb-placeholder').imagesLoaded({ background: true }, function() {
										$(d).appendTo(_this).hide();

										_this.isotope( 'appended', $(d) );
										$(d).show();
										TweenMax.staggerTo($(d).find('.portfolio-holder'), 0.5, args_in, 0.1);
										
										if ($(d).find('.thb_3dimg').length) {
											$(d).find('.thb_3dimg').thb_3dImg();	
										}
										if (l < count){
											loadmore.text(themeajax.l10n.nomore).removeClass('loading');
										} else {
											loadmore.text(text).removeClass('loading');
										}
									});
								}
								
							});
							return false;
						});
					});
					
					if (filters.length) {
						
						var toggle = filters.find('.thb-toggle'),
								li = filters.find('li:not(.close)'),
								close = filters.find('li.close'),
								links = filters.find('a');
						
						
						if (filters.hasClass('style1')) {
							filter_tl
								.to(toggle, 0.2, { xPercent:-100, opacity:0 })
								.to(ul, 0.2, { yPercent: 100 })
								.staggerFromTo(li, 0.2, { y: -20, opacity:0}, { y: 0, opacity:1 }, 0.05);

						} else if (filters.hasClass('style3')) {
							holder.append(filters);
							
							filter_tl
								.to(ul, 0.2, { autoAlpha:1})
								.staggerFromTo(li, 0.1, { y: -20, opacity:0}, { y: 0, opacity:1 }, 0.05);
								
						}
						toggle.on('click',function(){
							filter_tl.timeScale(1).restart();
						});
						close.on('click',function(){
							filter_tl.timeScale(1).reverse();
						});
						
						links.on('click',function(){
							var link = $(this),
									selector = link.attr('data-filter'),
									filter_function = function() {
										_this.on( 'layoutComplete', function(e,items) {
											var new_items = _.map(items, 'element');
											TweenMax.staggerTo($(new_items).find('.portfolio-holder'), 0.25, args_in, 0.1);
										});
										_this.isotope({ filter: selector });
									},
									items_out = $(_this.isotope('getFilteredItemElements')).find('.portfolio-holder');
							if (!link.hasClass('active')) {		
								links.removeClass('active');
								link.addClass('active');
								
								if (items_out.length) {
									TweenMax.staggerTo(items_out, 0.25, args_out, 0.1, filter_function);
								} else {
									filter_function();
								}
							} else {
								filter_tl.timeScale(1).reverse();	
							}
							return false;
						});
					}
				});
			}
		},
		thb_3dImg: {
			selector: '.hover-style7',
			init: function() {
				$('.thb_3dimg').thb_3dImg();
			}
		},
		textStyle3: {
			selector: '.thb-text-style3',
			init: function() {
				var base = this,
						container = $(base.selector);

					
				container.each(function() {
					var _this = $(this),
							content_side = _this.find('.thb-content-side'),
							images = _this.find('.portfolio-image'),
							links = _this.find('.portfolio-text-style3');
					
					win.scroll(_.debounce(function(){
						var items = links.filter(':in-viewport').filter(function() {
						    return $(this).data('thb-in-viewport') === undefined;
						});
						if (items) {
							items.data('thb-in-viewport', true);
							TweenMax.staggerTo(items.find('h2'), 0.5, { opacity: 1, x: 0 }, 0.1, function() {
								items.data('thb-in-viewport', true);
							});
						}
					}, 20)).trigger('scroll');
					
					function animateOver(i, el) {
						links.removeClass('active');
						$(el).addClass('active');
					  var tl = new TimelineMax();
					  	tl
					  		.to(images.not(images.eq(i)), 0.5, { opacity: 0, scale: 1 }, "start" ) 
					  		.to(images.eq(i), 0.5, { opacity: 0.6, display: 'block'}, "start" )
					  		.to(images.eq(i), 5, { scale: 1.05 } );
					  	
					  el.animation = tl;
					  return tl;
					}
					links.hoverIntent(function() {
							var i = $(this).index();
							animateOver(i, this);
					});
					animateOver(0, links.eq(0));
				});
			}
		},
		shareArticleDetail: {
			selector: '.share-post-link',
			init: function() {
				var base = this,
						container = $(base.selector);
						
				container.each(function() {
					var _this = $(this),
							target = _this.next('.share_container'),
							social = target.find('.social'),
							cc = target.find('.spacer'),
							el = target.find('h4, .boxed-icon, form'),
							value = target.find('.copy-value'),
							copy = target.find('.btn'),
							org_text = copy.text(),
							clipboard = new Clipboard(copy[0], {
							  target: function() {
							  	return value[0];
							  }
							}),
							shareMain = new TimelineLite({ paused: true, onStart: function() { target.css('display', 'flex'); }, onReverseComplete: function() { target.css('display', 'none'); copy.text(org_text); } });
							clipboard.on('success', function(e) {
							  copy.text(themeajax.l10n.copied);
							});
							
							
					AnimationsArray.push(shareMain);
					
					shareMain
						.add(TweenLite.to(target, 0.5, {autoAlpha:1}))
						.staggerFrom(el, 0.2, { y: "50", opacity:0}, 0.05);
					
					_this.on('click',function() {
						SITE.reverseAnimations.start([shareMain]);
						shareMain.timeScale(1).restart();
						return false;
					});
					
					cc.on('click', function() {
						shareMain.timeScale(1.6).reverse();
					});
					
					social.on('click', function() {
						var left = (screen.width/2)-(640/2),
								top = (screen.height/2)-(440/2)-100;
						window.open($(this).attr('href'), 'mywin', 'left='+left+',top='+top+',width=640,height=440,toolbar=0');
						return false;
					});
				});
				
			}
		},
		customScroll: {
			selector: '.custom_scroll',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.each(function() {
					var that = $(this);
					that.perfectScrollbar({
						wheelPropagation: false,
						suppressScrollX: true
					});
				});
				
				win.resize(function() {
					base.resize(container);
				});
			},
			resize: function(container) {
				container.perfectScrollbar('update');
			}
		},
		wpml: {
			selector: '#thb_language_selector',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.on('change', function () {
					var url = $(this).val(); // get selected value
					if (url) { // require a URL
						window.location = url; // redirect
					}
					return false;
				});
			}
		},
		reviews: {
			selector: '#reviews',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.on( 'click', 'p.stars a', function(){
					var that = $(this);
					
					setTimeout(function(){ that.prevAll().addClass('active'); }, 10);
				});
			}
		},
		loginregister: {
			selector: '#customer_login',
			init: function() {
				var base = this,
					container = $(base.selector),
					login = container.find('.login-section.first'),
					register = container.find('.login-section.second'),
					line = register.find('.line'),
					or = register.find('.or'),
					lrMain = new TimelineLite();
				
				TweenLite.set([login,register,line,or], {opacity: 0});
				TweenLite.set(login, {x: -100});
				TweenLite.set(register, {x: 100});
				TweenLite.set(line, {scaleY: 0});
				TweenLite.set(or, {scaleY: 0});
				lrMain
					.to(login, 0.5, {opacity:1, x: 0})
					.to(register, 0.5, {opacity:1, x: 0})
					.set(line, {opacity:1})
					.to(line, 0.5, {scaleY: 1})
					.to(or, 0.5, {opacity:1, scale: 1});
			}
		},
		shopSidebar: {
			selector: '.woo.sidebar',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.each(function() {
					var that = $(this),
							t = that.find('>h6');
					
					t.on('click', function() {
						t.toggleClass('active');
						t.next().animate({
							height: "toggle",
							opacity: "toggle"
						}, 300);
						$('.woo.sidebar').find('.custom_scroll').perfectScrollbar('update');
					});
				});
			}
		},
		contact: {
			selector: '.contact_map',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.each(function() {
					var _this = $(this),
						expand = _this.next('.expand'),
						tw = _this.width(),
						mapzoom = _this.data('map-zoom'),
						mapstyle = _this.data('map-style'),
						mapType = _this.data('map-type'),
						panControl = _this.data('pan-control'),
						zoomControl = _this.data('zoom-control'),
						mapTypeControl = _this.data('maptype-control'),
						scaleControl = _this.data('scale-control'),
						streetViewControl = _this.data('streetview-control'),
						locations = _this.find('.thb-location'),
						once;
						
					var bounds = new google.maps.LatLngBounds();
					
					var mapOptions = {
						center: {
							lat: -34.397,
							lng: 150.644
						},
						styles: mapstyle,
						zoom: mapzoom,
						draggable: !("ontouchend" in document),
						scrollwheel: false,
						panControl: panControl,
						zoomControl: zoomControl,
						mapTypeControl: mapTypeControl,
						scaleControl: scaleControl,
						streetViewControl: streetViewControl,
						mapTypeId: mapType
					};

					var map = new google.maps.Map(_this[0], mapOptions);
					
					map.addListener('tilesloaded', function() {
						if (!once) {
							locations.each(function(i) {
								var location = $(this),
										options = location.data('option'),
										lat = options.latitude,
										long = options.longitude,
										latlng = new google.maps.LatLng(lat, long),
										marker = options.marker_image,
										marker_size = options.marker_size,
										retina = options.retina_marker,
										title = options.marker_title,
										desc = options.marker_description,
										pinimageLoad = new Image();
								
								bounds.extend(latlng);
								
								pinimageLoad.src = marker;
								
								$(pinimageLoad).on('load', function(){
									base.setMarkers(i, locations.length, map, lat, long, marker, marker_size, title, desc, retina);
								});
									once = true;
							});
							
							if(mapzoom > 0) {
								map.setCenter(bounds.getCenter());
								map.setZoom(mapzoom);
							} else {
								map.setCenter(bounds.getCenter());
								map.fitBounds(bounds);
							}
						}
					});
					
					expand.toggle(function() {
						var w = _this.parents('.row').width();
						
						_this.parents('.contact_map_parent').css('overflow', 'visible');
						TweenLite.to(_this, 1, { width: w, onUpdate: function() {
								google.maps.event.trigger(map, 'resize');
								map.setCenter(bounds.getCenter());
							}
						});
						return false;
					},function() {
						TweenLite.to(_this, 1, { width: tw, onUpdate: function() {
								google.maps.event.trigger(map, 'resize');
								map.setCenter(bounds.getCenter());
							}, onComplete: function() {
								_this.parents('.contact_map_parent').css('overflow', 'hidden');
							}
						});
						return false;
					});
					
					win.on('resize', _.debounce(function(){
						map.setCenter(bounds.getCenter());
					}, 50) );
				});
			},
			setMarkers: function(i, count, map, lat, long, marker, marker_size, title, desc, retina) {
				
				function showPin (i) {

					var markerExt = marker.toLowerCase().split('.');
							markerExt = markerExt[markerExt.length - 1];
					
					if($.inArray(markerExt, ['svg']) || retina ) {
						 marker = new google.maps.MarkerImage(marker, null, null, null, new google.maps.Size(marker_size[0]/2, marker_size[1]/2));
					}
					var g_marker = new google.maps.Marker({
								position: new google.maps.LatLng(lat,long),
								map: map,
								animation: google.maps.Animation.DROP,
								icon: marker,
								optimized: false
							}),
							contentString = '<h3>'+title+'</h3>'+'<div>'+desc+'</div>';
					
					// info windows 
					var infowindow = new google.maps.InfoWindow({
							content: contentString
					});
					
					g_marker.addListener('click', function() {
				    infowindow.open(map, g_marker);
				  });
				}
				setTimeout(showPin, i * 250, i);
			}
		},
		animation: {
			selector: '.animation, .thb-counter, .thb-iconbox, .thb-icon',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				base.control(container);

				win.on('scroll', function(){
					base.control(container);
				}).trigger('scroll');
			},
			control: function(element) {
				var t = 0;
				
				element.filter(':in-viewport').each(function() {
					var _this = $(this);

					if (_this.hasClass('thb-iconbox') || _this.hasClass('thb-icon')) {
						SITE.iconbox.control(_this, t*0.3);
						t++;
					} else if (_this.hasClass('thb-counter')) {
						SITE.counter.control(_this, t*0.3);
						t++;
					} else if (_this.data('thb-animated') === undefined ) {
						_this.data('thb-animated', true);
						TweenMax.to(_this, 0.75, { autoAlpha: 1, x: 0, y: 0, scale: 1, delay: t*0.3 });
						t++;
					}
				});
			}
		},
		iconbox: {
			selector: '.thb-iconbox, .thb-icon',
			control: function(container, delay) {	
				if( container.data('thb-in-viewport') === undefined ) {
					container.data('thb-in-viewport', true);
					
					var _this = container,
							animation_speed = _this.data('animation_speed') !== '' ? _this.data('animation_speed') : '1.5',
							svg = _this.find('svg'),
							el = svg.find('path, circle, rect, ellipse'),
							h = _this.find('h6'),
							p = _this.find('p'),
							tl = new TimelineMax({
								delay: delay,
								paused: true
							}),
							all = h.add(p);
					
					tl
						.set(_this, { visibility: 'visible' })
						.set(svg, { display: 'block' })
						.staggerFrom(el, animation_speed, { drawSVG: "0%"}, 0.2, "s")
						.staggerFrom(all, (animation_speed / 2), { autoAlpha: 0, y: '20px'}, 0.1, "s+="+ (animation_speed / 2) );
					
					tl.play();
				}
			}
		},
		counter: {
			selector: '.thb-counter',
			control: function(container, delay) {	
				if( container.data('thb-in-viewport') === undefined ) {
					container.data('thb-in-viewport', true);
					
					var _this = container,
							counter = _this.find('.number')[0],
							count = _this.find('.number').data('count'),
							speed = _this.find('.number').data('speed'),
							svg = _this.find('svg'),
							el = svg.find('path, circle, rect, ellipse'),
							od = new Odometer({
								el: counter,
								value: 0,
								duration: speed,
								theme: 'minimal'
							}),
							tl = new TimelineMax({
								paused: true
							});
						tl
							.set(_this, { visibility: 'visible' })
							.set(svg, { display: 'block' })
							.staggerFrom(el, (speed/2000), { drawSVG: "0%"}, (speed/10000), "s");
						setTimeout(function(){
							tl.play();
							od.update(count);
						}, delay);
				}
			}
		},
		siteBarsPortfolio: {
			selector: '.site_bars_portfolio-on.active',
			init: function() {
				var base = this,
						container = $(base.selector),
						qp_container = $('.thb-quick-portfolio', container),
						qp_inner = $('.thb-quick-inner', qp_container),
						qp = $('.quick-portfolio', qp_container),
						tl = new TimelineMax({ 
							paused: true, 
							onStart: function() { 
								qp_container.css('visibility', 'visible'); 
							}, onReverseComplete: function() { 
								qp_container.css('visibility', 'hidden'); 
							}
						});
				
				tl.
					staggerTo(qp, 0.2, { x: 0 }, 0.05);
					
				container.hoverIntent(function() {
					tl.restart();
				}, function() {
					tl.reverse();
				});
			}
		},
		retinaJS: {
			selector: 'img.retina_size',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.attr('width', function() {
					var w = $(this).attr('width') / 2;	
					
					return w;
				});

			}
		},
		toBottom: {
			selector: '.mouse_scroll',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.each(function() {
					var _this = $(this);
						
					
					_this.on('click', function(){
						var p = _this.closest('.row'),
								h = p.outerHeight(),
								header = $('.header').outerHeight(),
								finalScroll = p.offset().top + h - header;
						TweenMax.to(win, 1, {scrollTo: { y: finalScroll, autoKill:false } });
						return false;
					});
				});
			}
		},
		toTop: {
			selector: '#scroll_totop',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.on('click', function(){
					TweenMax.to(window, 1, {scrollTo:{y:0, autoKill:false}});
					return false;
				});
				win.scroll(_.debounce(function(){
					base.control();
				}, 50));
			},
			control: function() {
				var base = this,
					container = $(base.selector);
					
				if (($doc.height() - (win.scrollTop() + win.height())) < 300) {
					TweenMax.to(container, 0.2, { autoAlpha:1 });
				} else {
					TweenMax.to(container, 0.2, { autoAlpha:0 });
				}
			}
		}
	};
	
	$doc.ready(function() {
		if ($('#vc_inline-anchor').length) {
			win.on('vc_reload', function() {
				SITE.init();
			});
		} else {
			SITE.init();
		}
	});

})(jQuery, this, _);