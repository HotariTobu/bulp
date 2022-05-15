<?php

require_once __DIR__ . '/../php/modules/initialize.php';


$has_action_bar = true;

if (empty($post)) {
    # Get GET values

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
        }
    }

    if (empty($id)) {
        exit(ERROR_MESSAGE_GET_ID);
    }
    else if ($id < 0) {
        exit;
    }
    else {
        $table_name = TABLE_NAME_POSTS;
        $query = "SELECT * FROM `{$table_name}` WHERE id=:id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
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
    
    if (!$statement->execute()) {
        exit(ERROR_MESSAGE_GET_USER_INFO);
    }
    else {
        $user = $statement->fetch();
    }
}

require __DIR__ . '/layout.php';