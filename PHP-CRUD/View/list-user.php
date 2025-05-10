<?php

include "../Model/user.php";
$user = new User();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User</title>
    <?php include "../Includes/href.php" ?>
    <link rel="stylesheet" href="../Styles/list-user.css">
</head>

<body>
    <?php include "../Includes/navbar.php" ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-primary">
                    <div class="header-title card-header bg-transparent p-0">
                        <h4>List of Users</h4>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['edit'])) {
                            $get_id_edit = $_GET['edit'];
                            $row = $user->getUserById($get_id_edit);
                            if ($row) {
                        ?>
                                <form action="../controllers/action_user.php" method="post">
                                    <input type="text" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>" required>
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" class="form-control" name="fname" value="<?php echo $row['fname']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" class="form-control" name="lname" value="<?php echo $row['lname']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="1" <?php if ($row['active'] === 1) {
                                                                    echo 'selected';
                                                                } ?>>Actived</option>
                                            <option value="0" <?php if ($row['active'] === 0) {
                                                                    echo 'selected';
                                                                } ?>>Deactived</option>
                                        </select>
                                    </div>
                                    <div class="form-group pt-2">
                                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='list-user.php'">Cancel</button>
                                    </div>
                                </form>
                            <?php }
                        } else { ?>
                            <form action="../controllers/action_user.php" method="post">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" name="fname" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" name="lname" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="1">Actived</option>
                                        <option value="0">Deactived</option>
                                    </select>
                                </div>
                                <div class="form-group pt-2">
                                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-secondary" onclick="window.location.href='list-user.php'">Cancel</button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0">
                    <div class="card-header bg-transparent p-0">
                        <h4>List of Users</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-dark m-0" id="myTable">
                                <thead>
                                    <tr class="glow-row">
                                        <th scope="col" class="neon-border">#</th>
                                        <th scope="col" class="neon-border">Full Name</th>
                                        <th scope="col" class="neon-border">Username</th>
                                        <th scope="col" class="neon-border">Email</th>
                                        <th scope="col" class="neon-border">Address</th>
                                        <th scope="col" class="neon-border">Status</th>
                                        <th scope="col" class="neon-border">Date Created</th>
                                        <th scope="col" class="neon-border">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $users = $user->getAllUser();
                                    $count = 1;
                                    foreach ($users as $row) {
                                    ?>
                                        <tr class="hover-glow">
                                            <td class="text-center neon-text"><?php echo $count++ ?></td>
                                            <td class="neon-text"><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                            <td class="neon-text"><?php echo $row['username']; ?></td>
                                            <td class="neon-text"><?php echo $row['email']; ?></td>
                                            <td class="neon-text"><?php echo $row['address']; ?></td>
                                            <td class="text-center">
                                                <span class="badge <?php echo $row['active'] ? 'badge-success glow-green' : 'badge-danger glow-red'; ?>">
                                                    <?php echo $row['active'] == 1 ? 'Actived' : 'Deactived'; ?>
                                                </span>
                                            </td>
                                            <td class="neon-text"><?php echo $row['date_created']; ?></td>
                                            <td class="btn-actions">
                                                <a href="list-user.php?edit=<?php echo $row['user_id'] ?>" class="btn btn-edit">
                                                    <span class="btn-text">Edit</span>
                                                    <span class="btn-gradient"></span>
                                                    <span class="btn-sparkle"></span>
                                                </a>
                                                <a href="../Controllers/action_user.php?delete=<?php echo $row['user_id'] ?>" class="btn btn-delete">
                                                    <span class="btn-text">Delete</span>
                                                    <span class="btn-gradient"></span>
                                                    <span class="btn-sparkle"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    let table = new DataTable('#myTable');
</script>