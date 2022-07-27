<?php
    include("connection.php");

    $maSanPham=$_GET['idth'];
    $query_delete_SanPham = "DELETE FROM tbl_sanpham where maSanPham = '$maSanPham'";
    $result_delete_SanPham = $conn->query($query_delete_SanPham);
    header('location:pageProducts.php');
?>