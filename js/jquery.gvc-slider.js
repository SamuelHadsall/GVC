/*
 GVC Slider 1.0.0
 http://www.gvc.com
 Copyright 2014 GVC Team
*/

;(function($, window, document, undefined) {
    
   
  	// DEFAULTS
   	var defaults = {
	};

    // CONSTRUCTOR FUNCTION
	function gvcSlider (element, options){
		
		this.config = $.extend({}, defaults, options);
		this.element = element;
		this.init();
	}

	// METHOD
	gvcSlider.prototype.init = function(){

		// Variables declaration
		// ====================================================

		var slider           = this.element,
			layout           = slider.data('layout'),
			slidesContainer  = slider.find('.gvc-slides'),
			slide            = slidesContainer.children('li'),
			totalSlides      = slide.length,
			layer            = slide.find('.gvc-layer'),
			responsiveValues = "",
			active           = 0;

		// Options
		// ====================================================

			var optAutoplay      = slider.data('autoplay'),
				optAutoplaydelay = slider.data('autoplaydelay'),
				optBullets       = slider.data('bullets');
				optMobile        = slider.data('mobile');

		// Functions
		// ====================================================

			function OffsetValues(){
				var canvasWidth = slide.find('.slider-canvas').first().width(),
					sliderWidth = slider.outerWidth(),
					offsetArray = [canvasWidth, sliderWidth, Math.round((sliderWidth - canvasWidth)/2)];
				return offsetArray;
			}

			function LayerCoords(){

				layer.each(function(){

					var $this          = $(this),
					    $thisWidth     = $this.width(),
					    $thisHeight    = $this.height(),
						$thisDirection = $this.data('direction');

					$.when(function(){

						if (Modernizr.mq("only screen and (min-width: 1280px)")) {
							
							$thisWidth     = $this.width();
							$thisHeight    = $this.height();

						} else

						if (Modernizr.mq("only screen and (min-width: 1024px)")) {
							
							$thisWidth  = (Math.round($this.width()*0.8));
							$thisHeight = (Math.round($this.height()*0.8));

						} else

						if (Modernizr.mq("only screen and (min-width: 768px)")) {

							$thisWidth  = (Math.round($this.width()*0.6));
							$thisHeight = (Math.round($this.height()*0.6));

						}

						if (optMobile == true) {

							if (Modernizr.mq("only screen and (min-width: 480px)")) {
								
								$thisWidth  = (Math.round($this.width()*0.32));
								$thisHeight = (Math.round($this.height()*0.32));

							} else

							if (Modernizr.mq("only screen and (min-width: 320px)")) {
							
								$thisWidth  = (Math.round($this.width()*0.235));
								$thisHeight = (Math.round($this.height()*0.235));

							}
							
						};

					}).done(function(){

						switch ($thisDirection) {

							case 'left':
							case 'left_bottom':
							$this.css({'left': -(responsiveValues[2]+$thisWidth) + "px"});
							break;

							case 'left_top':
							$this.css({'left': -(responsiveValues[2]+$thisWidth)+"px", 'top': (-$thisHeight) + "px"});
							break;

							case 'right_top':
							$this.css({'left': (layout == "boxed") ? responsiveValues[1] - responsiveValues[2] : responsiveValues[1] + "px", 'top': -($thisHeight) + "px"});
							break;

							case 'top':
							$this.css({'top': -($thisHeight) + "px"});
							break;

							case 'right':
							case 'right_bottom':
							$this.css({'left': (layout == "boxed") ? responsiveValues[1] - responsiveValues[2] : responsiveValues[1] + "px"});
							break;
						}

					});

				});
			}

			function Navigate(direction){

				slide.first().removeClass('first-active');

				active += ~~(direction === 'next') || -1;
				active = (active < 0) ? totalSlides -1 : active % totalSlides;

				if(direction === 'next'){

					if (active == 0) {

						// We are at the last slide right now
						slide.eq(totalSlides-1)
						.removeClass("animate-in")
						.addClass("navOutNext")
						.removeClass("navInNext")
						.removeClass("navInPrev")
						.removeClass("navOutPrev")
						.addClass("animate-out")
						.removeClass("active");

						slide.eq(active)
						.removeClass("animate-out")
						.addClass("navInNext")
						.removeClass("navOutNext")
						.removeClass("navInPrev")
						.removeClass("navOutPrev")
						.addClass("active")
						.addClass("animate-in");
						
					} else {

						slide.eq(active-1)
						.removeClass("animate-in")
						.addClass("navOutNext")
						.removeClass("navInNext")
						.removeClass("navInPrev")
						.removeClass("navOutPrev")
						.addClass("animate-out")
						.removeClass("active");

						slide.eq(active)
						.removeClass("animate-out")
						.addClass("navInNext")
						.removeClass("navOutNext")
						.removeClass("navInPrev")
						.removeClass("navOutPrev")
						.addClass("active")
						.addClass("animate-in");

					}
					
				} else {

					if (active == totalSlides - 1) {
						// We are at the first slide right now
						slide.eq(0)
						.removeClass("animate-in")
						.addClass("navOutPrev")
						.removeClass("navInPrev")
						.removeClass("navInNext")
						.removeClass("navOutNext")
						.addClass("animate-out")
						.removeClass("active");

						slide.eq(active)
						.removeClass("animate-out")
						.addClass("navInPrev")
						.removeClass("navOutPrev")
						.removeClass("navInNext")
						.removeClass("navOutNext")
						.addClass("active")
						.addClass("animate-in");

					} else {

						slide.eq(active+1)
						.removeClass("animate-in")
						.addClass("navOutPrev")
						.removeClass("navInPrev")
						.removeClass("navInNext")
						.removeClass("navOutNext")
						.addClass("animate-out")
						.removeClass("active");

						slide.eq(active)
						.removeClass("animate-out")
						.addClass("navInPrev")
						.removeClass("navOutPrev")
						.removeClass("navInNext")
						.removeClass("navOutNext")
						.addClass("active")
						.addClass("animate-in");

					}
					
				}

				return active;
			}

			function BulletsNavigation(bulletArray, condition){
				
				if (condition) {$(bulletArray[active]).addClass('current-bullet').siblings().removeClass('current-bullet');};
			}

			function PlayVideo(activeSlide, target){
				var video = target.eq(activeSlide).children('video');
				if (video.length) {
					video[0].play();
				};
			}


		imagesLoaded( slider, function() {

			responsiveValues = OffsetValues();

			$.when(LayerCoords()).done(

				function(){

					setTimeout(function(){

						slide.first().addClass('active').addClass('animate-in').addClass('first-active');

						PlayVideo(active, slide);

						if(totalSlides > 1){
							$('<span data-direction="prev" class="controls prev slider-nav">&nbsp;</span><span data-direction="next" class="controls next slider-nav">&nbsp;</span>').appendTo(slider);
						}

						if (optBullets == true) {

							if(totalSlides > 1){
								$("<div class='gvc-slider-bullets gvc-clearfix'></div>").appendTo(slider);
							}

							var bulletsContainer = slider.children('.gvc-slider-bullets');

							for (var i = 1; i <= totalSlides; i++) {
								$('<span>&nbsp;</span>').appendTo(bulletsContainer);
							};

							var bulletItems = bulletsContainer.find('span');
								bulletItems.first().addClass('current-bullet');
							
							bulletItems.on('click', function(){
								var $this = $(this);

								$this.addClass('current-bullet').siblings().removeClass('current-bullet');

								// Old slide
								slide.eq(active)
								.removeClass("animate-in")
								.addClass("navOutNext")
								.removeClass("navInNext")
								.removeClass("navInPrev")
								.removeClass("navOutPrev")
								.addClass("animate-out")
								.removeClass("active");
								
								active = $this.index();

								// Current slide
								slide.eq(active)
								.removeClass("animate-out")
								.addClass("navInNext")
								.removeClass("navOutNext")
								.removeClass("navInPrev")
								.removeClass("navOutPrev")
								.addClass("active")
								.addClass("animate-in");

								PlayVideo(active, slide);
								
							});

						};

						slider.find('.controls').on('click', function(){
							Navigate($(this).data('direction'));
							BulletsNavigation(bulletItems,optBullets);
							PlayVideo(active, slide);
						});

						if(totalSlides > 1){

							slider
							.on('swipeleft', function(){
								Navigate("next");
								BulletsNavigation(bulletItems,optBullets);
								PlayVideo(active, slide);
							})
							.on('swiperight', function(){
								Navigate("prev");
								BulletsNavigation(bulletItems,optBullets);
								PlayVideo(active, slide);
							});

						}

						if (optAutoplay == true) {

							if(totalSlides > 1){

								var AutoplayStart = window.setInterval(function(){slider.find('.controls.next').trigger('click');}, optAutoplaydelay);
								
								
								slider
								.mouseover(function(){
								    window.clearInterval(AutoplayStart);
								})
								.mouseout(function(){
									AutoplayStart = window.setInterval(function(){slider.find('.controls.next').trigger('click');}, optAutoplaydelay);
								})

								if (slider.is(':hover')) {
									window.clearInterval(AutoplayStart);
								};

							}

						};

					}, 2000);

				}
			)

		});

		$(window).resize(function(){
			responsiveValues = OffsetValues();
			LayerCoords();

			slide.eq(active).removeClass("active");

			setTimeout(function(){

				slide.eq(active).addClass("active");

			}, 500);

		});

	}

	// EXTENDING NEW FUNCTION
		
	$.fn.gvcSlider = function(options){
	
		new gvcSlider(this, options);
		return this;
	};
	
} (jQuery, window, document));
