/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        $(function() {
          $("#modal-footer").on("change", function() {
            if ($(this).is(":checked")) {
              $("body").addClass("modal-open");
            } else {
              $("body").removeClass("modal-open");
            }
          });

          $(".modal-fade-screen, .modal-close").on("click", function() {
            $(".modal-state:checked").prop("checked", false).change();
          });

          $(".modal-inner").on("click", function(e) {
            e.stopPropagation();
            // e.preventDefault();
          });
        });



        (function() {
          var triggerBttn = $('#js-mobile-menu'),
            overlay = $( 'header.banner' ),
            closeBttn = $( 'a.overlay-close' ),
            transEndEventNames = {
              'WebkitTransition': 'webkitTransitionEnd',
              'MozTransition': 'transitionend',
              'OTransition': 'oTransitionEnd',
              'msTransition': 'MSTransitionEnd',
              'transition': 'transitionend'
            },
            transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
            support = { transitions : Modernizr.csstransitions };

          function toggleOverlay() {
            if( $(overlay).hasClass( 'open' ) ) {
              $(overlay).removeClass( 'open' );
              $(overlay).addClass( 'close' );
            }
            else {
              $(overlay).removeClass( 'close' );
              $(overlay).addClass( 'open' );
            }
          }

          triggerBttn.on( 'click', toggleOverlay );
          closeBttn.on( 'click', toggleOverlay );
        })();
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // Gallery pages
    'parent_pageid_13': {
      init: function() {

        // JavaScript to be fired on the Gallery pages
        $('section.gallery').featherlightGallery({
          filter: "a",
          targetAttr: "data-image",
          previousIcon: '«',
          nextIcon: '»',
          galleryFadeIn: 0,
          openSpeed: 0,
          afterOpen: function(event) {
            fl_instance = this.$instance;
            $('body').on('click','.featherlight-content .featherlight-next',function(e){
              e.stopPropagation();
              fl_instance.trigger("next");
              console.log('n');
            });
            $('body').on('click','.featherlight-content .featherlight-previous',function(){
              fl_instance.trigger("previous");
              console.log('p');
            });
          },
          afterContent: function(event) {
            fl_instance = this.$instance;
            //remove old stuff
            $(".featherlight-previous").detach();
            $(".featherlight-next").detach();
            fl_instance.find('header').remove();
            fl_instance.find('.keywords').remove();
            fl_instance.find('.caption').remove();

            //new stuff
            fl_content = fl_instance.find('.featherlight-content');

            var title = this.$currentTarget.attr('data-title');
            var keywords_escaped = this.$currentTarget.attr('data-keywords');
            var keywords = keywords_escaped;
            var caption = this.$currentTarget.attr('data-caption');

            var t = "<h1 class='title'>" + title + "</h1>";
            var k = "<aside class='keywords'>" + keywords + "</aside>";
            var c = "<p class='caption'>" + caption + "</p>";
            var b = "<div class='buttons'><span title='previous' class='featherlight-previous'><span>«</span></span><span title='next' class='featherlight-next'><span>»</span></span></div>";

            $(fl_content).append( "<header>" + t + c + k + b + "</header>" );
          },
          onResize: function() {
            fl_content = this.$instance.find('.featherlight-content');
            fl_content.find('img').css({
              'height': '',
              'width': '',
              'max-width': '100%',
              'max-height': '100%',
              'margin': 'auto',
              'overflow': 'auto'});
          },
          afterClose: function() {
            $( ".featherlight-next, .featherlight-previous" ).unbind( "click" );
          },
        });
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
