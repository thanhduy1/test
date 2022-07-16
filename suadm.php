<?php 
	$conn=mysqli_connect("localhost","root","","banhang");
	$id1=0;
	if (isset($_GET['id'])) {
		$sql="SELECT * FROM danhmuc WHERE id=".$_GET['id'];
		$ketqua=mysqli_query($conn,$sql);
		$row1=mysqli_fetch_assoc($ketqua);
	}
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$ten=$_POST['tendanhmuc'];
		if($_POST['anh']!=''){
		
			$anh=$_POST['anh'];
		}
		else {
			$anh=$_POST['anh1'];
		}
		$id1=$_POST['id'];
		$sql = "UPDATE danhmuc SET tendanhmuc='$ten',anh='$anh' WHERE id=".$id1;
		$ketqua=mysqli_query($conn,$sql);	
	}				
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
	</script>
</head>
<body>
	<?php include('menu.php') ?>
	<h1>Sửa danh mục</h1>
	<form action="xuly.php" method="POST" >
		<input type="hidden" name="id" value="<?php echo $row1['id'];?>"><br>
		Tên danh mục: <input type="text" name="tendanhmuc" value="<?php echo $row1['tendanhmuc'];?>"><br>
		Link ảnh cũ : <input type="text" name="anh1" value="<?php echo $row1['anh']; ?>"><br>
		Link mới: <input type="file" id="myfile" name="anh" value="<?php echo $row1['anh'];?>">
		<input  type="submit" value="sửa"  >
	</form>
</body>
</html>