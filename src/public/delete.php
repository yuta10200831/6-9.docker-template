<!-- delete.php -->
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

    $stmt = $pdo->prepare("DELETE FROM bookings WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $res = $stmt->execute();

    if ($res) {
      echo "削除しました！";
      echo "<br>";
      echo "<a href='history.php'>戻る</a>";
    }
  }
?>