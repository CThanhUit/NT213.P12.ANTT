<?php
$servername = "localhost";
$username = "root";  // mặc định của XAMPP
$password = "";      // mặc định của XAMPP
$dbname = "myapp";   // tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
