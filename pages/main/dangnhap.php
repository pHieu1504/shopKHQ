<div class="main5" style="margin-top: 20px;">

<?php
	if(isset($_POST['dangnhap'])){
		$email = $_POST['email'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);

		if($count>0){
			$row_data = mysqli_fetch_array($row);
			$_SESSION['dangky'] = $row_data['tenkhachhang'];
			$_SESSION['id_khachhang'] = $row_data['id_dangky'];
			header('Location:index.php?quanly=home');
		}else{
			echo '<p style="color:red">Mật khẩu hoặc Email sai ,vui lòng nhập lại.</p>';
			
		}
	} 
?>
<div class="form_login">
<div class="form_login-content">
<h1> Đăng Nhập </h1>
<form action="" method="POST" autocomplete="off">
 
  <div class="login1">
	  <input type="email" name="email" placeholder="Email của bạn ">
  </div>
  <div class="login1">
	  <input type="password" name="password" placeholder="Nhập Mật Khẩu">
  </div>
 
 
  <input type="submit" name="dangnhap" value="Đăng Nhập" class="login-btn">
 <button class="login-btn link-login"> <a href="index.php?quanly=dangky" class="check-btn">Đăng kí</a></button>

</form>
</div>
</div>
</div>