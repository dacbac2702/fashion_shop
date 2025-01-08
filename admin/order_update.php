<?php include('includes/header.php'); ?>
<?php require('./includes/config.php'); ?>

<?php

$id = $_GET['order_id'];

$sql = "SELECT * FROM orders WHERE order_id=$id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['btnUpdate'])) {
    $status = $_POST['order_status'];

    $sql = "UPDATE orders 
            SET order_status =  '$status'
            WHERE order_id=$id";

    mysqli_query($conn, $sql);

    header("location: orders.php");
} else {
?>
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Order Details</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form class="user" method="post" action="#">
                                        <div class="row">
                                            <div class="col-md-3">Customer:</div>
                                            <div class="col-md-9">
                                                <?= $row['firstname'] . ' ' . $row['lastname'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">Address:</div>
                                            <div class="col-md-9">
                                                <?= $row['shipping_address'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">Phone:</div>
                                            <div class="col-md-9">
                                                <?= $row['phone_number'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">Email:</div>
                                            <div class="col-md-9">
                                                <?= $row['email'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">Status:</div>
                                            <!-- 'Processing','Confirmed','Shipping','Delivered','Cancelled' -->
                                            <div class="col-md-9">
                                                <select name="order_status" id="">
                                                    <option <?= $row['order_status'] == 'Processing' ? 'selected' : '' ?>>Processing
                                                    </option>
                                                    <option <?= $row['order_status'] == 'Confirmed' ? 'selected' : '' ?>>Confirmed
                                                    </option>
                                                    <option <?= $row['order_status'] == 'Shipping' ? 'selected' : '' ?>>Shipping
                                                    </option>
                                                    <option <?= $row['order_status'] == 'Delivered' ? 'selected' : '' ?>>Delivered
                                                    </option>
                                                    <option <?= $row['order_status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <h3>Order Details</h3>
                                    <table class="table">
                                        <tr>
                                            <th>No.</th>
                                            <th>Products</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>

                                        </tr>
                                        <?php
                                        $sql = "SELECT p.product_name, p.product_price, od.order_quantity, od.total_price
                                                FROM products AS p
                                                JOIN order_details AS od ON p.product_id = od.product_id";
                                        $result = mysqli_query($conn, $sql);
                                        $stt = 0;
                                        $tongtien = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $tongtien += $row['order_quantity'] * $row['product_price'];
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= ++$stt ?>
                                                </td>
                                                <td>
                                                    <?= $row['product_name'] ?>
                                                </td>
                                                <td>
                                                    <?= "$" . number_format($row['product_price'], 0, '', '.') ?>
                                                </td>
                                                <td>
                                                    <?= $row['order_quantity'] ?>
                                                </td>
                                                <td>
                                                    <?= "$" . number_format($row['total_price'], 0, '', '.') ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <div class="tongtien">
                                        <h5>
                                            Tổng tiền:
                                            <?= "$" . number_format($tongtien, 0, '', '.') ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php include('includes/footer.php');
}
?>