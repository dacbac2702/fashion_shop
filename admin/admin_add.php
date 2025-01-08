<?php include('includes/header.php'); ?>
<?php require('./includes/config.php'); ?>
<?php
if (isset($_POST["add_category"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO admins (username, password) 
            VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:categories.php?msg_insert=Added data successfully!');
    } else {
        header('location:categories.php?msg_error=Failed!');
    }
}

?>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Add Admin</h1>
                        </div>
                        <form class="user" method="post" action="addadmin.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter username...">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter password...">
                            </div>
                            <button class="btn btn-primary">Add</button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include('includes/footer.php'); ?>