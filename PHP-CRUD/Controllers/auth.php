<?php
session_start();
include '../Model/user.php';
$user = new User();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($user->login($username, $password)) {
            $_SESSION['user_id'] = $user->getUserId($username, $password);
            header('location: ../View/home.php');
            exit();
        } else {
            header('location: ../index.php?error=Invalid username or password');
            exit();
        }
    }
}
