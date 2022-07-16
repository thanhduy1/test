
<!DOCTYPE html>
<html>
<head>
	<title>Đăng xuất</title>
	<script > 
        	  
        	function hoanthanh(){ 
        		location.replace("index.php") ;

        	} 
     			hoanthanh();
 </script>
</head>
<body>
	<?php include("index.php") ?>
	<?php  
	session_destroy();
	?>
</body>
</html>