<?php
$conn = new PDO("mysql:host=localhost; dbname=DU_AN_team; charset=utf8;", "root", "");
$id = $_GET['ma_don_hang'];
$sql = "DELETE from hoa_don where ma_don_hang = $id";
$stm = $conn->prepare($sql);
$stm->execute();
header("location: //localhost/du_an_Team/hang_hoa/admin_hoa_don/");
?>