<?php

$title = TITLE_USER;
$description = '';
$layout_path = __DIR__ . 'layout.php';


# Get GET values

$is_same = isset($id);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['id'])) {
        $is_same = $is_same && $id == $_GET['id'];
        $id = $_GET['id'];
    }
}


# Get user info

if (isset($id)) {
    $query = 'SELECT * FROM `:table_name` WHERE id=:id';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':table_name', TABLE_NAME_USERS, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    
    $statement->execute();
    $user = $statement->fetch(); 
    if ($user === false) {
        exit(ERROR_MESSAGE_GET_USER_INFO);
    }
}
else {
    exit(ERROR_MESSAGE_GET_ID);
}


# Get posts

$query = 'SELECT * FROM `:table_name` WHERE user_id=:user_id';
$statement = $pdo->prepare($query);
$statement->bindValue(':table_name', TABLE_NAME_POSTS, PDO::PARAM_STR);
$statement->bindParam(':user_id', $user['id'], PDO::PARAM_INT);
$statement->execute();
$posts = $statement->fetchAll();
if ($posts === false) {
    $record_message = ERROR_MESSAGE_GET_POSTS;
}


require __DIR__ . '../php/parts/template/standard/index.php';