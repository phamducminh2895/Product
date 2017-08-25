<?php
//Lấy đi định danh
$product_id = $_POST['product_id'];
$category_id = $_POST['category_id'];
//Xóa sản phẩm khỏi cơ sở dữ liệu
require_once ('database.php');
$query = "DELETE FROM products
          WHERE productID = '$product_id'";
$db -> exec($query);
//Hiển thị trang Product List
include ('index.php');
?>