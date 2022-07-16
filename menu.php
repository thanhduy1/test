<?php
        session_start(); 
?>
<!DOCTYPE html>
<html lang="zxx">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DNN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/admin_style.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/bg-images/logo1.png">
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
$('.floating-chat').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</head>

<body>
    <?php $conn=mysqli_connect("localhost","root","","banhang"); ?>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            <div class="header-middle pt--10 pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 ">
                            <a href="index.php" class="site-brand">
                                <img src="image/bg-images/logo1.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-2" >
                            <div class="header-phone ">
                                <div class="icon">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="text">
                                    <p>Hỗ trợ tư vấn 24/7</p>
                                    <p class="font-weight-bold number">0966472620</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8" >
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right ">
                                    <?php  
                                    if(isset($_SESSION['vt'])){
                                        if ($_SESSION['vt']=="khach"){
                                        echo'
                                        <li class="menu-item"><a href="chitietdonhang.php">Đơn hàng</a></li>';}
                                    if($_SESSION['vt']=="admin"){
           
                                    echo '
                                        
                                        <li class="menu-item"><a href="donhang.php">Đơn hàng</a></li>
                                        <li class="menu-item has-children"><a href="#" >Danh mục</a>
					                        <ul class="sub-menu">
        			                            <li><a href="danhmuc.php">Xem danh mục</a></li>
        			                            <li><a href="themdanhmuc.php">Thêm danh mục</a></li>
					                        </ul>
				                        </li>
                                        <li class="menu-item has-children"><a href="#" >Hàng hóa</a>
					                        <ul class="sub-menu">
        			                            <li><a href="hanghoa.php">Xem hàng hóa</a></li>
        			                            <li><a href="themhanghoa.php">Thêm hàng hóa</a></li>
					                        </ul>
				                        </li>
                                        <li class="menu-item"><a href="khachhang.php">Khách hàng</a></li>
                                    ';}
                                    }
                                    else {
                                    }
                                    ?>
                                    <?php
                                    if (isset($_SESSION['ten'])) {
                                        echo'
                                        <li class="menu-item">
                                        <a href="dangxuat.php"><span style="text-transform: capitalize;">Đăng xuất</span></a>
                                    </li>';
                                    }
                                    else{
                                        echo'
                                        <li class="menu-item">
                                        <a href="login.php"><span style="text-transform: capitalize;">Đăng nhập</span></a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="register.php"><span style="text-transform: capitalize;">Đăng ký</span></a>
                                    </li>';
                                    }
                                    ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                        class="fa fa-bars"></i> Danh mục</a>
                                        <ul class="category-menu">
                                        
                                    <?php   
                                            
                                            mysqli_select_db($conn,"banhang");
				                            $sql="SELECT * FROM danhmuc";
				                            $ketqua=mysqli_query($conn,$sql);
                                            $stt=1;
                                            while($row=mysqli_fetch_array($ketqua)){
                                        echo '
                                        <li class="cat-item">
                                        
                                        <a class="single-block" href="spdanhmuc.php?iddanhmuc='.$row['id'].'" >'.$row['tendanhmuc'].'</a>
                                            
                                        </li>
                                        ';
                                            }
                                            ?>
                                        </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-5">
                            <div class="header-search-block">
								<form action="search.php" method="GET">
             					<input type="text" name="search" placeholder="Nhập vào từ khóa sản phẩm bạn tìm">
									<button  type="submit" name="ok">Search</button>
								</form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    <div class="login-block">
                                    <?php
       		                            if (isset($_SESSION['ten'])) {
          		                        echo '<div class="cart-product">
                                          <p> Chào mừng&nbsp;:&ensp; <h5 style="color:red">'.$_SESSION['ten'].'</h5></p>
                                          </div>';
          
                                        }
                                    ?>
                                        
                                    </div>
                                    <div class="cart-block">
                                        <div class="cart-total">
                                           
                                            <a  href="cart.php" class="text-item">
                                                GIỎ HÀNG
                                    </a>
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="sticky-init fixed-header common-sticky">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <a href=" index.php" class="site-brand">
                            <img src="image/bg-images/logo1.png" alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-8">
                        <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right ">
                               
                                <?php
                                if (isset($_SESSION['ten'])) {
                                    echo'
                                    <li class="menu-item">
                                    <a href="dangxuat.php"><span style="text-transform: capitalize;">Đăng xuất</span></a>
                                </li>';
                                }
                                else{
                                    echo'
                                    <li class="menu-item">
                                    <a href="login.php"><span style="text-transform: capitalize;">Đăng nhập</span></a>
                                </li>
                                <li class="menu-item">
                                    <a href="register.php"><span style="text-transform: capitalize;">Đăng ký</span></a>
                                </li>';
                                }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-mobile-menu">
            <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                <div class="container">
                    <div class="row align-items-sm-end align-items-center">
                        <div class="col-md-4 col-7">
                        <a href="index.php" class="site-brand">
                                <img src="image/bg-images/cat.png" alt="">
                        </a>
                        </div>
                        <div class="col-md-5 order-3 order-md-2">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars">
                                            </i>Danh mục</a>
                                        <ul class="category-menu">
                                    <?php 
				                            
				                            $sql="SELECT * FROM danhmuc";
				                            $ketqua=mysqli_query($conn,$sql);
                                            $stt=1;
                                            while($row=mysqli_fetch_array($ketqua)){
                                        echo '
                                        <li class="cat-item  has-children">
                                        
                                        <a class="single-block" href="spdanhmuc.php?iddanhmuc='.$row['id'].'" >'.$row['tendanhmuc'].'</a>
                                            
                                        </li>
                                        ';
                                            }
                                            ?>
                                            
                                        </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <li class="sin-link">
                                        <a href="cart.php" class="cart-link link-icon"><i class="ion-bag"></i></a>
                                    </li>
                                    <li class="sin-link">
                                        <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                                class="ion-navicon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="off-canvas-wrapper">
                <div class="btn-close-off-canvas">
                    <i class="ion-android-close"></i>
                </div>
                <div class="off-canvas-inner">
                    <div class="search-box offcanvas">
                        <form action="search.php" method="GET">
             					<input type="text" name="search" placeholder="Bạn nhập từ khoá ">
                                 <button  class="search-btn" type="submit" name="ok"><i class="ion-ios-search-strong"></i></button>
						</form>
                    </div>
                    <div class="mobile-navigation">
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu main-mobile-menu">
                            <?php  
                                    if(isset($_SESSION['vt'])){
                                    if($_SESSION['vt']=="admin"){
           
                                    echo '
                                        <li class="menu-item"><a href="donhang.php">Đơn hàng</a></li>
                                        <li class="menu-item has-children"><a href="#" >Danh mục</a>
					                        <ul class="sub-menu">
        			                            <li><a href="danhmuc.php">Xem danh mục</a></li>
        			                            <li><a href="themdanhmuc.php">Thêm danh mục</a></li>
					                        </ul>
				                        </li>
                                        <li class="menu-item has-children"><a href="#" >Hàng hóa</a>
					                        <ul class="sub-menu">
        			                            <li><a href="hanghoa.php">Xem hàng hóa</a></li>
        			                            <li><a href="themhanghoa.php">Thêm hàng hóa</a></li>
					                        </ul>
				                        </li>
                                        <li class="menu-item"><a href="khachhang.php">Khách hàng</a></li>
                                    ';}
                                    }
                                    else {
                                    }
                                    ?>
                                    <?php
                                    if (isset($_SESSION['ten'])) {
                                        echo'
                                        <li class="menu-item">
                                        <a href="dangxuat.php"><span style="text-transform: capitalize;">Đăng xuất</span></a>
                                    </li>';
                                    }
                                    else{
                                        echo'
                                        <li class="menu-item">
                                        <a href="login.php"><span style="text-transform: capitalize;">Đăng nhập</span></a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="register.php"><span style="text-transform: capitalize;">Đăng ký</span></a>
                                    </li>';
                                    }
                                    ?>
                                    
                                </ul>
                            </div>
                        </nav>
                        <div class="off-canvas-bottom">
                            <div class="contact-list mb--10">
                            <a href="#" class="sin-contact"><i class="fas fa-mobile-alt"></i>0966472620</a>
                            <a href="#" class="sin-contact"><i class="fas fa-envelope"></i>tranthanhduytvh10@gmail.com</a>
                        </div>
                        <div class="off-canvas-social">
                            <a href="https://www.facebook.com/MeowShop-107790927679495/" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                        
                    </div>
                </div>
            </aside>
                    
                    
                </div>           
                        
        </div>
</div>
<script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>