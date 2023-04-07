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
// for ($i=0; $i < 2 ; $i++)
// {
//     $user[] = $arr_all[$cnt];
//     $cnt--;
// }

// for ($i=0; $i < 2 ; $i++)
// {
//     $dealer[] = $arr_all[$cnt];
//     $cnt--;
// }

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
        $user_score +=intval(mb_substr($value,0,-1));
    }
    return $user_score;
}

function one_card(&$param_player, &$param_cnt, &$array)
{
    $param_player[] = $array[$param_cnt];
    $param_cnt--;
}


// $user_score =0; // 유저값 초기화
// foreach ($user as $value) // 카드2개받은거 더하는것
// {
//     $user_score += sum_score($value);
// }


// $dealer_score=0; // 딜러값 초기화
// foreach ($dealer as $value) // 초기카드2번더하기
// {
//     $dealer_score+= sum_score($value);
// }

// if ($user_score>$dealer_score)
// {
//     echo "유저승리";
// }
// if ($user_score<$dealer_score)
// {
//     echo "딜러승리";
// }
// if ($user_score === $dealer_score)
// {
//     echo "무승부";
// }


while(true)
{
	echo '시작';
	print "\n";
	fscanf(STDIN, "%d\n", $input);        
	if($input === 0)
    {
		break;
	}
    else if ($input === 1 )
    {
        $user = array();
        $dealer = array();
        for ($i=0; $i < 2 ; $i++)
        {
            one_card($user, $cnt,$arr_all);
        }

        for ($i=0; $i < 2 ; $i++)
        {
            one_card($dealer, $cnt,$arr_all);
        }

        $user_score =0; // 유저값 초기화
        foreach ($user as $value) // 카드2개받은거 더하는것
        {
            $user_score += sum_score($value);
        }
        
        $dealer_score=0; // 딜러값 초기화
        foreach ($dealer as $val) // 초기카드2번더하기
        {
            $dealer_score+= sum_score($val);
        }
        echo "------ New Game ------\n";
        // var_dump($user, $dealer);
        echo "유저 점수 : ".$user_score,"\n";
        echo "\n";
        echo "딜러 점수 : ".$dealer_score,"\n";
        echo "\n";
        if ($user_score === 21)
        {
            echo "유저승리\n";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        }
        else if ($dealer_score === 21)
        {
            echo "딜러승리\n";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        } 
        if ($user_score > 21)
        {
            echo "딜러 승리";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        }
        else if ($dealer_score > 21)
        {
            echo "유저 승리";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        }
        // if ($user_score<$dealer_score) {
        //     echo "딜러승리\n";
        // }
        // if ($user_score === $dealer_score) {
        //     echo "무승부\n";
        // }
    }
    elseif ($input === 2)
    {
        // if($dealer_score < 17 )
        // {
        //         one_card($dealer, $cnt,$arr_all);
        //     }
            $user_score = 0;
            // $dealer_score = 0;
            one_card($user, $cnt,$arr_all);
        foreach ($user as $value) // 카드2개받은거 더하는것
        {
            $user_score += sum_score($value);
        }
        echo "유저가 더 받은 카드 : ";
        echo sum_score($value);
        echo "\n";
        echo "유저 점수 : ".$user_score;
        echo "\n";
        
        // $dealer_score=0; // 딜러값 초기화
        // foreach ($dealer as $value) // 초기카드2번더하기
        // {
        //     $dealer_score+= sum_score($value);
        // }
        // echo "유저가 더 받은 카드 : ";
        // echo sum_score($value);
        echo "\n";
        echo "딜러 점수 : ".$dealer_score;
        echo "\n";
        if ($user_score > 21)
        {
            echo "딜러 승리";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        }
        else if ($dealer_score > 21)
        {
            echo "유저 승리";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        }
        if ($user_score === 21)
        {
            echo "유저승리\n";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        }
        else if ($dealer_score === 21)
        {
            echo "딜러승리\n";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        }
    }
    elseif ($input === 3)
    {
        // $user_score = 0;
        $dealer_score = 0;
        if($dealer_score < 17 )
        {
            one_card($dealer, $cnt,$arr_all);
        }
        // foreach ($user as $value) // 카드2개받은거 더하는것
        // {
        //     $user_score += sum_score($value);
        // }
        // echo "유저가 더 받은 카드 : ";
        // echo sum_score($value);
        echo "\n";
        echo "유저 점수 : ".$user_score;
        echo "\n";
        
        $dealer_score=0; // 딜러값 초기화
        foreach ($dealer as $value) // 초기카드2번더하기
        {
            $dealer_score+= sum_score($value);
        }
        echo "딜러가 더 받은 카드 : ";
        echo sum_score($value);
        echo "\n";
        echo "딜러 점수 : ".$dealer_score;
        echo "\n";
        if ($user_score > 21)
        {
            echo "딜러 승리";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        }
        else if ($dealer_score > 21)
        {
            echo "유저 승리";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        }
        if ($user_score === 21)
        {
            echo "유저승리\n";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        }
        else if ($dealer_score === 21)
        {
            echo "딜러승리\n";
            $user = array();
            $dealer = array();
            $user_score =0;
            $dealer_score=0;
        }
    }
    elseif ($input === 4)
    {
        
        if ($user_score>$dealer_score)
        {
            echo "유저승리\n";
        }
        if ($user_score<$dealer_score)
        {
            echo "딜러승리\n";
        }
        if ($user_score === $dealer_score)
        {
            echo "무승부\n";
        }
    }
	print "\n";
}
echo "끝!\n";