<?php
$conn = new PDO("mysql:host=localhost; dbname=DU_AN_team; charset=utf8;", "root", "");
$sql = "SELECT * from hoa_don";
$stm = $conn->prepare($sql);
$stm->execute();
$khach_hang = $stm->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../../css//bootstrap.min.css">
    <link rel="stylesheet" href="./../../css/index.css">
    <link rel="stylesheet" href="./../../css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <header>
            <img src="./../logo/XAmPOST.png" alt="" width="100px">
            <nav>
                <ul>
                    <li><a href="http://localhost/du_an_team/">Trang chủ</a></li>
                    <li><a href="">Loại hàng</a></li>
                    <li><a href="http://localhost/du_an_team/hang_hoa/">Hàng hóa</a></li>
                    <li><a href="">đơn hang</a></li>
                    <li><a href="https://localhost/du_an_Team/binh_luan/">Bình luận</a></li>
                    <li><a href="https://localhost/du_an_Team/thong_ke/thong_ke.php">Thống kê</a></li>
                </ul>
            </nav>
        </header>
        <!-- phần quản lý sản phẩm -->

        <div class="quan_ly">
            <h2>Quản lý Hóa đơn</h2><br>
        </div>

        <div class="ql_sp">



            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col1">Mã hóa đơn</th>
                        <th class="col2">MÃ khách hàng</th>
                        <th class="col3">TỔNG TIỀN</th>
                        <th class="col4" colspan="2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($khach_hang as $key => $value) : ?>
                        <tr>
                            <td><?= $value['ma_don_hang'] ?></td>
                            <td><?= $value['ma_kh'] ?></td>
                            <td><?= $value['tong_tien'] ?></td>
                            <td>
                                <button class="btn btn-danger"> <a href="xoa_hd.php?ma_don_hang=<?= $value['ma_don_hang'] ?>" onclick="return confirm('Ban co muon xoa khong ?')">Xoa</a></button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>


            </table>
        </div>
</body>

</html>