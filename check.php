<?php
// セッション変数を使うことを宣言する
session_start();
session_regenerate_id(true);

// フォームで入力されたデータを変数へ格納する
if (isset($_POST['name']) == true) {
$name = $_POST['name'];
}else {
$name = '';
}

if (isset($_POST['email']) == true) {
$email = $_POST['email'];
}else {
$email = '';
}

if (isset($_POST['message']) == true) {
$message = $_POST['message'];
}else {
$message = '';
}

// サニタイズする
$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$message = htmlspecialchars($message);

// エラーがない状態にセット（空配列）
$error = array();

//エラーメッセージの表示内容を記載する
//入力内容にバリデーションをつける
if ($name == ''){
$error[] = 'お名前が入力されていません';
}elseif(mb_strlen($name) > 50){
$error[] = 'お名前は半角50文字以内でご記入ください';
}

if ($email == ''){
$error[] = 'メールアドレスが入力されていません';
}elseif(!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $email)){
$error[] = 'メールアドレスが正しく入力されていません';
}

if ($message == ''){
$error[] = 'メッセージが入力されていません';
}elseif(mb_strlen($message) > 5000){
$error[] = 'メッセージは半角5000文字以内でご入力ください';
}

// セッション変数に値を格納
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['message'] = $message;

// ニックネーム変数、eメール変数、ご意見変数のどれかひとつでも空欄だったらifしてください
if(empty($error) != true){
// 配列をセッション変数に格納
$_SESSION['error'] = $error;
//初めのフォームに飛ぶ
header('Location: index.php#contact');
exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="description" content="Webディレクター吉岡稔仁のポートフォリオサイト">
  <title>PORTFOLIO | TOSHIHITO YOSHIOKA</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="image/favicon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/jquery.bxslider.js"></script>
  <!-- Google Tag Manager -->
  <script>(
    function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-P95LHN6');
  </script>
  <!-- End Google Tag Manager -->
</head>
<body>
<?php
// エラーメッセージを格納したセッション変数を削除
unset($_SESSION['error']);

print '<form method="post" action="thanks.php">';
print '<input type="submit" name="return" value="RETURN" class="button">';
print '<input type="submit" name="submit" value="SEND" class="button">';
print '</form>';
?>
<script src="js/myScript.js"></script>
</body>
</html>