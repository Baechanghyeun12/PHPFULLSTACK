<?php



// for ($i=0; $i < count($arr); $i++) { 
//     $result =  $i. " > ". $arr[$i]. "\n";
//     echo $result;
// }

// function bsort($arr)
// {
//     for ( $i=0 ; $i < count($arr) ; $i++ )
//     { 
//         if (condition) {
//             # code...
//         }
//     }
// }

// echo bsort($arr);

// $temp = $arr[0];
// $arr[0] = $arr[1];
// $arr[1] = $temp;


// function bubbleSort($arr) {
//     $len = count($arr);
//     for ($i = 0; $i < $len; $i++) {
//         for ($j = 0; $j < $len - 1 - $i; $j++) {
//             if ($arr[$j] > $arr[$j + 1]) {
//                 $tmp = $arr[$j];
//                 $arr[$j] = $arr[$j + 1];
//                 $arr[$j + 1] = $tmp;
//             }
//         }
//     }
//     return $arr;
// }

// print_r(bubbleSort($arr));
// $arr = array(5, 10, 7, 3, 1);
// $num = count($arr);
// for($i = 0; $i < $num; $i++)
// {
//     for ($j= $i; $j < $num; $j++)
//     { 
//         if ($arr[$i] > $arr[$j])
//         {
//             $temp = $arr[$j];
//             $arr[$j] = $arr[$i];
//             $arr[$i] = $temp;
//         }
//     }
//     echo $arr[$i]."\n";
// }


// 배열 안에 최대 값, 최소 값을 출력해주는 함수를 각각 구현해 주세요.
// 함수명은 "my_max", "my_min"
$arr = array(55,5, 10,80, 7, 3, 1);

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
?>