<?php
require_once "./../dao/pdo.php";
session_start();
$conn = new PDO("mysql:host=localhost; dbname=DU_AN_team; charset=utf8;", "root", "");

$data =[
  'ten_kh' => $_POST['ten_kh'],
    'id' => $_POST['id'],
    'sdt' => $_POST['sdt'],
    'dia_chi' => $_POST['dia_chi'],
    
];
$ngay_mua = date('d/m/Y');
$trang_thai = 'đang giao';
$sql = "INSERT INTO hoa_don(ma_kh, ngay_mua, trang_thai, dia_chi, sdt, ten_kh, tong_tien) VALUES (?,?,?,?,?,?,?)";
pdo_execute($sql,$data['id'],$ngay_mua, $trang_thai, $data['dia_chi'], $data['sdt'], $data['ten_kh'], $_SESSION['tong_tien_gio_hang']);


foreach ($_SESSION['cart'] as $key => $value) {
  $ma_sp = $value['0']['ma_sp'];
  $ten_sp = $value['0']['ten_sp'];
  $so_luong = $value['0']['quantity'];
  $gia = $value['0']['gia'];
  $sql = "INSERT INTO ct_don_hang(ma_sp,ten_sp,so_luong,don_gia) values('$ma_sp','$ten_sp','$so_luong',$gia)";
  $smt = $conn->prepare($sql);
  $smt->execute();
}

$ten_kh = $_POST['ten_kh'];
$dia_chi = $_POST['dia_chi'];
$sdt = $_POST['sdt'];
$sql = "INSERT INTO khach_hang(ten_kh,dia_chi,sdt) VALUE('$ten_kh','$dia_chi','$sdt')";
$smt = $conn->prepare($sql);
$smt->execute();
// $sql = "SELECT * FROM SELECT * FROM hoa_don dh JOIN ct_don_hang ct on dh.ma_don_hang = ct.ma_don_hang WHERE ma_don_hang=?";
// $smt = $conn->prepare($sql);
// $smt->execute();

header("location: https://localhost/du_an_Team/hoa_don/xem_don_hang.php");
