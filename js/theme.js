/************************************************************************
						  Global Variables 
***************************************************************************/
var $ = jQuery;


/************************************************************************
				Mission Animation Viewport Trigger Function 
***************************************************************************/
// var mission_viewport_count = 0;
// var mission_doc_position = '';
// var mission_doc_count = 0;
// var mission_animation_trigger = 0;


// function missionViewportTrigger() {

// 	if (mission_viewport_count < 1) {
// 		mission_viewport_count++;
// 		mission_doc_position = $(document).scrollTop();
// 		mission_doc_count++;
// 	}
// }


/************************************************************************
				Events-Heading Animation Viewport Trigger Function 
***************************************************************************/
var events_viewport_count = 0;
var events_doc_position = '';
var events_doc_count = 0;
var events_animation_trigger = 0;


function eventsViewportTrigger() {

	if (events_viewport_count < 1) {
		events_viewport_count++;
		events_doc_position = $(document).scrollTop();
		events_doc_count++;
		//console.log('events in view trigger');
		
	}
}

/************************************************************************
					Document Ready 
//***************************************************************************/
$(window).ready(function () {
	
	
///************************************************************************
//					Global Variables
//***************************************************************************/
	var w = window.innerWidth;
	var body_class = $('body').hasClass('logged-in');
	var nav_bar_height = $('.navbar-fixed-top').outerHeight();
	var admin_bar_height = $('#wpadminbar').outerHeight();


$('.scroll_nav_container li a').click(function(event) {
   event.preventDefault();
   var scroll_fix = $(this).attr('href');

   if (scroll_fix == '#home'){
	    TweenMax.to(window, 3, {scrollTo:{y:0}});
   } else {
		if (body_class){
	    	TweenMax.to(window, 3, {scrollTo:{y:$(scroll_fix).offset().top - nav_bar_height - admin_bar_height +2}});
		} else {
			TweenMax.to(window, 3, {scrollTo:{y:$(scroll_fix).offset().top - nav_bar_height - admin_bar_height}});
		}
		
   }
    
});



/************************************************************************
							Scrollspy Functions
***************************************************************************/


// $('.wga_scrollspy').on('activate.bs.scrollspy', function (e) {

 // var target = e.target;
 // var target_index = $(target).html();
 // var target_attr = $(target_index).attr('href');
 // var body_class = $('body').hasClass('logged-in');

 // if (target_attr == '#home') {
 	// if (body_class){
	  	// var home_height = $('.home section.landing').outerHeight() + nav_bar_height -2;
		 // $('.home section.landing').css('margin-top', nav_bar_height -2);
		 // $('.home section.landing').css('position', 'fixed');
		 // $('.home section.mission').css('margin-top',home_height);
 	// } else {
 		 // $('.home section.landing').css('margin-top',admin_bar_height);
	  	 // var home_height = $('.home section.landing').outerHeight() + nav_bar_height;
		 // $('.home section.landing').css('margin-top', nav_bar_height);
		 // $('.home section.landing').css('position', 'fixed');
		 // $('.home section.mission').css('margin-top',home_height);
 	// }
  	
	  
 // }
 // if (target_attr == '#mission'){
 // }
 // if (target_attr == '#about'){
 // }
 // if (target_attr == '#events') {
 // }
 // if (target_attr == '#contact') {
 // }
 
// });

/************************************************************************
					Parallax Functions
***************************************************************************/
//var $window = $(window); 

//$('section[data-type="background"]').each(function(){
//  var $bgobj = $(this); // assigning the object
//  $(window).scroll(function() {
//  var yPos = -($window.scrollTop() / $bgobj.data('speed'));
//  // Put together our final background position
//  var coords = '50% '+ yPos + 'px';
//  // Move the background
//  $bgobj.css({ backgroundPosition: coords });
//  });
//});

/************************************************************************
					Main Page logo animation
***************************************************************************/
//	var logo_height = $('section.landing').outerHeight();
//	var logo_position = logo_height / 6 + 100;

//	var tl = new TimelineMax();
//	tl.set(".landing_logo", {visibility:"visible"});
//	tl.to(".landing_logo", 2, {top:logo_position, autoAlpha:1, ease:Bounce.easeOut});
	
//$('#custom-slideshow img').load(function(){
//	tl.play();
//})
	

/************************************************************************
					Main Page Mission Statement Animation
***************************************************************************/
	// var tl1 = new TimelineMax({paused:true});
	// tl1.set(".home .mission h3", {visibility:"visible"});
	// tl1.from('.home .mission h3', 2, {scaleX:0, scaleY:0, opacity:0, ease:Back.easeOut});


// $(".home .mission h3:in-viewport").each(function() {
	// tl1.play();
	// mission_doc_count = 1;
	// mission_viewport_count = 1;
	// mission_animation_trigger = 1;
// });


// var mission_trigger = "";
    // $(window).bind("scroll", function(event) {
        // if (mission_doc_count == 1){
        	// var actual_pos = $(document).scrollTop();
        	// var diff_pos = actual_pos - mission_doc_position;
        	// if (diff_pos > 100 & mission_animation_trigger == 0 || diff_pos < -100 & mission_animation_trigger == 0){
        		// tl1.play();
        		// mission_animation_trigger++;
        	// }
        // }

        // var message = "Not in Viewport";

        // $(".home .mission h3:in-viewport").each(function() {
          // message = 'In Viewport';
        // });
        // if (message != mission_trigger) {
            // if (message == 'In Viewport') { missionViewportTrigger(); }
        // } 

    // });
	
	
/************************************************************************
					Main Page Events-Heading Statement Animation
***************************************************************************/
	var tl2 = new TimelineMax({paused:true});
	tl2.set("#events-heading h2", {visibility:"visible"});
	tl2.from('#events-heading h2', 2, {scaleX:0, scaleY:0, opacity:0, ease:Back.easeOut});


$("#events-heading h2:in-viewport").each(function() {
	tl2.play();
	events_doc_count = 1;
	events_viewport_count = 1;
	events_animation_trigger = 1;
});
var events_heading = $('#events-heading').length;

  $(window).bind("scroll", function(event) {
if (events_heading == 1) {
	  var events_heading_position = $('#events-heading').offset().top;
	  var document_position = $(document).scrollTop();
	  var window_height = $(window).height();
	  var window_position_bottom = window_height + document_position;
	  var events_height = $('#events-heading').outerHeight();
	  var event_heading_position_bottom = events_heading_position + events_height;
	  var admin_bar_height = $('#wpadminbar').height();
	  var actual_document_position = admin_bar_height + document_position;
	  var actual_window_height = window_height - admin_bar_height;
	  var fixed_actual_window_height = actual_window_height + events_height;
  
	  if (window_position_bottom >= events_heading_position && actual_document_position <= event_heading_position_bottom){
		  var event_animation_magic = window_position_bottom - events_heading_position;
		  var real_event_animation_magic = event_animation_magic / fixed_actual_window_height;
		  var really_real_event_animation_magic = -(real_event_animation_magic * 150);
		  $('div.vide-container').css('top', really_real_event_animation_magic+'%');
	  }
}
  });

var events_trigger = "";
    $(window).bind("scroll", function(event) {
        if (events_doc_count == 1){
        	var events_actual_pos = $(document).scrollTop();
        	var events_diff_pos = events_actual_pos - events_doc_position;
			
			
        	if (events_diff_pos < 100 & events_animation_trigger == 0 || events_diff_pos > -100 & events_animation_trigger == 0){
				
				tl2.play();
        		events_animation_trigger++;
				
        	}
        }

        var events_message = "Not in Viewport";

        $("#events-heading h2:in-viewport").each(function() {
          events_message = 'In Viewport';
        });
        if (events_message != events_trigger) {
            if (events_message == 'In Viewport') { eventsViewportTrigger(); }
        } 

    });
	


/************************************************************************
					Footer Animation
***************************************************************************/
//var footer_animation_counter = 0;
//var footer_height = $('footer').height();
//var footer_animation_height = $('.footer-nav-position').height();
//var footer_position = footer_height - footer_animation_height;

//	var footer_animation = new TimelineMax({paused:true});
//	footer_animation.set(".footer-nav-position", {visibility:"visible"});
//	footer_animation.to('.footer-nav-position', .5, {css:{top:footer_position}});


//$(window).scroll(function() {
   
//   if($(window).scrollTop() + $(window).height() > $(document).height() - footer_height) {
//	   var this_thing = $(window).scrollTop() + $(window).height();
//	   var that_thing = $(document).height();
//	   var other_thing = that_thing - this_thing;
//	   var this_other_thing = other_thing /4;
//	   $('footer').css({ backgroundPosition: this_other_thing +'%' });
//   }

   
//   if($(window).scrollTop() + $(window).height() < $(document).height() - 1) {
//       footer_animation.reverse();
//   }
   
//   if($(window).scrollTop() + $(window).height() == $(document).height()) {
//       footer_animation.play();
//   }
//});


/************************************************************************
					Slideshow Call
***************************************************************************/
	//setInterval( "slideSwitch()", 3000 );
	
/************************************************************************
				  Mobile Navbar Functions
***************************************************************************/	
	
	if (w<993){
		//$('div.secondary-navbar').removeClass('secondary-navbar');
		var sub_nav = $('.sub-nav').html();
		var nav_html = '<hr class="sub-nav">';
		$('.main-nav').append(nav_html);
		$('hr.sub-nav').after(sub_nav);
		$('.menu-item-has-children').removeClass('menu-item-has-children');
	}

/************************************************************************
							Gallery Page
***************************************************************************/
if (w >= 960) {
$('.page-id-103 div[id^="attachment_"]').hover(function(){
	$(this).children().slideDown();
},function(){
 	$('div[id^="attachment_"] p.wp-caption-text').slideUp();
});


$('.page-id-103 div[id^="attachment_"] p.wp-caption-text').click(function(){
	var sibling = $(this).siblings();
	var link = $(sibling).attr('href');
	window.open(link, '_blank');
});



/************************************************************************
					Main Page News Feed Quick Fix
***************************************************************************/
	  var news_height = $('.news-feed-hotfix').outerHeight() + 20;
	  $('.news-feed-background').css('height',news_height);

/************************************************************************
					Other Page Height Quick Fix
***************************************************************************/
	  // var news_height = $('.bg-match-height').outerHeight();
	  // $('.bg-fix').css('height',news_height);



}

/************************************************************************
					Main Heading Other Page Animation
***************************************************************************/


	var wga_op_heading = new TimelineMax({paused:true});
	wga_op_heading.set(".page-headline h1", {visibility:"visible"});
	
	
$('.featured-image img').load(function(){
	var w = window.innerWidth;
	if (w>540){
	  wga_op_heading.from(".page-headline h1", 2, {top:'-600px', autoAlpha:1, ease:Bounce.easeOut});
	  wga_op_heading.play();
	} else {
		 //alert('hi');
	  wga_op_heading.to(".page-headline h1", 2, {top:'38px', autoAlpha:1, ease:Bounce.easeOut});
	  wga_op_heading.play();
	  
	}
})
/************************************************************************
							News Page Masonry Call
***************************************************************************/

$("#news-masonry-wrapper").masonry({
        itemSelector: '.news-bg',
        isAnimated: true,
		'isFitWidth': true,
    });

/************************************************************************
							News Page Animation
***************************************************************************/
// var slideshow_caption = $('.slideshow-caption a').offset();
// var nav_bar_height = $('.navbar-fixed-top').outerHeight();
// var admin_bar_height = $('#wpadminbar').outerHeight();
// var news_headline_height = $('div.news-page-heading h1').outerHeight();
// var slideshow_caption_pos = slideshow_caption - nav_bar_height - admin_bar_height - news_headline_height - 10;

// //console.log(slideshow_caption + ' slideshow_caption');

	// var news_page_animation = new TimelineMax();
	// news_page_animation.set("div.news-page-heading h1", {visibility:"visible"});
	// news_page_animation.to("div.news-page-heading h1", 2, {top:slideshow_caption_pos, autoAlpha:1, ease:Bounce.easeOut});

/************************************************************************
							News Page Share Reveal
***************************************************************************/
	// var social_counter = 1;
// $('.social-reveal').click(function(){
	// var index = $(this);
	// var social_reveal = $('.sd-content');
	// var sibling = $(this).siblings().find(social_reveal);
	// $(index).slideUp(50);
	// $(sibling).delay(500).slideDown(300);	
// });

/************************************************************************
							End Ready Function
***************************************************************************/
}); //End ready function

/************************************************************************
						  New Nav Function 
***************************************************************************/

function wgaNavFunction(index) {

	var wga_home = window.location.href;
	var body_class = $('body').hasClass('logged-in');
	var scroll_fix = index;
	scroll_fix = scroll_fix.replace('#', '');
	var scroll_url = 'http://washingtonclayarts.org/?scroll=';
	var wga_actual_home = 'http://washingtonclayarts.org/';
	var nav_bar_height = $('.navbar-fixed-top').outerHeight();
	var admin_bar_height = $('#wpadminbar').outerHeight();

	if (wga_home !== wga_actual_home) {
		window.location.assign(scroll_url + scroll_fix);
	} else {
	if (body_class){
		if (scroll_fix == 'home'){
			TweenMax.to(window, 3, {scrollTo:{y:0}});
		} else {
	  TweenMax.to(window, 3, {scrollTo:{y:$('#'+scroll_fix).offset().top - nav_bar_height - admin_bar_height + 2}});
		}
	} else {
		if (scroll_fix == 'home'){
			TweenMax.to(window, 3, {scrollTo:{y:0}});
		} else {
			TweenMax.to(window, 3, {scrollTo:{y:$('#'+scroll_fix).offset().top - nav_bar_height - admin_bar_height + 1}});
		}
	}
	
	}
}




/************************************************************************
					Secondary Nav Toggle
***************************************************************************/

$('button.secondary-nav-toggle').on('click',function(){
	w = window.innerWidth;
	var admin_bar = $('body').hasClass('admin-bar');
	var nav_offset = $('.secondary-nav-toggle').offset();
	var navHeight = $('.secondary-nav-toggle').outerHeight();
	var navWidth = $('div.secondary-navbar').outerWidth();
	var navButtonWidth = $('.secondary-nav-toggle').outerWidth();
	var nav_position = nav_offset.top + navHeight;

		if (admin_bar == true){
			$('div.secondary-navbar').css('left',nav_offset.left - navWidth + navButtonWidth);
			$('div.secondary-navbar').css('top', navHeight );
		} else {
			$('div.secondary-navbar').css('left',nav_offset.left - navWidth + navButtonWidth);
			$('div.secondary-navbar').css('top',navHeight);
		}
});
/************************************************************************
					Directory flexslider
***************************************************************************/
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});

/************************************************************************
					Main Page Slideshow
***************************************************************************/
var slideCount = 0;
var captions = $('.caption-container h3');
var active_caption = $('.caption-container h3.active-caption');
TweenMax.to(active_caption, 1, {scaleX:1, scaleY:1, autoAlpha:1});
function slideSwitch() {

// Captions
captions = $('.caption-container h3');
active_caption = $('.caption-container h3.active-caption');
var next_caption = active_caption.next().length ? active_caption.next() : $('.caption-container h3:first');

$(active_caption).removeClass('active-caption');
$(next_caption).addClass('active-caption');
TweenMax.to(active_caption, .25, {scaleX:0, scaleY:0, autoAlpha:0});
TweenMax.to(next_caption, 1, {scaleX:1, scaleY:1, autoAlpha:1});





// Slideshow
	
   var $active = $('#custom-slideshow img.active');

   if ( $active.length == 0 ) $active = $('#slideshow img:last');

   var $next =  $active.next().length ? $active.next()
       : $('#custom-slideshow img:first');

   $active.addClass('last-active');
        
   $next.css({opacity: 0.0})
       .addClass('active')
       .animate({opacity: 1.0}, 1000, function() {
           $active.removeClass('active last-active');
       });
}

