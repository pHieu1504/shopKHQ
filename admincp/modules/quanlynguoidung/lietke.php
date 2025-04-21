<?php
$sql_lietke_dh = "SELECT * FROM tbl_dangky ";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>

<div class="form">

  <div class="table">
    <div class="table-title">
      <div class="id3">ID</div>
      <div class="tenkhachhang">Tên khách hàng</div>
      <div class="diachi">Địa chỉ</div>
      <div class="email">Email</div>
      <div class="sdt">Số điện thoại</div>

      <div class="quanli_3">Quản lý</div>
    </div>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
      $i++;
    ?>
      <div class="table-sp">

        <div class="id3 sp"><?php echo $i ?></div>
        <div class="madonhang sp"><?php echo $row['code_cart'] ?></div>
        <div class="tenkhachhang sp"><?php echo $row['tenkhachhang'] ?></div>
        <div class="diachi sp"><?php echo $row['diachi'] ?></div>
        <div class="email sp"><?php echo $row['email'] ?></div>
        <div class="sdt sp"><?php echo $row['dienthoai'] ?></div>

      </div>
    <?php
    }
    ?>

  </div>
</div>