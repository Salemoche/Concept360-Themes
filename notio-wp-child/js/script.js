$(document).ready( function () {

    //
    // Image size
    //


    // $('.projects__project').each( function() {

    //     var div = $(this);
    //     var divProp = $(this).width()/$(this).height(); 
    //     var imgProp = div.find('img').width()/div.find('img').height(); 
    
    //     if(divProp < imgProp) {
    //         div.find('img').css('height', '102%');
    //         div.find('img').css('width', 'auto');
    //     } else {
    //         div.find('img').css('height', 'auto');
    //         div.find('img').css('width', '102%');
    //     }

    //     console.log(div);
    // })

    // $('.project__image').each( function() {

    //     var div = $(this);
    //     var divProp = $(this).width()/$(this).height(); 
    //     var imgProp = div.find('img').width()/div.find('img').height(); 
    
    //     if(divProp < imgProp) {
    //         div.find('img').css('height', '102%');
    //         div.find('img').css('width', 'auto');
    //     } else {
    //         div.find('img').css('height', 'auto');
    //         div.find('img').css('width', '102%');
    //     }
    // })

    // setTimeout( function () {
        
    //     var div = $('.home__about__slider__wrapper__foto');
    //     var divProp = $('.home__about__slider__wrapper__foto').width()/$('.home__about__slider__wrapper__foto').height(); 
    //     var imgProp = div.find('img').width()/div.find('img').height(); 

    //     if(divProp < imgProp) {
    //         div.find('img').css('height', '102% !important');
    //         div.find('img').css('width', 'auto !important');
    //     } else {
    //         div.find('img').css('height', 'auto !important');
    //         div.find('img').css('width', '102% !important');
    //     }

    //     console.log(div);
    //     console.log(divProp);
    //     console.log(imgProp);

    // },1000);

    $('.360-main-image').each( function() {

        var div = $(this);
        var width = div.width()/1.7777;
        div.css('height', width);
    })

    $(window).resize( function() {
        $('.360-main-image').each( function() {

            var div = $(this);
            var width = div.width()/1.7777;
            div.css('height', width);
        })

        console.log('resize');
    });

    if(window.innerWidth > 768) {
        $('div.landing__ueber-uns__info__item').css('height', $('div.landing__ueber-uns__info__item').outerWidth() / 1.77777);
        $('div.home__ueber-uns__info__item').css('height', $('div.home__ueber-uns__info__item').outerWidth() / 1.77777);
    
    }

    
    $(window).resize( function () {

        if(window.innerWidth > 768) {

            $('div.landing__ueber-uns__info__item').css('height', $('div.landing__ueber-uns__info__item').outerWidth() / 1.77777);
            $('div.home__ueber-uns__info__item').css('height', $('div.home__ueber-uns__info__item').outerWidth() / 1.77777);
        }
    })

    

    //
    // Search Form
    //

    var searchOpen = false;

    $('.concept-header__project-category__search__ghost').click(function() {


        if (!searchOpen) {
            $('.concept-header__project-category__search__ghost').css('display', 'none');
            $('.concept-header__project-category__search-form').addClass('open');
            $('.concept-header__list-item').css('display', 'none');
            $('.concept-header__all-tags').css('display', 'flex');
            $('.concept-header__all-tags').css('opacity', '1');
            // $('div.projects, div.solutions, div.about, div.project').css('opacity', '0.5');
            
            if(window.innerWidth < 768) {
                $('.concept-header__project-category__container').css('min-height', $('.concept-header__all-tags').height() + 20);
            } else {
                $('.concept-header__project-category__container').css('min-height', '55px');
            }
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
            $('.concept-header__project-category__container').css('min-height', '40px');
        }

        searchOpen = !searchOpen;

    });

    //
    // Menu
    //

    var menuOpen = false;

    $('.icon-holder div, div.spacer').click(function () {

        var headerTop = $('html').css('margin-top');

        $('.burger-menu').toggleClass('open');

        menuOpen = !menuOpen;

        if (menuOpen) {
            $('.concept-header__main').clone().addClass('menu-open-header').appendTo($('#mobile-menu'));
            $('.menu-open-header').css('position', 'absolute');
            $('.menu-open-header').css('top', headerTop);
        } else {
            setTimeout( function () {
                $('.menu-open-header').remove();
            }, 1200)
        }
    });

    
    $('#menu-item-wpml-ls-3-de').wrap( "<li class='menu-language-select'></li>" );
    $('.menu-language-select').append($('#menu-item-wpml-ls-3-en'));

    
    //
    // Interactive Graphic
    //

    $('.flag').mouseenter( function() {

        var id = $(this).attr('id');

        console.log(id);

        $('.solutions__working-style__graphic__text p').css('display', 'inherit');
        $('.solutions__working-style__graphic__text').css('display', 'none');
        $('.solutions__working-style__graphic__text').css('float', 'left');
        $('.' + id + '').css('display', 'inherit');
    });

    $('.flag').mouseleave( function() {

        var id = $(this).attr('id');

        console.log(id);

        $('.solutions__working-style__graphic__text p').css('display', 'none');
        $('.solutions__working-style__graphic__text').css('display', 'inherit');
        $('.flag_5_').css('float', 'right');
    });



    //
    // Slider
    //

    console.log($('.tp-revslider-mainul'));


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
    
})
