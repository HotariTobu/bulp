<?php

/*
    $posts: array of post
*/


if (isset($posts)) {
    foreach ($posts as $post) {
        require PATH_ROOT . 'post/index.php';
    }
}