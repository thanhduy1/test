<?php
include('menu.php');
?>

<title> DNN Shop</title>
<body>

<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Checkout Form s-->
				<div class="checkout-form">
                <form action="hoadon.php" method="POST" >
					<div class="row row-40">
						<div class="col-12">
							<h1 class="quick-title">Vui lòng điền thông tin</h1>
							<!-- Slide Down Trigger  -->
							
							
							
                        </div>
                        
						<div class="col-lg-7 mb--20">
                        
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40">
										<h4 class="checkout-title">Thông tin</h4>
										<div class="row">
											<div class="col-md-6 col-12 mb--20">
										<label>Họ và tên*</label>
										<input type="text" name="ten" placeholder="Họ và tên" required>
									</div>
									
									<div class="col-md-6 col-12 mb--20">
										<label>Số điện thoại*</label>
										<input type="text" name="sdt" placeholder="Số điện thoại" required>
									</div>
									
									<div class="col-12 mb--20">
										<label>Địa chỉ*</label>
										<input type="text" name= "diachi" placeholder="Địa chỉ" required>
                                </div>
									
										</div>
									</div>
							<!-- Shipping Address -->
							<div id="shipping-form" class="mb--40">
								<h4 class="checkout-title">Chi tiết hóa đơn</h4>
								<div class="row">
									
									
                                    
                            </div>
                                </div>
                                
							<div class="order-note-block mt--30">
								<label for="order-note">Ghi chú</label>
								<textarea id="order-note" name= "ghichu" cols="30" rows="10" class="order-note"
									placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: lưu ý đặc biệt khi giao hàng"></textarea>
							</div>
                        </div>
                               
                        <?php
                        echo'
						<div class="col-lg-5">
							<div class="row">
								<!-- Cart Total -->
								<div class="col-12">
									<div class="checkout-cart-total">
										<h2 class="checkout-title">HÓA ĐƠN</h2>
                                        <h4>Tên sản phẩm <span style="text-align: center">Đơn giá</span></h4>';
                                        
                                        
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
						                if (!$query ) {
    										printf("Error: %s\n", mysqli_error($conn));
    										exit();
										}
										while($row=mysqli_fetch_array($query)){
											
										if(isset($_SESSION['cart'][$row['id']][$_SESSION['ten']])){
											
											$kqkm= $row['dongia']-$row['dongia']*$row['giamgia'] ;
											$giamgia= $row['giamgia']*100;
											$_SESSION['soluong']=$_SESSION['cart'][$row['id']][$_SESSION['ten']];
                                            $total+=$_SESSION['cart'][$row['id']][$_SESSION['ten']]*$row['dongia'];
											
                                            echo'
										<ul>
											<li><span class="left">'.$row['tenhang'].' x '.($_SESSION['cart'][$row['id']][$_SESSION['ten']]).'</span> <span
													class="right">'.number_format($kqkm).'đ</span><del class="price-old">'.number_format($row['dongia']).'đ</del>
													</span></li>
											<li><input type="hidden" value="'.$str.'" name="idsp">
										<h4>Số tiền <span>'.number_format($_SESSION['cart'][$row['id']][$_SESSION['ten']]*$kqkm).'đ</span></h4></li>
                                        
                                        </ul>
                                        
									
                                        </form>
                                        	
                                        ';
										}
										


									}
									
	
                                }
                                        echo'
                                       
										<div class="term-block">
											
										</div>
										
										<button class="place-order w-100" type="submit" name="submit">Thanh toán</button>
									</div>
								</div>
							</div>
						</div>
                    </div>';
                    ?>
                    </form>
				</div>
			</div>
		</div>
	</div>
</main>
</body>