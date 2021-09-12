<?php
require('connect.php');
$msv=$_GET['msv'];
	    $sql_list = "SELECT * FROM students";
        // lấy dữ liệu từ student
	    $result = mysqli_query($connect, $sql_list);
         while ($row = mysqli_fetch_assoc($result)){
		 $fullname= $row['fullname'];
		 $dob= $row['dob'];
		 $address= $row['address'];
		 $diem= $row['diem'];
         }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Update</title>
    <style>
        body {
            margin-top: 100px;
            text-align: center;
            width: 80%;
        }
    </style>
</head>
<body>
    <h3>Cập nhật thông tin sinh viên <?php echo $msv; ?></h3>
        <form method="POST" action="process_update.php">
            <div class="row mb-3" hidden>
                <label class="col-sm-2 col-form-label">Mã sinh viên </label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="masv" value="<?php echo $msv; ?>"> 
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Họ tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address"value="<?php echo $address; ?>" >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Điểm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="diem" value="<?php echo $diem; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <a href="qlysv.php"><button type="button" class="btn btn-primary">Home</button></a>

        </form>
</body>
</html>