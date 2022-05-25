<?php

/*
    $e_mail:    string
    $e_mail_message:    string
    $error_message:    string
*/


if (empty($e_mail)) {
    $e_mail_message = ERROR_MESSAGE_EMPTY_EMAIL;
    $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
}
else if (strlen($e_mail) > 64) {
    $e_mail_message = ERROR_MESSAGE_INVALID_EMAIL;
    $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
}