//scroll down
(function ($) {
  $(document).ready(function () {
    // WOW JS
    new WOW().init();


    //slick slider 
    $('.center').slick({
      slidesToShow: 3,
      dots: false,
      arrows: true,
      autoplay: true,
      autoplaySpeed: 3000,
      responsive: [{
          breakpoint: 768,
          settings: {
            arrows: false,
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            slidesToShow: 1
          }
        }
      ]
    });

    $('.clients-image-slider').slick({
      slidesToShow: 5,
      dots: false,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: true,
      responsive: [{
          breakpoint: 768,
          settings: {
            arrows: false,
            slidesToShow: 3
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            slidesToShow: 2
          }
        }
      ]
    });


    $(".main-feature-contain:has(p)").addClass("has-paragraph");
    //single page nav
    var $scrollStatus = $('.scroll-status');
    $('.nav').navScroll({
      mobileDropdown: true,
      mobileBreakpoint: 768,
    });

    $('.click-me').navScroll({
      navHeight: 40
    });

    $('.nav').on('click', '.nav-mobile', function (e) {
      e.preventDefault();
      $('.nav ul').slideToggle('slow');
    });

    //sticky nav
    var mn = $(".eboost-main-menu-wrapper");
    mns = "main-nav-scrolled";
    hdr = $('.header-accessories').height();

    $(window).scroll(function () {
      if ($(this).scrollTop() > hdr) {
        mn.addClass(mns);
      } else {
        mn.removeClass(mns);
      }
    });


    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('#gotop').fadeIn("300");
      } else {
        $('#gotop').fadeOut("300");
      }
    });

    //Click event to scroll to top
    $('#gotop').click(function () {
      $('html, body').animate({
        scrollTop: 0
      }, 400);
      return false;
    });


  });

  // chane image on hover tab
  $(document).off('click.bs.tab.data-api', '[data-hover="tab"]');
  $(document).on('mouseenter.bs.tab.data-api', '[data-toggle="tab"], [data-hover="tab"]', function () {
    $(this).tab('show');
  });


  $(document).ready(function () {
    $(window).resize(function () {
      if ($(window).width() < 767) {
        $("section#banner-section").css({
          "padding-top": $(".eboost-main-menu-wrapper").height()
        });
      } else {
        $("section#banner-section").css({
          "padding-top": "0"
        });
      }

      if ($(window).width() > 767) {
        var half = parseInt($(".img").innerHeight()) / 4;
        $('.eboost-service-description').css('margin-top', half);
        $('.eboost-service-description').css('padding-top', 0);
      } else {
        $('.eboost-service-description').css('padding-top', 60);
         $('.eboost-service-description').css('margin-top', 0);
      }

      // change height        
      $(".wrapper.page-inner-title").css({
        "top": $(".eboost-main-menu-wrapper").height()
      });

      $("div#content").css({
        "padding-top": $(".eboost-main-menu-wrapper").height()
      });

      $("body.home.page div#content").css({
        "padding-top": "0"
      });

      $("body.home.page .site-content.sections-are-disabled").css({
        "padding-top": $(".eboost-main-menu-wrapper").height()
      });

      if ($("div#main-menu").hasClass("eboost-menu-black")) {
        $(".home div#content").addClass("sections-are-disabled");
      }
    }).resize();;
  });

})(jQuery);