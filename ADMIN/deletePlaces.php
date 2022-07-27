<?php
    include("connection.php");

    $chiNhanh=$_GET['iddd'];

    $query_delete_diadiem = "DELETE FROM tbl_diadiem_chinhanh where maChiNhanh = '$chiNhanh'";
    $result_delete_diadiem = $conn->query($query_delete_diadiem);
    header('location:pagePlaces.php');  
?>