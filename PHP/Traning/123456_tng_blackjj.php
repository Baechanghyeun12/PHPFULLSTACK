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
        array_push($arr_all, "$val2$val1");
    }
}
// 덱 섞기-------------------------
shuffle($arr_all);
// 처음 카드 2장--------------------------
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

// 펑션 만들기----------------------------------------------
function sum_score($value)
{
    $user_score= 0;
    if( strpos($value, "J") !== false || strpos($value, "K")!== false || strpos($value, "Q")!== false )
    {
        $user_score += 10;
    }
    else if (strpos($value, "A")!== false)
    {
        if ($user_score + 11 > 21)
        {
            $user_score += 1;
        }
        else {
            $user_score += 11;
        }
    }
    else
    {
        $user_score +=intval(substr($value,0,1));
    }
    return $user_score;
}

function one_card()
{
    $dealer[] = $arr_all[$cnt];
    $cnt--;
}


$user_score =0; // 유저값 초기화
foreach ($user as $value) // 카드2개받은거 더하는것
{
    $user_score += sum_score($value);
}


$dealer_score=0; // 딜러값 초기화
foreach ($dealer as $value) // 초기카드2번더하기
{
    $dealer_score+= sum_score($value);
}

if ($user_score>$dealer_score) {
    echo "유저승리";
}
if ($user_score<$dealer_score) {
    echo "딜러승리";
}
if ($user_score === $dealer_score) {
    echo "무승부";
}


while(true) {
	echo '시작';
	print "\n";

	fscanf(STDIN, "%d\n", $input);        
	if($input === 0) {
		break;
	}
    else if ($input === 1 ) {
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

        $user_score =0; // 유저값 초기화
        foreach ($user as $value) // 카드2개받은거 더하는것
        {
            $user_score += sum_score($value);
        }
        echo $user_score;

        $dealer_score=0; // 딜러값 초기화
        foreach ($dealer as $value) // 초기카드2번더하기
        {
            $dealer_score+= sum_score($value);
        }

        if ($user_score>$dealer_score) {
            echo "유저승리";
        }
        if ($user_score<$dealer_score) {
            echo "딜러승리";
        }
        if ($user_score === $dealer_score) {
            echo "무승부";
        }
        echo $dealer_score;
    }
	echo $input;
	print "\n";
}
echo "끝!\n";