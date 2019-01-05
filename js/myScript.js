$(document).ready(function(){
  $('a[href^="#"]').click(function() {
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $('html,body').animate({
      scrollTop:position
      }, 1000, 'swing');
    return false;
  });
  $(".aboutMeImg").hide().fadeIn(1000);
  setInterval(function(){
    var $active_image = $(".aboutMeImg li.active");
    var $next_image = $active_image.next().length > 0 ? $active_image.next() : $(".aboutMeImg li:first") ;
    $next_image.addClass("next").css({opacity:0})
      .animate({opacity:1}, 2000, function(){
        $active_image.removeClass("active");
        $next_image.removeClass("next").addClass("active");
      })
  },3000);
  $("#bx-slider").bxSlider({
    nextSelector:"a#next-btn",
    prevSelector:"a#prev-btn",
    nextText:'',
    prevText:''
  });
});