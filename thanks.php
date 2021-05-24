<?php
//PHPMailerとException を使いますよ宣言
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//セッション変数を使うことを宣言する
session_start();
session_regenerate_id(true);

//RETURNボタンを押したら、最初のフォームへ戻る
if(isset($_POST['return']) == true && $_POST['return'] == 'RETURN') {
	header('Location: index.php#contact');
	exit;
}

//セッション変数の値を変数へ格納する
if (isset($_SESSION['name']) == true) {
	$name = $_SESSION['name'];
}
else {
	$name = '';
}

if (isset($_SESSION['email']) == true) {
	$email = $_SESSION['email'];
}
else {
	$email = '';
}

if (isset($_SESSION['message']) == true) {
	$message = $_SESSION['message'];
}
else {
	$message = '';
}

//サニタイズする
$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$message = htmlspecialchars($message);

//タイムゾーンのセット
date_default_timezone_set('Asia/Tokyo');
require_once("./PHPMailer/src/PHPMailer.php");     //ライブラリー読込
require_once("./PHPMailer/src/Exception.php");  	  //ライブラリー読込
require_once("./PHPMailer/src/SMTP.php");          //ライブラリー読込
mb_language("japanese");
mb_internal_encoding("UTF-8");
 
//認証情報
$host          = "smtp.gmail.com";
$smtp_user     = "1019021toshihito@gmail.com";
$smtp_password = "xuywjcbmecjsvayo";
$from          = "1019021toshihito@gmail.com";
$port          = 587;
$ssl_type      = "tls";
 
//メールに記載する文面
$fromname = "吉岡稔仁";
$to       = $email;
$subject  = "お問い合わせありがとうございます";
$body     = <<<EOD
{$name} 様
以下の内容で受け付けました。
後日ご連絡いたしますので、しばらくお待ちください。
                
おなまえ：{$name}
メールアドレス：{$email}
メッセージ：
{$message}
                
吉岡稔仁
EOD;


try {
 //データベースへの接続
 $dsn = 'mysql:dbname=LAA1056404-8665cc07eef0;host=mysql135.phy.lolipop.lan';
 $user = 'LAA1056404';
 $password = 't19oS861hI14hI4t';
 $dbh = new PDO($dsn,$user,$password);
 $dbh -> query('SET NAMES utf8');

 //thanks.phpからデータベースcontactへレコードを追加する
 $sql='INSERT INTO contact(name,email,message)VALUES("'.$name.'","'.$email.'","'.$message.'")';
 $stmt=$dbh->prepare($sql);
 $stmt->EXECUTE();
 
 //データベースcontactへレコードを追加したら、忘れずにデータベースとの接続を切る
 $dbh = null;
 
	//メール送信
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth    = true;
	//$mail->SMTPDebug   = 2;	//デバッグなどを行うときはコメントアウトを解除！
	$mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer'       => false,	//SSLサーバー証明書の検証を要求するか（デフォルト：true）
            'verify_peer_name'  => false,	//ピア名の検証を要求するか（デフォルト：true）
            'allow_self_signed' => true		//自己証明の証明書を許可するか（デフォルト：false、trueにする場合は「verify_peer」をfalseに）
   	    )
	);
	$mail->CharSet    = "utf-8";
	$mail->SMTPSecure = $ssl_type;
	$mail->Host       = $host;
	$mail->Port       = $port;
	$mail->IsHTML(false);
	$mail->Username   = $smtp_user;
	$mail->Password   = $smtp_password; 
	$mail->SetFrom($smtp_user);
	$mail->From       = $from;
	$mail->FromName   = mb_encode_mimeheader($fromname, "JIS", "UTF-8");
	$mail->Subject    = mb_encode_mimeheader($subject,  "JIS", "UTF-8");
	$mail->Body       = $body;
	$mail->AddAddress($to);
    
	if (!$mail->Send()) {
        echo "メール送信に失敗しました。";
        echo "Mailer Error: " . $mail->ErrorInfo;
		exit;
	}
}
catch(Exception $e) {
	echo "例外が生じました。";
    echo "Exception Message：" . $e->getMessage();
	exit;
}

// セッションの値を初期化
$_SESSION = array();

// セッションを破棄
session_destroy();
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
//thanks.phpでは以下を表示する
print $name;
print 'さま<br>';
print 'メッセージありがとうございました！<br>';
print '頂いたご意見「';
print nl2br($message); 
print '」<br>';
print $email;
print 'に自動返信メールをお送りしましたのでご確認ください';
?>
<p><a href="index.php">戻る</a></p>
<script src="js/myScript.js"></script>
</body>
</html>