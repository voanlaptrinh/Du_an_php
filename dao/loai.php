<?php
require_once "pdo.php";
function loai_select_all(){
    $sql = "SELECT * FROM loai";
    return pdo_query($sql);
}
function loai_select_by_id($ma_loai) {
    $sql = "SELECT * FROM loai WHERE loai=?";
    return pdo_query_one($sql, $ma_loai);
}
?>