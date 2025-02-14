(function ($){

const box_timer__mains = document.querySelectorAll(
    ".suggestion_product_timer__main"
);
if (box_timer__mains.length > 0) {
    box_timer__mains.forEach((box) => {
        const circle = box.querySelector(".circle_timer");
        const container = box.querySelector(".suggestion_product_timer__container");
        const percent = parseFloat(box.dataset.percent || 0);

        container.style.setProperty("--before-visible", "visible");
        container.style.setProperty("--after-visible", "hidden");
        if (percent >= 0 && percent <= 100) {
        if (percent <= 25) {
            container.style.setProperty("--before-width", `${percent * 4}%`);
            container.style.setProperty("--before-visible", "visible");
            circle.style.top = "-3px";
            circle.style.left = `calc(${percent * 4}% - 4px)`;
        } else if (percent > 25 && percent <= 50) {
            const leftOverPercent = percent - 25;
            container.style.setProperty("--before-width", `100%`);
            container.style.setProperty(
            "--before-height",
            `${leftOverPercent * 4}%`
            );
            container.style.setProperty("--before-visible", "visible");
            circle.style.top = `calc(${leftOverPercent * 4}% - 4px)`;
            circle.style.left = `calc(100% - 12px)`;
        } else if (percent > 50 && percent <= 75) {
            const leftOverPercent = percent - 50;
            container.style.setProperty("--before-width", `100%`);
            container.style.setProperty("--before-height", `100%`);
            container.style.setProperty("--after-width", `${leftOverPercent * 4}%`);
            container.style.setProperty("--before-visible", "visible");
            container.style.setProperty("--after-visible", "visible");
            circle.style.top = `calc(100% - 12px)`;
            circle.style.left = `calc((100% - ${leftOverPercent * 4}%) - 4px)`;
        } else {
            const leftOverPercent = percent - 75;
            container.style.setProperty("--before-width", `100%`);
            container.style.setProperty("--before-height", `100%`);
            container.style.setProperty("--after-width", `100%`);
            container.style.setProperty(
            "--after-height",
            `${leftOverPercent * 4}%`
            );
            container.style.setProperty("--before-visible", "visible");
            container.style.setProperty("--after-visible", "visible");
            circle.style.left = `-3px`;
            circle.style.top = `calc((100% - ${leftOverPercent * 4}%) - 4px)`;
        }
        }
    });
}
$(document).ready(function () {
    $('.button-prev').on('mouseenter', function () {
        $('.swiper-button-prev.swiper-button-prev1').css('background-color', '#f3f3f3');
    });

    $('.button-prev').on('mouseleave', function () {
        $('.swiper-button-prev.swiper-button-prev1').css('background-color', '');
    });
    $('.button-next').on('mouseenter', function () {
        $('.swiper-button-next.swiper-button-next1').css('background-color', '#f3f3f3');
    });

    $('.button-next').on('mouseleave', function () {
        $('.swiper-button-next.swiper-button-next1').css('background-color', '');
    });
});

function init_awesome_sliders1(selector)
{
    var mainSwiper = [];
    var thumbSwiper = [];
    
    $(selector).each(function(index) {

        var $this = $(this);
        var classes = $this.attr('class').split(' ');
        
        var sliderType = "";
    
        for (var i = 0; i < classes.length; i++) {

            if (classes[i].includes("main") || classes[i].includes("thumb")) {

                sliderType = classes[i];
                break;
            }
        }
        
        var btn_prev = "button_main__prev_1" + index ;
        var btn_next = "button_main__next_1" + index ;


        $(this).parent().parent().find('.button_main__prev_1').addClass(btn_prev);
        $(this).parent().parent().find('.button_main__next_1').addClass(btn_next);


        var btn_prev_thumb = 'button_thumb__prev_1' + index;
        var btn_next_thumb = 'button_thumb__next_1' + index;

        $(this).parent().find('.button_thumb__prev_1').addClass(btn_prev_thumb);
        $(this).parent().find('.button_thumb__next_1').addClass(btn_next_thumb);
        
        var uniqueClass = "awesome_" + sliderType + "_slider_" + (index + 1);

        $this.addClass(uniqueClass);

        var $autoplay = false;

        if( $(this).data('amazing_auto_play') > 0 )
        {
            var $autoplay_delay = $(this).data('amazing_auto_play');
            $autoplay = {
                delay : $autoplay_delay
            };
        }
        
        var swiperOptions = {
            slidesPerView: sliderType.includes("main") ? 1 : 7,
            allowTouchMove: sliderType.includes("main") ? false : true,
            effect: sliderType.includes("main") ? 'fade' : 'slide',
            spaceBetween: sliderType.includes("main") ? 0 : 10,
            centeredSlides: sliderType.includes("main") ? false : true,
            autoplay :  $autoplay ,
            navigation: sliderType.includes("main") ? {

                prevEl : '.'+btn_prev,
                nextEl : '.'+btn_next
            }: {
                prevEl : '.'+btn_prev_thumb,
                nextEl : '.'+btn_next_thumb
            },
        };
        var swiperInstance = new Swiper("." + uniqueClass, swiperOptions);
        if (sliderType.includes("main")) {

            mainSwiper.push(swiperInstance);

        } else if (sliderType.includes("thumb")) {

            thumbSwiper.push(swiperInstance);
        }

    });

    if (mainSwiper && thumbSwiper) {


        thumbSwiper.forEach(function(index,value){
            mainSwiper.forEach(function(i,v){
                if(v == value)
                {
                    i.on('slideChange',function(e){
                        index.slideTo(i.activeIndex);
                    });
                    index.thumbs.swiper = i;
                }
            })
        })

    }
}

function init_awesome_slider2(selector)
{
    var mainSwiper = [];
    var thumbSwiper = [];

    $(".awesome_main_slider_2, .awesome_thumb_slider_2").each(function(index) {
        
        var $this = $(this);

        var classes = $this.attr('class').split(' ');
        var sliderType = "";
    
        for (var i = 0; i < classes.length; i++) {
            

            if (classes[i].includes("main") || classes[i].includes("thumb")) {

                sliderType = classes[i]+'_2';
                break;
            }
        }
        

        var btn_prev = "button_main__prev_2" + index ;
        var btn_next = "button_main__next_2" + index ;


        $(this).parent().parent().find('.button_main__prev_2').addClass(btn_prev);
        $(this).parent().parent().find('.button_main__next_2').addClass(btn_next);


        var btn_prev_thumb = 'button_thumb__prev_2' + index;
        var btn_next_thumb = 'button_thumb__next_2' + index;
        
        $(this).parent().find('.button_thumb__prev_2').addClass(btn_prev_thumb);
        $(this).parent().find('.button_thumb__next_2').addClass(btn_next_thumb);
        
        var uniqueClass = "awesome_" + sliderType + "_slider_" + (index + 1);
        $this.addClass(uniqueClass);

        var $autoplay = false;
        
        if( $(this).data('amazing_auto_play') > 0 )
        {
            var $autoplay_delay = $(this).data('amazing_auto_play');
            $autoplay = {
                delay : $autoplay_delay
            };
        }

        var swiperOptions = {
            slidesPerView: sliderType.includes("main") ? 1 : 4,
            direction: sliderType.includes("main") ? 'horizontal' : 'vertical',
            autoHeight: sliderType.includes("main") ? '' : true,
            allowTouchMove: sliderType.includes("main") ? false : true,
            effect: sliderType.includes("main") ? 'fade' : 'slide',
            spaceBetween: sliderType.includes("main") ? 0 : 10,
            centeredSlides: sliderType.includes("main") ? false : true,
            autoplay :  $autoplay ,
            navigation: sliderType.includes("main") ? {

                prevEl : '.'+btn_prev,
                nextEl : '.'+btn_next
            }: {
                prevEl : '.'+btn_prev_thumb,
                nextEl : '.'+btn_next_thumb
            },
        };
        var swiperInstance = new Swiper("." + uniqueClass, swiperOptions);
        if (sliderType.includes("main")) {

            mainSwiper.push(swiperInstance);

        } else if (sliderType.includes("thumb")) {

            thumbSwiper.push(swiperInstance);
        }

    });
    if (mainSwiper && thumbSwiper) {


        thumbSwiper.forEach(function(index,value){
            
            mainSwiper.forEach(function(i,v){

                if(v == value)
                {
                    i.on('slideChange',function(e){
                        index.slideTo(i.activeIndex);
                    });
                    index.thumbs.swiper = i;
                }
            })
        })

    }
}

init_awesome_sliders1(".awesome_main_slider_1, .awesome_thumb_slider_1");
init_awesome_slider2(".awesome_main_slider_2, .awesome_thumb_slider_2");


$(window).on("elementor/frontend/init", function() {

    elementorFrontend.hooks.addAction( "frontend/element_ready/woodplus_amazing_product_elementor.default",function( $scope ){

        if(  elementorFrontend.isEditMode() )
        {
            init_awesome_sliders1(".awesome_main_slider_1, .awesome_thumb_slider_1");
            init_awesome_slider2(".awesome_main_slider_2, .awesome_thumb_slider_2");
        }
        
        
        

        var count = 7;

        const swiper1 = new Swiper('.swiper1 .swiper', {
            direction: 'horizontal',
            speed: 800,
            rtl: true,
            loop: true,
            keyboard: true,
            effect: "fade",
            navigation: {
                nextEl: '.swiper-button-next1',
                prevEl: '.swiper-button-prev1',
            },
            on:{
                init: function(){
                    var nextIndex = (this.activeIndex + 1) % this.slides.length;
                    const nextSlide = this.slides[nextIndex];
                    var nexth4Element = $(nextSlide).find('h4');
                    var nextText = nexth4Element.text();
                
                    var prevIndex = (this.activeIndex - 1 + this.slides.length) % this.slides.length;
                    const prevSlide = this.slides[prevIndex];
                    var prevh4Element = $(prevSlide).find('h4');
                    var prevText = prevh4Element.text();
                
                
                    $('.swiper1').find('.product-name-left').text(prevText);
                    $('.swiper1').find('.product-name-rigth').text(nextText);
                }
            }

        });

        swiper1.on('slideChange', () => {
            var nextIndex = (swiper1.activeIndex + 1) % swiper1.slides.length;
            const nextSlide = swiper1.slides[nextIndex];
            var nexth4Element = $(nextSlide).find('h4');
            var nextText = nexth4Element.text();
            var prevIndex = (swiper1.activeIndex - 1 + swiper1.slides.length) % swiper1.slides.length;
            const prevSlide = swiper1.slides[prevIndex];
            var prevh4Element = $(prevSlide).find('h4');
            var prevText = prevh4Element.text();
        
        
            $('.swiper1').find('.product-name-left').text(prevText);
            $('.swiper1').find('.product-name-rigth').text(nextText);
        });
        
        
        const swiper2 = new Swiper('.swiper2', {
            direction: 'horizontal',
            speed: 500,
            loop: true,
            effect: "fade",
            rtl: true,
            navigation: {
                nextEl: '.swiper-button-next2',
                prevEl: '.swiper-button-prev2',
            },
            on:{
                init:function(){
                    
                    const activeSlider = this.slides[this.activeIndex];
                    var activeName = $(activeSlider).find('.slider-name-product').text();
                    $('.slider-name').empty().text(activeName);
                }
            }
        });
        
        swiper2.on('slideChange', () => {
            const activeSlider = swiper2.slides[swiper2.activeIndex];
            var activeName = $(activeSlider).find('.slider-name-product').text();
            $('.slider-name').text(activeName);
        })

        function updateCircle($element, value, maxValue) {
            var perimeter = 2 * Math.PI * 17.5; // محیط دایره
            var offset = perimeter * (1 - value / maxValue);
            $($element).css('stroke-dashoffset', offset);
        }

        if($scope.find('.el-layout-1').length  )
        {
            function decreaseCount() {
                if (count > 0) {
                    count--;
                } else {
                    count = 7;
                    swiper1.slideNext();
                    swiper2.slideNext();
                }
                $('.slider-count .timer-second-count p').text(count);
                updateCircle('.timer-second-count .foreground-circle', count, 7);
                $('.timer-second-mobile p').text(count);
                updateCircle('.timer-second-mobile .foreground-circle', count, 7);
            }
            setInterval(decreaseCount, 1000);
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
                    
                if( $this.hasClass('slider-timer') )
                {
                    $this.html(event.strftime(''
                        + '<div ><span class="slider-timer-days">%-D</span> <span>' + woodmart_settings.countdown_days + '</span></div>: '
                        + '<div ><span class="slider-timer-hours">%H</span> <span>' + woodmart_settings.countdown_hours + '</span></div>: '
                        + '<div ><span class="slider-timer-min">%M</span> <span>' + woodmart_settings.countdown_mins + '</span></div>: '
                        + '<div ><span class="slider-timer-second">%S</span> <span>' + woodmart_settings.countdown_sec + '</span></div>'));    
                }else if( $this.hasClass('amazing-slider-timer') )
                {

                    updateCircle($this.find('.timer-days .foreground-circle'), event.strftime('%-D'), 60);
                    updateCircle($this.find('.timer-hours .foreground-circle'), event.strftime('%H'), 24);
                    updateCircle($this.find('.timer-min .foreground-circle'), event.strftime('%M'), 60);
                    updateCircle($this.find('.timer-second .foreground-circle'), event.strftime('%S'), 60);

                    $this.find('.timer-days p:first-of-type').text(event.strftime('%-D'));
                    $this.find('.timer-hours p:first-of-type').text(event.strftime('%H'));
                    $this.find('.timer-min p:first-of-type').text(event.strftime('%M'));
                    $this.find('.timer-second p:first-of-type').text(event.strftime('%S'));

                }else if( $this.hasClass('slider-layout-2') )
                {
                    
                    $this.html(event.strftime(''
                        + '<p class="seconds">%S</p>'
                        + '<p>:</p>'
                        + '<p class="minute">%M</p>'
                        + '<p>:</p>'
                        + '<p class="hour">%H</p>'
                        + '<p>:</p>'
                        + '<p class="day">%-D</p>')); 
                }else if( $this.hasClass('mobile-layout-2') )
                {
                    
                    $this.html(event.strftime(''
                        + '<p class="timer_item seconds">%S</p>'
                        + '<p>:</p>'
                        + '<p class="timer_itemm inute">%M</p>'
                        + '<p>:</p>'
                        + '<p class="timer_item hour">%H</p>'
                        + '<p>:</p>'
                        + '<p class="timer_item day">%-D</p>')); 
                        
                }else if( $this.hasClass('product_timer') )
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


})(jQuery);
