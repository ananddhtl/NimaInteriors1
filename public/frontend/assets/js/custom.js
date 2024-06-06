(function ($) {
	
	"use strict";

	// Window Resize Mobile Menu Fix
	mobileNav();
	welcomeFix();


	// Scroll animation init
	window.sr = new scrollReveal();


	// // Welcome area init
	if($('.owl-carousel').length){
		var welcomeSlider = $(".owl-carousel");
		welcomeSlider.owlCarousel({
			loop:true,
			margin:10,
			nav:false,
			margin: 30,
			responsive:{
				0:{
					items: 1.5
				},
				600:{
					items: 1.5
				},
				1000:{
					items: 1.75
				}
			}
		});

		checkClasses();
		welcomeSlider.on('translated.owl.carousel', function(event) {
			checkClasses();
		});

		function checkClasses(){
			var total = $('.owl-carousel .owl-stage .owl-item.active').length;

			$('.owl-carousel .owl-stage .owl-item').removeClass('firstActiveItem');

			$('.owl-carousel .owl-stage .owl-item.active').each(function(index){
				if (index === 0) {
					$(this).addClass('firstActiveItem');
				}
			});
		}	

		$('.base .prev').on('click', function(){
			welcomeSlider.trigger('prev.owl.carousel');
		});

		$('.base .next').on('click', function(){
			welcomeSlider.trigger('next.owl.carousel');
		});
	}


	// Menu Dropdown Toggle
	if($('.menu-trigger').length){
		$(".menu-trigger").on('click', function() {	
			$(this).toggleClass('active');
			$('.header-area .nav').slideToggle(200);
			// $('.header-area .ham-contact-us').slideToggle(200); 
		});
	}


	// About me progressbar
	if($('.skill-wrapper').length){
		$('.skill-wrapper .skill-item').each(function(index){
			var val = $(this).find('.line').data('value');
			$(this).find('.line').css('width', val);
		});
	}


	// Home number counterup
	if($('.count-item').length){
		$('.count-item strong').counterUp({
			delay: 10,
			time: 1000
		});
	}


	// Blog cover image
	if($('.blog-post-single').length){
		$('.blog-post-single').imgfix();
	}


	// Blog grid cover image
	if($('.blog-post-grid').length){
		$('.blog-post-grid').imgfix();
	}


	// Sidebar contact banner image
	if($('.sidebar .box').length) {
		$('.sidebar .box').imgfix();
	}


	// Project grid cover image
	if($('.project-grid-item').length){
		$('.project-grid-item .img').imgfix();
	}


	// Project list cover image
	if($('.project-list-item').length){
		$('.project-list-item .img').imgfix();
	}


	// Page standard gallery
	if($('.page-gallery').length && $('.page-gallery-wrapper').length){
		$('.page-gallery').imgfix({
			scale: 1.1
		});

		$('.page-gallery').magnificPopup({
			type: 'image',
			gallery: {
				enabled: true
			},
			zoom: {
				enabled: true,
				duration: 300,
				easing: 'ease-in-out',
			}
		});
	}


	// Youtube Player
	if($('.play').length){
		$('.play').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});
	}


	// Page loading animation
	$(window).on('load', function() {
		if($('.cover').length){
			$('.cover').parallax({
				imageSrc: $('.cover').data('image'),
				zIndex: '1'
			});
		}

		$(".preloader-wrapper").animate({
			'opacity': '0'
		}, 600, function(){
			setTimeout(function(){
				// Home Parallax
				if($('.parallax-image').length){
					$('.parallax-image').parallax({
						imageSrc: 'frontend/assets/images/photos/welcome/img-2.jpeg',
						zIndex: '1'
					});
				}

				// Home Parallax Counterup
				if($('.parallax-counter').length){
					$('.parallax-counter').parallax({
						imageSrc: 'frontend/assets/images/photos/welcome/img-1.jpeg',
						zIndex: '1'
					});
				}
				$(".preloader-wrapper").css("visibility", "hidden").fadeOut();
			}, 300);
		});
	});


	// Window Resize Mobile Menu Fix
	$(window).on('resize', function() {
		mobileNav();
		welcomeFix();
	});


	// Window Resize Mobile Menu Fix
	function mobileNav() {
		var width = $(window).width();
		$('.submenu').on('click', function() {
			if(width < 992) {
				$('.submenu ul').removeClass('active');
				$(this).find('ul').toggleClass('active');
			}
		});
	}


	// Welcome area set position
	function welcomeFix() {
		if($('.welcome').length){
			var height = $(window).height();
			var wwidth = $(window).width();

			if(wwidth > 992) {	
				$('.welcome').css('height', height);
				var sliderPosition = ($('.slider-position').offset().left);

				$('.slider-wrapper').css({
					'left': sliderPosition,
					'width': wwidth - sliderPosition,
					'position': 'absolute'
				});
			}else{
				$('.welcome').css('height', 'auto');
				$('.slider-wrapper').css({
					'left': '0px',
					'width': '100%',
					'position': 'relative'
				});
			}
		}
	}
	
// hamburger menu function script
document.addEventListener("DOMContentLoaded", function() {
    // Get the current page URL
    var currentUrl = window.location.pathname;

    // Remove leading slash for comparison
    currentUrl = currentUrl.replace(/^\/+|\/+$/g, '');

    // Get all navigation links
    var navLinks = document.querySelectorAll('.nav a');

    // Loop through each navigation link
    navLinks.forEach(function(link) {
        // Get the href attribute value and remove leading slash for comparison
        var href = link.getAttribute('href').replace(/^\/+|\/+$/g, '');

        // Add the 'active' class to the link if its href matches the current page URL
        if (href === currentUrl) {
            link.classList.add('active');
        }
    });
    var contactLink = document.getElementById('contact-link');
        if (contactLink && currentUrl === 'contactus') {
            contactLink.classList.add('active');
        }
});


    // Get the elements
    const wholeContainer = document.querySelector('.whole-container');
    const containerShow = document.querySelector('.container-show');
    const header = document.querySelector('.container-top-header');
    const menuTrigger = document.querySelector('.menu-trigger');
    function hideContainers() {
        wholeContainer.style.display = 'none';
        containerShow.style.display = 'none';
    }

    function showContainers() {
        wholeContainer.style.display = 'block';

        if (window.innerWidth < 992  ) {
            containerShow.style.display = 'block';
            wholeContainer.style.display = 'none';
            
        }
        else{
            containerShow.style.display = 'none';
            wholeContainer.style.display = 'block';
           
        }
    }
   
    function toggleContainers() {
        if (window.scrollY > header.offsetHeight) {
            hideContainers();
            menuTrigger.classList.add('ham-menu-down');
        } else {
            showContainers();
            
            menuTrigger.classList.remove('ham-menu-down');
        }
    }

    window.addEventListener('scroll', toggleContainers);
    window.addEventListener('resize', toggleContainers);

    // Initial call to set visibility based on initial scroll position
    toggleContainers();

	// langauge button function


// user account button function
    document.addEventListener('DOMContentLoaded', function() {
    var accountToggler = document.getElementById('account-toggler');
    var accountDropdown = document.getElementById('account-dropdown');

    accountToggler.addEventListener('click', function() {
        accountDropdown.classList.toggle('show');
    });
});

    document.addEventListener('DOMContentLoaded', function() {
    var accountToggler = document.getElementById('account-toggler-m');
    var accountDropdown = document.getElementById('account-dropdown-m');

    accountToggler.addEventListener('click', function() {
        accountDropdown.classList.toggle('show');
    });
});


// search function start
    // document.addEventListener('DOMContentLoaded', function() {
    //     var searchLink = document.getElementById('search-link');
    //     var searchForm = document.getElementById('search-form');

      

    //     searchLink.addEventListener('click', function(event) {
    //         event.preventDefault(); // Prevent the default link behavior

    //         // Debugging: Log current display style
    //         console.log('Current display style:', searchForm.style.display);

    //         if (searchForm.style.display === 'none' || searchForm.style.display === '') {
    //             searchForm.style.display = 'block';
    //         } else {
    //             searchForm.style.display = 'none';
    //         }

    //         // Debugging: Log new display style
    //         console.log('New display style:', searchForm.style.display);
    //     }, { passive: true });
    // });


})(window.jQuery);

