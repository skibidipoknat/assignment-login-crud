<?php
include "../Model/user.php";
$user = new User();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['add'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        $result_add = $user->addUser($lname, $fname, $email, $address, $username, $password, $status);

        if ($result_add) {
            echo '<script>alert("SUCCESSFULLY ADDED")</script>';
            header("location: ../View/list-user.php");
            exit();
        } else {
            echo '<script>alert("UNSUCCESSFULLY ADDED")</script>';
            header("location: ../View/list-user.php");
        }
    } else if (isset($_POST['edit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];
        $user_id = $_POST['user_id'];

        $result_add = $user->editUser($user_id, $lname, $fname, $email, $address, $username, $password, $status);

        if ($result_add) {
            echo '<script>alert("SUCCESSFULLY ADDED")</script>';
            header("location: ../View/list-user.php");
            exit();
        } else {
            echo '<script>alert("UNSUCCESSFULLY ADDED")</script>';
            header("location: ../View/list-user.php");
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['delete'])) {
    $get_id = $_GET['delete'];

    $result = $user->deleteUser($get_id);

    if ($result) {
        echo '<script>alert("DELETED SUCCESSFULLY")</script>';
        header("location: ../View/list-user.php");
        exit();
    } else {
        echo '<script>alert("DELETED UNSUCCESSFULLY")</script>';
        header("location: ../View/list-user.php");
    }
}
