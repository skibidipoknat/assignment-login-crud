<?php
require_once("database.php");
class User
{
    public $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Get all users
    public function getAllUser()
    {
        $sql = "SELECT * FROM tbl_user";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($user_id)
    {
        $sql = "SELECT * FROM tbl_user WHERE user_id = ?";
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $user_id);
        $query->execute();
        $result = $query->get_result();
        return $result->fetch_assoc();
    }

    // Add user
    public function addUser($fname, $lname, $email, $address, $username, $password, $status)
    {
        $sql = "INSERT INTO tbl_user SET fname = ?, lname = ?, email = ?, address = ?, username = ?, password = ?, active = ?, date_created = NOW()";
        $result = $this->conn->prepare($sql);
        $result->bind_param("ssssssi", $fname, $lname, $email, $address, $username, $password, $status);
        return $result->execute();
    }

    public function editUser($user_id, $fname, $lname, $email, $address, $username, $password, $status)
    {
        $sql = "UPDATE tbl_user SET fname = ?, lname = ?, email = ?, address = ?, username = ?, password = ?, active = ? WHERE user_id = ?";
        $result = $this->conn->prepare($sql);
        $result->bind_param("ssssssii", $fname, $lname, $email, $address, $username, $password, $status, $user_id);
        return $result->execute();
    }

    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM tbl_user WHERE user_id = ?";
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $user_id);
        return $query->execute();
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM tbl_user WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function getUserId($username, $password)
    {
        $sql = "SELECT user_id FROM tbl_user WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['user_id'];
    }
}
