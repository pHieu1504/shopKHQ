<div class="main5" style="margin-top: 20px;">

	<?php
	if (isset($_POST['dangnhap'])) {
		$email = $_POST['email'];
		$matkhau = md5($_POST['password']);

		// Kiểm tra đăng nhập từ bảng tbl_dangky
		$sql_dangky = "SELECT * FROM tbl_dangky WHERE email='" . $email . "' AND matkhau='" . $matkhau . "' LIMIT 1";
		$row_dangky = mysqli_query($mysqli, $sql_dangky);
		$count_dangky = mysqli_num_rows($row_dangky);

		if ($count_dangky > 0) {
			$row_data = mysqli_fetch_array($row_dangky);
			$_SESSION['dangky'] = $row_data['tenkhachhang'];
			$_SESSION['id_khachhang'] = $row_data['id_dangky'];
			echo "<script>window.location.href='index.php?quanly=home';</script>"; // Dùng JS thay vì header
			exit();
		} else {
			// Kiểm tra đăng nhập từ bảng tbl_admin
			$sql_admin = "SELECT * FROM tbl_admin WHERE username='" . $email . "' AND password='" . $matkhau . "' LIMIT 1";
			$row_admin = mysqli_query($mysqli, $sql_admin);
			$count_admin = mysqli_num_rows($row_admin);

			if ($count_admin > 0) {
				$row_admin_data = mysqli_fetch_array($row_admin);

				// Kiểm tra quyền admin
				if ($row_admin_data['admin_status'] == 1) { // admin_status là 1 nếu là quản trị viên
					$_SESSION['admin'] = $row_admin_data['username'];
					$_SESSION['admin_id'] = $row_admin_data['id_admin'];
					echo "<script>window.location.href='admin/dashboard.php';</script>"; // Đưa đến trang admin
				} else {
					$loi = "❌ Bạn không có quyền truy cập vào hệ thống quản trị.";
				}
			} else {
				$loi = "❌ Mật khẩu hoặc Email sai, vui lòng nhập lại.";
			}
		}
	}
	?>

	<div class="form_login">
		<div class="form_login-content">
			<h1>Đăng Nhập</h1>

			<?php if (!empty($loi)) { ?>
				<p style="color: red; font-weight: bold;"><?php echo $loi; ?></p>
			<?php } ?>

			<form action="" method="POST" autocomplete="off">

				<div class="login1">
					<input type="email" name="email" placeholder="Email của bạn" required>
				</div>
				<div class="login1">
					<input type="password" name="password" placeholder="Nhập Mật Khẩu" required>
				</div>

				<input type="submit" name="dangnhap" value="Đăng Nhập" class="login-btn">

				<!-- Nút đăng ký tách ra để không nằm trong form -->
				<a href="index.php?quanly=dangky" class="login-btn check-btn" style="text-align: center; display: inline-block; margin-top: 10px;">Đăng ký</a>

			</form>
		</div>
	</div>
</div>