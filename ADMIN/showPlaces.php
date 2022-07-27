<?php 
    require_once("connection.php");
    $query_select_diaDiem = "SELECT tenTinh, maChiNhanh, tenChiNhanh, diaChi, SDTChiNhanh, hinhAnhChiNhanh, gioMoCua 
        from tbl_diadiem_chinhanh, tbl_diadiem_tinh 
        WHERE tbl_diadiem_chinhanh.maTinh = tbl_diadiem_tinh.maTinh";
    $result_select_diaDiem = $conn->query($query_select_diaDiem); 
?>
<table class="table table-bordered mt32" name="tableUser">
    </br>
    <thead>
        <tr>
            <th scope=" col table__header--name">Tên Tỉnh/TP</th>
            <th scope=" col table__header--name">Mã chi nhánh</th>
            <th scope=" col table__header--name">Tên chi nhánh</th>
            <th scope=" col table__header--name">Địa chỉ</th>
            <th scope=" col table__header--name">SĐT</th>
            <th scope=" col table__header--name">Hình ảnh</th>
            <th scope=" col table__header--name">Giờ hoạt động</th>
            <th scope=" col table__header--name">Sửa</th>
            <th scope=" col table__header--name">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
              if($result_select_diaDiem -> num_rows > 0){
                    while($diaDiem = $result_select_diaDiem -> fetch_assoc()){
              ?>
        <tr>
            </th>
            <td> <?php echo $diaDiem ["tenTinh"] ?> </td>
            <td> <?php echo $diaDiem ["maChiNhanh"] ?> </td>
            <td> <?php echo $diaDiem ["tenChiNhanh"] ?> </td>
            <td> <?php echo $diaDiem ["diaChi"] ?> </td>
            <td> <?php echo $diaDiem ["SDTChiNhanh"] ?> </td>
            <td>
                <a class="edit-link_update" href="vPictureBranch.php?idha=<?php echo $diaDiem ['hinhAnhChiNhanh'] ?>">
                    <i class="viewPT ti-search"></i><span>Xem hình</span>
                </a>

            </td>
            <td> <?php echo $diaDiem ["gioMoCua"] ?> </td>
            <td>
                <a class="edit-link_update" href="updatePlaces.php?iddd=<?php echo  $diaDiem ['maChiNhanh'];?>">
                    <i class="edit-item ti-menu-alt"></i>
                </a>
            </td>
            <td>
                <a class="edit-link_delete" href="deletePlaces.php?iddd=<?php echo  $diaDiem ['maChiNhanh'];?>">
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