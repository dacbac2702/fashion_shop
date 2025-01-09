<?php
session_start();
$idsp = $_GET['product_id'];
$qty = $_POST['order_quantity'];

$cart = [];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
for ($i = 0; $i < count($cart); $i++) {
    if ($cart[$i]['product_id'] == $idsp) {
        $cart[$i]['order_quantity'] = $qty;
        break;
    }
}

//update session
$_SESSION['cart'] = $cart;

header("Location: cart.php");
