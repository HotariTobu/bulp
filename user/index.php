<?php

/*
    $_GET {
        'id'
    }
*/


require_once __DIR__ . '/../php/modules/initialize.php';


# Get GET values

$user_id = id;
$is_same = id >= 0;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['id'])) {
        $user_id = $_GET['id'];
        $is_same &= id == $user_id;
    }
}


if ($user_id < 0) {
    $error_message = ERROR_MESSAGE_INVALID_OPERATION;
}
else {
    # Get user info

    $table_name = TABLE_NAME_USERS;
    $query = "SELECT * FROM `{$table_name}` WHERE id=:id";
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
            # Get posts
            
            $table_name = TABLE_NAME_POSTS;
            $query = "SELECT * FROM `{$table_name}` WHERE user_id=:user_id";
            $statement = $pdo->prepare($query);
            $statement->bindParam(':user_id', $user['id'], PDO::PARAM_INT);
            
            if (!$statement->execute()) {
                $error_message = ERROR_MESSAGE_GET_POSTS;
            }
            else {
                $posts = $statement->fetchAll();
            }
        }
    }
}


$title = empty($user['nickname']) ? TITLE_USER : $user['nickname'];
$description = '';
$layout_path = __DIR__ . '/layout.php';

require_once PATH_ROOT . 'php/parts/template/standard/index.php';