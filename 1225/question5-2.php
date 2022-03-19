<?php
function triangle_area($a, $h)
{
    return $a * $h / 2;
}
//print(triangle_area(2, 3));
$calc = triangle_area(2, 3);
print($calc);
