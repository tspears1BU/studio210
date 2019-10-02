( function( $ ) {

	function removeNoJsClass() {
		$( 'html:first' ).removeClass( 'no-js' );
	}
	
	/* Toggle Search Field ------------------------*/
		$('.search-btn').click(function() {
			$('.search-box').fadeToggle(500);
			$('i', this).toggleClass('fa-search fa-times');
		});

	/* Superfish Menu ---------------------*/
	function superfishSetup() {
		$('.menu').superfish({
			delay: 0,
			animation: {opacity:'show', height:'show'},
			speed: 'fast',
			cssArrows: false,
			autoArrows:  false,
			dropShadows: false
		});

		// Fix Superfish menu if off screen.
		var sfMainWindowWidth = $(window).width();

		$('ul.menu li, div.menu li').mouseover(function() {

			// Checks if second level menu exists.
			var subMenuExist = $(this).find('.sub-menu, ul.children').length;
			if ( subMenuExist > 0 ) {
				var subMenuWidth = $(this).find('.sub-menu, ul.children').width();
				var subMenuOffset = $(this).find('.sub-menu, ul.children').parent().offset().left;

				// If sub menu is off screen, give new position.
				if ( ( subMenuOffset + subMenuWidth) > sfMainWindowWidth ) {
					$(this).find('.sub-menu, ul.children').css({
						right: 0,
						left: 'auto',
					});
				}
			}

			// Checks if third level menu exists.
			var subSubMenuExist = $(this).find('.sub-menu .sub-menu, ul.children ul.children').length;
			if ( subSubMenuExist > 0 ) {
				var subSubMenuWidth = $(this).find('.sub-menu .sub-menu, ul.children ul.children').width();
				var subSubMenuOffset = $(this).find('.sub-menu .sub-menu, ul.children ul.children').parent().offset().left + subSubMenuWidth;

				// If sub menu is off screen, give new position.
				if ( ( subSubMenuOffset + subSubMenuWidth) > sfMainWindowWidth){
					var newSubSubMenuPosition = subSubMenuWidth + 0;
					$(this).find('.sub-menu .sub-menu, ul.children ul.children').css({
						left: -newSubSubMenuPosition,
						right: 'auto',
					});
				}
			}

		});

	}

	/* Disable Superfish On Mobile ---------------------*/
	function superfishMobile() {
		var sf, body;
		var breakpoint = 767;
		body = $('body');
		sf = $('ul.menu');
		if ( body.width() >= breakpoint ) {
			// Enable superfish when the page first loads if we're on desktop
			sf.superfish();
		}
		$(window).resize(function() {
			if ( body.width() >= breakpoint && !sf.hasClass('sf-js-enabled') ) {
				// You only want SuperFish to be re-enabled once (sf.hasClass)
				sf.superfish('init');
			} else if ( body.width() < breakpoint ) {
				// Smaller screen, disable SuperFish
				sf.superfish('destroy');
			}
		});
	}

	/* Flexslider ---------------------*/
	function flexSliderSetup() {
		if( ($).flexslider) {
			var slider = $('.flexslider');
			slider.flexslider({
				slideshowSpeed		: slider.attr('data-speed'),
				animationDuration	: 800,
				animation			: slider.attr('data-transition'),
				video				: false,
				useCSS				: false,
				prevText			: '<i class="fa fa-angle-left"></i>',
				nextText			: '<i class="fa fa-angle-right"></i>',
				touch				: true,
				controlNav			: true,
				animationLoop		: true,
				smoothHeight		: true,
				pauseOnAction		: true,
				pauseOnHover		: true,

				start: function(slider) {
					slider.removeClass('loading');
					$( ".preloader" ).hide();
				}
			});
		}
	}
	
	

	/* Masonry ---------------------*/
	function masonrySetup() {
		var $container = $('.portfolio-projects, .testimonial-posts');
		$container.masonry({
			itemSelector : '.single, .half, .third, .fourth'
		});
	}

	function modifyPosts() {

		/* Toggle Mobile Menu Icon ---------------------*/
		$('.menu-toggle').click(function() {
			$('.icon-menu-open').toggle();
			$('.icon-menu-close').toggle();
		});
		
		/* Mobile Menu - adding classes ---------------------*/
	
		$( ".menu-item ul" ).addClass( "dl-submenu" );
		$( "#dl-menu").prepend('<button class="dl-trigger"><i class="fa fa-bars"></i></button>');
		$('.dl-trigger').click(function() {
			$('i', this).toggleClass('fa-bars fa-times');
		});

		/* Insert Line Break Before More Links ---------------------*/
		$('<br />').insertBefore('p a.more-link');

		/* Animate Page Scroll ---------------------*/
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
		});

		/* Fit Vids ---------------------*/
		$('.content').fitVids();

		/* Check Element BG Brightness ---------------------*/
		$('.banner-img').backgroundImageBrightness();

		/* Check Element BG Color ---------------------*/
		$('#nav-bar').colourBrightness();
		$('.footer').colourBrightness();
		
		/* DL-Mobile Menu -------------------*/
		$( '#dl-menu' ).dlmenu();
		
		/* Responsive Tabs -------------------*/
		
		$('#responsiveTabs').responsiveTabs({
			startCollapsed: false
		});

	}

	$( document )
	.ready( removeNoJsClass )
	.ready( superfishSetup )
	.ready( superfishMobile )
	.ready( modifyPosts )
	.on( 'post-load', modifyPosts );
	

	$( window )
	.load( flexSliderSetup )
	.load( masonrySetup )
	.resize( masonrySetup );

})( jQuery );
