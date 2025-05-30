<?php
// Bắt đầu session nếu cần
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Kết nối CSDL nếu chưa có
if (!isset($mysqli)) {
  include_once("../../admincp/config/config.php");
}

// Truy vấn sản phẩm đang giảm giá
$sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc 
            WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
              AND tbl_sanpham.sale > 10";
$query_pro = mysqli_query($mysqli, $sql_pro);

// Kiểm tra kết quả truy vấn
if (!$query_pro) {
  echo "<p class='text-danger'>Không thể truy vấn dữ liệu sản phẩm.</p>";
  return;
}
?>

<div class="main1">
  <div class="main1-header">
    <p>Hot sale</p>
  </div>
  <div class="main1-content owl-carousel">
    <?php while ($row = mysqli_fetch_array($query_pro)) { ?>
      <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']; ?>" class="main1-item">
        <div class="main1-item-img">
          <img src="../../admincp/modules/quanlysp/uploads/<?php echo htmlspecialchars($row['hinhanh']); ?>" alt="<?php echo htmlspecialchars($row['tensanpham']); ?>">
        </div>
        <div class="main1-item-content">
          <div class="item1-title"><?php echo htmlspecialchars($row['tensanpham']); ?></div>
          <div class="place">Sản xuất: <?php echo htmlspecialchars($row['sanxuat']); ?></div>
          <div class="box-price">
            <div class="new-price1">
              <?php
              if ($row['sale'] > 0) {
                echo number_format(($row['giasp'] * (100 - $row['sale'])) / 100, 0, ',', '.') . ' vnđ';
              } else {
                echo number_format($row['giasp'], 0, ',', '.') . ' vnđ';
              }
              ?>
            </div>
            <div class="old-price1">
              <del>
                <?php
                if ($row['sale'] > 0) {
                  echo number_format($row['giasp'], 0, ',', '.') . ' vnđ';
                }
                ?>
              </del>
            </div>
          </div>
          <div class="sale">
            <?php
            if ($row['sale'] > 0) {
              echo '-' . $row['sale'] . '%';
            }
            ?>
          </div>
        </div>
      </a>
    <?php } ?>
  </div>
</div>