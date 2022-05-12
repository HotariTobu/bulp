<?php

require __DIR__ . '../php/modules/initialize.php';


# Get POST values

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['post_id'])) {
        $post_id = $_POST['post_id'];
    }
    
    if (!empty($_POST['content'])) {
        $content = $_POST['content'];
    }
}


# Insert post

if (empty($content)) {
    exit(ERROR_MESSAGE_EMPTY_POST_CONTENT);
}

if (!isset($id)) {
    $id = -1;
}

if (!isset($post_id)) {
    $post_id = -1;
}

$query = 'INSERT INTO `:table_name` (user_id, reply_id, content) VALUES (:user_id, :reply_id, :content)';
$statement = $pdo->prepare($query);
$statement->bindValue(':table_name', TABLE_NAME_POSTS, PDO::PARAM_STR);
$statement->bindParam(':user_id', $id, PDO::PARAM_INT);
$statement->bindParam(':reply_id', $post_id, PDO::PARAM_INT);
$statement->bindParam(':content', $content, PDO::PARAM_STR);

if (!$statement->execute()) {
    exit(ERROR_MESSAGE_POST);
}