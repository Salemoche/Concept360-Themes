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

    $('div.landing__ueber-uns__info__item').css('height', $('div.landing__ueber-uns__info__item').outerWidth() / 1.77777);
    $('div.home__ueber-uns__info__item').css('height', $('div.home__ueber-uns__info__item').outerWidth() / 1.77777);

    $(window).resize( function () {
        $('div.landing__ueber-uns__info__item').css('height', $('div.landing__ueber-uns__info__item').outerWidth() / 1.77777);
    $('div.home__ueber-uns__info__item').css('height', $('div.home__ueber-uns__info__item').outerWidth() / 1.77777);
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

    $('.icon-holder div, div.spacer').click(function () {
        $('.burger-menu').toggleClass('open');
    });


    

    
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


})
