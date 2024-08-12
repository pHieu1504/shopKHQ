<h2>Quản lý đơn hàng</h2>
<table border="1" style="width:100%;text-align:center;">
    <tr>
        <th>ID</th>
        <th>Khách hàng</th>
        <th>Tổng tiền</th>
        <th>Ngày đặt</th>
        <th>Trạng thái</th>
        <th>Chi tiết</th> <!-- Thêm cột này -->
        <th>Hành động</th>
    </tr>
    <?php
    while($row = $orders->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $row['id_donhang']; ?></td>
        <td><?php echo $row['tenkhachhang']; ?></td>
        <td><?php echo number_format($row['tongtien'], 0, ',', '.').' vnđ'; ?></td>
        <td><?php echo $row['ngaydat']; ?></td>
        <td><?php echo $row['trangthai']; ?></td>
        <td><a href="chitietdonhang.php?id=<?php echo $row['id_donhang']; ?>">Xem chi tiết</a></td> <!-- Link đến trang chi tiết -->
        <td>
            <form method="POST">
                <input type="hidden" name="order_id" value="<?php echo $row['id_donhang']; ?>">
                <select name="status">
                    <option value="pending" <?php if($row['trangthai'] == 'pending') echo 'selected'; ?>>Pending</option>
                    <option value="processing" <?php if($row['trangthai'] == 'processing') echo 'selected'; ?>>Processing</option>
                    <option value="shipped" <?php if($row['trangthai'] == 'shipped') echo 'selected'; ?>>Shipped</option>
                    <option value="delivered" <?php if($row['trangthai'] == 'delivered') echo 'selected'; ?>>Delivered</option>
                </select>
                <button type="submit" name="update_status">Cập nhật</button>
            </form>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
