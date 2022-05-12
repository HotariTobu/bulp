<?php

$title = TITLE_LOGIN;
$description = '';
$layout_path = __DIR__ . 'layout.php';


# Get POST values

$submit = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['submit'])) {
        $submit = $_POST['submit'];
    }
    
    if (!empty($_POST['e_mail'])) {
        $e_mail = $_POST['e_mail'];
    }
    
    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    }
}


# Validate values

if ($submit == SUBMIT_VALUE_LOGIN) {
    if (!isset($e_mail)) {
        $e_mail_message = ERROR_MESSAGE_EMPTY_EMAIL;
        $record_message = ERROR_MESSAGE_CONFIRM_INPUT;
    }
    
    if (!isset($password)) {
        $password_message = ERROR_MESSAGE_EMPTY_PASSWORD;
        $record_message = ERROR_MESSAGE_CONFIRM_INPUT;
    }
}


# Confirm record

if ($submit == SUBMIT_VALUE_LOGIN) {
    if (isset($e_mail) && isset($password)) {
        $hashed_password = hash('sha256', $password, true);
        $query = 'SELECT * FROM `:table_name` WHERE e_mail=:e_mail AND password=:password';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':table_name', TABLE_NAME_USERS, PDO::PARAM_STR);
        $statement->bindParam(':e_mail', $e_mail, PDO::PARAM_STR);
        $statement->bindParam(':password', $hashed_password, PDO::PARAM_LOB);
        
        $statement->execute();
        $result = $statement->fetch(); 
        if ($result) {
            session_start();
            $_SESSION = array();
            $_SESSION['id'] = $result['id'];
            $_SESSION['e_mail'] = $result['e_mail'];
            $_SESSION['e_mail_validation'] = $result['e_mail_validation'];
            $_SESSION['image'] = $result['image'];
            $_SESSION['image_number'] = $result['image_number'];
            $_SESSION['nickname'] = $result['nickname'];
            $_SESSION['note'] = $result['note'];
            
            header('Location:' . __DIR__ . '../');
            exit;
        }
        else {
            $record_message = ERROR_MESSAGE_WRONG_EMAIL_OR_PASSWORD;
        }
    }
}


require __DIR__ . '../php/parts/template/minimum.php';