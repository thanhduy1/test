<?php

    require_once("connection.php");
    $ID = $_GET["phoneUser"];
    echo $ID;
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
            <h3 style="color: #fff; text-align: center;">Lịch sử mua hàng</h3>
            <?php 
            $query_select_DatHang = "SELECT * FROM tbl_donhang, tbl_donhang_chitiet, tbl_sanpham 
            WHERE tbl_donhang_chitiet.IDDonHang = tbl_donhang.IDDonHang 
            AND tbl_donhang_chitiet.maSanPham = tbl_sanpham.maSanPham
            AND tbl_donhang.SDT = $ID";
            $result_select_DatHang = $conn->query($query_select_DatHang); 
            ?>
            <table class="table table-bordered mt32" style="color: #fff;" name="tableUser">
                </br>
                <thead>
                    <tr>
                        <th scope=" col table__header--name">Ngày đặt</th>
                        <th scope=" col table__header--name">Họ tên</th>
                        <th scope=" col table__header--name">Số điện thoại</th>
                        <th scope=" col table__header--name">Địa chỉ</th>
                        <th scope=" col table__header--name">Tên sản phẩm</th>
                        <th scope=" col table__header--name">Giá sản phẩm</th>
                        <th scope=" col table__header--name">Số lượng</th>
                        <th scope=" col table__header--name">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
              if($result_select_DatHang -> num_rows > 0){
                    while($DatHang = $result_select_DatHang -> fetch_assoc()){
              ?>
                    <tr>
                        <td> <?php echo date("d/m/Y", strtotime($DatHang["ngayDatHang"])); ?> </td>
                        <td> <?php echo $DatHang["hoTen"] ?> </td>
                        <td> 0<?php echo $DatHang["SDTGiaoHang"] ?> </td>
                        <td> <?php echo $DatHang["diaChi"] ?> </td>
                        <td> <?php echo $DatHang["tenSanPham"] ?> </td>
                        <td> <?php echo number_format($DatHang["giaSanPham"],0,',','.').' vnđ' ?> </td>
                        <td> <?php echo $DatHang["soLuong"] ?> </td>
                        <td> <?php echo number_format($DatHang["tongTien"],0,',','.').' vnđ' ?> </td>

                    </tr>
                    <?php 
                  }
                }
              ?>
                </tbody>
            </table>
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