<?php
// Kiểm tra người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['id_khachhang'])) {
    header('Location: index.php?quanly=dangky');
    exit;
}

$id_khachhang = $_SESSION['id_khachhang'];

// Lấy danh sách đơn hàng của khách hàng
$sql_orders = "SELECT * FROM tbl_donhang WHERE id_khachhang = '$id_khachhang' ORDER BY ngaydat DESC";
$query_orders = mysqli_query($mysqli, $sql_orders);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Bootstrap Card -->
<div class="container mt-5">
    <h2 class="mb-4 text-center">Đơn hàng của bạn</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID Đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row_order = mysqli_fetch_array($query_orders)) { ?>
                    <tr>
                        <td><?php echo $row_order['id_donhang']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($row_order['ngaydat'])); ?></td>
                        <td><?php echo number_format($row_order['tongtien'], 0, ',', '.') . ' vnđ'; ?></td>
                        <td>
                            <?php
                            $status = $row_order['trangthai'];
                            switch ($status) {
                                case 'confirmed':
                                    echo '<span class="badge bg-primary">Đã xác nhận</span>';
                                    break;
                                case 'shipping':
                                    echo '<span class="badge bg-warning text-dark">Đang giao</span>';
                                    break;
                                case 'completed':
                                    echo '<span class="badge bg-success">Hoàn thành</span>';
                                    break;
                                case 'cancelled':
                                    echo '<span class="badge bg-danger">Đã hủy</span>';
                                    break;
                                default:
                                    echo '<span class="badge bg-secondary">Chờ xử lý</span>';
                                    break;
                            }
                            ?>
                        </td>
                        <td>
                            <a href="donhangchitiet.php?id=<?php echo $row_order['id_donhang']; ?>" class="btn btn-sm btn-outline-info">Xem chi tiết</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>