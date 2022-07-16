<?php include "menu.php" ?> 
<!DOCTYPE html>
<html lang="zxx">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DNN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
    $(document).ready(function(){
         $("#guibinhluan").click(function(){
            var url_string = window.location.href;
            var url = new URL(url_string);
            var idsp = url.searchParams.get("id");

            var txt = $("#noidungbinhluan").val();
        
            $.post("xulybinhluan.php", {noidung: txt, idsach: idsp}, function(result){
                $("#dsbinhluan").append('<hr>'+txt);  });              
            });
    });
</script>
</head>

<body>
    <div class="site-wrapper" id="top">
        
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Product Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <main class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row  mb--60">
                    <div class="col-lg-5 mb--30" style="align: center">
                        <!-- Product Details Slider Big Image-->
                        <div >
			  <?php
    				$id = $_GET['id'];
   					$sql = "SELECT * FROM hanghoa WHERE id=$id";
    				$query = mysqli_query($conn, $sql);
					$sp = mysqli_fetch_assoc($query);
					if ($row= $sp){
					echo '
                            <div class="single-slide">
                                <img src="'.$row['anh'].'" alt="">
							</div>';
					}
			?>
                            
                        </div>
                        <!-- Product Details Slider Nav -->
                       
                    </div>
                    <div class="col-lg-7">
					<?php
    				$id = $_GET['id'];
   					$sql = "SELECT * FROM hanghoa WHERE id=$id";
    				$query = mysqli_query($conn, $sql);
					$sp = mysqli_fetch_assoc($query);
					if ($row=$sp){
					$kqkm= $row['dongia']-$row['dongia']*$row['giamgia'] ;
					$giamgia= $row['giamgia']*100;
					}
					echo '
                        <div class="product-details-info pl-lg--30 ">
                            
                            <h3 class="product-title">'.$sp['tenhang'].'</h3>
                           
                            <div class="price-block">
                                <span class="price-new">'.number_format($kqkm).' đ</span>
                                <del class="price-old">'.number_format($sp['dongia']).'đ</del>
							</div>
							
                          
                            <article class="product-details-article">
                                <h4 class="sr-only">Product Summery</h4>
                                <p>'.$sp['mota'].'</p>
                            </article>
                            <div class="add-to-cart-row">
                                
                                <div class="add-cart-btn">
                                    <a href="addcart.php?id='.$sp['id'].'" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                          
						</div>';
						?>
                    </div>
                </div>
                <div class="sb-custom-tab review-tab section-padding">
                    <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                        
                        <li class="nav-item">
                            <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab"
                                aria-controls="tab-2" aria-selected="true">
                                Bình Luận
                            </a>
                        </li>
                    </ul>
                    <div c>
                        
                        <div >
                            <div class="review-wrapper">
                            <?php
                            $sql = "SELECT * FROM binhluan WHERE idsach =$id";
                            $ketqua1 = mysqli_query($conn, $sql);
                            while ($dong = mysqli_fetch_assoc($ketqua1)){
                                echo '
                                <div class="review-comment mb--20" >
                                    <div class="avatar">
                                        <img src="image/bg-images/cat2.png" alt="">
                                    </div>
                                    <div class="text" >
                                        <p style="color:red">'.$dong['ten'].'</p>
                                        <h6 class="author"><p>'.$dong['noidung'].'</p> <span class="font-weight-400">'.$dong['ngay'].'</span>
                                        </h6>
                                        
                                    </div>
                                   
                                </div>
                
                               
    ';
                            } 
                            ?>
                            <div class="review-comment mb--20" >
                                    <div class="avatar">
                                    </div>
                                    <div class="text" id="dsbinhluan">
                                       
                                    <?php $date = getdate(); 
                                    $ngay=''.$date['year'].'-'.$date['mon'].'-'.$date['mday'].'';
                                    if(isset($_SESSION['ten'])){echo '<b style="color:red">'.$_SESSION['ten'].'</b> <br> '.$ngay.'';}?>
                                        
                                    
                                    </div>
                                   
                                </div>
                                </div>
                                <?php if(isset($_SESSION['ten'])){
                                    echo' 

                                <div class="rating-row pt-2">
                                    
                                    <div class="mt--15 site-form ">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="message">Comment</label>
                                                    <textarea  name="noidungbinhluan" id="noidungbinhluan" cols="30" rows="10"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-4">
                                                <div class="submit-btn">
                                                    <input  class="btn btn-black" type="submit" value="Gửi bình luận" id="guibinhluan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                }
                                else echo '<div class="rating-row pt-2"> <h3>bạn cần đăng nhập để bình luận</h3></div>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </main>
            </div>
  
    <?php include "footer.php"?>
</body>


<!-- Mirrored from demo.hasthemes.com/pustok-preview/pustok/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Nov 2020 14:59:42 GMT -->
</html>