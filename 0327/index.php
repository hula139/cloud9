<?php
// DBへ接続
$mysqli = new mysqli('localhost', 'root', 'root', 'mysql');
if (mysqli_connect_error()){
    die("データベースの接続に失敗しました");
}

// クエリの実行
$query = "SELECT * from petit_payment.person";
$stmt  = $mysqli->prepare($query);
$stmt->execute();

// プリペアドステートメントに変数をバインドする
$stmt->bind_result($id, $name);

// 表示
while($stmt->fetch()){
    echo "id:" . $id . ", " . "name:" . $name . "\n";
}

// 宿題：debtテーブルとloanテーブルに INSERT をして、PHPからそのレコードを取得する insert,updateの方法をぐぐる
// ※事前に INSERT  しておくこと
// クエリの実行2(debtテーブルの中身)
$query2 = "SELECT * from petit_payment.person"; // TODO: テーブル名の変更
$stmt  = $mysqli->prepare($query);
$stmt->execute();

// プリペアドステートメントに変数をバインドする
$stmt->bind_result($id, $name); // TODO: カラムの数だけ変数を用意する（変数名はカラム名と一致させる）

// 表示
while($stmt->fetch()){
    echo "id:" . $id . ", " . "name:" . $name . "\n"; // TODO: 上で用意した変数を表示する
}

// 接続を閉じる
$mysqli->close();