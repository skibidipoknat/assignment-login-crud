<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: ../index.php');
    exit();
}

include '../Model/user.php';
$user = new User();
$user_login = $user->getUserById($_SESSION['user_id']);
