<?php //session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | MaleFashion</title>

</head>

<?php
session_start();
$is_homepage = true;

include('header.php');
require('./admin/includes/config.php'); ?>

<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="./assets/images/hero/hero-1.jpg" >
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Summer Collection</h6>
                            <h2>Fall - Winter Collections 2030</h2>
                            <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                            <a href="./collections.php" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero__items set-bg" data-setbg="./assets/images/hero/hero-2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-7 col-md-8">
                    <div class="hero__text">
                        <h6>Summer Collection</h6>
                        <h2>Fall - Winter Collections 2030</h2>
                        <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                            commitment to exceptional quality.</p>
                        <a href="./collections.php" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                        <div class="hero__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row featured__filter">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>All Products</h2>
                </div>
            </div>
            <?php
            $sql_str = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql_str);
            while ($row = mysqli_fetch_assoc($result)) {
                $anh_arr = explode(';', $row['product_image']);
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= "./admin/" . $anh_arr[0] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="products.php?product_id=<?= $row['product_id'] ?>"><?= $row['product_name'] ?></a></h6>
                            <div class="prices">
                                <span class="old"><?= $row['product_price'] ?></span>
                                <span class="curr"><?= " $" . number_format($row['product_price'], 0, '', '.') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<?php include('./footer.php'); ?>