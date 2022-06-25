<?php
session_start();
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
$tong_tien = 0;
require_once "../dao/pdo.php";
// $sql = "SELECT * FROM khach_hang where ma_kh=?";
// $thong_tin_kh = pdo_query_one($sql,$_SESSION['user']['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://localhost/du_an_team/css/gio_hang.css">
    <link rel="stylesheet" href="https://localhost/du_an_team/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://localhost/du_an_team/css/index.css">

</head>

<body>
    <div class="container">
        <!-- phần đầu -->
        <div class="header">
            <div>
                <a href="https://localhost/du_an_Team/index.php">
                    <img src="./../logo/XAmPOST.png" alt="" width="100px">
                </a>
            </div>

            <form action="tim_kiem.php" method="get">
                <div class="input-group">
                    <input type="search" class="form-control rounded" aria-label="Search" aria-describedby="search-addon" name="q" placeholder="Nhập từ khóa tìm kiếm" require />
                    <button type="submit" class="btn btn-outline-primary">search</button>
            </form>

        </div>


        <div class="gio_hang">
            <div class="hang"><img src="./../logo/kisspng-shopping-cart-software-computer-icons-shopping-icon-5b3eb003bbc062.574139001530834947769-removebg-preview.png" alt="" width="80px">
                <div class="text_gio_hang"><a href=""> Giỏ hàng</a></div>
            </div>
        </div>
    </div>
    <div>
        <div style="display: flex;">
            <div style="width: 900px; margin-right: 25px;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>MÃ</th>
                            <th>TÊN</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ</th>
                            <th>ẢNH</th>
                            <th colspan="2">CHỨC NĂNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $key => $value) {  ?>
                            <tr>
                                <td><?php echo $value['0']['ma_sp'] ?></td>
                                <td><?php echo $value['0']['ten_sp'] ?></td>
                                <td><?php echo $value['0']['quantity'] ?></td>
                                <td><?php echo number_format($value['0']['gia'], 0, ',', '.') ?>đ</td>
                                <td><img src="<?php echo $value['0']['img'] ?>" style="width:100px; height:100px" alt=""></td>
                                <td><a href="xoa_sp.php?ma_sp=<?php echo $value['0']['ma_sp'] ?>" class="btn btn-danger">XÓA</a></td>
                            </tr>
                            <?php $tong_tien += (int)$value['0']['gia'] * $value['0']['quantity']; ?>
                        <?php } ?>
                        <tr>
                            <td colspan="7" class="tong">TỔNG: <?php echo number_format($tong_tien, 0, ',', '.'); ?>đ</td>
                            <?php $_SESSION['tong_tien_gio_hang'] = $tong_tien; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form action="./../hoa_don/them_hang.php" method="POST">
                <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
                <h1>Nhập thông tin </h1>
                <div>
                    <label class="ten" for="">Họ tên</label> <br>
                    <input type="text" name="ten_kh" class="input">
                </div>
                <div>
                    <label class="ten" for="">Số điện thoại</label> <br>
                    <input type="text" name="sdt" class="input" >
                </div>
                <div>
                    <label class="ten" for="">Địa chỉ</label> <br>
                    <input type="text" name="dia_chi" class="input" >
                </div>
                <button  type="submit" class="btn btn-danger">ĐẶT HÀNG</button>
            </form>
            <?php ?>
        </div>
        <a href="https://localhost/du_an_Team/hoa_don/xem_don_hang.php" class="btn btn-danger"> xem đơn hàng</a>
    </div>
    </div>
</body>

</html>