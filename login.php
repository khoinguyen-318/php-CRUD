<?php
// Tạo session
session_start();
 
// Kiểm tra user có đang đăng nhập-->chuyển đến trang chủ
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: qlysv.php");
    exit;
}
 
// yêu cầu kết nối
require_once "connect.php";
 
// tạo biến rỗng
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// khi user nhấp submit thì thực thi
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // kiểm tra username có rỗng ko
    if(empty(trim($_POST["username"]))){
        $username_err = "Nhập username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // kiểm tra pass có rỗng ko
    if(empty(trim($_POST["password"]))){
        $password_err = "Nhập password.";
    } else{
        // gán biến
        // trim là lệnh bỏ khoảng trắng
        $password = trim($_POST["password"]);
    }
    
    // xác thực không có lỗi username và pass
    if(empty($username_err) && empty($password_err)){
        
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($connect, $sql)){
            // Liên kết các biến với câu lệnh đã chuẩn bị dưới dạng tham số
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set tham số
            $param_username = $username;
            
            // thực thi
            if(mysqli_stmt_execute($stmt)){
                // lưu kết quả $stmt
                mysqli_stmt_store_result($stmt);
                
                // Kiểm tra username có tồn tại chưa
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // 
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // xác thực pass -->phiên mới
                            session_start();
                            
                            // Lưu biến
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // link tới trang chủ
                            header("location: qlysv.php");
                        } else{
                            // sai pass hoặc user
                            $login_err = "Sai username hoặc password.";
                        }
                    }
                } else{
                    // username không tồn tại
                    $login_err = "Sai username hoặc password.";
                }
            } else{
                echo "Error.";
            }

            // đóng stmt
            mysqli_stmt_close($stmt);
        }
    }
    
    // Đóng kết nối
    mysqli_close($connect);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        body{ font: 14px sans-serif;
            display: flex;
            justify-content: center;
            text-align: center;    
        }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2><strong>Login</strong></h2>
        <p>Vui lòng điền đầy đủ thông tin.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Chưa có tài khoản?<a href="register.php">Đăng ký ngay</a>.</p>
        </form>
    </div>
</body>
</html>