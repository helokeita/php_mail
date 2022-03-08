<?php
session_start();

// 宛先 
//公開するため、削除しておく
$to = '';

// 受け取る値用の変数
$subject = $_GET['subject'];
$mes = $_GET['message'];

// 文字数調整
$mes = wordwrap($mes, 40, "\r\n");

// メールの形にしておく
$message = "メールを送信いただきありがとうございます！\r\n送信いただいたメールは以下となります。\r\n ~~~~~~~~ \r\n" . $mes. " \r\n~~~~~~~~";

// 結果を表示
$result = '';

// 成功したかしてないかの判定
if(mail($to,$subject,$message)){
    $result = '成功';
}else{
    $result = '失敗';
}


$html = file_get_contents("mail.html");

$html = str_replace('#result#',htmlspecialchars($result),$html);

print($html);

