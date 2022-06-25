<?php
session_start();
require_once './../dao/pdo.php';
if (isset($_GET['ma_sp']) == true) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($key == $_GET['ma_sp']) {
            unset($_SESSION['cart'][$key]);
            header("location: https://localhost/du_an_team/gio_hang/xem_gio.php");
        }
    }
}


?>