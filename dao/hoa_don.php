<?php
require_once 'pdo.php';

function getAll() {
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM hoa_don";
    $statement= $conn->prepare($sql);
    $statement->execute([]);
    $ket_qua=[];
    while (true) {
        $rowData =  $statement->fetch();
        if ($rowData == false) {
            break;
        }
        $row= [
            'ma_hd' => $rowData['ma_hd'],
            'ma_sp' => $rowData['ma_sp'],
            'ma_kh' => $rowData['ma_kh'], 
            'so_luong' => $rowData['so_luong'],
            'trang_thai' => $rowData['trang_thai'],
            'dia_chi' => $rowData['dia_chi'],
            'ngay_mua' => $rowData['ngay_mua'],
            'tong_tien' => $rowData['tong_tien'],           
        ];
        array_push($ket_qua,$row);
    }
    return $ket_qua;
}
function them(array $data){
    $conn= pdo_get_connection();
    $sql="INSERT INTO hoa_don(ma_hd,ma_sp,ma_kh,so_luong,trang_thai,dia_chi,ngay_mua,tong_tien)".
    " VALUES (:ma_hd, :ma_sp, :ma_kh, :so_luong, :trang_thai, :dia_chi, :ngay_mua, :tong_tien)";
    $statement = $conn->prepare($sql);
    $statement->execute($data);

}
//phần sửa lấy tất cả dữ liệu ra
function byId(int $id){
    $sua = pdo_get_connection();
    $cau_lenh = "SELECT * FROM hoa_don WHERE ma_hd = :ma_hd";
    $thuc_hien = $sua->prepare($cau_lenh);
    $thuc_hien->execute(['ma_hd' => $id]);
    $rowData = $thuc_hien->fetch();
    $row = [
        'ma_hd' => $rowData['ma_hd'],
        'ma_sp' => $rowData['ma_sp'],
        'ma_kh' => $rowData['ma_kh'], 
        'so_luong' => $rowData['so_luong'],
        'trang_thai' => $rowData['trang_thai'],
        'dia_chi' => $rowData['dia_chi'],
        'ngay_mua' => $rowData['ngay_mua'],
        'tong_tien' => $rowData['tong_tien'],    
    ];
    return $row;
}
function sua(array $data){
    $sql="UPDATE hoa_don SET ma_sp=:ma_sp, ma_kh=:ma_kh, so_luong=:so_luong, img=:img, trang_thai=:trang_thai, dia_chi=:dia_chi, ngay_mua=:ngay_mua, tong_tien=:tong_tien  WHERE ma_hd=:ma_hd";
    $conn = pdo_get_connection();
    $statement = $conn->prepare($sql);
    
    $statement->execute($data);
    return true;

}

function xoa(int $ma_hd){
    $sql = "DELETE FROM hoa_don WHERE ma_hd=:ma_hd";
    $conn = pdo_get_connection();
    $statement = $conn->prepare($sql);
    $statement->execute(['ma_hd' => $ma_hd]);
}