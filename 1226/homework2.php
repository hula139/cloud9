<!--foreach 文と関数の問題です。-->
<!--引数として与えられた数値の配列の各要素に2をかけた配列を返す関数 myDouble を作成してください。-->
<!--また、以下の通り myDouble を実行し、その戻り値を教えてください。-->
<!--※高度な方法として、array_mapの第一引数に無名関数を使うという方法も可です。-->
<!--$result = myDouble([1, 2, 3]);-->
<!--$result2 = myDouble(["1", "2", "3"]);-->

<?php
/* 黒田さんオリジナル
function myDouble($num1,$num2,$num3){
  return $num1 * 2 ,$num2 * 2,$num3 * 3;
}
*/

// ここから吉﨑
function myDouble($nums) // [1, 2, 3]
{
    // $nums[0] = $nums[0] * 2; // 1 * 2
    // $nums[1] = $nums[1] * 2; // 2 * 2
    // $nums[2] = $nums[2] * 2; // 3 * 2
    // →繰り返し処理にするには？
    // for ($i = 0; $i < count($nums); $i++) {
    //     $nums[$i] = $nums[$i] * 2;
    // }
    
    // foreach ($配列名 as $インデックス名 => $配列の要素名)
    foreach ($nums as $i => $num) {
        $nums[$i] = $nums[$i] * 2;
    }
    
    return $nums;
}

$result = myDouble([1, 2, 3]);
$result2 = myDouble(["1", "2", "3"]);
$result3 = myDouble([1, 2, 3, 4, 5, 6, 7]);
var_dump($result);
var_dump($result2);
var_dump($result3);
