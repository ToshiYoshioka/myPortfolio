$(document).ready(function(){
  /*ページ内リンクアニメーション*/
  $('a[href^="#"]').click(function(){ //href^="#" → href属性の値がidで始まるもの、の意味
    var href = $(this).attr("href"); //クリックしたアンカーのhref属性を取得する
    var target = $(href == "#" || href == "" ? 'html' : href); 
    // target変数に代入するのは、href変数の値もしくはhtmlそのもの（htmlそのもの、の指定には三項演算子を使っている）
    var position = target.offset().top;
    //offset().topメソッド→ドキュメントからの相対位置を取得する。target変数に代入されたa#hogehogeのtop位置を取得する
    $('html,body').animate({
      scrollTop:position
      }, 1000, 'swing');
    return false;
  });
  //aboutMeスライドショー
  $(".aboutMeImg").hide().fadeIn(1000); //最初の<li>をふわっと出すためのアニメーション
  setInterval(function(){
    var $active_image = $(".aboutMeImg li.active");
    var $next_image = $active_image.next().length > 0 ? $active_image.next() : $(".aboutMeImg li:first") ;
    //三項演算子で$active_imageの次に要素があるときは次の要素を$next_imageに代入、次の要素がなければ最初の<li>を$next_imageに代入する
    $next_image.addClass("next").css({opacity:0})
      .animate({opacity:1}, 2000, function(){
        $active_image.removeClass("active");
        $next_image.removeClass("next").addClass("active");
      })
  },3000);
  //bxSlider
  $('#bx-slider').bxSlider({
    nextSelector:'a#next-btn',
    prevSelector:'a#prev-btn',
    nextText:'',
    prevText:''
  });
});