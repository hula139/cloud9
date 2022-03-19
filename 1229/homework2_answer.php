<?php
class Character
{
    public $hp = 3;
    public $atk = 2;

    public function getHP()
    {
        return $this->hp;
    }
    public function getAtk()
    {
        return $this->atk;
    }
}

$character = new Character;
$hp = $character->getHP();
$atk = $character->getAtk();
print($hp);
print($atk);
