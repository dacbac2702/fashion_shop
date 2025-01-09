<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart | MaleFashion</title>

</head>
<?php
session_start();
$is_homepage = false;

include ('./header.php');
require ('./admin/includes/config.php');
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>CART</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Cart</span>
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
            <h4>CART</h4>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="checkout__order">
                        <h4>YOUR ORDER</h4>
                        <div class="checkout__order__products">
                            Products <span>Total</span>
                        </div>
                        <table class="table">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                            <?php
                            $cart = [];
                            if (isset($_SESSION['cart'])) {
                                $cart = $_SESSION['cart'];
                            }
                            $count = 0; // Số thứ tự
                            $total = 0;
                            foreach ($cart as $item) {
                                $total += $item['order_quantity'] * $item['product_price'];
                                ?>
                                <form action="updatecart.php?id=<?= $item['product_id'] ?>" method="post">
                                    <tr>
                                        <td>
                                            <?= ++$count ?>
                                        </td>
                                        <td>
                                            <?= $item['product_name'] ?>
                                        </td>
                                        <td>
                                            <?= "$" . number_format($item['product_price'], 0, '', '.') ?>
                                        </td>
                                        <td><input type="number" name="order_quantity" value="<?= $item['order_quantity'] ?>" min="1" /></td>
                                        <td>
                                            <?= "$" . number_format($item['product_price'] * $item['order_quantity'], 0, '', '.') ?>
                                        </td>
                                        <td><a href='./deletecart.php?product_id=<?= $item['product_id'] ?>' class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                </form>
                                <?php
                            }
                            ?>
                        </table>
                        <div class="checkout__order__total">
                            TOTAL: <span>
                                <?= "$" . number_format($total, 0, '', '.') ?>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="collections.php" class="btn continue-btn">Continue Shopping</a>
                            <a href="payments.php" class="btn site-btn">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<?php include('./footer.php');?>