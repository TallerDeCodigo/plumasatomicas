(function($){

	"use strict";

	$(function(){


		console.log('hello from functions.js');

		/**
		 * Validación de emails
		 */
		window.validateEmail = function (email) {
			var regExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return regExp.test(email);
		};



		/**
		 * Regresa todos los valores de un formulario como un associative array 
		 */
		window.getFormData = function (selector) {
			var result = [],
				data   = $(selector).serializeArray();

			$.map(data, function (attr) {
				result[attr.name] = attr.value;
			});
			return result;
		}

		$(window).on("load",function(){
		$("#menu-resp *").animate({opacity: 0 }, 100);
		$("#menu-resp").hide();
		setTimeout(function() {
				$("#cardss").animate({opacity: 1 }, 300);
		}, 1000);
});
$('.overscreen').hide();
$(document).ready(function(){
	$('.postura_link').mouseenter(function(){
		$('.overscreen').fadeIn('slow');
	});

	$('.postura_link').mouseleave(function(){
		$('.overscreen').fadeOut('slow');
	});
});

$(window).on("load resize",function(){

		var ancho = document.documentElement.clientWidth;
		var alto = document.documentElement.clientHeight;
		if (alto < 783) {
			$("#list-container").css("height", alto-400+"px");
			$('#up-btn').css("bottom",alto-432+"px");
		} else {
			$("#list-container").css("height", "383px");
			$('#up-btn').css("bottom","349px");
		}
		if (ancho <= 685) {
				$(".oversc").css("top", "69px");
				var altover = alto-69 + "px";
				// $(".oversc").css("height", altover);
		} else {
				$(".oversc").css("top", "75px");
				var altover = alto-75 + "px";
				if(alto < 540){
					$(".menu2").css("height", altover);
				}else{
					$(".menu2").css("height", 'auto');
				}
		}
		var fixed = (ancho-950)/2;
		fixed = fixed + "px";
		$(".list").css("left", fixed);
		var cardw = ancho + "px";
		$(".card-container").css("width", cardw);
		var anchofill = 0;
		if (ancho < 1280) {
				if (ancho > 950) {
						anchofill = ancho*0.86;
						anchofill = (ancho-anchofill)/2;
						var izquierda = "-"+ anchofill + "px";
						$(".filler").css("width", anchofill);
						$(".filler").css("right", izquierda);
						$(".question-filler").css("width", anchofill);
						$(".question-filler").css("left", izquierda);
				} else {
						anchofill = (ancho-950)/2;
						var izquierda = "-"+ anchofill + "px";
						$(".filler").css("width", anchofill);
						$(".filler").css("right", izquierda);
						$(".question-filler").css("width", anchofill);
						$(".question-filler").css("left", izquierda);
				}
		} else {
				anchofill = (ancho-1100)/2;
				var izquierda = "-"+ anchofill + "px";
				$(".filler").css("width", anchofill);
				$(".filler").css("right", izquierda);
				$(".question-filler").css("width", anchofill);
				$(".question-filler").css("left", izquierda);
		}
		var sidebar = $('.sidebar').height();
		var content = $('.contenido').height();
		content = content + 45;
		$(".sidebar").css("height", content);
		$(".filler").css("height", content);
		$("#big-image").css("width", "101%");
		$("#big-image").css("height", "auto");
		var bigimageh = $('#big-image').height();
		var bigimagew = $('#big-image').width();

		/*INSERTAR PRELOADER*/

		if (bigimageh < 480 ) {
				$("#big-image").css("height", "101%");
				$("#big-image").css("width", "auto");
		} else if (bigimagew < ancho) {
				$("#big-image").css("width", "101%");
				$("#big-image").css("height", "auto");
		}
		var resumen = alto-100;
		var descrip = $('.descrip').height();
		resumen = resumen + "px" ;
		$("#resumen-bkg").css("height", "101%");
		$("#resumen-bkg").css("width", "auto");
		var resimg = $('#resumen-bkg').width();
		if (ancho >= resimg) {
				$("#resumen-bkg").css("width", "101%");
				$("#resumen-bkg").css("height", "auto");
		} else {
				$("#resumen-bkg").css("height", "101%");
				$("#resumen-bkg").css("width", "auto");
		}
		if (ancho < 685) {
				$("#grandot").removeClass("topp").addClass("mini");
		} else {
				$("#grandot").removeClass("mini").addClass("topp");
		}
		var proporciona = $(".ficha-main").width();
		var proporcionb = $(".ficha-main").height();
		var proporcion = (proporciona*535)/950;
		var imagena = $(".ficha-main img").width();
		var imagenb = $(".ficha-main img").height();
		if (ancho > 999 ) {
				$(".ficha-main").css("height", "535px");
				if (imagenb < 535 && imagena > proporciona ) {
					$(".ficha-main img").css("height", "102%");
					$(".ficha-main img").css("width", "auto");
				} else {
					$(".ficha-main img").css("width", "102%");
					$(".ficha-main img").css("height", "auto");
					var checkb = $(".ficha-main img").height();
					if (checkb < 535) {
						$(".ficha-main img").css("height", "102%");
						$(".ficha-main img").css("width", "auto");
					}
				}
		} else {
				if (proporcion > 360) {
						proporcion = proporcion + "px";
						$(".ficha-main").css("height", proporcion);
				} else {
						$(".ficha-main").css("height", "360px");
				}
				if (imagena < proporciona && imagenb > proporcionb ) {
					$(".ficha-main img").css("width", "102%");
					$(".ficha-main img").css("height", "auto");
					console.log("menor");
				} else {
					$(".ficha-main img").css("height", "102%");
					$(".ficha-main img").css("width", "auto");
					var checka = $(".ficha-main img").width();
					if (checka < proporciona) {
						$(".ficha-main img").css("width", "102%");
						$(".ficha-main img").css("height", "auto");
					}
				}
		}
		console.log(proporcionb+" "+imagenb);
		if (proporcionb > imagenb ) {
			
		}
}); //END WINDOW LOAD RESIZE

$(window).on("resize",function(){
		// if ($("body").is("#cardss")) {
		//     $( document.body ).trigger({
		//         type: 'keypress',
		//         which: 37,
		//         keyCode: 37
		//     });
		// }
});	//END WINDOW RESIZE


$(window).load(function(){
		$(function() {
				$(".searchbar a").click(function(){
						var anchohead = document.documentElement.clientWidth;
						$(".searchbar").show();
						if (anchohead < 640 ) {
								$("#header-logo").animate({opacity:"0"}, 150);
						}
						$(".socc").animate({opacity:"0"}, 150);
						$(".searchbar").animate({width:"200px"}, 300);
						setTimeout(function() {
								$(".searchbar input").show();
								$(".searchbar input").focus();
						}, 500);
				});

				$("#menuss").click(function(){
						
				});

				$('#nav-icon3').click(function(){
						$("#nav-icon3").toggleClass('open');
						//$("body").toggleClass('fixeddd');
						// var anchohead1 = document.documentElement.clientWidth;
						// if (anchohead1 < 900 ) {
						// 		if ($('.oversc').css('display') != 'none') {
						// 				$(".menu1").animate({left:"-240px"}, 400);
						// 				setTimeout(function() { $(".oversc").animate({opacity:"0"}, 150) }, 300);
						// 				setTimeout(function() { $(".oversc").hide() }, 450);
						// 		} else {
						// 				$(".oversc").show();
						// 				$(".oversc").animate({opacity:"1"}, 150);
						// 				$(".menu1").animate({left:"0px"}, 400);
						// 		}
						// } else {
								if ($('.oversc').css('display') != 'none') {
										$(".menu2 a").animate({opacity:"0",fontSize:"100%"}, 400);
										setTimeout(function() { $(".oversc").animate({opacity:"0"}, 150) }, 300);
										setTimeout(function() { $(".oversc").hide(); $(".menu2").hide(); }, 450);
								} else {
										$(".oversc").show();
										$(".menu2").show();
										$(".oversc").animate({opacity:"1"}, 150);
										setTimeout(function() { $(".menu2 a").animate({opacity:"1",fontSize:"90%"}, 500) }, 300);
										
								}
						// }

				});

				$(".bkgpa").click(function(){
						$("#nav-icon3").toggleClass('open');
						// $(".menu1").animate({left:"-240px"}, 400);
						// setTimeout(function() { $(".oversc").animate({opacity:"0"}, 150) }, 300);
						// setTimeout(function() { $(".oversc").hide() }, 450);
						$(".menu2 a").animate({opacity:"0",fontSize:"100%"}, 400);
						setTimeout(function() { $(".oversc").animate({opacity:"0"}, 150) }, 300);
						setTimeout(function() { $(".oversc").hide() }, 450);
				});

				$("#up-btn").click(function(){
						$("#list-container").animate({scrollTop: 0 }, 300);
				});

				$("#dw-btn").click(function(){
						$("#list-container").animate({scrollTop: 384 }, 300);
				});

				$("#close-icon").click(function(){
						$("#menu-resp *").animate({opacity: 0 }, 250);
						setTimeout(function() {$("#menu-resp").animate({height:'toggle'}, 250) }, 150);
						setTimeout(function() {$("#menu-resp").hide() }, 500);
				});

				$("#ficha-icon").click(function(){
						var fprespons1 = $('#fullpage').width();
						if (fprespons1 < 900 && $('#menu-resp').css('display') != 'none') {
								$("#menu-resp *").animate({opacity: 0 }, 250);
								setTimeout(function() {$("#menu-resp").animate({height:'toggle'}, 250) }, 150);
								setTimeout(function() {$("#menu-resp").hide() }, 500);
						} else if (fprespons1 < 900 ) {
								$("#menu-resp").show();
								setTimeout(function() {$("#menu-resp *").animate({opacity: 1 }, 250) }, 50);
								var altolista = document.documentElement.clientHeight;
								altolista = altolista-330;
								/*
								var altolista = $("#list-resp ol li:nth-of-type(8)").position().top;
								altolista = altolista+21 + "px";
								*/
								if (fprespons1 < 700) {
										altolista = altolista + "px";
										$("#list-resp").css("height", altolista);
								}
						}
				});

				$("#list-resp ol li").click(function() {
						var clicken = $(this).index();
						clicken = clicken+1;
						clicken = '#resp-main ol li:nth-of-type('+clicken+') a';
						$(clicken).trigger( "click" );
				});

		});
}); //END LOAD FUNCTION


$(document).mouseup(function (e){
		var container = $(".searchbar");
		if (!container.is(e.target)&& container.has(e.target).length === 0) {
				var anchohead = document.documentElement.clientWidth;
				$(".searchbar input").hide();
				$(".searchbar").animate({width:"32px"}, 200);    
				setTimeout(function() {
						if (anchohead < 640 ) { $("#header-logo").animate({opacity:"1"}, 200) } 
						$(".socc").animate({opacity:"1"}, 200); 
				}, 250);
		}
});//END MOUSEUP

window.Swipe = function(element, options) {

	// return immediately if element doesn't exist
	if (!element) return null;

	var _this = this;

	// retreive options
	this.options = options || {};
	this.index = this.options.startSlide || 0;
	this.speed = this.options.speed || 400;
	this.callback = this.options.callback || function() {};
	this.delay = this.options.auto || 0;

	// reference dom elements
	this.container = element;
	this.element = this.container.children[0]; // the slide pane

	// static css
	this.container.style.overflow = 'hidden';
	this.element.style.listStyle = 'none';
	this.element.style.margin = 0;

	// trigger slider initialization
	this.setup();

	// begin auto slideshow
	this.begin();

	// add event listeners
	if (this.element.addEventListener) {
		this.element.addEventListener('touchstart', this, false);
		this.element.addEventListener('touchmove', this, false);
		this.element.addEventListener('touchend', this, false);
		this.element.addEventListener('touchcancel', this, false);
		this.element.addEventListener('webkitTransitionEnd', this, false);
		this.element.addEventListener('msTransitionEnd', this, false);
		this.element.addEventListener('oTransitionEnd', this, false);
		this.element.addEventListener('transitionend', this, false);
		window.addEventListener('resize', this, false);
	}
};//END SWIPE

Swipe.prototype = {

	setup: function() {

		// get and measure amt of slides
		this.slides = this.element.children;
		this.length = this.slides.length;

		// return immediately if their are less than two slides
		if (this.length < 2) return null;

		// determine width of each slide
		this.width = Math.ceil(("getBoundingClientRect" in this.container) ? this.container.getBoundingClientRect().width : this.container.offsetWidth);

		// return immediately if measurement fails
		if (!this.width) return null;

		// hide slider element but keep positioning during setup
		this.container.style.visibility = 'hidden';

		// dynamic css
		this.element.style.width = Math.ceil(this.slides.length * this.width) + 'px';
		var index = this.slides.length;
		while (index--) {
			var el = this.slides[index];
			el.style.width = this.width + 'px';
			el.style.display = 'table-cell';
			el.style.verticalAlign = 'top';
		}

		// set start position and force translate to remove initial flickering
		this.slide(this.index, 0); 

		// show slider element
		this.container.style.visibility = 'visible';

	},

	slide: function(index, duration) {

		var style = this.element.style;

		// fallback to default speed
		if (duration == undefined) {
				duration = this.speed;
		}

		// set duration speed (0 represents 1-to-1 scrolling)
		style.webkitTransitionDuration = style.MozTransitionDuration = style.msTransitionDuration = style.OTransitionDuration = style.transitionDuration = duration + 'ms';

		// translate to given index position
		style.MozTransform = style.webkitTransform = 'translate3d(' + -(index * this.width) + 'px,0,0)';
		style.msTransform = style.OTransform = 'translateX(' + -(index * this.width) + 'px)';

		// set new index to allow for expression arguments
		this.index = index;
		if (index == 0) {
			window.location.hash = '#stack-name/';
		}
		if (index == 1) {
			window.location.hash = '#stack-name/1';
		}
		if (index == 2) {
			window.location.hash = '#stack-name/2';
		}
		if (index == 3) {
			window.location.hash = '#stack-name/3';
		}
	},

	getPos: function() {
		
		// return current index position
		return this.index;

	},

	gotos: function(delay,acual) {

		// cancel next scheduled automatic transition, if any
		this.delay = delay || 0;
		clearTimeout(this.interval);
		
		if (this.index!= acual) this.slide(acual, this.speed);

	},
	
	prev: function(delay) {

		// cancel next scheduled automatic transition, if any
		this.delay = delay || 0;
		clearTimeout(this.interval);
		
		if (this.index != 0) this.slide(this.index-1, this.speed);
		else this.slide(2, this.speed);

	},

	next: function(delay) {

		// cancel next scheduled automatic transition, if any
		this.delay = delay || 0;
		clearTimeout(this.interval);

		if (this.index < this.length - 1) this.slide(this.index+1, this.speed); // if not last slide
		else this.slide(0, this.speed);

	},

	begin: function() {

		var _this = this;

		this.interval = (this.delay)
			? setTimeout(function() { 
				_this.next(_this.delay);
			}, this.delay)
			: 0;
	
	},
	
	stop: function() {
		this.delay = 0;
		clearTimeout(this.interval);
	},
	
	resume: function() {
		this.delay = this.options.auto || 0;
		this.begin();
	},

	handleEvent: function(e) {
		switch (e.type) {
			case 'touchstart': this.onTouchStart(e); break;
			case 'touchmove': this.onTouchMove(e); break;
			case 'touchcancel' :
			case 'touchend': this.onTouchEnd(e); break;
			case 'webkitTransitionEnd':
			case 'msTransitionEnd':
			case 'oTransitionEnd':
			case 'transitionend': this.transitionEnd(e); break;
			case 'resize': this.setup(); break;
		}
	},

	transitionEnd: function(e) {
		
		if (this.delay) this.begin();

		this.callback(e, this.index, this.slides[this.index]);

	},

	onTouchStart: function(e) {
		
		this.start = {

			// get touch coordinates for delta calculations in onTouchMove
			pageX: e.touches[0].pageX,
			pageY: e.touches[0].pageY,

			// set initial timestamp of touch sequence
			time: Number( new Date() )

		};

		// used for testing first onTouchMove event
		this.isScrolling = undefined;
		
		// reset deltaX
		this.deltaX = 0;

		// set transition time to 0 for 1-to-1 touch movement
		this.element.style.MozTransitionDuration = this.element.style.webkitTransitionDuration = 0;
		
		e.stopPropagation();
	},

	onTouchMove: function(e) {

		// ensure swiping with one touch and not pinching
		if(e.touches.length > 1 || e.scale && e.scale !== 1) return;

		this.deltaX = e.touches[0].pageX - this.start.pageX;

		// determine if scrolling test has run - one time test
		if ( typeof this.isScrolling == 'undefined') {
			this.isScrolling = !!( this.isScrolling || Math.abs(this.deltaX) < Math.abs(e.touches[0].pageY - this.start.pageY) );
		}

		// if user is not trying to scroll vertically
		if (!this.isScrolling) {

			// prevent native scrolling 
			e.preventDefault();

			// cancel slideshow
			clearTimeout(this.interval);

			// increase resistance if first or last slide
			this.deltaX = 
				this.deltaX / 
					( (!this.index && this.deltaX > 0               // if first slide and sliding left
						|| this.index == this.length - 1              // or if last slide and sliding right
						&& this.deltaX < 0                            // and if sliding at all
					) ?                      
					( Math.abs(this.deltaX) / this.width + 1 )      // determine resistance level
					: 1 );                                          // no resistance if false
			
			// translate immediately 1-to-1
			this.element.style.MozTransform = this.element.style.webkitTransform = 'translate3d(' + (this.deltaX - this.index * this.width) + 'px,0,0)';
			
			e.stopPropagation();
		}

	},

	onTouchEnd: function(e) {

		// determine if slide attempt triggers next/prev slide
		var isValidSlide = 
					Number(new Date()) - this.start.time < 250      // if slide duration is less than 250ms
					&& Math.abs(this.deltaX) > 20                   // and if slide amt is greater than 20px
					|| Math.abs(this.deltaX) > this.width/2,        // or if slide amt is greater than half the width

		// determine if slide attempt is past start and end
				isPastBounds = 
					!this.index && this.deltaX > 0                          // if first slide and slide amt is greater than 0
					|| this.index == this.length - 1 && this.deltaX < 0;    // or if last slide and slide amt is less than 0

		// if not scrolling vertically
		if (!this.isScrolling) {

			// call slide function with slide end value based on isValidSlide and isPastBounds tests
			this.slide( this.index + ( isValidSlide && !isPastBounds ? (this.deltaX < 0 ? 1 : -1) : 0 ), this.speed );

		}
		
		e.stopPropagation();
	}
}; //END SWIPE PROTOTYPE

new Swipe(document.getElementById('wrapper'));
var slider = new Swipe(document.getElementById('wrapper'));


(function(global, factory) {
		'use strict';
		if (typeof define === 'function' && define.amd) {
				define(['jquery'], function($) {
					return factory($, global, global.document, global.Math);
				});
		} else if (typeof exports !== 'undefined') {
				module.exports = factory(require('jquery'), global, global.document, global.Math);
		} else {
				factory(jQuery, global, global.document, global.Math);
		}
})(typeof window !== 'undefined' ? window : this, function($, window, document, Math, undefined) {
		'use strict';

		// keeping central set of classnames and selectors
		var WRAPPER =               'fullpage-wrapper';
		var WRAPPER_SEL =           '.' + WRAPPER;

		// slimscroll
		var SCROLLABLE =            'fp-scrollable';
		var SCROLLABLE_SEL =        '.' + SCROLLABLE;
		var SLIMSCROLL_BAR_SEL =    '.slimScrollBar';
		var SLIMSCROLL_RAIL_SEL =   '.slimScrollRail';

		// util
		var RESPONSIVE =            'fp-responsive';
		var NO_TRANSITION =         'fp-notransition';
		var DESTROYED =             'fp-destroyed';
		var ENABLED =               'fp-enabled';
		var VIEWING_PREFIX =        'fp-viewing';
		var ACTIVE =                'active';
		var ACTIVE_SEL =            '.' + ACTIVE;
		var COMPLETELY =            'fp-completely';
		var COMPLETELY_SEL =        '.' + COMPLETELY;

		// section
		var SECTION_DEFAULT_SEL =   '.section';
		var SECTION =               'fp-section';
		var SECTION_SEL =           '.' + SECTION;
		var SECTION_ACTIVE_SEL =    SECTION_SEL + ACTIVE_SEL;
		var SECTION_FIRST_SEL =     SECTION_SEL + ':first';
		var SECTION_LAST_SEL =      SECTION_SEL + ':last';
		var TABLE_CELL =            'fp-tableCell';
		var TABLE_CELL_SEL =        '.' + TABLE_CELL;
		var AUTO_HEIGHT =           'fp-auto-height';
		var AUTO_HEIGHT_SEL =       '.fp-auto-height';
		var NORMAL_SCROLL =         'fp-normal-scroll';
		var NORMAL_SCROLL_SEL =     '.fp-normal-scroll';

		// section nav
		var SECTION_NAV =           'fp-nav';
		var SECTION_NAV_SEL =       '#' + SECTION_NAV;
		var SECTION_NAV_TOOLTIP =   'fp-tooltip';
		var SECTION_NAV_TOOLTIP_SEL='.'+SECTION_NAV_TOOLTIP;
		var SHOW_ACTIVE_TOOLTIP =   'fp-show-active';

		// slide
		var SLIDE_DEFAULT_SEL =     '.slide';
		var SLIDE =                 'fp-slide';
		var SLIDE_SEL =             '.' + SLIDE;
		var SLIDE_ACTIVE_SEL =      SLIDE_SEL + ACTIVE_SEL;
		var SLIDES_WRAPPER =        'fp-slides';
		var SLIDES_WRAPPER_SEL =    '.' + SLIDES_WRAPPER;
		var SLIDES_CONTAINER =      'fp-slidesContainer';
		var SLIDES_CONTAINER_SEL =  '.' + SLIDES_CONTAINER;
		var TABLE =                 'fp-table';

		// slide nav
		var SLIDES_NAV =            'fp-slidesNav';
		var SLIDES_NAV_SEL =        '.' + SLIDES_NAV;
		var SLIDES_NAV_LINK_SEL =   SLIDES_NAV_SEL + ' a';
		var SLIDES_ARROW =          'fp-controlArrow';
		var SLIDES_ARROW_SEL =      '.' + SLIDES_ARROW;
		var SLIDES_PREV =           'fp-prev';
		var SLIDES_PREV_SEL =       '.' + SLIDES_PREV;
		var SLIDES_ARROW_PREV =     SLIDES_ARROW + ' ' + SLIDES_PREV;
		var SLIDES_ARROW_PREV_SEL = SLIDES_ARROW_SEL + SLIDES_PREV_SEL;
		var SLIDES_NEXT =           'fp-next';
		var SLIDES_NEXT_SEL =       '.' + SLIDES_NEXT;
		var SLIDES_ARROW_NEXT =     SLIDES_ARROW + ' ' + SLIDES_NEXT;
		var SLIDES_ARROW_NEXT_SEL = SLIDES_ARROW_SEL + SLIDES_NEXT_SEL;

		var $window = $(window);
		var $document = $(document);

		var defaultScrollHandler;

		$.fn.fullpage = function(options) {
				//only once my friend!
				if($('html').hasClass(ENABLED)){ displayWarnings(); return };

				// common jQuery objects
				var $htmlBody = $('html, body');
				var $body = $('body');

				var FP = $.fn.fullpage;
				// Create some defaults, extending them with any options that were provided
				options = $.extend({
						//navigation
						menu: false,
						anchors:[],
						lockAnchors: false,
						navigation: false,
						navigationPosition: 'right',
						navigationTooltips: [],
						showActiveTooltip: false,
						slidesNavigation: false,
						slidesNavPosition: 'bottom',
						scrollBar: false,
						hybrid: false,

						//scrolling
						css3: true,
						scrollingSpeed: 500,
						autoScrolling: true,
						fitToSection: true,
						fitToSectionDelay: 5000,
						easing: 'easeInOutCubic',
						easingcss3: 'ease',
						loopBottom: false,
						loopTop: false,
						loopHorizontal: false,
						continuousVertical: false,
						normalScrollElements: null,
						scrollOverflow: false,
						scrollOverflowHandler: defaultScrollHandler,
						touchSensitivity: 5,
						normalScrollElementTouchThreshold: 5,

						//Accessibility
						keyboardScrolling: true,
						animateAnchor: true,
						recordHistory: true,

						//design
						controlArrows: true,
						controlArrowColor: '#fff',
						verticalCentered: true,
						resize: true,
						sectionsColor : [],
						paddingTop: 0,
						paddingBottom: 0,
						fixedElements: null,
						responsive: 0, //backwards compabitility with responsiveWiddth
						responsiveWidth: 0,
						responsiveHeight: 0,

						//Custom selectors
						sectionSelector: SECTION_DEFAULT_SEL,
						slideSelector: SLIDE_DEFAULT_SEL,


						//events
						afterLoad: null,
						onLeave: null,
						afterRender: null,
						afterResize: null,
						afterReBuild: null,
						afterSlideLoad: null,
						onSlideLeave: null
				}, options);

				displayWarnings();

				//easeInOutCubic animation included in the plugin
				$.extend($.easing,{ easeInOutCubic: function (x, t, b, c, d) {if ((t/=d/2) < 1) return c/2*t*t*t + b;return c/2*((t-=2)*t*t + 2) + b;}});

				/**
				* Sets the autoScroll option.
				* It changes the scroll bar visibility and the history of the site as a result.
				*/
				FP.setAutoScrolling = function(value, type){
						setVariableState('autoScrolling', value, type);

						var element = $(SECTION_ACTIVE_SEL);

						if(options.autoScrolling && !options.scrollBar){
								$htmlBody.css({
										'overflow' : 'hidden',
										'height' : '100%'
								});

								FP.setRecordHistory(originals.recordHistory, 'internal');

								//for IE touch devices
								container.css({
										'-ms-touch-action': 'none',
										'touch-action': 'none'
								});

								if(element.length){
										//moving the container up
										silentScroll(element.position().top);
								}

						}else{
								$htmlBody.css({
										'overflow' : 'visible',
										'height' : 'initial'
								});

								FP.setRecordHistory(false, 'internal');

								//for IE touch devices
								container.css({
										'-ms-touch-action': '',
										'touch-action': ''
								});

								silentScroll(0);

								//scrolling the page to the section with no animation
								if (element.length) {
										$htmlBody.scrollTop(element.position().top);
								}
						}
				};

				/**
				* Defines wheter to record the history for each hash change in the URL.
				*/
				FP.setRecordHistory = function(value, type){
						setVariableState('recordHistory', value, type);
				};

				/**
				* Defines the scrolling speed
				*/
				FP.setScrollingSpeed = function(value, type){
						setVariableState('scrollingSpeed', value, type);
				};

				/**
				* Sets fitToSection
				*/
				FP.setFitToSection = function(value, type){
						setVariableState('fitToSection', value, type);
				};

				/**
				* Sets lockAnchors
				*/
				FP.setLockAnchors = function(value){
						options.lockAnchors = value;
				};

				/**
				* Adds or remove the possiblity of scrolling through sections by using the mouse wheel or the trackpad.
				*/
				FP.setMouseWheelScrolling = function (value){
						if(value){
								addMouseWheelHandler();
								addMiddleWheelHandler();
						}else{
								removeMouseWheelHandler();
								removeMiddleWheelHandler();
						}
				};

				/**
				* Adds or remove the possiblity of scrolling through sections by using the mouse wheel/trackpad or touch gestures.
				* Optionally a second parameter can be used to specify the direction for which the action will be applied.
				*
				* @param directions string containing the direction or directions separated by comma.
				*/
				FP.setAllowScrolling = function (value, directions){
						if(typeof directions !== 'undefined'){
								directions = directions.replace(/ /g,'').split(',');

								$.each(directions, function (index, direction){
										setIsScrollAllowed(value, direction, 'm');
								});
						}
						else if(value){
								FP.setMouseWheelScrolling(true);
								addTouchHandler();
						}else{
								FP.setMouseWheelScrolling(false);
								removeTouchHandler();
						}
				};

				/**
				* Adds or remove the possiblity of scrolling through sections by using the keyboard arrow keys
				*/
				FP.setKeyboardScrolling = function (value, directions){
						if(typeof directions !== 'undefined'){
								directions = directions.replace(/ /g,'').split(',');

								$.each(directions, function (index, direction){
										setIsScrollAllowed(value, direction, 'k');
								});
						}else{
								options.keyboardScrolling = value;
						}
				};

				/**
				* Moves the page up one section.
				*/
				FP.moveSectionUp = function(){
						var prev = $(SECTION_ACTIVE_SEL).prev(SECTION_SEL);

						//looping to the bottom if there's no more sections above
						if (!prev.length && (options.loopTop || options.continuousVertical)) {
								prev = $(SECTION_SEL).last();
						}

						if (prev.length) {
								scrollPage(prev, null, true);
						}
				};

				/**
				* Moves the page down one section.
				*/
				FP.moveSectionDown = function (){
						var next = $(SECTION_ACTIVE_SEL).next(SECTION_SEL);

						//looping to the top if there's no more sections below
						if(!next.length &&
								(options.loopBottom || options.continuousVertical)){
								next = $(SECTION_SEL).first();
						}

						if(next.length){
								scrollPage(next, null, false);
						}
				};

				/**
				* Moves the page to the given section and slide with no animation.
				* Anchors or index positions can be used as params.
				*/
				FP.silentMoveTo = function(sectionAnchor, slideAnchor){
						FP.setScrollingSpeed (0, 'internal');
						FP.moveTo(sectionAnchor, slideAnchor)
						FP.setScrollingSpeed (originals.scrollingSpeed, 'internal');
				};

				/**
				* Moves the page to the given section and slide.
				* Anchors or index positions can be used as params.
				*/
				FP.moveTo = function (sectionAnchor, slideAnchor){
						var destiny = getSectionByAnchor(sectionAnchor);

						if (typeof slideAnchor !== 'undefined'){
								scrollPageAndSlide(sectionAnchor, slideAnchor);
						}else if(destiny.length > 0){
								scrollPage(destiny);
						}
				};

				/**
				* Slides right the slider of the active section.
				* Optional `section` param.
				*/
				FP.moveSlideRight = function(section){
						moveSlide('next', section);
				};

				/**
				* Slides left the slider of the active section.
				* Optional `section` param.
				*/
				FP.moveSlideLeft = function(section){
						moveSlide('prev', section);
				};

				/**
				 * When resizing is finished, we adjust the slides sizes and positions
				 */
				FP.reBuild = function(resizing){
						if(container.hasClass(DESTROYED)){ return; }  //nothing to do if the plugin was destroyed

						isResizing = true;

						var windowsWidth = $window.outerWidth();
						windowsHeight = $window.height();  //updating global var

						//text resizing
						if (options.resize) {
								resizeMe(windowsHeight, windowsWidth);
						}

						$(SECTION_SEL).each(function(){
								var slidesWrap = $(this).find(SLIDES_WRAPPER_SEL);
								var slides = $(this).find(SLIDE_SEL);

								//adjusting the height of the table-cell for IE and Firefox
								if(options.verticalCentered){
										$(this).find(TABLE_CELL_SEL).css('height', getTableHeight($(this)) + 'px');
								}

								$(this).css('height', windowsHeight + 'px');

								//resizing the scrolling divs
								if(options.scrollOverflow){
										if(slides.length){
												slides.each(function(){
														createSlimScrolling($(this));
												});
										}else{
												createSlimScrolling($(this));
										}
								}

								//adjusting the position fo the FULL WIDTH slides...
								if (slides.length > 1) {
										landscapeScroll(slidesWrap, slidesWrap.find(SLIDE_ACTIVE_SEL));
								}
						});

						var activeSection = $(SECTION_ACTIVE_SEL);
						var sectionIndex = activeSection.index(SECTION_SEL);

						//isn't it the first section?
						if(sectionIndex){
								//adjusting the position for the current section
								FP.silentMoveTo(sectionIndex + 1);
						}

						isResizing = false;
						$.isFunction( options.afterResize ) && resizing && options.afterResize.call(container);
						$.isFunction( options.afterReBuild ) && !resizing && options.afterReBuild.call(container);
				};

				/**
				* Turns fullPage.js to normal scrolling mode when the viewport `width` or `height`
				* are smaller than the set limit values.
				*/
				FP.setResponsive = function (active){
						var isResponsive = $body.hasClass(RESPONSIVE);

						if(active){
								if(!isResponsive){
										FP.setAutoScrolling(false, 'internal');
										FP.setFitToSection(false, 'internal');
										$(SECTION_NAV_SEL).hide();
										$body.addClass(RESPONSIVE);
								}
						}
						else if(isResponsive){
								FP.setAutoScrolling(originals.autoScrolling, 'internal');
								FP.setFitToSection(originals.autoScrolling, 'internal');
								$(SECTION_NAV_SEL).show();
								$body.removeClass(RESPONSIVE);
						}
				}

				//flag to avoid very fast sliding for landscape sliders
				var slideMoving = false;

				var isTouchDevice = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|playbook|silk|BlackBerry|BB10|Windows Phone|Tizen|Bada|webOS|IEMobile|Opera Mini)/);
				var isTouch = (('ontouchstart' in window) || (navigator.msMaxTouchPoints > 0) || (navigator.maxTouchPoints));
				var container = $(this);
				var windowsHeight = $window.height();
				var isResizing = false;
				var isWindowFocused = true;
				var lastScrolledDestiny;
				var lastScrolledSlide;
				var canScroll = true;
				var scrollings = [];
				var nav;
				var controlPressed;
				var isScrollAllowed = {};
				isScrollAllowed.m = {  'up':true, 'down':true, 'left':true, 'right':true };
				isScrollAllowed.k = $.extend(true,{}, isScrollAllowed.m);
				var originals = $.extend(true, {}, options); //deep copy

				//timeouts
				var resizeId;
				var afterSectionLoadsId;
				var afterSlideLoadsId;
				var scrollId;
				var scrollId2;
				var keydownId;

				if($(this).length){
						init();
						bindEvents();
				}

				function init(){
						//if css3 is not supported, it will use jQuery animations
						if(options.css3){
								options.css3 = support3d();
						}

						options.scrollBar = options.scrollBar || options.hybrid;


						setOptionsFromDOM();

						prepareDom();
						FP.setAllowScrolling(true);

						FP.setAutoScrolling(options.autoScrolling, 'internal');

						//the starting point is a slide?
						var activeSlide = $(SECTION_ACTIVE_SEL).find(SLIDE_ACTIVE_SEL);

						//the active section isn't the first one? Is not the first slide of the first section? Then we load that section/slide by default.
						if( activeSlide.length &&  ($(SECTION_ACTIVE_SEL).index(SECTION_SEL) !== 0 || ($(SECTION_ACTIVE_SEL).index(SECTION_SEL) === 0 && activeSlide.index() !== 0))){
								silentLandscapeScroll(activeSlide);
						}

						responsive();

						//setting the class for the body element
						setBodyClass();

						$window.on('load', function() {
								scrollToAnchor();
						});
				}

				function bindEvents(){
						$window
								//when scrolling...
								.on('scroll', scrollHandler)

								//detecting any change on the URL to scroll to the given anchor link
								//(a way to detect back history button as we play with the hashes on the URL)
								.on('hashchange', hashChangeHandler)

								//when opening a new tab (ctrl + t), `control` won't be pressed when comming back.
								.blur(blurHandler)

								//when resizing the site, we adjust the heights of the sections, slimScroll...
								.resize(resizeHandler);

						$document
								//Sliding with arrow keys, both, vertical and horizontal
								.keydown(keydownHandler)

								//to prevent scrolling while zooming
								.keyup(keyUpHandler)

								//Scrolls to the section when clicking the navigation bullet
								.on('click touchstart', SECTION_NAV_SEL + ' a', sectionBulletHandler)

								//Scrolls the slider to the given slide destination for the given section
								.on('click touchstart', SLIDES_NAV_LINK_SEL, slideBulletHandler)

								.on('click', SECTION_NAV_TOOLTIP_SEL, tooltipTextHandler);

						//Scrolling horizontally when clicking on the slider controls.
						var ahoraa = "#start-btn";
						$(SECTION_SEL).on('click touchstart', SLIDES_ARROW_SEL, slideArrowHandler);

						/**
						* Applying normalScroll elements.
						* Ignoring the scrolls over the specified selectors.
						*/
						if(options.normalScrollElements){
								$document.on('mouseenter', options.normalScrollElements, function () {
										FP.setMouseWheelScrolling(false);
								});

								$document.on('mouseleave', options.normalScrollElements, function(){
										FP.setMouseWheelScrolling(true);
								});
						}
				}

				/**
				* Setting options from DOM elements if they are not provided.
				*/
				function setOptionsFromDOM(){
						//no anchors option? Checking for them in the DOM attributes
						if(!options.anchors.length){
								options.anchors = $(options.sectionSelector + '[data-anchor]').map(function(){
										return $(this).data('anchor').toString();
								}).get();
						}

						//no tooltipos option? Checking for them in the DOM attributes
						if(!options.navigationTooltips.length){
								options.navigationTooltips = $(options.sectionSelector + '[data-tooltip]').map(function(){
										return $(this).data('tooltip').toString();
								}).get();
						}
				}

				/**
				* Works over the DOM structure to set it up for the current fullpage optionss.
				*/
				function prepareDom(){
						container.css({
								'height': '100%',
								'position': 'relative'
						});

						//adding a class to recognize the container internally in the code
						container.addClass(WRAPPER);
						$('html').addClass(ENABLED);

						//due to https://github.com/alvarotrigo/fullPage.js/issues/1502
						windowsHeight = $window.height();

						container.removeClass(DESTROYED); //in case it was destroyed before initilizing it again

						addInternalSelectors();

						 //styling the sections / slides / menu
						$(SECTION_SEL).each(function(index){
								var section = $(this);
								var slides = section.find(SLIDE_SEL);
								var numSlides = slides.length;

								styleSection(section, index);
								styleMenu(section, index);

								// if there's any slide
								if (numSlides > 0) {
										styleSlides(section, slides, numSlides);
								}else{
										if(options.verticalCentered){
												addTableClass(section);
										}
								}
						});

						//fixed elements need to be moved out of the plugin container due to problems with CSS3.
						if(options.fixedElements && options.css3){
								$(options.fixedElements).appendTo($body);
						}

						//vertical centered of the navigation + active bullet
						if(options.navigation){
								addVerticalNavigation();
						}

						if(options.scrollOverflow){
								if(document.readyState === 'complete'){
										createSlimScrollingHandler();
								}
								//after DOM and images are loaded
								$window.on('load', createSlimScrollingHandler);
						}else{
								afterRenderActions();
						}
				}

				/**
				* Styles the horizontal slides for a section.
				*/
				function styleSlides(section, slides, numSlides){
						var sliderWidth = numSlides * 100;
						var slideWidth = 100 / numSlides;

						slides.wrapAll('<div class="' + SLIDES_CONTAINER + '" />');
						slides.parent().wrap('<div class="' + SLIDES_WRAPPER + '" />');

						section.find(SLIDES_CONTAINER_SEL).css('width', sliderWidth + '%');

						if(numSlides > 1){
								if(options.controlArrows){
										createSlideArrows(section);
								}

								if(options.slidesNavigation){
										addSlidesNavigation(section, numSlides);
								}
						}

						slides.each(function(index) {
								$(this).css('width', slideWidth + '%');

								if(options.verticalCentered){
										addTableClass($(this));
								}
						});

						var startingSlide = section.find(SLIDE_ACTIVE_SEL);

						//if the slide won't be an starting point, the default will be the first one
						//the active section isn't the first one? Is not the first slide of the first section? Then we load that section/slide by default.
						if( startingSlide.length &&  ($(SECTION_ACTIVE_SEL).index(SECTION_SEL) !== 0 || ($(SECTION_ACTIVE_SEL).index(SECTION_SEL) === 0 && startingSlide.index() !== 0))){
								silentLandscapeScroll(startingSlide);
						}else{
								slides.eq(0).addClass(ACTIVE);
						}
				}

				/**
				* Styling vertical sections
				*/
				function styleSection(section, index){
						//if no active section is defined, the 1st one will be the default one
						if(!index && $(SECTION_ACTIVE_SEL).length === 0) {
								section.addClass(ACTIVE);
						}

						section.css('height', windowsHeight + 'px');

						if(options.paddingTop){
								section.css('padding-top', options.paddingTop);
						}

						if(options.paddingBottom){
								section.css('padding-bottom', options.paddingBottom);
						}

						if (typeof options.sectionsColor[index] !==  'undefined') {
								section.css('background-color', options.sectionsColor[index]);
						}

						if (typeof options.anchors[index] !== 'undefined') {
								section.attr('data-anchor', options.anchors[index]);
						}
				}

				/**
				* Sets the data-anchor attributes to the menu elements and activates the current one.
				*/
				function styleMenu(section, index){
						if (typeof options.anchors[index] !== 'undefined') {
								//activating the menu / nav element on load
								if(section.hasClass(ACTIVE)){
										activateMenuAndNav(options.anchors[index], index);
								}
						}

						//moving the menu outside the main container if it is inside (avoid problems with fixed positions when using CSS3 tranforms)
						if(options.menu && options.css3 && $(options.menu).closest(WRAPPER_SEL).length){
								$(options.menu).appendTo($body);
						}
				}

				/**
				* Adds internal classes to be able to provide customizable selectors
				* keeping the link with the style sheet.
				*/
				function addInternalSelectors(){
						//adding internal class names to void problem with common ones
						$(options.sectionSelector).each(function(){
								$(this).addClass(SECTION);
						});
						$(options.slideSelector).each(function(){
								$(this).addClass(SLIDE);
						});
				}

				/**
				* Creates the control arrows for the given section
				*/
				function createSlideArrows(section){
						section.find(SLIDES_WRAPPER_SEL).after('<div class="' + SLIDES_ARROW_PREV + '"></div><div class="' + SLIDES_ARROW_NEXT + '"></div>');

						if(options.controlArrowColor!='#fff'){
								section.find(SLIDES_ARROW_NEXT_SEL).css('border-color', 'transparent transparent transparent '+options.controlArrowColor);
								section.find(SLIDES_ARROW_PREV_SEL).css('border-color', 'transparent '+ options.controlArrowColor + ' transparent transparent');
						}

						if(!options.loopHorizontal){
								section.find(SLIDES_ARROW_PREV_SEL).hide();
						}
				}

				/**
				* Creates a vertical navigation bar.
				*/
				function addVerticalNavigation(){
						$body.append('<div id="' + SECTION_NAV + '"><ul></ul></div>');
						var nav = $(SECTION_NAV_SEL);

						nav.addClass(function() {
								return options.showActiveTooltip ? SHOW_ACTIVE_TOOLTIP + ' ' + options.navigationPosition : options.navigationPosition;
						});

						for (var i = 0; i < $(SECTION_SEL).length; i++) {
								var link = '';
								if (options.anchors.length) {
										link = options.anchors[i];
								}

								var li = '<li><a href="#' + link + '"><span></span></a>';

								// Only add tooltip if needed (defined by user)
								var tooltip = options.navigationTooltips[i];

								if (typeof tooltip !== 'undefined' && tooltip !== '') {
										li += '<div class="' + SECTION_NAV_TOOLTIP + ' ' + options.navigationPosition + '">' + tooltip + '</div>';
								}

								li += '</li>';

								nav.find('ul').append(li);
						}

						//centering it vertically
						$(SECTION_NAV_SEL).css('margin-top', '-' + ($(SECTION_NAV_SEL).height()/2) + 'px');

						//activating the current active section
						$(SECTION_NAV_SEL).find('li').eq($(SECTION_ACTIVE_SEL).index(SECTION_SEL)).find('a').addClass(ACTIVE);
				}

				/**
				* Creates the slim scroll scrollbar for the sections and slides inside them.
				*/
				function createSlimScrollingHandler(){
						$(SECTION_SEL).each(function(){
								var slides = $(this).find(SLIDE_SEL);

								if(slides.length){
										slides.each(function(){
												createSlimScrolling($(this));
										});
								}else{
										createSlimScrolling($(this));
								}

						});
						afterRenderActions();
				}

				/**
				* Actions and callbacks to fire afterRender
				*/
				function afterRenderActions(){
						var section = $(SECTION_ACTIVE_SEL);

						section.addClass(COMPLETELY);

						if(options.scrollOverflowHandler.afterRender){
								options.scrollOverflowHandler.afterRender(section);
						}
						lazyLoad(section);
						playMedia(section);

						$.isFunction( options.afterLoad ) && options.afterLoad.call(section, section.data('anchor'), (section.index(SECTION_SEL) + 1));
						$.isFunction( options.afterRender ) && options.afterRender.call(container);
				}


				var isScrolling = false;
				var lastScroll = 0;

				//when scrolling...
				function scrollHandler(){
						var currentSection;

						if(!options.autoScrolling || options.scrollBar){
								var currentScroll = $window.scrollTop();
								var scrollDirection = getScrollDirection(currentScroll);
								var visibleSectionIndex = 0;
								var screen_mid = currentScroll + ($window.height() / 2.0);

								//taking the section which is showing more content in the viewport
								var sections =  document.querySelectorAll(SECTION_SEL);
								for (var i = 0; i < sections.length; ++i) {
										var section = sections[i];

										// Pick the the last section which passes the middle line of the screen.
										if (section.offsetTop <= screen_mid)
										{
												visibleSectionIndex = i;
										}
								}

								if(isCompletelyInViewPort(scrollDirection)){
										if(!$(SECTION_ACTIVE_SEL).hasClass(COMPLETELY)){
												$(SECTION_ACTIVE_SEL).addClass(COMPLETELY).siblings().removeClass(COMPLETELY);
										}
								}

								//geting the last one, the current one on the screen
								currentSection = $(sections).eq(visibleSectionIndex);

								//setting the visible section as active when manually scrolling
								//executing only once the first time we reach the section
								if(!currentSection.hasClass(ACTIVE)){
										isScrolling = true;
										var leavingSection = $(SECTION_ACTIVE_SEL);
										var leavingSectionIndex = leavingSection.index(SECTION_SEL) + 1;
										var yMovement = getYmovement(currentSection);
										var anchorLink  = currentSection.data('anchor');
										var sectionIndex = currentSection.index(SECTION_SEL) + 1;
										var activeSlide = currentSection.find(SLIDE_ACTIVE_SEL);

										if(activeSlide.length){
												var slideAnchorLink = activeSlide.data('anchor');
												var slideIndex = activeSlide.index();
										}

										if(canScroll){
												currentSection.addClass(ACTIVE).siblings().removeClass(ACTIVE);

												$.isFunction( options.onLeave ) && options.onLeave.call( leavingSection, leavingSectionIndex, sectionIndex, yMovement);

												$.isFunction( options.afterLoad ) && options.afterLoad.call( currentSection, anchorLink, sectionIndex);
												lazyLoad(currentSection);

												activateMenuAndNav(anchorLink, sectionIndex - 1);

												if(options.anchors.length){
														//needed to enter in hashChange event when using the menu with anchor links
														lastScrolledDestiny = anchorLink;

														setState(slideIndex, slideAnchorLink, anchorLink, sectionIndex);
												}
										}

										//small timeout in order to avoid entering in hashChange event when scrolling is not finished yet
										clearTimeout(scrollId);
										scrollId = setTimeout(function(){
												isScrolling = false;
										}, 100);
								}

								if(options.fitToSection){
										//for the auto adjust of the viewport to fit a whole section
										clearTimeout(scrollId2);

										scrollId2 = setTimeout(function(){
												//checking fitToSection again in case it was set to false before the timeout delay
												if(canScroll && options.fitToSection){
														//allows to scroll to an active section and
														//if the section is already active, we prevent firing callbacks
														if($(SECTION_ACTIVE_SEL).is(currentSection)){
																isResizing = true;
														}
														scrollPage($(SECTION_ACTIVE_SEL));

														isResizing = false;
												}
										}, options.fitToSectionDelay);
								}
						}
				}

				/**
				* Determines whether the active section has seen in its whole or not.
				*/
				function isCompletelyInViewPort(movement){
						var top = $(SECTION_ACTIVE_SEL).position().top;
						var bottom = top + $window.height();

						if(movement == 'up'){
								return bottom >= ($window.scrollTop() + $window.height());
						}
						return top <= $window.scrollTop();
				}

				/**
				* Gets the directon of the the scrolling fired by the scroll event.
				*/
				function getScrollDirection(currentScroll){
						var direction = currentScroll > lastScroll ? 'down' : 'up';

						lastScroll = currentScroll;

						return direction;
				}

				/**
				* Determines the way of scrolling up or down:
				* by 'automatically' scrolling a section or by using the default and normal scrolling.
				*/
				function scrolling(type, scrollable){
						if (!isScrollAllowed.m[type]){
								return;
						}
						var check, scrollSection;

						if(type == 'down'){
								check = 'bottom';
								scrollSection = FP.moveSectionDown;
						}else{
								check = 'top';
								scrollSection = FP.moveSectionUp;
						}

						if(scrollable.length > 0 ){
								//is the scrollbar at the start/end of the scroll?
								if(options.scrollOverflowHandler.isScrolled(check, scrollable)){
										scrollSection();
								}else{
										return true;
								}
						}else{
								// moved up/down
								scrollSection();
						}
				}


				var touchStartY = 0;
				var touchStartX = 0;
				var touchEndY = 0;
				var touchEndX = 0;

				/* Detecting touch events

				* As we are changing the top property of the page on scrolling, we can not use the traditional way to detect it.
				* This way, the touchstart and the touch moves shows an small difference between them which is the
				* used one to determine the direction.
				*/
				function touchMoveHandler(event){
						var e = event.originalEvent;

						// additional: if one of the normalScrollElements isn't within options.normalScrollElementTouchThreshold hops up the DOM chain
						if (!checkParentForNormalScrollElement(event.target) && isReallyTouch(e) ) {

								if(options.autoScrolling){
										//preventing the easing on iOS devices
										event.preventDefault();
								}

								var activeSection = $(SECTION_ACTIVE_SEL);
								var scrollable = options.scrollOverflowHandler.scrollable(activeSection);

								if (canScroll && !slideMoving) { //if theres any #
										var touchEvents = getEventsPage(e);

										touchEndY = touchEvents.y;
										touchEndX = touchEvents.x;

										//if movement in the X axys is greater than in the Y and the currect section has slides...
										if (activeSection.find(SLIDES_WRAPPER_SEL).length && Math.abs(touchStartX - touchEndX) > (Math.abs(touchStartY - touchEndY))) {

												//is the movement greater than the minimum resistance to scroll?
												if (Math.abs(touchStartX - touchEndX) > ($window.outerWidth() / 100 * options.touchSensitivity)) {
														if (touchStartX > touchEndX) {
																if(isScrollAllowed.m.right){
																		FP.moveSlideRight(); //next
																}
														} else {
																if(isScrollAllowed.m.left){
																		FP.moveSlideLeft(); //prev
																}
														}
												}
										}

										//vertical scrolling (only when autoScrolling is enabled)
										else if(options.autoScrolling){

												//is the movement greater than the minimum resistance to scroll?
												if (Math.abs(touchStartY - touchEndY) > ($window.height() / 100 * options.touchSensitivity)) {
														if (touchStartY > touchEndY) {
																scrolling('down', scrollable);
														} else if (touchEndY > touchStartY) {
																scrolling('up', scrollable);
														}
												}
										}
								}
						}

				}

				/**
				 * recursive function to loop up the parent nodes to check if one of them exists in options.normalScrollElements
				 * Currently works well for iOS - Android might need some testing
				 * @param  {Element} el  target element / jquery selector (in subsequent nodes)
				 * @param  {int}     hop current hop compared to options.normalScrollElementTouchThreshold
				 * @return {boolean} true if there is a match to options.normalScrollElements
				 */
				function checkParentForNormalScrollElement (el, hop) {
						hop = hop || 0;
						var parent = $(el).parent();

						if (hop < options.normalScrollElementTouchThreshold &&
								parent.is(options.normalScrollElements) ) {
								return true;
						} else if (hop == options.normalScrollElementTouchThreshold) {
								return false;
						} else {
								return checkParentForNormalScrollElement(parent, ++hop);
						}
				}

				/**
				* As IE >= 10 fires both touch and mouse events when using a mouse in a touchscreen
				* this way we make sure that is really a touch event what IE is detecting.
				*/
				function isReallyTouch(e){
						//if is not IE   ||  IE is detecting `touch` or `pen`
						return typeof e.pointerType === 'undefined' || e.pointerType != 'mouse';
				}

				/**
				* Handler for the touch start event.
				*/
				function touchStartHandler(event){
						var e = event.originalEvent;

						//stopping the auto scroll to adjust to a section
						if(options.fitToSection){
								$htmlBody.stop();
						}

						if(isReallyTouch(e)){
								var touchEvents = getEventsPage(e);
								touchStartY = touchEvents.y;
								touchStartX = touchEvents.x;
						}
				}

				/**
				* Gets the average of the last `number` elements of the given array.
				*/
				function getAverage(elements, number){
						var sum = 0;

						//taking `number` elements from the end to make the average, if there are not enought, 1
						var lastElements = elements.slice(Math.max(elements.length - number, 1));

						for(var i = 0; i < lastElements.length; i++){
								sum = sum + lastElements[i];
						}

						return Math.ceil(sum/number);
				}

				/**
				 * Detecting mousewheel scrolling
				 *
				 * http://blogs.sitepointstatic.com/examples/tech/mouse-wheel/index.html
				 * http://www.sitepoint.com/html5-javascript-mouse-wheel/
				 */
				var prevTime = new Date().getTime();

				function MouseWheelHandler(e) {
						var curTime = new Date().getTime();
						var isNormalScroll = $(COMPLETELY_SEL).hasClass(NORMAL_SCROLL);

						//autoscrolling and not zooming?
						if(options.autoScrolling && !controlPressed && !isNormalScroll){
								// cross-browser wheel delta
								e = e || window.event;
								var value = e.wheelDelta || -e.deltaY || -e.detail;
								var delta = Math.max(-1, Math.min(1, value));

								var horizontalDetection = typeof e.wheelDeltaX !== 'undefined' || typeof e.deltaX !== 'undefined';
								var isScrollingVertically = (Math.abs(e.wheelDeltaX) < Math.abs(e.wheelDelta)) || (Math.abs(e.deltaX ) < Math.abs(e.deltaY) || !horizontalDetection);

								//Limiting the array to 150 (lets not waste memory!)
								if(scrollings.length > 149){
										scrollings.shift();
								}

								//keeping record of the previous scrollings
								scrollings.push(Math.abs(value));

								//preventing to scroll the site on mouse wheel when scrollbar is present
								if(options.scrollBar){
										e.preventDefault ? e.preventDefault() : e.returnValue = false;
								}

								var activeSection = $(SECTION_ACTIVE_SEL);
								var scrollable = options.scrollOverflowHandler.scrollable(activeSection);

								//time difference between the last scroll and the current one
								var timeDiff = curTime-prevTime;
								prevTime = curTime;

								//haven't they scrolled in a while?
								//(enough to be consider a different scrolling action to scroll another section)
								if(timeDiff > 200){
										//emptying the array, we dont care about old scrollings for our averages
										scrollings = [];
								}

								if(canScroll){
										var averageEnd = getAverage(scrollings, 10);
										var averageMiddle = getAverage(scrollings, 70);
										var isAccelerating = averageEnd >= averageMiddle;

										//to avoid double swipes...
										if(isAccelerating && isScrollingVertically){
												//scrolling down?
												if (delta < 0) {
														scrolling('down', scrollable);

												//scrolling up?
												}else {
														scrolling('up', scrollable);
												}
										}
								}

								return false;
						}

						if(options.fitToSection){
								//stopping the auto scroll to adjust to a section
								$htmlBody.stop();
						}
				}

				/**
				* Slides a slider to the given direction.
				* Optional `section` param.
				*/
				function moveSlide(direction, section){
						var activeSection = typeof section === 'undefined' ? $(SECTION_ACTIVE_SEL) : section;
						var slides = activeSection.find(SLIDES_WRAPPER_SEL);
						var numSlides = slides.find(SLIDE_SEL).length;

						// more than one slide needed and nothing should be sliding
						if (!slides.length || slideMoving || numSlides < 2) {
								return;
						}

						var currentSlide = slides.find(SLIDE_ACTIVE_SEL);
						var destiny = null;

						if(direction === 'prev'){
								destiny = currentSlide.prev(SLIDE_SEL);
						}else{
								destiny = currentSlide.next(SLIDE_SEL);
						}

						//isn't there a next slide in the secuence?
						if(!destiny.length){
								//respect loopHorizontal settin
								if (!options.loopHorizontal) return;

								if(direction === 'prev'){
										destiny = currentSlide.siblings(':last');
								}else{
										destiny = currentSlide.siblings(':first');
								}
						}

						slideMoving = true;

						landscapeScroll(slides, destiny);
				}

				/**
				* Maintains the active slides in the viewport
				* (Because he `scroll` animation might get lost with some actions, such as when using continuousVertical)
				*/
				function keepSlidesPosition(){
						$(SLIDE_ACTIVE_SEL).each(function(){
								silentLandscapeScroll($(this), 'internal');
						});
				}

				var previousDestTop = 0;
				/**
				* Returns the destination Y position based on the scrolling direction and
				* the height of the section.
				*/
				function getDestinationPosition(element){
						var elemPosition = element.position();

						//top of the desination will be at the top of the viewport
						var position = elemPosition.top;
						var isScrollingDown =  elemPosition.top > previousDestTop;
						var sectionBottom = position - windowsHeight + element.outerHeight();

						//is the destination element bigger than the viewport?
						if(element.outerHeight() > windowsHeight){
								//scrolling up?
								if(!isScrollingDown){
										position = sectionBottom;
								}
						}

						//sections equal or smaller than the viewport height && scrolling down? ||  is resizing and its in the last section
						else if(isScrollingDown || (isResizing && element.is(':last-child')) ){
								//The bottom of the destination will be at the bottom of the viewport
								position = sectionBottom;
						}

						/*
						Keeping record of the last scrolled position to determine the scrolling direction.
						No conventional methods can be used as the scroll bar might not be present
						AND the section might not be active if it is auto-height and didnt reach the middle
						of the viewport.
						*/
						previousDestTop = position;
						return position;
				}

				/**
				* Scrolls the site to the given element and scrolls to the slide if a callback is given.
				*/
				function scrollPage(element, callback, isMovementUp){
						if(typeof element === 'undefined'){ return; } //there's no element to scroll, leaving the function

						var dtop = getDestinationPosition(element);

						//local variables
						var v = {
								element: element,
								callback: callback,
								isMovementUp: isMovementUp,
								dtop: dtop,
								yMovement: getYmovement(element),
								anchorLink: element.data('anchor'),
								sectionIndex: element.index(SECTION_SEL),
								activeSlide: element.find(SLIDE_ACTIVE_SEL),
								activeSection: $(SECTION_ACTIVE_SEL),
								leavingSection: $(SECTION_ACTIVE_SEL).index(SECTION_SEL) + 1,

								//caching the value of isResizing at the momment the function is called
								//because it will be checked later inside a setTimeout and the value might change
								localIsResizing: isResizing
						};

						//quiting when destination scroll is the same as the current one
						if((v.activeSection.is(element) && !isResizing) || (options.scrollBar && $window.scrollTop() === v.dtop && !element.hasClass(AUTO_HEIGHT) )){ return; }

						if(v.activeSlide.length){
								var slideAnchorLink = v.activeSlide.data('anchor');
								var slideIndex = v.activeSlide.index();
						}

						// If continuousVertical && we need to wrap around
						if (options.autoScrolling && options.continuousVertical && typeof (v.isMovementUp) !== "undefined" &&
								((!v.isMovementUp && v.yMovement == 'up') || // Intending to scroll down but about to go up or
								(v.isMovementUp && v.yMovement == 'down'))) { // intending to scroll up but about to go down

								v = createInfiniteSections(v);
						}

						//callback (onLeave) if the site is not just resizing and readjusting the slides
						if($.isFunction(options.onLeave) && !v.localIsResizing){
								if(options.onLeave.call(v.activeSection, v.leavingSection, (v.sectionIndex + 1), v.yMovement) === false){
										return;
								}
						}
						stopMedia(v.activeSection);

						element.addClass(ACTIVE).siblings().removeClass(ACTIVE);
						lazyLoad(element);

						//preventing from activating the MouseWheelHandler event
						//more than once if the page is scrolling
						canScroll = false;

						setState(slideIndex, slideAnchorLink, v.anchorLink, v.sectionIndex);

						performMovement(v);

						//flag to avoid callingn `scrollPage()` twice in case of using anchor links
						lastScrolledDestiny = v.anchorLink;

						//avoid firing it twice (as it does also on scroll)
						activateMenuAndNav(v.anchorLink, v.sectionIndex);
				}

				/**
				* Performs the movement (by CSS3 or by jQuery)
				*/
				function performMovement(v){
						// using CSS3 translate functionality
						if (options.css3 && options.autoScrolling && !options.scrollBar) {
								var translate3d = 'translate3d(0px, -' + v.dtop + 'px, 0px)';
								transformContainer(translate3d, true);

								//even when the scrollingSpeed is 0 there's a little delay, which might cause the
								//scrollingSpeed to change in case of using silentMoveTo();
								if(options.scrollingSpeed){
										afterSectionLoadsId = setTimeout(function () {
												afterSectionLoads(v);
										}, options.scrollingSpeed);
								}else{
										afterSectionLoads(v);
								}
						}

						// using jQuery animate
						else{
								var scrollSettings = getScrollSettings(v);

								$(scrollSettings.element).animate(
										scrollSettings.options,
								options.scrollingSpeed, options.easing).promise().done(function () { //only one single callback in case of animating  `html, body`
										if(options.scrollBar){

												/* Hack!
												The timeout prevents setting the most dominant section in the viewport as "active" when the user
												scrolled to a smaller section by using the mousewheel (auto scrolling) rather than draging the scroll bar.

												When using scrollBar:true It seems like the scroll events still getting propagated even after the scrolling animation has finished.
												*/
												setTimeout(function(){
														afterSectionLoads(v);
												},30);
										}else{
												afterSectionLoads(v);
										}
								});
						}
				}

				/**
				* Gets the scrolling settings depending on the plugin autoScrolling option
				*/
				function getScrollSettings(v){
						var scroll = {};

						if(options.autoScrolling && !options.scrollBar){
								scroll.options = { 'top': -v.dtop};
								scroll.element = WRAPPER_SEL;
						}else{
								scroll.options = { 'scrollTop': v.dtop};
								scroll.element = 'html, body';
						}

						return scroll;
				}

				/**
				* Adds sections before or after the current one to create the infinite effect.
				*/
				function createInfiniteSections(v){
						// Scrolling down
						if (!v.isMovementUp) {
								// Move all previous sections to after the active section
								$(SECTION_ACTIVE_SEL).after(v.activeSection.prevAll(SECTION_SEL).get().reverse());
						}
						else { // Scrolling up
								// Move all next sections to before the active section
								$(SECTION_ACTIVE_SEL).before(v.activeSection.nextAll(SECTION_SEL));
						}

						// Maintain the displayed position (now that we changed the element order)
						silentScroll($(SECTION_ACTIVE_SEL).position().top);

						// Maintain the active slides visible in the viewport
						keepSlidesPosition();

						// save for later the elements that still need to be reordered
						v.wrapAroundElements = v.activeSection;

						// Recalculate animation variables
						v.dtop = v.element.position().top;
						v.yMovement = getYmovement(v.element);

						return v;
				}

				/**
				* Fix section order after continuousVertical changes have been animated
				*/
				function continuousVerticalFixSectionOrder (v) {
						// If continuousVertical is in effect (and autoScrolling would also be in effect then),
						// finish moving the elements around so the direct navigation will function more simply
						if (!v.wrapAroundElements || !v.wrapAroundElements.length) {
								return;
						}

						if (v.isMovementUp) {
								$(SECTION_FIRST_SEL).before(v.wrapAroundElements);
						}
						else {
								$(SECTION_LAST_SEL).after(v.wrapAroundElements);
						}

						silentScroll($(SECTION_ACTIVE_SEL).position().top);

						// Maintain the active slides visible in the viewport
						keepSlidesPosition();
				}


				/**
				* Actions to do once the section is loaded.
				*/
				function afterSectionLoads (v){
						continuousVerticalFixSectionOrder(v);

						v.element.find('.fp-scrollable').mouseover();

						//callback (afterLoad) if the site is not just resizing and readjusting the slides
						$.isFunction(options.afterLoad) && !v.localIsResizing && options.afterLoad.call(v.element, v.anchorLink, (v.sectionIndex + 1));

						playMedia(v.element);
						v.element.addClass(COMPLETELY).siblings().removeClass(COMPLETELY);

						canScroll = true;

						$.isFunction(v.callback) && v.callback.call(this);
				}

				/**
				* Lazy loads image, video and audio elements.
				*/
				function lazyLoad(destiny){
						var destiny = getSlideOrSection(destiny);

						destiny.find('img[data-src], source[data-src], audio[data-src]').each(function(){
								$(this).attr('src', $(this).data('src'));
								$(this).removeAttr('data-src');

								if($(this).is('source')){
										$(this).closest('video').get(0).load();
								}
						});
				}

				/**
				* Plays video and audio elements.
				*/
				function playMedia(destiny){
						var destiny = getSlideOrSection(destiny);

						//playing HTML5 media elements
						destiny.find('video, audio').each(function(){
								var element = $(this).get(0);

								if( element.hasAttribute('autoplay') && typeof element.play === 'function' ) {
										element.play();
								}
						});
				}

				/**
				* Stops video and audio elements.
				*/
				function stopMedia(destiny){
						var destiny = getSlideOrSection(destiny);

						//stopping HTML5 media elements
						destiny.find('video, audio').each(function(){
								var element = $(this).get(0);

								if( !element.hasAttribute('data-ignore') && typeof element.pause === 'function' ) {
										element.pause();
								}
						});
				}

				/**
				* Gets the active slide (or section) for the given section
				*/
				function getSlideOrSection(destiny){
						var slide = destiny.find(SLIDE_ACTIVE_SEL);
						if( slide.length ) {
								destiny = $(slide);
						}

						return destiny;
				}

				/**
				* Scrolls to the anchor in the URL when loading the site
				*/
				function scrollToAnchor(){
						//getting the anchor link in the URL and deleting the `#`
						var value =  window.location.hash.replace('#', '').split('/');
						var section = value[0];
						var slide = value[1];

						if(section){  //if theres any #
								if(options.animateAnchor){
										scrollPageAndSlide(section, slide);
								}else{
										FP.silentMoveTo(section, slide);
								}
						}
				}

				/**
				* Detecting any change on the URL to scroll to the given anchor link
				* (a way to detect back history button as we play with the hashes on the URL)
				*/
				function hashChangeHandler(){
						if(!isScrolling && !options.lockAnchors){
								var value =  window.location.hash.replace('#', '').split('/');
								var section = value[0];
								var slide = value[1];

										//when moving to a slide in the first section for the first time (first time to add an anchor to the URL)
										var isFirstSlideMove =  (typeof lastScrolledDestiny === 'undefined');
										var isFirstScrollMove = (typeof lastScrolledDestiny === 'undefined' && typeof slide === 'undefined' && !slideMoving);


								if(section.length){
										/*in order to call scrollpage() only once for each destination at a time
										It is called twice for each scroll otherwise, as in case of using anchorlinks `hashChange`
										event is fired on every scroll too.*/
										if ((section && section !== lastScrolledDestiny) && !isFirstSlideMove || isFirstScrollMove || (!slideMoving && lastScrolledSlide != slide ))  {
												scrollPageAndSlide(section, slide);
										}
								}
						}
				}

				//Sliding with arrow keys, both, vertical and horizontal
				function keydownHandler(e) {

						clearTimeout(keydownId);

						var activeElement = $(':focus');

						if(!activeElement.is('textarea') && !activeElement.is('input') && !activeElement.is('select') &&
								activeElement.attr('contentEditable') !== "true" && activeElement.attr('contentEditable') !== '' &&
								options.keyboardScrolling && options.autoScrolling){
								var keyCode = e.which;

								//preventing the scroll with arrow keys & spacebar & Page Up & Down keys
								var keyControls = [40, 38, 32, 33, 34];
								if($.inArray(keyCode, keyControls) > -1){
										e.preventDefault();
								}

								controlPressed = e.ctrlKey;

								keydownId = setTimeout(function(){
										onkeydown(e);
								},150);
						}
				}

				function tooltipTextHandler(){
						$(this).prev().trigger('click');
				}

				//to prevent scrolling while zooming
				function keyUpHandler(e){
						if(isWindowFocused){ //the keyup gets fired on new tab ctrl + t in Firefox
								controlPressed = e.ctrlKey;
						}
				}

				//binding the mousemove when the mouse's middle button is released
				function mouseDownHandler(e){
						//middle button
						if (e.which == 2){
								oldPageY = e.pageY;
								container.on('mousemove', mouseMoveHandler);
						}
				}

				//unbinding the mousemove when the mouse's middle button is released
				function mouseUpHandler(e){
						//middle button
						if (e.which == 2){
								container.off('mousemove');
						}
				}

				//Scrolling horizontally when clicking on the slider controls.
				function slideArrowHandler(){
						var section = $(this).closest(SECTION_SEL);

						if ($(this).hasClass(SLIDES_PREV)) {
								if(isScrollAllowed.m.left){
										FP.moveSlideLeft(section);
								}
						} else {
								if(isScrollAllowed.m.right){
										FP.moveSlideRight(section);
								}
						}
				}

				//when opening a new tab (ctrl + t), `control` won't be pressed when comming back.
				function blurHandler(){
						isWindowFocused = false;
						controlPressed = false;
				}

				//Scrolls to the section when clicking the navigation bullet
				function sectionBulletHandler(e){
						e.preventDefault();
						var index = $(this).parent().index();
						scrollPage($(SECTION_SEL).eq(index));
				}

				//Scrolls the slider to the given slide destination for the given section
				function slideBulletHandler(e){
						e.preventDefault();
						var slides = $(this).closest(SECTION_SEL).find(SLIDES_WRAPPER_SEL);
						var destiny = slides.find(SLIDE_SEL).eq($(this).closest('li').index());

						landscapeScroll(slides, destiny);
				}

				/**
				* Keydown event
				*/
				function onkeydown(e){
						var shiftPressed = e.shiftKey;

						switch (e.which) {
								//up
								case 38:
								case 33:
										if(isScrollAllowed.k.up){
												FP.moveSectionUp();
										}
										break;

								//down
								case 32: //spacebar
										if(shiftPressed && isScrollAllowed.k.up){
												FP.moveSectionUp();
												break;
										}
								case 40:
								case 34:
										if(isScrollAllowed.k.down){
												FP.moveSectionDown();
										}
										break;

								//Home
								case 36:
										if(isScrollAllowed.k.up){
												FP.moveTo(1);
										}
										break;

								//End
								case 35:
										 if(isScrollAllowed.k.down){
												FP.moveTo( $(SECTION_SEL).length );
										}
										break;

								//left
								case 37:
										if(isScrollAllowed.k.left){
												FP.moveSlideLeft();
										}
										break;

								//right
								case 39:
										if(isScrollAllowed.k.right){
												FP.moveSlideRight();
										}
										break;

								default:
										return; // exit this handler for other keys
						}
				}

				/**
				* Detecting the direction of the mouse movement.
				* Used only for the middle button of the mouse.
				*/
				var oldPageY = 0;
				function mouseMoveHandler(e){
						if(canScroll){
								// moving up
								if (e.pageY < oldPageY && isScrollAllowed.m.up){
										FP.moveSectionUp();
								}

								// moving down
								else if(e.pageY > oldPageY && isScrollAllowed.m.down){
										FP.moveSectionDown();
								}
						}
						oldPageY = e.pageY;
				}

				/**
				* Scrolls horizontal sliders.
				*/
				function landscapeScroll(slides, destiny){
						var destinyPos = destiny.position();
						var slideIndex = destiny.index();
						var section = slides.closest(SECTION_SEL);
						var sectionIndex = section.index(SECTION_SEL);
						var anchorLink = section.data('anchor');
						var slidesNav = section.find(SLIDES_NAV_SEL);
						var slideAnchor = getAnchor(destiny);
						var prevSlide = section.find(SLIDE_ACTIVE_SEL);

						//caching the value of isResizing at the momment the function is called
						//because it will be checked later inside a setTimeout and the value might change
						var localIsResizing = isResizing;

						if(options.onSlideLeave){
								var prevSlideIndex = prevSlide.index();
								var xMovement = getXmovement(prevSlideIndex, slideIndex);

								//if the site is not just resizing and readjusting the slides
								if(!localIsResizing && xMovement!=='none'){
										if($.isFunction( options.onSlideLeave )){
												if(options.onSlideLeave.call( prevSlide, anchorLink, (sectionIndex + 1), prevSlideIndex, xMovement, slideIndex ) === false){
														slideMoving = false;
														return;
												}
										}
								}
						}
						stopMedia(prevSlide);

						destiny.addClass(ACTIVE).siblings().removeClass(ACTIVE);
						if(!localIsResizing){
								lazyLoad(destiny);
						}

						if(!options.loopHorizontal && options.controlArrows){
								//hidding it for the fist slide, showing for the rest
								section.find(SLIDES_ARROW_PREV_SEL).toggle(slideIndex!==0);

								//hidding it for the last slide, showing for the rest
								section.find(SLIDES_ARROW_NEXT_SEL).toggle(!destiny.is(':last-child'));
						}

						//only changing the URL if the slides are in the current section (not for resize re-adjusting)
						if(section.hasClass(ACTIVE)){
								setState(slideIndex, slideAnchor, anchorLink, sectionIndex);
						}

						var afterSlideLoads = function(){
								//if the site is not just resizing and readjusting the slides
								if(!localIsResizing){
										$.isFunction( options.afterSlideLoad ) && options.afterSlideLoad.call( destiny, anchorLink, (sectionIndex + 1), slideAnchor, slideIndex);
								}
								playMedia(destiny);

								//letting them slide again
								slideMoving = false;
						};

						if(options.css3){
								var translate3d = 'translate3d(-' + Math.round(destinyPos.left) + 'px, 0px, 0px)';

								addAnimation(slides.find(SLIDES_CONTAINER_SEL), options.scrollingSpeed>0).css(getTransforms(translate3d));

								afterSlideLoadsId = setTimeout(function(){
										afterSlideLoads();
								}, options.scrollingSpeed, options.easing);
						}else{
								slides.animate({
										scrollLeft : Math.round(destinyPos.left)
								}, options.scrollingSpeed, options.easing, function() {

										afterSlideLoads();
								});
						}

						slidesNav.find(ACTIVE_SEL).removeClass(ACTIVE);
						slidesNav.find('li').eq(slideIndex).find('a').addClass(ACTIVE);
				}

				var previousHeight = windowsHeight;

				//when resizing the site, we adjust the heights of the sections, slimScroll...
				function resizeHandler(){
						//checking if it needs to get responsive
						responsive();

						// rebuild immediately on touch devices
						if (isTouchDevice) {
								var activeElement = $(document.activeElement);

								//if the keyboard is NOT visible
								if (!activeElement.is('textarea') && !activeElement.is('input') && !activeElement.is('select')) {
										var currentHeight = $window.height();

										//making sure the change in the viewport size is enough to force a rebuild. (20 % of the window to avoid problems when hidding scroll bars)
										if( Math.abs(currentHeight - previousHeight) > (20 * Math.max(previousHeight, currentHeight) / 100) ){
												FP.reBuild(true);
												previousHeight = currentHeight;
										}
								}
						}else{
								//in order to call the functions only when the resize is finished
								//http://stackoverflow.com/questions/4298612/jquery-how-to-call-resize-event-only-once-its-finished-resizing
								clearTimeout(resizeId);

								resizeId = setTimeout(function(){
										FP.reBuild(true);
								}, 350);
						}
				}

				/**
				* Checks if the site needs to get responsive and disables autoScrolling if so.
				* A class `fp-responsive` is added to the plugin's container in case the user wants to use it for his own responsive CSS.
				*/
				function responsive(){
						var widthLimit = options.responsive || options.responsiveWidth; //backwards compatiblity
						var heightLimit = options.responsiveHeight;

						//only calculating what we need. Remember its called on the resize event.
						var isBreakingPointWidth = widthLimit && $window.outerWidth() < widthLimit;
						var isBreakingPointHeight = heightLimit && $window.height() < heightLimit;

						if(widthLimit && heightLimit){
								FP.setResponsive(isBreakingPointWidth || isBreakingPointHeight);
						}
						else if(widthLimit){
								FP.setResponsive(isBreakingPointWidth);
						}
						else if(heightLimit){
								FP.setResponsive(isBreakingPointHeight);
						}
				}

				/**
				* Adds transition animations for the given element
				*/
				function addAnimation(element){
						var transition = 'all ' + options.scrollingSpeed + 'ms ' + options.easingcss3;

						element.removeClass(NO_TRANSITION);
						return element.css({
								'-webkit-transition': transition,
								'transition': transition
						});
				}

				/**
				* Remove transition animations for the given element
				*/
				function removeAnimation(element){
						return element.addClass(NO_TRANSITION);
				}

				/**
				 * Resizing of the font size depending on the window size as well as some of the images on the site.
				 */
				function resizeMe(displayHeight, displayWidth) {
						//Standard dimensions, for which the body font size is correct
						var preferredHeight = 825;
						var preferredWidth = 900;

						if (displayHeight < preferredHeight || displayWidth < preferredWidth) {
								var heightPercentage = (displayHeight * 100) / preferredHeight;
								var widthPercentage = (displayWidth * 100) / preferredWidth;
								var percentage = Math.min(heightPercentage, widthPercentage);
								var newFontSize = percentage.toFixed(2);

								$body.css('font-size', newFontSize + '%');
						} else {
								$body.css('font-size', '100%');
						}
				}

				/**
				 * Activating the website navigation dots according to the given slide name.
				 */
				function activateNavDots(name, sectionIndex){
						if(options.navigation){
								$(SECTION_NAV_SEL).find(ACTIVE_SEL).removeClass(ACTIVE);
								if(name){
										$(SECTION_NAV_SEL).find('a[href="#' + name + '"]').addClass(ACTIVE);
								}else{
										$(SECTION_NAV_SEL).find('li').eq(sectionIndex).find('a').addClass(ACTIVE);
								}
						}
				}

				/**
				 * Activating the website main menu elements according to the given slide name.
				 */
				function activateMenuElement(name){
						if(options.menu){
								$(options.menu).find(ACTIVE_SEL).removeClass(ACTIVE);
								$(options.menu).find('[data-menuanchor="'+name+'"]').addClass(ACTIVE);
						}
				}

				/**
				* Sets to active the current menu and vertical nav items.
				*/
				function activateMenuAndNav(anchor, index){
						activateMenuElement(anchor);
						activateNavDots(anchor, index);
				}

				/**
				* Retuns `up` or `down` depending on the scrolling movement to reach its destination
				* from the current section.
				*/
				function getYmovement(destiny){
						var fromIndex = $(SECTION_ACTIVE_SEL).index(SECTION_SEL);
						var toIndex = destiny.index(SECTION_SEL);
						if( fromIndex == toIndex){
								return 'none';
						}
						if(fromIndex > toIndex){
								return 'up';
						}
						return 'down';
				}

				/**
				* Retuns `right` or `left` depending on the scrolling movement to reach its destination
				* from the current slide.
				*/
				function getXmovement(fromIndex, toIndex){
						if( fromIndex == toIndex){
								return 'none';
						}
						if(fromIndex > toIndex){
								return 'left';
						}
						return 'right';
				}


				function createSlimScrolling(element){
						//needed to make `scrollHeight` work under Opera 12
						element.css('overflow', 'hidden');

						var scrollOverflowHandler = options.scrollOverflowHandler;
						var wrap = scrollOverflowHandler.wrapContent();
						//in case element is a slide
						var section = element.closest(SECTION_SEL);
						var scrollable = scrollOverflowHandler.scrollable(element);
						var contentHeight;

						//if there was scroll, the contentHeight will be the one in the scrollable section
						if(scrollable.length){
								contentHeight = scrollOverflowHandler.scrollHeight(element);
						}else{
								contentHeight = element.get(0).scrollHeight;
								if(options.verticalCentered){
										contentHeight = element.find(TABLE_CELL_SEL).get(0).scrollHeight;
								}
						}

						var scrollHeight = windowsHeight - parseInt(section.css('padding-bottom')) - parseInt(section.css('padding-top'));

						//needs scroll?
						if ( contentHeight > scrollHeight) {
								//was there already an scroll ? Updating it
								if(scrollable.length){
										scrollOverflowHandler.update(element, scrollHeight);
								}
								//creating the scrolling
								else{
										if(options.verticalCentered){
												element.find(TABLE_CELL_SEL).wrapInner(wrap);
										}else{
												element.wrapInner(wrap);
										}
										scrollOverflowHandler.create(element, scrollHeight);
								}
						}
						//removing the scrolling when it is not necessary anymore
						else{
								scrollOverflowHandler.remove(element);
						}

						//undo
						element.css('overflow', '');
				}

				function addTableClass(element){
						element.addClass(TABLE).wrapInner('<div class="' + TABLE_CELL + '" style="height:' + getTableHeight(element) + 'px;" />');
				}

				function getTableHeight(element){
						var sectionHeight = windowsHeight;

						if(options.paddingTop || options.paddingBottom){
								var section = element;
								if(!section.hasClass(SECTION)){
										section = element.closest(SECTION_SEL);
								}

								var paddings = parseInt(section.css('padding-top')) + parseInt(section.css('padding-bottom'));
								sectionHeight = (windowsHeight - paddings);
						}

						return sectionHeight;
				}

				/**
				* Adds a css3 transform property to the container class with or without animation depending on the animated param.
				*/
				function transformContainer(translate3d, animated){
						if(animated){
								addAnimation(container);
						}else{
								removeAnimation(container);
						}

						container.css(getTransforms(translate3d));

						//syncronously removing the class after the animation has been applied.
						setTimeout(function(){
								container.removeClass(NO_TRANSITION);
						},10);
				}

				/**
				* Gets a section by its anchor / index
				*/
				function getSectionByAnchor(sectionAnchor){
						//section
						var section = container.find(SECTION_SEL + '[data-anchor="'+sectionAnchor+'"]');
						if(!section.length){
								section = $(SECTION_SEL).eq( (sectionAnchor -1) );
						}

						return section;
				}

				/**
				* Gets a slide inside a given section by its anchor / index
				*/
				function getSlideByAnchor(slideAnchor, section){
						var slides = section.find(SLIDES_WRAPPER_SEL);
						var slide =  slides.find(SLIDE_SEL + '[data-anchor="'+slideAnchor+'"]');

						if(!slide.length){
								slide = slides.find(SLIDE_SEL).eq(slideAnchor);
						}

						return slide;
				}

				/**
				* Scrolls to the given section and slide anchors
				*/
				function scrollPageAndSlide(destiny, slide){
						var section = getSectionByAnchor(destiny);

						//default slide
						if (typeof slide === 'undefined') {
								slide = 0;
						}

						//we need to scroll to the section and then to the slide
						if (destiny !== lastScrolledDestiny && !section.hasClass(ACTIVE)){
								scrollPage(section, function(){
										scrollSlider(section, slide);
								});
						}
						//if we were already in the section
						else{
								scrollSlider(section, slide);
						}
				}

				/**
				* Scrolls the slider to the given slide destination for the given section
				*/
				function scrollSlider(section, slideAnchor){
						if(typeof slideAnchor !== 'undefined'){
								var slides = section.find(SLIDES_WRAPPER_SEL);
								var destiny =  getSlideByAnchor(slideAnchor, section);

								if(destiny.length){
										landscapeScroll(slides, destiny);
								}
						}
				}

				/**
				* Creates a landscape navigation bar with dots for horizontal sliders.
				*/
				function addSlidesNavigation(section, numSlides){
						section.append('<div class="' + SLIDES_NAV + '"><ul></ul></div>');
						var nav = section.find(SLIDES_NAV_SEL);

						//top or bottom
						nav.addClass(options.slidesNavPosition);

						for(var i=0; i< numSlides; i++){
								nav.find('ul').append('<li><a href="#"><span></span></a></li>');
						}

						//centering it
						nav.css('margin-left', '-' + (nav.width()/2) + 'px');

						nav.find('li').first().find('a').addClass(ACTIVE);
				}


				/**
				* Sets the state of the website depending on the active section/slide.
				* It changes the URL hash when needed and updates the body class.
				*/
				function setState(slideIndex, slideAnchor, anchorLink, sectionIndex){
						var sectionHash = '';

						if(options.anchors.length && !options.lockAnchors){

								//isn't it the first slide?
								if(slideIndex){
										if(typeof anchorLink !== 'undefined'){
												sectionHash = anchorLink;
										}

										//slide without anchor link? We take the index instead.
										if(typeof slideAnchor === 'undefined'){
												slideAnchor = slideIndex;
										}

										lastScrolledSlide = slideAnchor;
										setUrlHash(sectionHash + '/' + slideAnchor);

								//first slide won't have slide anchor, just the section one
								}else if(typeof slideIndex !== 'undefined'){
										lastScrolledSlide = slideAnchor;
										setUrlHash(anchorLink);
								}

								//section without slides
								else{
										setUrlHash(anchorLink);
								}
						}

						setBodyClass();
				}

				/**
				* Sets the URL hash.
				*/
				function setUrlHash(url){
						if(options.recordHistory){
								location.hash = url;
						}else{
								//Mobile Chrome doesn't work the normal way, so... lets use HTML5 for phones :)
								if(isTouchDevice || isTouch){
										window.history.replaceState(undefined, undefined, '#' + url);
								}else{
										var baseUrl = window.location.href.split('#')[0];
										window.location.replace( baseUrl + '#' + url );
								}
						}
				}

				/**
				* Gets the anchor for the given slide / section. Its index will be used if there's none.
				*/
				function getAnchor(element){
						var anchor = element.data('anchor');
						var index = element.index();

						//Slide without anchor link? We take the index instead.
						if(typeof anchor === 'undefined'){
								anchor = index;
						}

						return anchor;
				}

				/**
				* Sets a class for the body of the page depending on the active section / slide
				*/
				function setBodyClass(){
						var section = $(SECTION_ACTIVE_SEL);
						var slide = section.find(SLIDE_ACTIVE_SEL);

						var sectionAnchor = getAnchor(section);
						var slideAnchor = getAnchor(slide);

						var sectionIndex = section.index(SECTION_SEL);

						var text = String(sectionAnchor);

						if(slide.length){
								text = text + '-' + slideAnchor;
						}

						//changing slash for dash to make it a valid CSS style
						text = text.replace('/', '-').replace('#','');

						//removing previous anchor classes
						var classRe = new RegExp('\\b\\s?' + VIEWING_PREFIX + '-[^\\s]+\\b', "g");
						$body[0].className = $body[0].className.replace(classRe, '');

						//adding the current anchor
						$body.addClass(VIEWING_PREFIX + '-' + text);
				}

				/**
				* Checks for translate3d support
				* @return boolean
				* http://stackoverflow.com/questions/5661671/detecting-transform-translate3d-support
				*/
				function support3d() {
						var el = document.createElement('p'),
								has3d,
								transforms = {
										'webkitTransform':'-webkit-transform',
										'OTransform':'-o-transform',
										'msTransform':'-ms-transform',
										'MozTransform':'-moz-transform',
										'transform':'transform'
								};

						// Add it to the body to get the computed style.
						document.body.insertBefore(el, null);

						for (var t in transforms) {
								if (el.style[t] !== undefined) {
										el.style[t] = 'translate3d(1px,1px,1px)';
										has3d = window.getComputedStyle(el).getPropertyValue(transforms[t]);
								}
						}

						document.body.removeChild(el);

						return (has3d !== undefined && has3d.length > 0 && has3d !== 'none');
				}

				/**
				* Removes the auto scrolling action fired by the mouse wheel and trackpad.
				* After this function is called, the mousewheel and trackpad movements won't scroll through sections.
				*/
				function removeMouseWheelHandler(){
						if (document.addEventListener) {
								document.removeEventListener('mousewheel', MouseWheelHandler, false); //IE9, Chrome, Safari, Oper
								document.removeEventListener('wheel', MouseWheelHandler, false); //Firefox
								document.removeEventListener('MozMousePixelScroll', MouseWheelHandler, false); //old Firefox
						} else {
								document.detachEvent('onmousewheel', MouseWheelHandler); //IE 6/7/8
						}
				}

				/**
				* Adds the auto scrolling action for the mouse wheel and trackpad.
				* After this function is called, the mousewheel and trackpad movements will scroll through sections
				* https://developer.mozilla.org/en-US/docs/Web/Events/wheel
				*/
				function addMouseWheelHandler(){
						var prefix = '';
						var _addEventListener;

						if (window.addEventListener){
								_addEventListener = "addEventListener";
						}else{
								_addEventListener = "attachEvent";
								prefix = 'on';
						}

						 // detect available wheel event
						var support = 'onwheel' in document.createElement('div') ? 'wheel' : // Modern browsers support "wheel"
											document.onmousewheel !== undefined ? 'mousewheel' : // Webkit and IE support at least "mousewheel"
											'DOMMouseScroll'; // let's assume that remaining browsers are older Firefox


						if(support == 'DOMMouseScroll'){
								document[ _addEventListener ](prefix + 'MozMousePixelScroll', MouseWheelHandler, false);
						}

						//handle MozMousePixelScroll in older Firefox
						else{
								document[ _addEventListener ](prefix + support, MouseWheelHandler, false);
						}
				}

				/**
				* Binding the mousemove when the mouse's middle button is pressed
				*/
				function addMiddleWheelHandler(){
						container
								.on('mousedown', mouseDownHandler)
								.on('mouseup', mouseUpHandler);
				}

				/**
				* Unbinding the mousemove when the mouse's middle button is released
				*/
				function removeMiddleWheelHandler(){
						container
								.off('mousedown', mouseDownHandler)
								.off('mouseup', mouseUpHandler);
				}

				/**
				* Adds the possibility to auto scroll through sections on touch devices.
				*/
				function addTouchHandler(){
						if(isTouchDevice || isTouch){
								//Microsoft pointers
								var MSPointer = getMSPointer();

								$(WRAPPER_SEL).off('touchstart ' +  MSPointer.down).on('touchstart ' + MSPointer.down, touchStartHandler);
								$(WRAPPER_SEL).off('touchmove ' + MSPointer.move).on('touchmove ' + MSPointer.move, touchMoveHandler);
						}
				}

				/**
				* Removes the auto scrolling for touch devices.
				*/
				function removeTouchHandler(){
						if(isTouchDevice || isTouch){
								//Microsoft pointers
								var MSPointer = getMSPointer();

								$(WRAPPER_SEL).off('touchstart ' + MSPointer.down);
								$(WRAPPER_SEL).off('touchmove ' + MSPointer.move);
						}
				}

				/*
				* Returns and object with Microsoft pointers (for IE<11 and for IE >= 11)
				* http://msdn.microsoft.com/en-us/library/ie/dn304886(v=vs.85).aspx
				*/
				function getMSPointer(){
						var pointer;

						//IE >= 11 & rest of browsers
						if(window.PointerEvent){
								pointer = { down: 'pointerdown', move: 'pointermove'};
						}

						//IE < 11
						else{
								pointer = { down: 'MSPointerDown', move: 'MSPointerMove'};
						}

						return pointer;
				}

				/**
				* Gets the pageX and pageY properties depending on the browser.
				* https://github.com/alvarotrigo/fullPage.js/issues/194#issuecomment-34069854
				*/
				function getEventsPage(e){
						var events = [];

						events.y = (typeof e.pageY !== 'undefined' && (e.pageY || e.pageX) ? e.pageY : e.touches[0].pageY);
						events.x = (typeof e.pageX !== 'undefined' && (e.pageY || e.pageX) ? e.pageX : e.touches[0].pageX);

						//in touch devices with scrollBar:true, e.pageY is detected, but we have to deal with touch events. #1008
						if(isTouch && isReallyTouch(e) && options.scrollBar){
								events.y = e.touches[0].pageY;
								events.x = e.touches[0].pageX;
						}

						return events;
				}

				/**
				* Slides silently (with no animation) the active slider to the given slide.
				*/
				function silentLandscapeScroll(activeSlide, noCallbacks){
						FP.setScrollingSpeed (0, 'internal');

						if(typeof noCallbacks !== 'undefined'){
								//preventing firing callbacks afterSlideLoad etc.
								isResizing = true;
						}

						landscapeScroll(activeSlide.closest(SLIDES_WRAPPER_SEL), activeSlide);

						if(typeof noCallbacks !== 'undefined'){
								isResizing = false;
						}

						FP.setScrollingSpeed(originals.scrollingSpeed, 'internal');
				}

				/**
				* Scrolls silently (with no animation) the page to the given Y position.
				*/
				function silentScroll(top){
						if(options.scrollBar){
								container.scrollTop(top);
						}
						else if (options.css3) {
								var translate3d = 'translate3d(0px, -' + top + 'px, 0px)';
								transformContainer(translate3d, false);
						}
						else {
								container.css('top', -top);
						}
				}

				/**
				* Returns the cross-browser transform string.
				*/
				function getTransforms(translate3d){
						return {
								'-webkit-transform': translate3d,
								'-moz-transform': translate3d,
								'-ms-transform':translate3d,
								'transform': translate3d
						};
				}

				/**
				* Allowing or disallowing the mouse/swipe scroll in a given direction. (not for keyboard)
				* @type  m (mouse) or k (keyboard)
				*/
				function setIsScrollAllowed(value, direction, type){
						switch (direction){
								case 'up': isScrollAllowed[type].up = value; break;
								case 'down': isScrollAllowed[type].down = value; break;
								case 'left': isScrollAllowed[type].left = value; break;
								case 'right': isScrollAllowed[type].right = value; break;
								case 'all':
										if(type == 'm'){
												FP.setAllowScrolling(value);
										}else{
												FP.setKeyboardScrolling(value);
										}
						}
				}

				/*
				* Destroys fullpage.js plugin events and optinally its html markup and styles
				*/
				FP.destroy = function(all){
						FP.setAutoScrolling(false, 'internal');
						FP.setAllowScrolling(false);
						FP.setKeyboardScrolling(false);
						container.addClass(DESTROYED);

						clearTimeout(afterSlideLoadsId);
						clearTimeout(afterSectionLoadsId);
						clearTimeout(resizeId);
						clearTimeout(scrollId);
						clearTimeout(scrollId2);

						$window
								.off('scroll', scrollHandler)
								.off('hashchange', hashChangeHandler)
								.off('resize', resizeHandler);

						$document
								.off('click', SECTION_NAV_SEL + ' a')
								.off('mouseenter', SECTION_NAV_SEL + ' li')
								.off('mouseleave', SECTION_NAV_SEL + ' li')
								.off('click', SLIDES_NAV_LINK_SEL)
								.off('mouseover', options.normalScrollElements)
								.off('mouseout', options.normalScrollElements);

						$(SECTION_SEL)
								.off('click', SLIDES_ARROW_SEL);

						clearTimeout(afterSlideLoadsId);
						clearTimeout(afterSectionLoadsId);

						//lets make a mess!
						if(all){
								destroyStructure();
						}
				};

				/*
				* Removes inline styles added by fullpage.js
				*/
				function destroyStructure(){
						//reseting the `top` or `translate` properties to 0
						silentScroll(0);

						$(SECTION_NAV_SEL + ', ' + SLIDES_NAV_SEL +  ', ' + SLIDES_ARROW_SEL).remove();

						//removing inline styles
						$(SECTION_SEL).css( {
								'height': '',
								'background-color' : '',
								'padding': ''
						});

						$(SLIDE_SEL).css( {
								'width': ''
						});

						container.css({
								'height': '',
								'position': '',
								'-ms-touch-action': '',
								'touch-action': ''
						});

						$htmlBody.css({
								'overflow': '',
								'height': ''
						});

						// remove .fp-enabled class
						$('html').removeClass(ENABLED);

						// remove all of the .fp-viewing- classes
						$.each($body.get(0).className.split(/\s+/), function (index, className) {
								if (className.indexOf(VIEWING_PREFIX) === 0) {
										$body.removeClass(className);
								}
						});

						//removing added classes
						$(SECTION_SEL + ', ' + SLIDE_SEL).each(function(){
								options.scrollOverflowHandler.remove($(this));
								$(this).removeClass(TABLE + ' ' + ACTIVE);
						});

						removeAnimation(container);

						//Unwrapping content
						container.find(TABLE_CELL_SEL + ', ' + SLIDES_CONTAINER_SEL + ', ' + SLIDES_WRAPPER_SEL).each(function(){
								//unwrap not being use in case there's no child element inside and its just text
								$(this).replaceWith(this.childNodes);
						});

						//scrolling the page to the top with no animation
						$htmlBody.scrollTop(0);

						//removing selectors
						var usedSelectors = [SECTION, SLIDE, SLIDES_CONTAINER];
						$.each(usedSelectors, function(index, value){
								$('.' + value).removeClass(value);
						});
				}

				/*
				* Sets the state for a variable with multiple states (original, and temporal)
				* Some variables such as `autoScrolling` or `recordHistory` might change automatically its state when using `responsive` or `autoScrolling:false`.
				* This function is used to keep track of both states, the original and the temporal one.
				* If type is not 'internal', then we assume the user is globally changing the variable.
				*/
				function setVariableState(variable, value, type){
						options[variable] = value;
						if(type !== 'internal'){
								originals[variable] = value;
						}
				}

				/**
				* Displays warnings
				*/
				function displayWarnings(){
						if($('html').hasClass(ENABLED)){
								showError('error', 'Fullpage.js can only be initialized once and you are doing it multiple times!');
								return;
						}

						// Disable mutually exclusive settings
						if (options.continuousVertical &&
								(options.loopTop || options.loopBottom)) {
								options.continuousVertical = false;
								showError('warn', 'Option `loopTop/loopBottom` is mutually exclusive with `continuousVertical`; `continuousVertical` disabled');
						}

						if(options.scrollBar && options.scrollOverflow){
								showError('warn', 'Option `scrollBar` is mutually exclusive with `scrollOverflow`. Sections with scrollOverflow might not work well in Firefox');
						}

						if(options.continuousVertical && options.scrollBar){
								options.continuousVertical = false;
								showError('warn', 'Option `scrollBar` is mutually exclusive with `continuousVertical`; `continuousVertical` disabled');
						}

						//anchors can not have the same value as any element ID or NAME
						$.each(options.anchors, function(index, name){

								//case insensitive selectors (http://stackoverflow.com/a/19465187/1081396)
								var nameAttr = $document.find('[name]').filter(function() {
										return $(this).attr('name') && $(this).attr('name').toLowerCase() == name.toLowerCase();
								});

								var idAttr = $document.find('[id]').filter(function() {
										return $(this).attr('id') && $(this).attr('id').toLowerCase() == name.toLowerCase();
								});

								if(idAttr.length || nameAttr.length ){
										showError('error', 'data-anchor tags can not have the same value as any `id` element on the site (or `name` element for IE).');
										idAttr.length && showError('error', '"' + name + '" is is being used by another element `id` property');
										nameAttr.length && showError('error', '"' + name + '" is is being used by another element `name` property');
								}
						});
				}

				/**
				* Shows a message in the console of the given type.
				*/
				function showError(type, text){
						console && console[type] && console[type]('fullPage: ' + text);
				}
		};

		/**
		 * An object to handle overflow scrolling.
		 * This uses jquery.slimScroll to accomplish overflow scrolling.
		 * It is possible to pass in an alternate scrollOverflowHandler
		 * to the fullpage.js option that implements the same functions
		 * as this handler.
		 *
		 * @type {Object}
		 */
		var slimScrollHandler = {
				/**
				 * Optional function called after each render.
				 *
				 * Solves a bug with slimScroll vendor library #1037, #553
				 *
				 * @param  {object} section jQuery object containing rendered section
				 */
				afterRender: function(section){
						var slides = section.find(SLIDES_WRAPPER);
						var scrollableWrap = section.find(SCROLLABLE_SEL);

						if(slides.length){
								scrollableWrap = slides.find(SLIDE_ACTIVE_SEL);
						}

						scrollableWrap.mouseover();
				},

				/**
				 * Called when overflow scrolling is needed for a section.
				 *
				 * @param  {Object} element      jQuery object containing current section
				 * @param  {Number} scrollHeight Current window height in pixels
				 */
				create: function(element, scrollHeight){
						element.find(SCROLLABLE_SEL).slimScroll({
								allowPageScroll: true,
								height: scrollHeight + 'px',
								size: '10px',
								alwaysVisible: true
						});
				},

				/**
				 * Return a boolean depending on whether the scrollable element is a
				 * the end or at the start of the scrolling depending on the given type.
				 *
				 * @param  {String}  type       Either 'top' or 'bottom'
				 * @param  {Object}  scrollable jQuery object for the scrollable element
				 * @return {Boolean}
				 */
				isScrolled: function(type, scrollable){
						if(type === 'top'){
								return !scrollable.scrollTop();
						}else if(type === 'bottom'){
								return scrollable.scrollTop() + 1 + scrollable.innerHeight() >= scrollable[0].scrollHeight;
						}
				},

				/**
				 * Returns the scrollable element for the given section.
				 * If there are landscape slides, will only return a scrollable element
				 * if it is in the active slide.
				 *
				 * @param  {Object}  activeSection jQuery object containing current section
				 * @return {Boolean}
				 */
				scrollable: function(activeSection){
						// if there are landscape slides, we check if the scrolling bar is in the current one or not
						if(activeSection.find(SLIDES_WRAPPER_SEL).length){
								return activeSection.find(SLIDE_ACTIVE_SEL).find(SCROLLABLE_SEL);
						}
						return activeSection.find(SCROLLABLE_SEL);
				},

				/**
				 * Returns the scroll height of the wrapped content.
				 * If this is larger than the window height minus section padding,
				 * overflow scrolling is needed.
				 *
				 * @param  {Object} element jQuery object containing current section
				 * @return {Number}
				 */
				scrollHeight: function(element){
						return element.find(SCROLLABLE_SEL).get(0).scrollHeight;
				},

				/**
				 * Called when overflow scrolling is no longer needed for a section.
				 *
				 * @param  {Object} element      jQuery object containing current section
				 */
				remove: function(element){
						element.find(SCROLLABLE_SEL).children().first().unwrap().unwrap();
						element.find(SLIMSCROLL_BAR_SEL).remove();
						element.find(SLIMSCROLL_RAIL_SEL).remove();
				},

				/**
				 * Called when overflow scrolling has already been setup but the
				 * window height has potentially changed.
				 *
				 * @param  {Object} element      jQuery object containing current section
				 * @param  {Number} scrollHeight Current window height in pixels
				 */
				update: function(element, scrollHeight){
						element.find(SCROLLABLE_SEL).css('height', scrollHeight + 'px').parent().css('height', scrollHeight + 'px');
				},

				/**
				 * Called to get any additional elements needed to wrap the section
				 * content in order to facilitate overflow scrolling.
				 *
				 * @return {String|Object} Can be a string containing HTML,
				 *                         a DOM element, or jQuery object.
				 */
				wrapContent: function(){
						return '<div class="' + SCROLLABLE + '"></div>';
				}
		};

		defaultScrollHandler = slimScrollHandler;
});

$(document).ready(function() {
		$('#fullpage').fullpage({
				anchors: ['stack'],
				scrollOverflow: true,
				scrollingSpeed: 1000,
				'onSlideLeave': function(a,b,c,d,e){
						var menos = e+1;
						var cambcol4 = '#list-resp ol li:nth-of-type('+menos+')';
						var cambcol3 = '#list-resp ol li:nth-of-type('+menos+') a';
						var cambcol2 = '#list-container ol li:nth-of-type('+e+')';
						var cambcol1 = '#list-container ol li:nth-of-type('+menos+')';
						var cambcol = '#list-container ol li:nth-of-type('+menos+') a';
						$('.slimScrollBar').css("opacity","0");
						$("#list-container ol li").css("color","#FFF");
						$("#list-container ol li a").css("color","#FFF");
						$(cambcol).css("color","#F7DCA3");
						$(cambcol1).css("color","#F7DCA3");
						$("#list-resp ol li").css("color","#FFF");
						$("#list-resp ol li a").css("color","#FFF");
						$(cambcol3).css("color","#F7DCA3");
						$(cambcol4).css("color","#F7DCA3");
						var fprespons = $('#fullpage').width();
						if (fprespons > 1000) {
								if (e == 0) {
										$(".list").animate({"opacity":"0","top":"50px"}, 300);
										setTimeout(function() {$(".list").hide()}, 350);
								} else if ($('.list').css('display') == 'none') {
										$(".list").show();
										$(".list").animate({"opacity":"1","top":"100px"}, 500);
								}
								if (e != 0) {
										var arriba = $(cambcol2).position().top;
										$("#list-container").animate({scrollTop: arriba }, 300);
								}
						}

						if (fprespons < 1001) {
								if (e == 0) {
										$("#ficha-icon").animate({"opacity":"0"}, 300);
										setTimeout(function() {$("#ficha-icon").hide()}, 350);
								} else if ($('#ficha-icon').css('display') == 'none') {
										$("#ficha-icon").show();
										$("#ficha-icon").animate({"opacity":"1"}, 500);
								}
						}

						if ($('#menu-resp').css('display') != 'none') {
								$("#menu-resp *").animate({opacity: 0 }, 250);
								setTimeout(function() {$("#menu-resp").animate({height:'toggle'}, 250) }, 150);
								setTimeout(function() {$("#menu-resp").hide() }, 500);
						}
						if (fprespons > 1000) {
						$(".card-container").animate({"opacity":"0"}, 150);
						setTimeout(function() {$(".card-container").animate({"opacity":"1"}, 250);}, 650);
						}
						setTimeout(function() {$('.slimScrollBar').animate({"opacity":"0.5"}, 100);}, 1000);

				},
				'afterResize': function(a,b,c,d,e){
					// console.log("resize");
					// FP.moveSlideLeft();
				}
		});

		/*
			FOOTER
		*/
		
		var screen_height = $(window).height();
		var content_height = $('.ifempty').height();
		console.log(content_height);

});

		
		$(".descrip").fitVids();
		/*** Cycle columnists slider ***/
		$('.columnists_slider').cycle( {
											fx: 'scrollHorz',
											paused: true,
											slides: '> .slider_page'
										});

		if($('#actual_piechart').length){			

			/*** Charts wadafact ***/
			var ctx = $("#actual_piechart");
			var data_dichos = $("#global_chart").find('.dichos span').text();
			var data_hechos = $("#global_chart").find('.hechos span').text();
			var data = {
							labels: [
								"Dichos",
								"Hechos"
							],
							datasets: [
								{
									data: [data_dichos, data_hechos],
									backgroundColor: [
										"#FFA399",
										"#83DECB" //C0EFFB
									],
									hoverBackgroundColor: [
										"#fa6b5b",
										"#28d8b3"
									],
									borderWidth: 0
								}]
						};
			var options = 	{
								responsive: true,
								maintainAspectRatio: true,
								cutoutPercentage:65,
								tooltips: {
									enabled: false
								},
								legend: {
									display: false
								}
							};
			console.log(ctx);
			var myDoughnutChart = new Chart(ctx, {
					type: 'doughnut',
					data: data,
					options: options
			});
		}

		/*** TAG CLOUD ***/

		var words = [];
		  

		$('.tag_cloud code').each(function(){
			var peso = $(this).data('peso');
			var pesopx = peso*80;
			if(pesopx > 500){
				// $(this).css('font-size', 500+'%');
			} else {
				// $(this).css('font-size', pesopx+'%');
			}

			//words.push({text: $(this).text(), weight: peso});

		});


		// $('.tag_cloud').jQCloud(words, {
		//   shape: 'rectangular',
		//   classPattern: null,
  // 		  colors: ["#800026", "#bd0026", "#e31a1c", "#fc4e2a", "#fd8d3c", "#feb24c", "#fed976", "#ffeda0", "#ffffcc"],
		// });

	});

})(jQuery);
