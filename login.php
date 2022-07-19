<?php
require_once("connection.php");
		if(isset($_POST["btnDangNhap"])){

			$userName = $_POST["userName"];
			$password = $_POST["password"];
            
			$passwordMH = md5($_POST["password"]);
			$rows = mysqli_query($conn,"
				select * from tbl_user where userName = '$userName' and password = '$passwordMH'
			");

            $select_Quyen = "SELECT * from tbl_user where userName = '$userName'";
            $result_Quyen = $conn->query($select_Quyen);
                $Quyen = mysqli_fetch_assoc($result_Quyen);

        
			$count = mysqli_num_rows($rows);
			if($count==1){
                if($Quyen["role"]==1){
                    $_SESSION["loged"] = $userName; 
				    header("location:../Admin/index.php");
                }
				else{
                    $_SESSION["loged"] = $userName; 
                    $query_select_TaiKhoan = "SELECT * FROM tbl_user, tbl_khachhang 
                    where tbl_user.phoneUser = tbl_khachhang.phoneUser 
                    AND tbl_user.userName = '$userName'";
                    $result_select_TaiKhoan = $conn->query($query_select_TaiKhoan);
                    $arrUser = mysqli_fetch_assoc($result_select_TaiKhoan);
                    $_SESSION["phone"] = $arrUser["phoneUser"];

                    header("location:inforCustomer.php");
                }
			
			}
			else{
				 echo "<script type='text/javascript'>alert('Tên tài khoản hoặc mật khẩu không đúng!');</script>";
			}
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
            <form action="" method="POST">
                <img class="mb-4" src="../ADMIN/assets/img/Logo.png" alt="" width="90" height="90">
                <h1 class="h3 mb-3 fw-normal">ĐĂNG NHẬP</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="userName">
                    <label for="userName">Tên đăng nhập: </label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    <label for="password">Mật khẩu: </label>
                </div>
                <div class="create_account">
                    <span>Chưa có tài khoản? <a href="signup.php">đăng ký</a></span>
                </div>
                <div class="btn__form-huy">
                    <a href="index.php" class="link-insert">
                        <button class=" btn btn-lg btn-primary btn-huy" type="button">Trang chủ</button>
                    </a>
                    <a href="#" class="link-insert">
                        <button class=" btn btn-lg btn-primary btn-huy" name="btnDangNhap" type="submit">Đăng
                            nhập</button>
                    </a>
                </div>
                <p class="mt-5 mb-3 text-muted">© jollibee</p>
            </form>
        </div>
    </div>
</body>

</html>