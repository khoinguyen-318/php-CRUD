<?php
// tạo phiên mới
session_start();
 
// unset toàn bộ biến
$_SESSION = array();
 
// kết thúc phiên.
session_destroy();
 
// link tới trang chủ
header("location: login.php");
exit;
?>