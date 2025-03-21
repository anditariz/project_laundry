<?php

$query = mysqli_query($conn, "SELECT trans_order. * , customers.customer_name FROM trans_order LEFT JOIN customers ON customers.id = trans_order.id_customer WHERE deleted_at = 0 ORDER BY trans_order.id DESC");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($conn, "UPDATE trans_order SET deleted_at = 1 WHERE id = '$id'");
    header("location:?page=USER&notif=success");
}

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Trans Order</h3>
            </div>
            <div class="card-body">
                <div align="right" class="mb-3">
                    <a href="?page=add-trans-order" class="btn btn-primary">Create New Order</a>
                </div>
                <table class="table table-bordered text-center">
                    <thead> 
                        <tr>
                            <th>No</th>
                            <th>Trans Code</th>
                            <th>Customer Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($result as $row): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['trans_code'] ?></td>
                                <td><?php echo $row['customer_name'] ?></td>
                                <td><?php echo $row['status'] ?></td>
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