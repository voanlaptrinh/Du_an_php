<?php
require_once './../dao/hang_hoa.php';
$data = [
    'ten_sp' => $_POST['ten_sp'],
    'gia' => $_POST['gia'],
    'so_luong' => $_POST['so_luong'],
    'mieu_ta' => $_POST['mieu_ta'],
    'loai' => $_POST['loai'],
    'dac_biet' => $_POST['dac_biet'],
    'trang_thai' => $_POST['trang_thai'],
];

$fileUp = $_FILES['img'];

$str = './images/';
$filename = $fileUp['name'];
$im = $str . $filename;

move_uploaded_file($fileUp['tmp_name'], $im);
$data['img'] = '/du_an_team/hang_hoa/images/' . $filename;
// var_dump($data);
// die;
them($data);
header("location:/du_an_team/hang_hoa/");
?>
?>