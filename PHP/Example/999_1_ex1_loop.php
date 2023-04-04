<?php

// 1. while + if가 조합된거(증감연산자가 없으면 무한루프된다.) 조건이 딱 맞을때 계속돈다.
// $i = 0;
// while($i <=4)
// {
//     if ($i === 1 )
//     {
//         echo "1입니다.";
//     }
//     elseif ($i === 4) {
//         echo "4입니다.";
//     }
//     $i++;
// }


//foreach + if 조합

// $arr_ass = array( "a" => 1, "b" => 2, "c" => 3 );
// foreach ($arr_ass as $key => $val)
// {
//     if ($key === "c" || $val === 2)
//     {
//         echo "if";
//     }
// }



// 이중 루프
// for($i = 2; $i <= 9; $i++)
// {
//     echo "$i 단\n";
//     for ($j=1; $j <= 9 ; $j++) { 
//         echo "$i X $j = ",$i*$j,"\n";
//     }
//     echo "\n";
// }

// 1 ~ 100까지 숫자 중에 짝수의 합을 구해주세요.
// $result = 0;
// for ($i=1; $i <= 100 ; $i++)
// { 
//     if ($i % 2 === 0 ) {
//         $result += $i;
//     }
// }

// echo $result;
// $arr_test =
//     array(
//         "a" => 1
//         ,"b" => 2
//         ,"info" => 
//             array(
//                 "info_a" => 3
//                 ,"info_b" =>4
//                 ,"info_arr" =>
//                     array(
//                         "f_1" =>5
//                         ,"f_2" =>7
//                     )
//             )
//     );

// echo $arr_test["info"]["info_b"];
// echo "\n";
// echo $arr_test["info"]["info_arr"]["f_2"];


// $arr_test =
//     array(
//         1
//         ,2
//         ,array(
//                 "info_a" => 3
//                 ,"info_b" =>4
//                 ,"info_arr" =>
//                     array(
//                         "f_1" =>5
//                         ,"f_2" =>7
//                     )
//             )
//     );



//     echo $arr_test[2]["info_arr"]["f_1"];


// 함수

// 함수명       : fnc_sum
// 기능         : 파라미터를 더한 값을 리턴
// 파라미터     : INT $param_a
//             : INT $param_b
// 리턴값       : INT $sum

// function fnc_sum($param_a, $param_b)
// {
//     $sum = $param_a + $param_b;
//     return $sum;
// }


// function fnc_sum2(...$param_numbers)
// {
//     $sum = 0;
//     $sum = $param_numbers[0] + $param_numbers[1] + $param_numbers[2];
//     return $sum;
// }






// function fnc_sum3(...$param_numbers)
// {
//     // $sum = 0;
//     // foreach( $param_numbers as $val)
//     // {
//     //     $sum += $val;
//     // }
//     return array_sum($param_numbers);  // array()의 값을 더해주는 함수
// }

// echo fnc_sum3(60, 80);


// function fnc_global()
// {
//     global $global_i;
//     $global_i = 0;
// }

// fnc_global();
// $global_i = 5;

// echo $global_i;

// function fnc_static()
// {
//     static $static_i = 0;
//     echo $static_i;
//     $static_i++;
// }

// fnc_static();
// fnc_static();
// fnc_static();

// function fnc_reference(&$param_str)
// {
//     $param_str = "fnc_reference";
// }

// $str = "aaa";

// fnc_reference($str);
// echo $str;


//
function star_print($num)
{
    for ($i=0; $i < $num ; $i++) {
        echo "*";
    }
    echo "\n";
}

star_print(1);
star_print(2);
star_print(3);
star_print(4);
star_print(5);









function star_print_2($num)
{
    for ($i=1; $i <= $num ; $i++) { 
        echo star_print($i),"\n";
    }
}


// star_print_2(5);


















