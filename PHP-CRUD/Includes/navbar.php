<nav class="navbar">
    <link rel="stylesheet">
    <div class="navbar-wrapper">

        <a class="navbar-brand" href="#">
            <img src="../ASSETS/WraithLogo.jpg" alt="Logo" class="logo-img">
        </a>

        <div class="navbar-center">
            <a class="nav-link" href="home.php">Home</a>
            <a class="nav-link" href="list-user.php">User Management</a>
        </div>

        <div class="navbar-right">
            <span class="navbar-text">
                <?php echo isset($user_login['username']) ? $user_login['username'] : "Guest"; ?>
            </span>
            <a class="logout-btn" href="logout.php">logout</a>
        </div>

    </div>
</nav>