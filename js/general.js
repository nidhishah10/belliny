/* Custom General jQuery
/*--------------------------------------------------------------------------------------------------------------------------------------*/
; (function ($, window, document, undefined) {
	//Genaral Global variables
	//"use strict";
	var $win = $(window);
	var $doc = $(document);
	var $winW = function () { return $(window).width(); };
	var $winH = function () { return $(window).height(); };
	var $screensize = function (element) {
		$(element).width($winW()).height($winH());
	};

	var screencheck = function (mediasize) {
		if (typeof window.matchMedia !== "undefined") {
			var screensize = window.matchMedia("(max-width:" + mediasize + "px)");
			if (screensize.matches) {
				return true;
			} else {
				return false;
			}
		} else { // for IE9 and lower browser
			if ($winW() <= mediasize) {
				return true;
			} else {
				return false;
			}
		}
	};

	$doc.ready(function () {
		/*--------------------------------------------------------------------------------------------------------------------------------------*/
		// Remove No-js Class
		$("html").removeClass('no-js').addClass('js');

	// 	setTimeout(function () {
	// 		// Loop through each .bg-color element
	// 		$('.main-banner').each(function() {
	// 			// Get the image inside the element
	// 			var img = $(this).find('picture');
			
	// 			// Create a new Image object to load the image
	// 			var image = new Image();
	// 			image.src = img.attr('data-iesrc');
			
	// 			// Wait for the image to load
	// 			image.onload = function() {
	// 			// Create a new canvas element with a width and height of 1 pixel
	// 			var canvas = document.createElement('canvas');
	// 			canvas.width = 1;
	// 			canvas.height = 1;
			
	// 			// Draw the image onto the canvas
	// 			var ctx = canvas.getContext('2d');
	// 			ctx.drawImage(this, 0, 0, 100, 100);
			
	// 			// Get the RGB color value of the single pixel
	// 			var pixelData = ctx.getImageData(0, 0, 100, 100).data;
	// 			var red = pixelData[0];
	// 			var green = pixelData[1];
	// 			var blue = pixelData[2];
			
	// 			// Calculate the perceived brightness of the pixel using the formula Y = 0.2126R + 0.7152G + 0.0722B
	// 			var brightness = 0.2126 * red + 0.7152 * green + 0.0722 * blue;
			
	// 			// Check if the brightness is below or above a threshold to determine if the image is light or dark
	// 			if (brightness > 128) {
	// 				// Add the "dark" class to the parent .bg-color element
	// 				$(img).parents('.main-banner').addClass('dark');
	// 			} else {
	// 				// Add the "light" class to the parent .bg-color element
	// 				$(img).parents('.main-banner').addClass('light');
	// 			}
	// 			};
	// 		});
	// }, 10000);


	

		/* Get Screen size
		---------------------------------------------------------------------*/
		$win.on('load', function () {
			$win.on('resize', function () {
				$screensize('your selector');
			}).resize();
		});


		/* Menu ICon Append prepend for responsive
		---------------------------------------------------------------------*/
		$(window).on('resize', function () {
			if (screencheck(1023)) {
				if (!$('#menu').length) {
					$('#mainmenu').prepend('<a href="#" id="menu" class="menulines-button"><span class="menulines"></span> <em>Menu</em></a>');
				}
			} else {
				$("#menu").remove();
			}
		}).resize();


		/* Tab Content box 
		---------------------------------------------------------------------*/
		var tabBlockElement = $('.tab-data');
		$(tabBlockElement).each(function () {
			var $this = $(this),
				tabTrigger = $this.find(".tabnav li"),
				tabContent = $this.find(".tabcontent");
			var textval = [];
			tabTrigger.each(function () {
				textval.push($(this).text());
			});
			$this.find(tabTrigger).first().addClass("active");
			$this.find(tabContent).first().show();

			$(tabTrigger).on('click', function () {
				$(tabTrigger).removeClass("active");
				$(this).addClass("active");
				$(tabContent).hide().removeClass('visible');
				var activeTab = $(this).find("a").attr("data-rel");
				$this.find('#' + activeTab).fadeIn('normal').addClass('visible');

				return false;
			});

			var responsivetabActive = function () {
				if (screencheck(767)) {
					if (!$this.find('.tabMobiletrigger').length) {
						$(tabContent).each(function (index) {
							$(this).before("<h2 class='tabMobiletrigger'>" + textval[index] + "</h2>");
							$this.find('.tabMobiletrigger:first').addClass("rotate");
						});
						$('.tabMobiletrigger').click('click', function () {
							var tabAcoordianData = $(this).next('.tabcontent');
							if ($(tabAcoordianData).is(':visible')) {
								$(this).removeClass('rotate');
								$(tabAcoordianData).slideUp('normal');
								//return false;
							} else {
								$this.find('.tabMobiletrigger').removeClass('rotate');
								$(tabContent).slideUp('normal');
								$(this).addClass('rotate');
								$(tabAcoordianData).not(':animated').slideToggle('normal');
							}
							return false;
						});
					}

				} else {
					if ($('.tabMobiletrigger').length) {
						$('.tabMobiletrigger').remove();
						tabTrigger.removeClass("active");
						$this.find(tabTrigger).removeClass("active").first().addClass('active');
						$this.find(tabContent).hide().first().show();
					}
				}
			};
			$(window).on('resize', function () {
				if (!$this.hasClass('only-tab')) {
					responsivetabActive();
				}
			}).resize();
		});

		/* Accordion box JS
		---------------------------------------------------------------------*/
		$('.accordion-databox').each(function () {
			var $accordion = $(this),
				$accordionTrigger = $accordion.find('.accordion-trigger'),
				$accordionDatabox = $accordion.find('.accordion-data');

			$accordionTrigger.first().addClass('open');
			$accordionDatabox.first().show();

			$accordionTrigger.on('click', function (e) {
				var $this = $(this);
				var $accordionData = $this.next('.accordion-data');
				if ($accordionData.is($accordionDatabox) && $accordionData.is(':visible')) {
					$this.removeClass('open');
					$accordionData.slideUp(400);
					e.preventDefault();
				} else {
					$accordionTrigger.removeClass('open');
					$this.addClass('open');
					$accordionDatabox.slideUp(400);
					$accordionData.slideDown(400);
				}
			});
		});


		/* Mobile menu click
		---------------------------------------------------------------------*/
		$(document).on('click', "#menu", function () {
			$(this).toggleClass('menuopen');
			$(this).next('ul').slideToggle('normal');
			return false;
		});


		/* Header Sticky
		---------------------------------------------------------------------*/
		if ($("#header").length) {
			$(window).scroll(function () {
				var headerHeight = $('#header').outerHeight() - 20;
				if ($(this).scrollTop() > headerHeight) {
					$("#header").addClass("sticky");
				} else {
					$("#header").removeClass("sticky");
				}
			});
			var header = document.querySelectorAll('#header');
		}

		/* Sal Animation
				---------------------------------------------------------------------*/
		if ($("[data-sal]").length) {
			sal({
				once: true,
			});
		}

		// info_triggers
	/*Custom Popup
		---------------------------------------------------------------------*/
		/* Popup function
		---------------------------------------------------------------------*/
		var $dialogTrigger = $('.poptrigger'),
		$pagebody =  $('body');
		$dialogTrigger.click( function(){
			var popID = $(this).attr('data-rel');
			$('body').addClass('overflowhidden');
			var winHeight = $(window).height();
			$('#' + popID).fadeIn();
			var popheight = $('#' + popID).find('.popup-block').outerHeight(true);
			
			if( $('.popup-block').length){
				var popMargTop = popheight / 2;
				//var popMargLeft = ($('#' + popID).find('.popup-block').width()/2);
				
				if ( winHeight > popheight ) {
					$('#' + popID).find('.popup-block').css({
						'margin-top' : -popMargTop,
						//'margin-left' : -popMargLeft
					});	
				} else {
					$('#' + popID).find('.popup-block').css({
						'top' : 0,
						//'margin-left' : -popMargLeft
					});
				}
				
			}
			
			$('#' + popID).append("<div class='modal-backdrop'></div>");
			$('.popouterbox .modal-backdrop').fadeTo("slow", 0.89);
			if( popheight > winHeight ){
				$('.popouterbox .modal-backdrop').height(popheight);
			} 
			$('#' + popID).focus();
			return false;
		});
				
		$(window).on("resize", function () {
			if( $('.popouterbox').length && $('.popouterbox').is(':visible')){
				var popheighton = $('.popouterbox .popup-block').height()+60;
				var winHeight = $(window).height();
				if( popheighton > winHeight ){
					$('.popouterbox .modal-backdrop').height(popheighton);
					$('.popouterbox .popup-block').removeAttr('style').addClass('taller');
					
				} else {
					$('.popouterbox .modal-backdrop').height('100%');
					$('.popouterbox .popup-block').removeClass('taller');
					$('.popouterbox .popup-block').css({
						'margin-top' : -(popheighton/2)
					});
				}	
			}
		});
		
		//Close popup		
		$(document).on('click', '.close-dialogbox, .modal-backdrop', function(){
			$(this).parents('.popouterbox').fadeOut(300, function(){
				$(this).find('.modal-backdrop').fadeOut(250, function(){
					$('body').removeClass('overflowhidden');
					$('.popouterbox .popup-block').removeAttr('style');
					$(this).remove();
				});
			});
			return false;
		});


		/* Lozad JS
		---------------------------------------------------------------------*/
		if ($('.lozad').length) {
			const observer = lozad('.lozad', {
				rootMargin: '10px 0px', // syntax similar to that of CSS Margin
				threshold: 0.1, // ratio of element convergence
				enableAutoReload: true // it will reload the new image when validating attributes changes
			});
			observer.observe();
		}

		/* Masonary JS
		---------------------------------------------------------------------*/
		if ($('#project-list').length) {
			var container = document.querySelector('#project-list');
			var msnry = new Masonry(container, {
				// options
				itemSelector: '#project-list li'
			});
		}

		/* Fab Slider JS
		---------------------------------------------------------------------*/
		if ($('.fab-slider').length) {
			$('.fab-slider.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				nav: true,
				items: 1,
				navText: ["<i class='icon-left-slide'></i>", "<i class='icon-right-slide'></i>"],
				smartSpeed: 600,
			})
		}


		// Banner slider JS

		if ($('.banner-slider').length) {
			$('.banner-slider.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				nav: false,
				dots: false,
				autoplay: 2000,
				items: 1,
				navText: ["<i class='icon-left-slide'></i>", "<i class='icon-right-slide'></i>"],
				smartSpeed: 600,
			})
		}

		//Timeline slider

		if ($('.timeline-row').length) {
			$('.timeline-row.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				nav: true,
				dots: false,
				autoplay: 2000,
				items: 6,
				// navText: ["<i class='icon-left-slide'></i>", "<i class='icon-right-slide'></i>"],
				smartSpeed: 600,
			})
		}

		/* Fab Slider JS
		---------------------------------------------------------------------*/
		if ($('.collection-slider').length) {
			$('.collection-slider.owl-carousel').owlCarousel({
				loop: true,
				margin: 60,
				nav: false,
				dots: true,
				items: 5,
				smartSpeed: 600,
				responsive: {
					0: {
						items: 1,
						margin: 10,
					},
					568: {
						items: 2,
						margin: 40,
					},
					768: {
						items: 3,
						margin: 40,
					},
					1024: {
						items: 5
					}
				}
			})
		}

		/* Custom File Selection
		---------------------------------------------------------------------*/
		if($('#real-file').length) {
			const realFileBtn = document.getElementById("real-file");
			const customBtn = document.getElementById("custom-button");
			const customTxt = document.getElementById("custom-text");

			customBtn.addEventListener("click", function() {
				realFileBtn.click();
			});

			realFileBtn.addEventListener("change", function() {
				if (realFileBtn.value) {
					customTxt.innerHTML = realFileBtn.value.match(
						/[\/\\]([\w\d\s\.\-\(\)]+)$/
					)[1];
				} else {
					customTxt.innerHTML = "No file chosen, yet.";
				}
			});
		}

		/* Fab Slider JS
		---------------------------------------------------------------------*/
		if ($('.dealers-slider').length) {
			$('.dealers-slider.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				nav: true,
				dots: false,
				items: 3,
				navText: ["<i class='icon-left-slide'></i>", "<i class='icon-right-slide'></i>"],
				smartSpeed: 600,
				responsive: {
					0: {
						items: 1
					},
					568: {
						items: 2
					},
					768: {
						items: 3
					}
				}
			})
		}

		$(window).on('resize', function () {
			if (screencheck(1023)) {
				if (!$('.categories').length) {
					$('.fabric-row').prepend('<div class="categories"><h4>filters</h4></div>');
					$('.fabric-sidebar').appendTo('.categories');
					$('.categories h4').on('click', function () {
						$('.fabric-sidebar').slideToggle();
						$('.categories').toggleClass('active');
					});
				}
			} else {
				$('.fabric-sidebar').prependTo('.fabric-row');
				$('.categories').remove();
			}
		}).resize();

		var $clientSlider = $(".popular-fabric-slider, .inspire-fabric-slider");

		$(window).resize(function () {
			showLogoSlider();
		});

		function showLogoSlider() {
			if ($clientSlider.data("owlCarousel") !== "undefined") {
				if (window.matchMedia('(max-width: 1023px)').matches) {
					initialLogoSlider();
				} else {
					destroyLogoSlider();
				}
			}
		}
		showLogoSlider();

		function initialLogoSlider() {


			$('.inspire-fabric-slider').owlCarousel({
				items: 4,
				loop: false,
				margin: 20,
				dots: false,
				autoplay: true,
				smartSpeed: 600,

				responsive: {
					375: {
						margin: 10,
						items: 2
					},
					567: {
						margin: 10,
						items: 2
					},
					767: {
						margin: 10,
						items: 3
					},
					1023: {
						margin: 10,
						items: 3
					}
				}
			});

			$clientSlider.addClass("owl-carousel").owlCarousel({
				items: 4,
				loop: false,
				margin: 30,
				dots: false,
				autoplay: true,
				smartSpeed: 600,

				responsive: {
					375: {
						margin: 10,
						items: 2
					},
					567: {
						margin: 10,
						items: 3
					},
					767: {
						margin: 20,
						items: 4
					},
					1023: {
						margin: 20,
						items: 6
					}
				}
			});
		}

		function destroyLogoSlider() {
			$clientSlider.trigger("destroy.owl.carousel").removeClass("owl-carousel");
		}


		$(document).on('click', '.selection-blk > h6', function(){
			if($(this).next('.form-block').is(':hidden')){
				// $('.form-block').slideUp(500);
				// console.log('if');
				$(this).next('.form-block').slideDown(500);
			} else {
				// console.log('else');
				$(this).next('.form-block').slideUp(500);
			}
			return false;
		});

		// $(document).bind('click', function(e) {
		// 	var $clicked = $(e.target);
		// 	if (! $clicked.parents().hasClass("selection-blk"))
		// 		$(".form-block").hide();
		// 		// $('.icon-search').fadeIn(500);
		// });

		// $(document).on('click', '.selection-blk h6',function(){
		// 	$(".form-block").slideToggle("slow");
		//   });

		// $(document).on('click', '.selection-blk h6', function () {
		// 	$(this).next(".form-block").fadeIn(500);
		// })
		// $(document).on('click', '.selection-blk h6', function () {
		// 	$(this).next(".form-block").fadeOut(500);
		// })



// jQuery('.checkboxs').click(function() {
   

//     //console.log(mafsForm.serializeArray());
//     //console.log("form submitted");

  
//     var available = [];
//     $.each($("input[name='available']:checked"), function(){ 
//         available.push($(this).val());
//     });
    
//     //console.log(available);
//     var data = {
//         action : "get_news",
       
//         available : available
//     }

//     //console.log(data);

//     $.ajax({
//        url : belliny_obj.ajax_url,
//         type: 'POST',
//         data : data,
//         success : function(response) {
//             return{
//             	 jQuery('.trends-news-slider').html(result);
//             };
            
      
//         }
//     });

// });

 

function get_fabric(){
	console.log();

	var collection = [];

	$.each($("input[name='available']:checked"), function() {
		collection.push($(this).val());
	});
	var name = $('#searchbyname').val();
	var color = $('#searchbycolor').val();
// $('body').append('<div class="belliny_loader">Please wait...</div>');
	jQuery.ajax({
		url: belliny_obj.ajax_url,
		 
		data: {
			action: 'get_stoffen_gebruik',
			collection: collection,
			name: name,
			color: color,
			page : 1,
		},
		type: 'post',
		success: function(result) {
			console.log('click');
			jQuery('.fabric-slider').html(result);
			// $('body').find('.belliny_loader').remove();
			 
			
		},
		error: function(result) {
			console.warn(result.html);
			// $('body').find('.belliny_loader').remove();
		}
	});

}

//e.preventDefault();

jQuery('.search-btn, .gebruik-main input').click(function(){
	get_fabric();
});

$(document).on('click','.pagination a',function(e){


let text = e.target.href?e.target.href:e.target.parentNode.href;
console.log(text);

var myArray = text.split("/");
var page=myArray[myArray.length-1];
if(page){
	


	var collection = [];

	$.each($("input[name='available']:checked"), function() {
		collection.push($(this).val());
	});
	var name = $('#searchbyname').val();
	var color = $('#searchbycolor').val();
// $('body').append('<div class="belliny_loader">Please wait...</div>');
	jQuery.ajax({
		url: belliny_obj.ajax_url,
		 
		data: {
			action: 'get_stoffen_gebruik',
			collection: collection,
			name: name,
			color: color,
			page : page,
		},
		type: 'post',
		success: function(result) {
			console.log('click');
			jQuery('.fabric-slider').html(result);
			// $('body').find('.belliny_loader').remove();
			 
			
		},
		error: function(result) {
			console.warn(result.html);
			// $('body').find('.belliny_loader').remove();
		}
	});

}
else{
		var collection = [];

	$.each($("input[name='available']:checked"), function() {
		collection.push($(this).val());
	});
	var name = $('#searchbyname').val();
	var color = $('#searchbycolor').val();
// $('body').append('<div class="belliny_loader">Please wait...</div>');
	jQuery.ajax({
		url: belliny_obj.ajax_url,
		 
		data: {
			action: 'get_stoffen_gebruik',
			collection: collection,
			name: name,
			color: color,
			page : 1,
		},
		type: 'post',
		success: function(result) {
			console.log('click');
			jQuery('.fabric-slider').html(result);
			// $('body').find('.belliny_loader').remove();
			 
			
		},
		error: function(result) {
			console.warn(result.html);
			// $('body').find('.belliny_loader').remove();
		}
	});

}
return false;
})



/*--------------------------------------------------------------------------------------------------------------------------------------*/		
	});	

/*All function need to define here for use strict mode
----------------------------------------------------------------------------------------------------------------------------------------*/


	
/*--------------------------------------------------------------------------------------------------------------------------------------*/
})(jQuery, window, document);


jQuery(document).on('click', '.news-filter-list .checkbox ', function(e) {


	//var news_text = jQuery(this).data('available');
	var available = [];
	$.each($("input[name='available']:checked"), function() {
		available.push($(this).val());
	});
	// console.log(news_text);

	//e.stopPropagation();
	//e.preventDefault();
	// $('body').append('<div class="belliny_loader">Please wait...</div>');
	jQuery.ajax({
		url: belliny_obj.ajax_url,
		data: {
			action: 'get_news',
			page : 1,
			
			available: available
		},
		type: 'post',
		success: function(result) {

			jQuery('.trends-news-slider').html(result);
			// $('body').find('.belliny_loader').remove();
		},
		error: function(result) {
			console.warn(result.html);
			// $('body').find('.belliny_loader').remove();
		}
	});
});




var selector = '.search-type .search-btn ';

jQuery(selector).on('click', function() {

	jQuery(selector).removeClass('active');
	jQuery(this).addClass('active');
	//console.log('click');
});



var selector = '.search-color .search-btn1 ';

jQuery(selector).on('click', function() {

	jQuery(selector).removeClass('active');
	jQuery(this).addClass('active');
	//console.log('click');
});

$(document).on('click','.pagination-news a',function(e){


let text = e.target.href?e.target.href:e.target.parentNode.href;
console.log(text);

var myArray = text.split("/");
var page=myArray[myArray.length-1];
if(page){
	


	//var news_text = jQuery(this).data('available');
	var available = [];
	$.each($("input[name='available']:checked"), function() {
		available.push($(this).val());
	});
	// console.log(news_text);

	//e.stopPropagation();
	//e.preventDefault();
	// $('body').append('<div class="belliny_loader">Please wait...</div>');
	jQuery.ajax({
		url: belliny_obj.ajax_url,
		data: {
			action: 'get_news',
			page : page,
			
			available: available
		},
		type: 'post',
		success: function(result) {

			jQuery('.trends-news-slider').html(result);
			// $('body').find('.belliny_loader').remove();
		},
		error: function(result) {
			console.warn(result.html);
			// $('body').find('.belliny_loader').remove();
		}
	});

}
else{
		
	var available = [];
	$.each($("input[name='available']:checked"), function() {
		available.push($(this).val());
	});
	// $('body').append('<div class="belliny_loader">Please wait...</div>');
	
	jQuery.ajax({
		url: belliny_obj.ajax_url,
		data: {
			action: 'get_news',
			page : 1,
			
			available: available
		},
		type: 'post',
		success: function(result) {

			jQuery('.trends-news-slider').html(result);
			// $('body').find('.belliny_loader').remove();
		},
		error: function(result) {
			console.warn(result.html);
			// $('body').find('.belliny_loader').remove();
		}
	});

}
return false;
})


jQuery(document).ready(function($) {

    // Show the login dialog box on click
    $('a#show_login').on('click', function(e){
        $('body').prepend('<div class="login_overlay"></div>');
        $('form#login').fadeIn(500);
        $('div.login_overlay, form#login a.close').on('click', function(){
            $('div.login_overlay').remove();
            $('form#login').hide();
        });
        e.preventDefault();
    });

    // Perform AJAX login on form submit
    $('#login').on('click', function(e){
    	var ajaxurl = $('#ajax-url').val(); 
    //	alert(ajaxurl);
     //   $('form#login p.status').show().text(ajaxurl.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajaxurl,
            data: { 
                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('#username').val(), 
                'password': $('#password').val(), 
                'security': $('#security').val() },
            success: function(data){
            	//alert(data);
                $('form#login p.status').text(data.message);
                if (data.loggedin == true){
                	////console.log(ajaxurl.redirecturl);
                      document.location.href = 'http://64.4.160.99/beliny/fabrics-brand/';

                }
            }
        });
        // e.preventDefault();
    });

});