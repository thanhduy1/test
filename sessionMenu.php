<?php 
    require_once("connection.php");
    if(isset($_SESSION['cart'])){
    
    }
?>

<section class="food_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center">
            <h2 class="menu-heading">
                THỰC ĐƠN
            </h2>
        </div>

        <ul class="filters_menu">
            <li class="active" data-filter="*">All</li>
            <li data-filter=".Com">Cơm</li>
            <li data-filter=".Ga_ran">Gà rán</li>
            <li data-filter=".Khoai_tay">Khoai tây</li>
            <li data-filter=".Hamburger">Hamburger</li>
            <li data-filter=".Pizza">Pizza</li>
            <li data-filter=".Nuoc_uong">Nước uống</li>
            <li data-filter=".Trang_mieng">Tráng miệng</li>
        </ul>


        <div class="filters-content">
            <div class="row grid">
                <?php 
                    $query_select_sanPham = "SELECT * from tbl_sanpham";
                    $result_select_sanPham = $conn->query($query_select_sanPham);
                    
                    if($result_select_sanPham -> num_rows > 0){
                        while($sanPham = $result_select_sanPham -> fetch_assoc()){
                            $tempMaSP = $sanPham["maSanPham"];
                  ?>
                <div class="col-sm-6 col-lg-4 all <?php echo $sanPham["loaiSanPham"]?>">
                    <div class="box">

                        <div class="img-box">
                            <img src="../ADMIN/<?php echo $sanPham["hinhAnhSanPham"]?>" alt="">

                        </div>
                        <div class="detail-box">
                            <h4 class="header-product">
                                <?php echo $sanPham["tenSanPham"]?>
                            </h4>
                            <p style="min-height: 70px">
                                <?php echo $sanPham["moTaSanPham"]?>
                            </p>
                            <div class="options">
                                <h6 class="price-product">
                                    <?php echo number_format($sanPham["giaSanPham"],0,',','.').' vnđ'?>
                                </h6>
                                <?php
                                            if(isset($_SESSION['loged']) == 1){
                                        ?>
                                <a href="cart.php?idsp=<?php echo $sanPham["maSanPham"]?>" class=" detail-link">Thêm
                                    vào
                                    giỏ</a>
                                <?php }else {?>
                                <a href="login.php" class=" detail-link">
                                    Thêm vào giỏ
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php }}?>
            </div>
        </div>
        <div class="btn-box">
            <a href="">
                Xem thêm
            </a>
        </div>
    </div>
</section>