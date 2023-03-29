<?php
$arr_base = array(1, 2, 3, 4, 5);

function fnc_arr_len($a)
{
    $count = 0;
    foreach ($a as $key => $value) {
        $count++;
    }
    return $count;
}

// echo fnc_arr_len($arr_base);

function star_print($a)
{
    for ($i=1; $i <= $a; $i++) { 
        echo "*";
    }
    echo "\n";
}
star_print(5);



function print_max($a)
{
    $max = $a[0];
    for ($i=1; $i < count($a); $i++)
    {
        if($max < $a[$i])
        {
            $max = $a[$i];
        }
    }
    return $max;
}
echo print_max($arr);