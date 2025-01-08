<?php require('./includes/config.php');

$cname = $_POST['category_name'];
$cdesc = $_POST['category_description'];

$sql = "INSERT INTO `categories` (`category_name`, `category_description`) 
            VALUES ('$cname',  '$cdesc')";

$result = mysqli_query($conn, $sql);

if ($result) {
    header('location:categories.php?msg_insert=Added data successfully!');
} else {
    header('location:categories.php?msg_error=Failed!');
}
?>