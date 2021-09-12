<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Form insert</title>
    <style>
        body {
            margin-top: 100px;
            text-align: center;
            width: 80%;
        }
    </style>
</head>

<body>
        <h2>Thêm sinh viên</h2>
        <form method="POST" action="insert.php">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Mã sinh viên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="masv">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Họ tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fullname">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="dob">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Điểm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="diem">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="qlysv.php"><button type="button" class="btn btn-primary">Home</button></a>

        </form>
</body>

</html>