<?php

    /*
        $user:  {
            'image'
            'image_number'
        }
    */
    

    require_once PATH_ROOT . 'php/modules/paths.php';


    if (empty($user)) {
        $user['image'] = null;
        $user['image_number'] = -1;
    }

    if ($user['image'] === null) {
        if ($user['image_number'] < 0) {
            $user['image_number'] = rand();
        }

        $fi = new FilesystemIterator(PATH_ICONS, FilesystemIterator::SKIP_DOTS);
        $icon_count = iterator_count($fi);
        $icon_number = sprintf('%04d', $user['image_number'] % $icon_count);

        $icon_filename = PATH_ICONS . "{$icon_number}.png";

        $fp = fopen($icon_filename, "rb");
        $user['image'] = fread($fp, filesize($icon_filename));
        fclose($fp);
    }

    if (empty($icon_size)) {
        $icon_size = 60;
    }

    $image_info = getimagesizefromstring($user['image']);
    $encoded_image = base64_encode($user['image']);
?>
<!--

    <img src="<?= "data:{$image_info['mime']};base64,{$encoded_image}" ?>" class="icon">
-->
<div style="background-image: url(<?= "data:{$image_info['mime']};base64,{$encoded_image}" ?>);" class="icon"></div>