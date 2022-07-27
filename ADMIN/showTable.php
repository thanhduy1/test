<?php 
    require_once("connection.php");
    $query_select_DatBan = "SELECT * from tbl_datban";
    $result_select_DatBan = $conn->query($query_select_DatBan); 
?>
<table class="table table-bordered mt32" name="tableUser">
    </br>
    <thead>
        <tr>
            <th scope=" col table__header--name">ID</th>
            <th scope=" col table__header--name">Họ tên</th>
            <th scope=" col table__header--name">Số điện thoại</th>
            <th scope=" col table__header--name">Số người</th>
            <th scope=" col table__header--name">Ngày nhận bàn</th>
            <th scope=" col table__header--name">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
              if($result_select_DatBan -> num_rows > 0){
                    while($DatBan = $result_select_DatBan -> fetch_assoc()){
              ?>
        <tr>
            </th>
            <td> <?php echo $DatBan ["IDDatBan"] ?> </td>
            <td> <?php echo $DatBan ["hoTenDB"] ?> </td>
            <td> 0<?php echo $DatBan ["SDTDB"] ?> </td>
            <td> <?php echo $DatBan ["soNguoi"] ?> </td>
            <td> <?php echo date("d/m/Y", strtotime($DatBan ["ngayDB"])); ?> </td>
            <td>
                <a class="edit-link_delete" href="deletePlaces.php?iddd=<?php echo  $DatBan ['IDDatBan'];?>">
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