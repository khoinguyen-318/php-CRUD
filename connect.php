<?php
    //Điền thông tin kết nối
    define('SERVER','localhost');
    define('USERNAME','root');
    define('PASSWORD','');
    define('DATABASENAME','qlysinhvien');
    //Kết nối
    $connect=mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASENAME);
    //Kiểm tra kết nối
    if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    //else echo "thành công";

?>