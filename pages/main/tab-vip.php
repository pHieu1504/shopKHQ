<?php

$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	
?>


<div class="tablinks-vip">
    <ul>
    <?php
	while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){ 
    ?>
     <li><a id="code1" onclick="click1()" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php  echo $row_danhmuc['tendanhmuc'] ?></a></li>

    <?php 
    }
    ?>
    <div class="clear"></div>
    </ul>
</div>


<style>
    .tablinks-vip{
        width: 1200px;
        margin: 0 auto;
        padding: 20px ;
        background-color: #fff;
        margin-bottom: 20px;
    }
    .tablinks-vip li{
        float: left;
        
    }
    .tablinks-vip li a{
        padding: 10px;
        border: 1px solid #000;
        border-radius: 10px;
        margin-right: 10px;
    }
    .tablinks-vip li a:hover{
        background-color: #000;
        color: #fff;
    }
    .show{
        background-color: #000;
    }
</style>

