<?php

require_once __DIR__ . '/php/modules/initialize.php';


# Get posts

$table_name = TABLE_NAME_POSTS;
$query = "SELECT * FROM `{$table_name}` WHERE reply_id < :reply_id";
$statement = $pdo->prepare($query);
$statement->bindValue(':reply_id', 0, PDO::PARAM_INT);

if (!$statement->execute()) {
    $error_message = ERROR_MESSAGE_GET_POSTS;
}
else {
    $posts = $statement->fetchAll();
}


$title = TITLE_TOP;
$description = '';
$layout_path = __DIR__ . '/layout.php';

require_once PATH_ROOT . 'php/parts/template/standard/index.php';