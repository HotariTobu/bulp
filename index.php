<?php

$title = TITLE_TOP;
$description = '';
$layout_path = __DIR__ . 'layout.php';


# Get posts

$query = 'SELECT * FROM `:table_name` WHERE reply_id < :reply_id';
$statement = $pdo->prepare($query);
$statement->bindValue(':table_name', TABLE_NAME_POSTS, PDO::PARAM_STR);
$statement->bindValue(':reply_id', 0, PDO::PARAM_INT);
$statement->execute();
$posts = $statement->fetchAll();
if ($posts === false) {
    $record_message = ERROR_MESSAGE_GET_POSTS;
}


require __DIR__ . 'php/parts/template/standard/index.php';