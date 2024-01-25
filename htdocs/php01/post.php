<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<title>POST練習</title>
</head>

<body>
	<header>アンケート</header>
	<form action="write.php" method="post">
		お名前: <input type="text" name="name">
		EMAIL: <input type="text" name="mail">

		<p>
			年齢を教えて下さい
			<select name="age">
				<option value="20以下">20代以下</option>
				<option value="20-29">20〜29</option>
				<option value="30-39">30〜39</option>
				<option value="40以上">40代以上</option>
			</select>
		</p>
		<p>
			今回、本企画に取り組んだ理由を教えて下さい
			<textarea name="reason" rows="4" cols="30"></textarea>
		</p>

		<input type="submit" value="送信">
	</form>
	<ul>
		<li><a href="index.php">index.php</a></li>
	</ul>

</body>

</html>