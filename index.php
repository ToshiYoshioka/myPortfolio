<?php
//セッション変数を使います宣言
session_start();
session_regenerate_id(true);

//もしセッション変数に定義がある場合は、入力された値を使用する
if(isset($_SESSION['name'])== true){
  $name = $_SESSION['name'];
}else{
  $name = '';
}

if(isset($_SESSION['email'])== true){
  $email = $_SESSION['email'];
}else{
  $email = '';
}

if(isset($_SESSION['message'])== true){
  $message = $_SESSION['message'];
}else{
  $message = '';
}

//サニタイズする
$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$message = htmlspecialchars($message);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="description" content="Webディレクター吉岡稔仁のポートフォリオサイト">
  <title>PORTFOLIO | TOSHIHITO YOSHIOKA</title>
  <link rel="icon" href="image/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header" id="header">
    <div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input">
      <div class="menuIcon"><span></span></div><!--menuIcon-->
      </label>
      <label id="nav-close" for="nav-input" class="nav-unshown"></label>
      <div id="nav-content">
        <nav>
          <ul>
            <li><a href="#aboutMe">about me</a></li>
            <li><a href="#works">works</a></li>
            <li><a href="#skills">skills</a></li>
            <li><a href="#contact">contact</a></li>
          </ul>
        </nav>
      </div><!--nav-content-->
    </div><!--nav-drawer-->
    <p class="subTitle">portfolio of my works</p>
  <h1 class="headingOne">TOSHIHITO YOSHIOKA</h1>
    <a class="button" href="#contact">contact</a>
</header>
<section class="aboutMe" id="aboutMe">
  <h2 class="headingTwo">about me</h2>
    <ul class="aboutMeImg">
      <li class="active" ><img src="image/about_me01.png" alt="aboutMeImage1"></li>
      <li><img src="image/about_me02.png" alt="aboutMeImage2"></li>
      <li><img src="image/about_me03.png" alt="aboutMeImage3"></li>
    </ul>
    <ul class="aboutMeDescription">
      <li class="aboutMeText">名前：吉岡 稔仁 (よしおかとしひと)</li>
      <li class="aboutMeText">誕生日：1986年11月14日</li>
      <li class="aboutMeText">出身地：埼玉県</li>
      <li class="aboutMeText">性別：男</li>
      <li class="aboutMeText">星座：さそり座</li>
      <li class="aboutMeText">趣味：釣り、ギター、占い</li>
    </ul>
</section>
<section class="works" id="works">
  <h2 class="headingTwo">works</h2>
  <ul id="bx-slider">
  <li class="sliderContainer">
    <div class="worksContainer">
      <img class="worksImg" src="image/works01.png" alt="IIJ mio Webサイト運用イメージ">
    </div>
    <h3 class="headingThree">IIJmio Webサイト運用</h3>
    <div class="pcLayoutParent clearFix">
    <div class="worksLayout">
    <p class="paragraph">【担当業務】</p>
      <ul class="worksDescription">
        <li class="worksText">制作物ソースレビュー、動作確認</li>
        <li class="worksText">Gitを用いたバージョン管理、リリース</li>
        <li class="worksText">HTML5、CSS3のマークアップ</li>
        <li class="worksText">新端末発売リリーススケジュールの作成</li>
        <li class="worksText">カスタマーサポートセンターとの業務連携</li>
        <li class="worksText">メールマガジン配信業務</li>
        <li class="worksText">各業務フローの作業マニュアル構築</li>
      </ul>
    </div><!--worksLayout-->
    <div class="worksLayout">
      <p class="paragraph">【チーム体制】</p>
      <ul class="worksDescription">
        <li class="worksText">ディレクター：2名</li>
        <li class="worksText">デザイナー：2名</li>
        <li class="worksText">コーダー：2名</li>
        <li class="worksText">フロントエンドエンジニア：3名</li>
      </ul>
    </div><!--worksLayout-->
    <div class="worksLayout">
      <p class="paragraph">【ツール等】</p>
      <ul class="worksDescription">
        <li class="worksText">HTML5</li>
        <li class="worksText">CSS3</li>
        <li class="worksText">Brackets</li>
        <li class="worksText">SourceTree</li>
        <li class="worksText">Gitlab</li>
        <li class="worksText">Redmine</li>
        <li class="worksText">Office365</li>
        <li class="worksText">Excel 2016</li>
      </ul>
    </div><!--worksLayout-->
    </div><!--pcLayoutParent-->
  </li><!--sliderContainer-->
  <li class="sliderContainer">
    <div class="worksContainer">
      <img class="worksImg" src="image/works02.png" alt="Yahoo!ショッピング Webサイト運用イメージ">
    </div>
    <h3 class="headingThree">Yahoo!ショッピング<br>Webサイト運用</h3>
    <div class="pcLayoutParent clearFix">
    <div class="worksLayout">
    <p class="paragraph">【担当業務】</p>
      <ul class="worksDescription">
        <li class="worksText">販促キャンペーンページの更新作業</li>
        <li class="worksText">Movable Typeを用いたページ構築</li>
        <li class="worksText">HTML5、CSS3のマークアップ</li>
        <li class="worksText">バナー画像の作成</li>
        <li class="worksText">HTMLメールマガジンのマークアップ</li>
        <li class="worksText">各業務フローの作業マニュアル構築</li>
      </ul>
    </div><!--worksLayout-->
    <div class="worksLayout">
      <p class="paragraph">【チーム体制】</p>
      <ul class="worksDescription">
        <li class="worksText">ディレクター：2名</li>
        <li class="worksText">デザイナー兼コーダー：3名</li>
        <li class="worksText">事務オペレータ：3名</li>
      </ul>
    </div><!--worksLayout-->
    <div class="worksLayout">
      <p class="paragraph">【ツール等】</p>
      <ul class="worksDescription">
        <li class="worksText">HTML5</li>
        <li class="worksText">CSS3</li>
        <li class="worksText">Movable Type</li>
        <li class="worksText">Photoshop</li>
        <li class="worksText">Illustrator</li>
        <li class="worksText">Dreamweaver</li>
        <li class="worksText">JIRA</li>
        <li class="worksText">Excel 2016</li>
      </ul>
    </div><!--worksLayout-->
    </div><!--pcLayoutParent-->
  </li><!--sliderContainer-->
  <li class="sliderContainer">
    <div class="worksContainer">
      <img class="worksImg" src="image/works03.png" alt="アパレルECサイト運用イメージ">
    </div>
    <h3 class="headingThree">アパレルECサイト運用</h3>
    <div class="pcLayoutParent clearFix">
    <div class="worksLayout">
    <p class="paragraph">【担当業務】</p>
      <ul class="worksDescription">
        <li class="worksText">商品詳細ページの構築</li>
        <li class="worksText">販促キャンペーンページの構築</li>
        <li class="worksText">HTML5、CSS3のマークアップ</li>
        <li class="worksText">商品画像の撮影、編集作業</li>
        <li class="worksText">商品ページコピーライティング</li>
        <li class="worksText">シーズンカタログ作成</li>
        <li class="worksText">受注発送業務</li>
      </ul>
    </div><!--worksLayout-->
    <div class="worksLayout">
      <p class="paragraph">【チーム体制】</p>
      <ul class="worksDescription">
        <li class="worksText">ディレクター：2名</li>
        <li class="worksText">デザイナー：2名</li>
        <li class="worksText">コーダー兼事務オペレータ：2名</li>
        <li class="worksText">事務オペレータ：2名</li>
      </ul>
    </div><!--worksLayout-->
    <div class="worksLayout">
      <p class="paragraph">【ツール等】</p>
      <ul class="worksDescription">
        <li class="worksText">Photoshop</li>
        <li class="worksText">Illustrator</li>
        <li class="worksText">Dreamweaver</li>
        <li class="worksText">HTML5</li>
        <li class="worksText">CSS3</li>
        <li class="worksText">FutureShop<br>（カートシステム）</li>
        <li class="worksText">Chatwork</li>
        <li class="worksText">Excel 2016</li>
      </ul>
    </div><!--worksLayout-->
    </div><!--pcLayoutParent-->
  </li><!--sliderContainer-->
  </ul><!--#bx-slider-->
  <div><!--customControl-->
    <a id="prev-btn" class="leftMark"></a>
    <a id="next-btn" class="rightMark"></a>
  </div><!--customControl-->
  <a class="button" href="works" target="_blank">read more</a>
</section>
<section class="skills" id="skills">
  <h2 class="headingTwo">skills</h2>
  <div class="pcLayoutParent clearFix">
  <div class="skillsLayout">
  <div class="skillsImg coding">coding</div>
  <h3 class="headingThree">coding</h3>
  <p class="skillsText">
    HTML5、CSS3、JQuery、php のマークアップを行います。<br>
    読みやすさと拡張性を意識した、運用しやすい制作物を心掛けています。<br>
    Git を用いたリソースのバージョン管理も経験しています。
  </p>
  </div><!--skillsLayout-->
  <div class="skillsLayout">
  <div class="skillsImg direction">direction</div>
  <h3 class="headingThree">direction</h3>
  <p class="skillsText">
    制作・開発の工数管理や関係部署とのスケジュール調整など、<br>
    プロジェクト全体の進捗管理を経験しています。<br>
    納期内で実現出来る最高のクオリティをテーマにしています。
  </p>
  </div><!--skillsLayout-->
  <div class="skillsLayout">
  <div class="skillsImg copywriting">design and copywriting</div>
  <h3 class="headingThree">copywriting</h3>
  <p class="skillsText">
    商品やサービスの魅力を正しく、わかりやすく伝えること。<br>
    それを自分のそばに置く事でどんな利益が得られるのか。<br>
    そんなことをいつも考えながら業務に取り組んでいます。
  </p>
  </div><!--skillsLayout-->
  </div><!--pcLayoutParent-->
</section>
<section class="contact" id="contact">
  <h2 class="headingTwo">contact</h2>
    <form class="contactForm" method="post" action="check.php">
      <input type="text" name="name" value="<?php print $name; ?>" placeholder="name">
      <input type="text" name="email"  value="<?php print $email; ?>" placeholder="email">
      <textarea name="message" placeholder="message"><?php print $message; ?></textarea>
      <?php
      // エラーがあった場合は、エラー表示をする
      if (isset($_SESSION['error']) == true) {
       $error = $_SESSION['error'];
      print '<p style="color: red;">';
      foreach($error as $err) {
      print $err.'<br />';
      }
      print '</p>';
      }
      ?>
      <input type="submit" value="SEND" class="button">
    </form>
</section>
<footer class="footer">
  &#169; Toshihito Yoshioka
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/jquery.bxslider.js"></script>
<script src="js/myScript.js"></script>
</body>
</html>