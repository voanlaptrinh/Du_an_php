<?php
require_once "./dao/hang_hoa.php";
require_once "./dang_nhap/dang_nhap.php";
require_once "./dao/pdo.php";

if (isset($_GET['loai'])) {
    $kq = hang_hoa_select_by_ma_loai($_GET['loai']);
} else {
    $kq = getAll();
}
session_start();
if (isset($_POST['dang_nhap'])) {

    $user = $_POST['ten_tk'];
    $password = $_POST['mat_khau'];
    $khach_hang = khach_hang_by_ten_kh($user, $password);
    if (!empty($khach_hang)) {
        $_SESSION['user'] = $khach_hang;
    }
}
if (isset($_POST['dang_xuat'])) {
    session_destroy();
    header("location: http://localhost/du_an_team/");
}

if (isset($_GET['q']) && !empty($_GET['q'])) {

    $keyword = $_GET['q'];
    $sql = "SELECT * FROM hang_hoa where ten_sp like '%$keyword%'";
    $tim_kiem = pdo_query($sql);
    // var_dump($tim_kiem); die;
} else {
    $sql = "SELECT * FROM hang_hoa";
    $tim_kiem = pdo_query($sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/dang_nhap.css">
</head>

<body>
    <div class="container">
        <!-- phần đầu -->
        <div class="header">
            <div>
                <a href="https://localhost/du_an_Team/index.php">
                    <img src="./logo/XAmPOST.png" alt="" width="100px">
                </a>
            </div>

            <form action="tim_kiem.php" method="get">
                <div class="input-group">
                    <input type="search" class="form-control rounded" aria-label="Search" aria-describedby="search-addon" name="q" placeholder="Nhập từ khóa tìm kiếm" required/>
                    <button type="submit" class="btn btn-outline-primary">search</button>
            </form>

        </div>


        <div class="gio_hang">
            <div class="hang"><img src="./logo/kisspng-shopping-cart-software-computer-icons-shopping-icon-5b3eb003bbc062.574139001530834947769-removebg-preview.png" alt="" width="80px">
                <div class="text_gio_hang"><a href=""> Giỏ hàng</a></div>
            </div>
        </div>
    </div>

    <!-- Phẩn Banner -->
    <div class="banner">
        <div style="margin-right: 20px;">
            <img id="benner" src="./logo/1.png" alt="" width="900x" height="400px">
        </div>

        <div class="form" style=" border: 2px solid #8d8e8d; width: 500px; padding: 30px 30px 30px 30px; border-radius: 10px;">
            <form method="POST" action="index.php">
                <?php if (isset($_SESSION['user'])) : ?>
                    <div style="margin-left: 50px; margin-top: 30px;">
                        <img src="./logo/XAmPOST.png" alt="" width="200px" height="200px" style="border-radius: 50%;">
                        <p> Tên tài khoản: <?= $_SESSION['user']['ten_tk'] ?></p>
                        <button name="dang_xuat" type="submit" class="btn btn-login float-right">Thoát</button>
                    </div>
                <?php else : ?>
                    <h2 style="text-align: center;">Đăng nhập</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                        <input type="text" class="form-control" placeholder="" name="ten_tk" id="id">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                        <input type="password" class="form-control" placeholder="" id="password" type="password" name="mat_khau">
                    </div>

                    <a href="./dang_nhap/form_quen_mk.html">Bạn quên mật khẩu?</a>
                    <div style="float: right; margin-top: 20px;">
                        <input name="dang_nhap" type="submit" value="Đăng nhập" class="btn btn-login float-right">
                        <a href="./dang_ky/dang_ky.php" class="btn btn-secondary"> Đăng Ký</a>
                    </div>

                <?php endif; ?>
            </form>
        </div>

    </div>

    <!-- Phần Menu -->
    <nav class="nav nav-tabs" id="nav">
        <a class="nav-link" id="home-tab" data-toggle="tab" href="index.php">Trang chủ</a>

        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown">Sản phẩm</a>
            <div class="dropdown-content">
                <?php
                require_once "./dao/loai.php";
                $loai_hang = loai_select_all();
                foreach ($loai_hang as $loai) : ?>
                    <a class="dropdown-item" href="?loai=<?php echo $loai['loai'] ?>"><?= $loai['ten_loai'] ?></a>
                <?php endforeach; ?>
            </div>
        </li>

        <a class="nav-link" id="contact-tab" data-toggle="tab" href="gioi_thieu.html">Giới thiệu</a>
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="tin_tuc.html">Tin tức</a>
    </nav>
    <div class="row mt-5">
        <h2 class="list-product-title">Sản phẩm bán chạy</h2>
        <div class="product-group">
            <div class="row">
                <?php for ($i = 0; $i < count($tim_kiem); $i++) { ?>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="card card-product mb-3">
                            <img class="card-img-top" src="<?php echo $tim_kiem[$i]['img'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $tim_kiem[$i]['ten_sp'] ?></h5>
                                <p class="card-text">Giá: <?php echo $tim_kiem[$i]['gia'] ?> VND</p>
                                <div class="mua"></div>
                                <a href="chi_tiet_sp.php?id=<?php echo $tim_kiem[$i]['ma_sp'] ?>" class="btn btn-primary">Chi Tiết</a>
                                <a href="chitietsp.php?id=<?php echo $tim_kiem[$i]['ma_sp'] ?>" class="btn btn-success">Mua sản phẩm</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="background: #8d8e8d; color:black; border-radius: 10px; ">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Cửa hàng quần áo XamPost</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>XAMPOST
                        </h6>
                        <p>
                            Cửa hàng hưa hẹn sẽ đem đến cho khách hàng những sản phẩm mới và chất lượng nhất hiện nay
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i> HÀ Nội ngày Mới</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            Email: KhanhThuanHung@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i>SDT: 0384885529</p>
                        <p><i class="fas fa-print me-3"></i>SDT: 0921933797</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->


    </footer>
    <!-- Footer -->

    </div>




    <script>
        var benner = document.querySelector("#benner");
        var img = [];
        var slide;
        var link_anh = ["./logo/1.png", "./logo/2.jpg"];
        stt = 0;

        for (i = 0; i < link_anh.length; i++) {
            img[i] = new Image();
            img[i].src = link_anh[i];
        }

        function next() {
            stt++;
            if (stt == link_anh.length) {
                stt = 0
            }
            benner.setAttribute("src", img[stt].src);
        }

        function chayanh() {
            slide = setInterval(next, 2000);
        }

        function dung() {
            clearInterval(slide);
        }
        chayanh();
    </script>

</body>

</html>