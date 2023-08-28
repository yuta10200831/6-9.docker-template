<?php
$name = $_POST["name"];
$email = $_POST["email"];
$phone_number = $_POST["phone_number"];

// エラーメッセージの表示
$errors = [];
if (empty($name) || empty($email) || empty($phone_number))
{
  $errors[] = '「予約者名」 「Email」 「電話番号」のどれかが記入されておりません！';
}

// データベースへの接続
  $dbUserName = 'root';
  $dbPassword = 'password';
  $pdo = new PDO(
    'mysql:host=mysql; dbname=bookingform; charset=utf8',
    $dbUserName,
    $dbPassword
  );

  $stmt = $pdo->prepare("INSERT INTO bookings (
    name, email, phone_number
  ) VALUES (
    :name, :email, :phone_number
  )");

  
  //登録するデータをセット
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
  
  $res = $stmt->execute();
  
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>予約完了画面</title>
</head>

<body>
  <div>
    <?php if(!empty($errors)): ?>
      <?php foreach($errors as $error): ?>
        <p><?php echo $error . "<br>"; ?></p>
      <?php endforeach; ?>
      <a href="index.php">予約画面へ</a>
    <?php endif; ?>

    <?php if(empty($errors)): ?>
      <h2>予約完了＾＾</h2>
      <a href="index.php">予約画面へ</a><br>
      <a href="history.php">予約履歴へ</a><br>
    <?php endif; ?>
  </div>
</body>

<div>
    <span>---------------------------------------------------------------------------------------------------</span>
    <p>①上記のコードでpost送信にした方が良い理由を答えましょう</p> 
    <span>---------------------------------------------------------------------------------------------------</span>
</div>

</html>