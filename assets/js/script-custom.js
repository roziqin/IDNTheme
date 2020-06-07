jQuery(document).ready(function() {

	var getUrl = window.location;
	var afterurl = getUrl.pathname.split('/')[1];
	
	var str = jQuery(location).attr('href')
	var res = str.split("/");
	console.log(res[4]);

	jQuery(".nav-menu li.contact-menu a").click(function() {
		
		jQuery('html,body').animate({
        	scrollTop: jQuery("#colophon").offset().top},
        'slow');
	});

	if (jQuery("body").hasClass("home")) {

		tabsfunc(res[4]);
		  
		jQuery(".nav-menu li.our-services-menu .sub-menu li").removeClass("current-menu-item");
		jQuery(".nav-menu li.our-services-menu .sub-menu li").removeClass("current_page_item");

		jQuery("button.scroll-down").click(function() {
		    jQuery('html,body').animate({
		        scrollTop: jQuery("#about-us").offset().top},
		        'slow');
		});

		jQuery(".nav-menu li.our-services-menu .sub-menu .menu-item a").click(function() {
			var hrefmenu = jQuery(this).attr("href");
			//console.log(hrefmenu);
			tabsfunc(hrefmenu);
		});

		var link = jQuery("#our-services");
		var offset = link.offset();
		var top = offset.top - 40;
		var bottom = top + link.height();
		
		jQuery( window ).scroll(function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll>=top && scroll<=bottom) {
				jQuery(".nav-menu li.our-services-menu").addClass("current-menu-item");
				jQuery(".nav-menu li.menu-item-home").removeClass("current-menu-item");
				jQuery(".nav-menu li.menu-item-home").removeClass("current_page_item");
			} else if (scroll>bottom) {
				jQuery(".nav-menu li.our-services-menu").removeClass("current-menu-item");
				jQuery(".nav-menu li.menu-item-home").addClass("current-menu-item");
				jQuery(".nav-menu li.menu-item-home").addClass("current_page_item");

			} else if (scroll<top) {
				jQuery(".nav-menu li.our-services-menu").removeClass("current-menu-item");
				jQuery(".nav-menu li.menu-item-home").addClass("current-menu-item");
				jQuery(".nav-menu li.menu-item-home").addClass("current_page_item");

			}
		});
	} else {
		var a = window.location.origin;	

		jQuery(".nav-menu li.our-services-menu .sub-menu li:nth-child(1) a").attr("href", a+"/idn/#investor");
		jQuery(".nav-menu li.our-services-menu .sub-menu li:nth-child(2) a").attr("href", a+"/idn/#ecosystem");
		jQuery(".nav-menu li.our-services-menu .sub-menu li:nth-child(3) a").attr("href", a+"/idn/#social");
		
	}

	jQuery(window).load(function() {
		 if (jQuery(window).width() < 767) {
		 	
			var screen = jQuery(window).width() - 30;

			jQuery("#slider_18.owl-carousel .slide-item-box").css("max-width", screen+"px");
			jQuery(window).resize(function(e) {
				var screen = jQuery(window).width() - 30;

				jQuery("#slider_18.owl-carousel .slide-item-box").css("max-width", screen+"px");
			});
			jQuery(".nav-menu li.our-services-menu .sub-menu .menu-item a").click(function() {
				jQuery("#masthead").removeClass("open");
				jQuery(".main-navigation button.dropdown-toggle").removeClass("toggled-on active");
				jQuery(".main-navigation button.dropdown-toggle").attr("aria-expanded","false");
				jQuery(".main-navigation ul.sub-menu").removeClass("toggled-on");
				jQuery(".main-navigation ul.sub-menu").css("display","none");
			});
		};


		jQuery("#flags li a.English").append("<span class='flag'></span> English (US)");
		jQuery("#flags li a.Indonesian").append("<span class='flag'></span> Bahasa");

		jQuery("#flags li a").click(function(e){
			var lang = jQuery(this).attr("title");
			if (lang=="English") {
				jQuery("#box-translate").removeClass();
				jQuery("#box-translate").addClass("English");
				jQuery("#box-translate span.text").text("English (US)");	
			} else if (lang=="Indonesian") {
				jQuery("#box-translate").removeClass();
				jQuery("#box-translate").addClass("Indonesian");
				jQuery("#box-translate span.text").text("Bahasa");		
			}
		});

		jQuery(".box-loader").css("display", "none");
		jQuery("body").removeAttr("style");
		
		jQuery("popup-content a.button-download").click(function(e){
			e.preventDefault();
		});

		jQuery(".sa_hover_container").click(function(e){
			e.preventDefault();
			//console.log(jQuery(this).find(".text-box .description").text());
			jQuery(".popup-content .title").empty();
			jQuery(".popup-content .user").empty();
			jQuery(".popup-content .box-right .sub-title").empty();
			jQuery(".popup-content .box-right .description").empty();
			jQuery(".popup-content .title").append(jQuery(this).find(".text-box label").text());
			jQuery(".popup-content .user").append(jQuery(this).find(".text-box span").text());
			jQuery(".popup-content .image").attr("src", jQuery(this).find(".image-box img").attr('src'));
			jQuery(".popup-content .button-download").attr("href", jQuery(this).find(".image-box img").attr('src'));
			jQuery(".popup-content .box-right .description").append(jQuery(this).find(".text-box .description").html());
			jQuery(".popup-content .box-right .sub-title").append(jQuery(this).find(".text-box label").text());
			jQuery(".popup-bg").removeClass("hidden");
			jQuery(".popup-wrapper").removeClass("hidden");
			jQuery("body").css("overflow", "hidden");
			jQuery("#page").css("filter", "blur(2px)");
			
			setTimeout(function(){ 
				jQuery(".popup-bg").css("opacity", "1");
				jQuery(".popup-wrapper").css("opacity", "1");
			}, 10);
			
		})

		jQuery(".popup-close").click(function(e){
			e.preventDefault();
			jQuery("body").removeAttr("style");
			jQuery(".popup-bg").removeAttr("style");
			jQuery(".popup-wrapper").removeAttr("style");
			jQuery("#page").removeAttr("style");
			setTimeout(function(){ 
				jQuery(".popup-bg").addClass("hidden");
				jQuery(".popup-wrapper").addClass("hidden");
			}, 500);

		});
		
	});

	jQuery("body").css("overflow", "hidden");
	jQuery('ul.tabs li').click(function(){
		var tab_id = jQuery(this).attr('data-tab');

		jQuery('ul.tabs li').removeClass('current');
		jQuery('.tab-content').removeClass('current');

		jQuery(this).addClass('current');
		jQuery("#"+tab_id).addClass('current');
	})

});

function tabsfunc(hrefmenu){
	if(hrefmenu =="#investor") {
		jQuery('ul.tabs li').removeClass('current');
		jQuery('.tab-content').removeClass('current');

		jQuery("ul.tabs li:nth-child(1)").addClass('current');
		jQuery("#tab-1").addClass('current');
	
	} else if(hrefmenu =="#ecosystem") {
		jQuery('ul.tabs li').removeClass('current');
		jQuery('.tab-content').removeClass('current');

		jQuery("ul.tabs li:nth-child(2)").addClass('current');
		jQuery("#tab-2").addClass('current');
	
	} else if(hrefmenu =="#social") {
		jQuery('ul.tabs li').removeClass('current');
		jQuery('.tab-content').removeClass('current');

		jQuery("ul.tabs li:nth-child(3)").addClass('current');
		jQuery("#tab-3").addClass('current');
	} 

	if (hrefmenu =="#investor" || hrefmenu =="#ecosystem" || hrefmenu =="#social") {
		jQuery('html,body').animate({
        	scrollTop: jQuery("#our-services").offset().top},
        'slow');
	} else {
		
	}
}