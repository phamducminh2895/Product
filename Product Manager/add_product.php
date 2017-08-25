<?php
//lấy dữ liệu về sản phẩm
$category_id = $_POST['category_id'];
$code = $_POST['code'];
$name = $_POST['name'];
$price = $_POST['price'];
//Kiểm tra tính hợp lệ của dữ liệu
if(empty($code) || empty($name) || empty($price) ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
}else{
        //nếu hợp lệ, thêm sản phẩm vào cơ sở dữ liệu
        require_once('database.php');
        $query = "INSERT INTO products
                   (categoryID, productCode, productName, listPrice)
                   VALUES
                   ('$category_id', '$code', '$name', '$price')";
        $db->exec($query);
        //hiển thị trang Product List
        include('index.php');
    }
?>