<?php 
    require_once("connection.php");
    $query_select_sanPham = "SELECT * from tbl_sanpham";
    $result_select_sanPham = $conn->query($query_select_sanPham); 
?>
<table class="table table-bordered mt32" name="tableUser">
    </br>
    <thead>
        <tr>
            <th scope=" col table__header--name">Mã</th>
            <th scope=" col table__header--name">Tên sản phẩm</th>
            <th scope=" col table__header--name">Mô tả</th>
            <th scope=" col table__header--name">Giá</th>
            <th scope=" col table__header--name">Hình ảnh</th>
            <th scope=" col table__header--name">Loại</th>
            <th scope=" col table__header--name">Chỉnh sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
              if($result_select_sanPham -> num_rows > 0){
                    while($sanPham = $result_select_sanPham -> fetch_assoc()){
              ?>
        <tr>
            <td> <?php echo $sanPham["maSanPham"] ?> </td>
            <td> <?php echo $sanPham["tenSanPham"] ?> </td>
            <td> <?php echo $sanPham["moTaSanPham"] ?> </td>
            <td class="padd"> <?php echo $sanPham["giaSanPham"] ?> </td>
            <td style="width: 120px">
                <a class="edit-link_update" href="vPictureProducts.php?idha=<?php echo $sanPham['hinhAnhSanPham'] ?>">
                    <i class="viewPT ti-search"></i><span>Xem hình</span>
                </a>
            </td>
            <td> <?php echo $sanPham["loaiSanPham"] ?> </td>
            <td style="display: flex">
                <a class="edit-link_update" href="updateProducts.php?idth=<?php echo  $sanPham['maSanPham'];?>">
                    <i class="edit-item ti-menu-alt"></i>
                </a>

                <a class="edit-link_delete" href="deleteProducts.php?idth=<?php echo  $sanPham['maSanPham'];?>">
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