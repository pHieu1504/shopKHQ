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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .comment-section {
        margin-top: 30px;
        background: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .comment-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333;
        text-align: center;
    }

    .comment-list {
        margin-bottom: 15px;
    }

    .comment-item {
        border-bottom: 1px solid #ddd;
        padding: 8px 0;
    }

    .comment-item:last-child {
        border-bottom: none;
    }

    .comment-item strong {
        color: #007bff;
    }

    .comment-item em {
        font-size: 12px;
        color: #888;
    }

    .comment-form textarea {
        width: 100%;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 8px;
        resize: none;
    }

    .comment-form button {
        background: #007bff;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.2s;
    }

    .comment-form button:hover {
        background: #0056b3;
    }
</style>

<div class="comment-section">
    <h3 class="comment-title">Bình luận</h3>
    <div id="commentList" class="comment-list">
        <?php
        if ($comments->num_rows > 0) {
            while ($row = $comments->fetch_assoc()) {
                echo "<div class='comment-item'>";
                echo "<p><strong>" . htmlspecialchars($row['tenkhachhang']) . ":</strong> " . htmlspecialchars($row['noidung']) . " <em>(" . $row['ngaybinhluan'] . ")</em></p>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-danger'>Chưa có bình luận nào cho sản phẩm này.</p>";
        }
        ?>
    </div>

    <!-- Form bình luận -->
    <?php if (isset($_SESSION['id_khachhang'])) : ?>
        <form method="POST" action="" class="comment-form">
            <textarea name="comment_text" rows="3" placeholder="Nhập bình luận của bạn..." required></textarea><br><br>
            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
        </form>
    <?php else : ?>
        <p>Bạn phải <a href="dangnhap.php" class="text-primary">đăng nhập</a> để bình luận.</p>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>