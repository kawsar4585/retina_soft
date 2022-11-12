"use strict";

(function ($) {
  "use strict"; // data - background

  $("[data-background]").each(function () {
    $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
  });
  $("[data-bg-color]").each(function () {
    $(this).css("background", $(this).attr("data-bg-color"));
  });
  /* magnificPopup img view */

  $('.popup-image').magnificPopup({
    type: 'image',
    gallery: {
      enabled: true
    }
  });
  /* magnificPopup video view */

  $('.popup-video').magnificPopup({
    type: 'iframe'
  }); // Header Sticky

  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();

    if (scroll < 245) {
      $(".header-sticky").removeClass("sticky");
    } else {
      $(".header-sticky").addClass("sticky");
    }
  }); // Review active H1

  $('.review-activeh3').slick({
    speed: 1000,
    autoplay: false,
    autoplaySpeed: false,
    dots: false,
    fade: false,
    arrows: true,
    prevArrow: "<i class='common-arrow common-arrow--prev slider--arrow slider--prev fal fa-long-arrow-left'></i>",
    nextArrow: "<i class='common-arrow common-arrow--next slider--arrow slider--next fal fa-long-arrow-right'></i>",
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        dots: false
      }
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        fade: false,
        arrows: false
      }
    } // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  }); // Calendar active H1

  $('.calendar-active').slick({
    variableWidth: true,
    autoplay: false,
    autoplaySpeed: false,
    dots: true,
    fade: false,
    arrows: true,
    prevArrow: "<i class='common-arrow common-arrow--prev slider--arrow slider--prev fal fa-long-arrow-left'></i>",
    nextArrow: "<i class='common-arrow common-arrow--next slider--arrow slider--next fal fa-long-arrow-right'></i>",
    slidesToShow: 4,
    slidesToScroll: 2,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        dots: false
      }
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        fade: false,
        arrows: false
      }
    } // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  }); // Sponsor active

  $('.course-active').slick({
    speed: 1000,
    autoplay: false,
    autoplaySpeed: false,
    dots: true,
    fade: false,
    arrows: true,
    prevArrow: "<i class='common-arrow common-arrow--prev fal fa-long-arrow-left'></i>",
    nextArrow: "<i class='common-arrow common-arrow--next fal fa-long-arrow-right'></i>",
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        fade: false,
        arrows: false
      }
    } // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });
  $('.courses-carousel').owlCarousel({
    loop: false,
    autoplay: true,
    margin: 0,
    nav: true,
    dots: true,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      480: {
        items: 2
      },
      1024: {
        items: 3
      },
      1200: {
        items: 3
      }
    }
  }); // niceSelect

  $('select').niceSelect();
})(jQuery);