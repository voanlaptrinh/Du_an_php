<?php
require_once './../dao/hang_hoa.php';
$data = [
    'ma_sp' => $_POST['ma_sp'],
    'ten_sp' => $_POST['ten_sp'],
    'gia' => $_POST['gia'],
    'so_luong' => $_POST['so_luong'],
    'mieu_ta' => $_POST['mieu_ta'],
    'loai' => $_POST['loai'],
    'dac_biet' => $_POST['dac_biet'],
    'trang_thai' => $_POST['trang_thai'],
];


$fileUpload = $_FILES['img'];
$anh_hh = $_GET['img'];
$storePath = './images/';
$filename = $fileUpload['name'];
$path = $storePath . $filename;
if ($filename == '') {
    $data['img']= $anh_hh;
}else{
    move_uploaded_file($fileUpload['tmp_name'], $path);
    $data['img'] = '/du_an_team/hang_hoa/images/' . $filename;
}
// var_dump($data);
// die;
sua($data);
header("Location:/du_an_team/hang_hoa/");
?>