<?php require('./includes/config.php');

$cid = $_POST['category_id'];
$pname = $_POST['product_name'];
$pdesc = $_POST['product_description'];
$pprice = $_POST['product_price'];
$pqty = $_POST['product_quantity'];

// Images
$countfiles = count($_FILES['product_image']['name']);

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

$sql = "INSERT INTO `products` (`category_id`, `product_name`, `product_image`, `product_description`, `product_price`, `product_quantity`) 
        VALUES ('$cid', '$pname', '$imgs', '$pdesc', '$pprice', '$pqty')";

$result = mysqli_query($conn, $sql);

if ($result) {
    header('location:categories.php?msg_insert=Added data successfully!');
} else {
    header('location:categories.php?msg_error=Failed!');
}
?>
