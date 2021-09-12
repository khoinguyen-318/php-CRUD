<?php
require_once('connect.php');
    // nhận data từ update.php
    if(isset($_POST['update'])){
                $masv= $_POST['masv'];
				$fullname= $_POST['fullname'];
			    $dob= $_POST['dob'];
			    $address= $_POST['address'];
				$diem= $_POST['diem'];

// Thực thi câu lệnh update
$sql_upd = "UPDATE `students` SET `fullname`='$fullname',`dob`='$dob',`address`='$address',`diem`='$diem' WHERE `masv`='$masv'";
if(mysqli_query($connect, $sql_upd)){
    echo "thành công";
} else{
    echo "ERROR: Không thể thực thi .$sql_upd. " . mysqli_error($connect);
}
    }
header('Location: qlysv.php ');
?>