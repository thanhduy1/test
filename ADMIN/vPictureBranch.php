<?php
    require_once("connection.php");
    $hinhAnh = $_GET['idha'];
    $query_select_hinhAnh = "SELECT * FROM tbl_diadiem_chinhanh where hinhAnhChiNhanh='$hinhAnh'";
    $result_select_hinhAnh = mysqli_query($conn, $query_select_hinhAnh);
    $arrData = mysqli_fetch_assoc($result_select_hinhAnh);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="body-form">
    <div class="form-huy text-center">
        <div class="form-signin">
            <img src="<?php echo $arrData['hinhAnhChiNhanh'] ?>" alt="hinh anh" width="100%" height="100%">
        </div>
    </div>
</body>

</html>