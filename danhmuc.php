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
		
		
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active">Cart</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!-- Cart Page Start -->
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
			<div class="cart_area cart-area-padding  ">
				<div class="container">
					<div class="page-section-title">
						<h1>Xem Danh Mục</h1>
					</div>
					<div class="row">
						<div class="col-12">
							
								<!-- Cart Table -->
								<div class="cart-table table-responsive mb--40">
									<table class="table">
										<!-- Head Row -->
										<thead>
											<tr>
												
												<th class="pro-thumbnail">Tên danh mục</th>
												<th class="pro-thumbnail">Ảnh</th>
												<th class="pro-price">Xóa danh mục</th>
												<th class="pro-quantity">Sủa danh mục</th>
												
											</tr>
										</thead>
										<tbody>
				<?php 
				$conn=mysqli_connect("localhost","root","","banhang");
				$sql="SELECT * FROM danhmuc";
				$ketqua=mysqli_query($conn,$sql);
				$stt=1;
				
				while ($row = mysqli_fetch_assoc($ketqua)) {
                    echo '<tr>';
												echo'<td class="pro-thumbnail"><a href="hanghoa.php?iddanhmuc='.$row['id'].'" >'.$row['tendanhmuc'].'</a>
												</td>';
												echo'<td class="pro-thumbnail"><a href="#"><img
															src="'.$row['anh'].'" alt="Product"></a></td>';
												echo'<td class="pro-price"><span class="price"><a href="xoadm.php?id='.$row['id'].'" >Xóa</a></span></td>';
												echo'<td class="pro-quantity"> <span class="price"><a href="suadm.php?id='.$row['id'].'" >Sửa</a></span></td>';
												
												echo'</tr>';
										
                    
					
				}
			?>
</tbody>
									</table>
									
								</div>
							
						</div>
					</div>
				</div>
			</div>
			
		</main>
		<!-- Cart Page End -->
	</div>
</div>
            </body>
            </html>