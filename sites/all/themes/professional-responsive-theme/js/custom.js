jQuery(document).ready(function($) {
  $('.nav-toggle').click(function() {
    $('#main-menu div ul:first-child').slideToggle(250);
    return false;
  });
  if( ($(window).width() > 640) || ($(document).width() > 640) ) {
      $('#main-menu li').mouseenter(function() {
        $(this).children('ul').css('display', 'none').stop(true, true).slideToggle(250).css('display', 'block').children('ul').css('display', 'none');
      });
      $('#main-menu li').mouseleave(function() {
        $(this).children('ul').stop(true, true).fadeOut(250).css('display', 'block');
      })
        } else {
    $('#main-menu li').each(function() {
      if($(this).children('ul').length)
        $(this).append('<span class="drop-down-toggle"><span class="drop-down-arrow"></span></span>');
    });
    $('.drop-down-toggle').click(function() {
      $(this).parent().children('ul').slideToggle(250);
    });
  }
 
  $("#choose_next_step").click(function() {
    $('html, body').animate({
        scrollTop: $("#webform-component-mini-break-details").offset().top
    }, 2000);
  });
 
});