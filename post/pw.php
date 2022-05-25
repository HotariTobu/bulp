<?php

/*
    $_POST {
        'post_id'
        'count'
    }
*/


require_once __DIR__ . '/../php/modules/initialize.php';


# Get POST values

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['post_id'])) {
        $post_id = $_POST['post_id'];
    }
    if (!empty($_POST['count'])) {
        $count = $_POST['count'];
    }
}


if (empty($post_id)) {
    exit(ERROR_MESSAGE_GET_POST_ID);
}
else if ($post_id < 0) {
    exit;
}
else if (empty($count)) {
    exit(ERROR_MESSAGE_GET_COUNT);
}
else if ($count <= 0) {
    exit;
}
else {
    # Update post info

    $table_name = TABLE_NAME_POSTS;
    $query = "UPDATE `{$table_name}` SET pw_count=pw_count+:pw_count WHERE id=:id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':pw_count', $count, PDO::PARAM_STR);
    $statement->bindParam(':id', $post_id, PDO::PARAM_INT);

    if (!$statement->execute()) {
        exit(ERROR_MESSAGE_POWER_WORD);
    }
}