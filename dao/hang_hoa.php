<?php
require_once "pdo.php";

function getAll() {
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM hang_hoa";
    $statement= $conn->prepare($sql);
    $statement->execute([]);
    $ket_qua=[];
    while (true) {
        $rowData =  $statement->fetch();
        if ($rowData == false) {
            break;
        }
        $row= [
            'ma_sp' => $rowData['ma_sp'],
            'ten_sp' => $rowData['ten_sp'],
            'gia' => $rowData['gia'],
            'so_luong' => $rowData['so_luong'],
            'img' => $rowData['img'],
            'mieu_ta' => $rowData['mieu_ta'],
            'loai' => $rowData['loai'],
            'dac_biet' => $rowData['dac_biet'],
            'trang_thai' => $rowData['trang_thai'],
        ];
        array_push($ket_qua,$row);
    }
    return $ket_qua;
}
function them(array $data){
    $conn= pdo_get_connection();
    $sql="INSERT INTO hang_hoa(ten_sp,gia,so_luong,img,mieu_ta,loai,dac_biet,trang_thai)".
    " VALUES (:ten_sp, :gia, :so_luong, :img, :mieu_ta, :loai, :dac_biet, :trang_thai )";
    $statement = $conn->prepare($sql);
    $statement->execute($data);

}
//phần sửa lấy tất cả dữ liệu ra
function byId(int $id){
    $sua = pdo_get_connection();
    $cau_lenh = "SELECT * FROM hang_hoa WHERE ma_sp = :ma_sp";
    $thuc_hien = $sua->prepare($cau_lenh);
    $thuc_hien->execute(['ma_sp' => $id]);
    $rowData = $thuc_hien->fetch();
    $row = [
        'ma_sp' => $rowData['ma_sp'],
        'ten_sp' => $rowData['ten_sp'],
        'gia' => $rowData['gia'],
        'so_luong' => $rowData['so_luong'],
        'img' => $rowData['img'],
        'mieu_ta' => $rowData['mieu_ta'],
        'loai' => $rowData['loai'],
        'dac_biet' => $rowData['dac_biet'],
        'trang_thai' => $rowData['trang_thai'],
    ];
    return $row;


}
function sua(array $data){
    $sql="UPDATE hang_hoa SET ten_sp=:ten_sp, gia=:gia, so_luong=:so_luong, img=:img, mieu_ta=:mieu_ta, loai=:loai, dac_biet=:dac_biet, trang_thai=:trang_thai WHERE ma_sp=:ma_sp";
    $conn = pdo_get_connection();
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    return true;

}

function xoa(int $ma_sp){
    $sql = "DELETE FROM hang_hoa WHERE ma_sp=:ma_sp";
    $conn = pdo_get_connection();
    $statement = $conn->prepare($sql);
    $statement->execute(['ma_sp' => $ma_sp]);
}

function hang_hoa_select_by_id($ma_hh) {
    $sql = "SELECT * FROM hang_hoa WHERE ma_sp=?";
    return pdo_query_one($sql, $ma_hh);
}
function hang_hoa_select_by_ma_loai($ma_loai){
    $sql = "SELECT * FROM hang_hoa a
    Join loai b on a.loai=b.loai
    where b.loai=? ";
    return pdo_query($sql, $ma_loai);

}

?>