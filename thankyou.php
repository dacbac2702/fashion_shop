<?php
session_start();
$is_homepage = false;

include('./header.php');
require('./admin/includes/config.php');
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Thank You!</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Thank You!</span>
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
            <h4 style="text-align: center;">
                Thank you for ordering on our system
                <br>
                We will be in touch soon contact you to finalize your order!
            </h4>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<?php include('./footer.php');?>