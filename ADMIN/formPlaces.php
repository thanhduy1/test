<?php
    require_once "connection.php";

    $query_select_tinh = "SELECT maTinh, tenTinh FROM tbl_diadiem_tinh";
    $result_select_tinh = $conn->query($query_select_tinh);
    
    if(isset($_POST["btnThemTinh"])){
        $maTinh = $_POST["maTinh"];
        $tenTinh = $_POST["tenTinh"]; 
        $query_insert_tinh = "INSERT INTO tbl_diadiem_tinh  Value ('$maTinh', '$tenTinh')";
        $result_insert_tinh = $conn->query($query_insert_tinh);

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
    <link rel="stylesheet" href="../ADMIN/assets/css/style.css">
    <link rel="stylesheet" href="./css/base.css">
</head>

<body class="body-form">
    <div class="form-huy text-center">
        <div class="form-signin">
            <form action="" method="post">
                <h1 class="h3 mb-3 fw-normal">THÊM ĐỊA ĐIỂM</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="maTinh"
                        placeholder="name@example.com">
                    <label for="floatingInput">Mã Tỉnh/Thành phố: </label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingPassword" name="tenTinh" placeholder="Password">
                    <label for="floatingPassword">Tên Tỉnh/Thành phố: </label>
                </div>
                <div style="display:flex; justify-content: space-between">
                    <a href="pagePlaces.php" class="link-insert">
                        <button class=" btn btn-lg btn-primary" type="button">Quay lại</button>
                    </a>
                    <a href="#" class="link-insert">
                        <button class=" btn btn-lg btn-primary" name="btnThemTinh" type="submit">Thêm</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>