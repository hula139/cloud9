<?php

if (isset($_POST['person_id'])) {
	// DB 処理
	$host = 'localhost';
	$user = 'root';
	$password = 'password';
	$mysqli = new mysqli($host, $user, $password, 'petit_payment');
	if (mysqli_connect_error()){
		die("データベースの接続に失敗しました");
	}
	
	$stmt = $mysqli->prepare("INSERT INTO `debt` (`person_id`, `date`, `amount`, `repayment`, `item`, `deadline`) VALUES (?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("dsddss", $_POST['person_id'], $_POST['date'], $_POST['amount'], $_POST['repayment'], $_POST['item'], $_POST['deadline']);
	$result = $stmt->execute(); // $result は true or false（成功or失敗）が入る
	$stmt->close();
	$mysqli->close();
}
?>

<!--<?php

// <!--if (isset($_POST['person_id'])) {-->
// 		// DB 処理
// <!--		$host = 'localhost';-->
// <!--		$user = 'root';-->
// <!--		$password = 'password';-->
// <!--		$mysqli = new mysqli($host, $user, $password, 'petit_payment');-->
// <!--		if (mysqli_connect_error()){-->
// <!--						die("データベースの接続に失敗しました");-->
// <!--		}-->

// <!--		$date = $_POST['date'];-->
// <!--		$amount = $_POST['amount'];-->
// <!--		$repayment = $_POST['repayment'];-->
// <!--		$person_id = $_POST['person_id'];-->
// <!--		$item = $_POST['item'];-->
// <!--		$deadline = $_POST['deadline'];-->
		
// <!--		$prepared = $mysqli->prepare("INSERT INTO `debt` (`person_id`, `date`, `amount`, `repayment`, `item`, `deadline`) VALUES (?, ?, ?, ?, ?, ?);");-->
// <!--		$prepared->bind_param("isiiss", $person_id, $date, $amount, $repayment, $item, $deadline);-->
// 		$result = $prepared->execute(); // $result は true or false（成功or失敗）が入る
// <!--		$prepared->close();-->
// <!--		$mysqli->close();-->
// <!--}-->
// <!--?>-->

<!DOCTYPE HTML>
<html>
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="home.css">
		<link rel="stylesheet" href="record.css">
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
				<?php if ($result === true) { ?>
				<div id="result">登録に成功しました</div>
				<?php } else if($result === false) { ?>
				<div id="result">登録に失敗しました</div>
				<?php }?>
			
			<div class="contents">
				<h1><span class="title">記録する</span></h1>
			 <div class= "record-form">	
			 <ul id="tab" style="display: flex;">
				<li id="debt_tab_btn"><button>借り</button></li>
				<li id="loan_tab_btn"><button>貸し</button></li>
			</ul>
		  	<form action="record.php" method="post">
			  <table>
			  	<tr><th>貸した日</th><td>
			  	<input type="date" name="date"></td></tr>
			  	<tr><th>金額</th><td>
			  	<input type="number" name="amount"></td></tr>
			  	<tr><th>返済額</th><td>
			  	<input type="number" name="repayment"></td></tr>
			  	<tr><th>相手</th><td>
					<select name="person_id" id="borrower">
							<option value="1">kuroda</option>
							<option value="2">yoshizaki</option>
					</select></td></tr>
			 　 <tr><th>内容</th><td>
			 　 <textarea name="item" cols="30" rows="5"></textarea></td></tr>
				　<tr><th>返却期限</th><td>
				　<input type="date" name="deadline"></td></tr>
		　	</table>
				<input class="submit-bt" type="submit" onclick="confirm('登録しますか？')" value="完了">
			　</form>
			</div>
			
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
		</div>
</body>	
	