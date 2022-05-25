<?php

/*
    $_POST {
        'submit'
        'current_password'
        'password'
        'retype_password'
    }
*/


require_once __DIR__ . '/../../php/modules/initialize.php';


$user_id = id;
if ($user_id < 0) {
    $error_message = ERROR_MESSAGE_INVALID_OPERATION;
}
else {
    # Get POST values

    $submit = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['submit'])) {
            $submit = $_POST['submit'];
        }

        if (!empty($_POST['current_password'])) {
            $current_password = $_POST['current_password'];
        }

        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
        }

        if (!empty($_POST['retype_password'])) {
            $retype_password = $_POST['retype_password'];
        }
    }


    if ($submit === SUBMIT_VALUE_CHANGE_PASSWORD) {
        # Validate values

        require_once PATH_ROOT . 'php/modules/validate/current_password.php';


        if (empty($error_message)) {
            # Confirm record
            
            $e_mail = e_mail;
            $password = $current_password;
            require PATH_ROOT . 'php/modules/confirm_user.php';

            
            if (empty($error_message)) {
                # Update record

                $password = $retype_password;
                require PATH_ROOT . 'php/modules/hash_password.php';

                $table_name = TABLE_NAME_USERS;
                $query = "UPDATE `{$table_name}` SET password=:password WHERE id=:id";
                $statement = $pdo->prepare($query);
                $statement->bindParam(':password', $hashed_password, PDO::PARAM_LOB);
                $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    
                if (!$statement->execute()) {
                    $error_message = ERROR_MESSAGE_CHANGE_PASSWORD;
                }
                else {
                    push_message(MESSAGE_CHANGED_PASSWORD);
                    header('Location:' . PATH_HTTP_ROOT . "user?id={$user_id}");
                    exit;
                }
            }
    
        }
    }
}


$title = TITLE_CHANGE_PASSWORD;
$description = '';
$layout_path = __DIR__ . '/layout.php';

require_once PATH_ROOT . 'php/parts/template/minimum.php';