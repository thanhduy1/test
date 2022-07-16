<?php 
   include ("menu.php");
	$conn=mysqli_connect("localhost","root","","banhang");
	$date = getdate();
	$ngay=''.$date['year'].'-'.$date['mon'].'-'.$date['mday'].'';	
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$t=$_SESSION['ten'];
		$sql1= "SELECT id FROM taikhoan WHERE tendn='$t'";
		$result = mysqli_query($conn, $sql1);
		while ($row = mysqli_fetch_assoc($result)) {
		$idkhachhang= $row['id'];
		}
		$ten=$_POST['ten'];
	$sdt=$_POST['sdt'];
	$diachi=$_POST['diachi'];
	$ghichu=$_POST['ghichu'];
	$sql="INSERT INTO donhang(idkhachhang,ngay,ten,sdt,diachi,ghichu) VALUES('$idkhachhang','$ngay','$ten','$sdt','$diachi','$ghichu')";
	$ketqua=mysqli_query($conn,$sql);
		
	
	// $sql_idcuoi="select MAX(id) as iddh from donhang ";
	// $query_idcuoi=mysqli_query($connect,$sql_idcuoi);
	// $row_idcuoi=mysqli_fetch_assoc($query_idcuoi);
	$row_idcuoi=mysqli_insert_id($conn);
	$str=$_POST['idsp'];
	$sql1="select * from hanghoa where id in ($str)";
	$query1=mysqli_query($conn,$sql1);
	$_SESSION['dem']=0;
	 while($row1=mysqli_fetch_assoc($query1)){
	 	if(isset($_SESSION['cart'][$row1['id']][$_SESSION['ten']])){
	 		$sql2="INSERT INTO chitiethoadon(idhd,idsanpham,soluong,dongia) values(".$row_idcuoi.",".$row1['id'].",".($_SESSION['cart'][$row1['id']][$_SESSION['ten']]).",".($_SESSION['cart'][$row1['id']][$_SESSION['ten']]*$row1['dongia']).")";
			$query2=mysqli_query($conn,$sql2);
			$sl=$row1['soluong']-$_SESSION['cart'][$row1['id']][$_SESSION['ten']];
			$sql3 = "UPDATE hanghoa SET soluong=$sl WHERE id=".$row1['id'];
		$query3=mysqli_query($conn,$sql3);	
		unset($_SESSION['cart'][$row1['id']][$_SESSION['ten']]);
		}
		}
		
	
}		
?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.hasthemes.com/pustok-preview/pustok/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Nov 2020 14:58:10 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>W2Wibu - Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    <script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</head>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            
           
        </div>
	</div>
	<div class="col-sm-12 form-group" style="margin-top: 90px;margin-right:50px; text-align:center">
	<h1>Đặt hàng thành công</h1>
</div>