<?php
    require_once("connection.php");
    $total_money = 0;
//    var_dump($_SESSION['cart']);die;
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
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="body-cart">
    <div class="container-fluid ">
        <?php include("headerUser.php")?>
        <div class="cart">
            <h4 class="infor-cart">Thông tin đơn hàng</h4>
            <form action="" method="POST">
                <table class="table col-write">
                    <thead>
                        <tr>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Xoá</th>
                        </tr>
                    </thead>
                    <?php  if(isset($_SESSION['cart'])){
                        ?>
                    <tbody>
                        <?php foreach($_SESSION['cart'] as $key =>$val){?>
                        <tr>
                            <?php 
                            $sp_sl = $val["giaSanPham"]*$val["soLuong"];
                            $total_money+= $sp_sl;
                            ?>
                            <td><?php echo  $key?></td>
                            <td><?php echo $val["tenSanPham"]?></td>
                            <td><?php echo number_format($val["giaSanPham"],0,',','.').' vnđ' ?></td>

                            <td><?php echo $val["soLuong"]?></td>
                            <td><?php echo number_format($sp_sl,0,',','.').' vnđ' ?></td>

                            <td>
                                <a class="edit-link_delete" href="deleteCart.php?idsp=<?php echo  $key;?>">
                                    <i class="edit-item ti-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <?php } ?>
                    <thead>
                        <tr>
                            <th class="tongtien" scope="col" colspan="6">Tổng tiền:
                                <?php echo number_format($total_money,0,',','.').' vnđ'?>
                            </th>
                        </tr>
                    </thead>
                </table>
                <a href="insertBill.php?totalMoney=<?php echo $total_money ?>">
                    <input type="button" class="btn w-100 cart-btn" value="Đặt hàng"></input>
                </a>
            </form>
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