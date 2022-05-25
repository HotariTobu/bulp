<?php

/*
    $post_id:   int
*/


# Delete the post

$table_name = TABLE_NAME_POSTS;
$query = "DELETE FROM `{$table_name}` WHERE id=:id";
$statement = $pdo->prepare($query);
$statement->bindParam(':id', $post_id, PDO::PARAM_INT);

if (!$statement->execute()) {
    exit;
}


# Delete children

$table_name = TABLE_NAME_POSTS;
$query = "SELECT id FROM `{$table_name}` WHERE reply_id=:reply_id";
$statement = $pdo->prepare($query);
$statement->bindParam(':reply_id', $post_id, PDO::PARAM_INT);

$statement->execute();
$posts = $statement->fetchAll();
if ($posts) {
    foreach ($posts as $post) {
        $post_id = $post['id'];
        require __FILE__;
    }
}