<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị website</title>
    <link rel="stylesheet" href=".././css/form.css">
</head>

<body>
    <div class="container">
        <header>
            <img src="./../logo/XAmPOST.png" alt="" width="100px">
            <nav>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Loại hàng</a></li>
                    <li><a href="#">Hàng hóa</a></li>
                    <li><a href="#">Khách hàng</a></li>
                    <li><a href="#">Bình luận</a></li>
                    <li><a href="#">Thống kê</a></li>
                </ul>
            </nav>
        </header>
        <article>
            <div class="headline">
                <h2>QUẢN LÝ HÀNG HÓA</h2>
            </div>
            <form action="xl_them.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Mã hàng hóa</label>
                            <input class="form-control" type="text" name="ma_sp" readonly placeholder="auto number"
                                disabled>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tên hàng hóa</label>
                            <input class="form-control" type="text" name="ten_sp" placeholder="tên hàng">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Đơn giá</label>
                            <input class="form-control" type="number" name="gia" min="0" value="0">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Số lượng</label>
                            <input class="form-control" type="number" name="so_luong" min="0" value="0">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Hình</label>
                            <input type="file" name="img" placeholder="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Loại hàng</label>
                            <select class="form-control" name="loai" id="">
                                <option value="1">Áo sơ mi</option>
                                <option value="2">Áo khoác</option>
                                <option value="3">Áo thun</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Hàng đặc biệt</label>
                            <div class="form-special">
                                <input type="radio" name="dac_biet" value="1"> Bán chạy
                                <input type="radio" name="dac_biet" value="0" checked> Hàng mới
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <div class="form-special">
                                <input type="radio" name="trang_thai" value="1"> Còn hàng
                                <input type="radio" name="trang_thai" value="0" checked>Hết hàng
                            </div>
                        </div>
                    </div>
                    
                    <div class="full">
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="mieu_ta"></textarea>
                        </div>
                    </div>

                </div>
                <button class="btn" type="submit" name="btn_insert">Thêm</button>
                <button class="btn"><a href="">Danh sách</a></button>

            </form>
        </article>
    </div>
</body>

</html>