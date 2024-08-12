<?php

if(isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Lấy thông tin đơn hàng
    $sql_order = "SELECT * FROM tbl_donhang WHERE id_donhang='$order_id'";
    $result_order = $mysqli->query($sql_order);
    $order = $result_order->fetch_assoc();

    // Lấy chi tiết sản phẩm trong đơn hàng
    $sql_order_details = "SELECT * FROM tbl_chitietdonhang 
                          JOIN tbl_sanpham ON tbl_chitietdonhang.id_sanpham = tbl_sanpham.id_sanpham 
                          WHERE id_donhang='$order_id'";
    $order_details = $mysqli->query($sql_order_details);
} else {
    echo "Không tìm thấy đơn hàng!";
    exit();
}
?>

<h2>Chi tiết đơn hàng #<?php echo $order_id; ?></h2>
<p>Khách hàng: <?php echo $order['tenkhachhang']; ?></p>
<p>Tổng tiền: <?php echo number_format($order['tongtien'], 0, ',', '.').' vnđ'; ?></p>
<p>Ngày đặt: <?php echo $order['ngaydat']; ?></p>

<table border="1" style="width:100%;text-align:center;">
    <tr>
        <th>STT</th>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
    $i = 0;
    while($row = $order_details->fetch_assoc()) {
        $i++;
        $thanhtien = $row['giasp'] * $row['soluong'];
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']; ?>" width="150px"></td>
        <td><?php echo $row['tensanpham']; ?></td>
        <td><?php echo $row['soluong']; ?></td>
        <td><?php echo number_format($row['giasp'], 0, ',', '.').' vnđ'; ?></td>
        <td><?php echo number_format($thanhtien, 0, ',', '.').' vnđ'; ?></td>
    </tr>
    <?php
    }
    ?>
</table>
