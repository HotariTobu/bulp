<?php

/*
    $_GET {
        'id'
    }
*/


require_once __DIR__ . '/../php/modules/initialize.php';


$has_action_bar = true;

if (empty($post)) {
    # Get GET values

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!empty($_GET['id'])) {
            $post_id = $_GET['id'];
        }
    }

    if (empty($post_id)) {
        exit(ERROR_MESSAGE_GET_ID);
    }
    else if ($post_id < 0) {
        exit;
    }
    else {
        $table_name = TABLE_NAME_POSTS;
        $query = "SELECT * FROM `{$table_name}` WHERE id=:id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $post_id, PDO::PARAM_INT);
        
        if (!$statement->execute()) {
            exit(ERROR_MESSAGE_GET_POSTS);
        }
        else {
            $post = $statement->fetch();
            if (!$post) {
                exit(ERROR_MESSAGE_NO_POSTS);
            }
        }
    }

    $has_action_bar = false;
}

if (isset($post)) {
    # Get user info
        
    $table_name = TABLE_NAME_USERS;
    $query = "SELECT * FROM `{$table_name}` WHERE id=:id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $post['user_id'], PDO::PARAM_INT);
    
    $statement->execute();
    $user = $statement->fetch();
}

require __DIR__ . '/layout.php';