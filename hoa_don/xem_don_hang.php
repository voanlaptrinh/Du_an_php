<?php
$conn = new PDO("mysql:host=localhost; dbname=DU_AN_team; charset=utf8;", "root", "");
$sql = "SELECT * FROM hoa_don ";
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
                    <input type="search" class="form-control rounded" aria-label="Search" aria-describedby="search-addon" name="q" placeholder="Nhập từ khóa tìm kiếm" />
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
                    <th class="col1">MÃ khách hàng</th>
                    <th class="col2">Tên khách hàng</th>
                    <th class="col">địa chỉ Khách hàng</th>
                    <th class="col7">Số điện thoại</th>
                    <th class="col4" colspan="2">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($khach_hang as $key => $value) : ?>
                    <tr>
                        <td><?= $value['ma_kh'] ?></td>
                        <td><?= $value['ten_kh'] ?></td>
                        <td><?= $value['dia_chi'] ?></td>
                        <td><?= $value['sdt'] ?></td>
                        <td>
                            <a href="hoa_don.php?ma_sp=<?=$value['ma_sp']?>">xem hóa đơn</a>
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