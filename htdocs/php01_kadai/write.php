<?php
$name = $_POST["name"];
$mail = $_POST["mail"];
$age = $_POST["age"];
$reason = $_POST["reason"];

//文字作成
$str = date("Y-m-d H:i:s").",".$name.",".$mail.",".$age.",".$reason;
//File書き込み
$file = fopen("data/data.txt","a");  // ファイル読み込み
fwrite($file, $str."\n");
fclose($file);
?>

<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #CEC5F0;
        margin: 0;
        padding: 0;
        text-align: center;
    }
    .container {
        background-color: #ffffff;
        border: 1px solid #ccc;
        padding: 20px;
        margin: 40px auto;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 500px;
    }

    a {
        text-decoration: none;
        margin: 20px;
    }
    a:hover {
        text-decoration: underline;
    }
    ul {
        list-style: none;
        padding: 0;
    }
    li {
        margin: 10px 0;
    }
</style>
</head>
<body>

<div class="container">
    <h1>書き込み完了しました。</h1>
    <a href="read.php">回答結果を見る</a>
    <ul>
        <li><a href="post.php">再度アンケートに答える</a></li>
    </ul>
</div>
<!-- Firebaseの設定 -->
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-firestore.js"></script>

<script>
var firebaseConfig = {
    apiKey: "AIzaSyDHzHRxpXYGNrKwwYd7DAlqAXuz81LsZPY",
    authDomain: "anke-to-792dd.firebaseapp.com",
    projectId: "anke-to-792dd",
    storageBucket: "anke-to-792dd.appspot.com",
    messagingSenderId: "219540176704",
    appId: "1:219540176704:web:0e5b918d9385a8e6fbc4a5"
  };
firebase.initializeApp(firebaseConfig);

// Firestoreのインスタンスを取得する
var db = firebase.firestore();

function submitForm() {
    var name = document.getElementById('name').value;
    var mail = document.getElementById('mail').value;
    var age = document.getElementById('age').value;
    var reason = document.getElementById('reason').value;

    // Firestoreにデータを保存する
    db.collection("surveys").add({
        name: name,
        mail: mail,
        age: age,
        reason: reason,
        timestamp: firebase.firestore.FieldValue.serverTimestamp()
    })
    .then(function(docRef) {
        console.log("Document written with ID: ", docRef.id);
        // 成功した場合の処理（例: メッセージ表示、ページ遷移など）
    })
    .catch(function(error) {
        console.error("Error adding document: ", error);
    });
}
</script>

</body>
</html>
