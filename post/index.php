<?php

$has_action_bar = true;

if (empty($post)) {
    # Get GET values

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
        }
    }

    if (isset($id)) {
        $query = 'SELECT * FROM `:table_name` WHERE id=:id';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':table_name', TABLE_NAME_POSTS, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        $statement->execute();
        $post = $statement->fetch();
        if ($post === false) {
            exit(ERROR_MESSAGE_GET_POSTS);
        }
    }
    else {
        exit(ERROR_MESSAGE_GET_ID);
    }

    $has_action_bar = false;
}

if (isset($post)) {
    # Get user info
        
    $query = 'SELECT * FROM `:table_name` WHERE id=:id';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':table_name', TABLE_NAME_USERS, PDO::PARAM_STR);
    $statement->bindParam(':id', $post['user_id'], PDO::PARAM_INT);
    
    $statement->execute();
    $user = $statement->fetch();
    if ($user === false) {
        exit(ERROR_MESSAGE_GET_USER_INFO);
    }
}

require __DIR__ . 'layout.php';