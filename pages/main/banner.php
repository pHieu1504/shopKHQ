<?php
// Bắt đầu session nếu cần
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kết nối CSDL nếu chưa có
if (!isset($mysqli)) {
    include_once("../../admincp/config/config.php");
}

// Truy vấn banner
$sql_bv = "SELECT * FROM tbl_banner";
$query_bv = mysqli_query($mysqli, $sql_bv);

// Kiểm tra kết quả truy vấn
if (!$query_bv) {
    echo "<p class='text-danger'>Không thể truy vấn dữ liệu banner.</p>";
    return;
}
?>

<div class="tintuc_nb owl-carousel">
    <?php while ($row_bv = mysqli_fetch_array($query_bv)) { ?>
        <div class="tintuc_nb-items">
            <div class="tintuc_nb-items-img">
                <img src="../../admincp/modules/quanlybanner/uploads/<?php echo htmlspecialchars($row_bv['hinhanh']); ?>" alt="Banner">
            </div>
        </div>
    <?php } ?>
</div>

<style>
    .tintuc_nb {
        width: 1200px;
        margin: 0 auto;
        background-color: #fff;
        margin-bottom: 20px;
        padding: 10px;
        padding-bottom: 50px;
    }

    .tintuc_nb-items-title a {
        font-size: 25px;
        font-weight: 600;
        text-align: justify;
    }

    .tintuc_nb-items-img a {
        width: 100%;
        height: 400px;
    }

    .tintuc_nb-items-img img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }
</style>
<script>
    $(function() {
        $(".tintuc_nb").owlCarousel({
            items: 1,
            slideBy: 1,
            responsive: {
                1200: {
                    items: 6,
                }, // breakpoint from 1200 up
                982: {
                    items: 5,
                },
                768: {
                    items: 4,
                },
                480: {
                    items: 1,
                    autoWidth: true,

                },
                0: {
                    items: 1,
                }
            },
            rewind: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            smartSpeed: 500,
            dots: true,
            loop: true,
            nav: false,
            autoWidth: false,
            margin: 15,
            lazyLoad: false,
            navText: ["<img src='img/left.png'>", "<img src='img/right.png'>"],
            transitionStyle: "backSlide",
            animateOut: 'fadeOut', // default: false
            animateIn: 'fadeIn', // default: false
        });


    })
</script>