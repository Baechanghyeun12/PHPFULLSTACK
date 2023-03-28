<?php
$arr_base = array(1, 2, 3, 4, 5);

function my_len($a)
{
    $count = 0;
    foreach ($a as $value)
    {
        $count++;
    }
    return $count;
}
echo my_len($arr_base);