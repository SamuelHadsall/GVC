( function($) {
    
    var custom_uploader;
    var upload  = $('.gvc-button-upload');
    var path    = $('.gvc-upload-path');
    var preview = $('.gvc-preview-upload');
    var remove  = $('.gvc-button-remove');

    upload.click(function(e) {
        e.preventDefault();

        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Upload background image',
            button: {
                text: 'Upload background image'
            },
            multiple: false
        });

        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            path.val(attachment.url);
            preview.attr('src',attachment.url);
        });

        custom_uploader.open();
    });

    remove.click(function(e){
        e.preventDefault();
        path.val("");
        preview.attr('src',"");
    });

})(jQuery);

(function($){

    // Accordion
    var accordionTitle = $('.gvc-accordion-container > .gvc-accordion-title');

        accordionTitle.on('click', function(){
            var $this      = $(this),
                index      = $('.gvc-ui').index(this),
                layerIndex = $('.gvc-hidden').eq(index);

            if(!$this.hasClass('active')){
                $this.addClass('active');
                $this.next('.gvc-accordion-content').slideUp(0, function(){
                    if($this.hasClass('gvc-ui')){
                        layerIndex.val('active');
                    }
                });
            } else if ($this.hasClass('active')){
                $this.removeClass('active');
                $this.next('.gvc-accordion-content').slideDown(0, function(){
                    if($this.hasClass('gvc-ui')){
                        layerIndex.val('');
                    }
                }); 
            }
        });

})(jQuery);

(function($){
    
    $('.gvc-color-picker').wpColorPicker();

    $('.delay, .duration').spinner({
        min:0,
        step: 50
    });
    $('.opacity').spinner({
        step: 0.1,
        min:0,
        max:1
    });
    $('.zindex').spinner({
        min:1,
        max:98
    });
})(jQuery);

( function($) {

    $('.gvc-slider-excrepts')
    .sortable({
        axis: 'y',
        placeholder: 'ui-state-highlight',
        forcePlaceholderSize: true,
        update: function(event, ui) {
            var theOrder = $(this).sortable('toArray');
            var data = {
                action: 'gvc_update_post_order',
                postType: $(this).attr('data-post-type'),
                order: theOrder
            };
            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: data,
                success: function(){
                    $(".gvc-success").show();
                },
                error: function(){
                    $(".gvc-error").show();
                }
            })
        }
    })
    .disableSelection();

})(jQuery);

( function($) {

    var gvcPostFormatOptions = $('#gvc-post-format-options');
    var postFormatInput         = $("#post-formats-select input.post-format");
    var featuredImages          = $('#postimagediv, #post-feature-image-2, #post-feature-image-3, #post-feature-image-4, #post-feature-image-5');
    var defaultFeaturedImage    = $('#postimagediv');
    var postFeatureMedia        = gvcPostFormatOptions.find('#gvc-post-featured-media');


    function switchPostFormatOptions(target){

        if (target.val() == 'chat' || target.val() == 'aside') {

            gvcPostFormatOptions.find('.gvc-post-option').hide();
            gvcPostFormatOptions.hide();
            featuredImages.hide();

        } else {

            gvcPostFormatOptions.show();
            var gvcPostOption = gvcPostFormatOptions.find('#gvc-'+target.attr("id")).show();

            if(target.val() == '0' || target.val() == 'audio' || target.val() == 'video' || target.val() == 'gallery'){
                postFeatureMedia.show();
            } else {
                postFeatureMedia.hide();
            }

            if(target.val() == '0' || target.val() == 'audio'){
                defaultFeaturedImage.show();
            } else if(target.val() == 'gallery'){
                featuredImages.show();
            } else {
                featuredImages.hide();
            }

            gvcPostFormatOptions.find('.gvc-post-option').not(gvcPostOption).hide();

        }

    }

    postFormatInput.each(function(){

        var $this = $(this);

        $this.on('click', function(){
            switchPostFormatOptions($this);
        });

        if($this.is(":checked")){
            switchPostFormatOptions($this);
        }

    });

})(jQuery);

( function($) {

    var gvcPortfolioFormatOptions = $('#gvc-portfolio-media-options');
    var portfolioMediaInput     = $(".select-featured-media-type input.portfolio-featured-media-option");
    var featuredImages          = $('#portfolio-feature-image-2, #portfolio-feature-image-3, #portfolio-feature-image-4, #portfolio-feature-image-5');
    var defaultFeaturedImage    = $('#postimagediv');
    var portfolioFeatureMedia   = gvcPortfolioFormatOptions.find('#gvc-portfolio-featured-media');

    function switchPOortfolioMediaOptions(target){

        var gvcPortfolioOption = gvcPortfolioFormatOptions.find('#gvc-'+target.attr("id")).show();

        if(target.val() == 'image' || target.val() == 'video' || target.val() == 'audio' ){
            defaultFeaturedImage.show();
            featuredImages.hide();
        } else if(target.val() == 'gallery'){
            defaultFeaturedImage.show();
            featuredImages.show();
        }

        gvcPortfolioFormatOptions.find('.gvc-portfolio-option').not(gvcPortfolioOption).hide();

    }

    portfolioMediaInput.each(function(){

        var $this = $(this);

        $this.on('click', function(){
            switchPOortfolioMediaOptions($this);
        });

        if($this.is(":checked")){
            switchPOortfolioMediaOptions($this);
        }

    });   

})(jQuery);

( function($) {

    var pageTemplate = $('#pageparentdiv #page_template');
    var pageOptions  = $('#gvc-page-options');

    pageTemplate.on("change", function(){
        if ($(this).val() == "page-blank.php") {
            pageOptions.find('.dynamic').hide();
            pageOptions.find('.sitemap-off').show();
        } else if($(this).val() == "page-sitemap.php"){
            pageOptions.find('.sitemap-off').hide();
            pageOptions.find('.dynamic').show();
        } else {
            pageOptions.find('.dynamic').show();
            pageOptions.find('.sitemap-off').show();
        }
    });

    if (pageTemplate.find('option:selected').val() == "page-blank.php") {
        pageOptions.find('.dynamic').hide();
         pageOptions.find('.sitemap-off').show();
    } else if(pageTemplate.find('option:selected').val() == "page-sitemap.php"){
        pageOptions.find('.sitemap-off').hide();
        pageOptions.find('.dynamic').show();
    } else {
        pageOptions.find('.dynamic').show();
        pageOptions.find('.sitemap-off').show();
    }

})(jQuery);
