<?php include "menu.php";

 	$ten='';$pas='';$usernameErr='';$PasswordErr='';
 	$t='';$s='';$id='';
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		if (empty($_POST['tendn'])) {
			$usernameErr="Ban can nhap username";
			if (!preg_match("/^[a-z0-9']*$/",$ten)) {
			$usernameErr="Bạn cần nhập đúng ký tự";
			}
		}
		else
		$ten=$_POST['tendn'];
		if (empty($_POST['mk'])) $PasswordErr="Ban can nhap password";
		else
		$pas=md5($_POST['mk']);
		$sql = "SELECT * FROM taikhoan WHERE tendn = '$ten' AND   matkhau = '$pas' ";
		$ketqua = mysqli_query($conn,$sql);
		$row = mysqli_num_rows($ketqua);
		$data=mysqli_fetch_assoc($ketqua);
		
		if ($row!=1 || !$data) {
			$s= "<p align='center'><b style='color:red'>tên đăng nhập</b> hoặc <b style='color:red'>mật khẩu</b> không đúng !</p> <br>";
		}else{
			$id=$data['id'];
			$t="tc";
			$s= "<p align='center'>Chào mừng bạn đã đến, <b style='color:red'>$ten<b></p> <br>";
			echo'
			<script > 
        	  
        	function hoanthanh(){ 
        		location.replace("index.php") ;

        	} 
     			hoanthanh();
 </script>';
		}
		
	}
 ?>
 
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.hasthemes.com/pustok-preview/pustok/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Nov 2020 14:59:43 GMT -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SWA Shop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>

<body>
	<div class="site-wrapper" id="top">
		<div class="site-header d-none d-lg-block">
			
			
		</div>
		
	
		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div  class="row">
					<?php 
					
						if ($t=="tc") {
							$admin=$data['vaitro'];
							$_SESSION['vt']=$admin;
							$_SESSION['ten']=$ten;
							$_SESSION['id']=$id;
						}
						else{
					?>
					<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
						<form action="login.php" method="POST">
							<div class="login-form">
								<h4 class="login-title">Đã có tài khoản?</h4>
								<p><span class="font-weight-bold">Bạn đã có tài khoản của DNN? đăng nhập ngay!</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email">Nhập tên đăng nhập ở đây</label>
										<input class="mb-0 form-control" type="text" name="tendn" placeholder="Nhập tên đăng nhập">
										<?php echo $usernameErr ?> 
											
									</div>
									<div class="col-12 mb--20">
										<label for="password">Mật khẩu</label>
										<input class="mb-0 form-control"  type="password" name="mk" placeholder="Nhập mật khẩu"><?php echo $PasswordErr; ?>
									</div>
									<div class="col-md-12">
										<input class="btn btn-outlined" style="background-color:#64a3f5;"   type="submit" name="" value="Đăng nhập">
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