<?php
include('includes/header.php');
require('./includes/config.php');

$id = $_GET['category_id'];

$sql_str = "select * from categories where category_id=$id";
$result = mysqli_query($conn, $sql_str);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['btnUpdate'])) {
    //neu nut Cap nhat duoc nhan
    //lay name
    $cname = $_POST['category_name'];
    $cdesc = $_POST['category_description'];
    //thuc hien viec cap nhat
    $sql_str2 = "UPDATE categories SET category_name='$cname', category_description='$cdesc' WHERE category_id=$id";

    $result = mysqli_query($conn, $sql_str2);

    if ($result) {
        header('location:categories.php?msg_insert=Added data successfully!');
    } else {
        header('location:categories.php?msg_error=Failed!');
    }
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
                                <h1 class="h4 text-gray-900 mb-4">Update Category</h1>
                            </div>
                            <form class="user" method="post" action="#">
                                <div class="form-group">
                                    <label for="category_name">Name</label>
                                    <input type="text" class="form-control form-control-user" id="category_name" name="category_name" value="<?php echo $row['category_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" class="form-control form-control-user" id="category_description" name="category_description" value="<?php echo $row['category_description'] ?>">
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


<?php include('includes/footer.php');
}
?>