<?php

/*
    $mail_title:    string
    $mail_lines:    array of string
*/


require_once __DIR__ . '/../php/modules/initialize.php';


if (empty($_SESSION['id']) || empty($_SESSION['e_mail'])) {
    exit(ERROR_MESSAGE_GET_USER_INFO);
}
else {
    # Delete past rows
    
    $table_name = TABLE_NAME_VALIDATION_MAIL;
    $query = "DELETE FROM `{$table_name}` WHERE user_id=:user_id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':user_id', $_SESSION['id'], PDO::PARAM_INT);
    
    $statement->execute();
    
    
    # Insert new row
    
    $uid = uniqid();
    
    $table_name = TABLE_NAME_VALIDATION_MAIL;
    $query = "INSERT INTO `{$table_name}` (uid, user_id) VALUES (:uid, :user_id)";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':uid', $uid, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $_SESSION['id'], PDO::PARAM_INT);
    
    if (!$statement->execute()) {
        exit(ERROR_MESSAGE_REGISTER_VALIDATION_MAIL_DATA);
    }
    else {
        # Send mail
        
        if (empty($mail_title)) {
            $mail_title = MAIL_TITLE_SIGNUP_AND_VALIDATION;
        }
        
        if (empty($mail_lines)) {
            $mail_lines = MAIL_CONTENT_SIGNUP_AND_VALIDATION;
        }
        
        $mail_validation_uri = PATH_HTTP_ROOT . "validate_mail?uid={$uid}";
        
        $mail_lines[] = $mail_validation_uri;
        $mail_message = implode('<br>', $mail_lines);
            
        require_once PATH_ROOT . 'ignore_phpmailer/mailer.php';
        
        $result_message = send_mail(array($_SESSION['e_mail']), $mail_title, $mail_message);
        if ($result_message === true) {
            push_message(MESSAGE_SENT_VALIDATION_MAIL);
        }
        else {
            echo ERROR_MESSAGE_SEND_VALIDATION_MAIL . $result_message;
        }
    }
}