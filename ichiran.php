<!DOCTYPE html>
<html>
<head>
<head>
  <meta charset="utf-8">
  <meta name="description" content="contactフォームのレコード一覧">
  <title>PORTFOLIO-contact | TOSHIHITO YOSHIOKA</title>
</head>
<title>メッセージ一覧結果</title>
</head>
<body>
<?php

$dsn = 'mysql:dbname=myPortfolio;host=localhost';
$user = 'root';
$password = '';

try {
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');
  $sql = 'SELECT * FROM contact WHERE 1';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $dbh = null;

  while(1) {
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($rec == false) {
    break;
    }
    print $rec['code'];
    print $rec['name'];
    print $rec['email'];
    print $rec['message'];
    print '<br />';
    }
  }
catch(Exception $e) {
  echo "例外が生じました。";
  exit;
}
?>
</body>
</html>
