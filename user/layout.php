<?php

    /*
        $user:  {
            'nickname'
            'note'
        }
        $is_same:   boolean
        $posts: array of post
        $error_message:    string
    */


    require PATH_ROOT . 'php/parts/icon.php';
?>
<br>
<span><?= $user['nickname'] ?></span>
<br>
<span><?= $user['note'] ?></span>
<br>
<?php if ($is_same): ?>
    <a href="edit"><?= ACTION_EDIT ?></a>
<?php endif ?>
<br><br>
<?php foreach ($posts as $post): ?>
    <?php require PATH_ROOT . 'post/index.php' ?>
<?php endforeach ?>