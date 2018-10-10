jQuery(document).ready(function ($) {
    var divs = $('.wk-fullHeight');
    var dir = 'up'; // wheel scroll direction
    var div = 0; // current div
    var isAnimationFinished = true;
    var currentLinkText = "";
    var currentSearchText = "";
    var currentPortfolioDiv = "";
    var doAppend = true;
    var countSearchedPortfolio = 0;
    var countRowsForPortfolio = 0;
    
	//Position Fixed inside Container
	if($('.wk-specialFixedContent').length > 0){
		$('.wk-specialFixedContent > div > div').width($('.wk-specialFixedContent > div').width());
	}
	
    //Portfolio Search
    $('.wk-portfolioFilter .thb-portfolio-filter > ul > li:last-child > i').click(function(){
        $(this).parent().find('.wk-search').toggle("slow");
    });

    $('.wk-portfolioFilter .thb-portfolio-filter > ul > li:last-child input').keyup( function() {
        if( this.value.length < 3 ){
            $('.wk-fullHeight:not(.wk-foundPortfolioElements)').show();
            $('.wk-fullHeight.wk-foundPortfolioElements').hide();

            /*if(countSearchedPortfolio >= 8 && countRowsForPortfolio > 0){
                $('#searchedPort'+countRowsForPortfolio).remove();
                countSearchedPortfolio = 0;
                countRowsForPortfolio = 0;
            }*/
            $('.wk-foundPortfolioElements > div > div').each(function(){
                $(this).remove();
            });
        }else{
            currentSearchText = $(this).val();
            $('.wk-portfolioPositionFix > div').each(function(){
                currentPortfolioDiv = $(this);
                doAppend = true;
                if($(this).find('a').html().toLowerCase().indexOf(currentSearchText) < 0){
                    $('.wk-foundPortfolioElements > div > div').each(function(){
                        if($(this).attr("class") == currentPortfolioDiv.attr("class")){
                            $(this).remove();
                        }
                    });
                }else{
                    $('.wk-foundPortfolioElements').show();
                    $('.wk-fullHeight:not(.wk-foundPortfolioElements)').hide();

                    $('.wk-foundPortfolioElements > div > div').each(function(){
                        if($(this).attr("class") == currentPortfolioDiv.attr("class")){
                            doAppend = false;
                        }
                    });

                    if(doAppend == true){
                        /*if(countSearchedPortfolio %8 == 0 && countSearchedPortfolio >= 8){
                            countRowsForPortfolio++;
                            $('<section style="display:block;" class="wk-foundPortfolioElements wk-fullHeight" id="searchedPort'+countRowsForPortfolio+'"><div class="wk-portfolioPositionFix"></div></section>').appendTo('.thb-portfolio');
                            $(this).clone().appendTo('#searchedPort'+countRowsForPortfolio+' > div');
                        }else{*/
                            $(this).clone().appendTo('#searchedPort'+countRowsForPortfolio+' > div');
                        //}

                        /*if($(this).hasClass('large-6')){
                            countSearchedPortfolio = countSearchedPortfolio + 2;
                        }else{
                            countSearchedPortfolio++;
                        }*/
                    }
                }
            });
        }
     });

	//Set Header White or Black for Header
	if($('.wk-homeChangeHeaderColorToWhite').length > 0){
		if(isScrolledIntoView($('.wk-homeChangeHeaderColorToWhite'))){
			delayedHeaderColorChangeToWhite();						  
		}else{
			delayedHeaderColorChangeToBlack();
        }
	}

	function isScrolledIntoView(elem){
		var $elem = $(elem);
		var $window = $(window);

		var docViewTop = $window.scrollTop();
		var docViewBottom = docViewTop + $window.height();

		var elemTop = $elem.offset().top;
		var elemBottom = elemTop + $elem.height();

		return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }
    
    function isScrolledIntoViewBottom(elem){
		var $elem = $(elem);
		var $window = $(window);

		var docViewTop = $window.scrollTop();

		var elemTop = $elem.offset().top;

		//TODO REMOVE
        console.log("Scroll: "+docViewTop);
        console.log("Offset: "+elemTop);

        if(docViewTop >= elemTop){
            return true;
        }else{
            return false;
        }
	}

	//Portfolio Filter fix
	if($('nav.thb-portfolio-filter').length > 0){
		$('nav.thb-portfolio-filter > ul > li > a').click(function(){
            $('nav.thb-portfolio-filter > ul > li > a').removeClass('wk-activePortfolioFilter');
            $(this).addClass("wk-activePortfolioFilter");
			//setTimeout(delayedScrollTop, 1500);
			delayedScrollTop();
			currentLinkText = $(this).text().charAt(0);

			$('div.cf > section').hide();
			$('.wk-portfolio'+currentLinkText).show();
			$('#footer').removeClass("wk-footer-visible");
			
			// TODO update number of divs
			divs = $('.vc_section').eq( $(this).parent().index() ).find('.wk-fullHeight');
		});
	}

	//Play Video on Hover
	$(".thb-portfolio.thb_margins .type-portfolio.wk-videoWrapper").hover(
	  function() {
		$( this ).find('video').get(0).play();
	  }, function() {
		$( this ).find('video').get(0).pause();
	  }
    );

	//Modal Dialog
	// When the user clicks the Titel, open the modal
	$('#text-2 > h6').click(function(){
		$('#wk-modal').show();
	});

	// When the user clicks on <span> (x), close the modal
	$('.close').click(function(){
		$('#wk-modal').hide();
	});

	// When the user clicks anywhere outside of the modal, close it
	/*$(window).click(function(event){
		if (event.target == $('#wk-modal')) {
			$('#wk-modal').hide();
			console.log(event.target);
		}
	});*/

    $(document.body).on('mousewheel', function (e) {
        if ($(window).width() > 768) {
            if(isAnimationFinished == true){		
                isAnimationFinished = false;
                
                if(e.originalEvent.deltaY < 0){
                    //UP
                    dir = 'up';
                }else{
                    //DOWN
                    dir = 'down';
                }
                // find currently visible div :
                div = -1;
                divs.each(function(i){
                    if (div<0 && ($(this).offset().top >= $(window).scrollTop())) {
                        div = i;
                    }
                });
				
				console.log("DIV = " + div);
				
                if (dir == 'up' && div > 0) {
                    div--;
                }
                if (dir == 'down' && div < divs.length) {
                    div++;
                }

                if($('.wk-fullHeight:visible').length != div){
                    /*if($('#footer').hasClass('wk-footer-visible') && dir == 'up'){
                        $('#footer').removeClass("wk-footer-visible");

                        //this delay is because of the css animation of the footer
                        setTimeout(wkFooterDelay, 1000);
                    }else{*/
						divs.removeClass('wk-currentView');							   
						divs.eq(div).addClass('wk-currentView');
						if(divs.eq(div).hasClass('wk-homeChangeHeaderColorToBlack')){
							setTimeout(delayedHeaderColorChangeToBlack, 500);
						}else if(divs.eq(div).hasClass('wk-homeChangeHeaderColorToWhite')){
							delayedHeaderColorChangeToWhite();						  
						}
							
                        $('html,body').stop().animate({
                            scrollTop: divs.eq(div).offset().top
                        }, 600, function(){
                            isAnimationFinished = true;
                        });
                    //}
                }else{
                    $('#footer').addClass("wk-footer-visible");
                    setTimeout(wkFooterDelay, 1000);
                }
                
            }

            return false;
        }else{
            /*if($('.wk-homeChangeHeaderColorToWhite').length > 0){
                if(isScrolledIntoViewBottom($('.wk-homeChangeHeaderColorToBlack'))){
                    delayedHeaderColorChangeToBlack();						  
                }else{
                    delayedHeaderColorChangeToWhite();
                }
            }*/
        }
    });

    $('body').bind('touchmove', function(e) { 
        if($('.wk-homeChangeHeaderColorToWhite').length > 0){
            if(isScrolledIntoViewBottom($('.wk-homeChangeHeaderColorToBlack'))){
                delayedHeaderColorChangeToBlack();						  
            }else{
                delayedHeaderColorChangeToWhite();
            }
        }
    });

    /*$(window).resize(function () {
        $('html,body').scrollTop(divs.eq(div).offset().top);
    });*/
	
    function wkFooterDelay(){
        isAnimationFinished = true;
    }
													   
	function delayedScrollTop(){
		jQuery('body,html').animate({
			scrollTop: 0
		}, 600);												  
	}
													   
	function delayedHeaderColorChangeToWhite(){
		$('.wk-socialMediaBlack').hide();
		$('.wk-socialMediaWhite').show();
	}
													   
	function delayedHeaderColorChangeToBlack(){
		$('.wk-socialMediaBlack').show();
		$('.wk-socialMediaWhite').hide();
	}	
});
