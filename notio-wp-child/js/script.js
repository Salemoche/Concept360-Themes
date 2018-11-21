$(document).ready( function () {

    var aspectRatio = window.innerWidth / window.innerHeight;

    $('.360-main-image').each( function() {

        var div = $(this);
        var width = div.width()/1.7777;
        div.css('height', width);
    })

    $('.360-main-image').each( function() {

        var div = $(this);
        var width = div.width()/1.7777;
        div.css('height', width);
    })

    $('.solutions__content__image').css('height', $('.solutions__content__image').width()/1.77777);
    $('.about__content__image').css('height', $('.about__content__image').width()/1.77777);


    $('#player').css('display', 'none');
    console.log("the fucking video is " + $('.home'));


    //
    // Home Video
    //

    if (aspectRatio < 1) {
        $('.home__landing__video>iframe').css('transform', 'scale(2.4)');
        console.log('big');
    } else if (aspectRatio < 1.2) {
        $('.home__landing__video>iframe').css('transform', 'scale(1.8)');
        console.log('big');
    } else if (aspectRatio < 1.5) {
        $('.home__landing__video>iframe').css('transform', 'scale(1.5)');
        console.log('big');
    } else if (aspectRatio < 1.8) {
        $('.home__landing__video>iframe').css('transform', 'scale(1.2)');
        console.log('big');
    } else {
        $('.home__landing__video>iframe').css('transform', 'scale(1)');
        console.log('small');
    }

    $(window).resize( function() {

        aspectRatio = window.innerWidth / window.innerHeight;


        $('.360-main-image').each( function() {

            var div = $(this);
            var width = div.width()/1.7777;
            div.css('height', width);
        })

        $('.solutions__content__image').css('height', $('.solutions__content__image').width()/1.77777);
        $('.about__content__image').css('height', $('.about__content__image').width()/1.77777);


        console.log(aspectRatio);

        if (aspectRatio < 1) {
            $('.home__landing__video>iframe').css('transform', 'scale(2.4)');
            console.log('big');
        } else if (aspectRatio < 1.2) {
            $('.home__landing__video>iframe').css('transform', 'scale(1.8)');
            console.log('big');
        } else if (aspectRatio < 1.5) {
            $('.home__landing__video>iframe').css('transform', 'scale(1.5)');
            console.log('big');
        } else if (aspectRatio < 1.8) {
            $('.home__landing__video>iframe').css('transform', 'scale(1.2)');
            console.log('big');
        } else {
            $('.home__landing__video>iframe').css('transform', 'scale(1)');
            console.log('small');
        }

        if(window.innerWidth > 768) {

            $('div.landing__ueber-uns__info__item').css('height', $('div.landing__ueber-uns__info__item').outerWidth() / 1.77777);
            $('div.home__ueber-uns__info__item').css('height', $('div.home__ueber-uns__info__item').outerWidth() / 1.77777);
        }
    });

    if(window.innerWidth > 768) {
        $('div.landing__ueber-uns__info__item').css('height', $('div.landing__ueber-uns__info__item').outerWidth() / 1.77777);
        $('div.home__ueber-uns__info__item').css('height', $('div.home__ueber-uns__info__item').outerWidth() / 1.77777);
    
    }

    

    //
    // Search Form
    //

    var searchOpen = false;
	
	// Disable search auto-complete - 181107/mt
	$(".concept-header__project-category__search-form input").attr("autocomplete", "off");

    $('.concept-header__project-category__search__ghost').click(function() {


        if (!searchOpen) {
            $('.concept-header__project-category__search__ghost').css('display', 'none');
            $('.concept-header__project-category__search-form').addClass('open');
            $('.concept-header__list-item').css('display', 'none');
            $('.concept-header__all-tags').css('display', 'flex');
            $('.concept-header__all-tags').css('opacity', '1');
            // $('div.projects, div.solutions, div.about, div.project').css('opacity', '0.5');
            
            // if(window.innerWidth < 768) {
            //     $('.concept-header__project-category__container').css('min-height', $('.concept-header__all-tags').height() + 20);
            // } else {
            //     $('.concept-header__project-category__container').css('min-height', '55px');
            // }
        }

        searchOpen = !searchOpen;

    });

    $('.concept-header__all-tags__back').click(function() {


        if (searchOpen) {
            $('.concept-header__project-category__search__ghost').css('display', 'inherit');
            $('.concept-header__project-category__search-form').removeClass('open');
            $('.concept-header__list-item').css('display', 'inherit');
            $('.concept-header__all-tags').css('display', 'none');
            $('.concept-header__all-tags').css('opacity', '0');
            // $('div.projects, div.solutions, div.about, div.project').css('opacity', '1');
            // $('.concept-header__project-category__container').css('min-height', '40px');
        }

        searchOpen = !searchOpen;

    });

    //
    // Menu
    //

    var menuOpen = false;

    $('.icon-holder').appendTo($('.concept-header__main__social-media__container'));
    $('.icon-holder').css('opacity', '1');
    $('#mobile-menu').appendTo($('.concept-header'));


    $('.icon-holder a, div.spacer').click(function () {

        var headerTop = 0;

        if ($('body').hasClass('logged-in')) {
            headerTop = window.innerWidth > 785 ? 32 : 46;
        }

        var subHeaderTop = headerTop + window.innerWidth * 0.3;

        $('.burger-menu').toggleClass('open');

        menuOpen = !menuOpen;

        
        if ($(window).scrollTop() < window.innerHeight) {
            $('.concept-header__main').toggleClass('scrolled');
        }


        if (menuOpen) {
            // $('.concept-header__main').addClass('menu-open-header').appendTo($('body'));
            // $('.menu-open-header').css('position', 'fixed');
            // $('.menu-open-header').css('top', headerTop);

        } else {
            // setTimeout( function () {
            //     $('.concept-header__main').removeClass('menu-open-header').prependTo($('.concept-header'));
            // }, 1200)
        }
    });

    $('#menu-item-wpml-ls-3-de').wrap( "<li class='menu-language-select'></li>" );
    $('.menu-language-select').append($('#menu-item-wpml-ls-3-en'));
    $('.menu-language-select').appendTo($('ul.mobile-menu'));

    
    //
    // Interactive Graphic
    //

    $('.flag').mouseenter( function() {

        var id = $(this).attr('id');

        console.log(id);

        $('.solutions__working-style__graphic__text p').css('display', 'block');
        $('.solutions__working-style__graphic__text').css('display', 'none');
        // $('.solutions__working-style__graphic__text').css('float', 'left');
        $('.' + id + '').css('display', 'block');
    });

    $('.flag').mouseleave( function() {

        var id = $(this).attr('id');

        console.log(id);

        $('.solutions__working-style__graphic__text p').css('display', 'none');
        $('.solutions__working-style__graphic__text').css('display', 'block');
        // $('.flag_5_').css('float', 'right');
    });



    //
    // Slider
    //

    setTimeout( function () {

        $('.tp-bullets').appendTo($('.home__about__slider__text'));
        $('.tp-bullets').css('opacity', 1);
    }, 100);


    //
    // Footer
    //

    // $('.wpcf7 div.wpcf7-form-control-wrap, .wpcf7 p:last-of-type').wrap( "<div class='new'></div>" );;
    // $('.wpcf7 div.wpcf7-form-control-wrap, .wpcf7 p:last-of-type').wrap( "<div class='new'></div>" );;

    $('.wpcf7 p:last-of-type').addClass('send-button');
    $('.wpcf7 div.wpcf7-form-control-wrap').wrap( "<div class='send-container'></div>" );
    $('.send-container').append($('.send-button'));

    setTimeout( function () {  
        $('.wpcf7 p:last-of-type').css('opacity', '1');
        $('.send-container').css('opacity', '1');
    }, 500);


    //
    // General
    //

    autoHover()

    // $('.concept-header__project-category__container').css('top', $('.concept-header__main').height());      

    
    $(window).resize( function() {
        // $('.concept-header__project-category__container').css('top', $('.concept-header__main').height());  
    });

    
    var scrolled = false;
    var pScrolled = scrolled;

    if ($(window).scrollTop() > window.innerHeight - 50) {
        scrolled = true;
        console.log(scrolled);
    }

    $(window).scroll( function() {


        if ($(window).scrollTop() > window.innerHeight) {
            scrolled = true;
        } else {
            scrolled = false;
        }


        if (scrolled != pScrolled) {
            $('.concept-header__main').toggleClass('scrolled');
            pScrolled = scrolled;
            console.log($(window).scrollTop() + ", " + window.innerHeight);

        }

        
        autoHover();

        // console.log($(window).scrollTop())
        // console.log($('.project__thumbnail').offset().top);


    });

    $( window ).resize(function() {
        autoHover();        
    });

    //
    // Language Differences
    //


    if (document.documentElement.lang == 'de-DE') {
        
        $('.send-button input').attr('value', 'Senden');
        $('.concept-header__project-category__search-form input').attr('placeholder', 'Suchen');
    }
	
});


//
// Toggle hover for mobile
//

function autoHover() {

    if(window.innerWidth < 768) {
        var scrollPos = $(window).scrollTop();
        var winHeight = window.innerHeight;
        var inWindow = scrollPos + winHeight;
        var inCenter = scrollPos + winHeight/2 + 50;


        $('.project__thumbnail').each( function() {
            var that = $(this);
            var objPos = that.offset().top + that.height()/2;

            if (objPos <= inCenter + that.height()/2 && objPos >= inCenter - that.height()/2) {
                that.addClass('hovered');

            } else {
                that.removeClass('hovered');
            }
        })
    } else {

    }
}
