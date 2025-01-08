<?php include('includes/header.php'); ?>
<?php require('./includes/config.php'); ?>
<style>
    .Processing,
    .Confirmed,
    .Shipping,
    .Delivered,
    .Cancelled {
        display: block;

    }

    .Processing {
        background-color: orange;
    }

    .Confirmed {
        background-color: yellowgreen;
    }

    .Shipping {
        background-color: lightblue;
    }

    .Delivered {
        background-color: green;
    }

    .Cancelled {
        background-color: red;
    }
</style>
<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "select * from orders order by order_date";
                        $result = mysqli_query($conn, $sql);
                        $stt = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $stt++;
                        ?>
                            <tr>
                                <td><?= $stt ?></td>
                                <td><?= $row['order_id'] ?></td>
                                <td><?= $row['order_date'] ?></td>
                                <td><span class='<?= $row['order_status'] ?>'><?= $row['order_status'] ?></span></td>
                                <td>
                                    <a class="btn btn-warning" href="order_update.php?order_id=<?= $row['order_id'] ?>">View</a>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>