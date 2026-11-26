<?php
/**
 * Bài 2: Quản lý thông tin học sinh (PHP + MySQL, dùng PDO)
 * Chạy students.sql trước để tạo CSDL, bảng và dữ liệu mẫu.
 */
$host = 'localhost';
$db   = 'school';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die('Kết nối thất bại: ' . htmlspecialchars($e->getMessage()));
}

/** Lấy tất cả học sinh */
function getAllStudents(PDO $pdo): array
{
    return $pdo->query('SELECT id, name, age, grade FROM students ORDER BY id')->fetchAll();
}

/** Tìm học sinh có điểm cao nhất (trả về cả các học sinh bằng điểm nhau) */
function getTopStudents(PDO $pdo): array
{
    $sql = 'SELECT id, name, age, grade FROM students
            WHERE grade = (SELECT MAX(grade) FROM students)';
    return $pdo->query($sql)->fetchAll();
}

function renderTable(array $rows): void
{
    echo '<table border="1" cellpadding="6" cellspacing="0">';
    echo '<tr><th>ID</th><th>Họ tên</th><th>Tuổi</th><th>Điểm</th></tr>';
    foreach ($rows as $r) {
        printf(
            '<tr><td>%d</td><td>%s</td><td>%d</td><td>%.2f</td></tr>',
            $r['id'], htmlspecialchars($r['name']), $r['age'], $r['grade']
        );
    }
    echo '</table>';
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý học sinh</title>
</head>
<body>
    <h2>Danh sách tất cả học sinh</h2>
    <?php renderTable(getAllStudents($pdo)); ?>

    <h2>Học sinh có điểm cao nhất</h2>
    <?php renderTable(getTopStudents($pdo)); ?>
</body>
</html>
