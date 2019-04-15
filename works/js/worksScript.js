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
  $(".worksHistory").bxSlider({
    nextSelector:"a#next-btn",
    prevSelector:"a#prev-btn",
    nextText:'',
    prevText:''
  });
});