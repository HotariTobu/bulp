<?php

$title = TITLE_VALIDATE_MAIL;
$description = '';
$layout_path = __DIR__ . 'layout.php';


# Get GET values

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    }
    if (!empty($_GET['e_mail'])) {
        $e_mail = $_GET['e_mail'];
    }
}


# Validate e_mail

if (isset($id) && isset($e_mail)) {
    $query = 'UPDATE `:table_name` SET e_mail_validation=:e_mail_validation WHERE id=:id AND e_mail=:e_mail';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':table_name', TABLE_NAME_USERS, PDO::PARAM_STR);
    $statement->bindValue(':e_mail_validation', true, PDO::PARAM_BOOL);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':e_mail', $e_mail, PDO::PARAM_STR);
    
    if ($statement->execute()) {
        if (!empty($_SESSION['e_mail']) && $e_mail == $_SESSION['e_mail']) {
            $_SESSION['e_mail_validation'] = true;
        }
    }
    else {
        $record_message = ERROR_MESSAGE_VALIDATE_MAIL;
    }
}
else {
    $record_message = ERROR_MESSAGE_GET_USER_INFO;
}


require __DIR__ . 'php/parts/template/minimum.php';