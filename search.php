
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DNN Sshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
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
        <section class="section-padding">
            <h2 class="sr-only">Home Tab Slider Section</h2>
            <div class="container">
                <div class="sb-custom-tab">
                    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                                data-slick-setting='{
                                    "autoplaySpeed": 500,
                            "slidesToShow": 5,
                            "rows":2
                            
                        }' >
				<?php 
				if (isset($_REQUEST['ok'])) 
                {
                    // Gán hàm addslashes để chống sql injection
                    $search = addslashes($_GET['search']);
         
                    // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
                    if (empty($search)) {
                        echo '<h2 style="margin-top :20px;text-align:center; color: deeppink ">Vui lòng nhập thông tin vào ô trống :V</h2>';
                    } 
                    else
                    {
                        $connect=mysqli_connect("localhost", "root", "", "banhang");
                        // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                        $query = "select * from  hanghoa where tenhang like '%$search%'";
                        // Thực thi câu truy vấn
                        $sql = mysqli_query($connect,$query);
                        // Đếm số đong trả về trong sql.
                        $num = mysqli_num_rows($sql);
                        // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                        if ($num > 0 && $search != "") 
                        {
                        
                            
                            
                            while ($row = mysqli_fetch_assoc($sql)) {
                                $kqkm= $row['dongia']-$row['dongia']*$row['giamgia'] ;
                                $giamgia= $row['giamgia']*100;
                                echo '
                        
                        <div class="single-slide">

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
                                
                            </div>';
                                }
                            }
                        }
				}
			?>
            </div>
            </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include "footer.php" ?>
    </body>

</html>