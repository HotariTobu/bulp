<?php

/*
    $current_password:  string
    $current_password_message:  string
    $password:  string
    $password_message:  string
    $retype_password:  string
    $retype_password_message:  string
    $error_message:    string
*/


require_once __DIR__ . '/retype_password.php';

if (empty($current_password)) {
    $current_password_message = ERROR_MESSAGE_EMPTY_PASSWORD;
    $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
}
