<?php
require('connect.php');
$masv = mysqli_real_escape_string($connect, $_REQUEST['masv']);
$fullname = mysqli_real_escape_string($connect, $_REQUEST['fullname']);
$dob = mysqli_real_escape_string($connect, $_REQUEST['dob']);
$address = mysqli_real_escape_string($connect, $_REQUEST['address']);
$diem = mysqli_real_escape_string($connect, $_REQUEST['diem']);
// Thực thi câu lệnh insert
$sql = "INSERT INTO students (masv,fullname,dob,address,diem) VALUES ('$masv', '$fullname', '$dob', '$address','$diem')";
if(mysqli_query($connect, $sql)){
    echo "Thêm thành công";
} else{
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($connect);
}

$adminURL = 'forminsert.php';
header('Location: '.$adminURL);


?>