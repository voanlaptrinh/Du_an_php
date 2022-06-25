<?php
require_once "pdo.php";
function binh_luan_insert($noi_dung, $ma_kh, $ma_hh){
    $sql = "INSERT INTO binh_luan(noi_dung, id, ma_sp) VALUES(?,?,?)";
    pdo_execute($sql, $noi_dung, $ma_kh, $ma_hh);
}
function binh_luan_select_by_hang_hoa($ma_hh) {
    $sql = "SELECT * FROM binh_luan bl INNER JOIN dang_nhap kh ON bl.id=kh.id WHERE ma_sp=?";
    return pdo_query($sql, $ma_hh);
}


function getAll1() {
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM binh_luan";
    $statement= $conn->prepare($sql);
    $statement->execute([]);
    $ket_qua=[];
    while (true) {
        $rowData =  $statement->fetch();
        if ($rowData == false) {
            break;
        }
        $row= [
            'ma_bl' => $rowData['ma_bl'],
            'noi_dung' => $rowData['noi_dung'],
            'id' => $rowData['id'],
            'ma_sp' => $rowData['ma_sp'],
         
        ];
        array_push($ket_qua,$row);
    }
    return $ket_qua;
}
function xoa1(int $ma_bl){
    $sql = "DELETE FROM binh_luan WHERE ma_bl=:ma_bl";
    $conn = pdo_get_connection();
    $statement = $conn->prepare($sql);
    $statement->execute(['ma_bl' => $ma_bl]);
}

?>
