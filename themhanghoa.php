<?php include "menu.php" ?>
<?php 
	
	if (!isset($_SESSION['vt'])){
	    echo'
    <p style="color:red; text-align:center; font-size:40px"><b>Bạn không đủ quyền truy cập, hết :v</b></p>';
    exit();
	}
	else if(isset($_SESSION['vt'])){
	    
	if($_SESSION['vt']!="admin"){
	    echo'
    <b style="color:red; text-align:center; font-size:40px">Bạn không đủ quyền truy cập, hết :v</b>';
    exit();
	}
	}
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$tenhang=$_POST['tenhang'];$soluong=$_POST['soluong'];$dongia=$_POST['dongia'];$giamgia=$_POST['giamgia'];
		
		$iddanhmuc=$_POST['iddanhmuc'];
		$mota=$_POST['mota'];
		 //Bước 1: Tạo thư mục lưu file
    $error = array();
    $target_dir = "image/bg-images/";
    $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
    // Kiểm tra kiểu file hợp lệ
    $type_file = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
    $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
    if (!in_array(strtolower($type_file), $type_fileAllow)) {
        $error['fileUpload'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
    }
    //Kiểm tra kích thước file
    $size_file = $_FILES['fileUpload']['size'];
    if ($size_file > 5242880) {
        $error['fileUpload'] = "File bạn chọn không được quá 5MB";
    }

//
    if (empty($error)) {
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            echo "Bạn đã upload file thành công";
            $flag = true;
        } else {
            echo "File bạn vừa upload gặp sự cố";
        }
    }

    if (isset($flag) && $flag == true) {
        
    }
		$sql="INSERT INTO hanghoa(tenhang,soluong,dongia,iddanhmuc,anh,mota,giamgia) VALUES('$tenhang','$soluong','$dongia','$iddanhmuc','$target_file','$mota','$giamgia')";
		$ketqua=mysqli_query($conn,$sql);
		echo '<script>
		function load(){ 
			location.replace("hanghoa.php") ;}  
     	load();
		</script>';
		
}	

?>
<!DOCTYPE html>
<html>
<head>
	<title>thêm hàng hóa</title>
	
</head>
<body>

	</form>
	<div class="content-wrapper" style="min-height: 365px;">
        <div class="site-header d-none d-lg-block">
            
            
        </div>
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
			<div class="cart_area cart-area-padding  ">
				<div class="container" style="text-align:center">
					<div class="page-section-title">
						<h1>Thêm hàng hóa</h1>
					</div>
					<div class="row">
					<div class="col-12">
					<form id="product-form" method="POST" action="themhanghoa.php" enctype="multipart/form-data" >

                    <div class="clear-both"></div>
                    <div class="wrap-field">
					
                        <label>Tên sản phẩm: </label>
                        <input type="text" name="tenhang" >
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Số lượng: </label>
                        <input type="text" name="soluong" >
                        <div class="clear-both"></div>
                    </div>
					<div class="wrap-field">
                        <label>Đơn giá: </label>
                        <input type="text" name="dongia" >
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giảm giá: </label>
                        <input type="float" name="giamgia" >
                        <div class="clear-both"></div>
                    </div>
					<div class="wrap-field">
                        <label>Chọn ảnh : </label>
						
						<input type="file" name="fileUpload"  id="fileUpload" >

                        <div class="clear-both"></div>
                    </div>
					<div class="wrap-field">
                        <label>Danh mục: </label>
                        <select name="iddanhmuc" >
						<?php
						$sql="SELECT * FROM danhmuc";
					$ketqua=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($ketqua)){
					$sel='';
					if($row['id']==$row1['iddanhmuc']) $sel="  selected";
					echo '<option value="'.$row['id'].'"'.$sel.'>'.$row['tendanhmuc'].'</option>';
					}
					?>
					</select>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Mô tả: </label>
                        <textarea name="mota" id="product-content"></textarea>
                        <div class="clear-both"></div>
						<script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('product-content');
                </script>
                    </div>
					<br>
					<div class="wrap-field">
					<button class="btn btn-black" style="background-color:#007bff; color:white !important"><input type="submit" value="Lưu"/></button>
					</div>
					</form>
					</div>
					</div>
					</div>
					</div>
					</main>
					</div>
				

	<hr> 
	<?php include "footer.php" ?>
</body>
</html>