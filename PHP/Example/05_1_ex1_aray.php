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



    // 다차원 배열
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
// $arr_ass_del = array   (
//                         "된장찌개" => "파"
//                         , "볶음밥" => "양파"
//                         , "김치" => "마늘"
//                         , "비빔밥" => "참기름"
//                         );

// unset($arr_ass_del["김치"]);
// var_dump($arr_ass_del);
// print_r($arr_ass_del);



// 중복되지 않는 원소를 반환  :  array_diff() 기준이 되는 배열에 없는 값을 찾아준다.  배열이 커질수록 속도가 늦어진다.
// $arr_diff_1 = array("a", "b","d", "g");
// $arr_diff_2 = array("a", "b","d", "f");
// $arr_diff = array_diff($arr_diff_1, $arr_diff_2);
// print_r($arr_diff);



// 배열의 정렬  :  asort(), arsort(), ksort(), krsort() 배열이 커질수록 속도가 늦어진다.



// asort(); 값들을 기준으로 오름차순으로 정렬해준다.
// $arr_asort = array("b", "a","d", "c");
// asort($arr_asort);
// print_r($arr_asort);



// arsort(); 값들을 기준으로 내림차순으로 정렬해준다.
// $arr_asort = array("b", "a","d", "c");
// arsort($arr_asort);
// print_r($arr_asort);



// ksort(); 키값을 기준으로 오름차순으로 정렬해준다. 연상배열에서 사용한다.
// $arr_ksort = array(
//                     "key1" => "val1"
//                     ,"key3" => "val3"
//                     ,"key4" => "val4"
//                     ,"key2" => "val2");
// ksort($arr_ksort);
// print_r($arr_ksort);



// krsort(); 키값을 기준으로 내림차순으로 정렬해준다.
// $arr_krsort = array(
//     "key1" => "val1"
//     ,"key3" => "val3"
//     ,"key4" => "val4"
//     ,"key2" => "val2");
// krsort($arr_krsort);
// print_r($arr_krsort);



// array의 사이즈를 반환하느 함수 : count();
// echo count($arr_krsort);



// forreach( $array as $key => $val){}
// forreach( $array as $val){}
// $arr1 = array(
//     "a" => "1"
//     ,"b" => "2"
//     ,"c" => "3"
//     ,"d" => "4"
//     );


    //key값은 컬럼명, val값은 컬럼값
// foreach($arr1 as $key => $val)
// {
//     echo $key." : ".$val."\n";
// }


// val값만 보고싶을때
// foreach($arr1 as $val)
// {
//     echo $val."\n";
// }




// foreach문을 이용해서 키가 "삭제"인 요소를 제거해 주세요.
// if문 사용, unset("삭제") X, 키가 "삭제" 이외는 "키 : 값"포맷으로 출력
$arr_ass_del = array   (
    "된장찌개" => "파"
    , "볶음밥" => "양파"
    , "삭제" => "값값"
    , "김치" => "마늘"
    , "비빔밥" => "참기름"
    );

foreach($arr_ass_del as $key => $val)
{
    if($key === "삭제")
    {
        unset($arr_ass_del[$key]);
        // echo $arr_ass_del[$key];
    }
    else{
        echo $key." : ". $val."\n";
    }
}

print_r($arr_ass_del);

var_dump($arr_ass_del);










?>