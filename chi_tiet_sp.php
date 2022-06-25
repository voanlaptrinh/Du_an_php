<?php

require_once "./dao/binh_luan.php";
require_once "./dao/hang_hoa.php";
require_once "./dang_nhap/dang_nhap.php";
$ma_hh = $_GET['id'];
$kq = hang_hoa_select_by_id($ma_hh);
session_start();

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
</head>

<body>
    <div class="container">
        <!-- phần đầu -->
        <div class="header">
            <div> <img src="./logo/XAmPOST.png" alt="" width="100px"> </div>
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary">search</button>
            </div>

            <div class="gio_hang">
                <div class="hang"><img src="./logo/kisspng-shopping-cart-software-computer-icons-shopping-icon-5b3eb003bbc062.574139001530834947769-removebg-preview.png" alt="" width="80px">
                    <div class="text_gio_hang"><a href=""> Giỏ hàng</a></div>
                </div>
            </div>
        </div>
        <!-- Phẩn Banner -->
        <div class="banner">
            <div>
                <img id="benner" src="./logo/1.png" alt="" width="900px" height="400px">
            </div>
            <div class="form" style=" border: 2px solid #8d8e8d; width: 500px; padding: 30px 30px 30px 30px; border-radius: 10px;">
                <form method="POST" action="index.php">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <div style="margin-left: 50px; margin-top: 30px;">
                            <img src="./logo/XAmPOST.png" alt="" width="200px" height="200px" style="border-radius: 50%;">
                            <p> Tên tài khoản: <?= $_SESSION['user']['ten_tk'] ?></p>
                            <button name="dang_xuat" type="submit" class="btn btn-info">Thoát</button>
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
                            <input name="dang_nhap" type="submit" value="Đăng nhập" class="btn btn-info">
                            <a href="./dang_ky/dang_ky.php" class="btn btn-secondary"> Đăng Ký</a>
                        </div>

                    <?php endif; ?>
                </form>
            </div>

        </div>

        <!-- Phần Menu -->
        <nav class="nav nav-tabs" id="nav">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="index.php">Trang chủ</a>
            <a class="nav-link" id="product-tab" data-toggle="tab" href="#product">Sản phẩm</a>
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="gioi_thieu.html">Giới thiệu</a>
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact">Tin tức</a>
        </nav>




        <div class="chi_tiet_sp">
            <h3> Sản phẩm bán chạy</h3>
        </div>
        <div class="chi_Tiet">
            <div> <img src="<?php echo $kq['img'] ?>" alt="" class="card-img-top">
                <h2 class="card-title"><?php echo $kq['ten_sp'] ?></h2>
            </div>


            <div class="dl-horizontal">

                <dt class="card-text">Giá: <?php echo $kq['gia'] ?> VND</dt>

                <h3> Mô tả: <br>
                    <h5 style="width: 500px;"> <?php echo $kq['mieu_ta'] ?></h5>
            </div>


        </div>

        <div>

            <hr>
            <?php
            if (isset($_SESSION['user'])) { ?>

                <label for="comment">Comment:</label>
                <form method="post" action="./dao/insert_bl.php" style=" margin-bottom: 30px; ">

                    <input type="hidden" name="id" value="<?php echo $kq['ma_sp'] ?>">
                    <input type="text" name="binh_luan" style="margin-right: 30px; border-radius: 10px; border: 3px solid black; width: 1150px; height: 100px;">
                    <button type="submit" style="width: 100px;" class="btn btn-success" name="gui">gửi</button>
                </form>

            <?php } else { ?>
                <?php echo '<p style="color: red; text-align: center; font-size:25px ;">Phần Bình luận sẽ hiện ra khi bạn đăng nhập♥♥☻♥♥</p>'; ?>
            <?php }
            ?>
        </div>
        <hr>

        <div>
            <h4>Phần bình luận:</h4>
            <ul style="list-style: none; font-size: 20px; color: crimson; margin-bottom: 20px;">
                <?php
                $ds_bl = binh_luan_select_by_hang_hoa($ma_hh);
                foreach ($ds_bl as  $value) :


                ?>
                    <li>
                        <div style="display: flex;">
                            - <?php echo $value['ten_tk'] ?> :
                            <?php echo $value['noi_dung'] ?>

                        </div>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>

        </div>
        <hr>



        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="background: #8d8e8d; color:black; border-radius: 10px;">
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



    <script src="./css//jquery-3.3.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
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