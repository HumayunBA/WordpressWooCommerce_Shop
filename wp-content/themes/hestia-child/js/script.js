// Can also be used with $(document).ready()
var $=jQuery.noConflict();

$(window).on('load', function() {
    $('.flexslider').flexslider({
      animation: "slide"
    });
  });