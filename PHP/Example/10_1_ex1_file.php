<?php

// 파일을 여는 방법 : fopen( 파일위치, 파일여는방식 )
// $f_food = fopen( "./text/food.txt","r"); // r : 읽기전용
// $f_food = fopen( "./text/food.txt","w"); // w : 쓰기전용(포인터가 파일 시작부분) , 파일 안에 내용이 날아갈수도 있어서 빽업파일을 만들어두고 사용하는게 좋다.
// $f_food = fopen( "./text/food.txt","a"); // a : 쓰기전용(포인터 파일의 끝부분) ,기존내용이 삭제되지않는다.



// var_dump($f_food);

//파일을 한줄씩 읽어오는 방법 : fgets( open한 파일 )
// print fgets($f_food);
// print fgets($f_food);
// print fgets($f_food);
// print fgets($f_food);
// print fgets($f_food);
// print fgets($f_food);

// while(!feof($f_food)) // feof : 파일 끝이면 true, 아니면 false
// {
//     echo fgets($f_food);
// }

// while( $line = fgets($f_food))
// {
//     print $line;
// }

$f_food = fopen( "./text/food.txt","a");

// 파일에 내용 추가 : fputs( open한 파일, 추가할 내용 )
fputs($f_food, "\n돈까스1");
fputs($f_food, "\n돈까스2");
fputs($f_food, "\n돈까스3");



// 파일을 닫는 방법 : fclose( open한 파일 )
fclose($f_food);
