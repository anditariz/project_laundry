<?php

$query = mysqli_query($conn, "SELECT users. * , levels.level_name FROM users LEFT JOIN levels ON users.id_level = levels.id");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");
    header("location:?page=user&notif=success");
}

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data user</h3>
            </div>
            <div class="card-body">
                <div align="right" class="mb-3">
                    <a href="?page=add-user" class="btn btn-primary">Create New User</a>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Level</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($result as $row): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['id_level'] ?></td>
                                <td><?php echo $row['user_name'] ?></td>
                                <td><?php echo $row['user_email'] ?></td>
                                <td>
                                    <a href="?page=add-user&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?page=user&delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>