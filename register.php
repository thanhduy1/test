<?php 	

	include "menu.php";
	$tendn='';$pas='';$pas1='';$email='';$usernameErr='';$PasswordErr='';$PasswordErr1='';$vaitro='khach';$vaitroer='';$emailer='';$mess='';
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		if (empty($_POST['tendn'])) 
			$usernameErr="Ban can nhap username";
		else{
			if (!preg_match("/^[a-z0-9']*$/",$_POST['tendn'])) {
			$usernameErr="Bạn cần nhập đúng ký tự";
			}
			else $tendn=$_POST['tendn'];
		}
		if (empty($_POST['email'])) $emailer="Ban can nhap email";
		else
		$email=$_POST['email'];
		
		if (empty($_POST['matkhau'])) $PasswordErr="Ban can nhap password";
		else
		$pas=md5($_POST['matkhau']);
		if (empty($_POST['matkhau1'])) $PasswordErr1="Ban can nhap lai password";
		else
		$pas1=md5($_POST['matkhau1']);
		
		if($tendn==''||$pas==''||$pas1==''){
		}
		else{
			$sql="SELECT * FROM taikhoan WHERE tendn='$tendn'";
			$kq=mysqli_query($conn,$sql);
			if (mysqli_num_rows($kq)>0) {
				$mess="Tài khoản đã tồn tại";
			}
			else{
				$sql="INSERT INTO taikhoan(tendn,matkhau,email,vaitro) VALUES('$tendn','$pas','$email','$vaitro')";
				$ketqua=mysqli_query($conn,$sql);
				$mess="Đăng ký thành công >.< ";
				echo '<script>
				alert("Đăng kí thành công");
				function load(){ location.replace("login.php") ;}  
				 load();
				</script>';
			
				
			}
		}
		
	}			
?>
<!DOCTYPE html>
<html lang="zxx">



<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
	<script type="text/javascript">
    function checkEmail() {
        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email.value)) {
            alert('Hay nhap dia chi email hop le.\nExample@gmail.com');
            email.focus;
            return false;
        }
        else
        {
			function hoanthanh(){ 
        		location.replace("index.php") ;

        	} 
     		hoanthanh();
        }
    }
</script>

</head>

<body>
	<div class="site-wrapper" id="top">
		<div class="site-header d-none d-lg-block">
			
			
		</div>
		
	
		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div  class="row">
					<?php 
					
					if ($tendn!=''&&$pas!=''&&$pas1!=''&&$vaitro!=''&&$mess=='') {
						}
						else{
					?>
					<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
						<form action="register.php" method="POST">
							<div class="login-form">
								<h4 class="login-title">Đã có tài khoản?</h4>
								<p><span class="font-weight-bold">Bạn đã là một thành viên của DNN? đăng nhập ngay!</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label >Nhập tên đăng nhập</label>
										<input class="mb-0 form-control" type="text" name="tendn" value="<?php echo $tendn; ?>">
										<?php echo $usernameErr ?> 
											
									</div>
									<div class="col-12 mb--20">
										<label>Mật khẩu</label>
										<input class="mb-0 form-control"  type="password"  name="matkhau"><?php echo $PasswordErr; ?>
									</div>
									<div class="col-12 mb--20">
										<label >Nhập lại mật khẩu</label>
										<input class="mb-0 form-control"  type="password"  name="matkhau1"><?php echo $PasswordErr; ?>
									</div>
									<div class="col-md-12 col-12 mb--15">
										<label>email</label>
										<input class="mb-0 form-control" type="text"name="email" id="email" value="<?php echo $email; ?>" >
										<?php echo $emailer ?> 
											
									</div>
									<div class="col-md-12">
										<input class="btn btn-outlined" style="background-color:#64a3f5;"   type="submit" name="check" value="Đăng ký" onclick="checkEmail();">
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php 
		}
	 ?>
	 
				</div>
			</div>
		</main>
	</div>
	<?php include "footer.php" ?>

</body>



</html>