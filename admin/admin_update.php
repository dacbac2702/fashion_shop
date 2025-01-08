<?php
include('./includes/header.php');
require('./includes/config.php');

$id = $_GET['admin_id'];

$sql_str = "SELECT * FROM admins WHERE admin_id = $id";
$result_1 = mysqli_query($conn, $sql_str);

$row = mysqli_fetch_assoc($result_1);

if (isset($_POST['btnUpdate'])) {
    //neu nut Cap nhat duoc nhan
    //lay name
    $username = $_POST['username'];
    $password = $_POST['password'];
    //thuc hien viec cap nhat
    $sql_str2 = "UPDATE admins 
                SET username = '$username', password = '$password' 
                WHERE admin_id = $id";

    $result_2 = mysqli_query($conn, $sql_str2);

    if ($result_2) {
        header('location:admins.php?msg_update=Updated data successfully!');
    } else {
        header('location:admins.php?msg_error=Failed!');
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
                            <h1 class="h4 text-gray-900 mb-4">Update Admin</h1>
                        </div>
                        <form class="user" method="post" action="admin_update.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control form-control-user" id="username" name="username" value="<?php echo $row['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control form-control-user" id="password" name="password" value="<?php echo $row['password'] ?>">
                            </div>
                            <button class="btn btn-primary" name="btnUpdate">Update</button>
                        </form>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include('includes/footer.php'); ?>