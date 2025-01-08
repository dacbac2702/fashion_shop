<?php include('includes/header.php'); ?>
<?php require('./includes/config.php'); ?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                        </div>
                        <form class="user" method="post" action="addproduct.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="category_id" class="form-label">Category:</label>
                                <select class="form-control" name="category_id">
                                    <option>Select category</option>
                                    <?php
                                    $sql = "SELECT * FROM categories ORDER BY category_name";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_name">Name</label>
                                <input type="text" class="form-control form-control-user" id="product_name" name="product_name" placeholder="Enter Name...">
                            </div>
                            <div class="form-group">
                                <label for="product_image" class="form-label">Images:</label>
                                <input type="file" class="form-control form-control-user" id="product_image" name="product_image[]" multiple>
                            </div>
                            <div class="form-group">
                                <label for="product_description" class="form-label">Description:</label>
                                <textarea name="product_description" class="form-control" placeholder="Enter description..."></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-sm-0">
                                    <label for="product_price">Price:</label>
                                    <input type="text" class="form-control form-control-user" id="product_price" name="product_price" placeholder="Enter Price...">
                                </div>
                                <div class="col-sm-6 mb-sm-0">
                                    <label for="product_quantity">Quantity:</label>
                                    <input type="text" class="form-control form-control-user" id="product_quantity" name="product_quantity" placeholder="Enter Quantity...">
                                </div>
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

<?php include('includes/footer.php');?>