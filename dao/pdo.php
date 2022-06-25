<?php
function pdo_get_connection(){
  $conn = new PDO("mysql:host=localhost; dbname=DU_AN_team; charset=utf8;","root","");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
}
function pdo_query_one($sql) {
  $args = array_slice(func_get_args(), 1);
  try {
      $conn = pdo_get_connection();
      $stmt = $conn->prepare($sql);
      $stmt->execute($args);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
  } catch(PDOException $e) {
      echo "Có lỗi xảy ra: " . $e->getMessage();
  } finally {
      unset($conn);
  }
}
function pdo_query($sql) {
  $args = array_slice(func_get_args(), 1);
  try {
      $conn = pdo_get_connection();
      $stmt = $conn->prepare($sql);
      $stmt->execute($args);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
  } catch(PDOException $e) {
      echo "Có lỗi xảy ra: " . $e->getMessage();
  } finally {
      unset($conn);
  }
}
/**
* Hàm thực thi các câu lệnh truy vấn (INSERT, UPDATE, DELETE)
* tham số: $sql câu lệnh truy vấn
* tham số: $args mảng các tham số đầu vào
* PDOException $e bắt lỗi
*/
function pdo_execute($sql) {
  $args = array_slice(func_get_args(), 1);
  try {
      $conn = pdo_get_connection();
      $stmt = $conn->prepare($sql);//$sql = INSERT INTO loai(ten_loai) values(?)
      $stmt->execute($args);
  } catch (PDOException $e) {
      echo "Có lỗi xảy ra: " . $e->getMessage();
  } finally {
      unset($conn);
  }
}


?>