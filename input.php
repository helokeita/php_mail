<?php
session_start();

// 変数
$subject = '';
$message = '';

// セッション受取
// 使い終わったら削除
if(isset($_SESSION['subject'])){
    $subject = $_SESSION['subject'];
    unset($_SESSION['subject']);
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}



$html = file_get_contents('input.html');

$html = str_replace('#message#',htmlspecialchars($message),$html);
$html = str_replace('#subject#',htmlspecialchars($subject),$html);

print($html);