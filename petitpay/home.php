<?php
/*
html → php 化メモ
1. ファイル名を .php に変える
2. ファイルの頭に <?php ?> を書く]
3. 仮で入力した値を PHP コードに置き換える
*/

// DB 処理
$host = 'localhost';
$user = 'root';
$password = 'password';
$mysqli = new mysqli($host, $user, $password, 'petit_payment');
if (mysqli_connect_error()){
    die("データベースの接続に失敗しました");
}

// 「借り」金額の合計を取得する START
$query = "SELECT SUM(amount) AS debt, SUM(repayment) AS debt_repayment from debt";
$stmt  = $mysqli->query($query);
$rows = $stmt->fetch_all(MYSQLI_ASSOC);
$debt = $rows[0]['debt'];
$debt_repayment = $rows[0]['debt_repayment'];
/*
fetch_all(MYSQLI_ASSOC)
↑この形式でレコードを取得した場合、連想配列となるため、
SUMをしていれば一件しかないことが分かるので [0] で指定して取得出来るが、
レコードが1000件ある場合は foreach や for でループを使ってデータを取得
する必要がある
*/
// END

// 「貸し」金額の合計を取得する START
$query2 = "SELECT SUM(amount) AS loan, SUM(repayment) AS loan_repayment from loan";
$stmt  = $mysqli->query($query2);
$rows = $stmt->fetch_all(MYSQLI_ASSOC);
$loan = $rows[0]['loan'];
$loan_repayment = $rows[0]['loan_repayment'];
// END

// 期限が一週間以内の貸しのデータを取得する START
// TODO: loan テーブルの deadline 列の値を今日から一週間以内の値に更新しておく必要がある
$query3 = "SELECT loan.amount, loan.repayment, loan.item, loan.deadline, person.name FROM loan LEFT JOIN person ON loan.person_id = person.id WHERE deadline >= CURDATE() AND deadline <= DATE_ADD(CURDATE(), INTERVAL 7 DAY)";
$stmt = $mysqli->query($query3);
$expirations = $stmt->fetch_all(MYSQLI_ASSOC);
// END

// 4/27宿題
// 期限が近づいていますに表示するレコードに ORDER BY を使って期限が近い順に並び替える
$query3 = 
  "SELECT loan.amount, loan.repayment, loan.item, loan.deadline, person.name"
  . " FROM loan LEFT JOIN person ON loan.person_id = person.id"
  . " WHERE deadline >= CURDATE() AND deadline <= DATE_ADD(CURDATE(), INTERVAL 7 DAY)"
  . " ORDER BY loan.deadline"
  . " LIMIT 4";
$stmt = $mysqli->query($query3);
$expirations = $stmt->fetch_all(MYSQLI_ASSOC);
// 期限が近づいていますに表示するレコードに LIMIT を使って5件だけに絞る
// loan テーブルのレコードを10件に増やして、かつ１週間より先のレコードもその中に入れておく
?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>プチペイ</title>
  </head>
  <body>
    <header id="header">
      <!--<div class="heading">-->
      <h1 class="title"><a href="home.php">プチペイ</a></h1>
      <!--</div>-->
      <nav class="navbar">
        <ul class="nav-lists">
          <li><a href="#login">ログイン</a></li>
          <li><a href="record.php">＋記録する</a></li>
          <li><a href="check.php">編集</a></li>
          <li><a href="#setting">設定</a></li>
        </ul>
      </nav>
    </header>

    <div class="contents">
      <section id="remaining">
    　　<div class="inner">
        　<h2><span class="section-title">残り</span></h2>
        　 <ul>
            <li>
              借り：
              <progress max="<?= $debt ?>" value="<?= $debt - $debt_repayment ?>"></progress>
              &yen;<?= number_format($debt - $debt_repayment) ?>
            </li>
            <li>
              貸し：
              <progress max="<?= $loan ?>" value="<?= $loan - $loan_repayment ?>"></progress>
              &yen;<?= number_format($loan - $loan_repayment) ?>
            </li>
           </ul>
        </div>
    　</section>
      <section id="limit">
    　　<div class="inner">
        　<h2><span class="section-title">期限が近づいています</span></h2>
            <?php foreach ($expirations as $expiration): ?>
              <ul>
                <li><?= $expiration['name'] ?></li>
                <li><?= $expiration['item'] ?></li>
                <li>&yen;<?= number_format($expiration['amount'] - $expiration['repayment']) ?><!--残りの金額--></li>
                <li><?= $expiration['deadline'] ?><!--返却期限--></li>
              </ul>
            <?php endforeach; ?>
        </div>
    　</section>
    </div>

    <footer>
      
    </footer>
  </body>
</html>