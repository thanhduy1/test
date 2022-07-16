<?php include "menu.php" ?>
<!DOCTYPE html>

<html lang="zxx">

<body>
	<div class="site-wrapper" id="top">
		<div class="site-header d-none d-lg-block">
		</div>
		<section class="breadcrumb-section">
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
							<li class="breadcrumb-item active">Giỏ hàng</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
			<div class="cart_area cart-area-padding  ">
				<div class="container">
					<div class="page-section-title">
						<h1>Giỏ hàng</h1>
					</div>
					<div class="row">
						<div class="col-12">
								<div class="cart-table table-responsive mb--40">
									<table class="table">
										<!-- Head Row -->
										<thead>
											<tr>
												<th class="pro-remove"></th>
												<th class="pro-thumbnail">Ảnh</th>
												<th class="pro-title">Tên sản phẩm</th>
												<th class="pro-price">Đơn giá</th>
												<th class="pro-quantity">Số lượng</th>
												<th class="pro-subtotal">Tổng tiền</th>
											</tr>
										</thead>
										<tbody>
									<?php
										if(isset($_POST['submit'])){
											foreach($_POST['qty'] as $key=>$value){
												if( ($value == 0) and (is_numeric($value))){
													unset ($_SESSION['cart'][$key][$_SESSION['ten']]);
													$_SESSION['dem']--;
												}
												else if(($value > 0) and (is_numeric($value))){
													$_SESSION['cart'][$key][$_SESSION['ten']]=$value;
												}
											}
											
										}
										?>
    								<?php
   										$ok=1;
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $k => $v){
												if(isset($k)){
													$ok=2;
												}
											}
										}
										if($ok == 2){
											$total=0;
											echo "<form action='cart.php' method='post'>";
											foreach($_SESSION['cart'] as $key=>$value){
											$item[]=$key;
										}
										$str=implode(",",$item);
										
										$sql="select * from hanghoa";
										$query=mysqli_query($conn,$sql);
										if (!$query) {
                                        printf("Error: %s\n", mysqli_error($conn));
                                        exit();
                                        }
										while($row=mysqli_fetch_array($query)){
											
										if(isset($_SESSION['cart'][$row['id']][$_SESSION['ten']])){
											
											$kqkm= $row['dongia']-$row['dongia']*$row['giamgia'] ;
                    						$giamgia= $row['giamgia']*100;
											$total+=$_SESSION['cart'][$row['id']][$_SESSION['ten']]*$row['dongia'];
										echo '<tr>';
												echo'<td class="pro-remove"><a href="delcart.php?productid='.$row['id'].'"><i class="far fa-trash-alt"></i></a>
												</td>';
												echo'<td class="pro-thumbnail"><a href="#"><img
															src="'.$row['anh'].'" alt="Product"></a></td>';
												echo'<td class="pro-title"><a href="chitietsp.php?id='.$row['id'].'">'.$row['tenhang'].'</a></td>';
												echo'<td class="pro-price"><span>'.number_format($kqkm).'đ</span><del class="price-old">'.number_format($row['dongia']).'đ</del></td>';
												echo'<td class="pro-quantity">													
														<input type="integer" name ="qty['.$row['id'].']" size="5" value="'.($_SESSION['cart'][$row['id']][$_SESSION['ten']]).'">															
												</td>';
												echo'<td class="pro-subtotal"><span>'.number_format($_SESSION['cart'][$row['id']][$_SESSION['ten']]*$kqkm).'đ</td>';
												
												echo'</tr>';
										}
										
									}										
											echo'
											<tr>';
												echo'<td colspan="6" class="actions">
														<input  type="submit" class="btn btn-outlined" style="background-color:#64a3f5"  name="submit" value="UPDATE"> 
														<button  class="btn btn-outlined" style="background-color:#64a3f5;" value="Mua Tiếp"><a href="index.php">Mua tiếp<a></button>
														<button  class="btn btn-outlined"style="background-color:#64a3f5;"  value="Thanh toán"><a href="checkout.php?idsp='.$str.'">Đặt hàng<a></button>									
												</td>';
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
	</div>
</div>
	
</body>

</html>