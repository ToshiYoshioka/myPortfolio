$(document).ready(function(){
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
  $('.anken').click(function(e){
    e.preventDefault(); //idを取得するとページ内リンクスクローラーとぶつかるのでdata-contents属性を取得したいし、hrefをクリックしても遷移する動きを止めたい
    var id = perseInt($(this).data('contents'));
    changeContents(id); //ajaxのところで記述するchangeContents関数をid変数を引数にして呼び出す
  });
  
  //changeContents関数を記述する
  function changeContents(id){
    //ajaxでjsonデータのindex番号nthの各項目を流し込む
    $.ajax({
      url: 'data.json', //読み込みたいファイルのパス
      type: 'POST',  //通信方式にはpostメソッドを用いる
      dataType: 'json' //データファイルをjsonとして定義
    })
    .done(function(data,status,xhr){ //ajax通信に成功して、jsonのデータをもらったら
        $('#title').html(data[id].title); //案件名にtitleデータを流し込む
        $.each(data[id].productSlide, function(imgIndex, imgValue){ //images のなかの各データを
          $('#sliderImage').append($('<li>').append($('<img>', {src:imgValue}))); //<li>をappendして、さらに<img src=imgValue>をappendする
        })
        $('#assigned').html(data[id].assigned); //担当業務概要にassignedデータを流し込む
        $('#teams').html(data[id].teams); //ポジション・チームにteamsデータを流し込む 
        $('#period').html(data[id].period); //対応期間にperiodデータを流し込む
        $('#language').html(data[id].language); //対応言語にlanguageデータを流し込む
        $('#designTools').html(data[id].designTools); //制作ツールにdesignToolsデータを流し込む
        $('#convTools').html(data[id].convTools); //コミュニケーションツールにconvToolsデータを流し込む
        $('#comment').html(data[id].comment); //コメントにcommentデータを流し込む
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
