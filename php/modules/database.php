<?php

# Connect database

$database_info_lines = file(__DIR__ . '../../ignore_database_info', FILE_IGNORE_NEW_LINES);

try {
    $pdo = new PDO($database_info_lines[0], $database_info_lines[1], $database_info_lines[2], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (Exception $e) {
    exit(ERROR_MESSAGE_CONNECT_DATABASE);
}


# List table name

define('TABLE_NAME_POSTS', 'bulp_posts');
define('TABLE_NAME_USERS', 'bulp_users');
define('TABLE_NAME_VALIDATION_MAIL', 'bulp_validation_mail');
