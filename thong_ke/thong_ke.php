<?php 
$connect = new mysqli('localhost','root','', 'du_an');
$query = "SELECT `table_cate`.*, COUNT(table_product.cate_id) AS 'number_cate' FROM `table_product` INNER JOIN `table_cate` 
ON table_product.cate_id = table_cate.cate_id GROUP BY table_product.cate_id";
$result = mysqli_query($connect, $query);
$data = [];
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
} 
// echo "<pre>";
// var_dump($data);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../css//bootstrap.min.css">
    <link rel="stylesheet" href="./../css/index.css">
    <link rel="stylesheet" href="./../css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['cate_name', 'number_cate'],
          <?php
          foreach ($data as $key ) {
            echo "['".$key['cate_name']. "' ,".$key['number_cate']. "],";
          }
          ?>
        ]);

        var options = {
          title: 'Biểu đồ thống kê',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
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
                    <li><a href="#">Khách hàng</a></li>
                    <li><a href="https://localhost/du_an_Team/binh_luan/">Bình luận</a></li>
                    <li><a href="https://localhost/du_an_Team/thong_ke/thong_ke.php">Thống kê</a></li>
                </ul>
            </nav>
        </header>
        <div class="quan_ly">
            <h2>Quản lý Thống kê</h2><br>
        </div>

        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
</body>

</html>