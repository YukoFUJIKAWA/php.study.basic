<?php

// セッション開始
session_start();

// バリデーション
class Validation {
	public $title;
	public $body;

	public function __construct() {
		extract($_POST);
		if (!empty($title)) {
			$this->title = $title;
		}
		if (!empty($body)) {
			$this->body = $body;
		}
	}

	public function all() {
		return $this->title() && $this->body();
	}

	public function title() {
		return !empty($this->title);
	}

	public function body() {
		return !empty($this->body);
	}
}

// バリデーションエラー時は元に戻る
$validation = new Validation();
if (!$validation->all()) {
	// セッションに書き込んでリダイレクト
	$_SESSION['title'] = $validation->title;
	$_SESSION['body'] = $validation->body;
	$_SESSION['isError'] = true;
	header('Location: index.php');
	exit;
}

// メール送信
function sendMailFromForm($title, $body) {
	echo '件名：' . $title . '<br>';
	echo '本文：' . nl2br($body) . '<br>';
	echo '<hr>';
	echo '送信しました';
	// セッションに書き込んでリダイレクト
	$_SESSION['title'] = $title;
	$_SESSION['body'] = $body;
	header('Location: index.php');
}
// 送信完了
sendMailFromForm($_POST['title'], $_POST['body']);

