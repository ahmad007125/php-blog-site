    // new WOW().init();

(function ($) {

   'use strict';

    /*
     * ----------------------------------------------------------------------------------------
     *  SMOTH SCROOL JS
     * ----------------------------------------------------------------------------------------
     */

    $('a.smoth-scroll').on('click', function (e) {
        var anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top - 50
        }, 1000);
        e.preventDefault();
    });



    /* ==========================================================================
      COUNTER UP 
 ========================================================================== */

    // $('.counter').counterUp({
    //     delay: 10,
    //     time: 1000
    // });

    // $('.carousel').carousel({
    //   interval: 8000
    // });
    
    /* Closes the Responsive Menu on Menu Item Click*/
    $('.navbar-collapse .navbar-nav a').on('click', function () {
        $('.navbar-toggler:visible').click();
    });
    /*END MENU JS*/

    
    /* ----------------------------------------------------------- */
    /*  Fixed header
    /* ----------------------------------------------------------- */


    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 70) {
            $('.site-navigation,.trans-navigation').addClass('header-white');
        } else {
            $('.site-navigation,.trans-navigation').removeClass('header-white');
        }



    });


    /* ==========================================================================
      SCROLL SPY
 ========================================================================== */

    // $('body').scrollspy({
    //     target: '.navbar-collapse',
    //     offset: 195
    // });






          /*START GOOGLE MAP*/
          // function initialize() {
          //   var mapOptions = {
          //     zoom: 15,
          //     scrollwheel: false,
          //     center: new google.maps.LatLng(40.7127837, -74.00594130000002)
          //   };
          //   var map = new google.maps.Map(document.getElementById('map'),
          //       mapOptions);
          //   var marker = new google.maps.Marker({
          //     position: map.getCenter(),
          //     icon: 'assets/img/map_pin.png',
          //     map: map
          //   });
          // }
          // google.maps.event.addDomListener(window, 'load', initialize);	
          /*END GOOGLE MAP*/	

})(window.jQuery);



// For smooth scrolling effect on scroll event
// const easeSpeed = 0.2;
// let moveDistance = 0,
// curScroll = 0;

// document.addEventListener("scroll", () => {
//   moveDistance = window.scrollY
// })

// const ghostEle = document.createElement("section");
// ghostEle.style.height = document.querySelector("body").scrollHeight + "px";
// document.querySelector("body").after(ghostEle);

// function animate() {
//   requestAnimationFrame(animate);

//   curScroll = curScroll + (easeSpeed * (moveDistance - curScroll));
//   if (curScroll < 0.001) curScroll = 0;
//   document.querySelector("body").style.transform = `translateY(${curScroll * -1}px)`
// }
// animate();


// For smooth scroll on link click
$(function () {
    "use strict";
    $('.scroll-link').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 68
        }, 0);
        event.preventDefault();
    });
});


// window.onscroll = function() {scrollFunction()};
// function scrollFunction() {
//     if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
//         document.getElementById("header").classList.add("sticky");
//     } else {
//         document.getElementById("header").classList.remove("sticky");
//     }
// }


 // let prevScrollpos = window.pageYOffset;

 //  window.onscroll = function() {
 //    var targetHeader = document.getElementById('header');
 //    var headerHeight = window.getComputedStyle(targetHeader).height;
    
 //    let currentScrollPos = window.pageYOffset;
 //    if (currentScrollPos > headerHeight) {
 //        document.getElementById("header").classList.add("scrolled-down");
 //      if (prevScrollpos > currentScrollPos) {
 //        document.getElementById("header").style.top = "0";
 //      } else {
 //        document.getElementById("header").style.top = "-" + headerHeight + "px";
 //      }
 //      prevScrollpos = currentScrollPos;
 //    } else {
 //        document.getElementById("header").classList.remove("scrolled-down");
 //    } 

 //  }


  // Function to check viewport width and move the div after a sibling
function checkViewportWidth() {
    var changePos = document.querySelector('.centered-nav');
    var container = document.querySelector('.header-container .container');
    var sibling = document.querySelector('.header-container .container .logo');

    if (window.innerWidth <= 767) {
        container.appendChild(changePos);
    } else {
        // Append the div after the sibling
        sibling.insertAdjacentElement('afterend', changePos);
    }
}

// Attach event listeners for window resize and orientation change
window.addEventListener('resize', function() {
    checkViewportWidth();
});

window.addEventListener('orientationchange', function() {
    checkViewportWidth();
});

// Initial check on page load
checkViewportWidth();



// Get the target header element and its height
var targetHeader = document.getElementById('header');
var headerHeight = targetHeader.offsetHeight;
// console

var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;

    if (currentScrollPos > headerHeight) {
        targetHeader.classList.add("scrolled-down");

        if (prevScrollpos > currentScrollPos) {
            targetHeader.style.top = "0";
        } else {
            targetHeader.style.top = "-" + headerHeight + "px";
        }

        prevScrollpos = currentScrollPos;
    } else {
        targetHeader.classList.remove("scrolled-down");
    }
};
