<?php
    // $num = 10;
    // $num = 11;
    
    // 배열
    // $week = array("Sun", "Mon", "Tue", "Wed");
    // print $week[0];

    // $mon = "Mon";
    // $sun = "Sun";
    // $tue = "Tue";
    // $wed = "Wed";
    // $week = array( $sun, $mon, $tue, $wed );
    // echo $week[3];


    // Mon, Wed, Sun, Tue 순서로 $week2를 변경
    // $week2 = array( $week[1], $week[3], $week[0], $week[2] );
    // echo $week2[0];

    // 멀티타입 배열 : 여러 타입의 배열을 멀티타입 배열이다.
    // $arr_mult_type = array("aaa", 1, 3.14, 'a');
    // echo $arr_mult_type[0];
    // var_dump($arr_mult_type);

    // 연상 배열 : 키를 지정해준다.(키값을 가져올때 지정해둔 키로만 불러올 수 있다.)
    // $arr_ass = array("key1" => "val1"
    //                 , "key2" => "val2");
    // echo $arr_ass["key2"];

    // 키는 요리명, 값은 주재료 하나로 이루어진 배열을 만들어 주세요.(배열 길이는 4)
    // $arr_food = array  ("탕수육" => "돼지고기"
    //                     , "짜장면" => "짜장"
    //                     , "해물짬뽕" => "해물"
    //                     , "초밥" => "회");
    // echo $arr_food["초밥"];
    // var_dump($arr_food);


    // 다차워 배열
//     $arr_temp = array(
//                     array(1, 2, 3, 4)
//                     ,array(5, 6, 7, 8)
//                     ,array(
//                     array(9, 10, 11)
//                     )
//                     );
// // echo $arr_temp[2][0][1];
// $arr_temp_3 = $arr_temp[2][0];
// // var_dump($arr_temp_3);
// $arr_temp_3_c = array(9, 10, 11);

// // 배열의 원소 삭제 : unset() 특정 요소를 삭제하는 함수(삭제된 방의 번호(인덱스)는 다시 정렬되지 않는다. 처음 정해진 인덱스를 가진다.)
// $arr_week = array("Sun", "Mon", "delete", "Tue", "Wed");
// unset($arr_week[2]);
// print_r($arr_week);


// 키 : 김치 원소를 삭제해 주세요.
$arr_ass_del = array   (
                        "된장찌개" => "파"
                        , "볶음밥" => "양파"
                        , "김치" => "마늘"
                        , "비빔밥" => "참기름"
                        );

unset($arr_ass_del["김치"]);
var_dump($arr_ass_del);
print_r($arr_ass_del);





?>