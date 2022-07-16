<?php 
	$conn=mysqli_connect("localhost","root","","banhang");
	if (isset($_GET['tendanhmuc'])) {
		$sql="INSERT INTO danhmuc(tendanhmuc,anh) VALUES('".$_GET['tendanhmuc']."','image/bg-images/".$_GET['anh']."')";
		$ketqua=mysqli_query($conn,$sql);
	}
				
				
?>
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.hasthemes.com/pustok-preview/pustok/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Nov 2020 14:58:10 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DNN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/bg-images/logo1.png">
    <script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</head>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            <?php include "menu.php" ?>
            
        </div>
    </div>
    <div class="cart-table table-responsive mb--40">
	
		<table class="table">
		<h1 >Thêm danh mục</h1>
        <thead>
											<tr>
												
												<th class="pro-thumbnail">Tên danh mục </th>
												<th class="pro-title">Tên thể loại</th>
												<th class="pro-price"> </th>
											
												
											</tr>
										</thead>
            <tbody>
        
		<form action="themdanhmuc.php" method="GET" >
			
			
		
                <tr>
					
					<td class="pro-thumbnail"><input type="text" name="tendanhmuc"></td>
					<td class="pro-title"><span><input type="file" id="myfile" name="anh"></span></td>
					<td class="pro-price"><input type="submit" value="Thêm danh mục"></td>
											
                </tr>
		</form>
</div>
            </body>
            </html>