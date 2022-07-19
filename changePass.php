<?php
require_once("connection.php");
    $User = $_GET["userName"];
    $Phone = $_GET["phone"];
		if(isset($_POST["btnDangNhap"])){

			$passwordOld = $_POST["passwordOld"];
			$passwordNew1 = $_POST["passwordNew1"];
			$passwordNew2 = $_POST["passwordNew2"];

			$passwordOldMH = md5($_POST["passwordOld"]);
			$passwordNewMH = md5($_POST["passwordNew1"]);
			$rows = mysqli_query($conn,"
				select * from tbl_user where userName = '$User' and password = '$passwordOldMH'
			");
			$count = mysqli_num_rows($rows);
			if($count==1){
                if($passwordNew1==$passwordNew2){
                    $rows = mysqli_query($conn,"
				update  tbl_user set password = '$passwordNewMH' where phoneUser = '$Phone'
			");
            header("location:index.php");
                }
                else{
                    echo "<script type='text/javascript'>alert('Nhập lại mật khẩu không trùng!');</script>";
                }
			}
			else{
				 echo "<script type='text/javascript'>alert('Sai mật khẩu!');</script>";
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
                    <input type="text" class="form-control" id="userName" value="<?php echo $User?>" readonly>
                    <label for="userName">Tên đăng nhập: </label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="passwordOld" name="passwordOld"
                        placeholder="passwordOld">
                    <label for="passwordOld">Mật khẩu cũ: </label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="passwordNew1" name="passwordNew1"
                        placeholder="passwordNew1">
                    <label for="passwordNew1">Mật khẩu mới: </label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="passwordNew2" name="passwordNew2"
                        placeholder="passwordNew2">
                    <label for="passwordNew2">Nhập lại mật khẩu mới: </label>
                </div>
                <div class="btn__form-huy">
                    <a href="index.php" class="link-insert">
                        <button class=" btn btn-lg btn-primary btn-huy" type="button">Trang chủ</button>
                    </a>
                    <a href="#" class="link-insert">
                        <button class=" btn btn-lg btn-primary btn-huy" name="btnDangNhap" type="submit">Cập
                            nhật</button>
                    </a>
                </div>
                <p class="mt-5 mb-3 text-muted">© jollibee</p>
            </form>
        </div>
    </div>
</body>

</html>