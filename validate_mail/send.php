<?php

require __DIR__ . '../php/modules/initialize.php';


if (empty($id) || empty($e_mail)) {
    echo ERROR_MESSAGE_GET_USER_INFO;
}


# Delete past rows

$query = 'DELETE FROM `:table_name` WHERE user_id=:user_id';
$statement = $pdo->prepare($query);
$statement->bindValue(':table_name', TABLE_NAME_VALIDATION_MAIL, PDO::PARAM_STR);
$statement->bindParam(':user_id', $id, PDO::PARAM_INT);

$statement->execute();


# Insert new row

$uid = uniqid();

$query = 'INSERT INTO `:table_name` (uid, user_id) VALUES (:uid, :user_id)';
$statement = $pdo->prepare($query);
$statement->bindValue(':table_name', TABLE_NAME_VALIDATION_MAIL, PDO::PARAM_STR);
$statement->bindParam(':uid', $uid, PDO::PARAM_STR);
$statement->bindParam(':user_id', $id, PDO::PARAM_INT);

if (!$statement->execute()) {
    exit(ERROR_MESSAGE_REGISTER_VALIDATION_MAIL);
}


# Send mail

$mail_validation_uri = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}{$_SERVER['SCRIPT_NAME']}";
$mail_validation_uri_last_slash_pos = strrpos($mail_validation_uri, '/');
$mail_validation_uri = substr($mail_validation_uri, 0, $mail_validation_uri_last_slash_pos);
$mail_validation_uri = "{$mail_validation_uri}/validate_mail?uid={$uid}";

$mail_message_lines = array(
    '掲示板『パワー』にサインアップいただきありがとうございます。',
    '送信していただいたメールアドレスを検証するために下のリンク先にアクセスしていただくようお願いいたします。',
    $mail_validation_uri,
);
$mail_message = implode('<br>', $mail_message_lines);
    
require '../ignore_phpmailer/mailer.php';

echo send_mail(array($e_mail), 'サインアップ完了とメール検証について', $mail_message);