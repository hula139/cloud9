<?php
/*クラスの問題です。
hp というインスタンス変数（初期値3）と getHP というメソッドを持つクラス Character を下記に定義しています。
ここに、atk というインスタンス変数と getAtk というメソッドを追加してください。
atk は 2 で初期化しておき、getAtk メソッドを呼び出すと atk の値を返すようにしてください。

class Character {
    public $hp = 3;

    public function getHP() {
        return $this->hp;
    }
}

また、Character クラスをインスタンス化し、getHP と getAtk を実行し、それぞれ正しい値が返ってくることをprintを用いて確認してください。*/

class Character
{
    public static $hp = 3;
    protected $atk = 2;

    public function getHP()
    {
        print($this->hp."\n");
    }
    public function getAtk()
    {
        print($this->atk."\n");
    }
}

$character = new Character;
$character->atk = 3; // protected: 編集出来ない
print($character->hp); // OK
print($character->atk); // NG

/*
SELECT (IFNULL(price, 0) = IFNULL(old_price, 0)) FROM books WHERE id = '1'; old_price: null
