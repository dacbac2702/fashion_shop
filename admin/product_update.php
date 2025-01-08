
<?php require('includes/header.php'); ?>
<?php require('./includes/config.php'); ?>

<?php
//lay id goi edit
$id = $_GET['product_id'];

$sql = "SELECT p.product_id, p.product_name, p.product_image, c.category_name, p.product_price, p.product_quantity
        FROM products AS p
        JOIN categories AS c ON p.category_id = c.category_id
        ORDER BY p.product_name";

$result = mysqli_query($conn, $sql);

$product = mysqli_fetch_assoc($result);

if (isset($_POST['btnUpdate'])) {

    $cid = $_POST['category_id'];
    $pname = $_POST['product_name'];
    $pdesc = $_POST['product_description'];
    $pprice = $_POST['product_price'];
    $pqty = $_POST['product_quantity'];

    // Images
    $countfiles = count($_FILES['product_image']['name']);

    if (!empty($_FILES['product_image']['name'][0])) {
        // Delete current images
        $images_arr = explode(';', $product['images']);
        foreach ($images_arr as $img) {
            unlink($img);
        }

        // Add new images
        $imgs = '';
        for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['product_image']['name'][$i];

            ## Location
            $location = "uploads/" . uniqid() . $filename;
            $extension = pathinfo($location, PATHINFO_EXTENSION);
            $extension = strtolower($extension);

            ## File upload allowed extensions
            $valid_extensions = array("jpg", "jpeg", "png");

            $response = 0;
            ## Check file extension
            if (in_array(strtolower($extension), $valid_extensions)) {

                ## Upload file
                if (move_uploaded_file($_FILES['product_image']['tmp_name'][$i], $location)) {
                    $imgs .= $location . ";";
                }
            }
        }
        $imgs = substr($imgs, 0, -1);

        $sql = "UPDATE products
                SET category_id='$cid', product_name='$pname', product_description='$pdesc', product_price='$pprice', product_quantity=$pqty
                WHERE product_id=$id";
    }

    mysqli_query($conn, $sql);

    header("location: products.php");
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
                            <h1 class="h4 text-gray-900 mb-4">Update Category</h1>
                        </div>
                        <form class="user" method="post" action="#" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="category_id" class="form-label">Category:</label>
                                <select class="form-control" name="category_id">
                                    <option>Select category</option>
                                    <?php
                                    $sql = "SELECT * FROM categories ORDER BY category_name";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $row['category_id']; ?>" <?php if ($row['category_name'] == $product['product_id'])
                                                                                                echo "selected"; ?>>
                                            <?php echo $row['category_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_name">Name</label>
                                <input type="text" class="form-control form-control-user" id="product_name" name="product_name" value="<?= $product['product_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="product_image" class="form-label">Current Images:</label>
                                <input type="file" class="form-control form-control-user" id="product_image" name="product_image[]" multiple>
                                <?php
                                $arr = explode(';', $product['product_image']);
                                foreach ($arr as $img)
                                    echo "<img src='$img' height='100px' />";
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="product_description" class="form-label">Description:</label>
                                <textarea class="form-control form-control-user" id="product_description" name="product_description" value="<?= $product['product_description'] ?>"></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-sm-0">
                                    <label for="product_price">Price:</label>
                                    <input type="text" class="form-control form-control-user" id="product_price" name="product_price" value="<?= $product['product_price'] ?>">
                                </div>
                                <div class="col-sm-6 mb-sm-0">
                                    <label for="product_quantity">Stock:</label>
                                    <input type="text" class="form-control form-control-user" id="product_quantity" name="product_quantity" value="<?= $product['product_quantity'] ?>">
                                </div>
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