<?php

# Clear session values

session_start();
$_SESSION = array();
session_destroy();


# Go back to previous page

header("Location:{$_SERVER['HTTP_REFERER']}");