<?php
// Xử lý yêu cầu ẩn/hiện bình luận
if (isset($_POST['toggle_visibility'])) {
    $comment_id = intval($_POST['comment_id']);
    $is_hidden = intval($_POST['is_hidden']) ? 0 : 1;

    $sql = "UPDATE tbl_binhluan SET trangthai = $is_hidden WHERE id_binhluan = $comment_id";
    // if ($mysqli->query($sql) === TRUE) {
    //     echo "Cập nhật thành công!";
    // } else {
    //     echo "Lỗi: " . $mysqli->error;
    // }
}

// Lấy danh sách tất cả bình luận
$sql = "SELECT tbl_binhluan.id_binhluan, tbl_binhluan.noidung, tbl_dangky.tenkhachhang, tbl_binhluan.ngaybinhluan, tbl_binhluan.trangthai, tbl_sanpham.tensanpham AS tensanpham
        FROM tbl_binhluan 
        JOIN tbl_dangky ON tbl_binhluan.id_khachhang = tbl_dangky.id_dangky
        JOIN tbl_sanpham ON tbl_binhluan.id_sanpham = tbl_sanpham.id_sanpham
        ORDER BY tbl_binhluan.ngaybinhluan DESC";
$comments = $mysqli->query($sql);
?>

<div class="form">
    <h2>Quản lý bình luận</h2>
    <div class="table">
        <div class="table-title">
            <div class="id3">Id</div>
            <div class="tenbaiviet">Khách hàng</div>
            <div class="danhmucbv">Sản phẩm</div>
            <div class="tomtatbv">Nội Dung</div>
            <div class="trangthaibv">Trạng thái</div>
            <div class="trangthaibv">Ngày bình luận</div>
        </div>

        <?php
        if ($comments->num_rows > 0) {
            while ($row = $comments->fetch_assoc()) {
        ?>
                <div class="table-sp">
                    <div class="id3 sp"><?php echo $row['id_binhluan']; ?></div>
                    <div class="tenbaiviet sp"><?php echo htmlspecialchars($row['tenkhachhang']); ?></div>
                    <div class="danhmucbv sp"><?php echo htmlspecialchars($row['tensanpham']); ?></div>
                    <div class="tomtatbv sp"><?php echo htmlspecialchars($row['noidung']); ?></div>
                    <div class="trangthaibv sp">
                        <form method="POST" style="display:inline">
                            <input type="hidden" name="comment_id" value="<?php echo $row['id_binhluan']; ?>">
                            <input type="hidden" name="is_hidden" value="<?php echo $row['trangthai']; ?>">
                            <button type="submit" name="toggle_visibility"><?php if($row['trangthai'] ? "Ẩn" : "Hiện") ?></button>
                        </form>
                    </div>
                    <div class="trangthaibv sp"><?php echo $row['ngaybinhluan']; ?></div>
                </div>
        <?php
            }
        } else {
            echo "<div>Không có bình luận nào.</div>";
        }
        ?>
    </div>
</div>

<?php $mysqli->close(); ?>

