/*  ---------------------------------------------------
  Template Name: Gym
  Description:  Gym Fitness HTML Template
  Author: Colorlib
  Author URI: https://colorlib.com
  Version: 1.0
  Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    var navText = document.getElementsByTagName('html')[0].getAttribute('dir') === 'rtl' ? ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'] : ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Canvas Menu
    $(".canvas-open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("show-offcanvas-menu-wrapper");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".canvas-close, .offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("show-offcanvas-menu-wrapper");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    // Search model
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });

    //Masonary
    // $('.gallery').masonry({
    //     itemSelector: '.gs-item',
    //     columnWidth: '.grid-sizer',
    //     gutter: 10
    // });

    /*------------------
        Navigation
    --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Carousel Slider
    --------------------*/
    var hero_s = $(".hs-slider");
    hero_s.owlCarousel({
        rtl: true,
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: navText,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false
    });

    /*------------------
        Team Slider
    --------------------*/
    $(".ts-slider").owlCarousel({
        rtl: true,
        loop: true,
        margin: 0,
        items: 3,
        dots: true,
        dotsEach: 2,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            320: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            }
        }
    });

    /*------------------
        Testimonial Slider
    --------------------*/
    $(".ts_slider").owlCarousel({
        rtl: true,
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: navText,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    /*------------------
        Image Popup
    --------------------*/
    $('.image-popup').magnificPopup({
        type: 'image'
    });

    /*------------------
        Video Popup
    --------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*------------------
        Barfiller
    --------------------*/
    // $('#bar1').barfiller({
    //     barColor: '#ffffff',z
    //     duration: 2000
    // });
    // $('#bar2').barfiller({
    //     barColor: '#ffffff',
    //     duration: 2000
    // });
    // $('#bar3').barfiller({
    //     barColor: '#ffffff',
    //     duration: 2000
    // });

    $('.table-controls ul li').on('click', function () {
        var tsfilter = $(this).data('tsfilter');
        $('.table-controls ul li').removeClass('active');
        $(this).addClass('active');

        if (tsfilter == 'all') {
            $('.class-timetable').removeClass('filtering');
            $('.ts-meta').removeClass('show');
        } else {
            $('.class-timetable').addClass('filtering');
        }
        $('.ts-meta').each(function () {
            $(this).removeClass('show');
            if ($(this).data('tsmeta') == tsfilter) {
                $(this).addClass('show');
            }
        });
    });

})(jQuery);

document.addEventListener('scroll', function () {
    const navbar = document.getElementsByClassName('header-section')[0];
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// To Activate the Tooltip bootstrap 
// const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
// const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

// dynamic activate navbar links on scroll
function setActiveNavLink() {
    const sections = document.querySelectorAll("section[id]");
    const navItems = document.querySelectorAll(".nav-item"); // Assuming your nav links have the class 'nav-item'
    let foundActiveSection = false;

    // Clear active class from all nav links
    navItems.forEach((link) => link.classList.remove("active"));

    // Check if any section is in the viewport
    sections.forEach((section) => {
        const rect = section.getBoundingClientRect();
        if (
            rect.top <= window.innerHeight / 2 &&
            rect.bottom >= window.innerHeight / 2
        ) {
            const activeLink = document.querySelector(
                `.nav-link[href="/#${section.id}"]`
            );
            if (activeLink) {
                activeLink.parentElement.classList.add("active");
            }
            foundActiveSection = true;
        }
    });

    // If no section is in the viewport, set the first nav link as active
    if (!foundActiveSection && navItems.length > 0) {
        navItems[0].classList.add("active");
    }
}

// Add event listener for scroll and DOM content load
window.addEventListener("scroll", setActiveNavLink);
document.addEventListener("DOMContentLoaded", setActiveNavLink);
