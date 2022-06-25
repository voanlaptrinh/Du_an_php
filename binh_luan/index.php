<?php
require_once "./../dao/binh_luan.php";
$kq = getAll1();
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
    <div class="container" >
    <header>
            <img src="./../logo/XAmPOST.png" alt="" width="100px">
            <nav>
               <ul>
                    <li><a href="http://localhost/du_an_team/">Trang chủ</a></li>
                    <li><a href="">Loại hàng</a></li>
                    <li><a href="http://localhost/du_an_team/hang_hoa/">Hàng hóa</a></li>
                    <li><a href="#">Khách hàng</a></li>
                    <li><a href="https://localhost/du_an_Team/binh_luan/">Bình luận</a></li>
                    <li><a href="https://localhost/du_an_Team/thong_ke/thong_ke.php">Thống kê</a></li>
                </ul>
            </nav>
        </header>
        <!-- phần quản lý sản phẩm -->

        <div class="quan_ly"><h2>Quản lý Bình luận</h2><br> </div>

        <div class="ql_sp">
            
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th class="">Mã Bình luận</th>
                        <th class="col">Nội dung</th>
                        <th class="col">id tài khoản</th>
                        <th class="col">mã _sản_phẩm</th>
                        <th class="col" colspan="2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i <count($kq) ; $i++){?>
            <tr>
                <td>
                    <?php echo $kq[$i]['ma_bl']?>
                </td>
                <td>
                    <?php echo $kq[$i]['noi_dung']?>
                </td>
                <td>
                    <?php echo $kq[$i]['id']?>
                </td>
                <td>
                    <?php echo $kq[$i]['ma_sp']?>
                </td>
                <td>
                <button class="btn btn-danger"> <a href="xoa.php?id=<?php echo $kq[$i]['ma_bl'] ?>" onclick="return confirm('Ban co muon xoa khong ?')">Xóa</a></button>
                </td>      
            </tr>
            <?php } ?>
                </tbody>


            </table>
        </div>
</body>

</html>