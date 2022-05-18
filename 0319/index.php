<?php
// DBへ接続
$mysqli = new mysqli('localhost', 'root', 'root', 'mysql');
if (mysqli_connect_error()){
    die("データベースの接続に失敗しました");
}

// クエリの実行
$query = "SELECT curdate()";
$stmt  = $mysqli->prepare($query);
$stmt->execute();

// プリペアドステートメントに変数をバインドする
$stmt->bind_result($date);

// 表示
while($stmt->fetch()){
    echo $date . "\n";
}

// 接続を閉じる
$mysqli->close();