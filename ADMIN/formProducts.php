<?php
    require_once "connection.php";
    if(count($_POST) > 0) {
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['hinhAnhSanPham']['name'];
        $file_size = $_FILES['hinhAnhSanPham']['size'];
        $file_temp = $_FILES['hinhAnhSanPham']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
        $uploaded_image = "imgProducts/".$unique_image;
        

        if(move_uploaded_file($file_temp, $uploaded_image)) {
            if(isset($_POST["btnThemSanPham"])){
            $maSanPham = $_POST["maSanPham"];
            $tenSanPham = $_POST["tenSanPham"];
            // $moTaSanPham = $_POST["moTaSanPham"];
            $moTaSanPham = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
            $giaSanPham = $_POST["giaSanPham"];
            $loaiSanPham = $_POST["loaiSanPham"];
            
            $query_insert_sanPham = "INSERT INTO tbl_sanpham  
            Value ('$maSanPham', '$tenSanPham', '$moTaSanPham', '$giaSanPham', '$uploaded_image','$loaiSanPham')";
            $result_insert_sanPham = $conn->query($query_insert_sanPham);
        }
    } 
  } 
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="align-center">
        <h1 class="h3 mb-3 fw-normal mt-40">THÊM SẢN PHẨM</h1>
    </div>
    <div class="mb-3">
        <select class="form-select" id="floatingInput" name="loaiSanPham">>
            <option active value="">--Loại sản phẩm--</option>
            <option value="Com">Cơm</option>
            <option value="Ga_ran">Gà rán</option>
            <option value="Khoai_tay">Khoai tây</option>
            <option value="Hamburger">Hamburger</option>
            <option value="Pizza">Pizza</option>
            <option value="Nuoc_uong">Nước uống</option>
            <option value="Trang_mieng">Tráng miệng</option>
        </select>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="maSanPham" placeholder="Password">
        <label for="floatingInput">Mã sản phẩm: </label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingPassword" name="tenSanPham" placeholder="Password">
        <label for="floatingPassword">Tên sản phẩm: </label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingPassword" name="moTaSanPham" placeholder="Password"
            readonly>
        <label for="floatingPassword">Mô tả: </label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingPassword" name="giaSanPham" placeholder="Password">
        <label for="floatingPassword">Giá: </label>
    </div>


    <div class="mb-3">
        <label for="inputProduct" class="col-form-label">Hình ảnh: </label>
        <div class="col-sm-12">
            <input name="hinhAnhSanPham" type="file" class="form-control">
        </div>
    </div>
    <a href="#" class="link-insert">
        <button class=" btn btn-lg btn-primary btn-huy" name="btnThemSanPham" type="submit">Thêm</button>
    </a>
</form>