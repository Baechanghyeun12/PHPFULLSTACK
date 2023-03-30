<?php
// "I am always Hello." 에서 "Hello"를 "Happy"로 바꾸어 출력하는
// 프로그램을 구현해 주세요.

$str_hello = "I am always Hello.";
$arr_hello = explode(" ",$str_hello);
$arr_hello[3] = "Happy.";
$str_impl = implode(" ",$arr_hello);
// echo $str_impl;

$arr_hello = explode("Hello",$str_hello);
$str_impl = implode("Happy",$arr_hello);
// echo $str_impl;

// 함수명 : my_str_replace
// 리턴값 : String $result_str
function my_str_replace($result_str, $str_1, $str_2)
{
    $str_arr = explode($result_str);
    for ($i=0; $i < count($str_arr) ; $i++) { 
        if ($str_1 == $str_arr[$i])
        {
            $str_arr[$i] = $str_2;
        }
    }
    return;
}

// echo my_str_replace($str_hello,"Hello","Happy");




// function my_str_replace1($a)
// {
//     $str_expl = explode("Hello",$a);
//     $result_str = implode("Happy",$str_expl);
//     return $result_str;
// }

// echo my_str_replace1($str_hello);

// 재사용성 개선
function my_str_replace1($param_str,$param_separator,$param_ch)
{
    $arr_expl = explode($param_separator,$param_str);
    $result_str = implode($param_ch,$arr_expl);
    return $result_str;
}

// echo my_str_replace1($str_hello,"Hello","Happy");

// PHP 함수
echo str_replace("Hello","Happy",$str_hello,);