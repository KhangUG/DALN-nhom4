<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "daln";


try {
    // Tạo kết nối PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Thiết lập chế độ lỗi PDO thành Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo ""; 
} catch(PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}
?>

