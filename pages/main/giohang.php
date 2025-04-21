<p class="chitiet"> <a href="index.php?quanly=home">Home </a> / Giỏ Hàng</p>
<div class="main1 main-giohang">
  <p>
    <?php
    if (isset($_SESSION['dangky'])) {
      echo 'Xin chào: <span style="color:red;font-size:20px;padding-top:20px">' . $_SESSION['dangky'] . '</span>';
    }
    ?>
  </p>

  <table style="width:100%;text-align: center;border-collapse: collapse;margin-top:20px">
    <tr class="header-table">
      <th class="id">STT</th>
      <th class="masp2">Mã sp</th>
      <th class="hinhanh">Hình ảnh</th>
      <th class="tensp">Tên sản phẩm</th>
      <th class="soluong">Số lượng</th>
      <th class="giasp">Giá sản phẩm</th>
      <th class="thanhtien">Thành tiền</th>
      <th class="quanly">Quản lý</th>
    </tr>

    <?php
    $hasCart = isset($_SESSION['cart']) && count($_SESSION['cart']) > 0;

    if ($hasCart) {
      $i = 0;
      $tongtien = 0;
      $dem = 0;
      foreach ($_SESSION['cart'] as $cart_item) {
        $i++;
        $dem++;
        $thanhtien = ($cart_item['soluong'] * $cart_item['giasp'] * (100 - $cart_item['sale'])) / 100;
        $tongtien += $thanhtien;
    ?>
        <tr class="pc-thanhtoan">
          <td><?php echo $i; ?></td>
          <td><?php echo $cart_item['masp']; ?></td>
          <td class="hinhanh"><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
          <td><?php echo $cart_item['tensanpham']; ?></td>
          <td class="soluong2">
            <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']; ?>"><i class="fa fa-minus fa-style"></i></a>
            <?php echo $cart_item['soluong']; ?>
            <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']; ?>"><i class="fa fa-plus fa-style"></i></a>
          </td>
          <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . ' vnđ'; ?></td>
          <td><?php echo number_format($thanhtien, 0, ',', '.') . ' vnđ'; ?></td>
          <td class="delete"><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']; ?>">Xoá</a></td>
        </tr>

        <!-- Mobile view -->
        <div class="media-thanhtoan mb-3">
          <div class="stt-tt"><?php echo $i; ?></div>
          <div class="gr1">
            <div class="ha-sp"><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></div>
            <div class="tensp"><?php echo $cart_item['tensanpham']; ?></div>
            <div class="soluongsp">
              <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']; ?>"><i class="fa fa-minus fa-style"></i></a>
              <?php echo $cart_item['soluong']; ?>
              <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']; ?>"><i class="fa fa-plus fa-style"></i></a>
            </div>
            <div class="all-price"><?php echo 'Thành tiền : ' . number_format($thanhtien, 0, ',', '.') . ' vnđ'; ?></div>
          </div>
          <div class="gr2 delete"><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']; ?>">Xoá</a></div>
        </div>
      <?php
      } // end foreach
      ?>
      <tr>
        <td colspan="8" style="border-top: 1px solid #ccc; padding-top:20px">
          <p style="float: right;" class="sum-mn">Tổng tiền: <span><?php echo number_format($tongtien, 0, ',', '.') . ' vnđ'; ?></span></p>
          <div class="clear"></div>
          <p style="float: right;" class="delete delete-all"><a href="pages/main/themgiohang.php?xoatatca=1">Xoá tất cả</a></p>
          <div style="clear: both;"></div>
          <p style="float: left;" class="number-items">Tổng số sản phẩm: <span><?php echo $dem; ?></span></p>
        </td>
      </tr>
    <?php
    } else {
      echo '<tr><td colspan="8"><p>Hiện tại giỏ hàng trống</p></td></tr>';
    }
    ?>

    <!-- Nút hiển thị form thêm sản phẩm -->
    <tr>
      <td colspan="8">
        <button class="btn btn-sm btn-primary" id="show-form-btn" type="button" style="font-size: 16px; margin: 10px 0;">+ Thêm sản phẩm</button>

        <form action="pages/main/themgiohang.php" method="POST" class="form-them-giohang" id="them-sp-form" style="display: none;">
          <div class="row align-items-center">
            <div class="col-md-5">
              <label for="tensp" class="form-label">Tên sản phẩm:</label>
              <select name="tensp" id="tensp" class="form-select" required size="5" style="overflow-y: auto;">
                <option disabled selected>-- Chọn sản phẩm --</option>
                <?php
                $sql = "SELECT tensanpham FROM tbl_sanpham ORDER BY tensanpham ASC";
                $query = mysqli_query($mysqli, $sql);
                while ($row = mysqli_fetch_array($query)) {
                  echo '<option value="' . htmlspecialchars($row['tensanpham']) . '">' . htmlspecialchars($row['tensanpham']) . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="soluong" class="form-label">Số lượng:</label>
              <input type="number" name="soluong" id="soluong" class="form-control" value="1" min="1" required>
            </div>
            <div class="col-md-4 d-flex align-items-end">
              <button type="submit" class="btn btn-success btn-sm w-100" name="them_theo_ten">Thêm sản phẩm</button>
            </div>
          </div>
        </form>
      </td>
    </tr>
  </table>

  <!-- Chỉ hiện nút "Đặt hàng" khi có sản phẩm -->
  <?php if ($hasCart && isset($_SESSION['dangky'])) { ?>
    <p class="text-end"><a href="pages/main/ttthanhtoan.php" class="dathang">Đặt hàng</a></p>
  <?php } elseif (!$hasCart) { ?>
    <p class="text-danger mt-3">Bạn cần thêm sản phẩm vào giỏ để có thể đặt hàng.</p>
  <?php } elseif (!isset($_SESSION['dangky'])) { ?>
    <p><a href="index.php?quanly=dangky" class="dathang">Đăng ký đặt hàng</a></p>
  <?php } ?>
</div>

<!-- Script toggle form -->
<script>
  document.getElementById('show-form-btn').addEventListener('click', function() {
    var form = document.getElementById('them-sp-form');
    form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
  });
</script>