<h3 style="text-align:center">Tìm kiếm cửa hàng</h3>
<form action="" class="d-flex search-store" method="get" style="margin-bottom: 12px">
    <input class="form-control me-2" name="inputSearch" type="search" placeholder="Nhập địa điểm cần tìm"
        style="font-size: 18px">
    <button class="btn btn-outline-success" type="submit" name="btnSearch">Search</button>
</form>
<?php
    if (isset($_REQUEST['btnSearch'])) {
    $search = addslashes($_GET['inputSearch']);
    $query_select_diaDiem = "SELECT * from tbl_diadiem_chinhanh where diaChi like '%$search%'";
    $result_select_diaDiem = $conn->query($query_select_diaDiem); 
    $num = mysqli_num_rows($result_select_diaDiem);
?>
<table class="table table-bordered mt32" name="tableUser">
    <br>
    <thead>
        <tr>
            <th scope="col table__header--name">Tên chi nhánh</th>
            <th scope="col table__header--name">Giờ hoạt động</th>
            <th scope="col table__header--name">Số điện thoại</th>
            <th scope="col table__header--name">Hình ảnh</th>
            <th scope=" col table__header--name">Địa chỉ</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($num > 0 && $search != "") { ?>
        <tr>
            <?php while ($row = mysqli_fetch_assoc($result_select_diaDiem)) {?>
            </th>
            <td> <?php echo $row['tenChiNhanh'] ?> </td>
            <td> <?php echo $row['gioMoCua']?> </td>
            <td> <?php echo $row['SDTChiNhanh'] ?> </td>
            <td> <img src="../ADMIN/<?php echo $row['hinhAnhChiNhanh'] ?>" alt="" width="100" height="100"> </td>
            <td> <?php echo $row['diaChi'] ?> </td>
        </tr>
        <?php 
        }
        }
    }

    ?>
    </tbody>
</table>