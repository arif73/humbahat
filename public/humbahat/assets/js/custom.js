$(document).ready(function(){

  let typed = new Typed(".typing", {
    strings: ["Meat....", "Halal....", "Fresh....", "Authentic...."],
    typeSpeed: 200,
    backSpeed: 60,
    loop: true,
  });

  $(".buy-area.owl-carousel").owlCarousel({
  	items: 5,
  	loop: true,
  	autoplay: true,
  	autoplayTimeout: 3000,
  	autoplayHoverPause: true,
  	responsive:{
        0:{
            items:1
        },
        767:{
            items:2
        },
        991:{
        	items:3
        },
        1000:{
            items:5
        }
    }
  });
  $(".category-products.owl-carousel").owlCarousel({
  	items: 4,
  	loop: true,
  	autoplay: true,
  	autoplayTimeout: 3000,
  	autoplayHoverPause: true,
  	margin: 20,
  	responsive:{
        0:{
            items:1
        },
        991:{
            items:2
        },
        1000:{
            items:4
        }
    }
  });
  $(".all-testimonials.owl-carousel").owlCarousel({
  	items: 3,
  	loop: true,
  	autoplay: true,
  	autoplayTimeout: 4000,
  	autoplayHoverPause: true,
  	margin: 25,
  	dots: true,
  	responsive:{
        0:{
            items:1
        },
        767:{
            items:1
        },
        991:{
        	items:2
        },
        1000:{
            items:3
        }
    }
  });





});


$(document).ready(function(){
	$(".menu-click").click(function(){
	    $(".main-menu-area").children('ul').slideToggle(200);
	  });
})