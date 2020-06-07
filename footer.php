<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

/**
 * architectonic_footer_primary_content hook
 *
 * @hooked architectonic_add_contact_section -  10
 *
 */
do_action( 'architectonic_footer_primary_content' );

/**
 * architectonic_content_end_action hook
 *
 * @hooked architectonic_content_end -  10
 *
 */
do_action( 'architectonic_content_end_action' );

/**
 * architectonic_content_end_action hook
 *
 * @hooked architectonic_footer_start -  10
 * @hooked Architectonic_Footer_Widgets->add_footer_widgets -  20
 * @hooked architectonic_footer_site_info -  40
 * @hooked architectonic_footer_end -  100
 *
 */
do_action( 'architectonic_footer' );

/**
 * architectonic_page_end_action hook
 *
 * @hooked architectonic_page_end -  10
 *
 */
do_action( 'architectonic_page_end_action' ); 

?>

<div class="popup-bg hidden"></div>
<div class="popup-wrapper hidden">
    <div class="popup-container">
        <button class="popup-close"><span class="icon-close"></span></button>
        <div class="popup-content">
            <h3 class="title"></h3>
            <span class="user"></span>
            <div class="box-container">
            	<div class="box-left">
		            <img src="" class="image">
            	</div>
            	<div class="box-right">
            		<a href="" class="button-download" download>Download Infografik Ini</a>
            		<p class="sub-title"></p>
            		<div class="description"></div>
            	</div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
<script>
	
	jQuery(window).load(function() {
		var indexcount = jQuery(".swiper-container .swiper-slide").length;
		var menu = [];
	    for (var i = 1 ; i <= indexcount; i++) {
	    	menu.push(jQuery(".swiper-container .swiper-slide:nth-child("+i+") .content-banner h1").text());
	    	//console.log("tes "+jQuery(".swiper-container .swiper-slide:nth-child("+i+") .content-banner h1").text());
	    }
	    //var menu = ['Bersama lebih berdampak', '2nd Title of Photo slider']
	    var swiper = new Swiper('.banner-home', {
	      effect: 'fade',
	      simulateTouch :false,
	      autoplay: {
	        delay: 5000,
	        disableOnInteraction: false,
	      },
	    pagination: {
	      el: '.swiper-pagination',
	            clickable: true,
	        renderBullet: function (index, className) {
	          return '<h2 class="' + className + '">' + (menu[index]) + '</h2>';
	        },
	    },
	    });
	    var swiper = new Swiper('.target-slider', {
	      slidesPerView: 4,
	      spaceBetween: 30,
	      navigation: {
	        nextEl: '.swiper-button-next',
	        prevEl: '.swiper-button-prev',
	      },
	      breakpoints: {
	        900: {
	          slidesPerView: 3,
	          spaceBetween: 20,
	        },
	        650: {
	          slidesPerView: 2,
	          spaceBetween: 20,
	        },
	        475: {
	          slidesPerView: 1.5,
	          spaceBetween: 20,
	        },
	      }
	    });
	    var swiper = new Swiper('.program-slider', {
	      slidesPerView: 2,
	      spaceBetween: 30,
	      navigation: {
	        nextEl: '.swiper-button-next',
	        prevEl: '.swiper-button-prev',
	      },
	    });
	});
</script>
<script type="text/javascript">
	jQuery(window).load(function() {
		var lang1 = jQuery("html").attr("lang");
		console.log("bahasa "+lang1);
		if (lang1=="en") {
			jQuery("#box-translate").removeClass();
			jQuery("#box-translate").addClass("English");
			jQuery("#box-translate span.text").text("English (US)");	
		} else if (lang1=="id") {
			jQuery("#box-translate").removeClass();
			jQuery("#box-translate").addClass("Indonesian");
			jQuery("#box-translate span.text").text("Bahasa");		
		}


		jQuery("#box-translate").click(function() {
			jQuery("#flags").addClass("show");
		});


	});

</script>
</body>
</html>
