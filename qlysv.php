<?php
// Tạo session 
session_start();
 
// Kiếm tra user có đang đăng nhập
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        header{
            display: inline;
        }
        table{
          margin-left: 10px;
          margin-right: 10px;
        }
        table tr td .fa{
          font-size: 20px;
          margin-right: 15px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="logout.php">Đăng xuất</a>
        </li>
      </ul>
    </div>
  </div>
        </nav>
    </header>
    
   <center>
     <?php
	    require('connect.php');
	    $sql_list = "SELECT * FROM students";
        // lấy dữ liệu từ student
	    $result = mysqli_query($connect, $sql_list);
      ?>
      <h1>Quản lý sinh viên</h1>
      <table class="table table-hover">
        <thead>
		<tr>
			<th>Mã Sinh Viên</th>
			<th>Họ & Tên</th>
			<th>Ngày sinh</th>
			<th>Địa chỉ</th>
			<th>Điểm</th>
			<th>Action</th>
      
		</tr>
	</thead>
	<tbody>

		<?php
        
        while ($row = mysqli_fetch_assoc($result)) : ?> 
			<tr>
				<td><?php echo $row['masv']; ?></td>
				<td><?php echo $row['fullname']; ?></td>
				<td><?php echo $row['dob']; ?></td>
				<td><?php echo $row['address']; ?></td>
				<td><?php echo $row['diem']; ?></td>
				<td><?php echo '<a href="update.php?msv='.$row['masv'] .'"><span class="fa fa-pencil"></span></a>';
                  // msv lấy mã sinh viên gửi đến update.php
                  echo '<a href="delete.php?del='.$row['masv'] .'"><span class="fa fa-trash"></span></a>';
                                          ?></td>
                                          <!-- msv lấy mã sinh viên gửi đến update.php -->

			</tr>
        
		<?php endwhile; ?>
        
        
	</tbody>
      </table>
      <a href="forminsert.php"><button type="button" class="btn btn-primary">Thêm sinh viên</button></a>
   </center>
    
</body>
</html>