<?php
session_start();
require_once './../dao/pdo.php';
if ($_SESSION['user'] == true) {
    if (isset($_GET['ma_sp'])) {
        $ma_sp = $_GET['ma_sp'];
        $conn = pdo_get_connection();
        $sql = "SELECT * FROM hang_hoa WHERE ma_sp = $ma_sp";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $rowData = $statement->fetch();
        if (isset($rowData) == false) {
            die;
        }

        if (isset($_SESSION['cart']) && array_key_exists($ma_sp, $_SESSION['cart'])) {
            $_SESSION['cart'][$ma_sp]['0']['quantity'] += 1;
        } else {
            $_SESSION['cart'][$ma_sp] = array([
                'ma_sp' => $ma_sp,
                'quantity' => 1,
                'ten_sp' => $rowData['ten_sp'],
                'img' => $rowData['img'],
                'gia' => $rowData['gia'],
            ]);
        }

        header("location: https://localhost/du_an_team/gio_hang/xem_gio.php");
    }
} else {

    header("location: https://localhost/du_an_Team/index.php");
}
