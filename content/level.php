<?php
$querylevels = mysqli_query($conn, "SELECT * FROM levels ORDER BY id DESC");
$rowlevels   = mysqli_fetch_all($querylevels, MYSQLI_ASSOC);

// if (isset($_GET['delete'])) {
//     $id = $_GET['delete'];
//     $delete = mysqli_query($conn, "DELETE FROM levels WHERE id = '$id'");
//     header("location:?page=level&notif=success");
// }

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data level</h3>
            </div>
            <div class="card-body">
                <div align="right" class="mb-3">
                    <a href="?page=add-level" class="btn btn-primary">Create New level</a>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($rowlevels as $row): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['level_name'] ?></td>
                                <td>
                                    <a href="?page=add-level&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?page=level&delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>