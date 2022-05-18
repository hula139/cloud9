<?php
// DBへ接続
exit();
$mysqli = new mysqli('localhost', 'root', 'root', 'petit_payment');
if (mysqli_connect_error()){
    die("データベースの接続に失敗しました");
}
// INSERT
$id = 3;
$person_id = 1;
$date = '2022-03-30';
$amount = 10000;

$stmt = $mysqli->prepare('INSERT INTO debt (id, person_id, date, amount) VALUES (?, ?, ?, ?)');
$stmt->bind_param('iisi', $id, $person_id, $date, $amount);
$stmt->execute();
$mysqli->close();
exit();

// UPDATE
$id = 3;
$amount = 20000;

$stmt = $mysqli->prepare('UPDATE debt SET amount = ? WHERE id = ?');
$stmt->bind_param('ii', $amount, $id);
$stmt->execute();
$mysqli->close();
exit();

// DELETE
$id = 3;
$stmt = $mysqli->prepare('DELETE FROM debt WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$mysqli->close();
exit();


// 宿題：debtテーブルとloanテーブルに INSERT をして、PHPからそのレコードを取得する insert,updateの方法をぐぐる
// ※事前に INSERT  しておくこと
// クエリの実行2(debtテーブルの中身)
// $query2 = 'insert into debt (id, person_id, date, amount) values (3, 1, "2022-03-30", 10000)'; // TODO: テーブル名の変更
// try {
//     $stmt  = $mysqli->prepare($query2);
// } catch (Exception $e) {
// 	echo 'mysqli_sql_exception'.$e->getMessage();
// 	exit;
// }
// var_dump($stmt);
// $stmt->execute();
// $mysqli->query($query2);
// $mysqli->close();
/*
https://agohack.com/mysqli-report-throw-exceptions/
try {
	$result = $mysqli->query("SELECT * FROM hoge WHERE hogeprice > 10000");
} catch (mysqli_sql_exception $e) {	// Exception クラスでも catch できる
	echo 'mysqli_sql_exception'.$e->getMessage();
	exit;
}
*/
exit();

// プリペアドステートメントに変数をバインドする
$stmt->bind_result($id, $Person_id, $date, $amount, $repayment, $item, $deadline); // TODO: カラムの数だけ変数を用意する（変数名はカラム名と一致させる）

// 表示
while($stmt->fetch()){
    echo "id:" . $id . ", " . "name:" . $Person_id . ", " .  "date:" . $date . "," . "amount:" . $amount . "," . "repayment:" . $repayment . ", " . "item:" . $item . ", " . "deadline:" . $deadline . "\n"; // TODO: 上で用意した変数を表示する
}

// 接続を閉じる
$mysqli->close();

// 03/30宿題
// HTML上の登録ボタンを押して、DB(petit_payment)に値がINSERTされるようにする <-- いったんここ目標に
// HTML上の更新ボタンを押して、DB(petit_payment)に値がUPDATEされるようにする
// HTML上の削除ボタンを押して、DB(petit_payment)に値がDELETEされるようにする
?>
<button action="index1.php">登録</button>
