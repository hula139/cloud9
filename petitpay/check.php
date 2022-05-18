<?php
// DB 処理
$host = 'localhost';
$user = 'root';
$password = 'password';
$mysqli = new mysqli($host, $user, $password, 'petit_payment');
if (mysqli_connect_error()) {
	die("データベースの接続に失敗しました");
}

$query = "SELECT person.name, debt.item, debt.date, debt.deadline, (debt.amount - debt.repayment) AS money FROM debt INNER JOIN person ON person.id = debt.person_id";
$stmt  = $mysqli->query($query);
$debts = $stmt->fetch_all(MYSQLI_ASSOC);

$query = "SELECT person.name, loan.item, loan.date, loan.deadline, (loan.amount - loan.repayment) AS money FROM loan INNER JOIN person ON person.id = loan.person_id";
$stmt  = $mysqli->query($query);
$loans = $stmt->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="home.css">
	<link rel="stylesheet" href="check.css">
	<title>プチペイ</title>
</head>

<body>
	<header>
		<div class="heading">
			<h1 class="title"><a href="home.php">プチペイ</a></h1>
		</div>
		<nav class="navbar">
			<ul class="nav-lists">
				<li><a href="#login">ログイン</a></li>
				<li><a href="record.php">＋記録する</a></li>
				<li><a href="check.php">編集</a></li>
				<li><a href="#setting">設定</a></li>
			</ul>
		</nav>
	</header>

	<ul id="tab" style="display: flex;">
		<li id="debt_tab_btn"><button>借り</button></li>
		<li id="loan_tab_btn"><button>貸し</button></li>
		<li id="person_tab_btn"><button>相手</button></li>
	</ul>

	<!-- 借り -->
	<div id="debt_content">
		<section id="limit">
	　　<div class="inner">
		  <?php foreach ($debts as $row) : ?>
			<ul>
				<li><?= $row['name'] ?></li>
				<li><?= $row['item'] ?></li>
				<li><?= $row['date'] ?></li>
				<li><?= $row['deadline'] ?></li>
				<li>&yen;<?= number_format($row['money']) ?></li>
			</ul>
		  <?php endforeach; ?>
		  </div>
	    </section>
	</div>

	<!-- 貸し -->
	<div id="loan_content">
		<section id="limit">
	　　<div class="inner">
		  <?php foreach ($loans as $row) : ?>
			<ul>
				<li><?= $row['name'] ?></li>
				<li><?= $row['item'] ?></li>
				<li><?= $row['date'] ?></li>
				<li><?= $row['deadline'] ?></li>
				<li>&yen;<?= number_format($row['money']) ?></li>
			</ul>
		  <?php endforeach; ?>
		  </div>
	    </section>
	</div>
	
	<footer>

	</footer>
	
	<script type="text/javascript">
		let debt_tab = document.getElementById("debt_tab_btn");
		let loan_tab = document.getElementById("loan_tab_btn");
		let debt_content = document.getElementById("debt_content");
		let loan_content = document.getElementById("loan_content");
		// 借りタブを押したとき
		debt_tab.addEventListener("click", (e) => {
			console.log("debt_tab clicked");
			debt_content.style.display = "list-item";
			loan_content.style.display = "none";
		});
		// 貸しタブを押したとき
		loan_tab.addEventListener("click", (e) => {
			console.log("loan_tab clicked");
			debt_content.style.display = "none";
			loan_content.style.display = "list-item";
		});
	</script>
</body>

</html>