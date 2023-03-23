<?php
    // $num =;
    // $str = "당신의 점수는 ".$num."점 입니다.";
    // $grade = "";
    // switch ($num) {
    //     case $num === 100:
    //         $grade = "A+";
    //         break;
    //     case $num < 100 && $num >= 90:
    //         $grade = "A";
    //         break;
    //     case $num < 90 && $num >= 80:
    //         $grade = "B";
    //         break;
    //     case $num < 80 && $num >= 70:
    //         $grade = "C";
    //         break;
    //     case $num < 70 && $num >= 60:
    //         $grade = "D";
    //         break;
    //     case $num < 60 && $num >= 0:
    //         $grade = "F";
    //         break;
    //     default:
    //         $grade = "잘못된 값을 입력 했습니다.";
    //         break;
    // }
    // echo $str."<".$grade.">";



    $num =3245 ;
    $str = "당신의 점수는 ".$num."점 입니다.";
    $grade = "";
if($num >=0 && $num <=100)
    {
        switch ($num) 
    {
        case $num === 100:
            $grade = "A+";
            break;
        case $num < 100 && $num >= 90:
            $grade = "A";
            break;
        case $num < 90 && $num >= 80:
            $grade = "B";
            break;
        case $num < 80 && $num >= 70:
            $grade = "C";
            break;
        case $num < 70 && $num >= 60:
            $grade = "D";
            break;
        case $num < 60 && $num >= 0:
            $grade = "F";
            break;
    }
    echo $str."<".$grade.">";
    }
    else
    {
        echo "잘못된 값을 입력 했습니다.";
    }



?>