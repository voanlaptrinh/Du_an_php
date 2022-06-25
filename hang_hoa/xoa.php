<?php
require_once './../dao/hang_hoa.php';
$hang_hoa = intval($_GET['id']);
xoa($hang_hoa);
header("location: /du_an_team/hang_hoa/");
?>