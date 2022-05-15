<?php

require_once __DIR__ . '/../../php/modules/initialize.php';


# Get get values

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
    }
}


if (empty($post_id)) {
    $error_message = ERROR_MESSAGE_GET_POST_ID;
}
else {
    # Get parent post

    $table_name = TABLE_NAME_POSTS;
    $query = "SELECT * FROM `{$table_name}` WHERE id=:id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $post_id, PDO::PARAM_INT);
    
    if (!$statement->execute()) {
        $error_message = ERROR_MESSAGE_GET_POSTS;
    }
    else {
        $post = $statement->fetch();
        if (!$post) {
            $error_message = ERROR_MESSAGE_GET_POSTS;
        }
        else {
            # Get child posts
    
            $table_name = TABLE_NAME_POSTS;
            $query = "SELECT * FROM `{$table_name}` WHERE reply_id=:reply_id";
            $statement = $pdo->prepare($query);
            $statement->bindParam(':reply_id', $post_id, PDO::PARAM_INT);
    
            if ($statement->execute()) {
                $posts = $statement->fetchAll();
            }
        }
    }
}


$title = empty($post['content']) ? TITLE_POST : $post['content'];
$description = '';
$layout_path = __DIR__ . '/layout.php';

require_once PATH_ROOT . 'php/parts/template/standard/index.php';