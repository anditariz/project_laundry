<?php
if (isset($_POST['save'])) {
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];

    $insert = mysqli_query($conn, "INSERT INTO customers (customer_name, customer_phone, customer_address) VALUES('$customer_name', '$customer_phone', '$customer_address')");
    if ($insert) {
        header("location:?page=customer&add=success");
    }
}

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];

    $update = mysqli_query($conn, "UPDATE customers SET customer_name = '$customer_name', customer_phone = '$customer_phone', customer_address = '$customer_address' WHERE id = '$id'");
    if ($update) {
        header("location:?page=customer&edit=success");
    }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($conn, "SELECT * FROM customers WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Customer</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['customer_name'] : '' ?>" type="text" class="form-control" name="customer_name" required placeholder="Enter Customer Name">
                    </div>
                    <div class="mb-3">
                        <label for="">Phone</label>
                        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['customer_phone'] : '' ?>" type="number" class="form-control" name="customer_phone" required placeholder="Enter Customer Phone">
                    </div>
                    <div class="mb-3">
                        <label for="">Address</label>
                        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['customer_address'] : '' ?>" type="text" class="form-control" name="customer_address" required placeholder="Enter Customer Address">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>