<?php

require_once __DIR__ . '/../php/modules/initialize.php';


# Get POST values

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['post_id'])) {
        $post_id = $_POST['post_id'];
    }
    
    if (!empty($_POST['content'])) {
        $content = $_POST['content'];
    }
}


if (empty($content)) {
    exit(ERROR_MESSAGE_EMPTY_POST_CONTENT);
}
else {
    # Insert post
    
    if (empty($id)) {
        $id = -1;
    }
    
    if (empty($post_id)) {
        $post_id = -1;
    }
    
    $table_name = TABLE_NAME_POSTS;
    $query = "INSERT INTO `{$table_name}` (user_id, reply_id, content) VALUES (:user_id, :reply_id, :content)";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->bindParam(':reply_id', $post_id, PDO::PARAM_INT);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    
    if (!$statement->execute()) {
        exit(ERROR_MESSAGE_POST);
    }
}