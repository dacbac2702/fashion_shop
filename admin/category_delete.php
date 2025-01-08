<?php require('./includes/config.php'); 

$delid = $_GET['category_id'];

$sql_str = "DELETE FROM categories WHERE category_id=$delid";
mysqli_query($conn, $sql_str);

header("location:categories.php?msg_delete=Deleted data successfully!");

?>