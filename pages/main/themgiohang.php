<?php
session_start();
include('../../admincp/config/config.php');
//them so luong
if (isset($_POST['them_theo_ten'])) {
	$tensp = mysqli_real_escape_string($mysqli, $_POST['tensp']);
	$soluong = (int) $_POST['soluong'];

	// Tìm sản phẩm theo tên
	$sql_sp = "SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%$tensp%' LIMIT 1";
	$query_sp = mysqli_query($mysqli, $sql_sp);
	$row = mysqli_fetch_array($query_sp);

	if ($row) {
		$new_item = array(
			'id' => $row['id_sanpham'],
			'tensanpham' => $row['tensanpham'],
			'masp' => $row['masp'],
			'hinhanh' => $row['hinhanh'],
			'giasp' => $row['giasp'],
			'sale' => $row['sale'],
			'soluong' => $soluong
		);

		// Kiểm tra nếu giỏ hàng đã có
		if (isset($_SESSION['cart'])) {
			$found = false;
			foreach ($_SESSION['cart'] as &$item) {
				if ($item['id'] == $new_item['id']) {
					$item['soluong'] += $soluong;
					$found = true;
					break;
				}
			}
			if (!$found) {
				$_SESSION['cart'][] = $new_item;
			}
		} else {
			$_SESSION['cart'][] = $new_item;
		}
	}

	// Quay lại trang giỏ hàng
	header('Location: ../../index.php?quanly=giohang');
}

if (isset($_GET['cong'])) {
	$id = $_GET['cong'];
	foreach ($_SESSION['cart'] as $cart_item) {
		if ($cart_item['id'] != $id) {
			$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'sale' => $cart_item['sale'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
			$_SESSION['cart'] = $product;
		} else {
			$tangsoluong = $cart_item['soluong'] + 1;
			if ($cart_item['soluong'] <= 99) {

				$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'sale' => $cart_item['sale'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
			} else {
				$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'sale' => $cart_item['sale'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
			}
			$_SESSION['cart'] = $product;
		}
	}
	header('Location:../../index.php?quanly=giohang');
}
//tru so luong
if (isset($_GET['tru'])) {
	$id = $_GET['tru'];
	foreach ($_SESSION['cart'] as $cart_item) {
		if ($cart_item['id'] != $id) {
			$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'sale' => $cart_item['sale'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
			$_SESSION['cart'] = $product;
		} else {
			$tangsoluong = $cart_item['soluong'] - 1;
			if ($cart_item['soluong'] > 1) {

				$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'sale' => $cart_item['sale'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
			} else {
				$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'sale' => $cart_item['sale'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
			}
			$_SESSION['cart'] = $product;
		}
	}
	header('Location:../../index.php?quanly=giohang');
}
//xoa san pham
if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
	$id = $_GET['xoa'];
	foreach ($_SESSION['cart'] as $cart_item) {

		if ($cart_item['id'] != $id) {
			$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'sale' => $cart_item['sale'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
		}

		$_SESSION['cart'] = $product;
		header('Location:../../index.php?quanly=giohang');
	}
}
//xoa tat ca
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
	unset($_SESSION['cart']);
	header('Location:../../index.php?quanly=giohang');
}
//them sanpham vao gio hang
if (isset($_POST['themgiohang'])) {
	//session_destroy();
	$id = $_GET['idsanpham'];
	$soluong = 1;
	$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
	$query = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($query);
	if ($row) {
		$new_product = array(array('tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'sale' => $row['sale'], 'giasp' => $row['giasp'], 'hinhanh' => $row['hinhanh'], 'masp' => $row['masp']));
		//kiem tra session gio hang ton tai
		if (isset($_SESSION['cart'])) {
			$found = false;
			foreach ($_SESSION['cart'] as $cart_item) {
				//neu du lieu trung
				if ($cart_item['id'] == $id) {
					$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $soluong + 1, 'sale' => $cart_item['sale'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
					$found = true;
				} else {
					//neu du lieu khong trung
					$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'sale' => $cart_item['sale'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
				}
			}
			if ($found == false) {
				//lien ket du lieu new_product voi product
				$_SESSION['cart'] = array_merge($product, $new_product);
			} else {
				$_SESSION['cart'] = $product;
			}
		} else {
			$_SESSION['cart'] = $new_product;
		}
	}
	header('Location:../../index.php?quanly=giohang');
}
