<?php require('./includes/config.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO admins (`username`, `password`) 
        VALUES ('$username',  '$password')";

$result = mysqli_query($conn, $sql);

if ($result) {
    header('location:admins.php?msg_insert=Added data successfully!');
} else {
    header('location:admins.php?msg_error=Failed!');
}
