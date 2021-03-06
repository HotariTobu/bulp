<?php

/*
    $_POST {
        'submit'
        'nickname'
        'note'
    }
*/


require_once __DIR__ . '/../../php/modules/initialize.php';


$user_id = id;
$nickname = nickname;
$note = note;

if ($user_id < 0) {
    $error_message = ERROR_MESSAGE_INVALID_OPERATION;
}
else {
    # Get POST values
    
    $submit = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['submit'])) {
            $submit = $_POST['submit'];
        }
        
        if (!empty($_POST['nickname'])) {
            $nickname = $_POST['nickname'];
        }
        
        if (!empty($_POST['note'])) {
            $note = $_POST['note'];
        }
    }
    
    
    if ($submit === SUBMIT_VALUE_EDIT) {
        # Validate values

        require_once PATH_ROOT . 'php/modules/validate/nickname.php';
    
    
        if (empty($error_message)) {
            # Insert record
            
            if (!empty($_FILES['image']['tmp_name'])) {
                $image_tmp_name = $_FILES['image']['tmp_name'];
    
                $fp = fopen($image_tmp_name, "rb");
                $image_data = fread($fp, filesize($image_tmp_name));
                fclose($fp);
                
                $image_info = getimagesizefromstring($image_data);
                if ($image_info !== false) {
                    list($image_width, $image_hight) = $image_info;
                    if ($image_width > 64 || $image_height > 64) {
                        $base_image = imagecreatefromstring($image_data);
                        $resized_image = imagecreatetruecolor(64, 64);
                        
                        $transparent_color = imagecolorallocatealpha($resized_image, 0, 0, 0, 127);
                        imagefill($resized_image, 0, 0, $transparent_color);
        
                        if (imagecopyresampled($resized_image, $base_image, 0, 0, 0, 0, 64, 64, $image_width, $image_hight)) {
                            ob_start();
                            imagewebp($resized_image);
                            $image = ob_get_clean();
                        }
                        else {
                            $error_message = ERROR_MESSAGE_RESIZE_IMAGE;
                        }
                    }
                    else {
                        $image = $image_data;
                    }
                }
                else {
                    $error_message = ERROR_MESSAGE_GET_IMAGE_INFO;
                }
            }
            if ($image != null) {
                $image_number = -1;
            }
            

            # Update record

            $table_name = TABLE_NAME_USERS;
            $query = "UPDATE `{$table_name}` SET image=:image, image_number=:image_number, nickname=:nickname, note=:note WHERE id=:id";
            $statement = $pdo->prepare($query);
            $statement->bindParam(':image', $image, PDO::PARAM_LOB);
            $statement->bindParam(':image_number', $image_number, PDO::PARAM_INT);
            $statement->bindParam(':nickname', $nickname, PDO::PARAM_STR);
            $statement->bindParam(':note', $note, PDO::PARAM_STR);
            $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
            
            if (!$statement->execute()) {
                $error_message = ERROR_MESSAGE_EDIT_USER;
            }
            else {
                $_SESSION['image'] = $image;
                $_SESSION['image_number'] = $image_number;
                $_SESSION['nickname'] = $nickname;
                $_SESSION['note'] = $note;

                push_message(MESSAGE_EDITED_USER_INFO);
                header('Location:' . PATH_HTTP_ROOT . "user?id={$user_id}");
                exit;
            }
        }
    }
}


$title = $nickname;
$description = '';
$layout_path = __DIR__ . '/layout.php';

require_once PATH_ROOT . 'php/parts/template/minimum.php';