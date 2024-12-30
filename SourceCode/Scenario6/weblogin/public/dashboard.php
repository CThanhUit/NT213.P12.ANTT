<?php
session_start();
include('../config/db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<h1>Chào mừng, <?php echo $user['username']; ?></h1>
<p>Email của bạn: <?php echo $user['email']; ?></p>
<a href="logout.php">Đăng xuất</a>
