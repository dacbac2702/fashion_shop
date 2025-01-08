<?php 
include('includes/header.php');
require('./includes/config.php');

function anhdaidien($arrstr, $height)
{
    $arr = explode(';', $arrstr);
    return "<img src='$arr[0]' height='$height' />";
}
?>

<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
        </div>
        <div>
            <?php
            if (isset($_GET["msg_error"])) {
                echo "<h6>" . $_GET["msg_error"] . "</h6>";
            }

            if (isset($_GET["msg_insert"])) {
                echo "<h6>" . $_GET["msg_insert"] . "</h6>";
            }

            if (isset($_GET["msg_update"])) {
                echo "<h6>" . $_GET["msg_update"] . "</h6>";
            }

            if (isset($_GET["msg_delete"])) {
                echo "<h6>" . $_GET["msg_delete"] . "</h6>";
            }

            ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Images</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $sql = "SELECT p.product_id, p.product_name, p.product_image, c.category_name, p.product_price, p.product_quantity
                                FROM products AS p
                                JOIN categories AS c ON p.category_id = c.category_id
                                ORDER BY p.product_name";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['product_name'] ?></td>
                                <td><?= anhdaidien($row['product_image'], "100px") ?></td>
                                <td><?= $row['category_name'] ?></td>
                                <td><?= $row['product_price'] ?></td>
                                <td><?= $row['product_quantity'] ?></td>
                                <td><a class="btn btn-warning" href="product_update.php?product_id=<?php echo $row['product_id'] ?>">Update</a>
                                    <a class="btn btn-danger" href="product_delete.php?product_id=<?php echo $row['product_id'] ?>" onclick="return confirm('Bạn chắc chắn xóa sản phẩm này?');">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?php
require('includes/footer.php');
?>