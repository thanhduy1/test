<?php
    require_once "connection.php";

    // $query_select_tinh = "SELECT maTinh, tenTinh FROM tbl_diadiem_tinh";
    // $result_select_tinh = $conn->query($query_select_tinh);
    if(count($_POST) > 0) {
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['hinhAnhChiNhanh']['name'];
        $file_size = $_FILES['hinhAnhChiNhanh']['size'];
        $file_temp = $_FILES['hinhAnhChiNhanh']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
        $uploaded_image = "imgBranch/".$unique_image;
        

        if(move_uploaded_file($file_temp, $uploaded_image)) {
            if(isset($_POST["btnThemChiNhanh"])){
                $maTinh = $_POST["maTinh"];
                $maChiNhanh = $_POST["maChiNhanh"];
                $tenChiNhanh = $_POST["tenChiNhanh"];
                $gioMoCua = $_POST["gioMoCua"];
                $soDienThoai = $_POST["soDienThoai"];
                $diaChi = $_POST["diaChi"];
                $query_insert_chiNhanh = "INSERT INTO tbl_diadiem_chinhanh  
                    Value ('$maTinh', '$maChiNhanh', '$tenChiNhanh', '$gioMoCua', '$soDienThoai', '$uploaded_image', '$diaChi')";
                $result_insert_chiNhanh = $conn->query($query_insert_chiNhanh);

            }
            
        }
    }

    $query_select_tinh = "SELECT * FROM tbl_diadiem_tinh";
    $result_select_tinh = $conn->query($query_select_tinh);
?>

<form action="" method="post" enctype="multipart/form-data">
    <h1 class="h3 mb-3 fw-normal">THÊM CHI NHÁNH</h1>

    <div class="form">
        <span style="float: right;"><a href="formPlaces.php">Thêm tỉnh</a></span>
        <select class="form-select" id="floatingInput" name="maTinh">
            <option value="">--Tên tỉnh--</option>

            <?php 
                if($result_select_tinh -> num_rows > 0){
                    while($maTinh = $result_select_tinh -> fetch_assoc()){
            ?>
            <option value="<?php echo $maTinh["maTinh"]?>"><?php echo $maTinh["tenTinh"]?></option>
            <?php 
                    }
                }
            ?>
        </select>
    </div>


    <div class="form-floating">
        <input type="number" class="form-control" id="floatingInput" name="maChiNhanh" placeholder="Mã chi nhánh">
        <label for="floatingInput">Mã chi nhánh </label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="tenChiNhanh" placeholder="Tên chi nhánh">
        <label for="floatingInput">Tên chi nhánh </label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="diaChi" placeholder="Địa chỉ">
        <label for="floatingInput">Địa chỉ </label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="gioMoCua" placeholder="Giờ mở cửa">
        <label for="floatingInput">Giờ mở cửa </label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="soDienThoai" placeholder="Số điện thoại">
        <label for="floatingInput">Số điện thoại </label>
    </div>
    <div class="mb-3">
        <label for="inputProduct" class="col-form-label">Hình ảnh: </label>
        <div class="col-sm-12">
            <input name="hinhAnhChiNhanh" type="file" class="form-control">
        </div>
    </div>
    <a href="" class="link-insert">
        <button class=" btn btn-lg btn-primary btn-huy" name="btnThemChiNhanh" type="submit">Thêm</button>
    </a>
</form>