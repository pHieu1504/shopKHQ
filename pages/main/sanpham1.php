<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc 
                WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
                  AND tbl_sanpham.id_sanpham = '" . mysqli_real_escape_string($mysqli, $_GET['id']) . "' 
                LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);

while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .chitiet {
      font-size: 16px;
      margin-bottom: 20px;
    }

    .wrapper_chitiet {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    .hinhanh_sanpham img {
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .chitiet_sanpham {
      flex: 1;
      max-width: 500px;
    }

    .chitiet_sanpham h3 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .box-price {
      margin-bottom: 15px;
    }

    .box-price .new-price1 {
      font-size: 22px;
      font-weight: bold;
      color: #e53935;
    }

    .box-price .old-price1 {
      font-size: 16px;
      color: #888;
    }

    .box-sale {
      background: #e53935;
      color: #fff;
      padding: 5px 10px;
      border-radius: 5px;
      display: inline-block;
      margin-top: 10px;
    }

    .tabs {
      margin-top: 30px;
    }

    #tabs-nav {
      list-style: none;
      padding: 0;
      display: flex;
      gap: 15px;
      border-bottom: 2px solid #ddd;
    }

    #tabs-nav li {
      display: inline-block;
    }

    #tabs-nav a {
      text-decoration: none;
      padding: 10px 15px;
      display: inline-block;
      color: #007bff;
      font-weight: bold;
      transition: background 0.2s, color 0.2s;
    }

    #tabs-nav a:hover {
      background: #007bff;
      color: #fff;
      border-radius: 5px;
    }

    .tab-content {
      margin-top: 20px;
      padding: 15px;
      background: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
  </style>

  <p class="chitiet">
    <a href="index.php?quanly=home">Home</a> /
    <?php echo htmlspecialchars($row_chitiet['tendanhmuc']); ?> /
    <?php echo htmlspecialchars($row_chitiet['tensanpham']); ?>
  </p>

  <div class="main1">
    <div class="wrapper_chitiet">
      <div class="hinhanh_sanpham">
        <img src="admincp/modules/quanlysp/uploads/<?php echo htmlspecialchars($row_chitiet['hinhanh']); ?>" alt="<?php echo htmlspecialchars($row_chitiet['tensanpham']); ?>" class="img-fluid">
      </div>
      <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']; ?>">
        <div class="chitiet_sanpham">
          <h3><?php echo htmlspecialchars($row_chitiet['tensanpham']); ?></h3>
          <p class="masp">Mã sp: <span><?php echo htmlspecialchars($row_chitiet['masp']); ?></span></p>
          <div class="box-price">
            <div class="new-price1">
              <?php
              if ($row_chitiet['sale'] > 0) {
                echo number_format(($row_chitiet['giasp'] * (100 - $row_chitiet['sale'])) / 100, 0, ',', '.') . ' vnđ';
              } else {
                echo number_format($row_chitiet['giasp'], 0, ',', '.') . ' vnđ';
              }
              ?>
            </div>
            <div class="old-price1">
              <del>
                <?php
                if ($row_chitiet['sale'] > 0) {
                  echo number_format($row_chitiet['giasp'], 0, ',', '.') . ' vnđ';
                }
                ?>
              </del>
            </div>
            <?php if ($row_chitiet['sale'] > 0) { ?>
              <div class="box-sale">
                <?php echo '-' . $row_chitiet['sale'] . '%'; ?>
              </div>
            <?php } ?>
          </div>
          <p>Nơi Sản Xuất: <span><?php echo htmlspecialchars($row_chitiet['sanxuat']); ?></span></p>
          <p>Danh mục sản phẩm: <span><?php echo htmlspecialchars($row_chitiet['tendanhmuc']); ?></span></p>
          <p><input class="btn btn-primary" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
        </div>
      </form>
    </div>
    <div class="tabs">
      <ul id="tabs-nav">
        <li><a href="#tab2">Nội dung chi tiết</a></li>
      </ul>
      <div id="tabs-content">
        <div id="tab2" class="tab-content">
          <?php echo htmlspecialchars($row_chitiet['noidung']); ?>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>