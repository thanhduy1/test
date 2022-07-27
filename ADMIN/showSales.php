<?php 
    require_once("connection.php");
    $query_select_BanChay = "
    select* from tbl_sanpham WHERE maSanPham in(SELECT MAX(maSanPham) FROM tbl_donhang_chitiet)";
    $result_select_BanChay = $conn->query($query_select_BanChay);
    $BanChay = mysqli_fetch_assoc($result_select_BanChay);
    $tenSP = $BanChay["tenSanPham"];
?>
<div class="container">
    <div class="row">
        <div class="col">

            <table class="table table-bordered mt32" name="tableUser">
                </br>
                <thead>
                    <tr>
                        <th scope="table__header--name">Sản phẩm bán chạy: </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $tenSP?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            <?php 
            $query_select_DoanhThu = "SELECT * from tbl_donhang_chitiet";
            $result_select_DoanhThu = $conn->query($query_select_DoanhThu);
            
            ?>
            <table class="table table-bordered mt32" name="tableUser">
                </br>
                <thead>
                    <tr>
                        <th scope="table__header--name">Doanh thu bán hàng: </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                        $tongDoanhThu = 0;
                        if($result_select_DoanhThu -> num_rows > 0){
                            while($DoanhThu = $result_select_DoanhThu -> fetch_assoc()){
                                $tongDoanhThu+=$DoanhThu["tongTien"];
                            }
                        }
                        ?>
                        <td><?php echo number_format($tongDoanhThu,0,',','.').' vnđ'?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>