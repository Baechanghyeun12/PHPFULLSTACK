<?php

// // 문자열 합치기 "."(점)을 사용하여 문자열을 합친다.
// $str_1 = "aaa";
// $str_2 = "bbb";
// $str_sum = $str_1.$str_2;

// // echo $str_sum;

// // 대소문자 변환
// $str_en = "abcd efgh";

// // 소문자 변환
// echo strtolower($str_en), "\n";
// // 대문자 변환
// echo strtoupper($str_en), "\n";
// // 맨 앞 글자만 대문자로 변환
// echo ucfirst($str_en), "\n";
// // 각 단어의 맨 앞 글자만 대문자로 변환
// echo ucwords($str_en), "\n";

// URL관련 함수
$url = "https://www.google.com/search?q=php+max+%ED%95%A8%EC%88%98+%EB%A7%8C%EB%93%A4%EA%B8%B0&oq=&aqs=chrome.0.69i59i450l8.31897092j0j15&sourceid=chrome&ie=UTF-8";

$arr_url = parse_url($url);
// var_dump($arr_url);

parse_str($arr_url["query"], $arr_parse);
var_dump($arr_parse);