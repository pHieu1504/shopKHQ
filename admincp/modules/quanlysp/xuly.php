<?php
include('../../config/config.php');

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
//xuly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;

// $hinhanh2 = $_FILES['hinhanh2']['name'];
// $hinhanh2_tmp = $_FILES['hinhanh2']['tmp_name'];
// $hinhanh2 = time().'_'.$hinhanh2;

// $hinhanh3 = $_FILES['hinhanh3']['name'];
// $hinhanh3_tmp = $_FILES['hinhanh3']['tmp_name'];
// $hinhanh3 = time().'_'.$hinhanh3;

// $hinhanh4 = $_FILES['hinhanh4']['name'];
// $hinhanh4_tmp = $_FILES['hinhanh4']['tmp_name'];
// $hinhanh4 = time().'_'.$hinhanh4;

// $hinhanh5 = $_FILES['hinhanh5']['name'];
// $hinhanh5_tmp = $_FILES['hinhanh5']['tmp_name'];
// $hinhanh5 = time().'_'.$hinhanh5;

$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];

$danhmuc = $_POST['danhmuc'];
$sale = $_POST['sale'];
$sanxuat = $_POST['sanxuat'];



if(isset($_POST['themsanpham'])){
	//them
	$sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,sale,sanxuat,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUE('".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$sale."','".$sanxuat."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
	mysqli_query($mysqli,$sql_them);
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	// move_uploaded_file($hinhanh2_tmp,'uploads/'.$hinhanh2);
	// move_uploaded_file($hinhanh3_tmp,'uploads/'.$hinhanh3);
	// move_uploaded_file($hinhanh4_tmp,'uploads/'.$hinhanh4);
	// move_uploaded_file($hinhanh5_tmp,'uploads/'.$hinhanh5);
	header('Location:../../index.php?action=quanlysp&query=lietkesp');


}elseif(isset($_POST['suasanpham'])){
	//sua
	if(!empty($_FILES['hinhanh']['name']) ){
		move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
		
		
		$sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',sale='".$sale."',sanxuat='".$sanxuat."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
		//xoa hinh anh cu
		$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('uploads/'.$row['hinhanh']);
			
		}

	// }elseif(!empty($_FILES['hinhanh2']['name']) ){
	// 	move_uploaded_file($hinhanh2_tmp,'uploads/'.$hinhanh2);
		
		
	// 	$sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',sale='".$sale."',sanxuat='".$sanxuat."',hinhanh2='".$hinhanh2."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."',id_band='".$band."'  WHERE id_sanpham='$_GET[idsanpham]'";
	// 	//xoa hinh anh cu
	// 	$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
	// 	$query = mysqli_query($mysqli,$sql);
	// 	while($row = mysqli_fetch_array($query)){
	// 		unlink('uploads/'.$row['hinhanh2']);
			
	// 	}

	// }elseif(!empty($_FILES['hinhanh3']['name']) ){
	// 	move_uploaded_file($hinhanh3_tmp,'uploads/'.$hinhanh3);
		
		
	// 	$sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',sale='".$sale."',sanxuat='".$sanxuat."',hinhanh3='".$hinhanh3."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."',id_band='".$band."' WHERE id_sanpham='$_GET[idsanpham]'";
	// 	//xoa hinh anh cu
	// 	$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
	// 	$query = mysqli_query($mysqli,$sql);
	// 	while($row = mysqli_fetch_array($query)){
	// 		unlink('uploads/'.$row['hinhanh3']);
			
	// 	}

	// }elseif(!empty($_FILES['hinhanh4']['name']) ){
	// 	move_uploaded_file($hinhanh4_tmp,'uploads/'.$hinhanh4);
		
		
	// 	$sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',sale='".$sale."',sanxuat='".$sanxuat."',hinhanh4='".$hinhanh4."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."',id_band='".$band."' WHERE id_sanpham='$_GET[idsanpham]'";
	// 	//xoa hinh anh cu
	// 	$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
	// 	$query = mysqli_query($mysqli,$sql);
	// 	while($row = mysqli_fetch_array($query)){
	// 		unlink('uploads/'.$row['hinhanh4']);
			
	// 	}

	// }elseif(!empty($_FILES['hinhanh5']['name']) ){
	// 	move_uploaded_file($hinhanh5_tmp,'uploads/'.$hinhanh5);
		
		
		// $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',sale='".$sale."',sanxuat='".$sanxuat."',hinhanh5='".$hinhanh5."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
		// //xoa hinh anh cu
		// $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
		// $query = mysqli_query($mysqli,$sql);
		// while($row = mysqli_fetch_array($query)){
		// 	unlink('uploads/'.$row['hinhanh5']);
			
		// }

	}
	
	
	else{
		$sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',sale='".$sale."',sanxuat='".$sanxuat."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
	}
	mysqli_query($mysqli,$sql_update);
		header('Location:../../index.php?action=quanlysp&query=lietkesp');
}else{
	$id=$_GET['idsanpham'];
	$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('uploads/'.$row['hinhanh']);
		// unlink('uploads/'.$row['hinhanh2']);
		// unlink('uploads/'.$row['hinhanh3']);
		// unlink('uploads/'.$row['hinhanh4']);
		// unlink('uploads/'.$row['hinhanh5']);
	}
	$sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlysp&query=lietkesp');
}

?>