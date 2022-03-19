<?php
print "<h3>宿題1</h3>";
/*
ウォーリーを探せみたいな問題です。
関数と foreach を使って、次の配列が関数の引数として与えられたとき、配列の何番目にウォーリーがいるかを
返す関数 findWally() を作成してください。
また、戻り値を print() して、"{ここに戻り値が入る}番目にウォーリーがいます" という風に表示してください。
`$people = ['Watson', 'John', 'Wally', 'Mary'];`
この場合、"2番目にウォーリーがいます" と表示されるのが正しいです。(3番目でも可）
*/
function findWally($people)
{
    foreach ($people as $index => $person) {
        if ($person === 'Wally') {
            return $index;
        }
    }
}

$people = ['Watson', 'John', 'Wally', 'Mary'];
$index = findWally($people);
print($index . "番目にウォーリーがいます\n");
