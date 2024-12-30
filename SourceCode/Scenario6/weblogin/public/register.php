<?php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Chèn dữ liệu vào bảng users
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký thành công!";
        header('Location: login.php');
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST" action="register.php">
    Tên người dùng: <input type="text" name="username" required><br>
    Email: <input type="email" name="email" required><br>
    Mật khẩu: <input type="password" name="password" required><br>
    <button type="submit">Đăng ký</button>
</form>
