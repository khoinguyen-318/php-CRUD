<?php
    require_once('connect.php');
    //tạo biến rỗng
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // xác thực username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username chỉ chứa ký tự chữ,số và dấu gạch dưới.";
    } else{
        // 
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($connect, $sql)){
            // 
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // 
            $param_username = trim($_POST["username"]);
            
            // 
            if(mysqli_stmt_execute($stmt)){
                //
                mysqli_stmt_store_result($stmt);
                //
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Username đã tồn tại.Vui lòng nhập Username khác";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Error";
            }

            // đóng statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Xác thực password
    if(empty(trim($_POST["password"]))){
        $password_err = "Vui lòng nhập password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password cần tối thiểu 6 ký tự.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // 
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($connect, $sql)){
            // 
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // 
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // mã hóa mật khẩu 
            
            // 
            if(mysqli_stmt_execute($stmt)){
                // chuyển tời home
                
                header("location: login.php");
            } else{
                echo "Error.";
            }

            // đóng statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // 
    mysqli_close($connect);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Registration</title>
    <style>
        body{ font: 18px sans-serif;
                display: flex;
                justify-content: center;
                text-align: center;
        }
        .wrapper{ width: 360px; padding: 30px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2><strong>Đăng ký</strong></h2>
        <p>Vui lòng điền đầy đủ thông tin.</p>
        <form action="" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Nhập username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Nhập password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                
            </div>
            <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a>.</p>
        </form>
</body>
</html>