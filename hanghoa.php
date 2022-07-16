<?php include "menu.php" ?>
<!DOCTYPE html>
<html lang="zxx">



<head>
    <meta charset="utf-s8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DNN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</head>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            
            
        </div>
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
			<div class="cart_area cart-area-padding  ">
				<div class="container">
					<div class="page-section-title">
						<h1>Danh sách hàng hóa</h1>
					</div>
					<div class="row">
						<div class="col-12">
							
								
								<div class="cart-table table-responsive mb--40">
									<table class="table">
										
										<thead>
											<tr>
												
												<th class="pro-thumbnail">ID</th>
												<th class="pro-thumbnail">Tên</th>
												<th class="pro-thumbnail">Số lượng</th>
												<th class="pro-thumbnail">Đơn giá</th>
												<th class="pro-thumbnail">Giảm giá</th>
												<th class="pro-thumbnail">Danh mục</th>
												<th class="pro-title">Hình ảnh</th>
												<th class="pro-thumbnail">Sửa</th>
												<th class="pro-thumbnail">Xóa</th>
												
											</tr>
										</thead>
										<tbody>
				<?php 
				
				if (isset($_GET['iddanhmuc'])) {
					$stt=1;
					$result = mysqli_query($conn, 'select count(id) as total from hanghoa');
					$row = mysqli_fetch_assoc($result);
					$total_records = $row['total'];
			 
					$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
					$limit = 10;
					$total_page = ceil($total_records / $limit);
		   
					   if ($current_page > $total_page){
						   $current_page = $total_page;
					}
					else if ($current_page < 1){
						$current_page = 1;
					}
			 
			
					$start = ($current_page - 1) * $limit;
				$sql="SELECT * FROM hanghoa Order By id DESC LIMIT $start, $limit WHERE iddanhmuc=".$_GET['iddanhmuc'];
				$ketqua=mysqli_query($conn,$sql);
				
				}
				else{
					$stt=1;
					$result = mysqli_query($conn, 'select count(id) as total from hanghoa');
					$row = mysqli_fetch_assoc($result);
					$total_records = $row['total'];
			 
					$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
					$limit = 10;
					$total_page = ceil($total_records / $limit);
		   
					   if ($current_page > $total_page){
						   $current_page = $total_page;
					}
					else if ($current_page < 1){
						$current_page = 1;
					}
			 
			
					$start = ($current_page - 1) * $limit;
					$sql="SELECT * FROM hanghoa Order By id DESC LIMIT $start, $limit";
					$ketqua=mysqli_query($conn,$sql);
                }
                
				while ($row = mysqli_fetch_assoc($ketqua)) {

					$sql1="SELECT tendanhmuc FROM danhmuc WHERE id =".$row['iddanhmuc'];
					$kq= mysqli_query($conn,$sql1);
					$giamgia= $row['giamgia']*100;
                    echo '<tr>';
					echo'<td class="pro-price">'.$row['id'].'</td>';
					echo'<td class="pro-thumbnail"><a href="chitietsp.php?id='.$row['id'].'" ><b style="font-size: 24px">'.$row['tenhang'].'</b></a></td>';
					echo'<td class="pro-thumbnail">'.$row['soluong'].'</a></td>';
					echo'<td class="pro-thumbnail">'.number_format($row['dongia']).'VNĐ</td>';
					echo'<td class="pro-thumbnail">'.$giamgia.'%</td>';
					while ($row1 = mysqli_fetch_assoc($kq)){
					echo'<td class="pro-thumbnail"><a href="danhmuc.php?tendanhmuc='.$row1['tendanhmuc'].'" >'.$row1['tendanhmuc'].'</a></td>';
					}
					echo'<td class="pro-title"><img src="'.$row['anh'].'" height="150px"></td>';
					echo'<td class="pro-thumbnail"><a href="suahh.php?id='.$row['id'].'">Sửa</a></td>';
					echo'<td class="pro-thumbnail"><a href="xoahh.php?id='.$row['id'].'">Xóa</a></td>';
					
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
	<div style="text-align:center">
		<div class="container" >

        <?php 

			if ($current_page > 1 && $total_page > 1){
    		echo '<a  class="btn btn-black" href="hanghoa.php?page='.($current_page-1).'">Prev</a> | ';
			}

			for ($i = 1; $i <= $total_page; $i++){
    			if ($i == $current_page){
        			echo '<span  class="btn btn-black">'.$i.'</span> | ';
    		}
    			else{
       				echo '<a  class="btn btn-black" href="hanghoa.php?page='.$i.'">'.$i.'</a> | ';
    			}
			}
			if ($current_page < $total_page && $total_page > 1){
    			echo '<a  class="btn btn-black" href="hanghoa.php?page='.($current_page+1).'">Next</a> | ';
			}
        ?>
	</div>
	</div>
</main>
		
</div>

</body>
</html>

        
        
