<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - Admin Panel</title>
</head>

<?php include('includes/header.php'); ?>
<?php require('./includes/config.php'); ?>

<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
        </div>
        <div>
            <?php
            if (isset($_GET["msg_error"])) {
                echo "<h6>" . $_GET["msg_error"] . "</h6>";
            }

            if (isset($_GET["msg_insert"])) {
                echo "<h6>" . $_GET["msg_insert"] . "</h6>";
            }

            if (isset($_GET["msg_update"])) {
                echo "<h6>" . $_GET["msg_update"] . "</h6>";
            }

            if (isset($_GET["msg_delete"])) {
                echo "<h6>" . $_GET["msg_delete"] . "</h6>";
            }

            ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('./includes/config.php');
                        $sql = "SELECT * FROM categories ORDER BY category_name";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['category_name'] ?></td>
                                <td><?= $row['category_description'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="category_update.php?category_id=<?= $row['category_id'] ?>">Update</a>
                                    <a class="btn btn-danger" href="category_delete.php?category_id=<?= $row['category_id'] ?>" onclick="return confirm('Bạn chắc chắn xóa mục này?');">Delete</a>
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

<?php include('includes/footer.php');?>