<link rel="stylesheet" href="../Styles/navbar.css">

<?php
session_start();
require_once '../Model/user.php';
$user = new User();

$user_login = null;
if (isset($_SESSION['user_id'])) {
    $user_login = $user->getUserById($_SESSION['user_id']);
}
?>

<nav class="navbar">
    <div class="navbar-wrapper">

        <div class="navbar-logo">
            <img src="../Assets/logo-nav.png" alt="Logo" class="logo-img">
        </div>

        <div class="navbar-center">
            <a class="nav-link" href="home.php">Home</a>
            <a class="nav-link" href="list-user.php">User Management</a>
        </div>

        <div class="navbar-right">
            <span class="navbar-text">
                <?php echo $user_login['username']; ?>
            </span>
            <a class="logout-btn" href="logout.php">logout</a>
        </div>

    </div>
</nav>