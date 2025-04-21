<?php
// Bắt đầu session nếu chưa có
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kết nối CSDL nếu chưa có
if (!isset($mysqli)) {
    include_once("../../admincp/config/config.php");
}

// Lấy thông tin khách hàng từ bảng tbl_dangky
$customer_id = $_SESSION['id_khachhang'] ?? 0;
$sql_customer = "SELECT * FROM tbl_dangky WHERE id_dangky = '$customer_id'";
$result_customer = mysqli_query($mysqli, $sql_customer);
$customer = mysqli_fetch_assoc($result_customer);

// Xử lý đơn hàng khi người dùng nhấn nút "Đặt hàng"
if (isset($_POST['submit_order'])) {
    $payment_method = mysqli_real_escape_string($mysqli, $_POST['payment_method']);
    $order_date = date('Y-m-d H:i:s');
    $total_amount = (float) str_replace(['.', ','], '', $_POST['total_amount']); // loại bỏ dấu phân cách

    $tenkhachhang = mysqli_real_escape_string($mysqli, $_POST['full_name']);
    $diachi = mysqli_real_escape_string($mysqli, $_POST['address']);
    $sodienthoai = mysqli_real_escape_string($mysqli, $_POST['phone']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);

    $sql_add_order = "INSERT INTO tbl_donhang (id_khachhang, tenkhachhang, diachi, sodienthoai, email, ngaydat, hinhthucthanhtoan, tongtien, trangthai) 
                      VALUES ('$customer_id', '$tenkhachhang', '$diachi', '$sodienthoai', '$email', '$order_date', '$payment_method', '$total_amount', 'Đang xử lý')";
    mysqli_query($mysqli, $sql_add_order);

    $order_id = mysqli_insert_id($mysqli);

    foreach ($_SESSION['cart'] as $cart_item) {
        $product_id = $cart_item['masp'];
        $quantity = (int) $cart_item['soluong'];
        $price = (float) $cart_item['giasp'];
        $sale = (int) $cart_item['sale'];
        $total = ($quantity * $price * (100 - $sale)) / 100;

        $sql_add_order_detail = "INSERT INTO tbl_donhangchitiet (id_donhang, id_sanpham, soluong, giasp, thanhtien)
                                 VALUES ('$order_id', '$product_id', '$quantity', '$price', '$total')";
        mysqli_query($mysqli, $sql_add_order_detail);
    }

    unset($_SESSION['cart']);


    header('Location: /'); // Chuyển hướng đến trang đơn hàng thành công
    exit();
}

// Khởi tạo biến tổng tiền
$tongtien = 0;
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .tt-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 24px;
        text-align: center;
        color: #2d8cf0;
    }

    .table-cart th,
    .table-cart td {
        vertical-align: middle !important;
    }

    .customer-info label {
        font-weight: 500;
    }

    .customer-info input,
    .customer-info select {
        margin-bottom: 10px;
    }

    .sum-mn {
        font-size: 18px;
        font-weight: bold;
        color: #e53935;
    }

    .dathang {
        background: #2d8cf0;
        color: #fff;
        border: none;
        padding: 10px 28px;
        border-radius: 5px;
        font-size: 17px;
        cursor: pointer;
        transition: background 0.2s;
    }

    .dathang:hover {
        background: #1a6fb3;
    }
</style>

<div class="container my-4">
    <div class="tt-title">THÔNG TIN THANH TOÁN</div>
    <form method="post" action="">
        <div class="table-responsive">
            <table class="table table-bordered table-cart align-middle bg-white">
                <thead class="table-light">
                    <tr>
                        <th>STT</th>
                        <th>Mã SP</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($_SESSION['cart'])) {
                        $i = 0;
                        foreach ($_SESSION['cart'] as $cart_item) {
                            $i++;
                            $thanhtien = ($cart_item['soluong'] * $cart_item['giasp'] * (100 - $cart_item['sale'])) / 100;
                            $tongtien += $thanhtien;
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $cart_item['masp']; ?></td>
                                <td><img src="../../admincp/modules/quanlysp/uploads/<?php echo htmlspecialchars($cart_item['hinhanh']); ?>" width="100" class="img-thumbnail"></td>
                                <td><?php echo htmlspecialchars($cart_item['tensanpham']); ?></td>
                                <td><?php echo $cart_item['soluong']; ?></td>
                                <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . ' vnđ'; ?></td>
                                <td><?php echo number_format($thanhtien, 0, ',', '.') . ' vnđ'; ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row mb-3">
            <div class="col-12 text-end">
                <span class="sum-mn">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . ' vnđ'; ?></span>
            </div>
        </div>
        <div class="customer-info row g-3 mb-3">
            <div class="col-md-6">
                <label for="full_name" class="form-label">Họ và tên:</label>
                <input type="text" class="form-control" name="full_name" id="full_name"
                    value="<?php echo htmlspecialchars($customer['tenkhachhang'] ?? ''); ?>" required />
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Địa chỉ:</label>
                <input type="text" class="form-control" name="address" id="address"
                    value="<?php echo htmlspecialchars($customer['diachi'] ?? ''); ?>" required />
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Số điện thoại:</label>
                <input type="text" class="form-control" name="phone" id="phone"
                    value="<?php echo htmlspecialchars($customer['dienthoai'] ?? ''); ?>" required />
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email"
                    value="<?php echo htmlspecialchars($customer['email'] ?? ''); ?>" required />
            </div>
            <input type="hidden" name="total_amount" value="<?php echo (float) $tongtien; ?>" />
        </div>
        <div class="row mb-3">
            <div class="col-md-6 offset-md-6 text-end">
                <label for="payment_method" class="form-label">Chọn phương thức thanh toán:</label>
                <select class="form-select d-inline-block w-auto" name="payment_method" id="payment_method">
                    <option value="Tiền mặt">Tiền mặt khi nhận hàng</option>
                    <option value="Chuyển khoản">Chuyển khoản ngân hàng</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-end">
                <input type="submit" name="submit_order" value="Đặt hàng" class="btn dathang" />
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>