<?php

/*
    $_GET {
        'location'
    }
*/


# Get GET value

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['location'])) {
        $location = $_GET['location'];
    }
}


# Clear session values

session_start();
$_SESSION = array();
session_destroy();


# Go back to previous page

if (empty($location)) {
    $location = $_SERVER['HTTP_REFERER'];
}

header("Location:{$location}");