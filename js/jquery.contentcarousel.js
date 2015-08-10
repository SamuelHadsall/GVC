/*
 Content Carousel 1.0.0
 http://www.gvc.com
 Copyright 2014 gvc Team
*/

;(function($, window, document, undefined) {
    
   
  	// DEFAULTS
   	var defaults = {
   		caItemClass    : 'ca-item',
   		caWrapperClass : 'ca-wrapper',
   		caNavClass     : 'ca-controls',
   		caBulletsClass : 'ca-bullets',
		sliderSpeed	   : 450,
		sliderEasing   : 'easeOutCubic',
		sliderBullets  : false,
		correction     : 0.002,
		autoplay       : false
	};

    // CONSTRUCTOR FUNCTION
	function ContentCarousel (element, options){
		
		this.config = $.extend({}, defaults, options);
		this.element = element;
		this.init();
	}

	// METHOD
	ContentCarousel.prototype.init = function(){
		var caContainer = this.element,
			caControls = caContainer.find('.'+ this.config.caNavClass),
			caBullets = caContainer.find('.'+ this.config.caBulletsClass),
			caWrapper = caContainer.find('.'+ this.config.caWrapperClass),
			caItem = caContainer.find('.'+ this.config.caItemClass),
			speed = this.config.sliderSpeed,
			easing = this.config.sliderEasing,
			bullets = this.config.sliderBullets,
			autoplay = this.config.autoplay,
			caItemW = '',
			fm = 0,
			correction  = this.config.correction,
			totalCaItem = caItem.length,
			pos = 0,
			columns = 1;

			function responsiveColumn(){

				if(Modernizr.mq("only screen and (max-width: 767px)")){
					columns = 1;
				} else {
					columns = 
					caWrapper.hasClass('columns-1') ? 1 : 
					caWrapper.hasClass('columns-2') ? 2 : 
					caWrapper.hasClass('columns-3') ? 3 : 
					caWrapper.hasClass('columns-4') ? (Modernizr.mq("only screen and (max-width: 1023px)")) ? 2 : 4 :
					caWrapper.hasClass('columns-5') ? 5 :
					caWrapper.hasClass('columns-6') ? (Modernizr.mq("only screen and (max-width: 1023px)")) ? 3 : 6 : 1;
				}

				return columns;
			}

			function responsiveMeasurement(){

				caItemW = Math.round(caItem.first().outerWidth());
				if(columns == 1){
					fm = caItemW;
				} else {
					fm = caItemW + Math.round(parseInt(caWrapper.width()*correction));
				}
				return fm;
			}

			function position(control){

				pos += ~~(control === "ca-nav-next") || -1;
				pos = (pos < 0) ? 0 : (pos > totalCaItem - columns) ? totalCaItem - columns : pos % totalCaItem;
				return pos;
			}

			function navigate($element){
				$element
				.stop()
				.animate({'margin-left'	: -fm * pos + 'px'}, speed, easing);
			}

			function smartNav(){
				if((columns === 1 && totalCaItem > 1) || (columns === 2 && totalCaItem > 2) || (columns === 3 && totalCaItem > 3) || (columns === 4 && totalCaItem > 4) || (columns === 5 && totalCaItem > 5) || (columns === 6 && totalCaItem > 6)){
					caControls.removeClass('hidden');
				} else {
					caControls.addClass('hidden');	
				}
			}

			function bulletsNavigation(bulletArray, condition){
				
				if (condition) {$(bulletArray[pos]).addClass('current-bullet').siblings().removeClass('current-bullet');};
			}

			responsiveColumn();
			responsiveMeasurement();
			smartNav();

			if (bullets === true) {

				if(columns === 1 && totalCaItem > 1){
					caBullets.removeClass('hidden');
				} else {
					caBullets.addClass('hidden');
				}

				var bulletsContainer = caBullets.children('.container');

				for (var i = 1; i <= caItem.length; i++) {
					$('<span>&nbsp;</span>').appendTo(bulletsContainer);
				};

				var bulletItems = bulletsContainer.find('span');
					bulletItems.first().addClass('current-bullet');
				
				bulletItems.on('click', function(){
					var $this = $(this);
					pos = $this.index();
					$this.addClass('current-bullet').siblings().removeClass('current-bullet');
					caWrapper.stop().animate({'margin-left'	: -fm * pos + 'px'}, speed, easing);
				});

			};


			caControls.find('span.ca-nav-prev').on('click', function( event ) {
				position($(this).attr('class'));
				navigate(caWrapper);
				bulletsNavigation(bulletItems,bullets);
			});
			caControls.find('span.ca-nav-next').on('click', function( event ) {
				position($(this).attr('class'));
				navigate(caWrapper);
				bulletsNavigation(bulletItems,bullets);
			});


			var control = '';
			caWrapper
			.on('swipeleft', function(){
				control = 'ca-nav-next';
				position(control);
				navigate($(this));
				bulletsNavigation(bulletItems,bullets);
			})
			.on('swiperight', function(){
				control = 'ca-nav-prev';
				position(control);
				navigate($(this));
				bulletsNavigation(bulletItems,bullets);
			})

			if (autoplay == true) {

				if(totalCaItem > 1){

					var Autoplay;

					function autoPlayIntervalStart(){

						Autoplay = window.setInterval(function(){
							var autoplayStatus = false;

							if (autoplayStatus == false) {
								caControls.find('span.ca-nav-next').trigger('click');
								autoplayStatus = true;
							};

							if (pos == (totalCaItem - columns)) {
								navigate(caWrapper);
								pos = -1;
								autoplayStatus = false;
							};
						}, 3000);
						
					}

					function autoPlayIntervalStop(){
						window.clearInterval(Autoplay);
					}

					caContainer.hover(autoPlayIntervalStop,autoPlayIntervalStart);
					autoPlayIntervalStart();
					

				}

			};

			$(window).resize(function(){
				responsiveColumn();
				responsiveMeasurement();
				smartNav();

				if(pos != 0){pos = 0;}
				navigate(caWrapper);
				bulletsNavigation(bulletItems,bullets);
			});

	}

	// EXTENDING NEW FUNCTION
		
	$.fn.ContentCarousel = function(options){
	
		new ContentCarousel(this, options);
		return this;
	};
	
} (jQuery, window, document));
