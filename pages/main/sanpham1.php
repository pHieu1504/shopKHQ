






<?php
	$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND  tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
	$query_chitiet = mysqli_query($mysqli,$sql_chitiet);
  
	while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?><p class="chitiet"> <a href="index.php?quanly=home">Home </a> / <?php echo $row_chitiet['tendanhmuc'] ?> / <?php echo $row_chitiet['tensanpham'] ?> </p>
<div class="main1">

<div class="wrapper_chitiet">
	<div class="hinhanh_sanpham">
	<div class="container">

  <!-- Full-width images with number text -->
  <div class="mySlides">
    <div class="numbertext">1 / 5</div>
      <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>" style="width:100%">
  </div>

  <!-- <div class="mySlides">
    <div class="numbertext">2 / 5</div>
      <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh2'] ?>" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 5</div>
      <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh3'] ?>" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">4 / 5</div>
      <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh4'] ?>" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 5</div>
      <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh5'] ?>" style="width:100%">
  </div> -->

  

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  <!-- Image text -->
  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <!-- Thumbnail images -->
  <!-- <div class="row">
    <div class="column">
      <img class="demo cursor" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>" style="width:100%" onclick="currentSlide(1)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh2'] ?>" style="width:100%" onclick="currentSlide(2)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh3'] ?>" style="width:100%" onclick="currentSlide(3)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh4'] ?>" style="width:100%" onclick="currentSlide(4)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh5'] ?>" style="width:100%" onclick="currentSlide(5)" alt="">
    </div>
    
  </div> -->
</div>
	</div>
	<form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
		<div class="chitiet_sanpham">
			<h3  style="padding: 10px;background-color: #f5f5f5;border-radius: 10px;"><?php echo $row_chitiet['tensanpham'] ?></h3>
			<p class="masp">Mã sp: <span><?php echo $row_chitiet['masp'] ?></span> </p>
            <div class="box-price" style=" padding: 10px;background-color: #f5f5f5;border-radius: 10px;">
                            <div class="new-price1" style="font-size:25px;"> 
                                
                        <?php 
                          if($row_chitiet['sale'] > 0){
                             echo number_format(($row_chitiet['giasp']*(100-$row_chitiet['sale']))/100,0,',','.' ).' vnđ' ;
                          } else{
                            echo number_format($row_chitiet['giasp'],0,',','.' ).' vnđ' ;
                          }
                          
                        ?>
                        
                          </div>
                          <div class="old-price1"  style="font-size:16px;margin-top:7px;"><del>
                          <?php 
                          if($row_chitiet['sale'] > 0){
                             echo number_format($row_chitiet['giasp'],0,',','.' ).' vnđ' ;
                          }
                          
                        ?>
                          </del> </div>
                          <?php if($row_chitiet['sale'] > 0) {
                            ?>
                          
                           <div class="box-sale">
                                 <?php echo '-'.$row_chitiet['sale'].' %' ?> 
                           </div>
                          
                          <?php } ?>
                          
                       </div>
			<p style="padding: 10px;background-color: #f5f5f5;border-radius: 10px;">Nơi Sản Xuất: <span><?php echo $row_chitiet['sanxuat'] ?></span> </p>
			<p style="padding: 10px;background-color: #f5f5f5;border-radius: 10px;">Danh mục sản phẩm : <span><?php echo $row_chitiet['tendanhmuc'] ?></span> </p>
			<p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
			
		</div>
	</form>
</div>
<div class="clear"></div>
<div class="tabs">
  <ul id="tabs-nav">
    <!-- <li><a href="#tab1">Thông số kỹ thuật</a></li> -->
    <li><a href="#tab2">Nội dung chi tiết</a></li>
    <!-- <li><a href="#tab3">Hình ảnh sản phẩm</a></li> -->
    
  </ul> 
  <div id="tabs-content">
    <div id="tab1" class="tab-content">
     	<?php echo $row_chitiet['tomtat'] ?>
       <div class="clear"></div>
    </div>
    <div id="tab2" class="tab-content">
     	<?php echo $row_chitiet['noidung'] ?>
       <div class="clear"></div>
    </div>
    <!-- <div id="tab3" class="tab-content">
     <p>	<img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>"></p>
      <p> <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh2'] ?>"></p>
      <p> <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh3'] ?>"></p>
      <p> <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh4'] ?>"></p>
      <p> <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh5'] ?>"></p>

      <div class="clear"></div> -->
    </div>
    
  </div> 
</div> 
<?php
} 
?>
</div>


<script>
  var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
