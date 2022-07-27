<?php 
require_once("connection.php");
 if(isset($_POST["btnSignUp"])){
        $phoneNumber = $_POST["phoneNumber"];
        $userName = $_POST["userName"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];

        if($password1 != $password2){
            echo "<script type='text/javascript'>alert('Nhập lại mật khẩu không trùng nhau!');</script>";
        }
        else{
            $password = md5($password1);
            $query_insert_dangKy = "INSERT INTO tbl_user (phoneUser,userName,password) 
            Values ( '$phoneNumber', '$userName','$password','$fullName')";

            $result_insert_dangKy = $conn->query($query_insert_dangKy);
            
        }
    }
?>

<form action="" method="POST">
    <br>
    <div class="align-center">
        <h1 class="h3 mb-3 fw-normal mt-40">THÊM TÀI KHOẢN</h1>
    </div>

    <div class="form-floating">
        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="phoneNumber" required>
        <label for="phoneNumber">Số điện thoại: </label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="userName" name="userName" placeholder="userName" required>
        <label for="userName">Tên đăng nhập: </label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password1" required>
        <label for="password1">Mật khẩu: </label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="password2" name="password2" placeholder="Password2" required>
        <label for="password2">Nhập lại mật khẩu: </label>
    </div>
    <a href="" class="link-insert">
        <button class=" btn btn-lg btn-primary btn-huy" name="btnSignUp" type="submit">Thêm</button>
    </a>
</form>