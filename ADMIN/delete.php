<?php
    include("connection.php");

    $maSanPham=$_GET['idth'];
    $query_delete_sanPham = "DELETE FROM tbl_sanpham where maSanPham = '$maSanPham'";
    $result_delete_sanPham = $conn->query($query_delete_sanPham);
    header('location:pageProducts.php');


?>