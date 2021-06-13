<?php
// //セッション変数を使います宣言
// session_start();
// session_regenerate_id(true);

// //もしセッション変数に定義がある場合は、入力された値を使用する
// if(isset($_SESSION['name'])== true){
//   $name = $_SESSION['name'];
// }else{
//   $name = '';
// }

// if(isset($_SESSION['email'])== true){
//   $email = $_SESSION['email'];
// }else{
//   $email = '';
// }

// if(isset($_SESSION['message'])== true){
//   $message = $_SESSION['message'];
// }else{
//   $message = '';
// }

// //サニタイズする
// $name = htmlspecialchars($name);
// $email = htmlspecialchars($email);
// $message = htmlspecialchars($message);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="description" content="Webディレクター吉岡稔仁のポートフォリオサイト">
  <title>works history | TOSHIHITO YOSHIOKA</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="css/works.css">
  <link rel="icon" href="../image/favicon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../js/jquery.bxslider.js"></script>
  <!-- Google Tag Manager -->
  <script>(
    function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-P95LHN6');
  </script>
  <!-- End Google Tag Manager -->
  <style>
  .button_closed{
    display: block;
    position: relative;
    width: 250px;
    padding: 10px;
    margin: 60px auto 30px;
    background: #999999;
    border: none;
    border-radius: 5px;
    box-shadow: 0 3px 0 #3e3d3c;
    text-shadow: 0 1px 1px rgba(0, 0, 0, .3);
    font-size: 1.8rem;
    letter-spacing: 0.5rem;
  }
  </style>
</head>
<body>
<header class="header" id="header">
  <!-- <div class="menuIcon">
    <div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input">
        <span></span>
      </label>
      <label id="nav-close" for="nav-input" class="nav-unshown"></label>
      <div id="nav-content">
        <nav>
          <ul>
            <li><a href="../../index.php" target="_blank">TOP PAGE</a></li>
            <li><a class="anken" href='iij' data-contents="0">IIJmio webサイト運用</a></li>
            <li><a class="anken" href='yahoo' data-contents="1">Yahoo!ショッピングWebサイト運用</a></li>
            <li><a class="anken" href='clean' data-contents="2">クリーン用品ECサイト運用</a></li>
            <li><a class="anken" href='aparel' data-contents="3">アパレルECサイト運用</a></li>
            <li><a class="anken" href='original' data-contents="4">個人製作</a></li>
            <li><a href="#contact">contact</a></li>
          </ul>
        </nav>
      </div><!--nav-content>
    </div><!--nav-drawer>
  </div><!--menuIcon> -->
  <h1 class="headingOne">works history</h1>
  <p class="subTitle">portfolio of my works</p>
  <p class="button_closed">Currently<br>under<br>renovation</a>
</header>
<footer class="footer">
  &#169; Toshihito Yoshioka
</footer>
<script src="js/worksScript.js"></script>
</body>
</html>