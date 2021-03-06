$(document).ready(function(){

  //デフォルトでコンテンツを表示させる。処理はこの後書く。
  changeContents(0);
  
  //ページ内リンクスクローラー
  $('a[href^="#"]').click(function(){ //href^="#" → href属性の値が#で始まるアンカーを踏んだら…の意味
    var href = $(this).attr('href');
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $('html,body').animate({
      scrollTop:position
      }, 1000, 'swing');
    return false;
  });
  
  
  //ハンバーガーメニューの各項目のdata-contentsの番号を取得して、jsonデータのインデックス番号を指定する
  $('.anken').click(function(){
    var id = parseInt($(this).data('contents'));
    changeContents(id); //ajaxのところで記述するchangeContents関数をid変数を引数にして呼び出す
    return false; //クリック→遷移 の動作を止める
  });
  
  //changeContents関数を記述する
  function changeContents(id){
    //ajaxでjsonデータのindex番号nthの各項目を流し込む
    $.ajax({
      url: 'data.json', //読み込みたいファイルのパス
      type: 'POST',  //通信方式にはpostメソッドを用いる
      dataType: 'json' //データファイルをjsonとして定義
    })
    .done(function(data){ //ajax通信に成功して、jsonのデータをもらったら
        //案件名にtitleデータを流し込む（以下テキスト系は同じ処理）
        $('#title').html(data[id].title); 
        //bx-sliderプラグインが生成したDOMが既に存在しているので、根こそぎ消去する。
        //消去の対象になるDOMは、画像を入れ子しているdivとページャー、三角の送りボタンの合計４つ
        if ($('.bx-wrapper')) $('.bx-wrapper').remove(); 
        if ($('.bx-next')) $('.bx-next').remove();
        if ($('.bx-prev')) $('.bx-prev').remove();
        if ($('.bx-pager')) $('.bx-pager').remove();
        //ul#slideImage.worksHistoryを生成して.historyContainerの後ろに追加する
        $('<ul>',{class:'worksHistory', id:'sliderImage'}).appendTo('.historyContainer');
        //productSlide のなかの各データを
        $.each(data[id].productSlide, function(imgIndex, imgValue){
          //#slideImage に対して<li>タグを生成して追加し、その入れ子に<img src=imgValue>を流し込む
          $('#sliderImage').append($('<li>').html($('<img>', {src:imgValue}))); 
        });
        $('#assigned').html(data[id].assigned);
        $('#teams').html(data[id].teams);
        $('#period').html(data[id].period);
        $('#language').html(data[id].language);
        $('#designTools').html(data[id].designTools);
        $('#convTools').html(data[id].convTools);
        $('#comment').html(data[id].comment);
        //ajax通信は通常のリクエストの処理と並行して走るので、流し込みが終わってからbxsliderのオプションを指定する
        //この順番で書かないと、画像の読み込み前にページャーを指定することになるのでうまくレンダリングされない
        $('.worksHistory').bxSlider({
          nextSelector:"a#next-btn",
          prevSelector:"a#prev-btn",
          nextText:'',
          prevText:''
        }) //.boxslider()の閉じカッコ
      }) //.done()の閉じカッコ
    .fail(function(){  //ajax通信に失敗した場合の処理
      window.alert('読み込みエラー');
    });
  };//changeContents関数閉じカッコ
});
