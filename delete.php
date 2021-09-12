<?php
require('connect.php');
// nhận dữ liệu từ 'del' trong qlysv.php
if(isset($_GET['del'])){
    $masv=$_GET['del'];
    $sql_del="DELETE from students where masv='$masv'";
    $result=mysqli_query($connect,$sql_del);
    if($result){
        echo "Delete success";
    }
    else {
        die(mysqli_error($connect));
    }
}
$home = 'qlysv.php';
header('Location: ' .$home);
?>