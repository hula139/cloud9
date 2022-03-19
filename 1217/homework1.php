<?php
$items = ["犬", "猫", "うさぎ"];
?>
<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <script type="text/javascript">
    console.log("test");
  </script>
  <ul>
    <li>
      <?php
      print($items[0]); // <li>犬</li>と同じ
      ?>
    </li>
    <li>
      <?php
      print($items[1]);
      /* ここに猫と表示 */
      ?>
    </li>
    <li>
      <?php
      print($items[2]);
      /* ここにうさぎと表示 */
      ?>
    </li>

  </ul>

</body>

</html>
