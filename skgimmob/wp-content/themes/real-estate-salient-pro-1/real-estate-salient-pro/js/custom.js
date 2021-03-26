// ============= Begin of Initiating AOS =============
jQuery(document).ready(function() {
  AOS.init();
});
// ============= End of Initiating AOS =============

// ============= Begin of Smooth scroll =============
jQuery(document).ready(function() {
// Select all links with hashes
jQuery('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
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
// ============= Eng of Smooth scroll =============

jQuery(document).ready(function(){
// ============= Begin of Second word colour change =============
  var toBold = document.getElementsByClassName('bold-second-word');
  for (var i=0; i<toBold.length; ++i) {
    boldSecondWord(toBold[i]);
  }

  function boldSecondWord(elem) {
    elem.innerHTML = elem.textContent.replace(/\w+ (\w+)/, function(s, c) {
      return s.replace(c, '<span class="second-word-color">'+c+'</scan>');
    });
  }
});
// ============= End of Second word colour change =============



// ============= Begin of number counter =============
jQuery(function(){
  jQuery('.count-num').rCounter({
    duration: 25
  });
});
// ============= End of number counter =============

// Can also be used with $(document).ready()
jQuery(document).ready(function () {
 jQuery('.flexslider').flexslider({
    animation: "slide",
    controlsContainer: jQuery(".custom-controls-container"),
    customDirectionNav: jQuery(".custom-navigation a")
  });
});


jQuery(document).ready(function(){ 
    jQuery(window).scroll(function(){ 
        if (jQuery(this).scrollTop() > 100) { 
            jQuery('#scroll').fadeIn(); 
        } else { 
            jQuery('#scroll').fadeOut(); 
        } 
    }); 
    jQuery('#scroll').click(function(){ 
        jQuery("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});

jQuery(document).ready(function(){
  jQuery('.home-two-post .owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            nav:false,
            loop:true
        },
        600:{
            items:2,
            nav:false,
            loop:true
        },
        1000:{
            items:3,
            nav:false,
            loop:true
        }
    }
  })
});