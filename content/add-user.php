<?php
if (isset($_POST['save'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $level = $_POST['level'];
    $user_password = sha1($_POST['user_password']);

    $insert = mysqli_query($conn, "INSERT INTO users (user_name, user_email, id_level, user_password) VALUES ('$user_name', '$user_email','$level', '$user_password')");
    if ($insert) {
        header("location:?page=user&add=success");
    }
}

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $level = $_POST['level'];

    if ($_POST['user_password']) {
        $password = sha1($_POST['user_password']);
    } else {
        $password = $result['user_password'];
    }

    $update = mysqli_query($conn, "UPDATE users SET id_level = '$level', user_name = '$user_name', user_email = '$user_email',  user_password = '$ password' WHERE id = '$id'");
    if ($update) {
        header("location:?page=user&edit=success");
    }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

// level 
$queryLevl = mysqli_query($conn, "SELECT * FROM levels ORDER BY id DESC");
$rowLevls = mysqli_fetch_all($queryLevl, MYSQLI_ASSOC);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3><?php echo isset($_GET['edit']) ? 'Edit' : 'Creat New' ?> User</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="col-sm-12">
                        <select name="level" id="level" class="form-select">
                            <option value="" selected disabled>SELECT</option>
                            <?php
                            foreach ($rowLevls as $row) : ?>
                                <option value=<?php echo $row['id'] ?>><?php echo $row['level_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['user_name'] : '' ?>" type="text" class="form-control" name="user_name" required placeholder="Enter user Name">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['user_email'] : '' ?>" type="email" class="form-control" name="user_email" required placeholder="Enter user email">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['user_password'] : '' ?>" type="password" class="form-control" name="user_password" required placeholder="Enter user password">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>