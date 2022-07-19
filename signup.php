<?php 
require_once("connection.php");
 if(isset($_POST["btnSignUp"])){
          
            $phoneNumber = $_POST["phoneNumber"];
			$userName = $_POST["userName"];
			$password1 = $_POST["password1"];
			$password2 = $_POST["password2"];

			if($password1 != $password2){
				echo "<script type='text/javascript'>alert('LOI');</script>";
			}
			else{

				$password = md5($password1);
				$query_insert_dangKy = "INSERT INTO tbl_user (phoneUser,userName,password) 
                Values ('$phoneNumber', '$userName','$password')";

                $result_insert_dangKy = $conn->query($query_insert_dangKy);
               
				
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
                <h1 class="h3 mb-3 fw-normal">ĐĂNG KÝ</h1>

                <div class="form-floating">
                    <input type="tel" class="form-control" maxlength="10" id="phoneNumber" name="phoneNumber"
                        placeholder="phoneNumber" required>
                    <label for="phoneNumber">Số điện thoại: </label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="userName"
                        required>
                    <label for="userName">Tên đăng nhập: </label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password1"
                        required>
                    <label for="password1">Mật khẩu: </label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Password2"
                        required>
                    <label for="password2">Nhập lại mật khẩu: </label>
                </div>
                <div class="btn__form-huy">
                    <a href="index.php" class="link-insert">
                        <button class=" btn btn-lg btn-primary btn-huy" type="button">Trang chủ</button>
                    </a>
                    <a href="" class="link-insert">
                        <button class=" btn btn-lg btn-primary btn-huy" name="btnSignUp" type="submit">Đăng ký</button>
                    </a>
                </div>
                <p class="mt-5 mb-3 text-muted">© jollibee</p>
            </form>
        </div>
    </div>

</body>

</html>