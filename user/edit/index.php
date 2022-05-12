<?php

$title = TITLE_EDIT_USER;
$description = '';
$layout_path = __DIR__ . 'layout.php';


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


# Validate values

if ($submit == SUBMIT_VALUE_EDIT) {
    $e_mail = $password = '';
    require __DIR__ . '../../php/modules/validate_user_info.php';
}


# Insert record
    
if ($submit == SUBMIT_VALUE_EDIT) {
    if (!isset($record_message) && isset($id)) {
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
                        $record_message = ERROR_MESSAGE_RESIZE_IMAGE;
                    }
                }
                else {
                    $image = $image_data;
                }
            }
            else {
                $record_message = ERROR_MESSAGE_GET_IMAGE_INFO;
            }
        }
        if ($image != null) {
            $image_number = -1;
        }
        $query = 'UPDATE `:table_name` SET image=:image, image_number=:image_number, nickname=:nickname, note=:note WHERE id=:id';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':table_name', TABLE_NAME_USERS, PDO::PARAM_STR);
        $statement->bindParam(':image', $image, PDO::PARAM_LOB);
        $statement->bindParam(':image_number', $image_number, PDO::PARAM_INT);
        $statement->bindParam(':nickname', $nickname, PDO::PARAM_STR);
        $statement->bindParam(':note', $note, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($statement->execute()) {
            $_SESSION['image'] = $image;
            $_SESSION['image_number'] = $image_number;
            $_SESSION['nickname'] = $nickname;
            $_SESSION['note'] = $note;
            header('Location:' . __DIR__ . '../');
            exit;
        }
        else {
            $record_message = ERROR_MESSAGE_EDIT_USER;
        }
    }
}


require __DIR__ . '../../php/parts/template/minimum.php';