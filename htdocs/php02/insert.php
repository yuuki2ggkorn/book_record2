<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$name = $_POST['name'];
$email = $_POST['email'];
$naiyou = $_POST['naiyou'];
echo '<pre>';
print_r($_POST);
echo '</pre>';

//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) { //何これ
  exit('DBConnection Error:'.$e->getMessage());
}


//３．データ登録SQL作成
$sql = "INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES(:name, :email, :naiyou, sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_Error:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit();
}
?>
