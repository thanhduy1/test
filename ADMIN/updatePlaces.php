<?php 
    require_once("connection.php");
    
    
        $suaDiaDiem = $_GET['iddd'];

        $query_select_diaDiem = "SELECT *  FROM tbl_diadiem_chinhanh,tbl_diadiem_tinh where maChiNhanh='$suaDiaDiem'";
        $result_select_diaDiem = mysqli_query($conn, $query_select_diaDiem);
        $arrDataDD = mysqli_fetch_assoc($result_select_diaDiem);

        if(isset($_POST["btnSuaDiaDiem"])){
            $maChiNhanh = $_POST["maChiNhanh"];
            $tenChiNhanh = $_POST["tenChiNhanh"];
            $diaChi = $_POST["diaChi"];
            $gioMoCua = $_POST["gioMoCua"];
            $SDTChiNhanh = $_POST["SDTChiNhanh"];

            $query_update_diaDiem= "UPDATE tbl_diadiem_chinhanh
            SET maChiNhanh = '$maChiNhanh', tenChiNhanh='$tenChiNhanh', gioMoCua='$gioMoCua', SDTChiNhanh='$SDTChiNhanh', diaChi='$diaChi'
            WHERE maChiNhanh='$suaDiaDiem'";
            $result_update_diaDiem = mysqli_query($conn, $query_update_diaDiem);
            header("location:pagePlaces.php");
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
    <a href="pagePlaces.php">
        <button class=" btn btn-secondary" type="button">Quay lại</button>
    </a>
    <div class="form-huy">
        <form action="" method="POST">
            <div class="align-center dis-f">
                <h1 class="h3 mb-3 fw-normal mt16">SỬA ĐỊA ĐIỂM</h1>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="tenTinh" name="tenTinh" placeholder="tenTinh" required
                    value="<?php echo $arrDataDD["tenTinh"]?>">
                <label for="tenTinh">Tên tỉnh </label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="maChiNhanh" name="maChiNhanh" placeholder="maChiNhanh"
                    required value="<?php echo $arrDataDD["maChiNhanh"]?>">
                <label for="maChiNhanh">Mã chi nhánh: </label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="tenChiNhanh" name="tenChiNhanh" placeholder="tenChiNhanh"
                    required value="<?php echo $arrDataDD["tenChiNhanh"]?>">
                <label for="tenChiNhanh">Tên chi nhánh: </label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="diaChi" name="diaChi" placeholder="diaChi" required
                    value="<?php echo $arrDataDD["diaChi"]?>">
                <label for="diaChi">Địa chỉ: </label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="gioMoCua" name="gioMoCua" placeholder="gioMoCua" required
                    value="<?php echo $arrDataDD["gioMoCua"]?>">
                <label for="gioMoCua">Giờ hoạt động: </label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="SDTChiNhanh" name="SDTChiNhanh" placeholder="SDTChiNhanh"
                    required value="<?php echo $arrDataDD["SDTChiNhanh"]?>">
                <label for="SDTChiNhanh">Số điện thoại: </label>
            </div>
            <div class="mb-3">
                <label for="hinhAnhChiNhanh" class="col-form-label">Hình ảnh: </label>
                <div class="col-sm-12">
                    <input name="hinhAnhChiNhanh" type="file" class="form-control"
                        value="<?php echo $arrDataDD["hinhAnhChiNhanh"] ?>">
                </div>
            </div>

            <a href="" class="link-insert">
                <button class=" btn btn-lg btn-primary btn-huy" name="btnSuaDiaDiem" type="submit">Sửa</button>
            </a>
        </form>
    </div>
</body>

</html>