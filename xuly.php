<?php 
	$conn=mysqli_connect("localhost","root","","banhang");
		$ten=$_POST['tendanhmuc'];
		if($_POST['anh']!=''){
		
			$anh=$_POST['anh'];
		}
		else {
			$anh=$_POST['anh1'];
		}
		$id1=$_POST['id'];
		$sql = "UPDATE danhmuc SET tendanhmuc='$ten',anh='image/bg-images/$anh' WHERE id=".$id1;
		$ketqua=mysqli_query($conn,$sql);
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xuly</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
	<script > function load(){ location.replace("danhmuc.php") ;}  
     load();</script>
</head>
<body>
	<?php include("menu.php") ?>
	<h1>Sửa thành công</h1>
</body>
</html>