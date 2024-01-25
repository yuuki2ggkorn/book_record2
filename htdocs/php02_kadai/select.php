<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  //$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
  
} catch (PDOException $e) {
  exit('DBConnection Error:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table;");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_Error:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<div class="book-container">';
    $view .= '<img src="'.htmlspecialchars($res['image_url']).'" class="book-thumbnail" style="width:100px; height:auto; float:left; margin-right:10px;"/>';
    $view .= '<div class="book-details">';
    $view .= '<h2 class="book-title">'.htmlspecialchars($res['book_title']).'</h2>';
    $view .= '<p class="book-author">'.htmlspecialchars($res['book_author']).'</p>';
    $view .= '<p class="book-publisher">'.htmlspecialchars($res['book_publisher']).'</p>';
    $view .= '<p class="book-description">'.htmlspecialchars($res['naiyou']).'</p>';
    $view .= '</div>'; // book-details の終了タグ
    $view .= '<div style="clear:both;"></div>'; // クリアフロート
    $view .= '</div>'; // book-container の終了タグ
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>読書記録表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<style>
  body {
    text-align: center;
    background-color: #d1c0b5;
  }
  
  header, main, form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .navbar {
    width: 100%;
    justify-content: center;
  }
  
  .navbar-header{
    display: flex;
    justify-content: center;
  }
  .jumbotron {
  width: 100%;
  margin: 0;
  padding: 15px;
  background-color: #d1c0b5;
}

.book-container {
    display: flex;
    padding: 0.5rem; /* 8px if 1rem = 16px */
    border: 1px solid #D1D5DB; /* Tailwindのborder-gray-300に相当 */
    margin-bottom: 0.5rem; /* 8px if 1rem = 16px */
    background-color: #eeeeee;
  }

</style>
<body id="main">
<!-- Head[Start] -->
<header>
<h1>読書記録</h1>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">書籍検索</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
