<?php
// session_start();
$id_khachhang = $_SESSION['id_khachhang'];
$sql_user = "SELECT * FROM tbl_dangky WHERE id_dangky = $id_khachhang";
$user_query = mysqli_query($mysqli, $sql_user);
?>
<div class="main1 main2">
  <div class="main1-header">
    <p> Thông Tin Cá Nhân</p>
  </div>

  <div class="tt">


    <?php
    while ($user = mysqli_fetch_array($user_query)) {
    ?>
      <div>Tên khách hàng: <?php echo $user['tenkhachhang']; ?></div><br>
      <div> Email khách hàng: <?php echo $user['email']; ?></div><br>
      <div> Địa chỉ: <?php echo $user['diachi']; ?></div> <br>
      <div>Số Điện Thoại: <?php echo $user['dienthoai']; ?></div><br>



      <button><a href="index.php?quanly=suathongtin">Sửa Thông Tin Cá Nhân</a></button>
    <?php
    }
    ?>







  </div>
</div>

<style>
  .main1-header {
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .tt {
    width: 100%;
    height: auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
  }

  .tt div {
    font-size: 18px;
    margin-bottom: 10px;
  }

  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  button a {
    color: white;
    text-decoration: none;
  }

  button:hover {
    background-color: #0056b3;
  }
</style>