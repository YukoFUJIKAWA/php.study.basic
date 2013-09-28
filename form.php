<?php

// POSTされた内容を表示する
echo '<b>$_POST</b>:';
var_dump($_POST);
echo '<br>';

if (isset($_POST{'title'})) {
	echo '<b>$_POST["title"]</b>:';
	var_dump($_POST['title']);
	echo '<br>';
}

if (isset($_POST{'body'})) {
	echo '<b>$_POST["body"]</b>:';
	var_dump($_POST['body']);
	echo '<br>';
}
echo '<hr>';

// メール送信
function sendMailFromForm($title, $body) {
	echo '件名：' . $title . '<br>';
	echo '本文：' . nl2br($body) . '<br>';
	echo '<hr>';
	echo '送信しました';
}
// 送信完了
sendMailFromForm($_POST['title'], $_POST['body']);

