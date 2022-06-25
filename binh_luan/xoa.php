<?php
require_once './../dao/binh_luan.php';
$hang_hoa = intval($_GET['id']);
xoa1($hang_hoa);
header("location: /du_an_team/binh_luan/");
?>