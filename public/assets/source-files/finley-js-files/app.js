/*! ------------------------------------------------
 * Project Name: Finley Template
 * Project Description: Finley - Stylish HTML Template for Creative Projects
 * Tags: mix_design, coming soon, under construction, template, landing page, portfolio, one page, responsive, html5, css3, creative, clean, agency, personal page
 * Version: 1.0.1
 * Build Date: May 2023
 * Last Update: January 2024
 * This product is available exclusively on Themeforest
 * Author: mix_design
 * Author URI: https://themeforest.net/user/mix_design
 * File name: app.js
 * ------------------------------------------------

 * ------------------------------------------------
 * Table of Contents
 * ------------------------------------------------
 *
 *  1. SVG Fallback
 *  2. Chrome Smooth Scroll
 *  3. Images moving ban
 *  4. Main Menu & Sections Behavior
 *  5. Popup Open/Close
 *  6. Header Appearance Change on Scroll
 *  7. Popups Behavior
 *  8. Buttons Hover Effect
 *
 * ------------------------------------------------
 * Table of Contents End
 * ------------------------------------------------ */

$(function() {

  "use strict";

  // SVG Fallback
  if(!Modernizr.svg) {
    $("img[src*='svg']").attr("src", function() {
      return $(this).attr("src").replace(".svg", ".png");
    });
  };

  // Chrome Smooth Scroll
  try {
    $.browserSelector();
    if($("html").hasClass("chrome")) {
      $.smoothScroll();
    }
  } catch(err) {
  };

  // Images moving ban
  $("img, a").on("dragstart", function(event) { event.preventDefault(); });

  // Popup Open/Close
  var notify            = $('#notify'),
      notifyTrigger     = $('#notify-trigger'),
      notifyClose       = $('#notify-close');

  // Notify Form Open
  notifyTrigger.on('click', function(event){
    event.preventDefault();
    notify.addClass('animate-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
      notifyClose.addClass('is-visible');
    });
  });

  // Notify Form Close
  notifyClose.on('click', function(event){
    event.preventDefault();
    notifyClose.removeClass('is-visible');
    setTimeout(function(){
      notify.addClass('animate-out');
    }, 300);
    setTimeout(function(){
      notify.removeClass('animate-in animate-out');
    }, 1600);
  });

  // Header Appearance Change on Scroll
  var header         = $('#header'),
      aboutSection   = $('#about'),
      worksSection   = $('#works'),
      contactSection = $('#contact'),
      mainSection    = $('#main');

  mainSection.on("scroll", function() {
    header.addClass('header-scroll');
    if ($('.main__intro').offset().top < -50) {
      header.addClass('header-scroll');
    } else {
      header.removeClass('header-scroll');
    }
  });

  aboutSection.on("scroll", function() {
    header.addClass('header-scroll');
    if ($('#about .inner__container').offset().top < -50) {
      header.addClass('header-scroll');
    } else {
      header.removeClass('header-scroll');
    }
  });

  worksSection.on("scroll", function() {
    header.addClass('header-scroll');
    if ($('#works .inner__container').offset().top < -50) {
      header.addClass('header-scroll');
    } else {
      header.removeClass('header-scroll');
    }
  });

  contactSection.on("scroll", function() {
    header.addClass('header-scroll');
    if ($('#contact .inner__container').offset().top < -50) {
      header.addClass('header-scroll');
    } else {
      header.removeClass('header-scroll');
    }
  });

  // Menu & Sections Behavior
  var menuTrigger        = $('#menu-trigger'),
      menu               = $('#nav'),
      header             = $('#header'),
      mainSection        = $('#main'),
      aboutSection       = $('#about'),
      worksSection       = $('#works'),
      contactSection     = $('#contact'),
      homeTrigger        = $('#home-trigger'),
      aboutTrigger       = $('#about-trigger'),
      worksTrigger       = $('#works-trigger'),
      contactTrigger     = $('#contact-trigger');

  menuTrigger.on('click', function(event){
    event.preventDefault();

    if (menu.hasClass('animate-in')) {
      menuTrigger.removeClass('menu-opened');
      menu.addClass('animate-out');
      setTimeout(function(){
        header.removeClass('menu-is-visible');
        $('.active').addClass('animate-in');
      }, 1000);
      setTimeout(function(){
        $('body').removeClass('overflow-hidden');
        menu.removeClass('animate-in animate-out');
        // if one of the content sections is opened, the header becomes light/transparent
        if ($('.inner').hasClass('active')) {
          header.addClass('inner-is-visible');
        }
      }, 1200);
    } else {
      $('.active').addClass('animate-out');
      menuTrigger.addClass('menu-opened');
      $('body').addClass('overflow-hidden');
      setTimeout(function(){
        menu.addClass('animate-in');
        header.removeClass('inner-is-visible');
        header.addClass('menu-is-visible');
        $('.active').animate({
          scrollTop: 0 ,
        }, 100);
      }, 500);
      setTimeout(function(){
        $('.active').removeClass('animate-out animate-in');
      }, 1200);
    }

  });

  // common actions on menu item click
  $('.menu__link').on('click', function(event){
    $('.active').removeClass('active');
    $('.active-link').removeClass('active-link');
    menu.addClass('animate-out');
    $('body').removeClass('overflow-hidden');
    setTimeout(function(){
      menuTrigger.removeClass('menu-opened');
      menu.removeClass('animate-in animate-out');
      header.removeClass('menu-is-visible');
    }, 1000);
  });

  // home section open
  homeTrigger.on('click', function(event) {
    event.preventDefault();
    setTimeout(function(){
      header.removeClass('menu-is-visible');
      mainSection.addClass('active animate-in');
      homeTrigger.addClass('active-link');
    }, 1000);
  });

  // about section open
  aboutTrigger.on('click', function(event) {
    event.preventDefault();
    setTimeout(function(){
      header.addClass('inner-is-visible');
      aboutSection.addClass('active animate-in');
      aboutTrigger.addClass('active-link');
    }, 1000);
  });

  // works section open
  worksTrigger.on('click', function(event) {
    event.preventDefault();
    setTimeout(function(){
      header.addClass('inner-is-visible');
      worksSection.addClass('active animate-in');
      worksTrigger.addClass('active-link');
    }, 1000);
  });

  // contact section open
  contactTrigger.on('click', function(event) {
    event.preventDefault();
    setTimeout(function(){
      header.addClass('inner-is-visible');
      contactSection.addClass('active animate-in');
      contactTrigger.addClass('active-link');
    }, 1000);
  });

  // Detecting Mobile/Descktop
  var isMobile = false;
  if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $('html').addClass('touch');
    isMobile = true;
  }
  else {
    $('html').addClass('no-touch');
    isMobile = false;
  }
  //IE, Edge
  var isIE = /MSIE 9/i.test(navigator.userAgent) || /rv:11.0/i.test(navigator.userAgent) || /MSIE 10/i.test(navigator.userAgent) || /Edge\/\d+/.test(navigator.userAgent);

  // Cursor
  function followCursor() {
    var cursor = $('.cursor');
    // follow effect
    function moveCursor(e) {
	    var t = e.clientX + "px",
          n = e.clientY + "px";
      var circleCursor = anime({
        targets: '.cursor',
        duration: 30,
        left: t,
        top: n,
        easing: 'linear'
      });
    }
    $(window).on('mousemove', moveCursor);
    // line link hover
    $('.link-s').on('mouseenter', function() {
      cursor.addClass('cursor-s');
    });
    $('.link-s').on('mouseleave', function() {
      cursor.removeClass('cursor-s');
    });
    // buttons & triggers hover
    $('.link-l').on('mouseenter', function() {
      cursor.addClass('cursor-l');
    });
    $('.link-l').on('mouseleave', function() {
      cursor.removeClass('cursor-l');
    });
    // XL controls hover
    $('.link-xl').on('mouseenter', function() {
      cursor.addClass('cursor-xl');
    });
    $('.link-xl').on('mouseleave', function() {
      cursor.removeClass('cursor-xl');
    });
  };
  // init
  followCursor();

  // Smooth Scrolling for Link Type Buttons
  // select all links with hashes
  $('a[href*="#"]')
  // remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // on-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // does a scroll target exist?
      if (target.length) {
        // only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, scrollDuration, function() {
          // callback after animation
          // must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

});