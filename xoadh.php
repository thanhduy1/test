<?php 
	$conn=mysqli_connect("localhost","root","","banhang");
		$sql="DELETE  FROM donhang WHERE idhoadon=".$_GET['id'];
		$ketqua=mysqli_query($conn,$sql);				
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script > function load(){ location.replace("donhang.php") ;}  
     load();</script>
</head>
<body>
</body>
</html>