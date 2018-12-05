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


    //
    // Home Video
    //

    
      
    if (aspectRatio < 0.5) {
        $('.home__landing__video>iframe').css('transform', 'scale(10)');
    } else if (aspectRatio < 0.8) {
        $('.home__landing__video>iframe').css('transform', 'scale(3.5)');
    } else if (aspectRatio < 1) {
        $('.home__landing__video>iframe').css('transform', 'scale(2.4)');
    } else if (aspectRatio < 1.2) {
        $('.home__landing__video>iframe').css('transform', 'scale(1.8)');
    } else if (aspectRatio < 1.5) {
        $('.home__landing__video>iframe').css('transform', 'scale(1.5)');
    } else if (aspectRatio < 1.8) {
        $('.home__landing__video>iframe').css('transform', 'scale(1.4)');
    } else if (aspectRatio > 3.5) {
        $('.home__landing__video>iframe').css('transform', 'scale(2.4)');
    } else if (aspectRatio > 2.8) {
        $('.home__landing__video>iframe').css('transform', 'scale(1.8)');
    } else if (aspectRatio > 2.4) {
        $('.home__landing__video>iframe').css('transform', 'scale(1.6)');
    } else if (aspectRatio > 1.8) {
        $('.home__landing__video>iframe').css('transform', 'scale(1.4)');
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


        // console.log(aspectRatio);

      
        if (aspectRatio < 0.5) {
            $('.home__landing__video>iframe').css('transform', 'scale(10)');
        } else if (aspectRatio < 0.8) {
            $('.home__landing__video>iframe').css('transform', 'scale(3.5)');
        } else if (aspectRatio < 1) {
            $('.home__landing__video>iframe').css('transform', 'scale(2.4)');
        } else if (aspectRatio < 1.2) {
            $('.home__landing__video>iframe').css('transform', 'scale(1.8)');
        } else if (aspectRatio < 1.5) {
            $('.home__landing__video>iframe').css('transform', 'scale(1.5)');
        } else if (aspectRatio < 1.8) {
            $('.home__landing__video>iframe').css('transform', 'scale(1.4)');
        } else if (aspectRatio > 3.5) {
            $('.home__landing__video>iframe').css('transform', 'scale(2.4)');
        } else if (aspectRatio > 2.8) {
            $('.home__landing__video>iframe').css('transform', 'scale(1.8)');
        } else if (aspectRatio > 2.4) {
            $('.home__landing__video>iframe').css('transform', 'scale(1.6)');
        } else if (aspectRatio > 1.8) {
            $('.home__landing__video>iframe').css('transform', 'scale(1.4)');
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


        if (!searchOpen && !subMenuOpen) {
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

    var subMenuOpen = false;

    $('.concept-header__project-category__expand').click( function() {

        $('.concept-header__project-category__container').toggleClass('open');
        // $('.concept-header__project-category__expand').toggleClass('down');

        subMenuOpen = !subMenuOpen 

        if (subMenuOpen) {
            $('.menu-active').append("<hr>");
            $('.concept-header__project-category__search__ghost').css('display', 'none');
            $('.concept-header__all-tags').css('display', 'flex');
            $('.concept-header__all-tags').css('opacity', '1');
        } else {
            setTimeout( function () {
                $('.menu-active hr').remove();

                
            }, 500);
            
            $('.concept-header__project-category__search__ghost').css('display', 'inherit');
            $('.concept-header__all-tags').css('display', 'none');
            $('.concept-header__all-tags').css('opacity', '0');

            
        }


        
    });

    
    //
    // Interactive Graphic
    //

    $('.flag').mouseenter( function() {

        var id = $(this).attr('id');

        // console.log(id);

        $('.solutions__working-style__graphic__text p').css('display', 'block');
        $('.solutions__working-style__graphic__text').css('display', 'none');
        // $('.solutions__working-style__graphic__text').css('float', 'left');
        $('.' + id + '').css('display', 'block');
    });

    $('.flag').mouseleave( function() {

        var id = $(this).attr('id');

        // console.log(id);

        // $('.solutions__working-style__graphic__text p').css('display', 'none');
        // $('.solutions__working-style__graphic__text').css('display', 'block');
        // $('.flag_5_').css('float', 'right');
    });



    //
    // Slider
    //

    setTimeout( function () {

        // $('.tp-bullets').appendTo($('.home__about__slider__text'));
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
    // Lightbox
    //

    $('.project__image img, .fbx-prev, .fbx-next').click( function() {
        // var that = $(this);

        //     console.log(that);    
            // that.css('opacity', '0.5');

        // that.children($('.fbx-count')).appendTo(that.children($('.fbx-caption-title')));

        $('.fbx-count').css('visibility', 'hidden');
        $('.fbx-count').css('opacity', 0);
        $('.fbx-count').css('visibility', 'visible');

        setTimeout(function() {  
        //    $('.fbx-count').appendTo($('.fbx-caption-title'));
            // $('.fbx-count').appendTo($('.fbx-caption-desc'));
            $('.fbx-count').css('left', $('.fbx-caption').text().length * 6);
            $('.fbx-count').css('opacity', 1);
        }, 1000)

        // console.log($('.fbx-count').text());
    })

    // setTimeout(function() {  
    //     // $('.fbx-count').appendTo($('.fbx-caption'));
    //     console.log($('.fbx-count').text());
    // }, 2000)

    //
    // Orientation change
    //

    var landscape;
    var pLandscape;

    if (window.orientation == 90 || window.orientation == -90) {
        landscape = true;
    } else {
        landscape = false;
    }

    pLandscape = landscape;


    function doOnOrientationChange() {


        if (window.orientation == 90 || window.orientation == -90) {
            landscape = true;
        } else {
            landscape = false;
        }

        if (pLandscape == false && landscape == true) {
            console.log('to landscape');
            $('.concept-header__all-tags').css('visibility', 'hidden');
            $('.concept-header__list-item hr').css('display', 'none')

        } else {
            console.log('to portrait');
            $('.concept-header__all-tags').css('visibility', 'visible');
            $('.concept-header__list-item hr').css('display', 'inherit')
        }

        plandscape = landscape;


        // if (landscape)


    }

    window.addEventListener('orientationchange', doOnOrientationChange);

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
        // console.log(scrolled);
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
            // console.log($(window).scrollTop() + ", " + window.innerHeight);

        }

        
        autoHover();

        // console.log($(window).scrollTop())
        // console.log($('.project__thumbnail').offset().top);


    });

    $( window ).resize(function() {
        autoHover();        
    });

    $('.fbx-next::before').css('color', 'green');

    //
    // Language Differences
    //


    if (document.documentElement.lang == 'de-DE') {
        
        $('.send-button input').attr('value', 'Senden');
        $('.concept-header__project-category__search-form input').attr('placeholder', 'Suchen');
        $('.concept-header__project-category__search-form input').attr('title', 'Suchen');
    }

    if ($('body').hasClass('single')) {
        $('.menu-item-1056').addClass('current-menu-item');
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

//
// Smooth scrolling
//

$('a[href*="#"]')
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
        ) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            event.preventDefault();
            $('html, body').animate({
            scrollTop: target.offset().top
            }, 1000, function() {
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) {
                return false;
            } else {
                $target.attr('tabindex','-1'); 
                $target.focus();
            };
            });
        }
        }

});


//
// Disable Scrolling
//

function preventDefault(e) {
    e = e || window.event;
    if (e.preventDefault)
        e.preventDefault();
    e.returnValue = false;  
}

// function preventDefaultForScrollKeys(e) {
//     if (keys[e.keyCode]) {
//         preventDefault(e);
//         return false;
//     }
// }

function disableScroll() {
    if (window.addEventListener) // older FF
        window.addEventListener('DOMMouseScroll', preventDefault, false);
    window.onwheel = preventDefault; // modern standard
    window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
    window.ontouchmove  = preventDefault; // mobile
    document.onkeydown  = preventDefaultForScrollKeys;
}

function enableScroll() {
    if (window.removeEventListener)
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
    window.onmousewheel = document.onmousewheel = null; 
    window.onwheel = null; 
    window.ontouchmove = null;  
    document.onkeydown = null;  
}

var scrollPossible = true;

$(window).scroll( function() {
    if($('.fbx-2').css('visibility') == 'visible') {
        disableScroll();
        // console.log('no Scroll');
    } else {
        enableScroll();
        // console.log('Scroll');
    }

    // scrollPossible = !scrollPossible;
})
