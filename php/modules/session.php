<?php

# Get session values

session_start();

if (isset($_SESSION['id'])) {
    define('id',  $_SESSION['id']);
    define('e_mail',  $_SESSION['e_mail']);
    define('e_mail_validation',  $_SESSION['e_mail_validation']);
    define('image',  $_SESSION['image']);
    define('image_number',  $_SESSION['image_number']);
    define('nickname',  $_SESSION['nickname']);
    define('note',  $_SESSION['note']);
}
else {
    define('id', '-1');
}

function push_message($message) {
    if (!isset($_SESSION['messages'])) {
        $_SESSION['messages'] = [];
    }

    $_SESSION['messages'][] = $message;
}

function pop_messages() {
    if (isset($_SESSION['messages'])) {
        $messages = $_SESSION['messages'];
        unset($_SESSION['messages']);
        return $messages;
    }

    return [];
}