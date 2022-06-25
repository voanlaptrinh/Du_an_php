<?php
require_once "./dao/pdo.php";
function khach_hang_by_ten_kh($user, $password){
    $sql="SELECT * FROM dang_nhap WHERE ten_tk = ? AND mat_khau = ?" ;
    $conn = pdo_query_one($sql, $user, $password);
    return $conn;
}

?>