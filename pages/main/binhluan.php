<?php

// Xử lý khi gửi bình luận
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment_text'])) {
    // Kiểm tra người dùng đã đăng nhập
    if (!isset($_SESSION['id_khachhang'])) {
        echo "<p>Bạn phải <a href='dangnhap.php'>đăng nhập</a> để bình luận.</p>";
        exit();
    }
    
    // Bảo mật và chuẩn bị dữ liệu
    $comment = $mysqli->real_escape_string($_POST['comment_text']);
    $user_id = $_SESSION['id_khachhang'];
    $product_id = $mysqli->real_escape_string($_GET['id']); // Lấy id sản phẩm từ GET

    // Thực hiện thêm bình luận vào cơ sở dữ liệu
    $sql = "INSERT INTO tbl_binhluan (id_khachhang, id_sanpham, noidung) VALUES ('$user_id', '$product_id', '$comment')";
    if ($mysqli->query($sql) === TRUE) {
        echo "<p>Bình luận đã được gửi!</p>";
    } else {
        echo "<p>Có lỗi xảy ra khi gửi bình luận: " . $mysqli->error . "</p>";
    }
}

// Lấy bình luận liên quan đến sản phẩm
$product_id = $mysqli->real_escape_string($_GET['id']);
$sql = "SELECT tbl_binhluan.noidung, tbl_dangky.tenkhachhang, tbl_binhluan.ngaybinhluan 
        FROM tbl_binhluan 
        JOIN tbl_dangky ON tbl_binhluan.id_khachhang = tbl_dangky.id_dangky 
        WHERE id_sanpham = '$product_id' AND trangthai = 0 
        ORDER BY tbl_binhluan.ngaybinhluan DESC";
$comments = $mysqli->query($sql);
?>

<h3>Bình luận</h3>
<div id="commentList">
    <?php
    if ($comments->num_rows > 0) {
        while($row = $comments->fetch_assoc()) {
            echo "<p><strong>" . htmlspecialchars($row['tenkhachhang']) . ":</strong> " . htmlspecialchars($row['noidung']) . " <em>(" . $row['ngaybinhluan'] . ")</em></p>";
        }
    } else {
        echo "<p>Chưa có bình luận nào cho sản phẩm này.</p>";
    }
    ?>
</div>

<!-- Form bình luận -->
<?php if (isset($_SESSION['id_khachhang'])): ?>
    <form method="POST" action="">
        <textarea name="comment_text" rows="4" cols="50" required></textarea><br><br>
        <button type="submit">Gửi bình luận</button>
    </form>
<?php else: ?>
    <p>Bạn phải <a href="dangnhap.php">đăng nhập</a> để bình luận.</p>
<?php endif; ?>
