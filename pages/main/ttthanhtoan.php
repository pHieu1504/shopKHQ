<?php

// Lấy thông tin khách hàng từ bảng tbl_dangky
$customer_id = $_SESSION['id_khachhang'];
$sql_customer = "SELECT * FROM tbl_dangky WHERE id_dangky = '$customer_id'";
$result_customer = mysqli_query($mysqli, $sql_customer);
$customer = mysqli_fetch_assoc($result_customer);

// Xử lý đơn hàng khi người dùng nhấn nút "Đặt hàng"
if (isset($_POST['submit_order'])) {
    $payment_method = $_POST['payment_method'];
    $order_date = date('Y-m-d H:i:s');
    $total_amount = $_POST['total_amount'];
    
    // Thêm đơn hàng vào cơ sở dữ liệu
    $sql_add_order = "INSERT INTO tbl_donhang (id_khachhang, ngaydat, hinhthucthanhtoan, tongtien, trangthai) 
                       VALUES ('$customer_id', '$order_date', '$payment_method', '$total_amount', 'Đang xử lý')";
    mysqli_query($mysqli, $sql_add_order);
    
    // Lấy ID đơn hàng vừa thêm
    $order_id = mysqli_insert_id($mysqli);
    
    // Thêm chi tiết đơn hàng
    foreach ($_SESSION['cart'] as $cart_item) {
        $product_id = $cart_item['masp'];
        $quantity = $cart_item['soluong'];
        $price = $cart_item['giasp'];
        $total = ($cart_item['soluong'] * $cart_item['giasp'] * (100 - $cart_item['sale'])) / 100;
        
        $sql_add_order_detail = "INSERT INTO tbl_donhangchitiet (id_donhang, id_sanpham, soluong, giasp, thanhtien)
                                 VALUES ('$order_id', '$product_id', '$quantity', '$price', '$total')";
        mysqli_query($mysqli, $sql_add_order_detail);
    }
    
    // Xóa giỏ hàng
    unset($_SESSION['cart']);
    
    header('Location: index.php?quanly=thongbao&thongbao=dat_hang_thanh_cong');
    exit();
}
?>

<div class="main1 main-thongtin">
    <p>Thông tin thanh toán</p>
    <form method="post" action="">
        <table style="width:100%;text-align: center;border-collapse: collapse;margin-top:20px">
            <tr class="header-table">
                <th class="id">STT</th>
                <th class="masp2">Mã sp</th> 
                <th class="hinhanh">Hình ảnh</th>
                <th class="tensp">Tên sản phẩm</th>
                <th class="soluong">Số lượng</th>
                <th class="giasp">Giá sản phẩm</th>
                <th class="thanhtien">Thành tiền</th>
            </tr>
            <?php
            if (isset($_SESSION['cart'])) {
                $i = 0;
                $tongtien = 0;
                foreach ($_SESSION['cart'] as $cart_item) {
                    $thanhtien = ($cart_item['soluong'] * $cart_item['giasp'] * (100 - $cart_item['sale'])) / 100;
                    $tongtien += $thanhtien;
                    $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $cart_item['masp']; ?></td>
                <td class="hinhanh"><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
                <td><?php echo $cart_item['tensanpham']; ?></td>
                <td><?php echo $cart_item['soluong']; ?></td>
                <td><?php echo number_format($cart_item['giasp'], 0, ',', '.').' vnđ'; ?></td>
                <td><?php echo number_format($thanhtien, 0, ',', '.').' vnđ'; ?></td>
            </tr>
            <?php
                }
            }
            ?>
            <tr>
                <td colspan="7" style="border-top: 1px solid #ccc; padding-top:20px">
                    <p style="float: right;" class="sum-mn">Tổng tiền: <span><?php echo number_format($tongtien, 0, ',', '.').' vnđ'; ?></span></p><br/>
                    <div class="clear"></div>
                    
                    <!-- Thông tin khách hàng -->
                    <div class="customer-info">
                        <p>
                            <label for="full_name">Họ và tên:</label>
                            <input type="text" name="full_name" id="full_name" value="<?php echo htmlspecialchars($customer['tenkhachhang']); ?>" required />
                        </p>
                        <p>
                            <label for="address">Địa chỉ:</label>
                            <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($customer['diachi']); ?>" required />
                        </p>
                        <p>
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($customer['sodienthoai']); ?>" required />
                        </p>
                        <p>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($customer['email']); ?>" required />
                        </p>
                        
                        <input type="hidden" name="total_amount" value="<?php echo number_format($tongtien, 0, ',', '.'); ?>" />
                    </div>
                    
                    <!-- Phương thức thanh toán -->
                    <p style="float: right;">
                        <label for="payment_method">Chọn phương thức thanh toán:</label>
                        <select name="payment_method" id="payment_method">
                            <option value="Tiền mặt">Tiền mặt khi nhận hàng</option>
                            <option value="Chuyển khoản">Chuyển khoản ngân hàng</option>
                        </select>
                    </p>
                    
                    <div class="clear"></div>
                    <p style="float: right;"><input type="submit" name="submit_order" value="Đặt hàng" class="dathang"/></p>
                    <div style="clear: both;"></div>
                </td>
            </tr>
        </table>
    </form>
</div>
