<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Admin Panel</title>
</head>

<?php include('includes/header.php'); ?>
<?php require('./includes/config.php'); ?>

<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
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
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Emaill</th>
                            <th>Phone</th>
                            <th>D.o.B</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('./includes/config.php');
                        $sql = "SELECT * FROM users ORDER BY user_id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['fullname'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['phone_number'] ?></td>
                                <td><?= $row['dob'] ?></td>
                                <td><?= $row['address'] ?></td>
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