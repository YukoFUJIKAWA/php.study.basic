<!doctype html>
<html>
<head>
	<meta charaset="utf-8">
	<title>メールフォーム</title>
	<style>
		form {
			background-color: #f0f0f0;
			padding: 10px;
			width: 600px;
		}
		input, textarea {
			font-size: 150%;
			width: 100%;
		}
		input[type=submit] {
			display: block;
			margin: 20px auto;
			width: 50%;
		}
	</style>
</head>
<body>
<div id="container">
	<h1>メールフォーム</h1>
	<form action="form.php" method="post">
		<input type="text" name="title" placeholder="メールアドレス">
		<br>
		<textarea name="body" placeholder="本文" rows="10"></textarea>
		<br>
		<input type="submit" value="送信">
	</form>
</div>
</body>
</html>
