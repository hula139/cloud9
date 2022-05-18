<?php
if(isset($_POST['user'])) {
$dsn='mysql:dbname=EC;charset=utf8';
$user='ユーザー名';
$password='パスワード';
$dbh = new PDO($dsn,$user,$password);
$stmt = $dbh->prepare("INSERT INTO USER VALUES(:user,:password,:name,:address,:tel)");
$stmt->bindParam(':user', $_POST['user']);
$stmt->bindParam(':password', $_POST['password']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':address', $_POST['address']);
$stmt->bindParam(':tel', $_POST['tel']);
$stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <h2>新規会員登録</h2>
        <p>会員ID：<input type="text" name="user"></p>
        <p>パスワード：<input type="password" name="password"></p>
        <p>名前：<input type="text" name="name"></p>
        <p>住所：<input type="text" name="address"></p>
        <p>電話番号：<input type="tel" name="tel"></p>
        <button type="submit">登録</button>
    </form>
</body>

</html>
