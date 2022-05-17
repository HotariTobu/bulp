<?php

/*
    $_GET {
        'uid'
    }
*/


require_once __DIR__ . '/../php/modules/initialize.php';


# Get GET values

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['uid'])) {
        $uid = $_GET['uid'];
    }
}


if (empty($uid)) {
    $error_message = ERROR_MESSAGE_GET_VALIDATION_MAIL_DATA_ID;
}
else {
    # Get user id

    $table_name = TABLE_NAME_VALIDATION_MAIL;
    $query = "SELECT * FROM `{$table_name}` WHERE uid=:uid";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':uid', $uid, PDO::PARAM_STR);

    if (!$statement->execute()) {
        $error_message = ERROR_MESSAGE_GET_VALIDATION_MAIL_DATA;
    }
    else {
        $rows = $statement->fetchAll();
        if (!$rows) {
            $error_message = ERROR_MESSAGE_NO_VALIDATION_MAIL_DATA;
        }
        else {
            # Update user info
    
            $user_id = $rows[0]['user_id'];
    
            $table_name = TABLE_NAME_USERS;
            $query = "UPDATE `{$table_name}` SET e_mail_validation=:e_mail_validation WHERE id=:id";
            $statement = $pdo->prepare($query);
            $statement->bindValue(':e_mail_validation', true, PDO::PARAM_BOOL);
            $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    
            if (!$statement->execute()) {
                $error_message = ERROR_MESSAGE_VALIDATE_MAIL;
            }
            else {
                # Get e-mail
    
                $table_name = TABLE_NAME_USERS;
                $query = "SELECT e_mail from `{$table_name}` WHERE id=:id";
                $statement = $pdo->prepare($query);
                $statement->bindParam(':id', $user_id, PDO::PARAM_INT);

                if (!$statement->execute()) {
                    $error_message = ERROR_MESSAGE_GET_USER_INFO;
                }
                else {
                    $user = $statement->fetch();
                    if (!$user) {
                        $error_message = ERROR_MESSAGE_NO_USER_INFO;
                    }
                    else {
                        # Update session value

                        $e_mail = $user['e_mail'];
                
                        if (isset($_SESSION['e_mail']) && $e_mail === $_SESSION['e_mail']) {
                            $_SESSION['e_mail_validation'] = true;
                        }

                        
                        # Delete rows

                        $table_name = TABLE_NAME_VALIDATION_MAIL;
                        $query = "DELETE FROM `{$table_name}` WHERE user_id=:user_id";
                        $statement = $pdo->prepare($query);
                        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

                        $statement->execute();
                    }
                }
            }
        }
    }
}


$title = TITLE_VALIDATE_MAIL;
$description = '';
$layout_path = __DIR__ . '/layout.php';

require_once PATH_ROOT . 'php/parts/template/minimum.php';