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
		div.message {
			background-color: #ff0;
			font-weight: bold;
			margin: 40px 0;
			padding: 40px;
		}
		div.error-message {
			background-color: red;
			color: white;
		}
	</style>
</head>
<body>
<div id="container">
<?php
	session_start();
	$session = array_intersect_key(
		$_SESSION,
		array(
			'title' => '',
			'body' => '',
			'isError' => false,
		)
	);
	extract($session);
	session_destroy();

	if ($isError) {
?>
	<div class="message error-message">
		内容を確認してください。<br>
	</div>
<?php
	} elseif (!empty($title)) {
?>
	<div class="message">
		メールを送信しました。<br>
		（件名「<?php echo htmlspecialchars($title); ?>」）
	</div>
<?php
		$title = '';
		$body = '';
	}
?>
	<h1>メールフォーム</h1>
	<form action="form.php" method="post">
		<input type="text" name="title" placeholder="メールアドレス" value="<?php echo htmlspecialchars($title); ?>">
		<br>
		<textarea name="body" placeholder="本文" rows="10"><?php echo htmlspecialchars($body); ?></textarea>
		<br>
		<input type="submit" value="送信">
	</form>
</div>
</body>
</html>
