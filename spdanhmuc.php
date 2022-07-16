<!DOCTYPE html>
<html>
<head>
	<title>Thịnh hành</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  	 article:hover {
          box-shadow: 0 0 15px ;
          border-radius: 10px;
        }
        
  </style>
</head>
<body>
<div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            <?php include "menu.php" ?>
           
            </div>
		</div>
		<?php
        $conn=mysqli_connect("localhost","root","","banhang");
				if (isset($_GET['iddanhmuc'])) {
                
					$iddanhmuc=$_GET['iddanhmuc'];
					
				$sql1="SELECT * FROM danhmuc WHERE id='$iddanhmuc'";
				
				$ketqua1=mysqli_query($conn,$sql1);
				$row1 = mysqli_fetch_assoc($ketqua1);
				echo '<div ><p style="font-size: 30px;color: red;text-align:center"> <b> '.$row1['tendanhmuc'].' </b> </p></div>';
				}
        ?>
               <section class="section-padding" >
            <h2 class="sr-only">Home Tab Slider Section</h2>
            <div class="container" style="margin-top:70px">
                <div class="sb-custom-tab">
                   
                    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                                data-slick-setting='{
                            
                            "autoplaySpeed": 500,
                            "slidesToShow": 5,
                            "rows":2
                            
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                <?php 
                
                
                // PHẦN XỬ LÝ PHP
                $conn = mysqli_connect("localhost", "root" ,"", "banhang");
         
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(id) as total from hanghoa');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
         
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
         
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
         
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
         
        // Tìm Start
        $start = ($current_page - 1) * $limit;
         
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        
                
				
				
				
				
				$conn=mysqli_connect("localhost","root","","banhang");
				if (isset($_GET['iddanhmuc'])) {
                
					$iddanhmuc=$_GET['iddanhmuc'];
				$sql="SELECT * FROM hanghoa WHERE iddanhmuc='$iddanhmuc' LIMIT $start, $limit ";	
				$sql1="SELECT * FROM danhmuc WHERE id='$iddanhmuc'";
				$ketqua=mysqli_query($conn,$sql);
				$ketqua1=mysqli_query($conn,$sql1);
				$row1 = mysqli_fetch_assoc($ketqua1);
				
				}
				else{
					$sql="SELECT * FROM hanghoa WHERE soluong<'30' ORDER BY soluong";
					$ketqua=mysqli_query($conn,$sql);
				}
				
				while ($row = mysqli_fetch_assoc($ketqua)) {
					
					$kqkm= $row['dongia']-$row['dongia']*$row['giamgia'] ;
                    $giamgia= $row['giamgia']*100;
					echo '<div class="single-slide">
					
                                    <div class="product-card">
                                        <div class="product-header">
                                            
                                            <h3><a href="chitietsp.php?id='.$row['id'].'">'.$row['tenhang'].'</a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <img src="'.$row['anh'].'" alt="">
                                                <div class="hover-contents">
                                                    <a href="chitietsp.php?id='.$row['id'].'" class="hover-image">
                                                        <img src="'.$row['anh'].'"  alt="">
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">'.$kqkm.'</span>
												
                                                <del class="price-old">'.$row['dongia'].'</del>
                                                <span class="price-discount">'.$giamgia.'%</span>
                                            </div>
                                        </div>
                                    </div>
                                
							</div>';				}
				
			?>
			</div>
            <div class="container">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
			if ($current_page > 1 && $total_page > 1){
    echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
}
 
// Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page){
        echo '<span>'.$i.'</span> | ';
    }
    else{
        echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
    }
}
 
// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
if ($current_page < $total_page && $total_page > 1){
    echo '<a href="index.php?page='.($current_page+1).'">Next</a> | ';
}
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php include "footer.php" ?>
    

</body>
</html>