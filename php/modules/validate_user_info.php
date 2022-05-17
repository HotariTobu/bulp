<?php

/*
    $e_mail:    string
    $e_mail_message:    string
    $password:  string
    $password_message:  string
    $nickname:  string
    $nickname_message:  string
    $error_message:    string
*/


if (isset($e_mail)) {
    if (strlen($e_mail) > 64) {
        $e_mail_message = ERROR_MESSAGE_INVALID_EMAIL;
        $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
    }
}
else {
    $e_mail_message = ERROR_MESSAGE_EMPTY_EMAIL;
    $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
}

if (isset($password)) {
    if (strlen($password) > 64) {
        $password_message = ERROR_MESSAGE_INVALID_PASSWORD;
        $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
    }
}
else {
    $password_message = ERROR_MESSAGE_EMPTY_PASSWORD;
    $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
}

if (isset($nickname)) {
    if (strlen($nickname) > 32) {
        $nickname_message = ERROR_MESSAGE_INVALID_NICKNAME;
        $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
    }
}
else {
    $nickname = '';
}