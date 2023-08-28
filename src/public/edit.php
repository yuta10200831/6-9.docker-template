<!-- edit.php -->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>予約編集</title>
</head>
<body>
    <h2>予約編集</h2>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $dbUserName = 'root';
        $dbPassword = 'password';
        $pdo = new PDO(
            'mysql:host=mysql; dbname=bookingform; charset=utf8',
            $dbUserName,
            $dbPassword
        );

        $stmt = $pdo->prepare("SELECT * FROM bookings WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $booking = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($booking) {
            echo "<form action='update.php' method='post'>";
            echo "<input type='hidden' name='id' value='{$booking['id']}'>";
            echo "予約者名: <input type='text' name='name' value='{$booking['name']}'><br>";
            echo "Email: <input type='email' name='email' value='{$booking['email']}'><br>";
            echo "電話番号: <input type='text' name='phone_number' value='{$booking['phone_number']}'><br>";
            echo "<input type='submit' value='更新'>";
            echo "</form>";
        } else {
            echo "該当する予約が見つかりませんでした。";
        }
    } else {
        echo "予約IDが指定されていません。";
    }
    ?>
    <a href="history.php">予約履歴へ</a>

    <div>
        <span>---------------------------------------------------------------------------------------------------</span>
            <p>②上記の予約編集画面でget送信にした方が良い理由を答えましょう</p> 
        <span>---------------------------------------------------------------------------------------------------</span>
    </div>

</body>
</html>
