<?php

$title = TITLE_SIGNUP;
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
    
    if (!empty($_POST['nickname'])) {
        $nickname = $_POST['nickname'];
    }
}


# Validate values

if ($submit == SUBMIT_VALUE_SIGNUP) {
    require __DIR__ . '../php/modules/validate_user_info.php';
}


# Confirm record

if ($submit == SUBMIT_VALUE_SIGNUP) {
    if (isset($e_mail)) {
        $query = 'SELECT * FROM `:table_name` WHERE e_mail=:e_mail';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':table_name', TABLE_NAME_USERS, PDO::PARAM_STR);
        $statement->bindParam(':e_mail', $e_mail, PDO::PARAM_STR);
        
        $statement->execute();
        $results = $statement->fetchAll(); 
        if ($results) {
            $record_message = ERROR_MESSAGE_USED_EMAIL . ': ' . $e_mail;
        }
    }
}


# Insert record
    
if ($submit == SUBMIT_VALUE_SIGNUP) {
    if (!isset($record_message)) {
        $hashed_password = hash('sha256', $password, true);
        $image_number = rand(0, 32767);
    
        $query = 'INSERT INTO `:table_name` (e_mail, password, image_number, nickname, note) VALUES (:e_mail, :password, :image_number, :nickname, :note)';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':table_name', TABLE_NAME_USERS, PDO::PARAM_STR);
        $statement->bindParam(':e_mail', $e_mail, PDO::PARAM_STR);
        $statement->bindParam(':password', $hashed_password, PDO::PARAM_LOB);
        $statement->bindParam(':image_number', $image_number, PDO::PARAM_INT);
        $statement->bindParam(':nickname', $nickname, PDO::PARAM_STR);
        $statement->bindParam(':note', $note, PDO::PARAM_STR);
    
        if ($statement->execute()) {
            $id = $pdo->lastInsertId();
    
            session_start();
            $_SESSION = array();
            $_SESSION['id'] = $id;
            $_SESSION['e_mail'] = $e_mail;
            $_SESSION['e_mail_validation'] = false;
            $_SESSION['image'] = null;
            $_SESSION['image_number'] = $image_number;
            $_SESSION['nickname'] = $nickname;
            $_SESSION['note'] = null;

            header('Location:' . __DIR__ . '../validate_mail/send');
            exit;
        }
        else {
            $record_message = ERROR_MESSAGE_SIGNUP;
        }
    }
}


require __DIR__ . '../php/parts/template/minimum.php';