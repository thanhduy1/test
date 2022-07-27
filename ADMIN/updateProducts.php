<?php
  

    require_once("connection.php");
    $suaSanPham = $_GET['idth'];
    $query_select_sanPham = "SELECT * FROM tbl_sanpham where maSanPham='$suaSanPham'";
    $result_select_sanPham = mysqli_query($conn, $query_select_sanPham);
    $arrData = mysqli_fetch_assoc($result_select_sanPham);
    
    
    if(isset($_POST["btnSuaSanPham"])){
        $maSanPham = $_POST["maSanPham"];
        $tenSanPham = $_POST["tenSanPham"];
        $moTaSanPham = $_POST["moTaSanPham"];
        $giaSanPham = $_POST["giaSanPham"];
        $loaiSanPham = $_POST["loaiSanPham"];

        
        $query_update_sanPham = "UPDATE tbl_sanpham 
        SET maSanPham = '$maSanPham', tenSanPham='$tenSanPham', moTaSanPham='$moTaSanPham', giaSanPham='$giaSanPham',loaiSanPham='$loaiSanPham'
        WHERE maSanPham='$suaSanPham'";
        $result_update_sanPham = mysqli_query($conn, $query_update_sanPham);
        header("location:pageProducts.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <a href="pageProducts.php">
        <button class=" btn btn-secondary" name="btnSuaSanPham" type="button">Quay lại</button>
    </a>
    <div class="form-huy">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="align-center dis-f">
                <h1 class="h3 mb-3 fw-normal mt16">SỬA SẢN PHẨM</h1>
            </div>
            <div class="mb-3">
                <select class="form-select" id="floatingInput" name="loaiSanPham">>
                    <option active value="">--Loại sản phẩm--</option>
                    <option selected value="<?php echo $arrData["loaiSanPham"] ?>"><?php echo $arrData["loaiSanPham"] ?>
                    </option>
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
                <input type="text" class="form-control" id="floatingInput" name="maSanPham" placeholder="Password"
                    value="<?php echo $arrData["maSanPham"] ?>" required>
                <label for="floatingInput">Mã sản phẩm: </label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPassword" name="tenSanPham" placeholder="Password"
                    value="<?php echo $arrData["tenSanPham"] ?>" required>
                <label for="floatingPassword">Tên sản phẩm: </label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPassword" name="moTaSanPham" placeholder="Password"
                    value="<?php echo $arrData["moTaSanPham"] ?>" required>
                <label for="floatingPassword">Mô tả: </label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPassword" name="giaSanPham" placeholder="Password"
                    value="<?php echo $arrData["giaSanPham"] ?>" required>
                <label for="floatingPassword">Giá: </label>
            </div>

            <div class="mb-3">
                <label for="inputProduct" class="col-form-label">Hình ảnh: </label>
                <div class="col-sm-12">
                    <input name="hinhAnhSanPham" type="file" class="form-control"
                        value="<?php echo $arrData["hinhAnhSanPham"] ?>">
                </div>
            </div>
            <a href="" class="link-insert">
                <button class=" btn btn-lg btn-primary btn-huy" name="btnSuaSanPham" type="submit">Sửa</button>
            </a>
        </form>
    </div>
</body>

</html>