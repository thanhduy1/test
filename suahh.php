<?php 
	include "menu.php";
	if (isset($_GET['id'])) { 
		$sql="SELECT * FROM hanghoa WHERE id=".$_GET['id'];
		$ketqua=mysqli_query($conn,$sql);
		$row1=mysqli_fetch_assoc($ketqua);	
	}			
?>
<!DOCTYPE html>
<html>
<head>
	<title>SNN Shop</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/admin_style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootsdivapcdn.com/bootsdivap/4.5.2/js/bootsdivap.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
	
	
	<!-- <form action="xulyhh.php" medivod="POST" >
		
		<input type="hidden" name="id" value="<?php echo $row1['id'];?>"><br>
		Tên mặt hàng: <input type="text" name="tenhang" value="<?php echo $row1['tenhang'];?>"><br>
		Số lượng: <input type="text" name="soluong" value="<?php echo $row1['soluong'];?>"><br>
		Đơn giá: <input type="text" name="dongia" value="<?php echo $row1['dongia'];?>"><br>
		Giảm giá: <input type="text" name="giamgia" value="<?php echo $row1['giamgia'];?>"><br>
		Mô tả: <input type="text" name="mota" value="<?php echo $row1['mota'];?>"><br>
		Ảnh cũ : <?php echo '<img src="'.$row1['anh'].'">'; ?><br>
		Chọn ảnh mới: <input type="file" id="myfile" name="anh" value="<?php echo $row1['anh'];?>"><br>
		Danh mục: 
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
		</select> -->
 
		<!-- <input  type="submit" value="sửa"  > -->
	</form>
	<div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            
            
        </div>
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
			<div class="cart_area cart-area-padding  ">
				<div class="container">
					<div class="page-section-title">
						<h1>Sửa hàng hóa</h1>
					</div>
					<div class="row">
					<div class="col-12">
					<form id="product-form" method="POST" action="xulyhh.php" >

                    <div class="clear-both"></div>
                    <div class="wrap-field">
					<input type="hidden" name="id" value="<?php echo $row1['id'];?>"><br>
                        <label>Tên sản phẩm: </label>
                        <input type="text" name="tenhang" value="<?php echo $row1['tenhang'];?>">
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Số lượng: </label>
                        <input type="text" name="soluong" value="<?php echo $row1['soluong'];?>">
                        <div class="clear-both"></div>
                    </div>
					<div class="wrap-field">
                        <label>Đơn giá: </label>
                        <input type="text" name="dongia" value="<?php echo $row1['dongia'];?>">
                        <div class="clear-both"></div>
                    </div>
					<div class="wrap-field">
                        <label>Giảm giá: </label>
                        <input type="text" name="giamgia" value="<?php echo $row1['giamgia'];?>">
                        <div class="clear-both"></div>
                    </div>
					
                    <div class="wrap-field">
                        <label>Ảnh cũ: </label>
                        <div class="right-wrap-field">
						<input type="hidden" name="anh1" value="<?php echo $row1['anh']; ?>">
						<img src="<?php echo $row1['anh']?>">
                        </div>
                        <div class="clear-both"></div>
                    </div>
					<div class="wrap-field">
                        <label>Chọn ảnh mới: </label>
						
						<input type="file" id="myfile" name="anh" value=""><?php if (isset($_POST['anh'])){ $a= $_POST['anh']; echo '<img src="'.$a.'">';}?>
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
                        <textarea name="mota" id="product-content" value="<?php echo $row1['mota'];?>"><?php echo $row1['mota'];?></textarea>
                        <div class="clear-both"></div>
						<script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('product-content');
                </script>
                    </div>
					<button class="btn btn-black"><input type="submit" value="Lưu"/></button>
					</form>
					</div>
					</div>
					</div>
					</div>
					</main>
					</div>
										<!-- <tbody> -->
										
				<!-- <?php 
                    echo '<div>';
					echo'<input type="hidden" name="id" value="'.$row1['id'].'">';
					echo'<div class="#"><input type="text" name="tenhang" value="'.$row1['tenhang'].'" placeholder="'.$row1['tenhang'].'"></div>';
					echo'<div class="pro-divumbnail"><input type="text" name="soluong" value="'.$row1['soluong'].'"></div>';
					echo'<div class="pro-divumbnail"><input type="text" name="dongia" value="'.$row1['dongia'].'"></div>';
					echo'<div class="pro-divumbnail"><input type="text" name="giamgia" value="'.$row1['giamgia'].'"></div>';
					echo'<div class="pro-divumbnail"><input type="text" name="mota" value="'.$row1['mota'].'"></div>';
					echo'<div class="pro-title"><img src="'.$row1['anh'].'"></div>';
					echo'<div class="pro-title"><input type="file" id="myfile" name="anh" value="<img src="'.$row1['anh'].'">"></div>';
					echo'<div class="pro-divumbnail">
					<select name="iddanhmuc" >';
					
					$sql="SELECT * FROM danhmuc";
					$ketqua=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($ketqua)){
					$sel='';
					if($row['id']==$row1['iddanhmuc']) $sel="  selected";
					echo '<option value="'.$row['id'].'"'.$sel.'>'.$row['tendanhmuc'].'</option>';
					}

					?>
					<?php
					echo '
					</select>
					</div>';
					
					
					echo'</div><input  type="submit" value="sửa"  >';
									
					
					
				
			?>
</tbody>
									</table>
									
								</div>
							
						</div>
					</div>
				</div>
			</div>

</main> -->
<!-- 		
</div>
<div class="main-content">
        <h1>Thêm sản phẩm</h1>
        <div id="content-box">
            
                <div class = "container">
                    
                    <a href = "hanghoa.php">Quay lại danh sách sản phẩm</a>
                </div>
            
                <form id="product-form" method="POST" action="?action=add"  enctype="multipart/form-data">
                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên sản phẩm: </label>
                        <input type="text" name="name" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá sản phẩm: </label>
                        <input type="text" name="price" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ảnh đại diện: </label>
                        <div class="right-wrap-field">
                            <input type="file" name="image" />
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    
                    <div class="wrap-field">
                        <label>Nội dung: </label>
                        <textarea name="content" id="product-content"></textarea>
                        <div class="clear-both"></div>
                    </div>
                </form>
                <div class="clear-both"></div>
                <script>
                   
                    CKEDITOR.replace('product-content');
                </script>
         
        </div>
    </div> -->

</body>
</html>