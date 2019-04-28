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
  <title>works history | TOSHIHITO YOSHIOKA</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="css/works.css">
  <link rel="icon" href="../image/favicon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../js/jquery.bxslider.js"></script>
</head>
<body>
<header class="header" id="header">
  <div class="menuIcon">
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
      </div><!--nav-content-->
    </div><!--nav-drawer-->
  </div><!--menuIcon-->
  <h1 class="headingOne">works history</h1>
</header>
<section class="worksDetail">
  <h2 class="headingTwo" id="title">案件名</h2>
    <div class="historyContainer">
      <!--ここのDOMはscriptで生成する-->
    </div><!--historyContainer-->
    <div><!--customControl-->
      <a id="next-btn" class="rightMark"></a>
      <a id="prev-btn" class="leftMark"></a>
    </div><!--customControl-->
    <h3 class="headingThree">【担当業務概要】</h3>
    <div class="worksDescription">
      <p class="worksText" id="assigned">
      <!--ここのコンテンツはJqueryで取得する-->
      </p>
    </div><!--worksDescription-->
    <div class="historyLayoutParent clearFix">
      <div class="historyLayout1">
      <h3 class="headingThree">【ポジション・チーム】</h3>
      <div class="worksDescription">
        <p class="worksText" id="teams">
        <!--ここのコンテンツはJqueryで取得する-->
        </p>
      </div><!--worksDescription-->
      </div><!--historyLayout1-->
      <div class="historyLayout1">
      <h3 class="headingThree">【対応期間】</h3>
      <div class="worksDescription">
        <p class="worksText" id="period">
        <!--ここのコンテンツはJqueryで取得する-->
        </p>
      </div><!--worksDescription-->
      </div><!--historyLayout1-->
    </div><!--historyLayoutParent-->
      <h3 class="headingThree">【言語・ツール】</h3>
    <div class="historyLayoutParent clearFix">
      <div class="historyLayout2">
        <p class="paragraph bold">～対応言語～</p>
        <div class="worksDescription">
        <p class="worksText" id="language">
        <!--ここのコンテンツはJqueryで取得する-->
        </p>
        </div>
      </div><!--historyLayout2-->
      <div class="historyLayout2">
        <p class="paragraph bold">～制作ツール～</p>
        <div class="worksDescription">
          <p class="worksText" id="designTools">
          <!--ここのコンテンツはJqueryで取得する-->
          </p>
        </div>
      </div><!--historyLayout2-->
      <div class="historyLayout2">
        <p class="paragraph bold">～コミュニケーションツール～</p>
        <div class="worksDescription">
          <p class="worksText" id="convTools">
          <!--ここのコンテンツはJqueryで取得する-->
          </p>
        </div>
      </div><!--historyLayout2-->
    </div><!--historyLayoutParent-->
    <h3 class="headingThree">【コメント】</h3>
    <p class="comment" id="comment">
    <!--ここのコンテンツはJqueryで取得する-->
    </p>
</section>
<section class="contact" id="contact">
  <h2 class="headingTwo">contact</h2>
    <form class="contactForm"  method="post" action="myPortfolio/check.php">
      <input type="text" name="name" value="<?php print $name; ?>" placeholder="name">
      <input type="text" name="email" value="<?php print $email; ?>" placeholder="email">
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
<script src="js/worksScript.js"></script>
</body>
</html>