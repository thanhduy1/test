<?php 
    require_once("connection.php");
    
    // $query_select_KhachHang_User = "SELECT * from tbl_khachhang, tbl_user where tbl_user.phoneUser = tbl_khachhang.phoneUser";
    // $result_select_KhachHang_User = $conn->query($query_select_KhachHang_User);
    // $arrDataKH_US = mysqli_fetch_assoc($result_select_KhachHang_User);

    $huy = $_SESSION["loged"];
    $query_select_user = "SELECT * from  tbl_user where userName='$huy'";
    $result_select_user = $conn->query($query_select_user);
    $arrDataUS = mysqli_fetch_assoc($result_select_user);

    $temp = $arrDataUS["phoneUser"];
    $query_select_KhachHangROW = "SELECT * from tbl_khachhang where phoneUser = $temp";
    $result_select_KhachHangROW = $conn->query($query_select_KhachHangROW);

    $KhachHangROW = ($result_select_KhachHangROW -> num_rows);
    
    
    $query_select_KhachHang = "SELECT * FROM tbl_khachhang where phoneUser = $temp";
    $result_select_KhachHang = mysqli_query($conn, $query_select_KhachHang);
    $arrDataKH = mysqli_fetch_assoc($result_select_KhachHang);
    
    
	$_SESSION["phone"] = $arrDataUS["phoneUser"];
      if(isset($_POST["btnInfor"])){  
            $phoneUser = $_POST["phoneNumber"];
            $hoTenKH = $_POST["nameCustomer"];
            $diaChiKH = $_POST["addrCustomer"];
            
            $query_select_KhachHang = "SELECT maKH FROM tbl_khachhang WHERE phoneUser = $phoneUser";
            $result_select_KhachHang = mysqli_query($conn, $query_select_KhachHang);
            $KhachHang = mysqli_fetch_assoc($result_select_KhachHang);

            $IDKH = $KhachHang['maKH'];
            $_SESSION["IDDonHang"] = $IDKH;

            $query_insert_DonHang = "INSERT INTO tbl_donhang (IDDonHang,hoTen,diaChi,SDT,SDTGiaoHang,tongTienTT) 
                Values ('$IDKH', '$hoTenKH', ' $diaChiKH',' $phoneUser','0','0')";
            $result_insert_DonHang = mysqli_query($conn, $query_insert_DonHang);
            header("location:inforCustomer.php");
        }
        
        ?>

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->

    <title> Jollibee </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../ADMIN/assets/css/style.css">
    <link rel="stylesheet" href="./css/base.css">
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="body-cart">
    <div class="container-fluid ">
        <?php include("headerUser.php")?>

        <div class="cart">
            <?php if($result_select_KhachHangROW -> num_rows > 0){
        if(isset($_POST["btnInfor"])){  
            $phoneUser = $_POST["phoneNumber"];
            $hoTenKH = $_POST["nameCustomer"];
            $diaChiKH = $_POST["addrCustomer"];
            $emailKH = $_POST["emailCustomer"];
            $query_update_KhachHang = "UPDATE tbl_khachhang 
            SET phoneUser = '$phoneUser', hoTenKH='$hoTenKH', diaChiKH='$diaChiKH', emailKH='$emailKH'
            WHERE phoneUser='$phoneUser'";
            $result_update_KhachHang = mysqli_query($conn, $query_update_KhachHang);

            header("location:#");
        }?>
            <div class="form-huy text-center">
                <div class="form-signin">
                    <form action="" method="POST">
                        <h1 class="h3 mb-3 fw-normal" style="color:#fff">THÔNG TIN</h1>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                value="0<?php  echo $arrDataUS["phoneUser"]?>">
                            <label for="phoneNumber">Số điện thoại: </label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nameCustomer" name="nameCustomer"
                                value="<?php  echo $arrDataKH["hoTenKH"]?>">
                            <label for="nameCustomer">Tên khách hàng: </label>
                        </div>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="emailCustomer" name="emailCustomer"
                                value="<?php  echo $arrDataKH["emailKH"]?>">
                            <label for="emailCustomer">Email: </label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="addrCustomer" name="addrCustomer"
                                value="<?php  echo $arrDataKH["diaChiKH"]?>">
                            <label for="addrCustomer">Địa chỉ: </label>
                        </div>
                        <div class="">
                            <a href="#" class="link-insert">
                                <button class=" btn btn-lg btn-primary btn-huy" name="btnInfor" type="submit">Cập
                                    nhật</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <?php }else{ 
        if(isset($_POST["btnInfor"])){  
            $phoneUser = $_POST["phoneNumber"];
            $hoTenKH = $_POST["nameCustomer"];
            $diaChiKH = $_POST["addrCustomer"];
            $emailKH = $_POST["emailCustomer"];
            
            $query_insert_KhachHang = "INSERT INTO tbl_khachhang (maKH,phoneUser,hoTenKH,diaChiKH,emailKH) 
                Values (' ', '$phoneUser', '$hoTenKH','$diaChiKH','$emailKH')";
            $result_insert_KhachHang = mysqli_query($conn, $query_insert_KhachHang);

            header("location:#");

        }?>
            <div class="form-huy text-center">
                <div class="form-signin">
                    <form action="" method="POST">
                        <h1 class="h3 mb-3 fw-normal" style="color:#fff">THÔNG TIN</h1>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                value="0<?php  echo $arrDataUS["phoneUser"]?>">
                            <label for="phoneNumber">Số điện thoại: </label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nameCustomer" name="nameCustomer" value="">
                            <label for="nameCustomer">Tên khách hàng: </label>
                        </div>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="emailCustomer" name="emailCustomer" value="">
                            <label for="emailCustomer">Email: </label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="addrCustomer" name="addrCustomer" value="">
                            <label for="addrCustomer">Địa chỉ: </label>
                        </div>
                        <div class="">
                            <a href="#" class="link-insert">
                                <button class=" btn btn-lg btn-primary btn-huy" name="btnInfor" type="submit">Cập
                                    nhật</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    </div>
    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->
</body>

</html>