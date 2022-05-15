<!--
    $posts: array of post
-->

<?php

if (isset($posts)) {
    foreach ($posts as $post) {
        require PATH_ROOT . 'post/index.php';
    }
}