<?php include('includes/header.php'); ?>
<?php require('./includes/config.php'); ?>
<?php
if (isset($_POST["add_category"])) {
    $category_name = $_POST["category_name"];
    $category_description = $_POST["category_description"];

    $sql = "INSERT INTO categories (category_name, category_description) 
            VALUES ('$category_name', '$category_description')";
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
                            <h1 class="h4 text-gray-900 mb-4">Add Category</h1>
                        </div>
                        <form class="user" method="post" action="addcategory.php">
                            <div class="form-group">
                                <label for="category_name">Name</label>
                                <input type="text" class="form-control form-control-user" id="category_name" name="category_name" aria-describedby="emailHelp" placeholder="Enter name...">
                            </div>
                            <div class="form-group">
                                <label for="category_description">Description</label>
                                <input type="text" class="form-control form-control-user" id="category_description" name="category_description" aria-describedby="emailHelp" placeholder="Enter description...">
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