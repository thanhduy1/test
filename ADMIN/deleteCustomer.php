<?php
    include("connection.php");

    $maKH=$_GET['idkh'];

    $query_delete_KhachHang = "DELETE FROM tbl_khachhang where maKH = '$maKH'";
    $result_delete_KhachHang = $conn->query($query_delete_KhachHang);
    header('location:pageCustomer.php');

    
?>