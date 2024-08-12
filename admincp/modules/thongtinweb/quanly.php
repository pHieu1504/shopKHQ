
<?php
	$sql_lh = "SELECT * FROM tbl_lienhe WHERE id=1";
	$query_lh = mysqli_query($mysqli,$sql_lh);
?>
<div class="form">
<h2>Quản lý thông tin website</h2>

<table border="1" width="100%" style="border-collapse: collapse;">
	<?php
	 	while($dong = mysqli_fetch_array($query_lh)) {
	 	?>
 <form method="POST" action="modules/thongtinweb/xuly.php?id=<?php echo $dong['id'] ?>" enctype="multipart/form-data">
	  
	   <tr>
	  	<td>Thông tin liên hệ</td>
	  	<td><textarea rows="10"  name="thongtinlienhe" style="resize: none"><?php echo $dong['thongtinlienhe'] ?></textarea></td>
	  </tr>
	  
	   <tr>
	    <td colspan="2"> <div class="input2"><input type="submit" name="submitlienhe" value="Cập nhật"></div></td>
	  </tr>
	  <?php 
		}
	  ?>
 </form>
</table>
</div>