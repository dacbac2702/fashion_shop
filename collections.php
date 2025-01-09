<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Collections | MaleFashion</title>

</head>

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
                    <h4>Collections</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Collections</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Category</h4>
                        <ul>
                            <?php
                            $sql_str = "SELECT * FROM categories ORDER BY category_name";
                            $result = mysqli_query($conn, $sql_str);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <li><a href="#"><?= $row['category_name'] ?></a></li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Low to High</option>
                                    <option value="0">High to Low</option>
                                </select>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT * FROM products ORDER BY product_name";
                        $result = mysqli_query($conn, $sql);

                        ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6>Have <span><?= mysqli_num_rows($result) ?></span> products</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $anh_arr = explode(';', $row['product_image']);
                    ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?= "admin/" . $anh_arr[0] ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="products.php?id=<?= $row['product_id'] ?>"><?= $row['product_name'] ?></a></h6>
                                    <!-- <h5><?= $row['price'] ?></h5> -->
                                    <div class="prices">
                                        <span class="old"><?= $row['product_price'] ?></span>
                                        <span class="curr"><?= " $" .  number_format($row['product_price'], 0, '', '.') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

<?php include('./footer.php'); ?>