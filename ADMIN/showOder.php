<?php 
    require_once("connection.php");
    $query_select_DatHang = "SELECT * FROM tbl_donhang, tbl_donhang_chitiet, tbl_sanpham 
    WHERE tbl_donhang_chitiet.IDDonHang = tbl_donhang.IDDonHang 
    AND tbl_donhang_chitiet.maSanPham = tbl_sanpham.maSanPham;";
    $result_select_DatHang = $conn->query($query_select_DatHang); 
?>
<table class="table table-bordered mt32" name="tableUser">
    </br>
    <thead>
        <tr>
            <th scope=" col table__header--name">ID</th>
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
            <td> <?php echo $DatHang["IDDonHang"] ?> </td>
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