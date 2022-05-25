<?php

/*
    $nickname:  string
    $nickname_message:  string
    $error_message:    string
*/


if (empty($nickname)) {
    $nickname = '';
}
else if (strlen($nickname) > 32) {
    $nickname_message = ERROR_MESSAGE_INVALID_NICKNAME;
    $error_message = ERROR_MESSAGE_CONFIRM_INPUT;
}