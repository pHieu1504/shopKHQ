<div class="main5" style="margin-top: 20px;">
<?php
	if(isset($_POST['dangky'])) {
		$tenkhachhang = $_POST['hovaten'];
		$email = $_POST['email'];
		$dienthoai = $_POST['dienthoai'];
		$matkhau = md5($_POST['matkhau']);
		$diachi = $_POST['diachi'];
		$sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
		if($sql_dangky){
			if($tenkhachhang!="" && $email!="" && $diachi!="" && $dienthoai!="" && $matkhau!=""){
					echo '<p style="color:green">Bạn đã đăng ký thành công</p>';
			$_SESSION['dangky'] = $tenkhachhang;
			$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
			header('Location:index.php?quanly=home');
			} 
			 else {
			  	echo '<p style="color:green">Bạn đã đăng ký thành công</p>' ;
			}
		
		}
	}
?>

<div class="form_login">
<div class="form_login-content">
<h1> Đăng Kí </h1>
<form action="" method="POST">
  <div class="login1">
	  <input type="text" name="hovaten"  placeholder="Họ và Tên ">

  </div>
  <div class="login1">
	  <input type="email" name="email" placeholder="Email của bạn ">
  </div>
  <div class="login1">
	  <input type="password" name="matkhau" placeholder="Nhập Mật Khẩu">
  </div>
  <div class="login1">
	  <input type="tel" name="dienthoai" pattern="[0-9]{10}" placeholder="Nhập Điện thoại">
  </div>
  <div class="login1">
	  <input type="text" name="diachi" placeholder="Nhập địa chỉ">
  </div>
  <input type="submit" name="dangky" value="Đăng ký" class="login-btn">
 <button class="login-btn link-login"> <a href="index.php?quanly=dangnhap" class="check-btn">Đăng nhập nếu có tài khoản</a></button>

</form>
</div>
</div></div>
