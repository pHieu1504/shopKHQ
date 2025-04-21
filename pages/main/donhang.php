<?php


// Kiểm tra người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['id_khachhang'])) {
    header('Location: index.php?quanly=dangky'); // Nếu chưa đăng nhập, chuyển hướng đến trang đăng ký
    exit;
}

$id_khachhang = $_SESSION['id_khachhang'];

// Lấy danh sách đơn hàng của khách hàng
$sql_orders = "SELECT * FROM tbl_donhang WHERE id_khachhang = '$id_khachhang' ORDER BY ngaydat DESC";
$query_orders = mysqli_query($mysqli, $sql_orders);
?>

<h2>Đơn hàng của bạn</h2>

<table border="1" style="width:100%;text-align:center;">
    <tr>
        <th>ID Đơn hàng</th>
        <th>Ngày đặt</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Chi tiết</th>
    </tr>
    <?php
    while ($row_order = mysqli_fetch_array($query_orders)) {
    ?>
        <tr>
            <td><?php echo $row_order['id_donhang']; ?></td>
            <td><?php echo $row_order['ngaydat']; ?></td>
            <td><?php echo number_format($row_order['tongtien'], 0, ',', '.') . ' vnđ'; ?></td>
            <td><?php echo $row_order['trangthai']; ?></td>
            <td><a href="donhangchitiet.php?id=<?php echo $row_order['id_donhang']; ?>">Xem chi tiết</a></td>
        </tr>
    <?php
    }
    ?>
</table>