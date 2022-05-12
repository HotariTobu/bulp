<?php

session_start();

require 'mail_validation_function.php';

$mail_result = send_validation_mail();
if ($mail_result === true) {
    header("Location:{$_SERVER['HTTP_REFERER']}");
    exit;
}
else {
    echo 'メールアドレス検証のためのメールの送信に失敗しました。' . $mail_result . '<br>';
    echo "<a href=\"{$_SERVER['HTTP_REFERER']}\">前に戻る</a>";
}