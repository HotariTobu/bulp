<?php

    /*
        $posts: array of post
    */


    require PATH_ROOT . 'post/index.php';
?>

<div class="children-container">
    <?php foreach ($posts as $post): ?>
        <?php require PATH_ROOT . 'post/index.php' ?>
    <?php endforeach ?>
</div>