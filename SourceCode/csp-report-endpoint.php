<?php
// Nhận báo cáo từ POST request
$report = json_decode(file_get_contents('php://input'), true);

// Kiểm tra và ghi báo cáo vào tệp log
if ($report) {
    file_put_contents('csp-violations.log', print_r($report, true), FILE_APPEND);
} else {
    file_put_contents('csp-violations.log', "Không nhận được báo cáo\n", FILE_APPEND);
}

// Trả lại mã trạng thái 204 (No Content) để xác nhận rằng báo cáo đã được nhận
http_response_code(204);
?>
