<?php
// <!-- 성적
// 범위 :
// 100점   : A+
// 90~100점 : A
// 80~90점 : B
// 70~80점 : C
// 60~70점 : D
// 60미만  : F

// 출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"

// $score = 84;

// if($score === 100){
//     echo "당신의 점수는 ".$score."점 입니다. <A+>";
// }
// else if ($score >= 90 && $score < 100 ){
//     echo "당신의 점수는 ".$score."점 입니다. <A>";
// }
// else if ($score >= 80 && $score < 90){
//     echo "당신의 점수는 ".$score."점 입니다. <B>";
// }
// else if ($score >= 70 && $score < 80){
//     echo "당신의 점수는 ".$score."점 입니다. <C>";
// }
// else if ($score >= 60 && $score < 70){
//     echo "당신의 점수는 ".$score."점 입니다. <D>";
// }
// else if ($score < 60){
//     echo "당신의 점수는 ".$score."점 입니다. <F>";
// }

$num = 98;
$str_f = "당신의 점수는";
$str_blank = " ";
$str_b = "점 입니다.";
$grade = "";

if($num >= 0 && $num <= 100){
    if( $num === 100)
    {
        $grade = "A+";
    }
    else if($num >= 90 && $num <100 )
    {
        $grade = "A";
    }
    else if($num >= 80 && $num <90 )
    {
        $grade = "B";
    }
    else if($num >= 70 && $num <80 )
    {
        $grade = "C";
    }
    else if($num >= 60 && $num <70 )
    {
        $grade = "D";
    }
    else
    {
        $grade = "F";
    }
    echo $str_f.$str_blank.$num.$str_b."<".$grade.">";
    }
else
{
    echo "잘못된 값을 입력 했습니다.";
}
?>