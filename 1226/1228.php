<?php
// 5番目の文字のときだけ、その文字をもう一度printする
$nakata = ["N", "a", "k", "a", "t", "a"];
// foreach ($配列名 as $インデックス名 => $配列の要素名)
foreach ($nakata as $index => $value) {// $c = character, $val = value, $value
    // print('$index: ' . $index . "\n");
    // print('$value: ' . $value . "\n");
    if ($index === 4) {
        print($value);
    }
    print($value);
}

// Nakata
// 今回は？→Nakatta
