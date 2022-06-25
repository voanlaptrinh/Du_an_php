<?php
require_once "binh_luan.php";
session_start();

if (isset($_POST['gui'])) {
    $ma_hh = $_POST['id'];
    $noi_dung = $_POST['binh_luan'];
    $ma_kh = $_SESSION['user']['id'];
    binh_luan_insert($noi_dung, $ma_kh, $ma_hh);
    // var_dump($noi_dung); die;
    header("location: /du_an_team/chi_tiet_sp.php?id=".$ma_hh);
}