<!-- update.php -->
<?php
$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$phone_number = $_POST["phone_number"];

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=bookingform; charset=utf8',
    $dbUserName,
    $dbPassword
);

$stmt = $pdo->prepare("UPDATE bookings SET name = :name, email = :email, phone_number = :phone_number WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
$res = $stmt->execute();

if ($res) {
  echo "更新しました！";
  echo "<br>";
  echo "<a href='history.php'>戻る</a>";
} else {
  echo "更新に失敗しました。";
}
?>