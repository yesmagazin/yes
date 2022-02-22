/*
 * jQuery throttle / debounce - v1.1 - 3/7/2010
 */
(function(b,c){var $=b.jQuery||b.Cowboy||(b.Cowboy={}),a;$.throttle=a=function(e,f,j,i){var h,d=0;if(typeof f!=="boolean"){i=j;j=f;f=c}function g(){var o=this,m=+new Date()-d,n=arguments;function l(){d=+new Date();j.apply(o,n)}function k(){h=c}if(i&&!h){l()}h&&clearTimeout(h);if(i===c&&m>e){l()}else{if(f!==true){h=setTimeout(i?k:l,i===c?e-m:e)}}}if($.guid){g.guid=j.guid=j.guid||$.guid++}return g};$.debounce=function(d,e,f){return f===c?a(d,e,false):a(d,f,e!==false)}})(this);

var mobileMenu = {
    version : 1
};

function getURLVar(key) {
    var value = [];

    var query = document.location.search.split('?');

    if (query[1]) {
        var part = query[1].split('&');

        for (i = 0; i < part.length; i++) {
            var data = part[i].split('=');

            if (data[0] && data[1]) {
                value[data[0]] = data[1];
            }
        }

        if (value[key]) {
            return value[key];
        } else {
            return '';
        }
    }
}

function _setBrowser() {
    let userAgent = navigator.userAgent.toLowerCase();
    jQuery.browser = {
        version: (userAgent.match(/.+(?:rv|it|ra|ie|me|ve)[\/: ]([\d.]+)/) || [])[1],
        chrome: /chrome/.test(userAgent),
        safari: /webkit/.test(userAgent) && !/chrome/.test(userAgent),
        opera: /opera/.test(userAgent),
        firefox: /firefox/.test(userAgent),
        msie: /msie/.test(userAgent) && !/opera/.test(userAgent),
        mozilla: /mozilla/.test(userAgent) && !/(compatible|webkit)/.test(userAgent),
        gecko: /[^like]{4} gecko/.test(userAgent),
        presto: /presto/.test(userAgent),
        xoom: /xoom/.test(userAgent),
        android: /android/.test(userAgent),
        androidVersion: (userAgent.match(/.+(?:android)[\/: ]([\d.]+)/) || [0, 0])[1],
        iphone: /iphone|ipod/.test(userAgent),
        iphoneVersion: (userAgent.match(/.+(?:iphone\ os)[\/: ]([\d_]+)/) || [0, 0])[1].toString().split('_').join('.'),
        ipad: /ipad/.test(userAgent),
        ipadVersion: (userAgent.match(/.+(?:cpu\ os)[\/: ]([\d_]+)/) || [0, 0])[1].toString().split('_').join('.'),
        blackberry: /blackberry/.test(userAgent),
        winMobile: /Windows\ Phone/.test(userAgent),
        winMobileVersion: (userAgent.match(/.+(?:windows\ phone\ os)[\/: ]([\d_]+)/) || [0, 0])[1]
    };
}
// check if touch device
function isTouchDevice() {
    let prefixes = ' -webkit- -moz- -o- -ms- '.split(' ');
    let mq = function mq(query) {
        return window.matchMedia(query).matches;
    };

    if ('ontouchstart' in window || window.DocumentTouch && document instanceof DocumentTouch) {
        return true;
    }

    // include the 'heartz' as a way to have a non matching MQ to help terminate the join
    // https://git.io/vznFH
    let query = ['(', prefixes.join('touch-enabled),('), 'heartz', ')'].join('');
    return mq(query);
}

if (isTouchDevice()) {
    $('body').addClass('touch-device');
}

// lang
(function () {
    if (isTouchDevice()) {
        let lang = $('.js-lang'),
            head = lang.find('.js-lang-head'),
            drop = lang.find('.js-lang-drop');

        head.on('click', function (e) {
            e.stopPropagation();
            lang.toggleClass('open');
        });
        drop.on('click', function (e) {
            e.stopPropagation();
        });
        $(document).on('click', function () {
            lang.removeClass('open');
        });
    }
})();

// share
(function () {
    let btn = $('.js-share-btn'),
        social = $('.js-share-social');
    btn.on('click', function () {
        social.slideToggle();
    });
})();

// directory
(function () {
    let directory = $('.js-directory');
    if (!isTouchDevice()) {
        // directory.hover(function () {
        //     directory.addClass('show');
        //     $('.js-header-bg').addClass('show');
        //     $('#new-product-menu .top-level .item-link.active').removeClass('active');
        //     $('#new-product-menu .sub-level .top-item.active').removeClass('active');
        //     if (!$('#new-product-menu .top-level .top-item:first-child .item-link').hasClass('active')) {
        //         $('#new-product-menu .top-level .top-item:first-child .item-link').addClass('active');
        //     }
        //     if (!$('#new-product-menu .sub-level .top-item:first-child').hasClass('active')) {
        //         $('#new-product-menu .sub-level .top-item:first-child').addClass('active');
        //     }
        // }, function () {
        //     directory.removeClass('show');
        //     $('.js-header-bg').removeClass('show');
        // });
        directory.on( 'click', function(e) {
            if ( $( '.js-directuory-head' ).is( e.target ) ) {
                e.preventDefault();
            }
            
            if ( ! directory.hasClass( 'show' ) ) {
                directory.addClass('show');
                $('.js-header-bg').addClass('show');
                $('#new-product-menu .top-level .item-link.active').removeClass('active');
                $('#new-product-menu .sub-level .top-item.active').removeClass('active');
                if (!$('#new-product-menu .top-level .top-item:first-child .item-link').hasClass('active')) {
                    $('#new-product-menu .top-level .top-item:first-child .item-link').addClass('active');
                }
                if (!$('#new-product-menu .sub-level .top-item:first-child').hasClass('active')) {
                    $('#new-product-menu .sub-level .top-item:first-child').addClass('active');
                }
            } else {
                directory.removeClass('show');
                $('.js-header-bg').removeClass('show');
            }
        } )
        
        $(document).on( 'click', function(e) {
            if (!directory.is(e.target) && directory.has(e.target).length === 0)
            {
                directory.removeClass('show');
                $('.js-header-bg').removeClass('show');
            }
        } )
    }
    if (isTouchDevice()) {
        let head = $('.js-directuory-head'),
            body = $('.js-directuory-body'),
            bg = $('.js-header-bg');
        head.on('click', function () {
            head.toggleClass('active');
            body.toggleClass('show');
            bg.toggleClass('show');
        });
        bg.on('click', function () {
            head.removeClass('active');
            body.removeClass('show');
            bg.removeClass('show');
        });
    }
})();

function scrollElLeft(el){
    let $e = (typeof el == 'string') ? $(el)[0].getBoundingClientRect() : el[0].getBoundingClientRect();
    $(".options__nav").animate({scrollLeft:$e.left-($(document).width()-$e.width)/2}, 250);
}
// global variables
let prevArrow = '<button type="button" class="slick-prev"><svg class="icon icon-arrow-prev"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-prev"></use></svg></button>',
    nextArrow = '<button type="button" class="slick-next"><svg class="icon icon-arrow-next"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-next"></use></svg></button>';

// global variables 2
let leftArrow = '<button type="button" class="slick-prev"><svg class="icon icon-arrow-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-left"></use></svg></button>',
    rightArrow = '<button type="button" class="slick-next"><svg class="icon icon-arrow-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-right"></use></svg></button>';

$(document).ready(function () {

    _setBrowser();

/*
    var liveSearchInput =  $('#search').find('[name=search]').first(),
        liveSesrchResult =  $("#livesearch_search_results");

    liveSearchInput.focusin(function() {
        liveSesrchResult.slideDown();
    });

    liveSearchInput.focusout(function() {
        liveSesrchResult.slideUp();
    });

    var searchRequest = null;

    var searchEvents = function() {

        if(liveSearchInput.val().length < 3){
            liveSesrchResult.slideUp();
            return;
        }

        if (searchRequest)
            searchRequest.abort();

        searchRequest = $.ajax({
            url: 'index.php?route=product/search/live',
            type: 'post',
            data: 'key=' + $(this).val(),
            dataType: 'json',
            success: function(json) {
                if(json['products']) {
                    var str = "";
                    for(var i = 0; i < json['products'].length; i++ ) {
                        str += '<div class="search_result_item">' +
                            '<div class="search_result_img">' +
                            '<img src="'
                            + json['products'][i]['thumb'] +
                            '" alt="" class="img-responsive">' +
                            '</div>' +
                            '<div class="search_result_title">' +
                            '<a href="'
                            + json['products'][i]['href'] +
                            '">'
                            + json['products'][i]['name'] +
                            '</div>' +
                            '</div>';
                    }
                    liveSesrchResult.html(str);
                }else if(json['error']){
                    liveSesrchResult.html('<div class="search_live_noresults">' + json['error'] + '</div>');
                }
                liveSesrchResult.slideDown();
            }
        });
    };

    liveSearchInput.on({
        change: searchEvents,
        keyup: $.debounce(400, searchEvents)
    });
*/
    $(".header__nav .menu-item a").on('click', function(e){
        if($(this).attr('href') == '#') {
            e.preventDefault();
            if ($(this).parent().find('.submenu').length > 0) {
                if (!$(this).parent().find('.submenu').hasClass('show')) {
                    $(this).parent().find('.submenu').addClass('show');
                } else {
                    $(this).parent().find('.submenu').removeClass('show');
                }
                $(this).parent().find('.submenu').stop(false, false).slideToggle(200);
            }
        }
    })
    $(".header__nav .menu-item").hover(
        function (e) {
            if ($(this).find('.submenu').length > 0 && !$(this).find('.submenu').hasClass('show')) {
                $(this).find('.submenu').stop(false, false).slideToggle(200);
                $(this).find('.submenu').addClass('show');
            }
        },
        function (e) {
            if ($(this).find('.submenu').length > 0 && $(this).find('.submenu').hasClass('show')) {
                $(this).find('.submenu').stop(false, false).slideToggle(200);
                $(this).find('.submenu').removeClass('show');
            }
        }
    );
    
    // New Menu Tabs
    $('#new-product-menu .top-level .item-link').on('mouseenter', function(){
        if ( $(this).hasClass('active') ) return;
        $('#new-product-menu .top-level .item-link.active').removeClass('active');
        $('#new-product-menu .sub-level .top-item.active').removeClass('active');
        $(this).addClass('active');
        $('#new-product-menu .sub-level').find('.' + $(this).attr('id')).addClass('active');
        
    })

    let defhh = 60;
    if (location.hash) {
        let hash = location.hash.replace(/[^a-z]+/,'');
        if(hash == 'online' || hash == 'offline'){
            let el = hash == 'online' && $('.online').length ? '#online' : '#offline';
            setTimeout(function () {
                $('.js-tabs-link').removeClass('active');
                $('.js-tabs-item').css({'display':'none'});
                let ind = $(el).index();
                //if($(window).width() <= 426) ind--;
                $(el).addClass('active');
                $(".js-tabs-item").eq(ind).css({'display':'block'});
                $(el).scrollToElement();
                scrollElLeft(el);
                //let $e = $(el)[0].getBoundingClientRect();
                //$(".options__nav").animate({scrollLeft:$e.left-($(document).width()-$e.width)/2}, 250);
            },10);
        } else {
            setTimeout(function() {window.scrollTo(0,0);},10);
        }
    }

    $('#to_buy').on('click', function(e) {
        e.preventDefault();
        let shops = parseInt($(this).data('shops'));
        let target = $('.online');
        if( shops && target.length  ) {
            $('.js-tabs-link').removeClass('active');
            $('.js-tabs-item').css({'display':'none'});
            target.trigger('click').scrollToElement();
            scrollElLeft(target);
            //let $e = target[0].getBoundingClientRect();
            //console.log($e);
            //$(".options__nav").animate({scrollLeft:$e.left-($(document).width()-$e.width)/2}, 250);
        } else {
            location = $(this).attr('href');
        }
    });

    $('#video_btn').on('click', function(e) {
        e.preventDefault();
        let target = $('.vidos');
        if(target.length) {
            $('.js-tabs-link').removeClass('active');
            $('.js-tabs-item').css({'display':'none'});
            target.trigger('click').scrollToElement();
            scrollElLeft(target);
        }
    });

    $('.gotoshop').on('click', function(e) {
        e.preventDefault();
        let $t = $(this),pid = parseInt($t.data('pid')),sid = parseInt($t.data('sid'));
        if(pid>0 && sid>0){
            $.post('index.php?route=product/product/updateShop',{pid:pid,sid:sid},function(resp){
                setTimeout(function(){window.open($t.attr('href'),'_blank')},500);
            }, "json");
        }
    });

    $('.card__review').on('click', function(event) {
        event.preventDefault();
        let target = $('.rew');
        if( target.length ) {
            $('.js-tabs-link').removeClass('active');
            $('.js-tabs-item').css({'display':'none'});
            target.trigger('click').scrollToElement();
        }
    });

    $('.filters__all').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let $t = $(this), $pm = $t.parent().parent(), $ps = $t.prev(), text = $t.text();
        $t.text($t.data('text')).data('text',text);
        if($pm.hasClass('in')){
            $($t.data('target')).slideToggle();
            setTimeout(function(){
                $pm.toggleClass('in');
                //$t.fadeIn();
                //$ps.toggleClass('collapsed');
            },250);
        } else {
            $pm.toggleClass('in');
            //$t.fadeOut();
            //$ps.toggleClass('collapsed');
            setTimeout(function(){
                $($t.data('target')).slideToggle();
            },50);
        }
    });

    $('#send-contact').on('click', function(event) {
        event.preventDefault();
        grecaptcha.execute();
    });
    // goods
    (function () {
        let goods = $('.js-goods'),
            slider = goods.find('.js-slider'),
            status = goods.find('.js-slider-status'),
            progressBar = goods.find('.js-slider-progress');

        slider.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            let i = (currentSlide ? currentSlide : 0) + 1;
            status.html('<span class="status__number">' + i + '</span>' + '<span class="status__sign">/</span>' + '<span class="status__all">' + slick.slideCount + '</span>');
        });

        slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            let calc = nextSlide / (slick.slideCount - 1) * 100;

            progressBar.css('background-size', calc + '% 100%').attr('aria-valuenow', calc);
        });

        slider.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: leftArrow,
            nextArrow: rightArrow,
            dots: false,
            infinite: true,
            speed: 600,
            variableWidth: true,
            responsive: [{
                breakpoint: 1340,
                settings: {
                    variableWidth: false
                }
            }, {
                breakpoint: 1024,
                settings: {
                    variableWidth: false,
                    slidesToShow: 3
                }
            }, {
                breakpoint: 768,
                settings: {
                    variableWidth: false,
                    slidesToShow: 2,
                    arrows: false
                }
            }, {
                breakpoint: 640,
                settings: {
                    variableWidth: false,
                    slidesToShow: 1,
                    arrows: false
                }
            }]
        });
    })();

    $(".lang__link:not(.active)").click(
        function (e) {
            e.preventDefault();
            //$(this).parent().children().removeClass("active");
            //$(this).addClass("active");
            $('#form-language input[name=code]').val($(this).attr('rel'));
            $('#form-language').submit();
        }
    );

    // main
    (function () {
        let main = $('.js-main'),
            sliderNav = main.find('.js-main-nav'),
            sliderFor = main.find('.js-main-for'),
            status = main.find('.js-main-status');

        sliderNav.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            let i = (currentSlide ? currentSlide : 0) + 1;
            status.html('<span class="status__number">' + i + '</span>' + '<span class="status__sign">/</span>' + slick.slideCount);
        });

        sliderNav.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: prevArrow,
            nextArrow: nextArrow,
            fade: true,
            asNavFor: sliderFor,
            speed: 500,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    adaptiveHeight: true
                }
            }, {
                breakpoint: 640,
                settings: {
                    adaptiveHeight: true,
                    arrows: false
                }
            }]
        });

        sliderFor.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            focusOnSelect: true,
            // vertical: true,
            // verticalSwiping: true,
            speed: 700,
            asNavFor: sliderNav,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    // fade: true
                }
            }]
        });
    })();

    $('.js-view-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        infinite: false,
        asNavFor: '.js-view-nav',
        speed: 700,
        responsive: [{
            breakpoint: 768,
            settings: {
                dots: true
            }
        }]
    });
    $('.js-view-nav').on('init', function(event, slick){
        $(this).css({'overflow':'initial'});
    }).slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.js-view-for',
        dots: false,
        infinite: false,
        arrows: true,
        prevArrow: leftArrow,
        nextArrow: rightArrow,
        focusOnSelect: true,
        vertical: true,
        verticalSwiping: true,
        speed: 700,
        responsive: [{
            breakpoint: 640,
            settings: {
                vertical: false,
                verticalSwiping: false,
                slidesToShow: 4
            }
        }]
    });

    // collection
    (function () {
        let collection = $('.js-collection');
        collection.each(function () {
            let thisCollection = $(this),
                slider = thisCollection.find('.js-slider'),
                status = thisCollection.find('.js-slider-status'),
                progressBar = thisCollection.find('.js-slider-progress');
            slider.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
                //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
                let i = (currentSlide ? currentSlide : 0) + 1;
                status.html('<span class="status__number">' + i + '</span>' + '<span class="status__sign">/</span>' + '<span class="status__all">' + slick.slideCount + '</span>');
            });

            slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                let calc = nextSlide / (slick.slideCount - 1) * 100;

                progressBar.css('background-size', calc + '% 100%').attr('aria-valuenow', calc);
            });

            slider.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                prevArrow: leftArrow,
                nextArrow: rightArrow,
                dots: false,
                infinite: true,
                speed: 600,
                variableWidth: true,
                responsive: [{
                    breakpoint: 1280,
                    settings: {
                        variableWidth: false,
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 1024,
                    settings: {
                        variableWidth: false,
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        variableWidth: false,
                        slidesToShow: 2,
                        arrows: false
                    }
                }, {
                    breakpoint: 640,
                    settings: {
                        variableWidth: false,
                        slidesToShow: 1,
                        arrows: false
                    }
                }]
            });
        });
    })();

    $(document).on('mouseenter', '.catalog .product', function(){
        var img = $(this).find('.product__preview img.product__pic');
        if(typeof img.data('overlay') !== 'undefined' && img.data('overlay') != '') {
            var origImg = img.attr('src');
            var overlay = img.data('overlay');
            img.attr('src', overlay);
            img.data('overlay', origImg);
            $(this).addClass('overlay');
        }
    });
    $(document).on('mouseleave', '.catalog .product', function () {
        var img = $(this).find('.product__preview img.product__pic');
        if( $(this).hasClass('overlay') ) {
            var origImg = img.data('overlay');
            var overlay = img.attr('src');
            img.attr('src', origImg);
            img.data('overlay', overlay);
            $(this).removeClass('overlay');
        }
    })

    $('.article .article__content img').each(function(){
        var src = $(this).attr('src');
        if(typeof src !== 'undefined' && src != '') {
            $(this).wrap($('<a>',{
                href: src,
                'data-fancybox' : ''
            }));
        }
    });

    $(window).scroll(function(){
        if($(window).scrollTop() >= +window.innerWidth * 0.2) {
            $('#goToTop').fadeIn();
        }else{
            $('#goToTop').fadeOut();
        }
    });
    $('#goToTop').on('click', function(){
        $('html,body').animate({scrollTop:0}, 1000);
    })
});

// tabs
(function () {
    let tabs = $('.js-tabs');
    tabs.each(function () {
        let thisTabs = $(this),
            nav = thisTabs.find('.js-tabs-link'),
            item = thisTabs.find('.js-tabs-item');
        nav.on('click', function () {
            let thisNav = $(this),
                indexNav = thisNav.index();
            nav.removeClass('active');
            thisNav.addClass('active');
            item.hide();
            item.eq(indexNav).fadeIn();
            initSlider(item.eq(indexNav));
            return false;
        });
        let hash = location.hash.replace(/[^a-z]+/,'');
        console.log(hash);
        if(hash != 'shoponline' && hash != 'shopoffline'){
            nav.first().trigger('click');
        }
    });
    function initSlider(el) {
        let sl = el.find('.js-slider-tabs'),
            status = el.find('.js-slider-status'),
            progressBar = el.find('.js-slider-progress');
        if (!sl.hasClass('init')) {
            sl.addClass('init');

            sl.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
                //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
                let i = (currentSlide ? currentSlide : 0) + 1;
                status.html('<span class="status__number">' + i + '</span>' + '<span class="status__sign">/</span>' + '<span class="status__all">' + slick.slideCount + '</span>');
            });

            sl.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                let calc = nextSlide / (slick.slideCount - 1) * 100;

                progressBar.css('background-size', calc + '% 100%').attr('aria-valuenow', calc);
            });

            sl.slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true,
                prevArrow: leftArrow,
                nextArrow: rightArrow,
                    autoplay: true,
                    autoplaySpeed: 6000,
                dots: false,
                infinite: true,
                speed: 600,
                variableWidth: true,
                responsive: [{
                    breakpoint: 1340,
                    settings: {
                        variableWidth: false
                    }
                }, {
                    breakpoint: 1024,
                    settings: {
                        variableWidth: false,
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        variableWidth: false,
                        slidesToShow: 2,
                        arrows: false
                    }
                }, {
                    breakpoint: 640,
                    settings: {
                        variableWidth: false,
                        slidesToShow: 1,
                        arrows: false
                    }
                }]
            });
        }
    }

    if(typeof product_id !== 'undefined' && product_id){
        let start = 3;
        // $('.good__desc-reviews').load('index.php?route=product/product/reviewM&product_id='+product_id+'&start='+start);
        // start+=3;

        $('#button-review').on('click', function(event) {
            event.preventDefault();
            grecaptcha.execute();
        });
        $(document).on('click','button.good__desc-review-button', function() {
            $.ajax({
                url: 'index.php?route=product/product/reviewM&product_id='+product_id+'&start='+start,
                type: 'post',
                success: function(otvet) {
                    if(otvet){
                        $('.good__desc-review-button').replaceWith(otvet);
                        start+=3;
                    }
                },
                error: function () {
                    fireError('Error!','Cann not make request!');
                }
            });
        });
    }

})();

let a = 0;
$(window).scroll(function () {
    let counter = $('#counter');
    if (counter.length) {
        let oTop = counter.offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.counter-value').each(function () {
                let $this = $(this),
                    countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                    countNum: countTo
                }, {

                    duration: 2300,
                    easing: 'swing',
                    step: function step() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function complete() {
                        $this.text(this.countNum);
                        //alert('finished');
                    }

                });
            });
            a = 1;
        }
    }
});

// accordeon
(function () {
    let accord = $('.js-accordeon-item');
    accord.each(function () {
        let thisAccord = $(this),
            head = thisAccord.find('.js-accordeon-head'),
            inner = thisAccord.find('.js-accordeon-body');
        head.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            thisAccord.toggleClass('active');
            inner.slideToggle();
        });
    });
})();

// placeholder
$('input, textarea').each(function () {
    let placeholder = $(this).attr('placeholder');
    $(this).focus(function () {
        $(this).attr('placeholder', '');
    });
    $(this).focusout(function () {
        $(this).attr('placeholder', placeholder);
    });
});

// header
(function () {
    let header = $('.js-header'),
        burger = $('.js-header-burger'),
        wrap = $('.js-header-wrap'),
        logo = $('.js-header-logo'),
        bg = $('.js-header-bg'),
        search = $('.js-search'),
        open = $('.js-search-open');
    burger.on('click', function () {
        burger.toggleClass('active');
        wrap.toggleClass('visible');
        search.removeClass('active');
        if (burger.hasClass('active')) {
            search.addClass('white');
            burger.addClass('white');
            logo.addClass('white');
            bg.addClass('show');
        } else {
            search.removeClass('white');
            burger.removeClass('white');
            logo.removeClass('white');
            bg.removeClass('show');
            closeMobileCatalog();
        }
    });
    bg.on('click', function () {
        burger.removeClass('active white');
        wrap.removeClass('visible');
        bg.removeClass('show');
        logo.removeClass('white');
        search.removeClass('active white');
    });
    open.on('click', function () {
        open.parents('.js-search').toggleClass('active');
        // burger.removeClass('active');
        // wrap.removeClass('visible');
        if (search.hasClass('active')) {
            //search.addClass('white');
            // burger.addClass('white');
            // logo.addClass('white');
            let windowsWidth = $(window).width();
            if (windowsWidth < 768) {
                bg.addClass('show');
            }
        } else {
            //search.removeClass('white');
            // burger.removeClass('white');
            // logo.removeClass('white');
            // bg.removeClass('show');
        }
    });
    /**
     * Mobile Menu
     */
    if ( $(window).width() < 1024 ) {
        let menuInitButton = $( 'a#mobile-menu-toggler' );
        let mobileCatalog = $( '.dropmenu .directory__body' );
        
        // Remove default active menu
        $('#new-product-menu .sub-level .top-item.active, #new-product-menu .top-level .top-item>a.active').removeClass('active');
        
        menuInitButton.on( 'click', function ( e ) {
            e.preventDefault();
            mobileCatalog.toggleClass( 'active' );
            if ( mobileCatalog.hasClass( 'active' ) ) {
                if ( mobileMenu.currentLevel ) {
                    mobileMenu.currentLevel = 1;
                } else {
                    mobileMenu[ 'currentLevel' ] = 1;
                }
            } else {
                if ( mobileMenu.currentLevel ) {
                    mobileMenu.currentLevel = 0;
                } else {
                    mobileMenu[ 'currentLevel' ] = 0;
                }
            }
        } )
        
        $( '#new-product-menu .top-level .top-item>a' ).on( 'click', function(e){
            if ( $(this).hasClass('no-children') ) return;
            e.preventDefault();
            mobileMenu.currentLevel = 2;
        } )
        
        $( '#new-product-menu .sub-level .top-item .sub-item-block a' ).on('click', function(e){
            if ($(this).parent().find('ul:not(.third-level)').length > 0) {
                e.preventDefault();
                $(this).parent().find('ul:not(.third-level)').addClass('active');
                mobileMenu.currentLevel = 3;
            }
        })
        
        $( '#menu-back' ).on('click', function(e){
            e.preventDefault();
            if ( mobileMenu.currentLevel == 3 ) {
                $( '#new-product-menu .sub-level .top-item .sub-item-block ul.active' ).removeClass('active');
                mobileMenu.currentLevel = 2;
            } else if ( mobileMenu.currentLevel == 2 ) {
                $( '#new-product-menu .sub-level .top-item.active' ).removeClass('active');
                $( '#new-product-menu .top-level .top-item>a.active' ).removeClass('active');
                mobileMenu.currentLevel = 1;
            } else if ( mobileMenu.currentLevel == 1 ) {
                mobileCatalog.removeClass('active');
                $( '#new-product-menu .top-level .top-item>a.active' ).removeClass('active');
                mobileMenu.currentLevel = 0;
            }
        })
        
        function closeMobileCatalog(){
            mobileMenu.currentLevel = 0;
            $( '#new-product-menu .sub-level .top-item .sub-item-block ul.active' ).removeClass('active');
            $( '#new-product-menu .sub-level .top-item.active' ).removeClass('active');
            $( '#new-product-menu .top-level .top-item>a.active' ).removeClass('active');
            mobileCatalog.removeClass('active');
        }
    }
})();

// filters
$(function () {
    let btn = $('.js-filters-btn'),
        wrapper = $('.js-filters-wrapper'),
        bg = $('.js-filters-bg'),
        back = $('.js-filters-back'),
        html = $('html'),
        body = $('body');
    btn.on('click', function () {
        body.addClass('no-scroll');
        html.addClass('no-scroll');
        wrapper.addClass('visible');
        bg.addClass('visible');
    });
    back.on('click', function () {
        body.removeClass('no-scroll');
        html.removeClass('no-scroll');
        wrapper.removeClass('visible');
        bg.removeClass('visible');
    });
    bg.on('click', function () {
        body.removeClass('no-scroll');
        html.removeClass('no-scroll');
        wrapper.removeClass('visible');
        bg.removeClass('visible');
    });
    if($("#map").length){
        $("#map").TekMap();
        let markers = [] ;
        let a = $("#good-obl option:selected").data('content');
        let maps;
        if(typeof a !== "undefined"){
            $('.location__shop').css('display','none').removeClass('maps');
            $('.'+a).css('display','flex').addClass('maps');
            maps = a=='location__shop' ? false : true;
            /*if($(".maps").length){
                maps = true;
            } else {
                $(".location__shop").css('display','flex').addClass('maps');
                maps = false;
            }*/
        } else {
            maps = false;
        }
        $('.maps').each(function(i,v) {
            markers.push( {
                lat:v.dataset.latitude,
                lng:v.dataset.longitude,
                draggable:false,
                infowindow: v.dataset.title+'<br>'+ v.dataset.information,
                icon:{url:"image/logo_maps.png",size:[75, 74],origin:[10,48]},
                shadow:{url:"image/shadow50.png",size:[75, 74],origin:[10,48]}
            });
        });

        $('#map').css({'height': '590px', 'width': '100%'});
        $("#map").TekMap({
            lat : maps ? $('.maps')[0].dataset.latitude : 48.379433,
            lng : maps ? $('.maps')[0].dataset.longitude : 31.1655799000,
            mapoptions : {
                zoom: maps ? 12 : 6,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false
            },
            markers : markers
        });
    }

    if($("#good-obl").length){
        $("#good-obl").chosen({width: "100%"});
        $("#good-obl").on("change", function() {
            let chosenVal = $("#good-obl").val();
            let maps;
            let a = $("#good-obl option:selected").data('content');
            $('.location__shop').css('display', 'none');
            $('.location__shop').removeClass('maps');
            maps = a=='location__shop' ? false : true;
            if($('.'+a).length > 0){
                $('.'+a).css('display', 'flex');
                $('.'+a).addClass('maps');
                let markers = [] ;
                $("#map").TekMap();
                $('.maps').each(function(i,v) {
                    markers.push( {
                        lat:v.dataset.latitude,
                        lng:v.dataset.longitude,
                        draggable:false,
                        infowindow:v.dataset.title+'<br>'+ v.dataset.information,
                        icon:{url:"image/logo_maps.png",size:[75, 74],origin:[10,48]},
                        shadow:{url:"image/shadow50.png",size:[75, 74],origin:[10,48]}
                    });
                });
                $('#map').css({'height': '590px', 'width': '100%'});
                if(maps) {
                    $("#map").TekMap({
                        lat:$('.maps')[0].dataset.latitude,
                        lng:$('.maps')[0].dataset.longitude,
                        mapoptions : {
                            zoom: 12,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                            scrollwheel: false
                        },
                        markers : markers
                    });
                } else {
                    $("#map").TekMap({
                        lat : 48.379433,
                        lng : 31.1655799000,
                        mapoptions : {
                            zoom: 6,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                            scrollwheel: false
                        },
                        markers : markers
                    });
                }
            }else{
                $("#map").TekMap();
                let markers = [] ;
                $('.location__shop').each(function(i,v) {
                    markers.push( {
                        lat:v.dataset.latitude,
                        lng:v.dataset.longitude,
                        draggable:false,
                        infowindow:v.dataset.title+'<br>'+ v.dataset.information,
                        icon:{url:"image/logo_maps.png",size:[75, 74],origin:[10,48]},
                        shadow:{url:"image/shadow50.png",size:[75, 74],origin:[10,48]}
                    });
                });

                $('#map').css({'height': '590px', 'width': '100%'});
                $("#map").TekMap({
                    lat : 48.379433,
                    lng : 31.1655799000,
                    mapoptions : {
                        zoom: 6,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        scrollwheel: false
                    },
                    markers : markers
                });
                $('.location__shop').css('display', 'flex');
            }
        });
    }

    if(typeof product_id !== 'undefined' && product_id){
        let start = 3;
        // $('.good__desc-reviews').load('index.php?route=product/product/reviewM&product_id='+product_id+'&start='+start);
        // start+=3;

        $('#button-review').on('click', function(event) {
            event.preventDefault();
            grecaptcha.execute();
        });
        $(document).on('click','button.comments__btn#show-more-reviews', function() {
            $.ajax({
                url: 'index.php?route=product/product/reviewM&product_id='+product_id+'&start='+start,
                type: 'post',
                success: function(otvet) {
                    if(otvet){
                        $('.comments__btn#show-more-reviews').parent().parent().find('.comments__list').after($(otvet).find('.comments__list'));
                        start+=3;
                    }
                },
                error: function () {
                    fireError('Error!','Cann not make request!');
                }
            });
        });
    }
}());

// Cart add remove functions
var cart = {
    'add': function(product_id, quantity) {
        $.ajax({
            url: 'index.php?route=checkout/cart/add',
            type: 'post',
            data: 'product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
            dataType: 'json',
            beforeSend: function() {
                $('#cart > button').button('loading');
            },
            complete: function() {
                $('#cart > button').button('reset');
            },
            success: function(json) {
                $('.alert, .text-danger').remove();

                if (json['redirect']) {
                    location = json['redirect'];
                }

                if (json['success']) {
                    $('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                    // Need to set timeout otherwise it wont update the total
                    setTimeout(function () {
                        $('#cart > button').html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + json['total'] + '</span>');
                    }, 100);

                    $('html, body').animate({ scrollTop: 0 }, 'slow');

                    $('#cart > ul').load('index.php?route=common/cart/info ul li');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    'update': function(key, quantity) {
        $.ajax({
            url: 'index.php?route=checkout/cart/edit',
            type: 'post',
            data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
            dataType: 'json',
            beforeSend: function() {
                $('#cart > button').button('loading');
            },
            complete: function() {
                $('#cart > button').button('reset');
            },
            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                setTimeout(function () {
                    $('#cart > button').html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + json['total'] + '</span>');
                }, 100);

                if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
                    location = 'index.php?route=checkout/cart';
                } else {
                    $('#cart > ul').load('index.php?route=common/cart/info ul li');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    'remove': function(key) {
        $.ajax({
            url: 'index.php?route=checkout/cart/remove',
            type: 'post',
            data: 'key=' + key,
            dataType: 'json',
            beforeSend: function() {
                $('#cart > button').button('loading');
            },
            complete: function() {
                $('#cart > button').button('reset');
            },
            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                setTimeout(function () {
                    $('#cart > button').html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + json['total'] + '</span>');
                }, 100);

                var now_location = String(document.location.pathname);

                if ((now_location == '/cart/') || (now_location == '/checkout/') || (getURLVar('route') == 'checkout/cart') || (getURLVar('route') == 'checkout/checkout')) {
                    location = 'index.php?route=checkout/cart';
                } else {
                    $('#cart > ul').load('index.php?route=common/cart/info ul li');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}

var voucher = {
    'add': function() {

    },
    'remove': function(key) {
        $.ajax({
            url: 'index.php?route=checkout/cart/remove',
            type: 'post',
            data: 'key=' + key,
            dataType: 'json',
            beforeSend: function() {
                $('#cart > button').button('loading');
            },
            complete: function() {
                $('#cart > button').button('reset');
            },
            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                setTimeout(function () {
                    $('#cart > button').html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + json['total'] + '</span>');
                }, 100);

                if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
                    location = 'index.php?route=checkout/cart';
                } else {
                    $('#cart > ul').load('index.php?route=common/cart/info ul li');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}

var wishlist = {
    'add': function(product_id) {
        $.ajax({
            url: 'index.php?route=account/wishlist/add',
            type: 'post',
            data: 'product_id=' + product_id,
            dataType: 'json',
            success: function(json) {
                $('.alert').remove();

                if (json['redirect']) {
                    location = json['redirect'];
                }

                if (json['success']) {
                    $('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                }

                $('#wishlist-total span').html(json['total']);
                $('#wishlist-total').attr('title', json['total']);

                $('html, body').animate({ scrollTop: 0 }, 'slow');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    'remove': function() {

    }
}

let compare = {
    add: function(product_id){
        $.ajax({
            url: 'index.php?route=product/compare/add',
            type: 'post',
            data: 'product_id=' + product_id,
            dataType: 'json',
            success: function(json){
                if (json['success']) {
                    $('#compare-total').html(json['total']);
                    $('.card__line').addClass('active');
                } else if (json['error']){
                    fireError('Error!',json['str']);
                }
            },
            error: function(xhr, ajaxOptions, thrownError){
                fireError(xhr.statusText,xhr.responseText);
            }
        });
    },
    remove: function(product_id){
        $.ajax({
            url: 'index.php?route=product/compare/remove',
            type: 'post',
            data: 'product_id=' + product_id + '&ref=' + document.referrer,
            dataType: 'json',
            success: function(json){
                if (json['success']) {
                    $('.comp'+product_id).remove();
                    if(parseInt(json['cnt']) == 0){
                        location = json['ref'] ? json['ref'] : '/';
                    }
                } else if (json['error']){
                    if(parseInt(json['cnt']) == 0) {
                        fireError('Error!',json['str'],document.referrer);
                    } else {
                        if(json['pid'] && $('.comp'+json['pid']).length){
                            $('.comp'+json['pid']).remove();
                        }
                        fireError('Error!',json['str']);
                    }
                }
            },
            error: function(xhr, ajaxOptions, thrownError){
                fireError(xhr.statusText,xhr.responseText);
            }
        });
    },
    removeall: function(){
        $.ajax({
            url: 'index.php?route=product/compare/removeall',
            type: 'post',
            data: 'ref=' + document.referrer,
            dataType: 'json',
            success: function(json){
                if (json['success']) {
                    location = json['ref'] ? json['ref'] : '/';
                } else if (json['error']){
                    fireError('Error!',json['str'],document.referrer&&document.referrer.search('compare')<0?document.referrer:'/');
                }
            },
            error: function(xhr, ajaxOptions, thrownError){
                fireError(xhr.statusText,xhr.responseText);
            }
        });
    }
};

/* Agree to Terms */
$(document).delegate('.agree', 'click', function(e) {
    e.preventDefault();

    $('#modal-agree').remove();

    var element = this;

    $.ajax({
        url: $(element).attr('href'),
        type: 'get',
        dataType: 'html',
        success: function(data) {
            html  = '<div id="modal-agree" class="modal">';
            html += '  <div class="modal-dialog">';
            html += '    <div class="modal-content">';
            html += '      <div class="modal-header">';
            html += '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            html += '        <h4 class="modal-title">' + $(element).text() + '</h4>';
            html += '      </div>';
            html += '      <div class="modal-body">' + data + '</div>';
            html += '    </div';
            html += '  </div>';
            html += '</div>';

            $('body').append(html);

            $('#modal-agree').modal('show');
        }
    });
});

window.onSubmit = function() {
    $('#contacts-form').submit();
};

window.onSubmitRev = function() {
    $.ajax({
        url: $('#form-review').data('action'),
        type: 'post',
        dataType: 'json',
        data: $('#form-review').serialize(),
        success: function(json){
            $('.alert-success, .alert-danger').remove();
            grecaptcha.reset();
            if (json['error']) {
                $('.comments__btn').before('<div class="alert alert-danger">' + json['error'] + '</div>');
            }
            if (json['success']) {
                $('.comments__btn').before('<div class="alert alert-success">' + json['success'] + '</div>');
                $('input[name=\'name\']').val('');
                $('textarea[name=\'text\']').val('');
                $('input[name=\'rating\']:checked').prop('checked', false);
            }
        },
        error: function(error){
            fireError('Error!','Cann not make request!');
            grecaptcha.reset();
        }
    });
};

let fireError = function(title,text,ref){
    Swal.fire({
        type: 'error',
        padding: '20px',
        position: 'top',
        title: title,
        text: text,
        animation: false,
        customClass: 'slideInDown'
    }).then(function(result){
        if (typeof ref !== 'undefined' && (result.value || result.dismiss)) {
            location = ref;
        }
    });
};

jQuery.fn.extend({
    scrollToElement: function(offs) {
        let that = this;
        setTimeout(function(){
            let zoom = parseFloat($('body').css('zoom'));
            if(typeof zoom === "undefined" || isNaN(zoom) || jQuery.browser.mozilla){
                zoom = 1;
            }
            let box = that[0].getBoundingClientRect();
            let body = document.body;
            let docEl = document.documentElement;
            let scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
            offs = typeof offs === "undefined" ? 0 : parseInt(offs);
            //let width = $(window).width();
            //if(width <= 426) offs += 31;
            $('html, body').stop().animate({
                scrollTop: (box.top-offs)*zoom + scrollTop
            }, 500);
        },50);
    }
});