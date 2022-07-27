<?php 
    require_once("connection.php");
    $query_select_dangKy = "SELECT * from tbl_user";
    $result_select_dangKy = $conn->query($query_select_dangKy);
?>
<table class="table table-bordered mt32" name="tableUser">
    <br>
    <thead>
        <tr>
            <th scope="col table__header--name">Tên tài khoản</th>
            <th scope="col table__header--name">Mật khẩu</th>
            <th scope="col table__header--name">Số điện thoại</th>
            <th scope="col table__header--name">Quyền</th>
            <th scope=" col table__header--name">Chỉnh sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
              if($result_select_dangKy -> num_rows > 0){
                    while($dangKy = $result_select_dangKy -> fetch_assoc()){
              ?>
        <tr>
            </th>
            <td> <?php echo $dangKy["userName"] ?> </td>
            <td> <?php echo $dangKy["password"] ?> </td>
            <td> 0<?php echo $dangKy["phoneUser"] ?> </td>
            <td> <?php echo $dangKy["role"] ?> </td>
            <td>
                <a class="edit-link_update" href="updateAccounts.php?idtk=<?php echo  $dangKy['phoneUser'];?>">
                    <i class="edit-item ti-menu-alt"></i>
                </a>
                <a class="edit-link_delete" href="deleteAccounts.php?idtk=<?php echo  $dangKy['phoneUser'];?>">
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