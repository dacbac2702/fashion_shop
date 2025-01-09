<?php
session_start();
$is_homepage = false;

$cart = [];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

require('./admin/includes/config.php');

if (isset($_POST['btDathang'])) {
    //lay thong tin khach hang tu form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $shipping_address = $_POST['shipping_address'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    //tao du lieu cho order
    $sqli = "INSERT INTO orders (user_id, firstname, lastname, shipping_address, phone_number, email) 
            VALUES (1, '$firstname', '$lastname', '$shipping_address', '$phone_number', '$email')";


    if (mysqli_query($conn, $sqli)) {
        $last_order_id = mysqli_insert_id($conn);
        //sau do them vao orer detail
        foreach ($cart as $item) {
            $pid = $item['product_id'];
            $pprice = $item['product_price'];
            $oqty = $item['order_quantity'];
            $total_price = $item['order_quantity'] * $item['product_price'];
            $sqli2 = "INSERT INTO order_details (order_id, product_id, order_quantity, order_price, total_price) 
                    VALUES ($last_order_id, $pid,  $oqty, $pprice, $total_price)";
            // echo $sqli2, exit;
            mysqli_query($conn, $sqli2);
        }
    }
    //xoa cart
    unset($_SESSION["cart"]);
    header("Location: thankyou.php");
}

include('./header.php');
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Payments</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Payments</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>CUSTOMER INFORMATION</h4>
            <form action="#" method="post">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>First Name<span>*</span></p>
                                    <input type="text" name='firstname' required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name='lastname' required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address:<span>*</span></p>
                            <input type="text" placeholder="Địa chỉ" class="checkout__input__add" name="shipping_address" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone:<span>*</span></p>
                                    <input type="text" name="phone_number" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email:<span>*</span></p>
                                    <input type="text" name="email" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>YOUR ORDER</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <?php
                                $cart = [];
                                if (isset($_SESSION['cart'])) {
                                    $cart = $_SESSION['cart'];
                                }
                                $count = 0; //số thứ tự
                                $total = 0;
                                foreach ($cart as $item) {
                                    $total += $item['order_quantity'] * $item['product_price'];
                                ?>
                                    <li>
                                        <?= $item['product_name'] ?> <span>
                                            <?= "$" . number_format($item['product_price'] * $item['order_quantity'], 0, '', '.') ?>
                                        </span>
                                    </li>
                                <?php } ?>
                            </ul>
                            <div class="checkout__order__total">Total: <span>
                                    <?= "$" . number_format($total, 0, '', '.') ?>
                                </span></div>
                            <button type="submit" class="site-btn" name="btDathang">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<!-- Footer Section Begin -->
<?php
include('./footer.php');
?>