<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
include("admincp/config/config.php");


$thongbao = '';

if (isset($_POST['dangky'])) {
	$tenkhachhang = trim($_POST['hovaten']);
	$email = trim($_POST['email']);
	$dienthoai = trim($_POST['dienthoai']);
	$diachi = trim($_POST['diachi']);
	$matkhau = trim($_POST['matkhau']);
	$matkhau_md5 = md5($matkhau);

	// Kiểm tra dữ liệu không được để trống
	if ($tenkhachhang == "" || $email == "" || $dienthoai == "" || $diachi == "" || $matkhau == "") {
		$thongbao = '<p style="color:red">Vui lòng điền đầy đủ thông tin.</p>';
	} else {
		// Kiểm tra email đã tồn tại chưa
		$check_email = mysqli_query($mysqli, "SELECT * FROM tbl_dangky WHERE email='$email'");
		if (mysqli_num_rows($check_email) > 0) {
			$thongbao = '<p style="color:red">Email đã tồn tại. Vui lòng dùng email khác.</p>';
		} else {
			// Insert vào database
			$sql = "INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai) 
        VALUES('$tenkhachhang', '$email', '$diachi', '$matkhau', '$dienthoai')";
			$sql_dangky = mysqli_query($mysqli, $sql);

			if ($sql_dangky) {
				// Thành công
			} else {
				echo '<p style="color:red">Lỗi SQL: ' . mysqli_error($mysqli) . '</p>';
			}

			if ($sql_dangky) {
				$_SESSION['dangky'] = $tenkhachhang;
				$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
				header('Location: index.php?quanly=home');
				exit();
			} else {
				$thongbao = '<p style="color:red">Lỗi khi đăng ký. Vui lòng thử lại.</p>';
			}
		}
	}
}
?>

<div class="main5" style="margin-top: 20px;">
	<div class="form_login">
		<div class="form_login-content">
			<h1>Đăng Ký</h1>
			<?php echo $thongbao; ?>
			<form action="" method="POST">
				<div class="login1">
					<input type="text" name="hovaten" placeholder="Họ và Tên" required>
				</div>
				<div class="login1">
					<input type="email" name="email" placeholder="Email của bạn" required>
				</div>
				<div class="login1">
					<input type="password" name="matkhau" placeholder="Nhập Mật Khẩu" required>
				</div>
				<div class="login1">
					<input type="tel" name="dienthoai" pattern="[0-9]{10}" placeholder="Nhập Điện thoại" required>
				</div>
				<div class="login1">
					<input type="text" name="diachi" placeholder="Nhập địa chỉ" required>
				</div>
				<input type="submit" name="dangky" value="Đăng ký" class="login-btn">
				<button class="login-btn link-login">
					<a href="index.php?quanly=dangnhap" class="check-btn">Đăng nhập nếu có tài khoản</a>
				</button>
			</form>
		</div>
	</div>
</div>