<?php
	session_start();
	include('config/config.php');
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['username'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$_SESSION['dangnhap'] = $taikhoan;
			header("Location:index.php");
		}else{
			echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng,vui lòng nhập lại.");</script>';
			header("Location:login.php");
		}
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<p>tk đăng nhập : quan</p>
	<p>password : 123456789</p>
	<title>Đăng nhập Admincp</title>
	<style type="text/css">
		body{
			background:#000;
		}
		
		table.table-login {
		    width: 100%;
		}
		table.table-login tr td {
		    padding: 5px;
		}
	</style>
</head>
<body>


<div class="wrapper-login">
	<form action="" autocomplete="off" method="POST">
		<div class="login-title">
			Đăng nhập trang admin
		</div>
		<div class="login-admin">
			<input type="text" placeholder="Tài Khoản" name="username">
			<input type="password" placeholder="*******" name="password">
		</div>
		<div class="admin-btn">
			<input type="submit" name="dangnhap" value="Đăng Nhập" >
		</div>
	</form>

</div>

<style>
	.wrapper-login{
		width:600px;
		margin: 0 auto;
		padding: 20px;
		border: 1px solid #ccc;
		border-radius: 10px;
	}
	.login-title{
		margin-top: 10px;
		color: #fff;
		text-transform: uppercase;
		text-align: center;
		margin-bottom: 20px;
		font-size: 30px;
	}
	.login-admin{
		margin-top: 20px;

	}
	.login-admin input{
		width: 100%;
		margin-top: 10px;
		height: 30px;
		background-color: #fff;
		border: none;
		padding: 5px;
		border-radius: 10px;
	}
	.login-admin input:focus{
		outline: none;
	}
    .admin-btn{
		width: 100px;
		margin: 0 auto;
		margin-top: 20px;
	
		
	}
	.admin-btn input{
		padding: 10px;
		background: #fff;
		background: red;
		color:#fff;
		border: none;
		cursor: pointer;
		border-radius: 5px;
	}
</style>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
