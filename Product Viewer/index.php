<?php
require 'database.php';
//Lấy ID category
$category_id = 1;
if(isset($_GET['category_id'])){
    $category_id = $_GET['category_id'];
}

//Lấy tên của danh mục hiện thời
$query = "SELECT * FROM categories
          WHERE categoryID = $category_id";
$category = $db -> query($query);
$category = $category -> fetch();
$category_name = $category['categoryName'];
//Lấy tất cả danh mục
$query = "SELECT * FROM categories
          ORDER BY categoryID = $category_id";
$categories = $db -> query($query);

//Lấy tất cả các sản phẩm cho danh mục đã chọn
$query = "SELECT * FROM products
          WHERE categoryID =  $category_id
          ORDER BY productID";
$products = $db -> query($query);

?>

<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--the head section-->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<!--the body section-->
<body>
<div id="page">
    <div id="main">
        <h1>Product List</h1>
        <div id="sidebar">
            <!-- hiển thị liên kết cho tất cả danh mục sản phẩm -->
            <h2>Categories</h2>
            <ul class="nav" style="list-style-type: none">
                <?php foreach ($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div id="content" style="float: left">
            <!-- Hiển thị bảng sản phẩm-->
            <h2><?php echo $category_name; ?></h2>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th class="right">Price</th>
                </tr>
                <?php foreach($products as $product): ?>
                <tr>
                    <td><?php echo $product['productCode']; ?></td>
                    <td><?php echo $product['productName']; ?></td>
                    <td class="right"><?php echo $product['listPrice']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div><!--end main-->
    <div id="footer"></div>
</div><!-- end page-->
</body>
</html>
