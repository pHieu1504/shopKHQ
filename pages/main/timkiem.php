<?php
if (isset($_POST['timkiem'])) {
  // Lấy từ khóa tìm kiếm và xử lý an toàn
  $tukhoa = mysqli_real_escape_string($mysqli, $_POST['tukhoa']);
} else {
  $tukhoa = '';
}

// Truy vấn sản phẩm theo từ khóa
$sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc 
            WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
              AND tbl_sanpham.tensanpham LIKE '%$tukhoa%'";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<div class="main1">
  <h3 class="search-title1" style="margin-bottom: 20px;">
    Sản phẩm cho từ khóa: <span class="title-search"><?php echo htmlspecialchars($tukhoa); ?></span>
  </h3>
  <?php
  if (mysqli_num_rows($query_pro) > 0) {
    while ($row = mysqli_fetch_array($query_pro)) {
  ?>
      <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']; ?>" class="main1-item">
        <div class="main1-item-img">
          <img src="admincp/modules/quanlysp/uploads/<?php echo htmlspecialchars($row['hinhanh']); ?>" alt="<?php echo htmlspecialchars($row['tensanpham']); ?>">
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
  <?php
    }
  } else {
    echo "<p class='text-danger'>Không tìm thấy sản phẩm nào phù hợp với từ khóa.</p>";
  }
  ?>
  <div class="clear"></div>
</div>