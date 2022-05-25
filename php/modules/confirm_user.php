<?php

/*
    $e_mail:    string
    $password:  string
    $user:  user
    $error_message: string
*/


# Confirm record
    
require PATH_ROOT . 'php/modules/hash_password.php';

$table_name = TABLE_NAME_USERS;
$query = "SELECT * FROM `{$table_name}` WHERE e_mail=:e_mail AND password=:password";
$statement = $pdo->prepare($query);
$statement->bindParam(':e_mail', $e_mail, PDO::PARAM_STR);
$statement->bindParam(':password', $hashed_password, PDO::PARAM_LOB);
    
if (!$statement->execute()) {
    $error_message = ERROR_MESSAGE_GET_USER_INFO;
}
else {
    $user = $statement->fetch(); 
    if (!$user) {
        $error_message = ERROR_MESSAGE_WRONG_EMAIL_OR_PASSWORD;
    }
}