<?php 
    require_once("connection.php");
    $query_select_KhachHang = "SELECT * from tbl_khachhang, tbl_user 
    Where tbl_khachhang.phoneUser = tbl_user.phoneUser";
    $result_select_KhachHang = $conn->query($query_select_KhachHang);
?>
<table class="table table-bordered mt32" name="tableUser">
    <br>
    <thead>
        <tr>
            <th scope="col table__header--name">Số điện thoại</th>
            <th scope="col table__header--name">Tên đăng nhập</th>
            <th scope="col table__header--name">Họ tên</th>
            <th scope="col table__header--name">Địa chỉ</th>
            <th scope="col table__header--name">Email</th>
            <th scope=" col table__header--name">Chỉnh sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
              if($result_select_KhachHang -> num_rows > 0){
                    while($KhachHang = $result_select_KhachHang -> fetch_assoc()){
              ?>
        <tr>
            </th>
            <td> 0<?php echo $KhachHang["phoneUser"] ?> </td>
            <td> <?php echo $KhachHang["userName"] ?> </td>
            <td> <?php echo $KhachHang["hoTenKH"] ?> </td>
            <td> <?php echo $KhachHang["diaChiKH"] ?> </td>
            <td> <?php echo $KhachHang["emailKH"] ?> </td>
            <td>
                <a class="edit-link_delete" href="deleteCustomer.php?idkh=<?php echo  $KhachHang['maKH'];?>">
                    <i class="edit-item ti-trash"></i>
                </a>
            </td>
        </tr>
        <?php 
                  }
                }
              ?>
    </tbody>
</table>