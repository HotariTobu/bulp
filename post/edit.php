<?php

/*
    $_POST {
        'id'
        'content'
    }
*/


require_once __DIR__ . '/../php/modules/initialize.php';


if (id < 0) {
    exit(ERROR_MESSAGE_INVALID_OPERATION);
}
else {
    # Get POST values

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['post_id'])) {
            $post_id = $_POST['post_id'];
        }

        if (!empty($_POST['content'])) {
            $content = $_POST['content'];
        }
    }
    
    if (empty($post_id)) {
        exit(ERROR_MESSAGE_GET_ID);
    }
    else if ($post_id < 0) {
        exit;
    }
    else {
        require_once PATH_ROOT . 'php/modules/validate/post_content.php';

        if (!empty($error_message)) {
            exit($error_message);
        }
        else {
            # Get post info
            
            $table_name = TABLE_NAME_POSTS;
            $query = "SELECT user_id FROM `{$table_name}` WHERE id=:id";
            $statement = $pdo->prepare($query);
            $statement->bindParam(':id', $post_id, PDO::PARAM_INT);
            
            if (!$statement->execute()) {
                exit(ERROR_MESSAGE_GET_POSTS);
            }
            else {
                $post = $statement->fetch();
                if (!$post) {
                    exit(ERROR_MESSAGE_NO_POSTS);
                }
                else if (id != $post['user_id']) {
                    exit(ERROR_MESSAGE_NOT_AUTHOR);
                }
                else {
                    # Update post info
    
                    $table_name = TABLE_NAME_POSTS;
                    $query = "UPDATE `{$table_name}` SET content=:content WHERE id=:id";
                    $statement = $pdo->prepare($query);
                    $statement->bindParam(':content', $content, PDO::PARAM_STR);
                    $statement->bindParam(':id', $post_id, PDO::PARAM_INT);
    
                    if (!$statement->execute()) {
                        exit(ERROR_MESSAGE_EDIT_POST);
                    }
                    else {
                        push_message(MESSAGE_EDITED_POST);
                    }
                }
            }
        }
    }
}