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
                <h3><?php echo isset($_GET['edit']) ? 'Edit' : 'Creat New' ?> Trans Order</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nameWithTitle" class="form-label">Transaction Code</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="kode" id="kode" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <div class="col">
                                <label for="nameWithTitle" class="form-label">Transaction Dates</label>
                            </div>
                            <div class="col-sm-12">
                                <input type="date" name="tgl_order" id="tgl_order" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col">
                                <label for="nameWithTitle" class="form-label">Pick Up Date</label>
                            </div>
                            <div class="col-sm-12">
                                <input type="date" name="pick_up" id="pick-up" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="nameWithTitle" class="form-label">Name Customer</label>
                        </div>
                        <div class="col-sm-12">
                            <select name="customer" id="customer" class="form-select">
                                <option value="-" disabled selected>Choose Customer</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="nameWithTitle" class="form-label"></label>
                        </div>
                        <div class="col-sm-12">
                            <div align="right" class="">
                                <button type="button" class="btn btn-dark btn-sm add-row">Add Row</button>
                            </div>
                            <div class="tabel-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Services</th>
                                            <th>Qty</th>
                                            <th>Notes</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>