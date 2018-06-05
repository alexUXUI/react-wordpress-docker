jQuery(function($) {
	
	'use strict';
	
	/*-----------------------------------------------------------------
	 * Carousels
	 *-----------------------------------------------------------------
	 */
 	
	if($("body").hasClass("rtl")) {
		var rtlcheck = true;
	}
	else{
		var rtlcheck = false;
	}
	
	var dd = $('.news-ticker').easyTicker({
		direction: 'up',
		easing: 'easeInOutBack',
		speed: 'slow',
		interval: 2000,
		height: 'auto',
		visible: 1,
		mousePause: 0,
		controls: {
			up: '.up',
			down: '.down',
			toggle: '.toggle',
			stopText: 'Stop !!!'
		}
	}).data('easyTicker');
	
	owlFun( "#recent-slider" );

	
	
	function owlFun( cowl ){
		
		// Home post Slider
		var nav = $(cowl).attr('data-nav');
		var pag = $(cowl).attr('data-pag');

		$(cowl).owlCarousel({
			loop:true,
			rtl:rtlcheck,
			margin:10,
			nav: parseInt(nav),
			dots: parseInt(pag),
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:1
				}
			}
		});
	}
	
	
	
	builderioFeatured( "#builderio-banner-slider" );
	
		function builderioFeatured( cowl ){
		
		// Home post Slider
		var nav = $(cowl).attr('data-nav');
		var pag = $(cowl).attr('data-pag');
		
		$(cowl).owlCarousel({
			
			loop:true,
			rtl: rtlcheck,
			margin:10,
			nav: parseInt(nav),
			dots: parseInt(pag),
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:1
				}
			}
		});
	}
	
	latestPost( "#latest-slider" );

	
	
	function latestPost( cowl ){
		
		// Home post Slider
		var date_item = $(cowl).attr('data-item');

		$(cowl).owlCarousel({
			loop:true,
			rtl:rtlcheck,
			margin:20,
			nav: false,
			dots: false,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1024:{
					items:parseInt(date_item)
				}
			}
		});
	}
	
	$('.count').each(function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 4000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});
	
	if($('.header-menu').hasClass('sticky-activated')){
		$(window).load(function(){
      	$(".header-menu").sticky({ topSpacing: 0 });
    	});
	}
	
	if( $('.client-post').length ){
		var item_show = $('.client-post').attr('client-item');
		var item_nav = $('.client-post').attr('client-nav');
	}
	$('.client-post').owlCarousel({
		loop:true,
		margin:20,
		rtl:rtlcheck,
		nav:parseInt(item_nav),
		navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:parseInt(item_show)
			}
		}
	});
	/* Page Loader */
	$( window ).load(function() {
		$(".page-loader").fadeOut("slow");
	});
});

