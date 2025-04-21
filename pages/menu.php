<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

$sql_danhmuc2 = "SELECT * FROM tbl_band ORDER BY id_band DESC";
$query_danhmuc2 = mysqli_query($mysqli, $sql_danhmuc2);

if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
  unset($_SESSION['dangky']);
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="header2">
  <div class="header2-content">
    <ul class="header-ul-left">
      <li class="header-li"><a href="index.php?quanly=home"><i class="fas fa-home"></i></a></li>
      <li class="header-li">
        <a href="#">Danh Mục Sản Phẩm</a>
        <ul class="header-li-contents">
          <li class="header-li-content-item"><a href="index.php?quanly=all-sp">Tất cả Sản Phẩm</a></li>
          <?php while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { ?>
            <li class="header-li-content-item">
              <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
                <?php echo $row_danhmuc['tendanhmuc'] ?>
              </a>
            </li>
          <?php } ?>
        </ul>
      </li>
      <li class="header-li"><a href="index.php?quanly=giohang">Giỏ Hàng</a></li>
      <li class="header-li"><a href="index.php?quanly=tintuc">Tin Tức</a></li>
      <li class="header-li"><a href="index.php?quanly=lienhe">Liên Hệ</a></li>
    </ul>

    <ul class="header-ul-right">
      <?php if (isset($_SESSION['dangky'])) { ?>
        <li class="header-li item-has-dropdown">
          <a href="index.php?quanly=thongtin">
            <?php echo 'Xin chào, ' . $_SESSION['dangky']; ?>

          </a>
          <ul class="header-li-contents">
            <li class="header-li-content-item">
              <a href="index.php?quanly=thongtin">
                <i class="fas fa-user"></i> Thông tin cá nhân
              </a>
            </li>
            <li class="header-li-content-item">
              <a href="index.php?quanly=donhang">
                <i class="fas fa-box"></i> Đơn Hàng
              </a>
            </li>
            <li class="header-li-content-item">
              <a href="index.php?dangxuat=1">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
              </a>
            </li>
          </ul>
        </li>
      <?php } else { ?>
        <li class="header-li"><a href="index.php?quanly=dangnhap">Đăng Nhập</a></li>
        <li class="header-li"><a href="index.php?quanly=dangky">Đăng ký</a></li>
      <?php } ?>
    </ul>
  </div>
</div>

<style>
  * {
    text-decoration: none;
  }

  a {
    text-decoration: none;
  }

  header {
    text-decoration: none;
  }

  .header2 {
    background-color: #f8f9fa;
    padding: 10px 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .header2-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
  }

  .header-ul-left,
  .header-ul-right {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 15px;
    border-radius: 5px;
    background-color: #f8f9fa;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  }

  .header-li {
    position: relative;
  }

  .header-li a {
    text-decoration: none;
    color: #333;
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background 0.2s, color 0.2s;
  }

  .header-li a:hover {
    background-color: rgb(122, 124, 127);
    color: #fff;
  }

  .header-li-contents {
    display: none;
    color: #fff;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #f8f9fa;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    z-index: 10;
    list-style: none;
    padding: 10px 0;
    margin: 0;
    min-width: 200px;
    ;

  }

  .header-li:hover .header-li-contents {
    display: block;
  }

  .header-li-content-item {
    padding: 8px 15px;
    transition: background 0.2s, color 0.2s;
  }

  .header-li-content-item a {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    color: #333;
    font-weight: 500;
  }

  .header-li-content-item a:hover {
    background-color: rgb(122, 124, 127);
    color: #fff;
    border-radius: 5px;
  }

  .header-li-content-item i {
    font-size: 16px;
    color: #007bff;
  }

  .header-li-content-item a:hover i {
    color: #fff;
  }
</style>