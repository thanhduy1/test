<?php 
    require_once("connection.php");
    $totalMoney = $_GET["totalMoney"];
    $IDKH= $_SESSION["IDDonHang"];
    foreach($_SESSION['cart'] as $key =>$val){
        $today = date("Y-m-d H:i:s");  
        $soLuong = $val["soLuong"];
        $giaSanPham = $val["giaSanPham"];
        $query_insert_DonHangCT = "INSERT INTO tbl_donhang_chitiet (STT,IDDonHang,maSanPham,soLuong,tongTien,ngayDatHang) 
        Values ('', '$IDKH', '$key',' $soLuong','$giaSanPham','$today')";
        $result_insert_DonHangCT = mysqli_query($conn, $query_insert_DonHangCT);
    } 
    header("location:payment.php?totalMoney=$totalMoney");
    ?>