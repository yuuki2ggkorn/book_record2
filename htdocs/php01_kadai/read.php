<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style_read.css">
<title>結果表示</title>
<!-- Firebaseの設定を含むスクリプトを追加 -->
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-firestore.js"></script>
<script>
// ここにFirebaseの設定を貼り付ける
var firebaseConfig = {
    apiKey: "AIzaSyDHzHRxpXYGNrKwwYd7DAlqAXuz81LsZPY",
    authDomain: "anke-to-792dd.firebaseapp.com",
    projectId: "anke-to-792dd",
    storageBucket: "anke-to-792dd.appspot.com",
    messagingSenderId: "219540176704",
    appId: "1:219540176704:web:0e5b918d9385a8e6fbc4a5"
  };
// Firebaseを初期化する
firebase.initializeApp(firebaseConfig);

// Firestoreのインスタンスを取得する
var db = firebase.firestore();
</script>
</head>
<body>

<div id="surveyResults"></div>

<script>
window.onload = function() {
    db.collection("surveys").get().then((querySnapshot) => {
        var html = '<table border="1"><tr><th>回答時刻</th><th>名前</th><th>Email</th><th>年齢</th><th>理由</th></tr>';
        querySnapshot.forEach((doc) => {
            var data = doc.data();
            html += '<tr><td>' + data.timestamp.toDate() + '</td><td>' + data.name + '</td><td>' + data.mail + '</td><td>' + data.age + '</td><td>' + data.reason + '</td></tr>';
        });
        html += '</table>';
        document.getElementById('surveyResults').innerHTML = html;
    });
};
</script>

<ul>
<li><a href="post.php">再度アンケートに答える</a></li>
</ul>
</body>
</html>
