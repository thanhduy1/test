<?php 
    require_once("connection.php");
    $suaTaiKhoan = $_GET['idtk'];
    $query_select_taiKhoan = "SELECT * FROM tbl_user where phoneUser='$suaTaiKhoan'";
    $result_select_taiKhoan = mysqli_query($conn, $query_select_taiKhoan);
    $arrDataTK = mysqli_fetch_assoc($result_select_taiKhoan);
    
    if(isset($_POST["btnSuaTaiKhoan"])){
        $phoneUser = $_POST["phoneUser"];
        $userName = $_POST["userName"];
        $password = $_POST["password"];
        $role = $_POST["role"];

        $query_update_taiKhoan = "UPDATE tbl_user 
        SET userName = '$userName', password='$password', phoneUser='$phoneUser',role='$role'
        WHERE phoneUser='$suaTaiKhoan'";
        $result_update_taiKhoan = mysqli_query($conn, $query_update_taiKhoan);
        header("location:pageAccounts.php");
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
        <form action="" method="POST">
            <div class="align-center dis-f">
                <h1 class="h3 mb-3 fw-normal mt16">SỬA TÀI KHOẢN</h1>
            </div>

            <div class="form-floating">
                <input type="tel" class="form-control" maxlength="10" id="phoneNumber" name="phoneUser"
                    placeholder="phoneNumber" required value="<?php echo $arrDataTK["phoneUser"]?>">
                <label for="phoneNumber">Số điện thoại: </label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="userName" name="userName" placeholder="userName" required
                    value="<?php echo $arrDataTK["userName"]?>">
                <label for="userName">Tên đăng nhập: </label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="password" name="password" placeholder="Password" required
                    value="<?php echo $arrDataTK["password"]?>">
                <label for="password">Mật khẩu: </label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="role" name="role" placeholder="role" required
                    value="<?php echo $arrDataTK["role"]?>">
                <label for="role">Quyền: </label>
            </div>

            <a href="" class="link-insert">
                <button class=" btn btn-lg btn-primary btn-huy" name="btnSuaTaiKhoan" type="submit">Sửa</button>
            </a>
        </form>
    </div>
</body>

</html>