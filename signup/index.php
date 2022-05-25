<?php

/*
    $_POST {
        'submit'
        'e_mail'
        'password'
        'retype_password'
        'nickname'
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

    if (!empty($_POST['retype_password'])) {
        $retype_password = $_POST['retype_password'];
    }
    
    if (!empty($_POST['nickname'])) {
        $nickname = $_POST['nickname'];
    }
}


if ($submit === SUBMIT_VALUE_SIGNUP) {
    # Validate values

    require_once PATH_ROOT . 'php/modules/validate/e_mail.php';
    require_once PATH_ROOT . 'php/modules/validate/retype_password.php';
    require_once PATH_ROOT . 'php/modules/validate/nickname.php';
    
    
    if (isset($e_mail)) {
        # Confirm record

        $table_name = TABLE_NAME_USERS;
        $query = "SELECT * FROM `{$table_name}` WHERE e_mail=:e_mail";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':e_mail', $e_mail, PDO::PARAM_STR);
        
        if (!$statement->execute()) {
            $error_message = ERROR_MESSAGE_GET_USER_INFO;
        }
        else {
            $users = $statement->fetchAll(); 
            if ($users) {
                $error_message = ERROR_MESSAGE_USED_EMAIL . ': ' . $e_mail;
            }

            if (empty($error_message)) {
                # Insert record
    
                require PATH_ROOT . 'php/modules/hash_password.php';

                $image_number = rand(0, 32767);
            
                $table_name = TABLE_NAME_USERS;
                $query = "INSERT INTO `{$table_name}` (e_mail, password, image_number, nickname, note) VALUES (:e_mail, :password, :image_number, :nickname, :note)";
                $statement = $pdo->prepare($query);
                $statement->bindParam(':e_mail', $e_mail, PDO::PARAM_STR);
                $statement->bindParam(':password', $hashed_password, PDO::PARAM_LOB);
                $statement->bindParam(':image_number', $image_number, PDO::PARAM_INT);
                $statement->bindParam(':nickname', $nickname, PDO::PARAM_STR);
                $statement->bindParam(':note', $note, PDO::PARAM_STR);
            
                if (!$statement->execute()) {
                    $error_message = ERROR_MESSAGE_SIGNUP;
                }
                else {
                    # Set session values
                    
                    $_SESSION = array();
                    $_SESSION['id'] = $pdo->lastInsertId();
                    $_SESSION['e_mail'] = $e_mail;
                    $_SESSION['e_mail_validation'] = false;
                    $_SESSION['image'] = null;
                    $_SESSION['image_number'] = $image_number;
                    $_SESSION['nickname'] = $nickname;
                    $_SESSION['note'] = null;
    
                    require PATH_ROOT . 'validate_mail/send.php';
    
                    header('Location:' . PATH_HTTP_ROOT);
                    exit;
                }
            }
        }
    }
}


$title = TITLE_SIGNUP;
$description = '';
$layout_path = __DIR__ . '/layout.php';

require_once PATH_ROOT . 'php/parts/template/minimum.php';