<?php 
	include "menu.php";
	if (isset($_POST['id'])) { 
		$sql="SELECT * FROM hanghoa WHERE id=".$_POST['id'];
		$ketqua=mysqli_query($conn,$sql);
		$row1=mysqli_fetch_assoc($ketqua);	
	}			
		$ten=$_POST['tenhang'];
		$soluong=$_POST['soluong'];
		$dongia=$_POST['dongia'];
		$giamgia=$_POST['giamgia'];
		$iddanhmuc=$_POST['iddanhmuc'];
		$mota=$_POST['mota'];
		if($_POST['anh']!=''){
		
			$anh=$_POST['anh'];
		}
		else {
	
			$anh= str_replace("image/bg-images/","",$_POST['anh1']);
			
		}
		$id1=$_POST['id'];
		$sql1 = "UPDATE hanghoa SET tenhang='$ten',soluong='$soluong',dongia='$dongia',giamgia='$giamgia',anh='image/bg-images/$anh',iddanhmuc='$iddanhmuc',mota='$mota'WHERE id=".$id1;
		$ketqua=mysqli_query($conn,$sql1);		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xuly</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script > function load(){ location.replace("hanghoa.php") ;}  
     load();</script>
</head>
<body>

</body>
</html>