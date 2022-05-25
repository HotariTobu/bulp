<?php

/*
    $_POST {
        'submit'
        'e_mail'
        'password'
    }
*/


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

    require PATH_ROOT . 'php/modules/validate/e_mail.php';
    require PATH_ROOT . 'php/modules/validate/password.php';
    
    
    if (empty($error_message)) {
        # Confirm record
        
        require PATH_ROOT . 'php/modules/confirm_user.php';


        if (empty($error_message)) {
            # Set session values

            $_SESSION = array();
            $_SESSION['id'] = $user['id'];
            $_SESSION['e_mail'] = $user['e_mail'];
            $_SESSION['e_mail_validation'] = $user['e_mail_validation'];
            $_SESSION['image'] = $user['image'];
            $_SESSION['image_number'] = $user['image_number'];
            $_SESSION['nickname'] = $user['nickname'];
            $_SESSION['note'] = $user['note'];
            
            header('Location:' . PATH_HTTP_ROOT);
            exit;
        }
    }
}


$title = TITLE_LOGIN;
$description = '';
$layout_path = __DIR__ . '/layout.php';

require_once PATH_ROOT . 'php/parts/template/minimum.php';