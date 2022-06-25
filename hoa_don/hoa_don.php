<?php
session_start();
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
$tong_tien = 0;
$conn = new PDO("mysql:host=localhost; dbname=DU_AN_team; charset=utf8;", "root", "");
$sql = "SELECT * from hoa_don";
$stm = $conn->prepare($sql);
$stm->execute();
$hoa_don = $stm->fetchAll();
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
    <link rel="stylesheet" href="./../css//bootstrap.min.css">
    <link rel="stylesheet" href="./../css/index.css">
    <link rel="stylesheet" href="./../css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                    <input type="search" class="form-control rounded" aria-label="Search" aria-describedby="search-addon" name="q" placeholder="Nhập từ khóa tìm kiếm" required />
                    <button type="submit" class="btn btn-outline-primary">search</button>
            </form>

        </div>


        <div class="gio_hang">
            <div class="hang"><img src="./../logo/kisspng-shopping-cart-software-computer-icons-shopping-icon-5b3eb003bbc062.574139001530834947769-removebg-preview.png" alt="" width="80px">
                <div class="text_gio_hang"><a href=""> Giỏ hàng</a></div>
            </div>
        </div>
    </div>
    <!-- phần quản lý sản phẩm -->
    <h2 class="hoa">Hóa Đơn</h2>
    <div class="ql_sp">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Mã khách hàng</th>
                    <th>ngày mua</th>
                    <th>trang thái </th>
                    <th>đia chỉ </th>
                    <th>sdt</th>
                    <th>tên khách hàng </th>
                    <th>tổng tiền</th>
                    <th class="col4">Thao tác</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($hoa_don as $key => $value) : ?>
                    <tr>
                        <td><?= $value['ma_don_hang'] ?></td>
                        <td><?= $value['ma_kh'] ?></td>
                        <td><?= $value['ngay_mua'] ?></td>
                        <td><?= $value['trang_thai'] ?></td>
                        <td><?= $value['dia_chi'] ?></td>
                        <td><?= $value['sdt'] ?></td>
                        <td><?= $value['ten_kh'] ?></td>
                        <td><?= $value['tong_tien'] ?></td>
                        <td>
                            <a href="ct_don_hang.php?ma_don_hang=<?php echo $value['ma_don_hang'] ?>">xem chi tiết</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div>

    </div>
</body>

</html>