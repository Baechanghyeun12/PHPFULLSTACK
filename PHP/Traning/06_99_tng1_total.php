<?php

// 1. 배열의 길이를 반환하는 my_len() 함수를 작성하시오.
// array(1, 2, 3, 4, 5)
$arr_base = array(1, 2, 3, 4, 5);

// echo my_len($arr_base);

function my_len($a)
{
    $count = 0;
    foreach ($a as $val)
    {
        $count++;
    }
    return $count;
}
// echo my_len($arr_base);

// 별찍기를 함수로 만들어봅시다.
// function star($a)
// {
//     $b = $a;
//     for ($i=0; $i < $b; $i++)
//     { 
//         for ($j=0; $j <= $i; $j++)
//         { 
//             echo "*";
//         }
//         echo "\n";
//     }
// }
// echo star(5);



function star($a)
{
    for ($i=1; $i <= $a; $i++)
    { 
        echo "*";
    }
    echo "\n";
}

function star_rect($c)
{
    for ($i=1; $i <= $c; $i++)
    {
        star($c);
    }
}

function star_tri($d)
{
    for ($i = 1; $i <= $d; $i++)
    {
        star($i);
    }
}



star_rect(6);
