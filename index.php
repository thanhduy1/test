
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DNN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/css.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/bg-images/logo1.png">
    
</head>

<body>

    <div class="site-wrapper" id="top">
       
            <?php include "menu.php" ?>
           
            </div>
        
        <section class="hero-area hero-slider-1">
            <div class="sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "fade": true,
                            "autoplaySpeed": 3000,
                            "speed": 3000,
                            "slidesToShow": 1,
                            "dots":true
                            }'>
				 <div class="single-slide bg-ghost-white">
                    <div class="container">
                        <div class="home-content text-center text-sm-left position-relative">
                        <img src="image/bg-images/nengiay.jpg" width="1600px" height="600px" alt="">
                           
                        </div>
                    </div>
                </div>
               
            </div>
        </section>
        
        <section class="mb--30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="text">
                                <h5>Free Ship nội thành Trà Vinh</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-redo-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Đảm bảo hoàn tiền</h5>
                                <p>hoàn tiền 100%</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-piggy-bank"></i>
                            </div>
                            <div class="text">
                                <h5>Thanh toán khi giao hàng</h5>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-life-ring"></i>
                            </div>
                            <div class="text">
                                <h5>Số điện thoại hỗ trợ</h5>
                                <p>0966472620</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-margin">
            <h2 class="sr-only">Promotion Section</h2>
            <div class="container">
                <div class="row space-db--30">
                    <div class="col-lg-6 col-md-6 mb--30">
                    <img src="image/bg-images/nengiay1.jpg" width="600px" height="300px" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 mb--30">
                    <img src="image/bg-images/nengiay2.jpg" width="600px" height="300px" alt="">
                        </a>
                    </div>
                    

                </div>
            </div>
        </section>
        
        <section class="section-padding">
            <h2 class="sr-only">Home Tab Slider Section</h2>
            <div class="container">
                <div class="sb-custom-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab"
                                aria-controls="shop" aria-selected="true">
                                Sản phẩm mới nhất
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                        
                    </ul>
                    
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
                // $conn = mysqli_connect("localhost", "root" ,"", "banhang"); : đã include menu.php
         
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
        $result = mysqli_query($conn, "SELECT * FROM hanghoa  Order By id DESC LIMIT $start, $limit");
                
				
				while ($row = mysqli_fetch_assoc($result)) {
                    $kqkm= $row['dongia']-$row['dongia']*$row['giamgia'] ;
                    $giamgia= $row['giamgia']*100;
					echo '<div class="single-slide" >
                                    <div class="product-card" style="margin-left:10px">
                                        <div class="product-header">
                                            
                                            <h3><a href="chitietsp.php?id='.$row['id'].'">'.$row['tenhang'].'</a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image" style="margin-left:10px">
                                                <img src="'.$row['anh'].'" alt="">
                                                <div class="hover-contents" >
                                                    <a href="chitietsp.php?id='.$row['id'].'" class="hover-image" >
                                                        <img src="'.$row['anh'].'" alt="">
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">'.number_format($kqkm).'VNĐ</span>
												
                                                <del class="price-old">'.number_format($row['dongia']).'VNĐ</del>
                                                <span class="price-discount">'.$giamgia.'%</span>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>';
				}
            ?>
            </div>
            <br><br>
            <div class="container">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
			if ($current_page > 1 && $total_page > 1){
    echo '<a  class="btn btn-black" href="index.php?page='.($current_page-1).'">Prev</a> | ';
}
 
// Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page){
        echo '<span  class="btn btn-black">'.$i.'</span> | ';
    }
    else{
        echo '<a  class="btn btn-black" href="index.php?page='.$i.'">'.$i.'</a> | ';
    }
}
 
// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
if ($current_page < $total_page && $total_page > 1){
    echo '<a  class="btn btn-black" href="index.php?page='.($current_page+1).'">Next</a> | ';
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