<?php
    session_start();
    
    $conn = mysqli_connect("localhost", "root", "","banhang");
    $date = getdate();
	$ngay=''.$date['year'].'-'.$date['mon'].'-'.$date['mday'].'';
    $ten= $_SESSION['ten'];
    $iduser=$_SESSION['id'];

    $noidung = $_POST['noidungbinhluan'];
    $id = $_POST['idsach'];


    $sql = "INSERT INTO binhluan (idsach, noidung, iduser, ten,ngay) VALUES ('$id', '$noidung', '$iduser','$ten','$ngay')";
    $ketquq = mysqli_query($conn, $sql);
?>
