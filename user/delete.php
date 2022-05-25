<?php

require_once __DIR__ . '/../php/modules/initialize.php';


if (id < 0) {
    exit(ERROR_MESSAGE_INVALID_OPERATION);
}
else {
    # Delete user

    $table_name = TABLE_NAME_USERS;
    $query = "DELETE FROM `{$table_name}` WHERE id=:id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', id, PDO::PARAM_INT);
    
    if (!$statement->execute()) {
        exit(ERROR_MESSAGE_DELETE_USER);
    }
    else {
        # Delete posts
        
        $table_name = TABLE_NAME_POSTS;
        $query = "SELECT id FROM `{$table_name}` WHERE user_id=:user_id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':user_id', id, PDO::PARAM_INT);
        
        $statement->execute();
        $posts = $statement->fetchAll();
        if ($posts) {
            foreach ($posts as $post) {
                $post_id = $post['id'];
                require PATH_ROOT . 'php/modules/delete_post.php';
            }
        }

        push_message(MESSAGE_RESIGNED);
        header('Location:' . PATH_HTTP_ROOT . 'logout?location=' . PATH_HTTP_ROOT);
        exit;
    }
}