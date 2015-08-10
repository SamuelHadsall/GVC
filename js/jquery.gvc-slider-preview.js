;(function($, window, document, undefined) {
    
   
  	// DEFAULTS
   	var defaults = {
	};

    // CONSTRUCTOR FUNCTION
	function gvcSliderPreview (element, options){
		
		this.config = $.extend({}, defaults, options);
		this.element = element;
		this.init();
	}

	// METHOD
	gvcSliderPreview.prototype.init = function(){

		// Variables declaration
		// ====================================================

		var slider           = this.element,
			slidesContainer  = slider.find('.gvc-slides'),
			slide            = slidesContainer.children('li'),
			layer            = slide.find('.gvc-layer'),
			canvasWidth = slide.find('.slider-canvas').first().width(),
			sliderWidth = slider.outerWidth(),
			offsetArray = [canvasWidth, sliderWidth, Math.round((sliderWidth - canvasWidth)/2)];

			function LayerCoords(){

				layer.each(function(){

					var $this          = $(this),
					    $thisWidth     = $this.width(),
					    $thisHeight    = $this.height(),
						$thisDirection = $this.data('direction');

					switch ($thisDirection) {

						case 'left':
						case 'left_bottom':
						$this.css({'left': -(offsetArray[2]+$thisWidth) + "px"});
						break;

						case 'left_top':
						$this.css({'left': -($thisWidth)+"px", 'top': (-$thisHeight) + "px"});
						break;

						case 'right_top':
						$this.css({'left': offsetArray[1] + "px", 'top': -($thisHeight) + "px"});
						break;

						case 'top':
						$this.css({'top': -($thisHeight) + "px"});
						break;

						case 'right':
						case 'right_bottom':
						$this.css({'left': offsetArray[1] + "px"});
						break;
					}

				});
			}

			imagesLoaded( slider, function() {

				$.when(LayerCoords()).done(

					function(){

						setTimeout(function(){

							slide.addClass('active').addClass('animate-in');

							slider.next("#gvc-slider-preview-panel").find("#animate-out").on("click", function(e){
								e.preventDefault();
								if (slide.hasClass("animate-out")) {
									return
								};
								slide.removeClass("animate-in").addClass("animate-out").removeClass("active");
							});

							slider.next("#gvc-slider-preview-panel").find("#animate-in").on("click", function(e){
								e.preventDefault();
								if (slide.hasClass("animate-in")) {
									return
								};
								slide.removeClass("animate-out").addClass("active").addClass("animate-in");
							});
							
						}, 500);

					}
				)

			});

	}

	// EXTENDING NEW FUNCTION
		
	$.fn.gvcSliderPreview = function(options){
	
		new gvcSliderPreview(this, options);
		return this;
	};
	
} (jQuery, window, document));
