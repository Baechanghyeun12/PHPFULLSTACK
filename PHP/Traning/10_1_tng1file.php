<?php

// 파일명 : gugudan.txt
// 파일 위치 : text
// 내용은 아래와 같습니다.
// 2단
// 2 * 1 = 2
// 2 * 2 = 4
// .....
// 2 * 9 = 18

// $f_gugudan = fopen( "../Example/text/gugudan.txt","a");

// // for ($i=1; $i < 10; $i++)
// // {
// //     $result2 = "[".$i."단"."]"."\n";
// //     fputs($f_gugudan, $result2);
// //     for ($j=1; $j < 10; $j++) { 
// //         $result = $i." * ".$j." = ".$i*$j."\n";
// //         fputs($f_gugudan, $result);
// //     }
// // }

// function gugudan_1($gugudan)
// {
//     $result = "";
//     for ($i=1; $i <= $gugudan; $i++)
//     {
//         $result .= "[".$i."단"."]"."\n";
//         for ($j=1; $j <= $gugudan; $j++)
//         { 
//             $result .= $i." * ".$j." = ".$i*$j."\n";
//         }
//     }
//     return $result;
// }

// fputs ($f_gugudan,gugudan_1(9));


// fclose($f_gugudan);

/*
김밥
샌드위치
백반
국밥
크림우동
연어초밥
돈까스

"국밥"과 "크림우동" 사이에 "스테이크"를 추가해주세요.

김밥
샌드위치
백반
국밥
스테이크
크림우동
연어초밥
돈까스
*/

$f_food = file("../Example/text/food.txt"); // 파일안에 내용을 줄별로 배열을 만든다.
$print_food = "";
foreach ($f_food as $val)
{
    if(trim($val) === "국밥") // 빈공간을 제거하기 위해 트림을 사용한다
    {
        $print_food .= $val."스테이크\n";
    }
    else {
        $print_food .= $val;
    }
}


// print $print_food;
$f_food = fopen( "../Example/text/food.txt","w");
fputs($f_food, $print_food);
fclose($f_food);