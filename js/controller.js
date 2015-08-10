/* SLIDE COORDS
/*====================================================================*/
	
	(function($){

		$(".single-gvc-slider .grid")
		.mousemove(function(e){
			$('#gvc-slider-coords .posx').html((e.pageX-$(this).offset().left)+"px");
			$('#gvc-slider-coords .posy').html((e.pageY-$(this).offset().top)+"px");
		})
		.mouseout(function(e){
			$('#gvc-slider-coords .posx').html("");
			$('#gvc-slider-coords .posy').html("");
		}); 
					
	})(jQuery);

/* SLIDER VIDEO PLAY
/*====================================================================*/
	
	(function($){

		$("#gvc-slider .gvc-slider").each(function(){
			var video = $(this).find('video.slide-back-video');
			if (video.paused) {video.hide();}
		});

	})(jQuery);

/* FORM PLACEHOLDERS
/*====================================================================*/
	
	(function($){

			$.fn.placeholder = function() {

				$.each(this, function(){

					var $this       = $(this);
					var placeholder = $this.data("placeholder");

					$this
					.on('focus', function(){
						if($this.val() == placeholder) { $this.val('');}
					})
					.on('focusout', function(){
						if($this.val() == '') { $this.val(placeholder);}
					});

				});

			}

			$('.post-comments-area .gvc-placeholder').placeholder();
			$('#s').placeholder();
				

	})(jQuery);

/*  MISC
/*====================================================================*/

	(function($){

		// Iframe correcion

		$('iframe').each(function(){
	        var url = $(this).attr("src");
	        $(this).attr("src",url+"?wmode=transparent");
	    });

		
		// Calendar
		
		var prev = $('.widget_calendar td#prev').attr('colspan','1'),
			next = $('.widget_calendar td#next').attr('colspan','1');

		$('.widget_calendar tbody td').each(function(){
			if($(this).children('a').length != 0){
				$(this).addClass('has-children');
			}
		});

		if (prev.children('a').length != 0) {
			prev.children('a').html("&lsaquo;");
		} else {
			prev.html("&lsaquo;");
		}

		if (next.children('a').length != 0) {
			next.children('a').html("&rsaquo;");
		} else {
			next.html("&rsaquo;");
		}

		$('.widget_calendar tfoot td.pad:not(#next, #prev)').attr('colspan','5');

		// Gallery

		$('.gvc-gallery').each(function(){

			$(this).find('.gallery-item').each(function(){
				$(this).find('a').attr('title', $.trim($(this).find('.gallery-caption').text().replace( /[\s\n\r]+/g, ' ' )));
			});
				
		});

		setTimeout(function(){$('.js .faq-layout .accordion').addClass('visible')}, 200);
		setTimeout(function(){$('.loop .no-gap-grid').addClass('animated');}, 400);
		setTimeout(function(){$('.page-header').animate({
			'opacity':'1'
		},500,'swing');}, 500);

	})(jQuery);

/*  WOOCOMMERCE
/*====================================================================

	(function($){

		$('.woocommerce .products .product').each(function(){

			var product         = $(this);
			var addToCard       = product.find('.add_to_cart_button');
			var productProgress = product.find('.gvc-spinner');

			if (!addToCard.hasClass('added')) {

				addToCard.on('click',function(){

					var $this = $(this);

					$this.addClass('no-image');

					productProgress.fadeIn(250,function(){
						$thisProgress = $(this);

						setTimeout(function(){
							$thisProgress.fadeOut(250,function(){
								$this.addClass('added');
							});
						}, 500);

					})
					
				})
			};
		});

		var wooTab = $('.woocommerce-tabs');
		var tabs   = wooTab.find('.tabs > li');

			tabsDefaultWidth  = 0;
			tabs.each(function(){
				tabsDefaultWidth += $(this).outerWidth() + 4;
			});

		function OverflowCorrection(){

			if(tabsDefaultWidth >= wooTab.outerWidth()){
				wooTab.addClass('tab-full');
			} else {
				wooTab.removeClass('tab-full');
			}

		}

		OverflowCorrection();
		$(window).resize(OverflowCorrection);

	})(jQuery);
*/

/* TWITTER CONTENT WIDGET CORRECTIONS
/*====================================================================*/
	
	(function($){

			twitterCarousel = $('.js .twitter_tweets_carousel');
			setTimeout(function(){twitterCarousel.addClass('visible');}, 100);
			twitterCarousel.find('.twitter').addClass('flexslider');
			twitterCarousel.find('ul').addClass('slides');

	})(jQuery);

/* HEADER
/*====================================================================*/
	
	(function($){

		$('.header .search-toggle, .header .search-off').on('click', function(){
			$('.header .search').slideToggle(100);
		});

		$('.header .responsive-menu-toggle').on('click', function(){
			$('.header .header-menu').slideToggle(100);
		});

		$('.header .header-menu li').hover(
			function(){
				$(this).children('ul').stop().animate({"top":"36px","opacity":"1"}, 250).css('display','block');
			},
			function(){
				$(this).children('ul').stop().animate({"top":"66px","opacity":"0"}, 250, function(){
					$(this).css('display','none');
				});
			}
		);

		$('.header .header-menu ul ul li').hover(
			function(){
				$(this).children('ul').stop().animate({"top":"-6px","opacity":"1"}, 250).css('display','block');
			},
			function(){
				$(this).children('ul').stop().animate({"top":"24px","opacity":"0"}, 250, function(){
					$(this).css('display','none');
				});
			}
		);

		$('.header .header-menu ul ul > li:first-child').hover(
			function(){
				$(this).children('ul').stop().animate({"top":"0px","opacity":"1"}, 250).css('display','block');
			},
			function(){
				$(this).children('ul').stop().animate({"top":"36px","opacity":"0"}, 250, function(){
					$(this).css('display','none');
				});
			}
		);

		var docElem = document.documentElement,
	        header = $( '.header.attachment-fixed' ),
	        didScroll = false,
	        changeHeaderOn  = 300;

	    function init() {
	        window.addEventListener( 'scroll', function( event ) {
	            if( !didScroll ) {
	                didScroll = true;
	                scrollPage();
	            }
	        }, false );
	    }

	    function scrollPage() {
	        var sy = scrollY();

	        if ((header.hasClass('header-top-true') && Modernizr.mq("only screen and (min-width: 1280px)")) || (header.hasClass('header-top-true') && header.hasClass('responsive-false') && Modernizr.mq("only screen and (min-width: 1024px)"))) {
        		if ( sy >= changeHeaderOn ) {
	        		header.find('.header-top').hide(0);
	        	} else {
	        		header.find('.header-top').show(0);
	        	}
	        }
	        
	        didScroll = false;
	    }

	    function scrollY() {
	        return window.pageYOffset || docElem.scrollTop;
	    }

	    init();

	    // dropdown arrow
	    $('.header-menu > ul > li > a').append('<div class="gvc-da"></div>');
	    $('.header-menu > ul > li').hover(
			function(){
				$(this).find('.gvc-da').stop().animate({"bottom":"-10px","opacity":"1"}, 250).css('display','block');
			},
			function(){
				$(this).find('.gvc-da').stop().animate({"bottom":"-40px","opacity":"0"}, 250, function(){
					$(this).css('display','none');
				});
			}
		);

	    var hoverIn  = 63;
	    var hoverOut = 93;

	   	switch($('.header').data('height')){
	   		case 60:
	   		hoverIn  = 48;
			hoverOut = 78;
			break
			case 70:
	   		hoverIn  = 53;
			hoverOut = 83;
			break
			case 80:
	   		hoverIn  = 58;
			hoverOut = 88;
			break
			case 90:
	   		hoverIn  = 63;
			hoverOut = 93;
			break
			case 100:
	   		hoverIn  = 68;
			hoverOut = 98;
			break
			case 110:
	   		hoverIn  = 73;
			hoverOut = 103;
			break
			case 120:
	   		hoverIn  = 78;
			hoverOut = 108;
			break
			default:
			hoverIn  = 63;
			hoverOut = 93;

	   	}

		$('.header .header-menu li.megamenu > .sub-menu').wrap('<div class="megamenu-submenu-wrap"></div>');
		setTimeout(function(){
			$('.header .header-menu li.megamenu').addClass('submenu-active');
		},100);

	    $('.header .header-menu li.megamenu').hover(
			function(){
				var $this = $(this);
				$this.children('.megamenu-submenu-wrap').stop().animate({"top":hoverIn+"px","opacity":"1"}, 250).css('display','block');
			},
			function(){

				var $this = $(this);
				$this.children('.megamenu-submenu-wrap').stop().animate({"top":hoverOut+"px","opacity":"0"}, 250, function(){
					$(this).css('display','none');
				});
			}
		);

	})(jQuery);

/*  ALERT MESSAGES
/*====================================================================*/
	
	(function($){

		var alert = $('.alert');
			
			alert.each(function(){
				var $this = $(this);
				$this.find('.close-alert').on('click', function(){
					$this.fadeOut(200);
				})
			});

	})(jQuery);

/*  ANIMATED WIDEBOX
/*====================================================================*/
	
	(function($){

		$('.animated-widebox').each(function(){

		    var $this 	= $(this),
		    	img   	= $this.find('.animated-widebox-img'),
		    	content = $this.find('.animated-widebox-content');

		    function fadeInWidebox(target){
		    	if(target.hasClass('left')){
		    		target.children().animate({
		    			'left':'0',
		    			'opacity':'1'
		    		}, 800, 'easeOutCubic');
		    	} else 
		    	if(target.hasClass('right')){
		    		target.children().animate({
		    			'right':'0',
		    			'opacity':'1'
		    		}, 800, 'easeOutCubic');
		    	} else 
		    	if(target.hasClass('top')){
		    		target.children().animate({
		    			'top':'0',
		    			'opacity':'1'
		    		}, 800, 'easeOutCubic');
		    	} else 
		    	if(target.hasClass('bottom')){
		    		target.children().animate({
		    			'bottom':'0',
		    			'opacity':'1'
		    		}, 800, 'easeOutCubic');
		    	}
		    }

		    function ResponsiveAnimatedWideBox(){
		    	if(Modernizr.mq("only screen and (min-width: 768px)")){
					fadeInWidebox(img);
				    fadeInWidebox(content);
			    }
		    }

		    $this.one('inview', function(event, visible){
		    	if (visible) {
		    		setTimeout(function(){
		    			ResponsiveAnimatedWideBox();
		    		},400);
		    		 
		    	};
		    });

		    $(window).resize(ResponsiveAnimatedWideBox);

		});

	})(jQuery);

/*  COLORBOX
/*====================================================================*/
	
	(function($){

		$('.vc-gvc-row').each(function(){

			var $this   = $(this);
			var columns = $this.find('.gvc-colorbox.animate-yes');
			var length  = columns.length;
			var i = 0;

			$this.one('inview', function(event, visible){
		    	if (visible) {
		    		function animation() {
						$(columns[i]).addClass('active');
						i++;
						if (i == length ) {clearInterval(timer);}
					}

					var timer = setInterval(animation, 250); 
		    	};
		    });
		})

	})(jQuery);

/*  PROGRESS BAR
/*====================================================================*/
	
	(function($){

		$(".progress-container").each(function() {

			var $this = $(this);

			function progressBar(){

				var progressBar = $this.find('.progress-bar .progress-bar-line');

				progressBar.each(function(){
					var $self = $(this);
					var percentage = $self.data('percentage');
					$self.width(0).animate({width: percentage+'%'}, 1500, 'easeInOutSine');
					$self.find('.progress-percent').fadeIn(300);
				});
				
			}
			
			$this.one('inview', function(event, visible){
		    	if (visible) {
		    		setTimeout(function(){
		    			progressBar();
		    		},200)
		    	};
		    });
				
		});

	})(jQuery);

/*  CIRLCE PROGRESS
/*====================================================================*/
	
	(function($){

		var html = $('html');

		$('.progress-container').each(function(){

			var $self = $(this);
			var circleP = $self.find(".circle-counter-wrap");

			function circleProgress(){

				circleP.each(function(){

					var $this      = $(this).animate({'opacity':'1'}, 300),
						child      = $this.find('.circle-counter'),
						parent     = $this.parent(),
						trackColor = child.data('track'),
						barColor   = child.data('bar'),
						percent    = child.data('percent'),
						lineWidth  = 20,
						size = 212;

					child.easyPieChart({
						barColor: barColor,
						trackColor: (typeof trackColor == "undefined") ? (html.hasClass('dark-skin')) ? "#444444" : "#eeeeee" : trackColor,
						lineCap:'round',
						lineWidth:lineWidth,
						size:size,
						animate:'1500',
						scaleColor: false
					});

				});

			}

			$self.one('inview', function(event, visible){
		    	if (visible) {
		    		setTimeout(function(){
		    			circleProgress();
		    		},200);
		    	};
		    });

		});

	})(jQuery);

/*  COUNTERS
/*====================================================================*/
	
	(function($){

		$('.counter-container').each(function(){

			var $self = $(this);

			function gvcCounter(){
				$self.find('.counter').each(function(){

					var $this = $(this),
						value = $this.data('value');
					$this.find('.counter-value').fromTo({from: 0, to: value, speed: 1100});
				})
			}

			$self.one('inview', function(event, visible){
		    	if (visible) {
		    		setTimeout(function(){
		    			gvcCounter();
		    		}, 200)
		    	};
		    });

		});

		

	})(jQuery);

/*  ICON PROGRESS BAR
/*====================================================================*/
	
	(function($){

		$('.i-progress-bar').each(function(){

			var $this = $(this);
			var dataColor = $this.data('color');
			var dataActive = $this.data('active');
			var icons = $this.find('.fa');
			var i = 0;

			$this.one('inview', function(event, visible){
		    	if (visible) {
		    		function animation() {
						$(icons[i]).css({color:dataColor});
						i++;
						if (i == dataActive) {clearInterval(timer);}
					}

					var timer = setInterval(animation, 125); 
		    	};
		    });
		})

	})(jQuery);

/*  TABS
/*====================================================================*/
	
	(function($){

		$('.tabs').each(function(){

			var $this = $(this),
				tabs = $this.find('.tab'),
				tabsQ = tabs.length,
				tabsContent = $this.find('.tab-content'),
				tabSet = $this.find('.tabset'),
				tabsDefaultWidth  = 0,
				tabsDefaultHeight = 0;

				if(!tabs.hasClass('active')){
					tabs.first().addClass('active');
				}
				
				tabs.each(function(){
					tabsDefaultWidth += $(this).outerWidth();
					tabsDefaultHeight += $(this).outerHeight();
				});

				function OverflowCorrection(){

					if(tabsDefaultWidth >= $this.outerWidth()  && $this.hasClass('horizontal')){
						$this.addClass('tab-full');
					} else {
						$this.removeClass('tab-full');
					}

				}

				if(tabsQ >= 2){

					tabs.on('click', function(){
						$self = $(this);

						if(!$self.hasClass("active")){

							$self.addClass("active").siblings().removeClass("active");
							tabsContent.hide();
							tabsContent.eq($self.index()).fadeIn();
						}
						
					});
				}

				if($this.hasClass('vertical')){
					$this.find('.tabs-container').css("min-height",tabsDefaultHeight + (tabs.length - 1));
				}

				OverflowCorrection();

				$(window).resize(OverflowCorrection);			

		});

	})(jQuery);

	(function($){

		$('.wpb_tabs').each(function(){

			var $this = $(this),
				tabs = $this.find('.wpb_tabs_nav li'),
				tabsQ = tabs.length,
				tabSet = $this.find('.wpb_tabs_nav'),
				tabsDefaultWidth  = 0,
				tabsDefaultHeight = 0,
				tabsContent = $this.find('.wpb_tab');

				$this.find('.wpb_tab').wrapAll('<div class="tabs-container"/>');

				if(!tabs.hasClass('active')){
					tabs.first().addClass('active');
				}

				tabs.find('a').on('click',function(e){
					e.preventDefault();
				});
				
				tabs.each(function(){
					tabsDefaultWidth += $(this).outerWidth();
					tabsDefaultHeight += $(this).outerHeight();
				});

				function OverflowCorrection(){

					if(tabsDefaultWidth >= $this.outerWidth()){
						$this.addClass('tab-full');
					} else {
						$this.removeClass('tab-full');
					}

				}

				if(tabsQ >= 2){

					tabs.on('click', function(){
						$self = $(this);

						if(!$self.hasClass("active")){

							$self.addClass("active").siblings().removeClass("active");
							tabsContent.hide();
							tabsContent.eq($self.index()).fadeIn();
						}
						
					});
				}

				OverflowCorrection();

				$(window).resize(OverflowCorrection);			

		});

	})(jQuery);

/*  ACCORDION
/*====================================================================*/
	
	(function($){

		$('.accordion').each(function(){
			var $this = $(this),
				title = $this.find('.toggle-title'),
				content =  $this.find('.toggle-content');

				if($this.hasClass('collapsible-yes')){
					$this.find('.active:not(:first)').removeClass("active");
				}

				content.hide();

				$this.find('.toggle-title.active').next().show();
				$this.find('.toggle-title.active .arrow').text('-');

				title.on('click', function(){

					$self = $(this);
					$selfContent = $self.next();
			
					if($this.hasClass('collapsible-yes')){

						if(!$self.hasClass('active')){

							$self.addClass("active").siblings().removeClass("active");
							content.slideUp(150);
							$selfContent.slideDown(150);

							$self.find('.arrow').text('-');

							$self.siblings().find('.arrow').text('+');
						}

					} else {

						if(!$self.hasClass('active')){

							$self.addClass("active");
							$selfContent.stop().slideDown(150);
							$self.find('.arrow').text('-');

						} else {

							$self.removeClass("active");
							$selfContent.stop().slideUp(150);
							$self.find('.arrow').text('+');

						}

					}

				});

		});

	})(jQuery);

/*  SHOW/HIDE
/*====================================================================*/
	
	(function($){

		$('.show_hide').each(function(){

			var $this = $(this),
				button = $this.children('.button'),
				toggle = $this.find('.show_hide_content');

			if($this.hasClass('lightbox-yes') && Modernizr.mq("only screen and (min-width: 1024px)")){

				button
				.attr('href','#' + toggle.attr('id'));

				button.colorbox({
					inline:true, maxWidth:"60%"
				})
				
			} else {
				button.first().on('click', function(event){
					event.preventDefault();
					toggle.first().slideToggle(150);
				});
			}

		});

	})(jQuery);

/* CONTENT BOXES
/*====================================================================*/
	
	(function($){

		$('.js .content-box.animate-yes').each(function(){

			var $this = $(this);
			var boxes = $this.find('.box');
			var i = 0;

			$this.one('inview', function(event, visible){
				if (visible) {
					function animation() {
						$(boxes[i]).addClass('animated');
						i++;
						if (i == boxes.length) {clearInterval(timer);}
					}
			    	var timer = setInterval(animation, 200);
				};
		    });

		});

	})(jQuery);

/* PERSONS
/*====================================================================*/
	
	(function($){

		$('.js .persons-container').each(function(){

			var $this = $(this);
			var persons = $this.find('.person');
			var i = 0;

			$this.one('inview', function(event, visible){
				if (visible) {
					function animation() {
						$(persons[i]).addClass('animated');
						i++;
						if (i == persons.length) {clearInterval(timer);}
					}
			    	var timer = setInterval(animation, 200);
				};
		    });

		});

	})(jQuery);

/* RECENT PORTFOLIO
/*====================================================================*/
	
	(function($){

		$('.js .recent-portfolio').each(function(){

			var $this = $(this);
			var projects = $this.find('.post');
			var i = 0;


			$this.one('inview', function(event, visible){
				if (visible) {
					function animation() {
						$(projects[i]).addClass('animated');
						i++;
						if (i == projects.length) {clearInterval(timer);}
					}
			    	var timer = setInterval(animation, 200);
				};
		    });

		    
		});

	})(jQuery);

/*  PARALLAX
/*====================================================================*/

	(function($){

		if(Modernizr.mq("only screen and (min-width: 1024px)")){

	    	var $window = $(window);

			$('*[data-parallax="yes"]').each(function(){
				var $this = $(this);
				$(window).scroll(function() {
					var yPos   = -($window.scrollTop() / 2); 
					var coords = '50% '+ yPos + 'px';
					$this.css({ backgroundPosition: coords });    
				});
			});

			$('.parallax-yes').each(function(){

				var $this = $(this);
				var offset = $this.offset();

			    $(window).scroll(function() {
					var yPos   = -(($window.scrollTop()-offset.top) / 2); 
					var coords = '50% '+ yPos + 'px';
					$this.css({ backgroundPosition: coords });    
				}); 
			})

		}

		

	})(jQuery);

/*  EXTERNAL PLUGINS
/*====================================================================*/
	
	(function($){

	    /*  gvc SLIDER
	    /*----------------------------------------------------------------*/

	    	var gvcSlider = $('#gvc-slider');

	    		if (gvcSlider.hasClass('preview')) {
	    			gvcSlider.gvcSliderPreview();
	    		} else {
	    			gvcSlider.gvcSlider();
	    		}

	    /*  FLEXSLIDER
	    /*----------------------------------------------------------------*/

	    	flexslider = $('.flexslider');
	    	flexsliderWithControls = $('.flexslider.control-nav-enabled');

    		flexsliderWithControls.flexslider({
				animation: "fade",
				smoothHeight:false,
				touch: true,
				animationSpeed: 450,
				controlNav: true,
				slideshow: true,
				directionNav:false
			});


    		flexslider.imagesLoaded( function() {
	    		flexslider.flexslider({
					animation: "fade",
					smoothHeight:true,
					touch: true,
					animationSpeed: 450,
					controlNav: false,
					slideshow: false
				});
	    	});


	    /*  CAROUSEL
	    /*----------------------------------------------------------------*/

			$('.carousel-yes').not('.slider-section').each(function(){

				var $this = $(this);

				if ($this.hasClass('autoplay-yes')) {
					$this.ContentCarousel({
						autoplay:true
					});
				} else {
					$this.ContentCarousel();
				};
				
			});

			$('.slider-section').each(function(){
				
				var $this = $(this);

				if ($this.hasClass('autoplay-yes')) {
					$this.ContentCarousel({
						autoplay:true,
						sliderBullets:true
					});
				} else {
					$this.ContentCarousel({
						sliderBullets:true
					});
				};
				
			});

	    /*  LIGHTBOX
	    /*----------------------------------------------------------------*/

			if(Modernizr.mq("only screen and (min-width: 1024px)")){
				$("a.gvc-zoom, a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif'],a[href$='.svg']").each(function(){
					
					var $this = $(this);
					$this.attr('title',$this.children('img').attr('alt'));
					$this.colorbox({
						'maxWidth':'90%',
						'maxHeight':'90%'
					});
				});

				$('a.gvc-zoom.post-gallery-slideshow').each(function(){
					$(this).colorbox({
						'maxWidth':'90%',
						'maxHeight':'90%',
						'rel':'post-gallery-slideshow'
					});
				});
			}

	    /*  MASONRY
	    /*----------------------------------------------------------------*/

			var options = {
	          itemSelector:'.post',
	          singleMode:true,
	          gutter:24,
	          isFitWidth: true,
	          transitionDuration: '0.11s'
	        };

			var handler   = $('.recent-portfolio.v1, .recent-posts.v2');

			if (!handler.hasClass('grid_1')) {

				handler.imagesLoaded( function() {
				  	$.when(handler.masonry(options)).done(
						function(){
							handler.addClass('animated-layout');
						}
					)
				});

			};

			/*var wooOptions = {
	          itemSelector:'.product',
	          singleMode:true,
	          gutter:24,
	          isFitWidth: false,
	          transitionDuration: '0.11s'
	        };

	        var wooHandler   = $('.woocommerce .woocommerce-loop .products');

			wooHandler.imagesLoaded( function() {
			  	$.when(wooHandler.masonry(wooOptions)).done(
					function(){
						wooHandler.addClass('animated-layout');
						setTimeout(function(){
							$('.woocommerce-pagination').show();
						}, 300);
					}
				)
			});

			var wooShortcodesHandler = $('.woocommerce.columns-3 .products, .woocommerce.columns-4 .products');

			wooShortcodesHandler.imagesLoaded( function() {
			  	$.when(wooShortcodesHandler.masonry(wooOptions)).done(
					function(){
						wooShortcodesHandler.addClass('animated-layout');
					}
				)
			});*/


	    /*  UI-TO-TOP
	    /*----------------------------------------------------------------*/

			$().UItoTop({ easingType: 'easeOutQuart' });

		/*  SMOOTH SCROLL
	    /*----------------------------------------------------------------*/

	    if ($('html').hasClass('smooth-scroll-true')) {

	    	$.srSmoothscroll({
	    		step: 115,
		        speed: 400,
		        ease: "swing"
	    	});
	    	
	    };
		
		/* Ajax Login
		/*---------------------------------------------------------------*/
		// Show the login dialog box on click
		$('a#show_login').on('click', function(e){
			$('body').prepend('<div class="login_overlay"></div>');
			$('form#login').fadeIn(500);
			$('div.login_overlay, form#login a.close').on('click', function(){
				$('div.login_overlay').remove();
				$('form#login').hide();
			});
			e.preventDefault();
		});
	
		// Perform AJAX login on form submit
		$('form#login').on('submit', function(e){
			$('form#login p.status').show().text(ajax_login_object.loadingmessage);
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: ajax_login_object.ajaxurl,
				data: { 
					'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
					'username': $('form#login #username').val(), 
					'password': $('form#login #password').val(), 
					'security': $('form#login #security').val() },
				success: function(data){
					$('form#login p.status').text(data.message);
					if (data.loggedin == true){
						document.location.href = ajax_login_object.redirecturl;
					}
				}
			});
			e.preventDefault();
    });
	})(jQuery);