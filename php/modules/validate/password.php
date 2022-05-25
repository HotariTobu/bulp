<?php

/*
    $password:  string
    $password_message:  string
    $error_message:    string
*/


if (empty($password)) {
    $password_message = ERROR_MESSAGE_EMPTY_PASSWORD;
    $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
}
else if (strlen($password) > 64) {
    $password_message = ERROR_MESSAGE_INVALID_PASSWORD;
    $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
}
