<?php
session_start();
$errorMsg = "";

require("./includes/config.php");

if (isset($_POST["btSubmit"])) {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admins WHERE email='$email' and password='$password'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row;

        // Go to index.php
        header("Location: index.php");
    } else {
        $errorMsg = "Không tìm thấy thông tin tài khoản trong hệ thống";
        require("includes/loginform.php");
    }

} else {
    require("includes/loginform.php");
}
