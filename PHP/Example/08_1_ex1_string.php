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
// $url = "https://www.google.com/search?q=php+max+%ED%95%A8%EC%88%98+%EB%A7%8C%EB%93%A4%EA%B8%B0&oq=&aqs=chrome.0.69i59i450l8.31897092j0j15&sourceid=chrome&ie=UTF-8";

// $arr_url = parse_url($url);
// var_dump($arr_url);

// parse_str($arr_url["query"], $arr_parse);
// var_dump($arr_parse);

// 역순의 문자열(한글을 적으면 글이 깨진다)
// $str_abcd = "abcd";
// echo strrev($str_abcd);

// 문자열 자르기(나누기) mb_substr : 는 뒤에 숫자가 글자를 가르킨다 substr : 는 뒤에 숫자가 바이트를 가르킨다.
// $str_1 = "가나다라마";
// echo mb_substr($str_1, 2),"\n";
// echo mb_substr($str_1, 2, 1),"\n";
// echo mb_substr($str_1, 3, 2),"\n";
// echo mb_substr($str_1,-1),"\n"; // 스타트 파라미터가 음수이면 오른쪽부터 자릅니다.


// //
// $str_tng = "안녕하세요. PHP입니다.";
// echo mb_substr($str_tng, 7,7), "\n";
// echo mb_substr($str_tng, -7,7), "\n";
// echo mb_substr($str_tng, 3,5), "\n";
// echo mb_substr($str_tng,-11,5), "\n";


// 문자열 빈공간 지우기 trim : 양옆의 공백을 전부 지워준다. tab과 개행도 공백으로 인정한다
// $str_trim= "    abcd    \n";
// echo trim($str_trim);
// echo ltrim($str_trim); //왼쪽의 공백을 전부 지운다.
// echo rtrim($str_trim); //오른쪽의 공백을 전부 지운다.

// 문자여르이 길이를 구하는 함수  멀티바이트 = mb
// $str_len = "가나다라";

// echo mb_strlen($str_len);



// 문자열 포맷에 따라 출력하는 함수
// define("WELCOME","안녕하세요. %s님.");
// printf(WELCOME, "홀길동");
// printf("안녕하세요. %s입니다. %d", "PHP", 1234);

// 기본 포맷 : ERROR(숫자) : XXX ERROR가 발생했습니다.
// 에러 번호 : 에러종류
// 1 : 시스템
// 2 : 로그인
// 3 : 접속
// define("ERROR_MSG","ERROR(%d) : %s ERROR가 발생했습니다. \n");// 개행을 넣을때는 조심해야 된다.
// printf(ERROR_MSG,1 , "시스템");
// printf(ERROR_MSG,2 , "로그인");
// printf(ERROR_MSG,3 , "접  속");




// 문자열을 분리하는 함수
// $str_sscanf = "가나다라 50 abcd";
// sscanf($str_sscanf, "%s %d %s",$str_ko, $int_d, $str_en);
// echo $str_ko, "\n",$int_d,"\n", $str_en,"\n";





// 문자열 반복해서 찍어주는 함수
// echo str_repeat("가나",3 );



// 문자열을 특정문자열로 분리하는 함수 : explode() 현업에서 많이 쓰인다. 기억해라
$str_expl = "홍길동,27세,남자,의적,조선";
$arr_expl = explode(",",$str_expl);

print_r($arr_expl);



// 배열을 특정 문자열로 합치는 함수 : implode() 자주쓰이는 함수이다. 기억해라
$str_impl = implode("123",$arr_expl);
echo $str_impl;