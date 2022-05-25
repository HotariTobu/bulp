<?php

/*
    $password:  string
    $password_message:  string
    $retype_password:  string
    $retype_password_message:  string
    $error_message:    string
*/


require_once __DIR__ . '/password.php';

if (empty($retype_password)) {
    $retype_password_message = ERROR_MESSAGE_EMPTY_PASSWORD;
    $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
}
else if (isset($password) && $password !== $retype_password) {
    $password_message = ERROR_MESSAGE_NOT_MATCH_RETYPE_PASSWORD;
    $retype_password_message = ERROR_MESSAGE_NOT_MATCH_RETYPE_PASSWORD;
    $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
}
