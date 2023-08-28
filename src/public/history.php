<!-- history.php -->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>予約履歴</title>
</head>
<body>
    <h2>予約履歴</h2>
    <?php
    $dbUserName = 'root';
    $dbPassword = 'password';
    $pdo = new PDO(
        'mysql:host=mysql; dbname=bookingform; charset=utf8',
        $dbUserName,
        $dbPassword
    );

    $stmt = $pdo->query("SELECT * FROM bookings");
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($bookings)) {
        echo "<p>予約履歴なし</p>";
    } else {
        echo "<ul>";
        foreach ($bookings as $booking) {
            echo "<li>";
            echo "<strong>予約者名:</strong> {$booking['name']}<br>";
            echo "<strong>Email:</strong> {$booking['email']}<br>";
            echo "<strong>電話番号:</strong> {$booking['phone_number']}<br>";
            echo "<a href='edit.php?id={$booking['id']}'>編集</a> | ";
            echo "<a href='delete.php?id={$booking['id']}' onclick='return confirm(\"本当に削除しますか？\");'>削除</a>";
            echo "</li>";
        }
        echo "</ul>";
    }
    ?>
    <a href="index.php">予約画面へ</a>
</body>
</html>
