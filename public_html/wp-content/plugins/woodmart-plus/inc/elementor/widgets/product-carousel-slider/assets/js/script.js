

(function($){

    
    function swiperSliderStrart(element)
    {
        var $on = '';
        let $pagination;
        
        var sliderSelector = element,
            defaultOptions = {
                spaceBetween: 20,
                on: $on ? $on : false,
                observer: true,
                pagination : $pagination ? $pagination : '',
            };
    
    
        var nSlider = document.querySelectorAll(sliderSelector);
            
        [].forEach.call(nSlider, function( slider, index, arr )
        {
            var data = slider.getAttribute('data-swiper') || {};
    
            // Object.keys(data).length
            if ( Object.keys(data).length )
            {
                var dataOptions = JSON.parse(data);
            }
            
            slider.options = Object.assign({}, defaultOptions, dataOptions);
    
            var swiper = new Swiper(slider, slider.options);
            swiper.update();
        });
    }
    
    swiperSliderStrart(".slider-swiper-carousel");

    $(window).on("elementor/frontend/init", function() {
        elementorFrontend.hooks.addAction( "frontend/element_ready/general_product_carousel_slider.default",function( $scope ){
            
            if( elementorFrontend.isEditMode() && $scope.find('.slider-swiper-carousel').length ){
                swiperSliderStrart(".slider-swiper-carousel");
            }

            $('.wdplus-timer').each(function() {
                var $this = $(this);
                dayjs.extend(window.dayjs_plugin_utc);
                dayjs.extend(window.dayjs_plugin_timezone);
                var time = dayjs.tz($this.data('end-date'), $this.data('timezone'));
                $this.countdown(time.toDate(), function(event) {
                    if ( 'yes' === $this.data('hide-on-finish') && 'finish' === event.type ) {
                        $this.parent().addClass('wd-hide');
                    }
                    if( $this.hasClass('product_timer') )
                    {
                        $this.html(event.strftime(''
                        + '<div class="product_timer__item"><p class="time">%S</p><p class="desc">' + woodmart_settings.countdown_sec + '</p></div>'
                        + '<div class="product_timer__item"><p class="time">%M</p><p class="desc">' + woodmart_settings.countdown_mins + '</p></div>'
                        + '<div class="product_timer__item"><p class="time">%H</p><p class="desc">' + woodmart_settings.countdown_hours + '</p></div>'
                        + '<div class="product_timer__item"><p class="time">%-D</p><p class="desc">' + woodmart_settings.countdown_days + '</p></div>'
                        )); 
                    }
                    
                });
            });
            
        });
    });

})( jQuery );