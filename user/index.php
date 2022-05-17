<?php

/*
    $_GET {
        'id'
    }
*/


require_once __DIR__ . '/../php/modules/initialize.php';


# Get GET values

$is_same = isset($id);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['id'])) {
        $is_same = $is_same && $id == $_GET['id'];
        $id = $_GET['id'];
    }
}


if (empty($id)) {
    $error_message = ERROR_MESSAGE_GET_ID;
}
else {
    # Get user info

    $table_name = TABLE_NAME_USERS;
    $query = "SELECT * FROM `{$table_name}` WHERE id=:id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    
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