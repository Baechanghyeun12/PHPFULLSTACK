<?php
$arr = array( "A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K");
$arr1 = array("♠", "♣", "◆", "♥");
$arr_all = array();
$cnt = count($arr) * count($arr1) - 1;
$user=array();
$dealer=array();
foreach ( $arr1 as $val1)
{
    foreach( $arr as $val2)
    {
        $arr_all[] = array( $val1, $val2);
    }
}
shuffle($arr_all);

var_dump($arr_all);
for ($i=0; $i < 2 ; $i++)
{
    $user[] = $arr_all[$cnt];
    $cnt--;
}
for ($i=0; $i < 2 ; $i++)
{
    $dealer[] = $arr_all[$cnt];
    $cnt--;
}
// var_dump($user);

if($user[0][1] === "J" ||$user[0][1] === "Q" ||$user[0][1] === "K" )
{
    $user_score1 = 10;
}
else if ($user[0][1] === "A") {
    $user_score1 = 1 or 11;
}
else
{
    $user_score1 = (int)$user[0][1];
}




if($user[1][1] === "J" ||$user[1][1] === "Q" ||$user[1][1] === "K" )
{
    $user_score2 = 10;
}
else if ($user[1][1] === "A")
{
    $user_score2 = 1 or 11;
}
else
{
    $user_score2 = (int)$user[1][1];
}


if($user[0][1] === "J" ||$user[0][1] === "Q" ||$user[0][1] === "K" )
{
    $dealer_score1 = 10;
}
else if ($user[0][1] === "A") {
    $dealer_score1 = 1 or 11;
}
else
{
    $dealer_score1 = (int)$user[0][1];
}




if($user[1][1] === "J" ||$user[1][1] === "Q" ||$user[1][1] === "K" )
{
    $user_score2 = 10;
}
else if ($user[1][1] === "A")
{
    $user_score2 = 1 or 11;
}
else
{
    $user_score2 = (int)$user[1][1];
}

$score = $dealer_score1 + $user_score2;


echo $score;
var_dump($dealer_score1);
var_dump($user_score2);
var_dump($score);




























// // foreach ($user[0] as $key => $value)
// // {
// //     echo $value;
// // }
// // foreach ($user[1] as $key => $val)
// // {
// //     echo $val;
// // }