<?php
require_once "./../dao/hang_hoa.php";
$kq = getAll();
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header('location: http://localhost/du_an_team/');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=".././css//bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <header>
            <div>
                <a href="https://localhost/du_an_Team/index.php">
                    <img src="./../logo/XAmPOST.png" alt="" width="100px">
                </a>
            </div>
            <nav>
                 <ul>
                    <li><a href="http://localhost/du_an_team/">Trang chủ</a></li>
                    <li><a href="https://localhost/du_an_Team/hang_hoa/admin_hoa_don/">Loại hàng</a></li>
                    <li><a href="http://localhost/du_an_team/hang_hoa/">Hàng hóa</a></li>
                    <li><a href="https://localhost/du_an_Team/hang_hoa/admin_hoa_don/">hóa đơn</a></li>
                    <li><a href="https://localhost/du_an_Team/binh_luan/">Bình luận</a></li>
                    <li><a href="https://localhost/du_an_Team/thong_ke/thong_ke.php">Thống kê</a></li>
                </ul>
            </nav>
        </header>
        <!-- phần quản lý sản phẩm -->

        <div class="quan_ly">
            <h2>Quản lý sản phẩm</h2><br>
        </div>

        <div class="ql_sp">


            <a href="them.php"><button type="button" class="btn btn-success">Thêm</button></a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="">Mã SP</th>
                        <th class="col">Tên Sản phẩm</th>
                        <th class="col">Giá</th>
                        <th class="col">Số lượng</th>
                        <th class="col">Ảnh Sản phẩm</th>
                        <th class="col">Loại</th>
                        <th class="col">Đặc Biệt</th>
                        <th class="col">Trạng thái</th>
                        <th class="col" colspan="2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($kq); $i++) { ?>
                        <tr>
                            <td>
                                <?php echo $kq[$i]['ma_sp'] ?>
                            </td>
                            <td>
                                <?php echo $kq[$i]['ten_sp'] ?>
                            </td>
                            <td>
                                <?php echo $kq[$i]['gia'] ?>
                            </td>
                            <td>
                                <?php echo $kq[$i]['so_luong'] ?>
                            </td>
                            <td>
                                <img src="<?php echo $kq[$i]['img'] ?>" alt="" style="width:100px; height:100px;">
                            </td>
                            <td>
                                <?php echo $kq[$i]['loai'] ?>
                            </td>
                            <td>
                                <?php echo $kq[$i]['dac_biet'] ?>
                            </td>
                            <td>
                                <?php echo $kq[$i]['trang_thai'] ?>
                            </td>
                            <td>
                                <button class="btn btn-secondary"> <a href="./sua.php?id=<?php echo $kq[$i]['ma_sp'] ?>">Sua</a></button>
                            </td>
                            <td>
                                <button class="btn btn-danger"> <a href="./xoa.php?id=<?php echo $kq[$i]['ma_sp'] ?>" onclick="return confirm('Ban co muon xoa khong ?')">Xoa</a></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>


            </table>
        </div>
</body>

</html>