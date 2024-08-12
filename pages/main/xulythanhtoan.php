<?php
session_start();
include("../../admincp/config/config.php"); // Kết nối đến database

if(isset($_SESSION['dangky']) && isset($_SESSION['cart'])) {
    $id_khachhang = $_SESSION['dangky_id'];
    $tongtien = 0;
    foreach($_SESSION['cart'] as $cart_item) {
        $tongtien += ($cart_item['soluong'] * $cart_item['giasp'] * (100 - $cart_item['sale'])) / 100;
    }
    $sql_donhang = "INSERT INTO tbl_donhang(id_khachhang, tongtien, trangthai, ngaydat) VALUES('$id_khachhang', '$tongtien', 'pending', NOW())";
    $mysqli->query($sql_donhang);
    $id_donhang = $mysqli->insert_id;

    foreach($_SESSION['cart'] as $cart_item) {
        $masp = $cart_item['masp'];
        $soluong = $cart_item['soluong'];
        $gia = $cart_item['giasp'];
        $thanhtien = ($soluong * $gia * (100 - $cart_item['sale'])) / 100;

        $sql_chitiet = "INSERT INTO tbl_chitietdonhang( id_sanpham, soluong) VALUES('$id_sanpham', '$soluong')";
        $mysqli->query($sql_chitiet);
    }

    unset($_SESSION['cart']);
    header('Location: ../../index.php?quanly=camon');
}
?>
