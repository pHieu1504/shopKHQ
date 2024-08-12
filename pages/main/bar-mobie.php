<?php
  $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
 $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);

 $sql_danhmuc2 = "SELECT * FROM tbl_band ORDER BY id_band DESC";
 $query_danhmuc2 = mysqli_query($mysqli,$sql_danhmuc2);
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
	} 
?>
<div class="bar-mobie">
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <li class="header-li"><a href="index.php?quanly=home"><i class="fas fa-home"></i></a></li>
                    <div class="item-has-dropdown">
                    <li class="header-li"><a href="#">Danh Mục Sản Phẩm</a></li>
                    <ul class="header-li-contents">
                    <li class="header-li-content-item"><a href="index.php?quanly=all-sp">Tất cả Sản Phẩm</a></li>
                    <?php 
				     while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
				    ?>
				      <li class="header-li-content-item"><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
				    <?php
				    } 
				    ?>
            
                     

                      </ul>
                    </div>

                    <!-- <div class="item-has-dropdown">
                    <li class="header-li"><a href="#">Thương Hiệu</a></li>
                    <ul class="header-li-contents">
                    
                    <?php 
				     while($row_danhmuc2 = mysqli_fetch_array($query_danhmuc2)){
				    ?>
				      <li class="header-li-content-item"><a href="index.php?quanly=danhmucband&id=<?php echo $row_danhmuc2['id_band'] ?>"><?php echo $row_danhmuc2['tenband'] ?></a></li>
				    <?php
				    } 
				    ?>
            
                     

                      </ul>
                    </div> -->

                    
                    <li class="header-li"><a href="index.php?quanly=giohang">Giỏ Hàng</a></li>
                    <li class="header-li"><a href="index.php?quanly=tintuc">Tin Tức</a></li>
                    <li class="header-li"><a href="index.php?quanly=lienhe">Liên Hệ</a></li>
                    
                </ul>
                <ul class=" header-ul-left">
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
    

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   <style>
       .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #000;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
   </style>





