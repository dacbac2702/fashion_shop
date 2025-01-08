<?php
require('./includes/config.php');

$delid = $_GET['product_id'];

$sql1 = "SELECT product_image from products where product_id=$delid";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);

$images_arr = explode(';', $row['product_image']);

foreach($images_arr as $img){
    unlink($img);
}

$sql_str = "DELETE FROM products WHERE product_id=$delid";
mysqli_query($conn, $sql_str);

header("location:products.php?msg_delete=Deleted data successfully!");

