<?php

require_once __DIR__ . '/../php/modules/initialize.php';


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


if ($submit === SUBMIT_VALUE_LOGIN) {
    # Validate values

    if (empty($e_mail)) {
        $e_mail_message = ERROR_MESSAGE_EMPTY_EMAIL;
        $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
    }
    
    if (empty($password)) {
        $password_message = ERROR_MESSAGE_EMPTY_PASSWORD;
        $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
    }


    if (isset($e_mail) && isset($password)) {
        # Confirm record
        
        $hashed_password = hash('sha256', $password, true);

        $table_name = TABLE_NAME_USERS;
        $query = "SELECT * FROM `{$table_name}` WHERE e_mail=:e_mail AND password=:password";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':e_mail', $e_mail, PDO::PARAM_STR);
        $statement->bindParam(':password', $hashed_password, PDO::PARAM_LOB);
        
        if (!$statement->execute()) {
            $error_message = ERROR_MESSAGE_GET_USER_INFO;
        }
        else {
            $result = $statement->fetch(); 
            if (!$result) {
                $error_message = ERROR_MESSAGE_WRONG_EMAIL_OR_PASSWORD;
            }
            else {
                # Set session values
    
                session_start();
                $_SESSION = array();
                $_SESSION['id'] = $result['id'];
                $_SESSION['e_mail'] = $result['e_mail'];
                $_SESSION['e_mail_validation'] = $result['e_mail_validation'];
                $_SESSION['image'] = $result['image'];
                $_SESSION['image_number'] = $result['image_number'];
                $_SESSION['nickname'] = $result['nickname'];
                $_SESSION['note'] = $result['note'];
                
                header("Location:{$_SERVER['HTTP_REFERER']}");
                exit;
            }
        }
    }
}


$title = TITLE_LOGIN;
$description = '';
$layout_path = __DIR__ . '/layout.php';

require_once PATH_ROOT . 'php/parts/template/minimum.php';