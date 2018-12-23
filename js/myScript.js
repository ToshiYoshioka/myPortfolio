$(document).ready(function(){
  //$(".aboutMeImg").bgswitcher({
  // images: ["image/about_me01.png", "image/about_me02.png", "image/about_me03.png"],
  //Interval: 3000, //切り替えの間隔 1000=1秒
  //loop: true, //切り替えをループする
  //effect: "fade", //エフェクトの種類 "fade" "blind" "clip" "slide" "drop" "hide"
  //duration: 1000, //エフェクトの時間 1000=1秒
  //});
  $('a[href^="#"]').click(function() {
    var speed = 1000;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $('body,html').animate({
      scrollTop:position
      }, speed, 'swing');
    return false;
  });
});