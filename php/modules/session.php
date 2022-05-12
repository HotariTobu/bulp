<?php

# Get session values

session_start();

if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $e_mail_validation = $_SESSION['e_mail_validation'];
    $image = $_SESSION['image'];
    $image_number = $_SESSION['image_number'];
    $nickname = $_SESSION['nickname'];
    $note = $_SESSION['note'];
}