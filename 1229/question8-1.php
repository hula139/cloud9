<?php
/*Hogeというクラスを作成し、そのクラス内で、Hello PHP!と出力するhelloメソッドを定義しましょう。*/
class Hoge{
  function hello(){
    print("Hello PHP!");
  }
}

$hoge = new Hoge();
$hoge->hello();
?>