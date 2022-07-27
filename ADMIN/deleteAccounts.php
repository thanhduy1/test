<?php
    include("connection.php");

    $taiKhoan=$_GET['idtk'];

    $query_delete_taiKhoan = "DELETE FROM tbl_user where phoneUser = '$taiKhoan'";
    $result_delete_taiKhoan = $conn->query($query_delete_taiKhoan);
    header('location:pageAccounts.php');

    
?>